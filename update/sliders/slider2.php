<?php

	$newsList = $sql->db_getList();
	$idnews = array();
	$ilactive = "class='active'";
	$active = "active";
	$text = "		
		<div class='span8 slideindex'>
			<div class='box_outer' id='feature_outer'>
				<div class='Feature_news'>
					<div class='slider_wrap'>
						<div class='slider_items'>
							<div class='slider'>
								<img class='dummy_slide' src='".THEME_ABS."images/dummy.gif' width='630px' height='340' alt='dummy_slide' />
								";		
	$textol ="" ; 
	$textinner = "							</div> <!--Slider-->							
						</div> <!--Slider Items-->
						<ul class='slider_nav slider_nav_main'>" ; 

		foreach($newsList  as $row )
		{	
			$url = make_url($row);
			$idnews[] = $row['news_id'];
			$textol .= "		<div class='slider_item'>
									<div style='position:relative; overflow:hidden;'>
										<a href='$url' title='".$row['news_title']."' >
											<img src='".e_IMAGE_ABS."newspost_images/".$row['news_thumbnail']."'  alt='".$row['news_title']."' title='".$row['news_title']."' />
										</a>
										<div class='slider_caption'>
											<h2><a href='$url' title='".$row['news_title']."' >".$row['news_title']."</a></h2>
											<p></p>
										</div>
									</div>

								</div> <!--Slider Item-->";
			
			$textinner .="							<li>
								<a href='#'>
									<img src='".e_IMAGE_ABS."newspost_images/".$row['news_thumbnail']."'  alt='".$row['news_title']."' title='".$row['news_title']."' />
								</a>
							</li>";
		}
	
	$textol .= "";
	$textinner .= "" ;
	$texttext .= "						</ul> 
						<div class='clear'></div>
					</div> <!--Slider_wrap-->
				</div> <!--End Feature news-->
			</div> <!--End Span 8-->
		</div> <!--End Feature Outer-->	
		<div class='clearfix'></div>" ;	
	$text .= $textol ;
	$text .= $textinner ;
	$text .= $texttext ;
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($text);
?>