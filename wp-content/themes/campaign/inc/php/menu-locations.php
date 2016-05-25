<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'   => esc_html__( 'Main Menu', 'campaign' ),
	'top_menu'   => esc_html__( 'Top Menu', 'campaign' ),
	'contribute' => esc_html__( 'Action menu', 'campaign' ),
	'footer_navigation' => esc_html__( 'Footer Navigation', 'campaign' )
) );