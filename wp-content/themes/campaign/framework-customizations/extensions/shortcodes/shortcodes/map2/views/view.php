<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $map_data_attr
 * @var $atts
 * @var $content
 * @var $tag
 */
?>
<?php isset($atts['class']) ? $class = $atts['class'] : $class = ''; ?>
<div class="wrap-map fw-map <?php echo esc_attr($class); ?>" <?php echo fw_attr_to_html($map_data_attr); ?>>
	<div class="fw-map-canvas map"></div>
</div>