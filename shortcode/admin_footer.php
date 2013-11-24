<?php
if (!defined('e107_INIT')) { exit; }

	$text .="
			</div>
		</div>
	</div>	
	<a href='#' id='btn-scroll-up' class='btn btn-small btn-inverse'>
		<i class='icon-double-angle-up icon-only bigger-110'></i>
	</a>
		<!--basic scripts-->
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
		<script src='".THEME_ABS."js/bootstrap.min.js'></script>
		<!--page specific plugin scripts-->
		<script src='".THEME_ABS."js/prettify.js'></script>
		<!--ace scripts-->	
		<!--inline scripts related to this page-->";
		
		
	$notused ="
		<script type='text/javascript' charset='utf-8'>
		//<![CDATA[
		jQuery(function() {
		  jQuery('.nav li').each(function() {
			var href = jQuery(this).find('a').attr('href');
			if (href === window.location.pathname) {
			  jQuery(this).addClass('active');
			}
		  });
		});  
		//]]>
		</script>	
	<script type='text/javascript'>
			$(function() {			
				window.prettyPrint && prettyPrint();
				$('#id-check-horizontal').removeAttr('checked').change(function(){
					$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class='dl-horizontal'&gt;' : '&lt;dl&gt;');
				});			
			})
		</script>";
		
	unset($notused);

