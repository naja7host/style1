<?php
	
if ($pref['frontpage_news_silder1_vit'])
	$vitese = $pref['frontpage_news_silder1_vit'];
else 
	$vitese = "5000";	
	
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
	$text = '
	<div class=" slideindex">		
		<div class="contentslide c1" id="slider1">
			<div class="opacitylayer">	
	' ;

	$count = 0;
	// do
	// {
		// 
		foreach($newsList  as $row )
		// while (list($key, $row) = each($newsList)) 
		{	
			$idnews[] = $row['news_id'];
			$NEWSLISTSTYLE1 = "
				<div class='contentdiv'>
					<h3>{NEWSTITLELINK}</h3>
					{NEWSIMAGE}
					<div class='headline_body' >
						{NEWSBODY=120}{EXTENDED}	
					</div>
				</div>			
			" ;		
			$count++;
			if ($count <= $pref['frontpage_news_slider'])
				$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);

		}	
	// } while($count < $pref['frontpage_news_slider']); 	
	
	$text .= '
				<div class="pagination p1" id="paginate-slider1"></div>				
			</div>
		</div>	
		<link rel="stylesheet" type="text/css" href="' . THEME . 'sliders/slider1/slidercss.css" />
		<script type="text/javascript" src="' . THEME . 'sliders/slider1/contentslider.js" ></script>	
		<script type="text/javascript">ContentSlider("slider1", '. $vitese .')</script>
	</div>
	<div class="clearfix"></div><!-- End Slider -->		
	' ;	
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($vitese);
	unset($text);
?>