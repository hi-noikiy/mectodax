<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<?php

$this_post_id = $post->ID;
$this_post_meta = fw_get_db_post_option($this_post_id);
$is_new_product = isset($this_post_meta['new_switch']) ? $this_post_meta['new_switch'] : 'no';

if ( $is_new_product == 'yes' ) {
	echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale new">' . esc_html__( 'New!', 'campaign' ) . '</span>', $post, $product );
	
	return false;
}

if ( !$product->price ) {
	echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale free">' . esc_html__( 'Free!', 'campaign' ) . '</span>', $post, $product );
	
	return false;
}

if ( $product->is_on_sale() ) {
	echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'campaign' ) . '</span>', $post, $product );
	
	return false;
}

if ( $product->is_featured() ) {
	echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale featured">' . esc_html__( 'Sale!', 'campaign' ) . '</span>', $post, $product );
	
	return false;
}

?>