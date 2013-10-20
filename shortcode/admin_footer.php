<?php
	$text .="
		<a href='#' id='btn-scroll-up' class='btn btn-small btn-inverse'>
			<i class='icon-double-angle-up icon-only bigger-110'></i>
		</a>

		<!--basic scripts-->

		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

		<script src='".THEME_ABS."js/bootstrap.min.js'></script>

		<!--page specific plugin scripts-->

		<script src='".THEME_ABS."themes/js/prettify.js'></script>

		<!--ace scripts-->

		<script src='".THEME_ABS."themes/js/w8-elements.min.js'></script>
		<script src='".THEME_ABS."themes/js/w8.min.js'></script>
	
		<!--inline scripts related to this page-->

		<script type='text/javascript'>
			$(function() {			
				window.prettyPrint && prettyPrint();
				$('#id-check-horizontal').removeAttr('checked').change(function(){
					$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class='dl-horizontal'&gt;' : '&lt;dl&gt;');
				});			
			})
		</script>";


