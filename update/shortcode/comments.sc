if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
/**
 * Commentz
 * Version: 0.1
 * Module: e107.org CMS e107v7+
 * Updated: 24/04/2010 
 * Url: http://ask.altervista.org
 * Author: Filosofi Luca > aSeptik
 * Contact: aseptik@gmail.com
 * Copyright: 2009 / 2010 (c)    
 *  
 */ 
  
 // make e107 comments behave like wordpress...! ;) 

global $nid;
$news_item = getcachedvars('current_news_item'); 
$nid = $news_item['news_id'] ;

function comids($cid) {
global $nid;
$sql = new db;
if ( intval($cid) ) {
$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '$cid' AND comment_pid != '0'  AND comment_item_id = '$nid' AND comment_type = '0'";
} else {
$qry = "SELECT comment_id FROM #comments WHERE comment_pid = '0' AND comment_item_id = '$nid' AND comment_type = '0'";
}
$sql->db_select_gen( $qry );
while( $row=$sql->db_Fetch() ) {
$ids[] .= $row['comment_id'];
    } 
 return $ids;
}

function create_commentz($cid) {
global $nid;
if (comids($cid)) {
$comment .= create_commentz_tpl($cid);
$cids = comids($cid);
foreach ( $cids as $scid ) {
$comment .= "<ul class='children'>";
if (comids($scid)) {
$comment .= "<li class='depth-2'>";
$comment .= create_commentz($scid);
$comment .="</li>";
} else {
$comment .= "<li class='depth-3'>".create_commentz_tpl($scid)."</li>";
} 
$comment .= "</ul>"; 
}
} else {

$comment .= create_commentz_tpl($cid);

}
  
  return $comment;
 
}


/* you can do this better for sure, no time to play with this...*/
function getUserInfo($id,$row) {
$sql = new db;
if ( $sql->db_Select("user","{$row}","user_id = '{$id}' AND $row != '' GROUP BY user_id LIMIT 1") ) {
$usr=$sql->db_Fetch();
$userinfo = $usr[$row];
} else {
$userinfo = e_THEME_ABS."Jungleland/images/gravatar.jpg";
}
return $userinfo;
}

function create_commentz_tpl($cid) {
global $nid;
$sql = new db;
$sql->db_select_gen("SELECT * FROM #comments WHERE comment_id = '$cid' AND comment_item_id = '$nid' AND comment_type = '0' ");
while( $row=$sql->db_Fetch() ) {
extract($row);
$author = explode('.',$comment_author );
$date = strftime("%d %B %Y", $comment_datestamp); 
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment_author_email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

$text .= "
<div class='block medium'>
	<div class='head'>
	<span style='float:right'>
	تعليق ".$cid." بواسطة ".$author[1]."  بتاريخ <a href='#' title=''>$date</a>
	</span>
	<span style='float:left;padding-left:30px;' >
	 <a href='#myFormAnchor'>Reply</a>
	 </span>
	</div>
	<span style='float:right'>
	<img alt='' src='".$grav_url."' height='40' width='40' />																						 										
	</span>
	<span style='float:right ;position: relative; width: 85%; right: 30px; text-align:right;'>
	<font color='red'>". nl2br($comment_subject) ."</font><br />
	". nl2br($comment_comment) ."
	
	</span>
</div>";
    }
 return $text;
}

//$comment .= "<ol class='commentlist'>";

foreach ( comids() as $cid ) { 
//$comment .= "<li class='depth-1'>";
$comment .= create_commentz($cid); 
//$comment .="</li>";
}

// replace the original post comment form...

//$comment .= "</ol>
$comment .= "

	<!-- respond -->
					<div class='block medium'>
						<div class='head' id='myFormAnchor' >أضف تعليقك</div>
					
		
			
						<form action='comment.php?comment.news.".$nid."' method='post' id='commentform'>		
								
							<p>	
								<label for='name'>كاتب التعليق (ضروري)</label><br />
								<input id='name' name='author_name' value='' type='text' tabindex='1' />
							</p>
			
							<p>
								<label for='subject'>عنوان التعليق (ضروري)</label><br />
								<input id='subject' name='subject' value='' type='text' tabindex='2' />
							</p>
				
							<p>
								<label for='email'>البريد الإلكتروني</label><br />
								<input id='email' name='author_email' value='' type='text' tabindex='3' />
							</p>
					
							<p>
								<label for='message'>التعليق</label><br />
								<textarea id='message' name='comment' rows='10' cols='20' tabindex='4'></textarea>
							</p>	
			
							<p class='no-border'>
								<input name='commentsubmit' class='button' type='submit' value='أضف تعليقك' tabindex='5' />         		
							</p>
					
						</form>	
					
					<!-- /respond -->
					</div>
";


return $comment;

}