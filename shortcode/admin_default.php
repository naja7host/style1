<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	$count = $sql->db_count("news_category");
if (isset($_POST['frontpage_news_submit_default'])) {
	$count = $sql->db_count("news_category");
	$pref['frontpage_news_slider'] = $_POST['frontpage_news_slider'];
	$pref['frontpage_facebook'] = $tp->todb($_POST['frontpage_facebook']);
	// $pref['frontpage_cat_news'] = $tp->todb($_POST['frontpage_cat_news']);
	$pref['frontpage_catnews'] = $_POST['frontpage_catnews'];
	$pref['frontpage_catnews_limit'] = $_POST['frontpage_catnews_limit'];	
	$pref['frontpage_news_last24'] = $tp->todb($_POST['frontpage_news_last24']);
	$pref['frontpage_news_last24_limit'] = $tp->todb($_POST['frontpage_news_last24_limit']);
	$pref['frontpage_box_1_limit'] = $tp->todb($_POST['frontpage_box_1_limit']);
	$pref['frontpage_box_2_limit'] = $tp->todb($_POST['frontpage_box_2_limit']);
	$pref['frontpage_news_ta7rir'] = $tp->todb($_POST['frontpage_news_ta7rir']);
	$pref['frontpage_news_block2'] = $tp->todb($_POST['frontpage_news_block2']);
	$pref['frontpage_news_block2_sect'] = $tp->todb($_POST['frontpage_news_block2_sect']);
	$pref['frontpage_news_block3'] = $tp->todb($_POST['frontpage_news_block3']);
	$pref['frontpage_news_showdate'] = $_POST['frontpage_news_showdate'];
	$pref['frontpage_news_datetype'] = $_POST['frontpage_news_datetype'];
	$pref['frontpage_news_caricature'] = $_POST['frontpage_news_caricature'];
	$pref['frontpage_news_photograph'] = $_POST['frontpage_news_photograph'];
	 
	while($i <= $count)
	{
		$pref['frontpage_box_'.$i.''] = $tp->todb($_POST['frontpage_box_'.$i.'']);
		//echo $i ."->" . $_POST['frontpage_box_'.$i.''] ." //";		
		$i++;
	}
	save_prefs();
	$sql->db_Update("er_ytm_gallery", "disp_download='".$_POST['disp_download']."' ");
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

$sql->db_Select("er_ytm_gallery", "disp_download");	
while($row = $sql->db_Fetch()) {
	$disp_download = $row['disp_download'] ;		
}
	
// ===========================================================================
	//$count = $sql->db_count("news_category");

	$text .= "	<li class='active'>".LAN_THEME_ADMIN_8."</li>
			</ol><!--.breadcrumb-->
			". $result ."	
			". $rs->form_open("post", e_SELF."" ,  'frontpage_news_submit_default', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_40 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_41 ." <span class='label label-danger'>". LAN_THEME_ADMIN_53C ."</span></td>
								<td><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /></td>
							</tr>
							<tr class='success'>
								<td>". LAN_THEME_ADMIN_42 ."</td>
								<td>";													
							$text .= $rs->form_select_open('frontpage_news_last24' ) ."
							" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
							$sql->db_Select("news_category", "*", "order by category_id", "no_where");
							while($row = $sql->db_Fetch() )
							{			
								$text .= $rs->form_option($row['category_name'], ($pref['frontpage_news_last24'] == $row['category_id'] ), $row['category_id']) ;
							} 
							$text .= $rs->form_select_close() ;
							
							$text .="
								</td>													
							</tr>
							<tr class='success'>
								<td>". LAN_THEME_ADMIN_44 ."</td>
								<td><input class='tbox' name='frontpage_news_last24_limit' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_last24_limit'], $pref['frontpage_news_last24_limit'])."' /></td>												
							</tr>
							<tr >
								<td>". LAN_THEME_ADMIN_45 ."</td>
								<td>";										
							$text .= $rs->form_select_open('frontpage_news_ta7rir' ) ."
							" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
							$sql->db_Select("news_category", "*", "order by category_id", "no_where");
							while($row = $sql->db_Fetch() )
							{			
								$text .= $rs->form_option($row['category_name'], ($pref['frontpage_news_ta7rir'] == $row['category_id'] ), $row['category_id']) ;
							} 
							$text .= $rs->form_select_close() ;
							
							$text .="
								</td>
							</tr>
							<tr class='warning'>
								<td>". LAN_THEME_ADMIN_48 ."</td>
								<td>														
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block2", 0 , ($pref['frontpage_news_block2']==0 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_49." </span>
									</label>
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block2", 1 , ($pref['frontpage_news_block2']==1 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_51." </span>
									</label>	
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block2", 2 , ($pref['frontpage_news_block2']==2 ? " checked='checked'" : "") ) ."
										<span class='lbl'> " .LAN_THEME_ADMIN_50 ."</span>
									</label>
								</td>
							</tr>
							<tr class='warning'>
								<td>".LAN_THEME_ADMIN_50 ."</td>
								<td>";
									$text .= $rs->form_select_open('frontpage_news_block2_sect' ) ."
										" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
										$sql->db_Select("news_category", "*", "order by category_id", "no_where");
										while($row = $sql->db_Fetch() )
										{			
											$text .= $rs->form_option($row['category_name'], ($pref['frontpage_news_block2_sect'] == $row['category_id'] ), $row['category_id']) ;
										} 
										$text .= $rs->form_select_close() ;													
									$text .="
								</td>
							</tr>													
							<tr class='active'>
								<td>". LAN_THEME_ADMIN_52 ." <span class='label label-danger'>". LAN_THEME_ADMIN_53 ."</span></td>
								<td>". $rs->form_text("disp_download", varsettrue($tp->post_toForm($_POST['disp_download']), $tp->post_toForm($disp_download)), $disp_download ) ."</td>
							</tr>													
							<tr class='active'>
								<td>". LAN_THEME_ADMIN_54 ."<span class='label label-danger'>". LAN_THEME_ADMIN_58 ."</span></td>
								<td>
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block3", 0 , ($pref['frontpage_news_block3']==0 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_55." </span>
									</label>
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block3", 1 , ($pref['frontpage_news_block3']==1 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_56." </span>
									</label>	
									<label class='inline'>
										". $rs->form_radio("frontpage_news_block3", 2 , ($pref['frontpage_news_block3']==2 ? " checked='checked'" : "") ) ."
										<span class='lbl'> " .LAN_THEME_ADMIN_57 ."</span>
									</label>															 
								</td>
							</tr>
							<tr class='danger'>
								<td>". LAN_THEME_ADMIN_63 ."</td>
								<td>
									<label class='inline'>
									". $rs->form_checkbox("frontpage_news_showdate", 1 ,($pref['frontpage_news_showdate'] ? " checked='checked'" : "")) ."
									<span class='lbl'>". LAN_THEME_ADMIN_64 ."</span>
									</label>
								</td>
							</tr>
							<tr  class='danger'>
								<td>". LAN_THEME_ADMIN_66 ."</td>
								<td>
									<label class='inline'>
										". $rs->form_radio("frontpage_news_datetype", 0 , ($pref['frontpage_news_datetype']==0 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_67." </span>
									</label>
									<label class='inline'>
										". $rs->form_radio("frontpage_news_datetype", 1 , ($pref['frontpage_news_datetype']==1 ? " checked='checked'" : "") ) ."
										<span class='lbl'> ".LAN_THEME_ADMIN_68." </span>
									</label>	
								</td>
							</tr>
							<!--
							<tr >
								<td>". LAN_THEME_ADMIN_41 ." <span class='label label-danger'>". LAN_THEME_ADMIN_53C ."</span></td>
								<td><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /></td>
							</tr>													<tr >
								<td>". LAN_THEME_ADMIN_41 ." <span class='label label-danger'>". LAN_THEME_ADMIN_53C ."</span></td>
								<td><input class='tbox' name='frontpage_news_slider' size='3' maxlength='3' type='text' value='".varsettrue($_POST['frontpage_news_slider'], $pref['frontpage_news_slider'])."' /></td>
							</tr>
							-->
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_default'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->
			
			<div class=' clearfix'>  </div>						
			<div class='hr hr32 hr-dotted '></div>
			
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_59 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>	
							<tr class='active'>
								<td>". LAN_THEME_ADMIN_60 ."</td>
								<td>";
									for ($i=1 ; $i<4 ; $i++) 
									{
										$text .= $rs->form_select_open('frontpage_box_'.$i.'' ) ."
										" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
										$sql->db_Select("news_category", "*", "order by category_id", "no_where");
										while($row = $sql->db_Fetch() )
										{
											$text .= $rs->form_option($row['category_name'], ($pref['frontpage_box_'.$i.''] == $row['category_id'] ), $row['category_id']) ;
										} 
										$text .= $rs->form_select_close() ;
									}											
									$text .= "
								</td>
							</tr>
							<tr  class='active'>
								<td>". LAN_THEME_ADMIN_61 . LAN_THEME_ADMIN_60 ." </td>
								<td>". $rs->form_text("frontpage_box_1_limit", 3, varsettrue($tp->post_toForm($_POST['frontpage_box_1_limit']), $tp->post_toForm($pref['frontpage_box_1_limit'])), 3 ) ."</td>
							</tr>
							<tr  class='warning'>
								<td>". LAN_THEME_ADMIN_62 ."  </td>
								<td>" ;																				
									$i = 0;
									while($i <= $count)
										{
											$text .= $rs->form_select_open('frontpage_catnews[]') ."
											" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "" , "") ;
											$sql->db_Select("news_category", "*", "order by category_id", "no_where");

											while($row = $sql->db_Fetch() )
											{			
												$ch = ($row['category_id'] == $pref['frontpage_catnews'][$i] ? "selected" : '');
												$text .= $rs->form_option($row['category_name'], $ch , $row['category_id']) ;
											}
											$text .= $rs->form_select_close() ;
											if ($i % 2)
											{
											   $text .= "<br /> ";
											}
											$i++;													
										} ;													
									$text .="
								</td>
							</tr>	
							<tr  class='warning'>
								<td>". LAN_THEME_ADMIN_61 . LAN_THEME_ADMIN_62 ." <span class='label label-danger'>". LAN_THEME_ADMIN_53B ."</span></td>
								<td>". $rs->form_text("frontpage_catnews_limit", 3, varsettrue($tp->post_toForm($_POST['frontpage_catnews_limit']), $tp->post_toForm($pref['frontpage_catnews_limit'])), 3 ) ."</td>
							</tr>
							<tr  class='danger'>
								<td>". LAN_THEME_ADMIN_65 ."</td>
								<td>";
									for ($i=4 ; $i<7 ; $i++) 
									{
										$text .= $rs->form_select_open('frontpage_box_'.$i.'' ) ."
										" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
										$sql->db_Select("news_category", "*", "order by category_id", "no_where");
										while($row = $sql->db_Fetch() )
										{
											$text .= $rs->form_option($row['category_name'], ($pref['frontpage_box_'.$i.''] == $row['category_id'] ), $row['category_id']) ;
										} 
										$text .= $rs->form_select_close() ;
									}											
									$text .= "
								</td>
							</tr>	
							<tr  class='danger'>
								<td>". LAN_THEME_ADMIN_61 . LAN_THEME_ADMIN_65 ."</td>
								<td>". $rs->form_text("frontpage_box_2_limit", 3, varsettrue($tp->post_toForm($_POST['frontpage_box_2_limit']), $tp->post_toForm($pref['frontpage_box_2_limit'])), 3 ) ."</td>
							</tr>
							<tr  >
								<td>". LAN_THEME_ADMIN_70 ." </td>
								<td><span class='label label-danger'>". LAN_THEME_ADMIN_71 ."</span></td>
							</tr>	
							<tr  class='success'>
								<td>".LAN_THEME_ADMIN_73 ." </td>
								<td>";
									$text .= $rs->form_select_open('frontpage_news_photograph' ) ."
										" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
										$sql->db_Select("news_category", "*", "order by category_id", "no_where");
										while($row = $sql->db_Fetch() )
										{			
											$text .= $rs->form_option($row['category_name'], ($pref['frontpage_news_photograph'] == $row['category_id'] ), $row['category_id']) ;
										} 
										$text .= $rs->form_select_close() ;
							
									$text .="
								</td>
							</tr>										
							<tr  class='success'>
								<td>".LAN_THEME_ADMIN_72 ." </td>
								<td>";
									$text .= $rs->form_select_open('frontpage_news_caricature' ) ."
									" .$rs->form_option(LAN_THEME_ADMIN_DISABLED , "{$ch}" , 0) ;
									$sql->db_Select("news_category", "*", "order by category_id", "no_where");
									while($row = $sql->db_Fetch() )
									{			
										$text .= $rs->form_option($row['category_name'], ($pref['frontpage_news_caricature'] == $row['category_id'] ), $row['category_id']) ;
									} 
									$text .= $rs->form_select_close() ;													
									$text .="
								</td>
							</tr>								
						</table>
					</div><!-- end table respo -->
					<button class='btn btn-info button-save' name='frontpage_news_submit_default'>
						<span class='glyphicon glyphicon-save'></span>
						<span class='hidden-phone'>".LAN_THEME_ADMIN_SAVE."</span>
					</button>												
				</div><!-- end panel body -->
			</div><!-- end panel -->
			<input type='hidden' name='e-token' value='".e_TOKEN."' />";
		
	$text .= $rs->form_close();
		//echo $tp->post_toForm($_POST['frontpage_facebook']) ;
		/*
	*/
// =========================================================================

/*
		$text .= '
		<div id="page-content" class="clearfix">
					<div class="page-header position-relative">
						<h1>
							Typography
							<small>
								<i class="icon-double-angle-right"></i>
								 (.page-header &gt; h1)
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row">
						<!--PAGE CONTENT BEGINS HERE-->

						<div class="row">
							<div class="col-md-12 ">
								<h4>Headings & Paragraphs</h4>

								<hr />
								<h1>h1. Heading 1</h1>
								<p class="lead">
									Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
								</p>
								<h2>h2. Heading 2</h2>
								<p>
									Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.
								</p>
								<h3>h3. Heading 3</h3>
								<p>
									Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
								</p>
								<h4>h4. Heading 4</h4>
								<h5>h5. Heading 5</h5>
								<h6>h6. Heading 6</h6>
							</div><!--/span-->

							<div class="col-md-12 ">
								<div class="widget-box">
									<div class="widget-header widget-header-flat">
										<h4>Lists</h4>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<div class="col-md-12 ">
													<ul>
														<li>Unordered List Item # 1</li>

														<li>
															<small>List Item in small tag</small>
														</li>

														<li>
															<b>List Item in bold tag</b>
														</li>

														<li>
															<i>List Item in italics tag</i>
														</li>
														<li>Unordered List Item which is a longer item and may break into more lines.</li>

														<li>
															<strong>List Item in strong tag</strong>
														</li>

														<li>
															<em>List Item in emphasis tag</em>
														</li>
													</ul>
												</div>

												<div class="col-md-12 ">
													<ol>
														<li>Ordered List Item # 1</li>
														<li class="text-info">.text-info Ordered List Item</li>
														<li class="text-error">.text-error Ordered List Item</li>

														<li class="text-success">
															<b>.text-success</b>
															Ordered List Item
														</li>
														<li class="text-warning">.text-warning Ordered List Item</li>
														<li class="muted">.muted Ordered List Item</li>
													</ol>
												</div>
											</div>

											<hr />
											<div class="row">
												<div class="span12">
													<ul class="unstyled spaced">
														<li>
															<i class="icon-bell purple"></i>
															List with custom icons and more space
														</li>

														<li>
															<i class="icon-star blue"></i>
															Unordered List Item # 2
														</li>

														<li>
															<i class="icon-remove red"></i>
															Unordered List Item # 3
														</li>

														<li>
															<i class="icon-ok green"></i>
															Unordered List Item # 4 which is a longer item and may break into more lines.
														</li>
													</ul>

													<ul class="unstyled spaced2">
														<li>
															<i class="icon-circle green"></i>
															Even more space
														</li>

														<li class="text-warning orange">
															<i class="icon-warning-sign"></i>
															Unordered List Item # 5
														</li>

														<li class="muted">
															<i class="icon-angle-right"></i>
															Unordered List Item # 6
														</li>

														<li>
															<ul class="inline">
																<li>
																	<i class="icon-share-alt green"></i>
																	Inline List Item # 1
																</li>
																<li>List Item # 2</li>
																<li>List Item # 3</li>
															</ul>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!--/span-->
						</div>

						<hr />
						<div class="row">
							<div class="span4">
								<div class="widget-box">
									<div class="widget-header widget-header-flat">
										<h4>BlockQuote & Address</h4>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<blockquote class="pull-right">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

													<small>
														Someone famous
														<cite title="Source Title">Source Title</cite>
													</small>
												</blockquote>
											</div>

											<blockquote>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

												<small>
													Someone famous
													<cite title="Source Title">Source Title</cite>
												</small>
											</blockquote>

											<hr />
											<address>
												<strong>Twitter, Inc.</strong>

												<br />
												795 Folsom Ave, Suite 600
												<br />
												San Francisco, CA 94107
												<br />
												<abbr title="Phone">P:</abbr>
												(123) 456-7890
											</address>

											<address>
												<strong>Full Name</strong>

												<br />
												<a href="mailto:#">first.last@example.com</a>
											</address>
										</div>
									</div>
								</div>
							</div>

							<div class="span8">
								<div class="row">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4>Definition List</h4>

											<div class="widget-toolbar">
												<label>
													<small class="green">
														<b>Horizontal</b>
													</small>

													<input id="id-check-horizontal" type="checkbox" class="ace-switch ace-switch-6" />
													<span class="lbl" for="id-check-horizontal"></span>
												</label>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<code class="pull-right" id="dt-list-code">&lt;dl&gt;</code>

												<dl id="dt-list-1">
													<dt>Description lists</dt>
													<dd>A description list is perfect for defining terms.</dd>
													<dt>Euismod</dt>
													<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
													<dd>Donec id elit non mi porta gravida at eget metus.</dd>
													<dt>Malesuada porta</dt>
													<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
													<dt>Felis euismod semper eget lacinia</dt>
													<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
												</dl>
											</div>
										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<div class="row">
									<div class="widget-box">
										<div class="widget-header widget-header-flat">
											<h4>Code view</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<pre class="prettyprint linenums">&lt;p class="muted"&gt;Fusce dapibus, tellus ac cursus commodo.&lt;/p&gt;
													&lt;p class="text-warning"&gt;Etiam porta sem malesuada.&lt;/p&gt;
													&lt;p class="text-error"&gt;Donec ullamcorper nulla non metus auctor fringilla.&lt;/p&gt;
													&lt;p class="text-info"&gt;Aenean eu leo quam.&lt;/p&gt;
													&lt;p class="text-success"&gt;Duis mollis.&lt;/p&gt;</pre>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--PAGE CONTENT ENDS HERE-->
					</div><!--/row-->
				</div><!--/#page-content-->';	*/