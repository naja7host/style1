<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_fonts'])) {	

	$pref['frontpage_news_fonts'] = $_POST['frontpage_news_fonts'] ;	
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
    
	$text .= "	<li class='active'>".LAN_THEME_ADMIN_9."</li>
			</ol><!--.breadcrumb-->
						<!--
						<div class='panel panel-primary '>
						<div class='panel-heading'>".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_9 ."</div>
						<div class='panel-body'>
						-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?fonts" ,  'frontpage_news_fonts', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_9 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_95."	</td>
								<td>
									<div class='radio'>
										<label >
											". $rs->form_radio("frontpage_news_fonts", "normal" , ($pref['frontpage_news_fonts']== "normal" ? " checked='checked'" : "") ) ."
											<span > ".LAN_THEME_FONT_NORMAL." </span>
										</label>
									</div >
									<div class='radio'>
										<label >
											". $rs->form_radio("frontpage_news_fonts", "droidkufi" , ($pref['frontpage_news_fonts']== "droidkufi" ? " checked='checked'" : "") ) ."
											<span > ".LAN_THEME_FONT_DRIODKUFI." </span>
										</label>
									</div >
									<div class='radio'>
										<label >
											". $rs->form_radio("frontpage_news_fonts", "helveticaneue" , ($pref['frontpage_news_fonts']== "helveticaneue" ? " checked='checked'" : "") ) ."
											<span > ".LAN_THEME_FONT_HELVETICANEUE." </span>
										</label>
									</div >									
									<div class='radio'>
										<label >
											". $rs->form_radio("frontpage_news_fonts", "blue" , ($pref['frontpage_news_fonts']== "arabic" ? " checked='checked'" : "") ) ."
											<span > ".LAN_THEME_FONT_ARABIC." </span>
										</label>
									</div >											
								</td>
							</tr>


						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_fonts'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->				
			<input type='hidden' name='e-token' value='".e_TOKEN."' />";		
			$text .= $rs->form_close();						
