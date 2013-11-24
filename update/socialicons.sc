$socialicons =""; 
if (XURL_FACEBOOK)
	$socialicons .=	"<a target='_blank' href='".XURL_FACEBOOK."'><img class='sface' alt='".LAN_THEME_18."' src='".THEME_ABS."images/blank.png'></a>";		
if (XURL_TWITTER)	
	$socialicons .=	"<a target='_blank' href='".XURL_TWITTER."'><img class='stwitter' alt='".LAN_THEME_17."' src='".THEME_ABS."images/blank.png'></a>";		
if (XURL_YOUTUBE)
	$socialicons .=	"<a target='_blank' href='".XURL_YOUTUBE."'><img class='stube' alt='".LAN_THEME_19."' src='".THEME_ABS."images/blank.png'></a>";	
if (XURL_RSS)
	$socialicons .=	"<a target='_blank' href='".XURL_RSS."'><img class='srss' alt='".LAN_THEME_10."' src='".THEME_ABS."images/blank.png'></a>";
if (XURL_GOOGLE)
	$socialicons .=	"<a target='_blank' href='".XURL_GOOGLE."'><img class='sgoogle' alt='".LAN_THEME_20."' src='".THEME_ABS."images/blank.png'></a>";
if (XURL_FLICKR)
	$socialicons .=	"<a target='_blank' href='".XURL_FLICKR."'><img class='sflickr' alt='".LAN_THEME_23."' src='".THEME_ABS."images/blank.png'></a>";

return $socialicons;
