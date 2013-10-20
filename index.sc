	global $tp , $ns, $totalnews , $showdate ;
	
	include_lan(e_PLUGIN.'frontpage/languages/'.e_LANGUAGE.'_front.php');
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
	ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$totalnews."";
	
	$sql->db_Select_gen($query);

	if (!$sql->db_Select_gen($query))
	{ 
	  echo "<br /><br /><div style='text-align:center'><b>".(strstr(e_QUERY, "month") ? LAN_NEWS_462 : LAN_NEWS_83)."</b></div><br /><br />";
	} 	

	require_once(THEME."sliders/".$pref['frontpage_news_slider_type'].".php");	
	
	//****************************************************************************//
	//********** 3 Column  **************************************************//
	//****************************************************************************//	
	
	
	for ($i=1 ; $i<4 ; $i++) {
		if ($pref['frontpage_box_'.$i.''] != 0) 
		{
		
			$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$pref['frontpage_box_'.$i.'']."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
			AND n.news_id NOT IN ('".join("','", $idnews)."')
			ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",". $pref['frontpage_box_1_limit'];
			$sql->db_Select_gen($query1);
				
				
				while($row = $sql -> db_Fetch())
				{
					$pref['shortdate'] = "%d-%m-%Y ";
					extract($row);
					$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
					if (strlen($news_thumbnail) == 0)
						$news_thumbnail = "no_image.png";
						
							$NEWSLISTSTYLE1 = "
							<div class='row'>
								<div class='span7 news_box_index_newstitle'><h5 >{NEWSTITLELINK=extend}</h5></div>
								<div class='span5 thumbnail news_box_index_image_thumb '>
									{NEWSIMAGETHUMB}
									".$showdate."
								</div>
							</div>";							
							$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
				$ns -> tablerender($caption , $text, "newsindex_3col");				
				unset($text);	
				unset($caption);
		}
	}
	
	unset($text);	
	unset($caption);	
	
	//****************************************************************************//
	//********** Categories  **************************************************//
	//****************************************************************************//

	
	echo "<div class='row-fluid'>";
	foreach ($pref['frontpage_catnews'] as $i => $value ) {
	
		if ($pref['frontpage_catnews'][$i])
		{
			$sql3 = new db;
			//echo $idnews[1];
			$sql3->db_Select("news_category", "*", "category_id='".$pref['frontpage_catnews'][$i]."' ");
			$cats = $sql3->db_Fetch();
			
			
				$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
				LEFT JOIN #user AS u ON n.news_author = u.user_id
				LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
				WHERE news_category='".$pref['frontpage_catnews'][$i]."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
				AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
				AND n.news_id NOT IN ('".join("','", $idnews)."')
				ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref['frontpage_catnews_limit'];
				$sql->db_Select_gen($query1);

					$count = 0;
					
					while($row = $sql -> db_Fetch())
					{
						$pref['shortdate'] = "%d-%m-%Y ";
						extract($row);
						$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
						if (strlen($news_thumbnail) == 0)
							$news_thumbnail = "no_image.png";						
								$NEWSLISTSTYLE1 = "
								<div class='span6 item-list-index'>
									<div class='span7 news_box_index_newstitle'><h5 >{NEWSTITLELINK=extend}</h5></div>
									<div class='span5 thumbnail news_box_index_image_thumb '>
										{NEWSIMAGETHUMB}
										".$showdate."
									</div>
								</div>";
								
							$news .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
					}
			
			$ns -> tablerender($caption  , $news, "newsindex");
			unset($news);
			unset($caption);
		}
	}
	echo "</div>";
	unset($text);
	unset($caption);
	
	//****************************************************************************//
	//********** 3 Column  **************************************************//
	//****************************************************************************//
	
	
	
	for ($i=4 ; $i<7 ; $i++) {
		if ($pref['frontpage_box_'.$i.''] != 0) 
		{

			$query1 = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='".$pref['frontpage_box_'.$i.'']."'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")
			AND n.news_id NOT IN ('".join("','", $idnews)."')
			ORDER BY n.news_sticky DESC, ".$order." DESC LIMIT ".intval($newsfrom).",".$pref[frontpage_box_2_limit];
			$sql->db_Select_gen($query1);
				
				$count = 0;
				while($row = $sql -> db_Fetch())
				{
					$pref['shortdate'] = "%d-%m-%Y ";
					extract($row);
					$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
					if (strlen($news_thumbnail) == 0)
						$news_thumbnail = "no_image.png";
						
							$NEWSLISTSTYLE1 = "
							<div class='row'>
								<div class='span7 news_box_index_newstitle'><h5 >{NEWSTITLELINK=extend}</h5></div>
								<div class='span5 thumbnail news_box_index_image_thumb '>
									{NEWSIMAGETHUMB}
									".$showdate."
								</div>
							</div>";							
							$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
				$ns -> tablerender($caption , $text, "newsindex_3col");				
				unset($text);	
				unset($caption);
		}
	}
	
	unset($text);	
	unset($caption);	
	