<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	if (is_cart()) :
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 2 );
	elseif (is_shop() || is_product_category() || is_product_tag()) :
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
	else :
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	endif;
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
} elseif ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
} else {
	$classes[] = 'middle';
}
	
// added by THEME BLOSSOM
if (is_cart()) :
	$classes[] = 'col-xs-6 tbWow fadeInUp';
elseif (is_shop() || is_product_category() || is_product_tag()) :
	$classes[] = 'col-xs-6 col-sm-4 tbWow fadeInUp';
else :
	$classes[] = 'col-xs-6 col-sm-3 tbWow fadeInUp';
endif;

?>

<article <?php post_class( $classes ); ?>>
	<div>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<a href="<?php the_permalink(); ?>" class="tb-product-catalogue-image">

		
		<?php woocommerce_show_product_loop_sale_flash(); ?>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		</a>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	</div>

</article>