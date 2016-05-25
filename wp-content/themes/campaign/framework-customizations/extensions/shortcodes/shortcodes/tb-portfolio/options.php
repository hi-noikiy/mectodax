<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$pages = campaign_get_posts_admin('page', 1);

$options = array(
    'post_type' => array(
        'label' => esc_html__( 'Choose Type', 'campaign' ),
        'type'  => 'select',
        'value' => '',
        'choices' => array(
            'posts' => esc_html__( 'Portfolio', 'campaign' ),
            //'categories' => esc_html__( 'Portfolio Categories', 'campaign' )
        ),
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

	'item_number'   => array(
		'label' => esc_html__( 'Number of Columns', 'campaign' ),
		'desc'  => esc_html__( 'Number of visible items of carousel.', 'campaign' ),
		'type'  => 'switch',
		'value' => '4',
        'right-choice' => array(
            'value' => '4',
            'label' => esc_html__( '4 Items', 'campaign' )
        ),
        'left-choice'  => array(
            'value' => '5',
            'label' => esc_html__( '5 Items', 'campaign' )
        ),  
	),

    'show_caption' => array(
        'label' => esc_html__('Position of the Caption Block?', 'campaign'),
        'type'  => 'select',
        'value' => 'centered',
        'choices' => array(
            'hidden' => esc_html__('Hidden', 'campaign'),
            'centered' => esc_html__('Centered', 'campaign'),
            'left' => esc_html__('Left Aligned', 'campaign'),
        ),
    ),
    
    'background_options' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'background' => array(
                'label' => esc_html__('Background', 'campaign'),
                'desc'  => esc_html__('Select the background for your caption area', 'campaign'),
                'type'  => 'radio',
                'choices' => array(
                    'none'    => esc_html__('None', 'campaign'),
                    'image'   => esc_html__('Image + Color', 'campaign'),
                ),
                'value' => 'none'
            ),
        ),
        'choices' => array(
            'none' => array(),
            'image' => array(
                'background_image' => array(
                    'label'   => esc_html__( '', 'campaign' ),
                    'type'    => 'background-image',
                    'choices' => array(//   in future may will set predefined images
                    )
                ),
                'background_color' => array(
                    'label'   => esc_html__('', 'campaign'),
                    'desc'    => esc_html__( 'Select the background color', 'campaign' ),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'caption_img' => array(
        'label' => esc_html__('Logo', 'campaign'),
        'desc'  => esc_html__('Upload image - 300x480 max, please', 'campaign'),
        'type'  => 'upload',
    ),
    'color' => array(
        'label' => esc_html__('Caption and Title Color', 'campaign'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'a_color' => array(
        'label' => esc_html__('Caption Link Color', 'campaign'),
        'value'   => '#ffffff',
        'type'    => 'color-picker'
    ),
    'caption_text' => array(
        'label' => esc_html__('Caption', 'campaign'),
        'value'   => '',
        'type'    => 'text'
    ),
    'caption_page' => array(
        'label' => esc_html__('Portfolio Link', 'campaign'),
        'desc' => esc_html__('Leave blank if you don\'t want to show link', 'campaign'),
        'type'  => 'select',
        'choices' => $pages,
        'value' => '',
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