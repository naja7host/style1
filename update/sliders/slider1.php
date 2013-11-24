<?php

if ($pref['frontpage_news_silder1_vit'])
	$vitese = $pref['frontpage_news_silder1_vit'];
else 
	$vitese = "5000";	
	
	$newsList = $sql->db_getList();
	$idnews = array();
	$text = '
	<div class="span8 slideindex">
	<link rel="stylesheet" type="text/css" href="' . THEME . 'sliders/slider1/slidercss.css" />
	<script type="text/javascript" src="' . THEME . 'sliders/slider1/contentslider.js" ></script>		
	<div class="contentslide c1" id="slider1">
		<div class="opacitylayer">	
	' ;

	$count = 0;
	// do
	// {
		// 
		foreach($newsList  as $row )
		// while (list($key, $row) = each($newsList)) 
		{	
			$idnews[] = $row['news_id'];
			$NEWSLISTSTYLE1 = "
			<div class='contentdiv'>

							<h1>{NEWSTITLELINK=extend}</h1>
							{NEWSIMAGE}<br /><br />
							{NEWSBODY}
							{EXTENDED}	
							<br />
								<div class='clear'>  </div>	
							<br />

			</div>			
			" ;		
			$count++;
			if ($count <= $pref['frontpage_news_slider'])
				$text .= $ix->render_newsitem($row, 'return', '', $NEWSLISTSTYLE1, $param);

		}	
	// } while($count < $pref['frontpage_news_slider']); 	
	
	$text .= '
			<div class="pagination p1" id="paginate-slider1"></div>
			<script type="text/javascript">ContentSlider("slider1", '. $vitese .')</script>
			<br />
		</div>
	</div>	
	</div>	
	' ;	
	
	$ns->tablerender($news_cap, $text, "no_caption");
	unset($vitese);
	unset($text);
?>