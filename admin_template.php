<?php
if (!defined("e107_INIT")) { exit; }
$sc_style["ADMIN_SEL_LAN"]["pre"] = '<br />';
$sc_style["ADMIN_SEL_LAN"]["post"] = '';
define("LINKSRENDERONLYMAIN", "1");

if(ADMIN) {

	if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'admin-theme.php') == TRUE)
	{
		$ADMIN_HEADER = '
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
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
									<span class="badge badge-grey">4</span>
								</a>

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
							</li>

							<li class="purple">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-bell-alt icon-only icon-animated-bell"></i>
									<span class="badge badge-important">8</span>
								</a>

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
							</li>

							<li class="green">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-envelope-alt icon-only icon-animated-vertical"></i>
									<span class="badge badge-success">5</span>
								</a>

								<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
									<li class="nav-header">
										<i class="icon-envelope"></i>
										5 Messages
									</li>

									<li>
										<a href="#">
											<img src="themes/images/avatar.png" class="msg-photo" alt="Alexs Avatar" />
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
											<img src="themes/images/avatar3.png" class="msg-photo" alt="Susans Avatar" />
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
											<img src="themes/images/avatar4.png" class="msg-photo" alt="Bobs Avatar" />
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
							</li>
							
							<li class="light-blue user-profile">
								<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
									<img class="nav-user-photo" src="themes/images/user.png" alt="Jasons Photo" />
									<span id="user_info">
										<small>'.LAN_THEME_ADMIN_2.',</small>Jason
									</span>
									<i class="icon-caret-down"></i>
								</a>

								<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
									<li>
										<a href="#">
											<i class="icon-cog"></i>
											'.LAN_THEME_ADMIN_3.'
										</a>
									</li>

									<li>
										<a href="#">
											<i class="icon-user"></i>
											'.LAN_THEME_ADMIN_4.'
										</a>
									</li>

									<li class="divider"></li>

									<li>
										<a href="#">
											<i class="icon-off"></i>
											'.LAN_THEME_ADMIN_5.'
										</a>
									</li>
								</ul>
							</li>
						</ul><!--/.ace-nav-->
					</div><!--/.container-fluid-->
				</div><!--/.navbar-inner-->
			</div>

			<div class="container-fluid" id="main-container">
				<a id="menu-toggler" href="#">
					<span></span>
				</a>

				<div id="sidebar">
					<div id="sidebar-shortcuts">
						<div id="sidebar-shortcuts-large">
							<button class="btn btn-small btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-small btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-small btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-small btn-danger">
								<i class="icon-cogs"></i>
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
					{ADMIN_LOGO}
					<ul class="nav nav-list">
						<li>
							<a href="'.e_SELF.'">
								<i class="icon-dashboard"></i>
								<span>'.LAN_THEME_ADMIN_8.'</span>
							</a>
						</li>

						<li class="active">
							<a href="'.e_SELF.'?fonts">
								<i class="icon-text-width"></i>
								<span>'.LAN_THEME_ADMIN_9.'</span>
							</a>
						</li>

						<li>
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
							<a href="#">
								<i class="icon-list"></i>
								<span>'.LAN_THEME_ADMIN_14.'</span>
							</a>
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
								<i class="icon-picture"></i>
								<span>'.LAN_THEME_ADMIN_21.'</span>
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
					</ul><!--/.nav-list-->

					<div id="sidebar-collapse">
						<i class="icon-double-angle-left"></i>
					</div>
				</div>

				<div id="main-content" class="clearfix">
					<div id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">'.LAN_THEME_ADMIN_7.'</a>

								<span class="divider">
									<i class="icon-angle-right"></i>
								</span>
							</li>
							<li class="active">'.LAN_THEME_ADMIN_8.'</li>
						</ul><!--.breadcrumb-->

					</div>	
		';

		$ADMIN_HEADER1 = '
		<div class="admin_header clearfix">
			<div class="admin_header_left">
				{ADMIN_LOGO} {ADMIN_UPDATE=adminpanel|text}
			</div>
			<div class="admin_header_right">
				<div>{ADMIN_SEL_LAN}</div><div>{ADMIN_LOGGED}</div><div>{ADMIN_SITEINFO=version}</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="admin_main_nav_bg">
			<div class="admin_main_nav">
				{ADMIN_ALT_NAV}
			</div>
		</div>
		<table class="admin_main_col">
			<tr>
				<td class="admin_left_col">
					{ADMIN_MENU}
					{ADMIN_PRESET}
					{ADMIN_SITEINFO}
					{ADMIN_DOCS}
				</td>
				<td class="admin_mid_col">
		';
		$ADMIN_FOOTER1 = '
				</td>
				<td class="admin_right_col">
					'.(e_PAGE != "admin.php" ? "{ADMIN_UPDATE} " : "").'
					{ADMIN_LANG}
					{ADMIN_PWORD}
					{ADMIN_STATUS=request}
					{ADMIN_LATEST=request}
					{ADMIN_LOG=request}
					{ADMIN_HELP}
					{ADMIN_MSG}
					{ADMIN_PLUGINS}
				</td>
			</tr>
		</table>
		{ADMIN_CREDITS}
		';
	}


}
