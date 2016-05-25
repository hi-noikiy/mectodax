<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'post_type_select' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'post_type' => array(
                'label' => esc_html__( 'Choose Post Type', 'campaign' ),
                'type'  => 'select',
                'value' => '',
                'choices' => array(
                    'post' => esc_html__( 'Posts', 'campaign' ),
                    'issue' => esc_html__( 'Issues', 'campaign' )
                ),
            ),
        ),
        'choices' => array(
            'post' => array(
                'taxonomy' => array(
                    'label' => esc_html__('Choose category', 'campaign'),
                    'desc'  => esc_html__('Leave blank to show all', 'campaign'),
			        'type'  => 'select',
			        'value' => '',
			        'choices' => campaign_taxonomy('category', 1),
                )
            ),
        )
    ),
    'order' => array(
        'label' => esc_html__('Order of posts', 'campaign'),
        'type'  => 'select',
        'value' => 'date-DESC',
        'choices' => array(
        	'date-DESC' => esc_html__('Descending by date', 'campaign'),
        	'date-ASC' => esc_html__('Ascending by date', 'campaign'),
        	'order-DESC' => esc_html__('Descending by order', 'campaign'),
        	'order-ASC' => esc_html__('Ascending by order', 'campaign'),
        	'rand' => esc_html__('Random Order', 'campaign')
        ),
    ),
	'posts_number'   => array(
		'label' => esc_html__( 'Number of Posts', 'campaign' ),
		'desc'  => esc_html__( 'Enter the number of posts to display (maximum is 50)', 'campaign' ),
		'type'  => 'short-text',
		'value' => get_option('posts_per_page')
	),
    'color' => array(
        'label' => esc_html__('Color', 'campaign'),
        'value'   => '#21477F',
        'type'    => 'color-picker'
    ),
    'color_hover' => array(
        'label' => esc_html__('Color - Hover', 'campaign'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'a_color' => array(
        'label' => esc_html__('Link Color', 'campaign'),
        'value'   => '#A02E2F',
        'type'    => 'color-picker'
    ),
    'a_color_hover' => array(
        'label' => esc_html__('Link Color - Hover', 'campaign'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'background_color' => array(
        'label' => esc_html__('Background Color', 'campaign'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'background_color_hover' => array(
        'label' => esc_html__('Background Color - Hover', 'campaign'),
        'value'   => '#B60D21',
        'type'    => 'color-picker'
    ),
    'overlay_color' => array(
        'label' => esc_html__('Overlay Color', 'campaign'),
        'value'   => '#043174',
        'type'    => 'color-picker'
    ),
    'myid'  => array(
        'label' => esc_html__( 'Custom ID', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom ID', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);