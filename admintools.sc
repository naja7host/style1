if (ADMINS && ADMINTOOLS)
	$code = "
		<div class='admin-side' style='left: -158px;position: relative;'>	
			<a href='".e_HTTP."' id='ta-home'><span></span></a>
			<a href='".THEME_ABS."admin_theme.php' id='ta-Settings'><span></span></a>
			<a href='#'  id='ta-comments'><span></span><div class='notification'>2</div></a>
			<a href='#'  id='ta-messages'><span></span><div class='notification'>4</div></a>
			<a href='#'  id='ta-news'><span></span></a>
			<a href='#'  id='ta-video'><span></span></a>
			<a href='#'  id='ta-refresh'><span></span></a>
			<a href='#'  id='ta-update'><span></span></a>
		</div>";
else 
	$code = "";

return $code ;