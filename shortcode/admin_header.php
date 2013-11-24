<?php

if (!defined('e107_INIT')) { exit; }

$action = (e_QUERY) ? e_QUERY : "main";

	switch ($action) 
	{
		case 'main':
		default :
			$main = " class='active' ";
		break;
		case 'social':
			$social = " class='active' ";
		break;			
		case 'style':
			$style = " class='active' ";
		break;	
		case 'fonts':
			$fonts = " class='active' ";
		break;
		case 'slider':
			$slider = " class='active' ";
		break;		
		case 'pictures':
			$pictures = " class='active' ";
		break;	
		case 'update':
			$update = " class='active' ";
		break;	
		case 'ads':
			$ads = " class='active' ";
		break;	
		case 'newspage':
			$newspage = " class='active' ";
		break;	
		case 'urgent':
			$urgent = " class='active' ";
		break;	
		case 'about':
			$about = " class='active' ";
		break;			
		case 'other':
			$other = " class='active' ";
		break;	
		case 'promotion':
			$promotion = " class='active' ";
		break;			
		case 'readme':
			$readme = " class='active' ";
		break;				
	}
$text ='
	<a class="sr-only" href="#content">'.LAN_THEME_ADMIN_92.'</a>
	
    <header class="navbar navbar-default navbar-static-top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="http://naja7host.com/news-template" target="_blank" class="navbar-brand">					
					<i class="icon-unlock-alt"></i>
					 '.SITENAME." - ".$themename.' 					
				</a>	
			</div>
	
			<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
				<ul class="nav navbar-nav">
					<!-- <li><a href="#"><span class="glyphicon glyphicon-comment"></span>'. LAN_THEME_ADMIN_27 . '</a></li> -->
					<li><a href="#"><span class="glyphicon glyphicon-pencil"></span>'. LAN_THEME_ADMIN_28 . '</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-home"></span>'. LAN_THEME_ADMIN_29 . '</a></li>
					<li><a href="'.e_ADMIN_ABS.'index.php"><span class="glyphicon glyphicon-cog"></span> '.LAN_THEME_ADMIN_25.'</a></li>
					
					<li class="dropdown">
						<a class="dropdown-toggle " data-toggle="dropdown" href="#">'.LAN_THEME_ADMIN_2 . USERNAME.' 
							<span class="glyphicon glyphicon-user"></span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu"  role="menu">
							<li><a href="'.e_HTTP.'usersettings.php"><span class="glyphicon glyphicon-asterisk"></span> '.LAN_THEME_ADMIN_3.'</a></li>
							<li><a href="'.e_HTTP.'user.php?id.'.USERID.'"><span class="glyphicon glyphicon-user"></span> '.LAN_THEME_ADMIN_4.'</a></li>
							<li class="divider"></li>
							<li><a href="'.e_ADMIN_ABS.'index.php"><span class="glyphicon glyphicon-cog"></span> '.LAN_THEME_ADMIN_25.'</a></li>
							<li class="divider"></li>
							<li><a href="'.e_HTTP.'news.php?logout"><span class="glyphicon glyphicon-log-out"></span> '.LAN_THEME_ADMIN_5.'</a></li>					
						</ul>						
					</li>
				</ul>
		
				
			</nav>
		</div>
	</header>
	
	
	<div class="container">
		<div class="row ">
			<!-- left menu starts -->
			<div class="col-md-3 well">
				<div class="  bs-sidebar hidden-print affix-top" role="complementary">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li '.$main.'><a href="'.e_SELF.'"><span class="glyphicon glyphicon-dashboard"></span><span> '.LAN_THEME_ADMIN_8.'</span></a></li  >
						<li '.$fonts.' ><a href="'.e_SELF.'?fonts"><span class="glyphicon glyphicon-font"></span><span> '.LAN_THEME_ADMIN_9.'</span></a></li>
						<li '.$style.' ><a href="'.e_SELF.'?style"><span class="glyphicon glyphicon-film "></span><span> '.LAN_THEME_ADMIN_10.'</span></a></li>
						<li '.$slider.' ><a href="'.e_SELF.'?slider"><span class="glyphicon glyphicon-random"></span><span> '.LAN_THEME_ADMIN_15.'</span></a></li>						
						<li '.$pictures.' ><a href="'.e_SELF.'?pictures"><span class="glyphicon glyphicon-picture"></span><span> '.LAN_THEME_ADMIN_21.'</span></a></li>
						<li '.$social.' ><a href="'.e_SELF.'?social"><span class="glyphicon glyphicon-list"></span><span> '.LAN_THEME_ADMIN_14.'</span></a></li>
						<li '.$newspage.' ><a href="'.e_SELF.'?newspage"><span class="glyphicon glyphicon-align-justify "></span><span> '.LAN_THEME_ADMIN_17.'</span></a></li>		
						<li '.$urgent.' ><a href="'.e_SELF.'?urgent"><span class="glyphicon glyphicon-flash "></span><span> '.LAN_THEME_ADMIN_16.'</span></a></li>		
						<li '.$ads.' ><a href="'.e_SELF.'?ads"><span class="glyphicon glyphicon-usd "></span><span> '.LAN_THEME_ADMIN_19.'</span></a></li>		
						<li '.$update.' ><a href="'.e_SELF.'?update"><span class="glyphicon glyphicon-globe "></span><span> '.LAN_THEME_ADMIN_13.'</span></a></li>		
						<li '.$about.' ><a href="'.e_SELF.'?about"><span class="glyphicon glyphicon-copyright-mark "></span><span> '.LAN_THEME_ADMIN_18.'</span></a></li>		
						<li '.$promotion.' ><a href="'.e_SELF.'?promotion"><span class="glyphicon glyphicon-gift "></span><span> '.LAN_THEME_ADMIN_94.'</span></a></li>		

						<!--
						<li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a class="ajax-link" href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="ajax-link" href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a class="ajax-link" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
						-->
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div class="col-md-9" role="main" >
			<!-- content starts -->';	
	
	
$text1 = '
			<!-- user dropdown starts -->
			<div class="btn-group " >
				<button type="button" class="btn btn-danger">'.LAN_THEME_ADMIN_2 . USERNAME.' </button>
				<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>				
		
				<ul class="dropdown-menu"  role="menu">
					<li><a href="'.e_HTTP.'usersettings.php"><i class="icon-cog"></i> '.LAN_THEME_ADMIN_3.'</a></li>
					<li><a href="'.e_HTTP.'user.php?id.'.USERID.'"><i class="icon-user"></i> '.LAN_THEME_ADMIN_4.'</a></li>
					<li class="divider"></li>
					<li><a href="'.e_HTTP.'news.php?logout"><i class="icon-off"></i> '.LAN_THEME_ADMIN_5.'</a></li>					
				</ul>
			</div>
			<!-- user dropdown ends -->	
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container">
						<a href="http://naja7host.com/news-template" target="_blank" class="brand ">
							<small>
								<i class="icon-unlock-alt"></i>
								'.SITENAME." - ".$themename.' 
							</small>
						</a><!--/.brand-->

						<ul class="nav ace-nav pull-right ">
							<li class="grey">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-tasks"></i>
									<span class="badge badge-grey">#</span>
								</a>
								<!--
								<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
									<li class="nav-header">
										<i class="icon-ok"></i>
										4 Tasks to complete
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">Software Update</span>
												<span class="pull-right">65%</span>
											</div>

											<div class="progress progress-mini ">
												<div style="width:65%" class="bar"></div>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">Hardware Upgrade</span>
												<span class="pull-right">35%</span>
											</div>

											<div class="progress progress-mini progress-danger">
												<div style="width:35%" class="bar"></div>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">Unit Testing</span>
												<span class="pull-right">15%</span>
											</div>

											<div class="progress progress-mini progress-warning">
												<div style="width:15%" class="bar"></div>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">Bug Fixes</span>
												<span class="pull-right">90%</span>
											</div>

											<div class="progress progress-mini progress-success progress-striped active">
												<div style="width:90%" class="bar"></div>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											See tasks with details
											<i class="icon-arrow-right"></i>
										</a>
									</li>
								</ul>
								-->
							</li>

							<li class="purple">
								
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-bell-alt icon-only icon-animated-bell"></i>
									<span class="badge badge-important">#</span>
								</a>
								<!--	
								<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
									<li class="nav-header">
										<i class="icon-warning-sign"></i>
										8 Notifications
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">
													<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
													New Comments
												</span>
												<span class="pull-right badge badge-info">+12</span>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											<i class="btn btn-mini btn-primary icon-user"></i>
											Bob just signed up as an editor ...
										</a>
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">
													<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
													New Orders
												</span>
												<span class="pull-right badge badge-success">+8</span>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">
													<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
													Followers
												</span>
												<span class="pull-right badge badge-info">+11</span>
											</div>
										</a>
									</li>

									<li>
										<a href="#">
											See all notifications
											<i class="icon-arrow-right"></i>
										</a>
									</li>
								</ul>
								-->
							</li>

							<li class="green">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-envelope-alt icon-only icon-animated-vertical"></i>
									<span class="badge badge-success">#</span>
								</a>
								<!--	
								<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
									<li class="nav-header">
										<i class="icon-envelope"></i>
										5 Messages
									</li>

									<li>
										<a href="#">
											<img src="'.THEME_ABS.'images/avatar.png" class="msg-photo" alt="Alexs Avatar" />
											<span class="msg-body">
												<span class="msg-title">
													<span class="blue">Alex:</span>
													Ciao sociis natoque penatibus et auctor ...
												</span>

												<span class="msg-time">
													<i class="icon-time"></i>
													<span>a moment ago</span>
												</span>
											</span>
										</a>
									</li>

									<li>
										<a href="#">
											<img src="'.THEME_ABS.'images/avatar3.png" class="msg-photo" alt="Susans Avatar" />
											<span class="msg-body">
												<span class="msg-title">
													<span class="blue">Susan:</span>
													Vestibulum id ligula porta felis euismod ...
												</span>

												<span class="msg-time">
													<i class="icon-time"></i>
													<span>20 minutes ago</span>
												</span>
											</span>
										</a>
									</li>

									<li>
										<a href="#">
											<img src="'.THEME_ABS.'images/avatar4.png" class="msg-photo" alt="Bobs Avatar" />
											<span class="msg-body">
												<span class="msg-title">
													<span class="blue">Bob:</span>
													Nullam quis risus eget urna mollis ornare ...
												</span>

												<span class="msg-time">
													<i class="icon-time"></i>
													<span>3:15 pm</span>
												</span>
											</span>
										</a>
									</li>

									<li>
										<a href="#">
											See all messages
											<i class="icon-arrow-right"></i>
										</a>
									</li>
								</ul>
								-->
							</li>
							
							<li class="light-blue user-profile">
								<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
									<img class="nav-user-photo" src="'.THEME_ABS.'images/user.png" alt="Jasons Photo" />
									<span id="user_info">
										<small>'.LAN_THEME_ADMIN_2.',</small>'.USERNAME.'
									</span>
									<i class="icon-caret-down"></i>
								</a>

								<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
									<li>
										<a href="'.e_HTTP.'usersettings.php">
											<i class="icon-cog"></i>
											'.LAN_THEME_ADMIN_3.'
										</a>
									</li>

									<li>
										<a href="'.e_HTTP.'user.php?id.'.USERID.'">
											<i class="icon-user"></i>
											'.LAN_THEME_ADMIN_4.'
										</a>
									</li>

									<li class="divider"></li>

									<li>
										<a href="'.e_HTTP.'news.php?logout">
											<i class="icon-off"></i>
											'.LAN_THEME_ADMIN_5.'
										</a>
									</li>
								</ul>
							</li>
						</ul><!--/.ace-nav-->
					</div><!--/.container -->
				</div><!--/.navbar-inner-->
			</div>

			<div class="container" id="main-container">
				<a id="menu-toggler" href="#">
					<span></span>
				</a>

				<div id="sidebar">
					<div id="sidebar-shortcuts">
						<div id="sidebar-shortcuts-large">
							<button class="btn btn-small btn-success">
								<!-- <i class="icon-signal"></i> -->
							</button>

							<button class="btn btn-small btn-info">
								<!-- <i class="icon-pencil"></i> -->
							</button>

							<button class="btn btn-small btn-warning">
								<!-- <i class="icon-group"></i> -->
							</button>

							<button class="btn btn-small btn-danger">
								<!-- <i class="icon-cogs"></i> -->
							</button>
						</div>

						<div id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
						
					</div><!--#sidebar-shortcuts-->
					<!-- Menu-->
					<a href="'.e_ADMIN_ABS.'index.php"><img src="'.THEME_ABS.'images/e_adminlogo.png" alt="'.ADLAN_153.'" /></a>
					<ul class="nav nav-list">
						<li '.$main.'>
							<a href="'.e_SELF.'">
								<i class="icon-dashboard"></i>
								<span>'.LAN_THEME_ADMIN_8.'</span>
							</a>
						</li  >

						<li '.$fonts.' >
							<a href="'.e_SELF.'?fonts">
								<i class="icon-text-width"></i>
								<span>'.LAN_THEME_ADMIN_9.'</span>
							</a>
						</li>
						
						<li '.$style.' >
							<a href="'.e_SELF.'?style">
								<i class="icon-desktop"></i>
								<span>'.LAN_THEME_ADMIN_10.'</span>
							</a>						
						</li>
						<li '.$slider.' >
							<a href="'.e_SELF.'?slider">
								<i class="icon-list"></i>
								<span>'.LAN_THEME_ADMIN_14.'</span>
							</a>
						</li>						
						<li '.$pictures.' >
							<a href="'.e_SELF.'?pictures">
								<i class="icon-picture"></i>
								<span>'.LAN_THEME_ADMIN_21.'</span>
							</a>
						</li>
						<li '.$social.' >
							<a href="'.e_SELF.'?social">
								<i class="icon-list"></i>
								<span>'.LAN_THEME_ADMIN_14.'</span>
							</a>
						</li>
						<li '.$update.' >
							<a href="'.e_SELF.'?update">
								<i class="icon-list"></i>
								<span>'.LAN_THEME_ADMIN_14.'</span>
							</a>
						</li>
						
						<!-- 
						<li >
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span>'.LAN_THEME_ADMIN_10.'</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_11.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_12.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_13.'
									</a>
								</li>
							</ul>
						</li>



						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span>'.LAN_THEME_ADMIN_15.'</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_16.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_17.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_18.'
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#">
								<i class="icon-list-alt"></i>
								<span>'.LAN_THEME_ADMIN_19.'</span>
							</a>
						</li>

						<li>
							<a href="#">
								<i class="icon-calendar"></i>
								<span>'.LAN_THEME_ADMIN_20.'</span>
							</a>
						</li>



						<li>
							<a href="#">
								<i class="icon-th"></i>
								<span>'.LAN_THEME_ADMIN_22.'</span>
							</a>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-file"></i>
								<span>'.LAN_THEME_ADMIN_23.'</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_24.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_25.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_26.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_27.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_28.'
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-double-angle-right"></i>
										'.LAN_THEME_ADMIN_29.'
									</a>
								</li>
							</ul>
						</li>
						-->
					</ul><!--/.nav-list-->

					<div id="sidebar-collapse">
						<i class="icon-double-angle-left"></i>
					</div>
				</div>
				<div id="main-content" class="clearfix">';
				
	list($uid)=(isset($_COOKIE[$pref['cookie_name']]) && $_COOKIE[$pref['cookie_name']] ? explode(".", $_COOKIE[$pref['cookie_name']]) : explode(".", $_SESSION[$pref['cookie_name']]));

	$userinfo = get_user_data($uid);
	
	if ($userinfo['user_password'] == "21232f297a57a5a743894a0e4a801fc3")
		$text .= "
			<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<span class='glyphicon glyphicon-warning-sign '></span>	
				".LAN_THEME_ADMIN_74."						
				<strong >".LAN_THEME_ADMIN_75."</strong >						
			</div>";				

			$text .='
			<ol class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span><a href="'. e_PAGE .'"> '.LAN_THEME_ADMIN_7.'</a></li>';
	
		