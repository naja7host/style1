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
	<div class="head66"></div>
	<!-- Main Slider -->
	<div class="box news_headlines" auto_news_headlines="9000">		
		<div class="head"></div>
		<div class="content">
			<div class="arena ">';		
	$textol ="" ; 
	$textinner = "<ul class='news_list col-md-5 '>" ; 
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
					<div class='wrapper '  ".$style." >
						<div class='headline'>{NEWSTITLELINK=80}</div>						
						<div class='img_teaser col-md-7 nopadding'>
							{NEWSIMAGE=&amp;h=496&amp;w=695&amp;zc=1}
							<p class='caption'>{NEWSBODY=70}{EXTENDED}</p>
							<span class='cat cat-".$row['news_category']."'>{NEWSCATEGORY}</span>
						</div>	
					</div>";
			$textol .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);		
			
			$NEWSLISTSTYLE2 ="	<li ".$class." >{NEWSTITLELINK}</li>";
			$textinner .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE2, $param);
			$count++;				
		}
	
	$textol .= "";
	$textinner .= "" ;
	$texttext .= "
				</ul>
			</div>	
		</div>
		<div class='foot'></div>
	</div>
	" ;	
	$text .= $textol ;
	$text .= $textinner ;
	$text .= $texttext ;
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($text);
?>