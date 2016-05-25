<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
TGM Plugin Activation
**/
if (is_admin()) {
	get_template_part('inc/php/class-tgm-plugin-activation');
	get_template_part('inc/php/tgm_plugin_activation');
}

/**
Globals
**/
get_template_part('inc/globals');

/**
Setup
**/
if ( ! function_exists( 'campaign_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function campaign_theme_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'inc/css/editor-style.css', fw_theme_font_url() ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'campaign-blog-fullhd', 1920, 675, true);
	add_image_size( 'campaign-blog-full', 1170, 675, true);
	add_image_size( 'campaign-thumb-xl', 600, 600, true);
	add_image_size( 'campaign-wide-thumbnail', 600, 300, true);
	add_image_size( 'campaign-portrait-thumbnail', 300, 600, true);
	add_image_size( 'campaign-wide-s-thumbnail', 300, 150, true);

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for Translation
	load_theme_textdomain( 'campaign', get_template_directory() . '/languages' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	add_theme_support( 'woocommerce' );

}
endif; // campaign_theme_setup
add_action( 'after_setup_theme', 'campaign_theme_setup' );

if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}


/**
PHP - can be changed in child theme's function file
**/

if (!function_exists('campaign_load_extras')) {
	function campaign_load_extras() {
		get_template_part('inc/extras');		
	}
}

campaign_load_extras();

if (!function_exists('campaign_custom_wp_admin_style')) {
	function campaign_custom_wp_admin_style() {
	        wp_register_style( 'campaign_admin_style', PARENT_URL . '/inc/css/themeblossom-admin.css', false, '1.0.0' );
	        wp_enqueue_style( 'campaign_admin_style' );
	}

	add_action( 'admin_enqueue_scripts', 'campaign_custom_wp_admin_style' );
}

add_theme_support('category-thumbnails');

?>