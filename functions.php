<?php

if (!defined('e107_INIT')) { exit; }


class style1 {
	
	public function get_new_version() 
	{
		global $themeversion ;
		//var_dump($themeversion);
		//$version = $themeversion;
		$update = "";
		
		// 
		$raw_response =  file_get_contents('https://raw.github.com/naja7host/style1/master/README.md');
		
		if ( !$raw_response  )
			return $version = "	<tr class='danger' >
									<td>". LAN_THEME_ADMIN_87."	</td>
									<td>N/A</td>
								</tr>";

		preg_match( '#^\s*`*~Current Version\:\s*([^~]*)~#im', $raw_response, $__version );

		if ( isset( $__version[1] ) ) {
			$version_readme = $__version[1];
			if (-1 == version_compare( $themeversion, $version_readme ) ) 
			{
				$class ="class='success'";
				$version = $version_readme;
				
				$update ="			
									<button class='btn btn-primary button-save btn-xs' name='frontpage_news_submit_update_theme'>
										<span class='glyphicon glyphicon-import'></span>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_88."</span>
									</button>";												
			}
			else 
			{
				$class ="";
				$version = $version_readme;
				$update ="			<button class='btn btn-default button-save btn-xs'  disabled='disabled' name='frontpage_news_submit_update_theme'>
										<span class='glyphicon glyphicon-stop'></span>
										<span class='hidden-phone'>".LAN_THEME_ADMIN_88."</span>
									</button>";
			}			
		}

		// Refresh every 6 hours
		// To be Added next release
		
		return "				<tr ".$class.">
									<td>". LAN_THEME_ADMIN_87."	</td>
									<td>". $version . $update ."</td>
								</tr>";
	}		
	
	/**
	 * Get Headers function
	 * @param str #url
	 * @return array
	 */
	public function getHeaders($url)
	{
		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_NOBODY, true );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
		curl_setopt( $ch, CURLOPT_HEADER, false );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $ch, CURLOPT_MAXREDIRS, 3 );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);		
		curl_exec( $ch );
		$headers = curl_getinfo( $ch );
		curl_close( $ch );

		return $headers;
	}	

	/**
	 * Download
	 * @param str $url, $path
	 * @return bool || void
	 */
	public function download($url, $path)
	{
		# open file to write
		$fp = fopen ($path, 'w+');
		# start curl
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		# set return transfer to false
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
		curl_setopt( $ch, CURLOPT_BINARYTRANSFER, false );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);				
		# increase timeout to download big file
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
		# write data to local file
		// curl_setopt( $ch, CURLOPT_FILE, $fp );
		
		# execute curl
		$data = curl_exec( $ch );
		file_put_contents($path, $data);	
		# close curl
		curl_close( $ch );
		# close local file
		fclose( $fp );

		if (filesize($path) > 0) return true;
	}
	
	public function download_file ($url, $path)
	{

		$newfilename = $path;
		$file = fopen ($url, "rb");
		if ($file) 
		{
			$newfile = fopen ($newfilename, "wb");
			if ($newfile)
			while(!feof($file)) 
			{
			  fwrite($newfile, fread($file, 1024 * 8 ), 1024 * 8 );
			}
		}
		if ($file) 
		{
			fclose($file);
		}
		if ($newfile) 
		{
			fclose($newfile);
		}
	}	
}


if ($pref['frontpage_news_fonts'])
	define('FONTS', $pref['frontpage_news_fonts']);
else
	define('FONTS', "normal");
	
define('ADMINTOOLS', false);

//XXX XURL Definitions. 

$xurls = array(
	'facebook'		=> 	array('label'=>"Facebook", "placeholder"=>"eg. https://www.facebook.com/naja7host"),
	'twitter'		=>	array('label'=>"Twitter",	"placeholder"=>"eg. https://twitter.com/naja7host"),
	'youtube'		=>	array('label'=>"Youtube",	"placeholder"=>"eg. https://youtube.com/naja7host"),
	'google'		=>	array('label'=>"Google+",	"placeholder"=>""),
	'linkedin'		=>	array('label'=>"LinkedIn",	"placeholder"=>"eg. http://www.linkedin.com/groups?home=&gid=1782682"),
	'github'		=>	array('label'=>"Github",	"placeholder"=>"eg. https://github.com/e107inc"),
	'flickr'		=>	array('label'=>"Flickr",	"placeholder"=>""),
	'instagram'		=>	array('label'=>"Instagram",	"placeholder"=>""),
	'rss'			=>	array('label'=>"rss",	"placeholder"=>"eg. ". e_SITE . e_PLUGIN ."rss_menu/rss.php"),
);	
	
	// foreach($xurls as $k=>$var)
	// {
		// $keypref = "xurl[".$k."]";
		// $def = "XURL_". strtoupper($k);
		
		// $opts = array('size'=>'xxlarge','placeholder'=> $var['placeholder']);	
		// $text .= "
					// <tr>
						// <td>Your ".$var['label']." page</td>
						// <td>
							// ".$frm->text($keypref, $pref['xurl'][$k], false, $opts)."
							// <div class='field-help'>Used by some themes to provide a link to your ".$var['label']." page. (".$def.")</div>
						// </td>
					// </tr>
				// ";
	// }	

if(is_array($pref['xurl']))
{
	define('XURL_FACEBOOK', varsettrue($pref['xurl']['facebook'], false));
	define('XURL_TWITTER', varsettrue($pref['xurl']['twitter'], false));
	define('XURL_YOUTUBE', varsettrue($pref['xurl']['youtube'], false));
	define('XURL_GOOGLE', varsettrue($pref['xurl']['google'], false));
	define('XURL_LINKEDIN', varsettrue($pref['xurl']['linkedin'], false));
	define('XURL_GITHUB', varsettrue($pref['xurl']['github'], false));
	define('XURL_FLICKR', varsettrue($pref['xurl']['flickr'], false));
	define('XURL_INSTAGRAM', varsettrue($pref['xurl']['instagram'], false));
	define('XURL_RSS', varsettrue($pref['xurl']['rss'],  e_PLUGIN ."rss_menu/rss.php"));
}
else
{
	define('XURL_FACEBOOK', "https://www.facebook.com/naja7host");
	define('XURL_TWITTER', "https://twitter.com/naja7host");
	define('XURL_YOUTUBE', "https://youtube.com/naja7host");
	define('XURL_GOOGLE', false);
	define('XURL_LINKEDIN', false);
	define('XURL_GITHUB', false);
	define('XURL_FLICKR', false);
	define('XURL_INSTAGRAM', false);
	define('XURL_RSS', e_PLUGIN ."rss_menu/rss.php");
}

if ($pref['frontpage_news_colorstyle'])
	define('COLORSTYLE', $pref['frontpage_news_colorstyle']);
else
	define('COLORSTYLE', "blue");

if($pref['frontpage_news_logo'])
	$logo = "<a href='".e_HTTP."'><img ".LOGOSTYLE." src='".THEME_ABS."images/logo".$pref['frontpage_news_logo']."' alt='{SITENAME}' /></a><br style='clear:both' />";
else	
	$logo = "<a href='".e_HTTP."'><img ".LOGOSTYLE." src='".THEME_ABS."images/logo/logo.png' alt='{SITENAME}' /></a><br style='clear:both' />";

if($pref['frontpage_news_slider'])
	$totalnews = $pref['frontpage_news_slider'] ;

else
	$totalnews = 7 ;
	

if(!$pref['frontpage_news_ta7rir'])
	$pref['frontpage_news_ta7rir'] = 2 ;

	
if(!$pref['frontpage_news_last24'])
	$pref['frontpage_news_last24'] = 13 ;	

if(!$pref['frontpage_news_last24_limit'])
	$pref['frontpage_news_last24_limit'] = 10 ;

if(!$pref['frontpage_news_block2_sect'])
	$pref['frontpage_news_block2_sect'] = 3 ;

if(!$pref['frontpage_box_1_limit'])
	$pref['frontpage_box_1_limit'] = 2 ;

if(!$pref['frontpage_box_2_limit'])
	$pref['frontpage_box_2_limit'] = 3 ;

if(!$pref['frontpage_catnews_limit'])
	$pref['frontpage_catnews_limit'] = 4 ;	

if($pref['frontpage_news_showdate'])
	$showdate = "<div class='label-info  news_box_index_newsdate '>{NEWSDATE=short}</div>";

else
	$showdate = "";	

if(!$pref['frontpage_video_limit'])
	$pref['frontpage_video_limit'] = 2 ;

if(!$pref['frontpage_news_photograph'])
	$pref['frontpage_news_photograph'] = 4 ;

if(!$pref['frontpage_news_caricature'])
	$pref['frontpage_news_caricature'] = 2 ;

if(!$pref['frontpage_news_datetype'])
	setlocale(LC_TIME, 'ar_IN');	

	
if(!$pref['frontpage_news_shorturl'])
	$pref['frontpage_news_shorturl'] = true;	
	

?>