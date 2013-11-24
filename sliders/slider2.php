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
	$text = "		
			<div class='box_outer' id='feature_outer'>
				<div class='Feature_news'>
					<div class='slider_wrap'>
						<div class='slider_items'>
							<div class='slider'>
								<img class='dummy_slide' src='".THEME_ABS."images/dummy.gif' width='630px' height='340' alt='dummy_slide' />
								";		
	$textol ="" ; 
	$textinner = "							</div> <!--Slider-->							
						</div> <!--Slider Items-->
						<ul class='slider_nav slider_nav_main'>" ; 

		foreach($newsList  as $row )
		{	
			$url = make_url($row);
			$idnews[] = $row['news_id'];
			$textol .= "		<div class='slider_item'>
									<div style='position:relative; overflow:hidden;'>
										<a href='$url' title='".$row['news_title']."' >
											<img src='".e_IMAGE_ABS."newspost_images/".$row['news_thumbnail']."'  alt='".$row['news_title']."' title='".$row['news_title']."' />
										</a>
										<div class='slider_caption'>
											<h2><a href='$url' title='".$row['news_title']."' >".$row['news_title']."</a></h2>
											<p></p>
										</div>
									</div>

								</div> <!--Slider Item-->";
			
			$textinner .="							<li>
								<a href='#'>
									<img src='".e_IMAGE_ABS."newspost_images/".$row['news_thumbnail']."'  alt='".$row['news_title']."' title='".$row['news_title']."' />
								</a>
							</li>";
		}
	
	$textol .= "";
	$textinner .= "" ;
	$texttext .= "						</ul> 
						<div class='clear'></div>
					</div> <!--Slider_wrap-->
				</div> <!--End Feature news-->
			</div> <!--End Feature Outer-->
		<div class='clearfix'></div>" ;	
	$text .= $textol ;
	$text .= $textinner ;
	$text .= $texttext ;
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($text);
?>