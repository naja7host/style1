global $tp;
$news_item = getcachedvars('current_news_item');
$param = getcachedvars('current_news_param');

	if ($parm == '')
		$limit = 120 ;
	else 
		$limit = $parm ;
				
//if ($news_item['news_extended'] && (strpos(e_QUERY, 'extend') === TRUE || $parm == "force")) 
	$text = $tp -> toHTML($news_item['news_body'], TRUE, 'BODY, fromadmin', $news_item['news_author']);
	$text1 = $text ;
	$text = $tp->html_truncate($text , $limit , ' ... ');

if($news_item['news_extended'] && (isset($_POST['preview']) || strpos(e_QUERY, 'extend') !== FALSE) && $parm != "noextend")
{
    $news_extended = $tp -> toHTML($news_item['news_extended'], TRUE, 'BODY, fromadmin', $news_item['news_author']);
    $text1.= "<br /><br />".$news_extended;
	return $text1;
}  else {
return $text;
}
   
