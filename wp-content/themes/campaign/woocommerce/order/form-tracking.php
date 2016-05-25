<?php
/**
 * Order tracking form
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

?>

<form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order">

	<p><?php esc_html_e( 'To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.', 'campaign' ); ?></p>

	<p class="form-row form-row-first"><label for="orderid"><?php esc_html_e( 'Order ID', 'campaign' ); ?></label> <input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php esc_attr_e( 'Found in your order confirmation email.', 'campaign' ); ?>" /></p>
	<p class="form-row form-row-last"><label for="order_email"><?php esc_html_e( 'Billing Email', 'campaign' ); ?></label> <input class="input-text" type="text" name="order_email" id="order_email" placeholder="<?php esc_attr_e( 'Email you used during checkout.', 'campaign' ); ?>" /></p>
	<div class="clear"></div>

	<p class="form-row"><input type="submit" class="button btn btn-tb-primary" name="track" value="<?php esc_attr_e( 'Track', 'campaign' ); ?>" /></p>
	<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>

</form>
