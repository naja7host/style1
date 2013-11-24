<?php
	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	
if (isset($_POST['frontpage_news_submit_social'])) {	

	foreach($_POST['xurl'] as $k=>$var)
	{
		$pref['xurl'][$k] = $_POST['xurl'][$k] ;
	}	
	
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
	$text .= "				<li class='active'>".LAN_THEME_ADMIN_14."</li>
						</ul><!--.breadcrumb-->
					</div>			
					<div id='page-content' class='clearfix'>
					<div class='page-header position-relative'>
						<h1>
							". LAN_THEME_ADMIN_76 ."
							<small>
								<i class='icon-double-angle-right'></i>
								
							</small>
						</h1>
					</div><!--/.page-header-->
					". $rs->form_open("post", e_SELF."?social" ,  'frontpage_news_submit_social', '', 'enctype="multipart/form-data"') ."
				
					<div class='row-fluid'>
						". $result ."
						<!--PAGE CONTENT BEGINS HERE-->		
						<div class='span12'><!--Row 3 -->
							<div class='widget-box '>
								<div class='widget-header '>
									<h4 class='lighter'>
										<i class='icon-star orange'></i>
										". LAN_THEME_ADMIN_77 ."
									</h4>
									<div class='widget-toolbar'>
										<a data-action='collapse' href='#'>
											<i class='icon-chevron-down'></i>
										</a>
									</div>
								</div>							
								<div class='widget-body'>	
									<div class='widget-main padding-8'>	";
										
										foreach($xurls as $k=>$var)
										{
											$keypref = "xurl[".$k."]";
											$def = "XURL_". strtoupper($k);
											
											//$opts = array('size'=>'xxlarge','placeholder'=> $var['placeholder']);	
											$text .= "<div class='widget-header-flat border-bottom'>
														".LAN_THEME_ADMIN_79 .$var['label']." 
														<span class='label label-important arrowed'>". LAN_THEME_ADMIN_80 ."<b>".$def."</b>". LAN_THEME_ADMIN_81 .  $var['label']." </span>
														<div class='admin_label'>".$rs->form_text($keypref, 50 , $pref['xurl'][$k])."</div>
														<div class='clearfix'>  </div>	
													</div>
													";
										}			
										
						$text .="	</div>
									<button class='btn btn-small btn-info no-radius button-save' name='frontpage_news_submit_social'>
										<i class='icon-share-alt'></i>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
									</button>									
								</div>
							</div>
						</div>
						<input type='hidden' name='e-token' value='".e_TOKEN."' />";
		
	$text .= $rs->form_close();						
