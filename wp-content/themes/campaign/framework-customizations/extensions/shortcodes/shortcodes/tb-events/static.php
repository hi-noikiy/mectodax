<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');

$shortcodes_extension_theme = fw()->extensions->get( 'shortcodes' )->get_shortcode('tb_events');

wp_enqueue_style(
	'tb-upcoming-event',
	$shortcodes_extension_theme->locate_URI('/static/styles.css')
);

wp_enqueue_script('tb-countdown-plugin', $shortcodes_extension_theme->locate_URI('/static/jquery.plugin.min.js'), array('jquery'), '2.0.2', true);

wp_enqueue_script('tb-countdown', $shortcodes_extension_theme->locate_URI('/static/jquery.countdown.min.js'), array('jquery'), '2.0.2', true);