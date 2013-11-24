if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) 
{
  
	// make e107 comments behave like wordpress...! ;) 

	global $nid , $editall,$pref, $sql, $tp;
	
	$news_item = getcachedvars('current_news_item'); 
	$nid = $news_item['news_id'] ;
	$editall = FALSE ;

	if($pref['comments_disabled'] == 1)
	{
		return;
	}	
	
	if(!$news_item['news_allow_comments'])
	{
	$addcommenttext = "<a href='#addcomments'>".ADD_COMMENT."</a>";	
	$commenteditor = "
		<!-- respond -->
		$edit
		<div class='clear'>  </div>	
			<div class='add_comment well'  >
				<div class='title_box' id='addcomments' >".ADD_COMMENT_HEADER."</div>					
				<form id='form3' action='comment.php?comment.news.".$nid."' method='post'   onsubmit=\"return checkform(this);\"> 								
					<p>	
						<label for='name'>".ADD_COMMENT_AUTHOR."</label>
						<input id='name' name='author_name' value='' size='40' type='text' tabindex='1' />
					</p>		
					<p>
						<label for='subject'>".ADD_COMMENT_SUBJECT."</label>
						<input id='subject' name='subject' value='' size='40' type='text' tabindex='2' />
					</p>						
					<p>
						<label for='message' class='widget_title'>".ADD_COMMENT_BODY."</label>
						<textarea class='input-xlarge' id='message' name='comment' rows='10' cols='45' tabindex='2'></textarea>
					</p>
					<p>
						<label for='code'> ".ADD_COMMENT_CAPTCHA." > <span id='txtCaptchaDiv' style='color:#F00'></span>
						
						<input type='hidden' id='txtCaptcha' name='txtCaptcha' /></label>
						<input type='text' name='txtInput' id='txtInput' size='10' />
					</p>
					<p class='no-border'>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />\n
						<input name='commentsubmit' class='btn btn-send' type='submit' value='".ADD_COMMENT_BUTTON."' tabindex='3' /> 					
					</p>					
					<script type='text/javascript' src='".THEME_ABS."script.js'></script>
				</form>	
			
			<!-- /respond -->
			</div>";
	}	
	
	function comids($cid) 
	{
		global $nid;
		$sql = new db;
		
			if ( intval($cid) ) 
			{
				$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '$cid' AND comment_pid != '0'  AND comment_item_id = '$nid' AND comment_type = '0'  ";
							} 
			else 
			{
				$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '0' AND comment_item_id = '$nid' AND comment_type = '0'  ";
				
			}
			
		$sql->db_select_gen( $qry );
		
			while( $row=$sql->db_Fetch() ) 
			{
				$ids[] .= $row['comment_id'];
			} 
		return $ids;
		
	}

	function create_commentz($cid) 
	{
		global $nid;
			if (comids($cid)) 
			{
				$comment .= "<li id='comment-$cid' class='comment even thread-even depth-1'>";
				$comment .= create_subcomments_tpl($cid);
				//echo "depth-1 - ". $cid."<br />";
				$cids = comids($cid);

					$depths = "<ul class='children'>";
					$depthc ='';
					foreach ( $cids as $scid ) 
					{							
						//echo "depth-2 - ". $scid."<br />";
						$depthc .= "<li id='comment-$scid' class='comment depth-2'>";
						$depthc .= create_subcomments_tpl($scid);
						
						
						$cidss = comids($scid);
						
							$depthss = "<ul class='children'>";
							$depthcc ='';
							foreach ( $cidss as $sscid ) 
							{							
								//echo "depth-3 - ". $sscid."<br />";
								$depthcc .= "<li id='comment-$sscid' class='comment depth-3'>";
								$depthcc .= create_commentz_tpl($sscid);						
								$depthcc .="</li>";
							}
							$depthee = "</ul>";	

							if ($depthcc)
								$depthh = $depthss . $depthcc . $depthee; 
								
							$depthc .= $depthh ;
							unset($depthh);	
						
						
						$depthc .="</li>";

					}
					$depthe = "</ul>";	

					if ($depthc)
						$depth = $depths . $depthc . $depthe; 
						
					$comment .= $depth ."</li>";
					unset($depth);
			} 
			else 
			{
				$comment .= "<li id='comment-$cid' >";
				$comment .= create_subcomments_tpl($cid);
				$comment .= "</li>"; 
				//echo "kepth-1 - ". $cid."<br />";
			}
			
		return $comment; 
	}

	function create_subcomments_tpl($cid) 
	{
		global $nid , $editall;
		$sql = new db;
		
		if (ADMIN && getperms("B"))
			$edit = "<div class='reply-btn'><a href='".e_ADMIN_ABS."modcomment.php?news.$nid.$cid' class='edit' >تعديل التعليق</a></div>";	

		$sql->db_select_gen("SELECT * FROM #comments WHERE comment_id = '$cid' AND comment_item_id = '$nid' AND comment_type = '0' ");
			while( $row=$sql->db_Fetch() ) 
			{
				extract($row);
				$author = explode('.',$comment_author );
				$date = strftime("%d %B %Y", $comment_datestamp); 
				$time = strftime("%H:%M", $comment_datestamp); 
				if ($comment_blocked == '0') 
				{
					$text .= "						
								<div id='comments'>
									<div id='comment-title'>
										<div class='user-name'>
											<div class='comments-name'>
												<h4>$author[1]</h4>
											</div>
											<div class='comments-date'>بتاريخ  $date على الساعة $time</div>
										</div>
									</div>
									<div class='comments-data'>
										<p>". nl2br($comment_comment) ."</p>
									</div>
									<div class='reply-btn'><a href='comment.php?reply.news.$cid.$nid' title='' class='reply' >الرد على التعليق</a></div>
									$edit
																	
								</div>
								<div class='clearfix'>  </div>	
								";
				}
				else
				{
					if (ADMIN && getperms("B"))
					{
						$text .="<ol class='warning'>هذا تعليق غير متاح للعموم و  يحتاج للموافقة حتى يتم نشره بالموقع: <br />". nl2br($comment_comment) ."<br /><a href='".e_ADMIN_ABS."modcomment.php?news.$nid'>نشر التعليق</a></ol>";
						$editall = TRUE ;
					}	
				}
				
			}
		return $text;
	}
	
	function create_commentz_tpl($cid) 
	{
		global $nid , $editall;
		$sql = new db;
		
		if (ADMIN && getperms("B"))
			$edit = "<div class='comment_edit'><a href='".e_ADMIN_ABS."modcomment.php?news.$nid.$cid' class='edit' >تعديل التعليق</a></div>";	

		$sql->db_select_gen("SELECT * FROM #comments WHERE comment_id = '$cid' AND comment_item_id = '$nid' AND comment_type = '0' ");
			while( $row=$sql->db_Fetch() ) 
			{
				extract($row);
				$author = explode('.',$comment_author );
				$date = strftime("%d %B %Y", $comment_datestamp); 
				$time = strftime("%H:%M", $comment_datestamp); 
				if ($comment_blocked == '0') 
				{
					$text .= "						
								<div id='comments'>
									<div id='comment-title'>
										<div class='user-name'>
											<div class='comments-name'>
												<h4>$author[1]</h4>
											</div>
											<div class='comments-date'>بتاريخ  $date على الساعة $time</div>
										</div>
									</div>
									<div class='comments-data'>
										<p>". nl2br($comment_comment) ."</p>
									</div>
								</div>	
								
								<div class='comment_reply'>
								</div>
								$edit
													
						";
				}
				else
				{
					if (ADMIN && getperms("B"))
					{
						$text .="<ol class='warning'>هذا تعليق غير متاح للعموم و  يحتاج للموافقة حتى يتم نشره بالموقع: <br />". nl2br($comment_comment) ."<br /><a href='".e_ADMIN_ABS."modcomment.php?news.$nid'>نشر التعليق</a></ol>";
						$editall = TRUE ;
					}	
				}
				
			}
		return $text;
	}

	$comment .= $addcommenttext ;
	$comment .= "<ol class='commentlist'>" ;
	
	foreach ( comids() as $cid ) { 
		$comment .= create_commentz($cid); 
	}

	if ($editall)	
		$edit = "<div class='info'><a href='".e_ADMIN_ABS."modcomment.php?news.$nid'>تعديل التعليقات</a></div>";
				
	$comment .=	$commenteditor ;
	$comment .= "</ol>" ;
	return $comment;
}