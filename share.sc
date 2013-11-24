if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
$news_item = getcachedvars('current_news_item'); 
return "
<!-- AddThis Button BEGIN -->
<fieldset>
<legend>".LAN_THEME_37."</legend>
<script type='text/javascript'>
var switchTo5x=true;
</script>
<script type='text/javascript' src='http://w.sharethis.com/button/buttons.js'></script>
<script type='text/javascript'>stLight.options({publisher: '8a31bf30-197a-4f30-9ea4-e62a0b3097e7'}); </script>
<span class='st_facebook_vcount' displayText='Facebook'></span>
<span class='st_twitter_vcount' displayText='Tweet'></span>
<span class='st_linkedin_vcount' displayText='LinkedIn'></span>
<span class='st_plusone_vcount' displayText='Google +1'></span>
<span class='st_email_vcount' displayText='Email'></span>
<span class='st_fblike_vcount' displayText='Facebook Like'></span>
<span class='st_digg_vcount' displayText='Digg'></span>
<span class='st_sharethis_vcount' displayText='Share'></span>
<span class='st_sharethis' st_via='".e_DOMAIN."'></span>
<!-- AddThis Button END -->
</fieldset>
<!-- AddThis Button END -->
";
} 
