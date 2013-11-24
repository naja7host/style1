<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_colorstyle'])) {	

	$pref['frontpage_news_colorstyle'] = $_POST['frontpage_news_colorstyle'] ;	
	save_prefs();
	$result_msg = LAN_FRONTPAGE_16;
	$result = "
						<div class='alert alert-block alert-success'>
							<button class='close' data-dismiss='alert' type='button'>
								<i class='icon-remove'></i>
							</button>
							<i class='icon-ok green'></i>	
							<strong >$result_msg</strong >
							
						</div>	
						";	
}  						
// ===========================================================================
    
	$text .= "	<li class='active'>".LAN_THEME_ADMIN_10."</li>
			</ol><!--.breadcrumb-->
						<!--
						<div class='panel panel-primary '>
						<div class='panel-heading'>".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_10 ."</div>
						<div class='panel-body'>
						-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?style" ,  'frontpage_news_submit_colorstyle', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_10 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_85."	</td>
								<td>
									<div class='checkbox'>
										<label class='inline'>
											". $rs->form_radio("frontpage_news_colorstyle", "blue" , ($pref['frontpage_news_colorstyle']== "blue" ? " checked='checked'" : "") ) ."
											<span class='lbl'> ".LAN_THEME_COLOR_BLUE." </span>
										</label>
									</div>
									<div class='checkbox'>									
										<label class='inline'>
											". $rs->form_radio("frontpage_news_colorstyle", "green" , ($pref['frontpage_news_colorstyle']=="green" ? " checked='checked'" : "") ) ."
											<span class='lbl'> ".LAN_THEME_COLOR_GREEN." </span>
										</label>	
									</div>
									<div class='checkbox'>										
										<label class='inline'>
											". $rs->form_radio("frontpage_news_colorstyle", "red" , ($pref['frontpage_news_colorstyle']=="red" ? " checked='checked'" : "") ) ."
											<span class='lbl'> " .LAN_THEME_COLOR_RED ."</span>
										</label>										
									</div>
									<div class='checkbox'>										
										<label class='inline'>
											". $rs->form_radio("frontpage_news_colorstyle", "gris" , ($pref['frontpage_news_colorstyle']=="gris" ? " checked='checked'" : "")  ) ."
											<span class='lbl'> " .LAN_THEME_COLOR_GRIS ."</span>
										</label>												
									</div>
									
								</td>
							</tr>


						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_colorstyle'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->				
			<input type='hidden' name='e-token' value='".e_TOKEN."' />";		
			$text .= $rs->form_close();						

			
$nextrelease ="
									
									<label class='inline'>
										". $rs->form_radio("frontpage_news_colorstyle", "orange" , ($pref['frontpage_news_colorstyle']=="orange" ? " checked='checked'" : "") ,"",  "disabled ") ."
										<span class='lbl'> " .LAN_THEME_COLOR_ORANGE ."</span>
									</label>	
									<label class='inline'>
										". $rs->form_radio("frontpage_news_colorstyle", "yellow" , ($pref['frontpage_news_colorstyle']=="yellow" ? " checked='checked'" : "") ,"",  "disabled " ) ."
										<span class='disabled'> " .LAN_THEME_COLOR_YELLOW ."</span>
									</label>				
									<label class='inline'>
										". $rs->form_radio("frontpage_news_colorstyle", "black" , ($pref['frontpage_news_colorstyle']=="black" ? " checked='checked'" : "") ,"",  "disabled ") ."
										<span class='lbl'> " .LAN_THEME_COLOR_BLACK ."</span>
									</label>";									