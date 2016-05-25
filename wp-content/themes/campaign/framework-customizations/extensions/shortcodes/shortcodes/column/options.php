<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}


$admin_url = admin_url();

$options = array(
	'default_padding' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Default Spacing', 'campaign' ),
		'desc'  => esc_html__( 'Use default left and right spacing?', 'campaign' ),
		'help'  => esc_html__( "Default left and right spacings are set to 15px", 'campaign' ),
		'value' => 'nopadding',
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__('Yes', 'campaign'),
		),
		'left-choice' => array(
			'value' => 'nopadding',
			'label' => esc_html__('No', 'campaign'),
		),
	),


	'padding_group' => array(
		'type' => 'group',
		'options' => array(
			'html_label'  => array(
				'type'  => 'html',
				'value' => '',
				'label' => esc_html__('Additional Spacing', 'campaign'),
				'html'  => '',
			),
			'padding_top'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'top', 'campaign' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_right'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'right', 'campaign' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_bottom'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'bottom', 'campaign' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_left'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'left', 'campaign' ),
				'type'  => 'short-text',
				'value' => '0',
			),
		)
	),
    'is_centered' => array(
        'label' => esc_html__('Centered Content', 'campaign'),
        'type'  => 'switch',
        'desc'  => 'Everything will be positioned in the absolute center of the block',
        'value' => 'noabsolutecenter',
        'right-choice' => array(
            'value' => 'absolutecenter',
            'label' => esc_html__('Yes', 'campaign'),
        ),
        'left-choice' => array(
            'value' => 'noabsolutecenter',
            'label' => esc_html__('No', 'campaign'),
        ),
    ),

    'background_options' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'background' => array(
                'label' => esc_html__('Background', 'campaign'),
                'desc'  => esc_html__('Select the background for your column', 'campaign'),
                'type'  => 'radio',
                'choices' => array(
                    'none'  => esc_html__('None', 'campaign'),
                    'image' => esc_html__('Image', 'campaign'),
                    'color' => esc_html__('Color', 'campaign'),
                ),
                'value' => 'none'
            ),
        ),
        'choices' => array(
            'none' => array(),
            'color' => array(
                'background_color' => array(
                    'label' => esc_html__('', 'campaign'),
                    'desc'    => esc_html__( 'Select the background color', 'campaign' ),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
            ),
            'image' => array(
                'background_image' => array(
                    'label'   => esc_html__( '', 'campaign' ),
                    'type'    => 'background-image',
                    'choices' => array(//	in future may will set predefined images
                    )
                ),
                'background_color' => array(
                    'label' => esc_html__('', 'campaign'),
                    'desc'    => esc_html__( 'Select the background color', 'campaign' ),
                    'value'   => '',
                    'type'    => 'color-picker'
                ),
                'repeat' => array(
                    'label' => esc_html__( '', 'campaign' ),
                    'desc'  => esc_html__( 'Select how will the background repeat', 'campaign' ),
                    'type'  => 'short-select',
                    'value' => 'no-repeat',
                    'choices' => array(
                        'no-repeat' => esc_html__( 'No-Repeat', 'campaign' ),
                        'repeat' => esc_html__( 'Repeat', 'campaign' ),
                        'repeat-x' => esc_html__( 'Repeat-X', 'campaign' ),
                        'repeat-y' => esc_html__( 'Repeat-Y', 'campaign' ),
                    )
                ),
                'bg_position_x' => array(
                    'label' => esc_html__( 'Position', 'campaign' ),
                    'desc'  => esc_html__( 'Select the horizontal background position', 'campaign' ),
                    'type'  => 'short-select',
                    'value' => 'center',
                    'choices' => array(
                        'left' => esc_html__( 'Left', 'campaign' ),
                        'center' => esc_html__( 'Center', 'campaign' ),
                        'right' => esc_html__( 'Right', 'campaign' ),
                    )
                ),
                'bg_position_y' => array(
                    'label' => esc_html__( '', 'campaign' ),
                    'desc'  => esc_html__( 'Select the vertical background position', 'campaign' ),
                    'type'  => 'short-select',
                    'value' => 'center',
                    'choices' => array(
                        'top' => esc_html__( 'Top', 'campaign' ),
                        'center' => esc_html__( 'Center', 'campaign' ),
                        'bottom' => esc_html__( 'Bottom', 'campaign' ),
                    )
                ),
                'bg_size' => array(
                    'label' => esc_html__( 'Size', 'campaign' ),
                    'desc'  => esc_html__( 'Select the background size', 'campaign' ),
                    'help'  => esc_html__( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'campaign' ),
                    'type'  => 'short-select',
                    'value' => 'cover',
                    'choices' => array(
                        'auto' => esc_html__( 'Auto', 'campaign' ),
                        'cover' => esc_html__( 'Cover', 'campaign' ),
                        'contain' => esc_html__( 'Contain', 'campaign' ),
                    )
                ),

            ),
        ),
        'show_borders' => false,
    ),
    'column_color' => array(
        'label' => esc_html__('Column Color', 'campaign'),
        'desc'    => esc_html__( 'Select the column color', 'campaign' ),
        'value'   => '',
        'type'    => 'color-picker'
    ),
	'tablet'  => array(
		'label' => esc_html__( 'Responsive Layout for Tablet', 'campaign' ),
		'desc'  => esc_html__( 'Choose the responsive tablet display for this column', 'campaign' ),
		'help'  => esc_html__( 'Use this option in order to control how this column behaves on tablets (and devices with the resoution between 768px - 990px).', 'campaign' ),
		'type'  => 'select',
		'value' => '',
		'choices' => array(
			''             => esc_html__( 'Default layout', 'campaign' ),
            'col-sm-2'  => esc_html__( 'Make it a 1/6 column', 'campaign' ),
            'col-sm-3'  => esc_html__( 'Make it a 1/4 column', 'campaign' ),
            'col-sm-4'  => esc_html__( 'Make it a 1/3 column', 'campaign' ),
            'col-sm-6'  => esc_html__( 'Make it a 1/2 column', 'campaign' ),
            'col-sm-8'  => esc_html__( 'Make it a 2/3 column', 'campaign' ),
            'col-sm-9'  => esc_html__( 'Make it a 3/4 column', 'campaign' ),
            'col-sm-12' => esc_html__( 'Make it a 1/1 column', 'campaign' ),
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

?>