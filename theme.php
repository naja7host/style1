<?php
/*---------------------------------------------------------------+
|	Long Live The Machines!
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://www.gnu.org).
+---------------------------------------------------------------*/
if (!defined('e107_INIT')) { exit; }

if (e_LANGUAGE == "Arabic")
	$themename = " الستايل الإخباري - الشكل 1 ";
else 
	$themename = " News Style - Design 1 ";
	
include_lan(THEME."languages/".e_LANGUAGE.".php");
//@include_lan(THEME."languages/English.php");

include('urlrewrite.php');
include('functions.php');
//$row['news_allow_comments'] = 0;
// [theme]

	
$themeversion = "4.0";
$themeauthor = "Naja7Host";
$themedate = "18-09-2013";
$themeinfo = "e107v7+";
$THEME_DISCLAIMER = LAN_THEME_6 ;
$themerawname = "style1";
$layout = "_default";

$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
$no_core_css = TRUE;

// Core SHortcodes
$register_sc[] = "NEWSIMAGE";
$register_sc[] = "NEWSIMAGETHUMB";
$register_sc[] = 'NEWSTITLELINK';
$register_sc[] = 'NEWSBODY';
$register_sc[] = 'EXTENDED';
$register_sc[] = 'NEWSCOMMENTS';

// Custom Menus 
$register_sc[] = 'LAST24';
$register_sc[] = 'FACEBOOK';
$register_sc[] = 'VIDEO';

// Addons
$register_sc[] = 'INDEX';
$register_sc[] = 'SLIDER';
$register_sc[] = "TICKER";
$register_sc[] = 'MAQALAT';
$register_sc[] = 'TA7RIR';
$register_sc[] = 'CARICATURE';
$register_sc[] = 'PHOTOGRAPH';
$register_sc[] = 'FOOTERLINKS';

$register_sc[] = 'SHARE';
$register_sc[] = 'SHOURTURL';

$register_sc[] = 'LASTBLOCK';
$register_sc[] = 'ADMINTOOLS';
$register_sc[] = 'SOCIALICONS';

// Ads
$register_sc[] = 'ADS300X250';
//$register_sc[] = 'ADS728';



define("STANDARDS_MODE", TRUE);
define("LOGOSTYLE", "style='float: left; border: 0; margin-right: 10px;'");


// [header function]
function theme_head() {

	$headerstyle = "
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<link href='".THEME_ABS."css/".TEXTDIRECTION."bootstrap.css' rel='stylesheet'  media='screen' />
		<link href='".THEME_ABS."css/".TEXTDIRECTION."bootstrap-theme.css' rel='stylesheet'  media='screen' />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
		  <script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
		<![endif]-->		
		<!--[if lt IE 9]>
			<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
		<![endif]-->		
		<link href='".THEME_ABS."css/template.css' rel='stylesheet'  media='screen' />";
		
	if(defined("COLORSTYLE"))
		$headerstyle .= "<link href='".THEME_ABS."css/colors/".COLORSTYLE.".css' rel='stylesheet' />";	
		
	if(defined("FONTS"))
		$headerstyle .= "<link href='".THEME_ABS."css/fonts/".FONTS.".css' rel='stylesheet' />";			
		
	if(defined("TEXTDIRECTION"))
		$headerstyle .= "<link href='".THEME_ABS."css/".TEXTDIRECTION.".css' rel='stylesheet' />";

	$headerstyle .= "
	<script type='text/javascript' src='".THEME_ABS."js/jquery.js'></script>
	<script type='text/javascript' src='".THEME_ABS."js/jquery-ui.min.js'></script>
	";
	if(!stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'admin-theme.php') == TRUE)
		return $headerstyle;
}

$HEADER = "
<div class='container'>
	<header class='navbar navbar-default navbar-static-top' role='navigation'>
		<div class='navbar-header'>
			<button class='navbar-toggle' type='button' data-toggle='collapse' data-target='.bs-navbar-collapse'>
				<span class='sr-only'>Toggle navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			
		</div>

		<nav class='collapse navbar-collapse bs-navbar-collapse' role='navigation'>				
			{LINKSTYLE=topnav}
			{SITELINKS=flat:1}				
		
			<ul class='nav navbar-nav navbar-right'>				
				{SOCIALICONS}
			</ul>
		</nav>
	</header>
	<div class='clearfix'></div><!-- End Header -->
			
	<div class=' '>				
		<div class='col-md-3  logo'>	
			".$logo."
		</div>				
		<div class='col-md-9 ad_top_wrap'>	
			{BANNER=campaign_one}
		</div>				
	</div>
	<div class='clearfix'></div><!-- End Log ADS -->
		
	{ADMINTOOLS}
	
	
	<div class=' navbar-inner nav-container '>
		{MENU=4}	
	</div>
	<div class='clearfix'></div><!-- End Section  -->
	
	<!-- Sharit -->	
	<div class=' breaking-news-wrap'>
		<div class='col-md-3 breaking-title'>{PLUGIN=clock_menu}</div>
		<div class='tickercontainer'>	".LAN_THEME_14. " : {TICKER}</div>			
	</div>
	<div class='clearfix'></div><!-- End Sharit -->	

	<div class='body-content '>
		<div class='row '>		
			<div class='col-md-8 '>";
	
$FOOTER = "	
			</div>
			<div class='col-md-4 '>
				<aside>
					{SETSTYLE=menu}
					{VIDEO}
					{MENU=1}
					{BANNER=campaign_two}
					{MENU=2}
					{MENU=3}
					{MENU=5}
				</aside>
			</div>
			<div class='clearfix'></div>		
		</div>
	</div>
	
	{FOOTERLINKS}
	
	<div id='footer' class='row footer nopadding '>
		<div class='inner'>
			<div class='col-md-8 '>
				<p class='copyrights muted'><small>  {SITEDISCLAIMER} </small></p>
				<!-- Developped AND design by Naja7host.com  -->
			</div>	
			<div class='col-md-4 '>
				<p class='text-muted '><h6>$THEME_DISCLAIMER</h6></p>
				<!-- Developped AND design by Naja7host.com  -->
			</div>		
		</div> <!--End Inner-->
	</div> <!--end bottom Bar-->	
	
</div>		
<!-- Placed at the end of the document so the pages load faster -->
<script type='text/javascript' src='".THEME_ABS."js/bootstrap.min.js'></script>
<!-- Developped AND design by Naja7host.com  -->
";

$java = "
<script type='text/javascript' src='".THEME_ABS."js/jquery.cycle.all.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.tools.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.cookie.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.jplayer.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/effects.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.tweet.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.prettyPhoto.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.tipsy.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.fitvids.js?ver=3.5.1'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.li-scroller_r.1.0.js?ver=3.5.1'></script>"; 

// Index template
//$HEADERINDEX = $HEADER ;
$HEADERINDEX = "
<div class='container'>
	<header class='navbar navbar-default navbar-static-top' role='navigation'>
		<div class='navbar-header'>
			<button class='navbar-toggle' type='button' data-toggle='collapse' data-target='.bs-navbar-collapse'>
				<span class='sr-only'>Toggle navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			
		</div>

		<nav class='collapse navbar-collapse bs-navbar-collapse' role='navigation'>				
			{LINKSTYLE=topnav}
			{SITELINKS=flat:1}				
		
			<ul class='nav navbar-nav navbar-right'>				
				{SOCIALICONS}
			</ul>
		</nav>
	</header>
	<div class='clearfix'></div><!-- End Header -->
			
	<div class=' '>				
		<div class='col-md-3  logo'>	
			".$logo."
		</div>				
		<div class='col-md-9 ad_top_wrap'>	
			{BANNER=campaign_one}
		</div>				
	</div>
	<div class='clearfix'></div><!-- End Log ADS -->
		
	{ADMINTOOLS}
	
	<div class=' navbar-inner nav-container '>
		{MENU=4}	
	</div>
	<div class='clearfix'></div><!-- End Section  -->
	
	<!-- Sharit -->	
	<div class=' breaking-news-wrap'>
		<div class='col-md-3 breaking-title'>{PLUGIN=clock_menu}</div>
		<div class='tickercontainer'>	".LAN_THEME_14. " : {TICKER}</div>			
	</div>
	<div class='clearfix'></div><!-- End Sharit -->	

	<div class='body-content '>
		<div class='row '>
			<div class='col-md-8 '>
				{SLIDER}
			</div>
			<div class='col-md-4 '>
				<aside>
					{SETSTYLE=menu}
					{TA7RIR}
					{MAQALAT}
				</aside>
			</div>
			<div class='clearfix'></div>
		</div>
		
		{INDEX}		
		<div class='clearfix'></div>
		
		<div class='row '>
			<div class='col-md-12 '>
				{VIDEO}
			</div>
		</div>	
		<div class='clearfix'></div>
		
		{SETSTYLE=3col}
		{MENU=6}
		
		{PLUGIN=views}
		{PHOTOGRAPH}
		{CARICATURE}	
	
		<div class='clearfix'></div>
		<div class='row'>
			{SETSTYLE=newsindex}
			{FACEBOOK}
			{MENU=5}
		</div>	
		
		<div class='clearfix'></div>" ;

$FOOTERINDEX = "	
	</div>
	<div class='clearfix'>  </div>
	
	{FOOTERLINKS}
	
	<div id='footer' class='row footer nopadding '>
		<div class='inner'>
			<div class='col-md-8 '>
				<p class='copyrights muted'><small>  {SITEDISCLAIMER} </small></p>
				<!-- Developped AND design by Naja7host.com  -->
			</div>	
			<div class='col-md-4 '>
				<p class='text-muted '><h6>$THEME_DISCLAIMER</h6></p>
				<!-- Developped AND design by Naja7host.com  -->
			</div>		
		</div> <!--End Inner-->
	</div> <!--end bottom Bar-->	
</div>
<!-- Placed at the end of the document so the pages load faster -->
<script type='text/javascript' src='".THEME_ABS."js/bootstrap.min.js'></script>
<script type='text/javascript' src='".THEME_ABS."js/custom.js'></script>
<!-- Developped AND design by Naja7host.com  -->
";
$FOOTERINDEX .="
<link href='".THEME_ABS."sliders/".$pref['frontpage_news_slider_type']."/slider.css' rel='stylesheet'></link>
<script type='text/javascript' src='".THEME_ABS."sliders/".$pref['frontpage_news_slider_type']."/slider.js'></script>
<script type='text/javascript' src='".THEME_ABS."js/jquery.cycle.all.min.js?ver=3.5.1'></script>" ;

$CUSTOMHEADER['index'] = $HEADERINDEX ;
$CUSTOMFOOTER['index'] = $FOOTERINDEX ;
$CUSTOMPAGES['index']  = SITEURL.'index.php';

/*
$CUSTOMHEADER['news'] = $HEADER ;
$CUSTOMHEADER['news'] .= "
	<aside>
		<div class='span4'>
			{SETSTYLE=menu}
			{VIDEO}
			{MENU=1}
			{BANNER=campaign_two}
			{MENU=2}
			{MENU=3}
		</div>
	</aside>
	<div class='span8'>" ;

$CUSTOMFOOTER['news'] = "
	</div>" ;
$CUSTOMFOOTER['news'] .= $FOOTER ;
$CUSTOMPAGES['news']  = 'news.php contact submit page ytm.php';
*/


$CUSTOMHEADER['others'] = $HEADER ;
$CUSTOMHEADER['others'] .= "
	<aside>
		<div class='span4'>
			{SETSTYLE=menu}
			{VIDEO}
		</div>
	</aside>
	<div class='span8'>" ;

$CUSTOMFOOTER['others'] = "
	</div>" ;
$CUSTOMFOOTER['others'] .= $FOOTER ;
$CUSTOMPAGES['others']  = 'others';

// admin templates 
$CUSTOMHEADER['admin-theme'] = " ";
$CUSTOMFOOTER['admin-theme'] = " ";
$CUSTOMPAGES['admin-theme']  = 'admin-theme.php';



// You can customize the news-category bullet listing here.
$NEWSARCHIVE ="<div>
		<table style='width:98%;'>
		<tr>
		<td>
		<div>{ARCHIVE_BULLET} <b>{ARCHIVE_LINK}</b> <span class='smalltext'><i>{ARCHIVE_AUTHOR} @ ({ARCHIVE_DATESTAMP}) ({ARCHIVE_CATEGORY})</i></span></div>
		</td>
		</tr>
		</table>
		</div>";
		
$NEWSLISTSTYLE = "	
	<article >
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<h2 class='panel-title'>{NEWSTITLELINK=extend}</h2>
			</div>
			<div class='panel-body item-list'>
				<div class='col-md-3 thumbnail post-thumbnail '>{NEWSIMAGETHUMB}</div>
				<div class='col-md-8 entry'>
					<p>{NEWSBODY}{EXTENDED}</p>
					<span class='label label-default'>".LAN_THEME_40." {NEWSDATE} <span class='divider'>/</span> ".LAN_THEME_36."  {NEWSCOMMENTCOUNT} </span> 
				</div>
			</div>		
		</div>	
	</article>";

$NEWSSTYLE = "";
if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) 
{
	$NEWSSTYLE .= "
	<div class='well well-small text-center'>
		{BANNER=campaign_one}
	</div>
    <ul class='breadcrumb'>
		<li><a href='". SITEURL ."' >".LAN_THEME_7."</a> <span class='divider'>/</span></li>
		<li>{NEWSCATEGORY} <span class='divider'>/</span></li>
		<li class='active'>{NEWSTITLELINK}</li>
    </ul>
	
    <div class='breadcrumb'>
		<span class='glyphicon glyphicon-time'></span> ".LAN_THEME_40." {NEWSDATE}
		<div class='btn-group pull-right'>
			<button type='button' class='btn btn-default'>".LAN_THEME_39."</button>
			<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
				<span class='caret'></span>
				<span class='sr-only'>Toggle Dropdown</span>
			</button>
			<ul class='dropdown-menu' role='menu'>
				<li> </li>
				<li>{EMAILICON} {PRINTICON} {ADMINOPTIONS}</li>
				<li class='divider'></li>
				<li>{PDFICON}{TRACKBACK}</li>
			</ul>
		</div>		

		<div class='clearfix'>  </div>	
    </div>	

	<div class='well'>	
		<article>	
			<div class='alert title-news text-center'>
				<h1>{NEWSTITLE}</h1>
			</div>
			
			<div class='panel panel-default text-center'>
			  <div class='panel-body'>
				{NEWSIMAGE}
			  </div>
			  <div class='panel-footer'>{NEWSSUMMARY}</div>
			</div>

			<p class='text-justify'>{NEWSBODY}</p>
			<div class='clearfix'>  </div>	
			
			<div class='alert title-news'>
				{SHARE}
				<div class='clearfix'>  </div>	
			</div>
			
			{SHOURTURL}
			
		</article>	
	</div>
	<div class='well well-small'>
		<span class='glyphicon glyphicon-user'></span> ".LAN_THEME_4."  : {NEWSAUTHOR} <div class='clear'>  </div>
		 <div class='clear'>  </div>
		<span class='glyphicon glyphicon-tasks'></span> {VIEWS} <div class='clear'>  </div>
		<span class='glyphicon glyphicon-comment'></span> ".LAN_THEME_36." {NEWSCOMMENTCOUNT} <div class='clear'>  </div>
		{PDFICON} {EMAILICON} {PRINTICON} {ADMINOPTIONS} {TRACKBACK} <div class='clear'>  </div>
	</div>
	
	{NEWSCOMMENTS}	
	";
} else {
	$NEWSSTYLE .= "
	<article >
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<h3 class='panel-title'>{NEWSTITLELINK=extend}</h3>
			</div>
			<div class='panel-body item-list'>
				<div class='col-md-3 thumbnail post-thumbnail '>{NEWSIMAGETHUMB}</div>
				<div class='col-md-8 entry'>
					<p>{NEWSBODY}{EXTENDED}</p>
					<span class='label label-default'>{NEWSDATE} <span class='divider'>/</span> ".LAN_THEME_36." {NEWSCOMMENTCOUNT} </span> 
				</div>
			</div>					
		</div>	
	</article>";
};


//	[tablestyle]
function tablestyle($caption, $text, $mode){
global $style ;

	switch ($mode) 
	{
		case 'no_caption' :
			echo $text;
		return;	
		break;
		
		case  'clock' :
			echo $text;	
		return;				
		break;
		
		case 'facebook':
		echo "
		<div class='row'>			
				<h4 class='widget-facebook'>".$caption."</h4>			
			<div class='border_box ads'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>";	
		return;				
		break;		

		case 'newsindex':
		echo "
		<div class='col-md-6 bottom '>
			<div class='title_box'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		";			
		return;		
		break;
		
		case 'newsindex_3col':
		echo "
		<div class='col-md-4 noleft'>
			<div class='title_box'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div><div class='clear'></div>
		";			
		return;		
		break;		
	}
	
	switch ($style) 
	{	
		case 'facebook':
		echo "
		<div class='row'>			
				<div class='widget-facebook'><h4 >".$caption."</h4></div>		
			<div class='border_box ads'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>";		
		break;

		case 'up':
		echo "
			<div class='box_outer widget_search'>
				<div class='widget'>
					<h3 class='widget-up'>".$caption."</h3>
					<div class='wid_border'></div>				
					".$text."
				</div>
			</div>";		
		break;
		
		case 'down':
		echo "
			<div class='box_outer widget_search'>
				<div class='widget'>
					<h3 class='widget-down'>".$caption."</h3>
					<div class='wid_border'></div>				
					".$text."
				</div>
			</div>";		
		break;
		
		case 'menu':
		echo "
			<div class='title_box text-right'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box  '>				
				".$text."
			</div>			
			<div class='clear'></div>";
		break;
		
		case 'photo':
		echo "
			<div class='box_outer photo'>
				<div class='widget'>
					<h3 class='widget_title'>".$caption."</h3>
					<div class='wid_border'></div>				
					".$text."
				</div>
			</div>";
		break;

		case 'darkred':
		echo "
			<div class='box_outer banner'>
				<div class='widget'>
					<h3 class='darkred widget_title'>".$caption."</h3>
					<div class='wid_border'></div>				
					".$text."
				</div>
			</div>";
		break;
		
		case 'voilet':
		echo "
			<div class='box_outer widget_recent'>
				<div class='widget'>
					<h3 class='voilet widget_title'>".$caption."</h3>
					<div class='wid_border'></div>				
					".$text."
				</div>
			</div>";
		break;
		
		case 'search':
		echo "<div class='box_outer widget_search'>
					<div class='widget'>
						".$text."
					</div>
				</div>";
		break;	
		
		case 'ads':
		echo "
		<div class='row'>
			<div class='title_box text-right'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box ads'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>";	
		break;		

		case '3col':
		echo "
		<div class='col-md-4 noleft'>
			<div class='title_box text-right'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		";	
		break;

		case 'newsindex':
		echo "
		<div class='span6 newsbox_index'>
			<div class='title_box'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box'>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>";			
		return;		
		break;		
		
		default:
		echo "
		<div class='row box-wrapper clearfix'>
			<div class='title_box text-right'>
				<h4>".$caption."</h4>
			</div>
			<div class='border_box '>				
				".$text."
			</div>			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>";			
		break;
	}	
}

	
// linkstyle
// http://wiki.e107.org/?title=Styling_Individual_Sitelink_Menus
function linkstyle($np_linkstyle) 
{
	// Common to all styles (for this theme)
	$linkstyleset['linkdisplay']      = 1;  /* 1 - along top, 2 - in left or right column */
	$linkstyleset['linkalign']        = "center";

	// Common sublink settings
	// NOTE: *any* settings can be customized for sublinks by using
	//       'sub' as a prefix for the setting name. Plus, there's "subindent"
	//  $linkstyleset['sublinkclass'] = "mysublink2;
	//  $linkstyleset['subindent']    = " ";

	// Now for some per-style setup
	switch ($np_linkstyle)
	{
		case 'topnav':
			$linkstyleset['linkdisplay']      = 1;
			$linkstyleset['prelink'] = "<ul class='nav navbar-nav'>";
			$linkstyleset['postlink'] = "</ul>";
			$linkstyleset['linkstart'] = "<li class='page_item '>";
			$linkstyleset['linkend'] = "</li>";
			$linkstyleset['linkstart_hilite'] = "";
			$linkstyleset['linkclass_hilite'] = "";
			$linkstyleset['linkseparator'] = "<li class='divider-vertical'></li>";
		break;
		
		case 'topnav2':
			$linkstyleset['linkdisplay']      = 1;
			$linkstyleset['prelink'] = "<ul id='menu- ' class='menu-category'>";
			$linkstyleset['postlink'] = "</ul>";
			$linkstyleset['linkstart'] = '<li class="menu-item">';
			$linkstyleset['linkend'] = "</li>";
			$linkstyleset['linkstart_hilite'] = '<li class="current-menu-item">';
			$linkstyleset['linkclass_hilite'] = "";
			$linkstyleset['linkseparator'] = ""; //
			$linkstyleset['sublinkclass'] = "<ul class='sub-menu'>";
		break;	

		case 'topbar':
			$linkstyleset['prelink'] = "<ul>";
			$linkstyleset['postlink'] = "</ul>";
			$linkstyleset['linkstart'] = "<li>";
			$linkstyleset['linkend'] = "</li>";
			$linkstyleset['linkstart_hilite'] = "<li class='current_page_item'>";
			$linkstyleset['linkclass_hilite'] = "";
			$linkstyleset['linkseparator'] = "";
		break;
		
		default: // if no LINKSTYLE defined
			$linkstyleset['prelink'] = "<ul class='menu'>";
			$linkstyleset['postlink'] = "</ul>";
			$linkstyleset['linkstart'] = "<li>";
			$linkstyleset['linkend'] = "</li>";
			$linkstyleset['linkstart_hilite'] = "";
			$linkstyleset['linkclass_hilite'] = "";
			$linkstyleset['linkclass'] = "";
			$linkstyleset['sublinkclass'] = "";
	}
	return $linkstyleset;
}


define("OTHERNEWS_LIMIT",10);
define("COMMENTLINK", LAN_THEME_1);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "");
define("EXTENDEDSTRING", LAN_THEME_3);
define("POST_EXTENDEDSTRING", "");

// icons
define("ICONPRINT", TEXTDIRECTION."printer.png");
define("ICONMAIL", TEXTDIRECTION."email.png");
define("ICONPRINTPDF", TEXTDIRECTION."pdf.png");
define("ICONSTYLE", "float: right; border: 0; margin-right: 10px;");

?>