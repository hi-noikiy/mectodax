<?php
/**
 * Product Loop End
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
</section>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#tb-product-catalogue').imagesLoaded( function() {
		jQuery('#tb-product-catalogue').isotope({
			itemSelector : 'article',
			layoutMode : 'masonry'
		});
	});
  	
	return false;

});
</script> 