global $tp;
$news_item = getcachedvars('current_news_item');
$param = getcachedvars('current_news_param');
$url = make_url($news_item);

	$textetitle = $news_item['news_title'] ;
	
	if ($parm == "extend")
		$mode = ($parm == "extend") ? "extend" : "item";
	else if ($parm != '')
		$textetitle = $tp->text_truncate($news_item['news_title'] , $parm , ' ... ');


return "<a class='".$GLOBALS['NEWS_CSSMODE']."_titlelink' style='".(isset($param['itemlink']) ? $param['itemlink'] : "null")."' href='$url' title='".$news_item['news_title']."' >".$textetitle."</a>";

   
