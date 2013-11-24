if (isset($pref['plug_installed']['ytm_gallery']))
{
	$ns = new e107table;
	$tp = new e_parse;

	$lan_file = e_PLUGIN."ytm_gallery/languages/".e_LANGUAGE.".php";
	require_once(file_exists($lan_file) ? $lan_file :  e_PLUGIN."ytm_gallery/languages/English.php");

	$sql = new db;
	

	$query  = "
	SELECT random_menu, static_menu, menu_width, menu_height, title_menu, seo,disp_download, active FROM ".MPREFIX."er_ytm_gallery yg
	LEFT JOIN ".MPREFIX."er_ytm_gallery_movies gm ON yg.static_menu = gm.movie_code
	WHERE id = '1'";


	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		$random           = $row['random_menu'];
		$static_id        = $row['static_menu'];
		$pict_width       = $row['menu_width'];
		$pict_height      = $row['menu_height'];
		$film_menu        = $row['title_menu'];
		$static_check     = $row['active'];
		$store_seo		  = $row['seo'];
		$number			  = $row['disp_download'];
		//$number = 5;
	}
	
	
	$classes = e_CLASS_REGEXP;
	$classes = str_replace("(^|,)(", "", $classes);
	$classes = str_replace(")(,|$)", "", $classes);
	$classes = (explode("|",$classes));


	$qspec_i = 0;
	
	foreach($classes as $class) {
		$qspec = $class;
		if (!$qspec_i == 0) {$pre_qspecq = "OR";}
		$qspecq .= "$pre_qspecq cat_auth = '$qspec' ";
		$qspec_i++;
	}
	
	$auth_spec .=  "($qspecq)";

		$query02 = "SELECT movie_code,  movie_title, movie_category, cat_id, cat_auth , total_views FROM ".MPREFIX."er_ytm_gallery_movies ym
					  LEFT JOIN ".MPREFIX."er_ytm_gallery_category yc ON ym.movie_category = yc.cat_id
					  LEFT JOIN ".MPREFIX."views v ON v.news_id = ym.movie_code
					  WHERE ".$auth_spec." AND active = '1' AND input_status = '1' ORDER by timestamp DESC LIMIT 0,".$number."";
					  

		$result02       = mysql_query($query02);
		$num_rows02     = mysql_num_rows($result02);
		while ($row02 = mysql_fetch_array($result02,MYSQL_ASSOC)) 
		{
			$movie_code      = $row02['movie_code'];
			$movie_title     = $row02['movie_title'];
			$gal_m_user      = $row02['input_user'];
			$gal_m_cat       = $row02['cat_name'];
			$total_views       = $row02['total_views'];
			if ( $store_seo == 1 ) 
			  // Display Gallery with full information above
			  $ytm_text .= "
				<div class='list-posts-video' >
					<div>
						<a href='" . SITEURL . "video/show/$movie_code.html' title='$movie_title' >
							<img class='videoplay' src='http://i.ytimg.com/vi/$movie_code/0.jpg' alt='$movie_title' style='border:0;'  />
						</a>
						<div class='list-posts-video-meta'> ". LAN_VIDEO_SHOW ." ". $total_views." </div>
						<div class='list-posts-video-play'></div>
						<a href='" . e_HTTP . "video/show/$movie_code.html' title='$movie_title' >$movie_title</a>
					</div>	
				</div>
				";

			else 
				$ytm_text .= "
				<div class='list-posts-video' >
					<div>					
						<a href='" . e_PLUGIN."ytm_gallery/ytm.php?view=$movie_code' title='$movie_title' >
							<img  class='videoplay' src='http://i.ytimg.com/vi/$movie_code/0.jpg' alt='$movie_title' style='border:0;' />
						</a>
						<div class='list-posts-video-meta'> ". LAN_VIDEO_SHOW ." ". $total_views." </div>
						<div class='list-posts-video-play'></div>
						<a href='" . e_PLUGIN."ytm_gallery/ytm.php?view=$movie_code' title='$movie_title' >$movie_title</a>
					</div>
				</div>
				";
			
		}
		
		if ( $store_seo == 1 ) 	
			$ytm_text .= "<div class='more-video ' ><a href='" . e_HTTP . "video/list/' title='".LAN_YTM_PLUGIN_9."' >" . LAN_YTM_PLUGIN_9 . "</a></div>";
		else 
			$ytm_text .= "<div class='more-video ' ><a href='" . e_PLUGIN."ytm_gallery/ytm.php' title='".LAN_YTM_PLUGIN_9."' >" . LAN_YTM_PLUGIN_9 . "</a></div>";	
			

		if ( $store_seo == 1 ) 	
			$capvideo .= "<a href='" . e_HTTP . "video/list/' title='".LAN_YTM_PLUGIN_9."' >" . $film_menu . "</a>";
		else 
			$capvideo .= "<a href='" . e_PLUGIN."ytm_gallery/ytm.php' title='".LAN_YTM_PLUGIN_9."'>" . $film_menu . "</a>";	
			
	$ns -> tablerender($capvideo, $ytm_text, "video");
}