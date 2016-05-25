<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension_theme = fw()->extensions->get( 'shortcodes' )->get_shortcode('tb_gallery');

wp_enqueue_style(
	'tb-gallery',
	$shortcodes_extension_theme->locate_URI('/static/styles.css')
);