<?php

/**
 * Register widget areas.
 * @internal
 */
function _action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'campaign' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Default sidebar section of the site.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Issues Sidebar Widget Area', 'campaign' ),
		'id'            => 'issues',
		'description'   => esc_html__( 'Sidebar for issues pages.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	
	if (class_exists('Tribe__Events__Main')) :	
	register_sidebar( array(
		'name'          => esc_html__( 'Events Sidebar Widget Area', 'campaign' ),
		'id'            => 'events',
		'description'   => esc_html__( 'Sidebar for event pages.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	endif;


	if (class_exists('WooCommerce')) :
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar Widget Area', 'campaign' ),
		'id'            => 'shop',
		'description'   => esc_html__( 'Sidebar for shop pages.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	endif;

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Wide Widget Area', 'campaign' ),
		'id'            => 'footer-wide',
		'description'   => esc_html__( 'Wide Widget Area.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	global $campaign_theme_options;

	$footerColumns = campaign_default_array($campaign_theme_options, 'footer-widgets', '4cols');

	if ($footerColumns != 'no') :

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 1', 'campaign' ),
		'id'            => 'footer1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 2', 'campaign' ),
		'id'            => 'footer2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 3', 'campaign' ),
		'id'            => 'footer3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'campaign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ($footerColumns == '4cols') {

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Area 4', 'campaign' ),
			'id'            => 'footer4',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'campaign' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}

	endif;
}

add_action( 'widgets_init', '_action_theme_widgets_init' );

?>