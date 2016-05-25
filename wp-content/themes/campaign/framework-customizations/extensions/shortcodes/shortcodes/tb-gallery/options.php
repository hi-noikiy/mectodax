<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$pages = campaign_get_posts_admin('page', 1);

$options = array(
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

	'item_number'   => array(
		'label' => esc_html__( 'Number of Items', 'campaign' ),
		'desc'  => esc_html__( 'Number of visible items of the gallery.', 'campaign' ),
        'type'  => 'select',
        'value' => '12',
        'choices' => array(
            '4' => esc_html__( '4 items', 'campaign' ),
            '8' => esc_html__( '8 items', 'campaign' ),
            '12' => esc_html__( '12 items', 'campaign' ),
            '16' => esc_html__( '16 items', 'campaign' ),
            '-1' => esc_html__( 'All', 'campaign' ),
        ),
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