	$ns = new e107table;
	$tp = new e_parse;
	
	$cat = $pref['frontpage_news_photograph'];
	$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";	
	
		
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='$cat'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")  
			ORDER BY n.news_datestamp DESC LIMIT 0,1";

			if(!$sql->db_Select_gen($query))
			{
				$text = "					
						<h3>". LAN_THEME_16 ."</h3>						
						<p>". LAN_THEME_16 ."</p>
						<img src='".THEME."images/logo.png' alt='photo' class='images' />	
				";
			} 
			else 
			{
				$text = "";
					while($row = $sql -> db_Fetch()){
					extract($row);
					$url = make_url($row);
					if (!strlen($news_thumbnail) == 0)				
					$text .= "<a href='$url' title='$news_title' ><img src='".e_IMAGE_ABS."newspost_images/".$news_thumbnail."' alt='$news_title' class='photo' /></a>";
					$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
				}
				$text .= "<a href='".e_BASE."news.php?cat.$news_category' class='more left'>".LAN_THEME_15."</a>";
			}
		
	$ns -> tablerender($caption, $text);
	//return $text;
	unset($text);
	unset($cat);