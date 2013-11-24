<?php

if (!defined('e107_INIT')) { exit; }

define('FONTS', "font");
define('ADMINTOOLS', false);

//XXX XURL Definitions. 

$xurls = array(
	'facebook'		=> 	array('label'=>"Facebook", "placeholder"=>"eg. https://www.facebook.com/naja7host"),
	'twitter'		=>	array('label'=>"Twitter",	"placeholder"=>"eg. https://twitter.com/naja7host"),
	'youtube'		=>	array('label'=>"Youtube",	"placeholder"=>"eg. https://youtube.com/naja7host"),
	'google'		=>	array('label'=>"Google+",	"placeholder"=>""),
	'linkedin'		=>	array('label'=>"LinkedIn",	"placeholder"=>"eg. http://www.linkedin.com/groups?home=&gid=1782682"),
	'github'		=>	array('label'=>"Github",	"placeholder"=>"eg. https://github.com/e107inc"),
	'flickr'		=>	array('label'=>"Flickr",	"placeholder"=>""),
	'instagram'		=>	array('label'=>"Instagram",	"placeholder"=>""),
	'rss'			=>	array('label'=>"rss",	"placeholder"=>"eg. ". e_SITE . e_PLUGIN ."rss_menu/rss.php"),
);	
	
	// foreach($xurls as $k=>$var)
	// {
		// $keypref = "xurl[".$k."]";
		// $def = "XURL_". strtoupper($k);
		
		// $opts = array('size'=>'xxlarge','placeholder'=> $var['placeholder']);	
		// $text .= "
					// <tr>
						// <td>Your ".$var['label']." page</td>
						// <td>
							// ".$frm->text($keypref, $pref['xurl'][$k], false, $opts)."
							// <div class='field-help'>Used by some themes to provide a link to your ".$var['label']." page. (".$def.")</div>
						// </td>
					// </tr>
				// ";
	// }	

if(is_array($pref['xurl']))
{
	define('XURL_FACEBOOK', varsettrue($pref['xurl']['facebook'], false));
	define('XURL_TWITTER', varsettrue($pref['xurl']['twitter'], false));
	define('XURL_YOUTUBE', varsettrue($pref['xurl']['youtube'], false));
	define('XURL_GOOGLE', varsettrue($pref['xurl']['google'], false));
	define('XURL_LINKEDIN', varsettrue($pref['xurl']['linkedin'], false));
	define('XURL_GITHUB', varsettrue($pref['xurl']['github'], false));
	define('XURL_FLICKR', varsettrue($pref['xurl']['flickr'], false));
	define('XURL_INSTAGRAM', varsettrue($pref['xurl']['instagram'], false));
	define('XURL_RSS', varsettrue($pref['xurl']['rss'],  e_PLUGIN ."rss_menu/rss.php"));
}
else
{
	define('XURL_FACEBOOK', "https://www.facebook.com/naja7host");
	define('XURL_TWITTER', "https://twitter.com/naja7host");
	define('XURL_YOUTUBE', "https://youtube.com/naja7host");
	define('XURL_GOOGLE', false);
	define('XURL_LINKEDIN', false);
	define('XURL_GITHUB', false);
	define('XURL_FLICKR', false);
	define('XURL_INSTAGRAM', false);
	define('XURL_RSS', e_PLUGIN ."rss_menu/rss.php");
}
if ($pref['frontpage_news_colorstyle'])
	define('COLORSTYLE', $pref['frontpage_news_colorstyle']);
else
	define('COLORSTYLE', "blue");

if($pref['frontpage_news_logo'])
	$logo = "<a href='".e_HTTP."'><img ".LOGOSTYLE." src='".THEME_ABS."images/logo".$pref['frontpage_news_logo']."' alt='{SITENAME}' /></a><br style='clear:both' />";
else	
	$logo = "<a href='".e_HTTP."'><img ".LOGOSTYLE." src='".THEME_ABS."images/logo/logo.png' alt='{SITENAME}' /></a><br style='clear:both' />";

if($pref['frontpage_news_slider'])
	$totalnews = $pref['frontpage_news_slider'] ;

else
	$totalnews = 7 ;
	

if(!$pref['frontpage_news_ta7rir'])
	$pref['frontpage_news_ta7rir'] = 2 ;

	
if(!$pref['frontpage_news_last24'])
	$pref['frontpage_news_last24'] = 13 ;	

if(!$pref['frontpage_news_last24_limit'])
	$pref['frontpage_news_last24_limit'] = 10 ;

if(!$pref['frontpage_news_block2_sect'])
	$pref['frontpage_news_block2_sect'] = 3 ;

if(!$pref['frontpage_box_1_limit'])
	$pref['frontpage_box_1_limit'] = 2 ;

if(!$pref['frontpage_box_2_limit'])
	$pref['frontpage_box_2_limit'] = 3 ;

if(!$pref['frontpage_catnews_limit'])
	$pref['frontpage_catnews_limit'] = 4 ;	

if($pref['frontpage_news_showdate'])
	$showdate = "<div class='label-info  news_box_index_newsdate '>{NEWSDATE=short}</div>";

else
	$showdate = "";	

if(!$pref['frontpage_video_limit'])
	$pref['frontpage_video_limit'] = 2 ;

if(!$pref['frontpage_news_photograph'])
	$pref['frontpage_news_photograph'] = 4 ;

if(!$pref['frontpage_news_caricature'])
	$pref['frontpage_news_caricature'] = 2 ;

if(!$pref['frontpage_news_datetype'])
	setlocale(LC_TIME, 'ar_IN');	

	
if(!$pref['frontpage_news_shorturl'])
	$pref['frontpage_news_shorturl'] = true;	
	
// $pref['frontpage_news_ta7rir'] ;	
// $pref['track_online']
//$pref['frontpage_cat_news']  = 2 ; 
// $pref['frontpage_cat_news'] = ;

// $pref['frontpage_news_ta7rir']
// $pref['frontpage_news_block2']
// $pref['frontpage_news_block2_sect']
// $pref['frontpage_video_limit']
// $pref['frontpage_news_block3']
// $pref['frontpage_box_1']
// $pref['frontpage_box_2']
// $pref['frontpage_box_3']
// $pref['frontpage_box_1_limit']

?>