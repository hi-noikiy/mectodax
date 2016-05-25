<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<?php isset($atts['class']) ? $class = $atts['class'] : $class = ''; ?>
<div class="<?php echo esc_attr($class); ?>">
    <div>
        <?php echo apply_filters('the_content', do_shortcode( $atts['text'] ) ); ?>
    </div>
</div>