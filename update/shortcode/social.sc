if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {

return "
<script type='text/javascript'>
var switchTo5x=true;
</script>
<script type='text/javascript' src='http://w.sharethis.com/button/buttons.js'></script>
<script type='text/javascript'>stLight.options({publisher: 'ur-ee18aa95-3aee-3e5e-58fc-1cec62cc0b8'}); </script>
<span class='st_facebook_vcount' displayText='Facebook'></span>
<span class='st_fblike_vcount' ></span>
<span class='st_twitter_vcount' displayText='Tweet'></span>
<span class='st_sharethis_vcount' displayText='Share'></span>
<span class='st_linkedin_vcount' displayText='LinkedIn'></span>
<span class='st_digg_vcount' displayText='Digg'></span>
<span class='st_plusone_vcount' displayText='Google +1'></span>
<!-- AddThis Button END -->
";
} 