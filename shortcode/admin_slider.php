<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
	require_once(e_HANDLER."file_class.php");
	$fl = new e_file;
	
if (isset($_POST['frontpage_news_submit_slider'])) {	
	// echo $_POST['frontpage_news_slider_type'] ;
	$pref['frontpage_news_slider_type'] = $_POST['frontpage_news_slider_type'] ;	
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "			<div class='alert alert-success'>
							<button class='close' data-dismiss='alert' type='button'>
								<i class='icon-remove'></i>
							</button>
							<i class='icon-ok green'></i>	
							<strong >$result_msg</strong >							
						</div>	
						";	
} 

if (isset($_POST['frontpage_news_submit_upload'])) 
{
	$pref['upload_storagetype'] = '1';
	require_once(e_HANDLER.'upload_handler.php');
	$uploaded = file_upload(THEME.'images/logo/');

}	
// ===========================================================================

	$path = THEME."sliders/" ;
    $recurse = ($subdirs) ? $subdirs : 0;
	if($filelist = $fl->get_files($path,'\.php', 'standard',0))
	{
		sort($filelist);
	}	
	
	$selector .= "<select class='tbox sc-imageselector' name='frontpage_news_slider_type' id='frontpage_news_slider_type' >
	<option value=''>".LAN_THEME_ADMIN_83."</option>\n";
	foreach($filelist as $file)
	{
		$dir = str_replace($path,"",$file['path']);
		$selected = ($pref['frontpage_news_slider_type'] == basename($file['fname'],".php")) ? " selected='selected'" : "";
		$selector .= "<option value='".basename($file['fname'],".php")."' ".$selected." >".basename($file['fname'],".php")."</option>\n";
	}
	$selector .= "</select>";
	$pvw_default = ($file['fname']."png") ? $path.$file['fname']."png" : e_IMAGE_ABS."generic/blank.gif";
	
	$text .= "	<li class='active'>".LAN_THEME_ADMIN_15."</li>
			</ol><!--.breadcrumb-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?slider" ,  'frontpage_news_submit_slider', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_15 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_83." </td>
								<td> ". $selector ."</td>
							</tr>				
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_slider'>
						<span class='glyphicon glyphicon-floppy-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->
			<input type='hidden' name='e-token' value='".e_TOKEN."' />
			".$rs->form_close() ;	
	
	foreach($filelist as $file)
	{
		$slider_prev .="
					<div class='col-sm-6 col-md-6'>
						<div class='thumbnail'>
						  <img src='".THEME_ABS."sliders/".basename($file['fname'],".php").".png' alt='".basename($file['fname'],".php")."'>
						  <div class='caption'>
							<h3>".basename($file['fname'],".php")."</h3>
						  </div>
						</div>
					  </div>";
	}
	
	$text .= "	
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-info'>
				<div class='panel-heading'><i class='icon-star orange'></i> ".  LAN_THEME_ADMIN_93 ."</div>							
				<div class='panel-body'>										
					<div class='row'>
						$slider_prev
					</div>									
				</div><!-- end panel body -->
			</div><!-- end panel -->" ;	