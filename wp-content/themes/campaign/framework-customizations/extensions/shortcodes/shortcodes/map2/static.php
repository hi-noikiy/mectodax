<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');

$shortcodes_extension_theme = fw()->extensions->get( 'shortcodes' )->get_shortcode('map2');

wp_enqueue_style(
	'fw-shortcode-map',
	$shortcodes_extension_theme->locate_URI('/static/css/styles.css')
);

wp_enqueue_script(
	'google-maps-api-v3',
	'https://maps.googleapis.com/maps/api/js?v=3.15&sensor=false&libraries=places',
	array(),
	'3.15',
	true
);

wp_enqueue_script(
	'fw-shortcode-map-script',
    $shortcodes_extension_theme->locate_URI('/static/js/scripts.js'),
	array('jquery', 'underscore', 'google-maps-api-v3'),
	fw()->manifest->get_version(),
	true
);