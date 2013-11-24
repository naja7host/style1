<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_social'])) {	

	foreach($_POST['xurl'] as $k=>$var)
	{
		$pref['xurl'][$k] = $_POST['xurl'][$k] ;
	}	
	
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
// ===========================================================================

	$text .= "	<li class='active'>". LAN_THEME_ADMIN_76 ."</li>
			</ol><!--.breadcrumb-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?social" ,  'frontpage_news_submit_social', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_77 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>";										
						foreach($xurls as $k=>$var)
						{
							$keypref = "xurl[".$k."]";
							$def = "XURL_". strtoupper($k);
							
							//$opts = array('size'=>'xxlarge','placeholder'=> $var['placeholder']);	
							$text .= "
							<tr ><td>".LAN_THEME_ADMIN_79 .$var['label']."  -  ".$rs->form_text($keypref, 50 , $pref['xurl'][$k],"","pull-right text-left")."</td></tr>
							<tr class='danger' ><td><span class='label label-danger'>". LAN_THEME_ADMIN_80 ."<b>".$def."</b>". LAN_THEME_ADMIN_81 .  $var['label']."</span></td></tr>
							";
						}										
						$text .="
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_social'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->						
			<input type='hidden' name='e-token' value='".e_TOKEN."' />";
		
			$text .= $rs->form_close();						
