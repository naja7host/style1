	require_once(e_HANDLER."news_class.php");	
	global $tp, $ns , $ix , $totalviews  ;
	$ix = new news;
	
	if(!$pref['frontpage_news_section1'])
		$pref['frontpage_news_section1'] = 2 ;

	if(!$pref['frontpage_news_section1_limit'])
		$pref['frontpage_news_section1_limit'] = 5 ;
		
		
	$cat	= $pref['frontpage_news_section1'];	
	$limit	= $pref['frontpage_news_section1_limit'];
	$pref['shortdate'] = "%d %B ";
	
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";	
	
		
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon , v.total_views FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			LEFT JOIN #views AS v ON n.news_id = v.news_id
			WHERE news_category='$cat'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")  
			ORDER BY n.news_datestamp DESC LIMIT 0,$limit";

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
				$text = "";
				
					while($row = $sql -> db_Fetch()){
					extract($row);
					$url = make_url($row);									
					$NEWSLISTSTYLE1 = "
						<div class='list-posts-video' >
							<div>
								{NEWSIMAGETHUMB}	
								<div class='list-posts-video-meta'>{NEWSDATE=short} / ". LAN_THEME_31 . $total_views  . LAN_THEME_32 ."</div>
								{NEWSTITLELINK=extend}
							</div>	
						</div>
					";
					$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
				$text .= "";
				//$text .= "<div class='spacer'></div><a href='".e_BASE."news.php?cat.$news_category' class='more left'>".LAN_THEME_15."</a>";
				$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";

			}
		
	$ns -> tablerender($caption, $text);