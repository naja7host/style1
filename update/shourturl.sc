if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE AND ($pref['frontpage_news_shorturl']) )  {
$news_item = getcachedvars('current_news_item'); 
return "
<div class='alert alert-info'>
".LAN_THEME_38."
<div class='clear'>  </div>
<a href='".SITEURL."news".$news_item['news_id'].".html' rel='nofollow' >".SITEURL."news".$news_item['news_id'].".html</a>
</div>
";
}