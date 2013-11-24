//SC_BEGIN NEWSIMAGE
$news_item = getcachedvars('current_news_item');
$param = getcachedvars('current_news_param');
	/*if (strlen($news_item['news_thumbnail']) == 0)
	{	// If news thumbnail is empty display the no_image.png
		$news_item['news_thumbnail'] = "no_image.png";
	}*/
return (isset($news_item['news_thumbnail']) && $news_item['news_thumbnail']) ? "<a href='".e_HTTP."news.php?extend.".$news_item['news_id']."'><img class='".$GLOBALS['NEWS_CSSMODE']."_image' src='".e_IMAGE_ABS."newspost_images/".$news_item['news_thumbnail']."' alt='' /></a>" : "<a href='".e_HTTP."news.php?extend.".$news_item['news_id']."'><img class='".$GLOBALS['NEWS_CSSMODE']."_image' src='".e_IMAGE_ABS."newspost_images/no_image.png' alt='' /></a>";
//SC_END

return "<img src='".e_IMAGE_ABS."newspost_images/".$parm."' alt='' />";

