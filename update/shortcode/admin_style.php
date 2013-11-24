<?php
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
    
	$text .= "				<li class='active'>".LAN_THEME_ADMIN_10."</li>
						</ul><!--.breadcrumb-->
					</div>			
					<div id='page-content' class='clearfix'>
					<div class='page-header position-relative'>
						<h1>
							".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_10 ."
							<small>
								<i class='icon-double-angle-right'></i>
								
							</small>
						</h1>
					</div><!--/.page-header-->
					". $rs->form_open("post", e_SELF."?style" ,  'frontpage_news_submit_colorstyle', '', 'enctype="multipart/form-data"') ."
					
					<div class='row-fluid'>
						". $result ."
						<!--PAGE CONTENT BEGINS HERE-->		
						<div class='span12'><!--Row 3 -->
							<div class='widget-box '>
								<div class='widget-header '>
									<h4 class='lighter'>
										<i class='icon-star orange'></i>
										". LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_10 ."
									</h4>
									<div class='widget-toolbar'>
										<a data-action='collapse' href='#'>
											<i class='icon-chevron-down'></i>
										</a>
									</div>
								</div>							
								<div class='widget-body'>	
									<div class='widget-main padding-8'>
										<div class='border-bottom'>
											". LAN_THEME_ADMIN_85."											
											<div class='admin_label'>
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "blue" , ($pref['frontpage_news_colorstyle']== "blue" ? " checked='checked'" : "") ) ."
													<span class='lbl'> ".LAN_THEME_COLOR_BLUE." </span>
												</label>
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "green" , ($pref['frontpage_news_colorstyle']=="green" ? " checked='checked'" : "") ) ."
													<span class='lbl'> ".LAN_THEME_COLOR_GREEN." </span>
												</label>	
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "red" , ($pref['frontpage_news_colorstyle']=="red" ? " checked='checked'" : "") ) ."
													<span class='lbl'> " .LAN_THEME_COLOR_RED ."</span>
												</label>										
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "orange" , ($pref['frontpage_news_colorstyle']=="orange" ? " checked='checked'" : "") ) ."
													<span class='lbl'> " .LAN_THEME_COLOR_ORANGE ."</span>
												</label>	
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "yellow" , ($pref['frontpage_news_colorstyle']=="yellow" ? " checked='checked'" : "") ) ."
													<span class='lbl'> " .LAN_THEME_COLOR_YELLOW ."</span>
												</label>	
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "gris" , ($pref['frontpage_news_colorstyle']=="gris" ? " checked='checked'" : "") ) ."
													<span class='lbl'> " .LAN_THEME_COLOR_GRIS ."</span>
												</label>												
												<label class='inline'>
													". $rs->form_radio("frontpage_news_colorstyle", "black" , ($pref['frontpage_news_colorstyle']=="black" ? " checked='checked'" : "") ) ."
													<span class='lbl'> " .LAN_THEME_COLOR_BLACK ."</span>
												</label>													
											</div>
											<div class='clearfix'>  </div>
										</div>											
									</div>	
									
									<button class='btn btn-small btn-info no-radius button-save' name='frontpage_news_submit_colorstyle'>
										<i class='icon-share-alt'></i>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
									</button>									
								</div>
							</div>
						</div>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />";
		
	$text .= $rs->form_close();						
