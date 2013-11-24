if(stristr(e_PAGE.(e_QUERY ? "?".e_QUERY : ""), 'news.php?extend') == TRUE) {
return '
<!-- AddThis Button BEGIN -->
<fieldset>
<legend>نشر الخبر في :</legend>
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_preferred_5"></a>
<a class="addthis_button_preferred_7"></a>
<a class="addthis_button_preferred_15"></a>
<a class="addthis_button_preferred_20"></a>
<a class="addthis_button_preferred_12"></a>
<a class="addthis_button_preferred_13"></a>
<a class="addthis_button_preferred_11"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#"></script>
</fieldset>

<!-- AddThis Button END -->
';
} 
