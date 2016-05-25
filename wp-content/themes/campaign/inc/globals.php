<?php

/**
Set Proper Parent/Child theme paths for inclusion
**/
@define( 'PARENT_DIR', get_template_directory() );
@define( 'CHILD_DIR', get_stylesheet_directory() );
@define( 'PARENT_URL', get_template_directory_uri() );
@define( 'CHILD_URL', get_stylesheet_directory_uri() );

/**
GLOBAL ARRAYS
**/
$GLOBALS['button_type'] = array(
			'btn-tb-primary' => esc_html__('Primary - No Border', 'campaign'),
			'btn-tb-secondary' => esc_html__('Secondary - No Border', 'campaign'),
			'btn-border1' => esc_html__('Button with Border 1', 'campaign'),
			'btn-border2' => esc_html__('Button with Border 2', 'campaign'),
		);

$GLOBALS['button_size'] = array(
            'btn-xs' => esc_html__( 'Extra Small', 'campaign' ),
            'btn-sm' => esc_html__( 'Small', 'campaign' ),
            'btn-default-size' => esc_html__( 'Default', 'campaign' ),
            'btn-lg' => esc_html__( 'Large', 'campaign' ),
		);

$GLOBALS['form_type'] = array(
            'campaign_form_default' => esc_html__( 'Default', 'campaign' ),
            'campaign_form_style1' => esc_html__( 'Style 1', 'campaign' ),
		);

$GLOBALS['show_labels'] = array(
            'nolabels' => esc_html__( 'No', 'campaign' ),
            'show_labels' => esc_html__( 'Yes', 'campaign' ),
		);

$GLOBALS['animation_select'] = array(
			'none' => esc_html__('No Effect', 'campaign'),
			'fadeIn' => esc_html__('Fade In', 'campaign'),
			'fadeInUp' => esc_html__('Fade In Up', 'campaign'),
			'fadeInDown' => esc_html__('Fade In Down', 'campaign'),
			'fadeInLeft' => esc_html__('Fade In Left', 'campaign'),
			'fadeInRight' => esc_html__('Fade In Right', 'campaign'),
			'bounceIn' => esc_html__('Bounce In', 'campaign'),
			'zoomIn' => esc_html__('Zoom In', 'campaign'),
			'rotateIn' => esc_html__('Rotate In', 'campaign'),
		);

$GLOBALS['animation_delay'] = array(
			'0' => esc_html__('No Delay', 'campaign'),
			'0.1s' => esc_html__('0.1 seconds', 'campaign'),
			'0.2s' => esc_html__('0.2 seconds', 'campaign'),
			'0.3s' => esc_html__('0.3 seconds', 'campaign'),
			'0.4s' => esc_html__('0.4 seconds', 'campaign'),
			'0.5s' => esc_html__('0.5 seconds', 'campaign'),
			'0.6s' => esc_html__('0.6 seconds', 'campaign'),
			'0.7s' => esc_html__('0.7 seconds', 'campaign'),
			'0.8s' => esc_html__('0.8 seconds', 'campaign'),
			'0.9s' => esc_html__('0.9 seconds', 'campaign'),
			'1s' => esc_html__('1 second', 'campaign'),
			'1.1s' => esc_html__('1.1 seconds', 'campaign'),
			'1.2s' => esc_html__('1.2 seconds', 'campaign'),
			'1.3s' => esc_html__('1.3 seconds', 'campaign'),
			'1.4s' => esc_html__('1.4 seconds', 'campaign'),
			'1.5s' => esc_html__('1.5 seconds', 'campaign'),
		);

?>