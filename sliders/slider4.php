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
	ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref['frontpage_news_slider'];
	
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>  
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script> 
	
	<div id="featured" >';		
	$textol ="" ; 
	$textinner = "<ul class='ui-tabs-nav'>" ; 
	$count = 0; 
		foreach($newsList  as $row )
		{	
			$url = make_url($row);
			$idnews[] = $row['news_id'];
			if ($count == 0 ){
				$style = ""; 
				$class = "class='active'";
				}
			else {
				$style = "style='display:none;'";
				$class ="";
				}
			$NEWSLISTSTYLE1 = "
					<div id='fragment-$count' class='ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide' style='' >
						{NEWSIMAGE=&amp;h=280&amp;w=348&amp;zc=1}
						<div class='info '><h4>{NEWSTITLELINK=80}</h4>
						{NEWSBODY=70}{EXTENDED}
						</div>
						<div></div>
						<div class='cats cat-".$row['news_category']."'>{NEWSCATEGORY}</div>
					</div>";
			$textol .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);		
			
			$NEWSLISTSTYLE2 ="	<li id='nav-fragment-$count' class='ui-tabs-nav-item ui-tabs-selected' ><a href='#fragment-$count'>$count</a></li>";
			$textinner .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE2, $param);
			$count++;				
		}
	
	$textol .= "<div class='clear'></div>";
	$textinner .= "<div class='clear'></div>" ;
	$texttext .= '</ul>
	</div>
	<script type="text/javascript">var $j=jQuery.noConflict();$j(document).ready(function(){$j("#featured").tabs({fx:{opacity:"toggle",easing:"swing"}}).tabs("rotate",5000,true);});</script>
	' ;	
	$text .= $textol ;
	$text .= $textinner ;
	$text .= $texttext ;
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($text);
?>