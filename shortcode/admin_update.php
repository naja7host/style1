<?php
if (!defined('e107_INIT')) { exit; }

	require_once(e_HANDLER.'form_handler.php');
	$rs = new form;	
	$style1 = new style1;
	$config = config();
if (isset($_POST['frontpage_news_submit_update_theme'])) {

	$result_msg 	= "";
	$result_class	= "";

	//echo $config['zip_url'] ;
	$url = $config['zip_url'];
	$stylename = $themerawname.".zip" ;
	$path =  THEME ."update/" ;

	$headers = $style1->getHeaders($url);

	
	if ($headers['http_code'] === 200 ) {	
		if ($style1->download_file($url, $path.$stylename)){
			$result_msg .= 'Download complete!';
		}
			require_once(e_HANDLER."pclzip.lib.php");
			$archive = new PclZip($path . $stylename);
			$unarc = ($fileList = $archive -> extract(PCLZIP_OPT_PATH, $path , PCLZIP_OPT_SET_CHMOD, 0666, PCLZIP_OPT_REMOVE_PATH, "style1-master"));	  
				if(!$unarc) {					
					$result_msg .= " '".$archive -> errorName(TRUE)."'";
					$result_class .= "alert-danger";
				}
				else 
				{	
					$result_msg .= LAN_THEME_ADMIN_91;
					$result_class .= "alert-success";
				}				
	} 
	else 	
	{
		$result_msg .= " '".$archive -> errorName(TRUE)."'";
		$result_class .= "alert-danger";	
	}
	
	
	$result = "			<div class='alert $result_class'>
							<button class='close' data-dismiss='alert' type='button'>
								<i class='icon-remove'></i>
							</button>
							<i class='icon-ok green'></i>	
							<strong >$result_msg</strong >							
						</div>	
						";		
} 

	if(is_writable(THEME))
	{
		$doawnload_zip ="<input class='tbox' type='file' name='file_userfile[]' size='40' />";
	} 
	else 
	{
		$doawnload_zip ="<div class='alert alert-danger'>".LAN_THEME_ADMIN_89 . THEME . LAN_THEME_ADMIN_90."</div>";
	}	

	
// ===========================================================================

	function config() 
	{
		global $themeversion , $themerawname;
		$config = array(
			'slug' => $themeversion,
			'proper_folder_name' => 'github-updater',
			'api_url' => 'https://api.github.com/repos/naja7host/'.$themerawname ,
			'raw_url' => 'https://raw.github.com/naja7host/'.$themerawname .'/master',
			'github_url' => 'https://github.com/naja7host/'.$themerawname ,
			'zip_url' => 'https://github.com/naja7host/'.$themerawname .'/archive/master.zip',
			'readme' => 'README.md',
		);
		return $config ; 
	}
	//echo  basename($config['zip_url']) ;
	
	$text .= "	<li class='active'>".LAN_THEME_ADMIN_13."</li>
			</ol><!--.breadcrumb-->
						<!--
						<div class='panel panel-primary '>
						<div class='panel-heading'>".  LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_13 ."</div>
						<div class='panel-body'>
						-->
			". $result ."	
			". $rs->form_open("post", e_SELF."?update" ,  'frontpage_news_submit_update_theme', '', 'enctype="multipart/form-data"') ."
			<!--PAGE CONTENT BEGINS HERE-->	
			<div class='panel panel-primary'>
				<div class='panel-heading'><i class='icon-star orange'></i> ". LAN_THEME_ADMIN_12 . LAN_THEME_ADMIN_13 ."</div>							
				<div class='panel-body'>										
					<div class='table-responsive' >
						<table class='table  table-hover'>
							<tr >
								<td>". LAN_THEME_ADMIN_86."	</td>
								<td>".$themeversion."</td>
							</tr>
							".$style1->get_new_version()."
						</table>
					</div><!-- end table respo -->				
				</div><!-- end panel body -->
			</div><!-- end panel -->
						
			<input type='hidden' name='e-token' value='".e_TOKEN."' />";		
			$text .= $rs->form_close();						
