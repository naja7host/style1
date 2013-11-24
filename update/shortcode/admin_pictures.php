<?php
	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_pictures'])) {	

	$pref['frontpage_news_logo'] = $_POST['frontpage_news_logo'] ;	
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

if (isset($_POST['frontpage_news_submit_upload'])) 
{
	$pref['upload_storagetype'] = '1';
	require_once(e_HANDLER.'upload_handler.php');
	$uploaded = file_upload(THEME.'images/logo/');

}	
// ===========================================================================
    $param = "frontpage_news_logo,".THEME."images/logo,".$pref['frontpage_news_logo'].",300px,150px,0,".LAN_THEME_ADMIN_83.",";
    
	$text .= "				<li class='active'>".LAN_THEME_ADMIN_21."</li>
						</ul><!--.breadcrumb-->
					</div>			
					<div id='page-content' class='clearfix'>
					<div class='page-header position-relative'>
						<h1>
							".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_21 ."
							<small>
								<i class='icon-double-angle-right'></i>
								
							</small>
						</h1>
					</div><!--/.page-header-->
					". $rs->form_open("post", e_SELF."?pictures" ,  'frontpage_news_submit_pictures', '', 'enctype="multipart/form-data"') ."
					
					<div class='row-fluid'>
						". $result ."
						<!--PAGE CONTENT BEGINS HERE-->		
						<div class='span12'><!--Row 3 -->
							<div class='widget-box '>
								<div class='widget-header '>
									<h4 class='lighter'>
										<i class='icon-star orange'></i>
										". LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_21 ."
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
											". LAN_THEME_ADMIN_82."											
											<div class='admin_label'> ". $tp->parseTemplate("{IMAGESELECTOR={$param}}") ."</div>
											<div class='clearfix'>  </div>	
										</div>											
									</div>	
									
									<button class='btn btn-small btn-info no-radius button-save' name='frontpage_news_submit_pictures'>
										<i class='icon-share-alt'></i>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
									</button>									
								</div>
							</div>
						</div>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />
						".$rs->form_close() .					
						
					$rs->form_open("post", e_SELF."?pictures" ,  'frontpage_news_submit_upload', '', 'enctype="multipart/form-data"') ."
					
					<div class='row-fluid'>
						
						<!--PAGE CONTENT BEGINS HERE-->		
						<div class='span12'><!--Row 3 -->
							<div class='widget-box '>
								<div class='widget-header '>
									<h4 class='lighter'>
										<i class='icon-star orange'></i>
										". LAN_THEME_ADMIN_84 ."
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
											". LAN_THEME_ADMIN_82."											
											<div class='admin_label'> <input class='tbox' type='file' name='file_userfile[]' size='40' /></div>
											<div class='clearfix'>  </div>	
										</div>											
									</div>	
									
									<button class='btn btn-small btn-info no-radius button-save' name='frontpage_news_submit_upload'>
										<i class='icon-share-alt'></i>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
									</button>									
								</div>
							</div>
						</div>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />
						".$rs->form_close();						
