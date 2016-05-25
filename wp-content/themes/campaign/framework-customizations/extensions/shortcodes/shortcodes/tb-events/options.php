<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
    'title'  => array(
        'label' => esc_html__( 'Block title', 'campaign' ),
        'type'  => 'text',
        'value' => 'View more',
    ),
    'img_spacer' => array(
        'label' => esc_html__('Image spacer', 'campaign'),
        'desc'  => esc_html__('Leave blank if you don\'t want to use it.', 'campaign'),
        'type'  => 'upload',
    ),
    'button_label'  => array(
        'label' => esc_html__( 'Main Button Label', 'campaign' ),
        'desc'    => esc_html__( 'Events Page Link Button', 'campaign' ),
        'type'  => 'text',
        'value' => 'View Program',
    ),
	'custom_button' => array(
		'type' => 'group',
		'options' => array(
		    'show_custom_button' => array(
		        'type'  => 'switch',
				'label' => esc_html__( '', 'campaign' ),
				'desc'  => esc_html__( 'Show custom button?', 'campaign' ),
		        'value' => 'no',
		        'right-choice' => array(
		            'value' => 'yes',
		            'label' => esc_html__('Yes', 'campaign'),
		        ),
		        'left-choice' => array(
		            'value' => 'no',
		            'label' => esc_html__('No', 'campaign'),
		        ),
		    ),
			'cb_label'   => array(
				'label' => esc_html__( 'Custom Button Label', 'campaign' ),
				'desc' => esc_html__( 'Reservation page, i.e.', 'campaign' ),
				'type'  => 'text',
				'value' => 'Label'
			),
			'cb_link'   => array(
				'label' => esc_html__( 'Link', 'campaign' ),
				'type'  => 'text',
				'value' => '#'
			),
		    'cb_target' => array(
		        'type'  => 'switch',
				'label' => esc_html__( '', 'campaign' ),
				'desc'  => esc_html__( 'Open link in new window?', 'campaign' ),
		        'value' => '_self',
		        'right-choice' => array(
		            'value' => '_blank',
		            'label' => esc_html__('Yes', 'campaign'),
		        ),
		        'left-choice' => array(
		            'value' => '_self',
		            'label' => esc_html__('No', 'campaign'),
		        ),
		    ),
		)
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);