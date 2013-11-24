<?php
	
	$seo_url = false;
    function make_url($news_item)
    {
		global $seo_url;
		$news_seo = strtolower(ereg_replace(' ', '-', $news_item['news_title'])); //added seo
        
        if ($seo_url == TRUE) {
            return SITEURL ."news".$news_item['news_id'].".html";
		} else {
            //return "http://www.".e_DOMAIN."/news.php?extend.".$news_item['news_id'];
            return SITEURL ."news.php?extend.".$news_item['news_id'];
        }
    }
    function make_url_sitemap($news_item)
    {
		global $seo_url;
		$news_seo = strtolower(ereg_replace(' ', '-', $news_item['news_title'])); //added seo
        
        if ($seo_url == TRUE) {
            return "news".$news_item['news_id'].".html";
		} else {
            return "news.php?extend.".$news_item['news_id'];
        }
    }	
	
?>
