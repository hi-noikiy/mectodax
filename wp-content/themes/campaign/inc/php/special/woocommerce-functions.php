<?php


// WooCommerce Image Dimensions
if (!function_exists('campaign_woocommerce_image_dimensions')) :

add_action( 'init', 'campaign_woocommerce_image_dimensions', 1 );

function campaign_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '300',	// px
		'height'	=> '300',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '150',	// px
		'height'	=> '150',	// px
		'crop'		=> 0 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

endif;

// Redefine woocommerce_output_related_products()
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'campaign_woocommerce_output_related_products', 20);


if (!function_exists('campaign_woocommerce_output_related_products')) :

function campaign_woocommerce_output_related_products() {
	$args = array(
		'posts_per_page' => 4,
		'columns' => 4,
		'orderby' => 'rand'
	);

	woocommerce_related_products(apply_filters( 'woocommerce_output_related_products', $args )); // Display 3 products in rows of 2
}

endif;


// remove sale flash - it will be added manually
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

// remove rating
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


// force sidebar and declare bootstrap ready layout
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'campaign_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'campaign_woo_wrapper_end', 10);

function campaign_woo_wrapper_start() {

$layout_class = 'col-sm-8';
$row = '';

if (is_single()) {
	$layout_class = '';
	$row = ' row';
}

echo '<div id="main-content" class="main-content"><div id="primary" class="content-area col-xs-12 ' . $layout_class . '"><div id="content" class="site-content' . $row . '" role="main">  <!-- woocommerce wrapper starts -->';
}

function campaign_woo_wrapper_end() {
	echo '</div></div>';

	if (!is_single()) {
		do_action( 'woocommerce_sidebar' );
	}

	echo '</div> <!-- woocommerce wrapper ends -->';
}

// breadcrumbs
add_filter( 'woocommerce_breadcrumb_defaults', 'campaign_woo_change_breadcrumb_delimiter' );
function campaign_woo_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &raquo; ';
	$defaults['wrap_before'] = '<nav class="breadcrumbs woo-breadcrumbs alignleft" itemprop="breadcrumb">';
	$defaults['wrap_after'] = '</nav>';

	return $defaults;
}

 // Replace woocommerce_breadcrumb with yoast_breadcrumb if WordPress SEO plugin is installed
if (function_exists('yoast_breadcrumb')) :

add_filter( 'woocommerce_breadcrumb', 'woo_custom_use_yoast_breadcrumbs' );
function woo_custom_use_yoast_breadcrumbs ( $breadcrumbs ) {

	$before = '<nav class="breadcrumbs woo-breadcrumbs" itemprop="breadcrumb">';
	$after = '</nav>';
	$breadcrumbs = yoast_breadcrumb( $before, $after, false ); 

	return $breadcrumbs;

}

endif;
 
 
/**
 * WooCommerce Product Thumbnail
 **/
 
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
 
/**
 * WooCommerce Loop Product Thumbs
 **/
 
 if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
 
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
 }

 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
 
		if ( ! $placeholder_width )
			$placeholder_width = wc_get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = wc_get_image_size( 'shop_catalog_image_height' );
			
			$output = '<div class="imagewrapper">';
 
			if ( has_post_thumbnail() ) {
				
				$output .= get_the_post_thumbnail( $post->ID, $size ); 
				
			} else {
			
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';
			
			}
			
			$output .= '</div>';
			
			return $output;
	}
 }


?>