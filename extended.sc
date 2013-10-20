global $tp;
$news_item = getcachedvars('current_news_item');
$param = getcachedvars('current_news_param');
if ($news_item['news_extended'] && (strpos(e_QUERY, 'extend') === FALSE || $parm == "force"))
{
	if (defined("PRE_EXTENDEDSTRING"))
	{
		$es1 = PRE_EXTENDEDSTRING;
	}
	if (defined("POST_EXTENDEDSTRING"))
	{
		$es2 = POST_EXTENDEDSTRING;
	}
	if (isset($_POST['preview']))
	{
		return $es1.EXTENDEDSTRING.$es2."<br />".$tp->toHTML($news_item['news_extended'], TRUE, 'BODY, fromadmin', $news_item['news_author']);
	}
	else
	{
		return $es1."<a class='".$GLOBALS['NEWS_CSSMODE']."_extendstring' href='".e_HTTP."news.php?extend.".$news_item['news_id']."'>".EXTENDEDSTRING."</a>".$es2;
	}
}
else
{
	if (defined("PRE_EXTENDEDSTRING"))
	{
		$es1 = PRE_EXTENDEDSTRING;
	}
	if (defined("POST_EXTENDEDSTRING"))
	{
		$es2 = POST_EXTENDEDSTRING;
	}
	return $es1."<a class='".$GLOBALS['NEWS_CSSMODE']."_extendstring' href='".e_HTTP."news.php?extend.".$news_item['news_id']."'>".EXTENDEDSTRING."</a>".$es2;
}