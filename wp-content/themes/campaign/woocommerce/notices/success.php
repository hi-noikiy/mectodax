<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<section class="col-xs-12">
<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-message"><?php echo wp_kses_post( $message ); ?></div>
<?php endforeach; ?>
</section>