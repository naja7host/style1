global $tp , $ns ;

$text1 = '<iframe style="border:none; overflow:hidden; width:440px; height:200px" src="//www.facebook.com/plugins/likebox.php?href='.XURL_FACEBOOK.'&height=200&colorscheme=light&show_faces=true&border_color=%23cdcdcd&stream=false&header=false"></iframe>';
$text = '<iframe style="border:none; overflow:hidden; width:440px; height:300px" src="//www.facebook.com/plugins/likebox.php?href='.XURL_FACEBOOK.'&height=300&colorscheme=light&show_faces=true&border_color=%23cdcdcd&stream=false&header=false"></iframe>';
$output = '<object style="border: none; overflow: hidden; width: 100%; height: 240px;" data="https://www.facebook.com/plugins/likebox.php?href='.XURL_FACEBOOK.'" type="text/html"></object>';
$ns -> tablerender(LAN_THEME_18, $output);
unset($text);