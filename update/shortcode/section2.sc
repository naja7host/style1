	require_once(e_HANDLER."news_class.php");	
	global $tp, $ns , $ix ;
	$ix = new news;
	
	if(!$pref['frontpage_news_section1'])
		$pref['frontpage_news_section1'] = 2 ;

	if(!$pref['frontpage_news_section1_limit'])
		$pref['frontpage_news_section1_limit'] = 5 ;
		
		
	$cat	= $pref['frontpage_news_section1'];	
	$limit	= $pref['frontpage_news_section1_limit'];
	$pref['shortdate'] = "%d %B %Y / %H:%M";
	
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";	
	
		
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
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
					$NEWSLISTSTYLE1 = '
					
					<div class="authors-pen-2">					
						<div style="_width:80px;_float:right;_position:static;">{NEWSIMAGETHUMB}</div>

						<div class="link-2">
							{NEWSTITLELINK=extend}
							<br />
							<div class="clear"></div>							
							<div class="authors-pen-small-2" style="float:right;">{NEWSAUTHOR}</div>
						</div>
						<div class="clear"></div>
					</div>

					';
					$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
				$text .= "
					<div class='clear'></div>
				</div>
				<a class='authors-pen-moreposts' href='".e_BASE."news.php?cat.$news_category' > ". LAN_THEME_33 .$category_name." ...</a>
						
";
				$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";

			}
		
	$ns -> tablerender($caption, $text);
	unset($pref['shortdate']);