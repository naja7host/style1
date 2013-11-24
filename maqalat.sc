	//echo $pref['frontpage_news_block2'] ;
	switch ($pref['frontpage_news_block2']) 
	{
		case '0' :
			global $ns ;
			$text = '
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-7107362594811938";

			google_ad_slot = "6296793303";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
			';				
			$ns -> tablerender(LAN_THEME_34, $text);
		break;
		
		case  '1' :	
			echo "1";
			return;				
		break;	
		
		case  '2' :
			//echo "2";
			require_once(e_HANDLER."news_class.php");	
			global $ns , $ix ;
			$ix = new news;
			
			if ($parm == '')
				$limit = 4 ;
			else 
				$limit = $parm ;
			
			$cat = $pref['frontpage_news_block2_sect'] ;
			$nobody_regexp = "'(^|,)(".str_replace(",", "|", e_UC_NOBODY).")(,|$)'";	
			
			$query = "SELECT n.*, u.user_id, u.user_name, u.user_customtitle, nc.category_name, nc.category_icon FROM #news AS n
			LEFT JOIN #user AS u ON n.news_author = u.user_id
			LEFT JOIN #news_category AS nc ON n.news_category = nc.category_id
			WHERE news_category='$cat'  AND n.news_class REGEXP '".e_CLASS_REGEXP."' AND NOT (n.news_class REGEXP ".$nobody_regexp.")
			AND n.news_class IN (".USERCLASS_LIST.") AND n.news_start < ".time()." AND (n.news_end=0 || n.news_end>".time().")  
			ORDER BY n.news_datestamp DESC LIMIT 0,".$limit."";

			if(!$sql->db_Select_gen($query))
			{
				$text = "";
			} 
			else 
			{
				$text = "<ul class='nb2_next2_news' >";
				
					while($row = $sql -> db_Fetch()){
					extract($row);
					$url = make_url($row);									
					$NEWSLISTSTYLE1 = "
					<li>
						<div class='nb2_next2_img'>
							{NEWSIMAGETHUMB}
						</div>
						{NEWSTITLELINK=extend}
						<div class='nb2_meta'>
							<span class=' news_date'>{NEWSSUMMARY}</span>
						</div>
					</li>
					";
					$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);
				}
				$text .= "</ul>";
				$text .= "<div class='spacer'></div><a href='".e_BASE."news.php?cat.$news_category' class='more left'>".LAN_THEME_15."</a>";
				$caption = "<a href='".e_BASE."news.php?cat.$news_category' >".$category_name."</a>";
				$ns -> tablerender($caption, $text);
			}		
			return;				
		break;			
	}		
	