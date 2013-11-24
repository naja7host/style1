<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_pictures'])) {	

	$pref['frontpage_news_logo'] = $_POST['frontpage_news_logo'] ;	
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
    $param = "frontpage_news_logo,".THEME."images/logo,".$pref['frontpage_news_logo'].",300px,150px,0,".LAN_THEME_ADMIN_83.",";
    
	if(is_writable(THEME."images/logo"))
	{
		$upload_logo ="<input class='tbox' type='file' name='file_userfile[]' size='40' />";
	} 
	else 
	{
		$upload_logo ="<div class='alert alert-danger'>".LAN_THEME_ADMIN_89 ." images/logo ". LAN_THEME_ADMIN_90."</div>";
	}	
	
	$text .= "	<li class='active'>".LAN_THEME_ADMIN_21."</li>
			</ol><!--.breadcrumb-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?pictures" ,  'frontpage_news_submit_pictures', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_21 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_82." </td>
								<td> ". $tp->parseTemplate("{IMAGESELECTOR={$param}}") ."</td>
							</tr>				
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_pictures'>
						<span class='glyphicon glyphicon-upload'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->
			<input type='hidden' name='e-token' value='".e_TOKEN."' />
			".$rs->form_close() .
			
			$rs->form_open("post", e_SELF."?pictures" ,  'frontpage_news_submit_upload', '', 'enctype="multipart/form-data"') ."
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ".  LAN_THEME_ADMIN_84 ."</div>										
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_84 ."</td>
								<td>".$upload_logo."</td>
							</tr>						
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_upload'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->
			<input type='hidden' name='e-token' value='".e_TOKEN."' />
			".$rs->form_close() ;	
	
