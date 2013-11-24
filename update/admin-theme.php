<?php

//	$eplug_admin = true;
// if(!empty($_POST) && !isset($_POST['e-token']))
// {
	// $_POST['e-token'] = ''; // TODO - regenerate token value just after access denied?
// }
require_once("../../class2.php");
include_lan(THEME."languages/".e_LANGUAGE."_admin.php");
@include_lan(THEME."languages/English_admin.php");

global $active;

if (!getperms("P"))
{
	header("location:".e_BASE."index.php");
	exit;
}
function core_head() {

	$headerstyle ='
		<!--basic styles-->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="'.THEME_ABS.'themes/font-awesome/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="'.THEME_ABS.'themes/font-awesome/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<link rel="stylesheet" href="'.THEME_ABS.'themes/css/prettify.css" />
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link rel="stylesheet" href="'.THEME_ABS.'themes/css/w8.min.css" />
		<link rel="stylesheet" href="'.THEME_ABS.'themes/css/w8-responsive.min.css" />
		<link rel="stylesheet" href="'.THEME_ABS.'themes/css/w8-skins.min.css" />
		<!--e107 styles-->
		<link rel="stylesheet" href="'.THEME_ABS.'css/admin.css" />	
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="'.THEME_ABS.'themes/css/ace-ie.min.css" />
		<![endif]-->
		<script type="text/javascript" charset="utf-8">
		//<![CDATA[
		jQuery(function() {
		  jQuery(".nav li").each(function() {
			var href = jQuery(this).find("a").attr("href");
			if (href === window.location.pathname) {
			  jQuery(this).addClass("active");
			}
		  });
		});  
		//]]>
		</script>		
		
		';	
	if(defined("TEXTDIRECTION")){
		$headerstyle .= "<link href='".THEME_ABS."css/".TEXTDIRECTION.".css' rel='stylesheet' />";
		$headerstyle .= "<link href='".THEME_ABS."themes/css/w8-responsive-".TEXTDIRECTION.".min.css' rel='stylesheet' />";			
		}
	if(defined("FONTS"))
		$headerstyle .= "<link href='".THEME_ABS."css/".FONTS.".css' rel='stylesheet' />";			
		
	return 	$headerstyle ;
}
require_once(HEADERF);
// require_once(e_ADMIN.'auth.php');
// require_once(e_HANDLER."userclass_class.php");
// require_once(e_HANDLER."form_handler.php");
// require_once(e_HANDLER."ren_help.php");

$action = (e_QUERY) ? e_QUERY : "main";

include("shortcode/admin_header.php");

	switch ($action) 
	{
		case 'main':
		default :
			include("shortcode/admin_default.php");			
		break;
		case 'social':
			include("shortcode/admin_social.php");
		break;			
		case 'style':
			include("shortcode/admin_style.php");
		break;
		case 'pictures':
			include("shortcode/admin_pictures.php");
		break;	
		case 'fonts':
			include("shortcode/admin_fonts.php");
		break;	
		case 'other':
			include("shortcode/admin_other.php");
		break;			
		case 'readme':
			include("shortcode/admin_readme.php");
		break;				
	}				
// 
include("shortcode/admin_footer.php");
// require_once(e_ADMIN."footer.php");

$ns->tablerender(ADSTAT_L6, $text, "no_caption");
require_once(FOOTERF);

?>