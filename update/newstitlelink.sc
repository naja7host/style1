$news_item = getcachedvars('current_news_item');
$param = getcachedvars('current_news_param');
$url = make_url($news_item);
$mode = ($parm == "extend") ? "extend" : "item";
return "<a class='".$GLOBALS['NEWS_CSSMODE']."_titlelink' style='".(isset($param['itemlink']) ? $param['itemlink'] : "null")."' href='$url' title='".$news_item['news_title']."' >".$news_item['news_title']."</a>";

   
