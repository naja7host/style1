	require_once(e_HANDLER."news_class.php");	
	global $tp, $ns , $ix ;
	$ix = new news;
	
	$cat = 10;	
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";	
	
		
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='$cat'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")  
			ORDER BY n.news_datestamp DESC LIMIT 0,4";

			if(!$sql->db_Select_gen($query))
			{
				$text = "
				<div class='boxblue'>
					<h2>". LAN_THEME_16 ."</h2>
					<h3>". LAN_THEME_16 ."</h3>
					<div class='block' >						
						<p>". LAN_THEME_16 ."</p>
					</div>
				</div>					
				";
			} 
			else 
			{	
				while($row = $sql -> db_Fetch())
				{
					$pref['shortdate'] = "%d-%m-%Y ";
					extract($row);
					$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
					if (strlen($news_thumbnail) == 0)
						$news_thumbnail = "no_image.png";
						
							$NEWSLISTSTYLE1 = "						
							<div class='span6 news_box_index'>
								<div class='news_box_index_image_thumb'>
									{NEWSIMAGETHUMB}
									
								</div>							
								<div class='news_box_index_newstitle'><h2 >{NEWSTITLELINK=extend}</h2></div>
							</div>
							
							";							
							$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
					//$count++;
				}
				$text .= "<div class='spacer'></div><a href='".e_BASE."news.php?cat.$news_category' class='more left'>".LAN_THEME_15."</a>";
				$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
			}
		
	$ns -> tablerender($caption, $text);