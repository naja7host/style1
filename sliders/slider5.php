<?php
	global $tp , $ns, $totalnews , $showdate , $idnews ;
	
	require_once(e_HANDLER."news_class.php");			
	$newsfrom = 0;
	$order = 'news_datestamp';
	$ix = new news;
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";
	
	$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
	LEFT JOIN #user AS u ON n.news_author = u.user_id
	LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
	WHERE n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
	AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
	AND n.news_render_type<2
	ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",7";
	
	$sql->db_Select_gen($query);

	if (!$sql->db_Select_gen($query))
	{ 
	  echo "<br /><br /><div style='text-align:center'><b>".(strstr(e_QUERY, "month") ? LAN_NEWS_462 : LAN_NEWS_83)."</b></div><br /><br />";
	} 	
	
	$newsList = $sql->db_getList();
	$idnews = array();
	$ilactive = "class='active'";
	$active = "active";
	$text = '
	<!-- Main Slider -->	
	<div id="featured" class="col-md-12" >';		
	$text1 = "<ul class='ui-tabs-nav col-md-4'>" ; 
	$text2 ="" ; 
	$count = 0; 
		foreach($newsList  as $row )
		{	
			$url = make_url($row);
			$idnews[] = $row['news_id'];
			if ($count == 0 ){
				$style = ""; 
				$class = "";
				}
			else {
				$style = " ui-tabs-hide";
				$class ="";
				}
			$NEWSLISTSTYLE1 = "
					<div id='fragment-$count' class='ui-tabs-panel $style  col-md-8 pull-right' style='' >
						{NEWSIMAGE=&amp;h=330&amp;w=600&amp;zc=1}
						<div class='info '><h2>{NEWSTITLELINK=80}</h2>
							<p>{NEWSBODY=70}{EXTENDED}</p>
						</div>
						<div class='cats cat-".$row['news_category']."'>{NEWSCATEGORY}</div>
					</div>";
			$text2 .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);		
			
			$NEWSLISTSTYLE2 ="<li class='ui-tabs-nav-item $class' id='nav-fragment-$count'><a href='#fragment-$count'><img class='".$GLOBALS['NEWS_CSSMODE']."_image' src='".THEME."thumbs.php?src=".e_IMAGE_ABS."newspost_images/".$row['news_thumbnail']. "&amp;h=50&amp;w=50&amp;zc=1' alt='' /><span>{NEWSTITLE=50}</span></a></li>";
			$text1 .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE2, $param);
			$count++;				
		}
	
	$text1 .= "</ul>" ;
	$text2 .= "</div>";	
	$texttext .= '
		<script type="text/javascript" src="'.THEME_ABS.'js/jquery-ui-tabs-rotate.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
			});
		</script>' ;	
	$text .= $text1 ;
	$text .= $text2 ;
	$text .= $texttext ;
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($text);
?>