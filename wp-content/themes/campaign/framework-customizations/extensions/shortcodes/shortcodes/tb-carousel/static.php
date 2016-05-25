<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension_theme = fw()->extensions->get( 'shortcodes' )->get_shortcode('tb_carousel');

wp_enqueue_style(
	'tb-post-carousel',
	$shortcodes_extension_theme->locate_URI('/static/styles.css')
);

wp_enqueue_style('slick');
wp_enqueue_style('slick-theme');
wp_enqueue_script('slick');