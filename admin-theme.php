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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="'.THEME_ABS.'css/'.TEXTDIRECTION.'bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="'.THEME_ABS.'assets/js/html5shiv.js"></script>
      <script src="'.THEME_ABS.'assets/js/respond.min.js"></script>
    <![endif]-->
	
	<!--e107 styles-->
	<link rel="stylesheet" href="'.THEME_ABS.'css/admin.css" />		
	';
	
	if(defined("TEXTDIRECTION")){
		$headerstyle .= "<link href='".THEME_ABS."css/admin/".TEXTDIRECTION.".css' rel='stylesheet' />";
		//$headerstyle .= "<link href='".THEME_ABS."css/".TEXTDIRECTION."-bootstrap.css' rel='stylesheet' media='screen' />";		
		//$headerstyle .= '';		
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
		case 'update':
			include("shortcode/admin_update.php");
		break;	
		case 'slider':
			include("shortcode/admin_slider.php");
		break;	
		case 'newspage':
			include("shortcode/admin_newspage.php");
		break;	
		case 'urgent':
			include("shortcode/admin_urgent.php");
		break;	
		case 'ads':
			include("shortcode/admin_ads.php");
		break;			
		case 'promotion':
			include("shortcode/admin_promotion.php");
		break;			
		case 'other':
			include("shortcode/admin_other.php");
		break;			
		case 'about':
			include("shortcode/admin_about.php");
		break;				
	}				
// 
include("shortcode/admin_footer.php");
// require_once(e_ADMIN."footer.php");

$ns->tablerender("", $text, "no_caption");
require_once(FOOTERF);

?>