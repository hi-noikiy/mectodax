<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => esc_html__( 'Label', 'campaign' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'campaign' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'btn_link_group' => array(
		'type' => 'group',
		'options' => array(
			'link'   => array(
				'label' => esc_html__( 'Link', 'campaign' ),
				'desc'  => esc_html__( 'Where should your button link to?', 'campaign' ),
				'type'  => 'text',
				'value' => '#'
			),
		    'target' => array(
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
	'btn_style'  => array(
        'label' => esc_html__( 'Style', 'campaign' ),
        'desc'  => esc_html__( 'Choose button style', 'campaign' ),
        'type'  => 'radio',
        'value' => 'btn-tb-primary',
        'choices' => $GLOBALS['button_type']
    ),
    'btn_size'  => array(
        'label' => esc_html__( 'Size', 'campaign' ),
        'desc'  => esc_html__( 'Choose button size', 'campaign' ),
        'type'  => 'radio',
        'value' => 'btn-default-size',
        'choices' => $GLOBALS['button_size']
    ),
    'btn_alignment' => array(
        'label' => esc_html__( 'Alignment', 'campaign' ),
        'desc'  => esc_html__( 'Choose button alignment', 'campaign' ),
        'type'  => 'radio',
        'value' => 'textalignleft',
        'choices' => array(
            'textalignleft' => esc_html__( 'Left', 'campaign' ),
            'textaligncenter' => esc_html__( 'Center', 'campaign' ),
            'textalignright' => esc_html__( 'Right', 'campaign' ),
        ),
    ),
    'btn_icon_group' => array(
	    'type' => 'group',
	    'options' => array(
		    'icon' => array(
		        'type'  => 'icon',
		        'label' => esc_html__( 'Icon', 'campaign' )
		    ),
		    'icon_position' => array(
		        'type'  => 'switch',
		        'label' => esc_html__( '', 'campaign' ),
		        'desc'  => esc_html__( 'Choose the icon position', 'campaign' ),
		        'right-choice' => array(
			        'value' => 'pull-right',
			        'label' => esc_html__('Right', 'campaign'),
		        ),
		        'left-choice' => array(
			        'value' => '',
			        'label' => esc_html__('Left', 'campaign'),
		        ),
		    ),
	    )
    ),


    'animation_group' => array(
        'type' => 'group',
        'options' => array(
            'animation_effect'  => array(
                'type'  => 'select',
                'value' => 'none',
                'label' => esc_html__('Animation Effect', 'campaign'),
                'choices' => $GLOBALS['animation_select']
            ),
            'animation_delay'  => array(
                'type'  => 'select',
                'value' => '0',
                'label' => esc_html__('Animation Delay', 'campaign'),
                'choices' => $GLOBALS['animation_delay']
            )
        )
    ),

    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);