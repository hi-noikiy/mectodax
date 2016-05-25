<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

/**
ADMIN AREA
**/

if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

global $campaign_theme_options;

$useAnimate = campaign_default_array($campaign_theme_options, 'switch-use-animation', 0);
$prettyPhoto = campaign_default_array($campaign_theme_options, 'switch-use-prettyPhoto', 1);

// Add Lato font, used in the main stylesheet.
wp_enqueue_style('fw-theme-lato', fw_theme_font_url(), array(), '1.0');

/**
GENERICONS AND ICOMOON
**/
wp_enqueue_style( 'genericons',	PARENT_URL . '/inc/css/genericons/genericons.css', array(),	'1.0');
wp_enqueue_style( 'icomoon',	PARENT_URL . '/inc/css/icomoon.css', array(),	'1.0');

// Load Unyson main stylesheet.
wp_enqueue_style( 'style',	get_stylesheet_uri(), array( 'genericons' ), '1.0');

/**
Bootstrap
**/
wp_enqueue_style('bootstrap', PARENT_URL . '/inc/css/bootstrap.css', array(),	'3.3.4');
wp_enqueue_style('bootstrap-theme', PARENT_URL . '/inc/css/bootstrap-theme.css', array(),	'3.3.4');
wp_enqueue_script('bootstrap-js', PARENT_URL . '/inc/js/bootstrap.min.js',	array(), '3.3.4', true);

/**
MMenu
**/
wp_enqueue_style( 'mmenu', PARENT_URL . '/inc/css/jquery.mmenu.all.css' );
wp_enqueue_script('mmenu', PARENT_URL . "/inc/js/jquery.mmenu.min.all.js", array('jquery'), '5.4.0', false);


/**
Comments
**/
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}


if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script( 'fw-theme-keyboard-image-navigation', PARENT_URL . '/inc/js/keyboard-image-navigation.js', array( 'jquery' ), '1.0');
}

if ( is_active_sidebar( 'footer' ) ) {
	wp_enqueue_script( 'jquery-masonry' );
}

wp_enqueue_script('jquery-ui-tabs', PARENT_URL . '/inc/js/jquery-ui-1.10.4.custom.js',	array( 'jquery' ), '1.0', true);

wp_enqueue_script( 'fw-theme-script', PARENT_URL . '/inc/js/functions.js', array( 'jquery' ), '1.0', true);

// Font Awesome stylesheet
wp_enqueue_style( 'font-awesome', PARENT_URL . '/inc/css/font-awesome/css/font-awesome.min.css', array(), '1.0');


wp_enqueue_script('jquery-custom-input', PARENT_URL . '/inc/js/jquery.customInput.js', array( 'jquery' ), '1.0', true);

/**
Selectize
**/
{
	wp_enqueue_style('selectize-css', PARENT_URL . '/inc/css/selectize.css', array(),	'1.0');
	wp_enqueue_script('selectize-js', PARENT_URL . '/inc/js/selectize.js', array( 'jquery' ), '1.0', true);
}

/**
ANIMATE.CSS
**/
	
// Animation
if ($useAnimate) :
	wp_enqueue_style( 'animate-css', PARENT_URL . '/inc/css/animate.min.css', array( ), false, 'all' );
	wp_enqueue_script( 'wow', PARENT_URL . '/inc/js/wow.min.js', array('jquery'), '1.0.1', true );
endif;

/**
PRETTY PHOTO
**/
	
// Pretty Photo
if ($prettyPhoto) :
wp_enqueue_style('campaign_pp_css', PARENT_URL . "/inc/prettyPhoto/css/prettyPhoto.css", array( ), false, 'all');
wp_enqueue_script('campaign_pp_js', PARENT_URL . "/inc/prettyPhoto/js/jquery.prettyPhoto.js", false, '3.1.5', true);
endif;

/**
FLEXSLIDER
**/
wp_enqueue_style( 'flexslider', PARENT_URL . '/inc/css/flexslider.css' );
wp_enqueue_script('parallax', PARENT_URL . "/inc/js/jquery.parallax.js", false, '2.2.2', false);

/**
STICKY Sidebar
**/
$useStickySidebar = campaign_default_array($campaign_theme_options, 'switch-sticky-sidebar', 0);
if ($useStickySidebar) :
	wp_enqueue_script('sticky-sidebar', PARENT_URL . "/inc/js/stickySidebar.js", false, '1.2.2', false);
endif;

/**
SLICK SLIDER
**/
wp_register_style( 'slick', PARENT_URL . '/inc/css/slick.css' );
wp_register_style( 'slick-theme', PARENT_URL . '/inc/css/slick-theme.css', array ('slick') );
wp_register_script('slick', PARENT_URL . "/inc/js/slick.min.js", array('jquery'), '1.5.6', true);

/**
WAYPOINTS
**/
wp_register_script('waypoints', PARENT_URL . "/inc/js/jquery.waypoints.min.js", array('jquery'), '4.0.0', true);
wp_register_script('waypoints-sticky', PARENT_URL . "/inc/js/sticky.min.js", array('waypoints'), '4.0.0', true);
wp_register_script('waypoints-inview', PARENT_URL . "/inc/js/inview.min.js", array('waypoints'), '4.0.0', true);

$showStickyNavigation = campaign_default_array($campaign_theme_options, 'sticky-navigation', 1);
if ($showStickyNavigation) {
	wp_enqueue_script('waypoints');
	//wp_enqueue_script('waypoints-sticky');
	wp_enqueue_script('waypoints-inview');
}

/**
COUNTER UP
**/
wp_register_script('counter_up', PARENT_URL . "/inc/js/jquery.counterup.min.js", array('waypoints'), '1.0', true);

/**
LOADING SCREEN
**/
$showLoadingScreen = campaign_default_array($campaign_theme_options, 'show-loading-screen', 1);
if ($showLoadingScreen) {
	wp_enqueue_script( 'themeblossom_loader', PARENT_URL . '/inc/js/themeblossom_loading_screen.js', array('jquery'), '1.0.0', true );
}

/**
DONATIONS
**/
if (function_exists('seamless_donations_set_version')) {
	wp_dequeue_style( 'seamless_donations_css' );
}

/**
THEMEBLOSSOM
**/

if (is_multisite()) :
    $blog_details = get_blog_details();
    $blog_pref = 'site' . $blog_details->blog_id . '-';
else:
    $blog_pref = '';
endif;

if (file_exists(PARENT_DIR . '/inc/admin' . "/$blog_pref" . 'options.css')) {
	wp_enqueue_style( 'campaign_options', PARENT_URL . '/inc/admin' . "/$blog_pref" . 'options.css' );
} else {
	wp_enqueue_style( 'campaign_options', PARENT_URL . '/inc/admin/default-options.css' );
}

wp_enqueue_style( 'campaign_style', PARENT_URL . '/inc/css/themeblossom.css' );
wp_enqueue_script( 'campaign_scripts', PARENT_URL . '/inc/js/themeblossom.js', array('jquery'), '1.0.0', true );

/**
UPW
**/
add_filter( 'upw_enqueue_styles', '__return_false', 1 );

/**
THE EVENTS CALENDAR
**/
if (class_exists('Tribe__Events__Main')) :
	$showExport = campaign_default_array($campaign_theme_options, 'tec-archive-remove-export', 'no');
	$showExport = esc_attr( $showExport );

	if ($showExport == 'no') :
	remove_filter('tribe_events_after_footer', array('Tribe__Events__iCal', 'maybe_add_link'), 10, 1);
	remove_filter('tribe_events_single_event_after_the_content', array('Tribe__Events__iCal', 'single_event_links'), 10, 1);
	endif;
endif;

/**
WOOCOMMERCE
**/

if ( class_exists( 'woocommerce' ) ) {

	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}

	wp_register_style( 'campaign_woocommerce', PARENT_URL . '/inc/css/woocommerce.css' );
	wp_enqueue_style( 'campaign_woocommerce' );

	
	// isotope
	wp_enqueue_script('campaign_isotope', PARENT_URL . "/inc/js/jquery.isotope.min.js", array('jquery'), '2.0.0', false);
	wp_enqueue_script('campaign_imagesloaded', PARENT_URL . "/inc/js/jquery.imagesloaded.min.js", array('jquery'), '3.1.4', false);	

	wp_dequeue_style( 'select2' );
	wp_deregister_style( 'select2' );
	wp_dequeue_script( 'select2');
	wp_deregister_script('select2');	
}

?>