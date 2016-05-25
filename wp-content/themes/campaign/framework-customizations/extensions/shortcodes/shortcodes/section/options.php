<?php if (!defined('FW')) {
	die('Forbidden');
}

$admin_url = admin_url();

$options = array(
	'is_boxed' => array(
		'label' => esc_html__('Boxed Content', 'campaign'),
		'type'  => 'switch',
		'desc'  => 'Make the content inside this section to be boxed?',
	),
	'is_stretched' => array(
		'label' => esc_html__('Stretched Content', 'campaign'),
		'type'  => 'switch',
		'desc'  => 'Use the same height for all inside elements',
		'value' => 'nostretch',
		'right-choice' => array(
			'value' => 'absolutecenter-stretch',
			'label' => esc_html__('Yes', 'campaign'),
		),
		'left-choice' => array(
			'value' => 'nostretch',
			'label' => esc_html__('No', 'campaign'),
		),
	),
	'section_padding' => array(
		'type'  => 'switch',
		'label' => esc_html__( 'Padding Section?', 'campaign' ),
		'desc'  => esc_html__( 'Left and Right spacing.', 'campaign' ),
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
	'padding'  => array(
		'label' => esc_html__( 'Section Padding', 'campaign' ),
		'desc'  => esc_html__( 'Top and Bottom spacing. Enter the section padding value in pixels (i.e: 100)', 'campaign' ),
		'help'  => esc_html__( 'Value in px.', 'campaign' ),
		'type'  => 'text',
		'value' => '',
	),
	'margin_bottom'   => array(
		'label' => esc_html__('Section Overlap', 'campaign'),
		'desc'  => esc_html__('Enter the section overlap value in pixels (i.e: 100)', 'campaign'),
		'help'  => esc_html__('The content that follows will overlap this section with the specified pixel amount.', 'campaign'),
		'type'  => 'text',
		'value' => '',
	),
	
	'background_options' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'background' => array(
				'label' => esc_html__('Background', 'campaign'),
				'desc'  => esc_html__('Select the background for your section', 'campaign'),
				'type'  => 'radio',
				'choices' => array(
					'none'    => esc_html__('None', 'campaign'),
					'image'   => esc_html__('Image', 'campaign'),
					'slider'   => esc_html__('Slider', 'campaign'),
					'video'   => esc_html__('Video', 'campaign'),
					'color'   => esc_html__('Color', 'campaign'),
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
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_color' => array(
                    'label'   => esc_html__('', 'campaign'),
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
				'parallax' => array(
					'type'  => 'switch',
					'label' => esc_html__( 'Parallax Effect', 'campaign' ),
					'desc'  => esc_html__( 'Create a parallax effect on scroll?', 'campaign' ),
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
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'campaign' ),
							'desc'  => esc_html__( 'Enable image overlay color?', 'campaign' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'campaign'),
                                'desc'  => esc_html__('Select the overlay color', 'campaign'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_image' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'campaign'),
								'desc'  => esc_html__('Select the overlay color opacity in %', 'campaign'),
							)
						),
					),
				),
			),
			'slider' => array(
				'background_image' => array(
					'label'   => esc_html__( 'Background Image 1', 'campaign' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_image2' => array(
					'label'   => esc_html__( 'Background Image 2', 'campaign' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_image3' => array(
					'label'   => esc_html__( 'Background Image 3', 'campaign' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'campaign' ),
							'desc'  => esc_html__( 'Enable image overlay color?', 'campaign' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'campaign'),
                                'desc'  => esc_html__('Select the overlay color', 'campaign'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_slider' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'campaign'),
								'desc'  => esc_html__('Select the overlay color opacity in %', 'campaign'),
							)
						),
					),
				),
			),
			'video' => array(
				'video' => array(
					'label' => esc_html__('', 'campaign'),
					'desc'  => esc_html__('Insert a YouTube or Vimeo video URL', 'campaign'),
					'type'  => 'text',
				),
				'overlay_options' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'picker' => array(
						'overlay' => array(
							'type'  => 'switch',
							'label' => esc_html__( 'Overlay Color', 'campaign' ),
							'desc'  => esc_html__( 'Enable video overlay color?', 'campaign' ),
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
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
                            'background' => array(
                                'label'   => esc_html__('', 'campaign'),
                                'desc'    => esc_html__('Select the overlay color', 'campaign'),
                                'value'   => '',
                                'type'    => 'color-picker'
                            ),
							'overlay_opacity_video' => array(
								'type'  => 'slider',
								'value' => 100,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label' => esc_html__('', 'campaign'),
                                'desc'  => esc_html__('Select the overlay color opacity in %', 'campaign'),
							)
						),
					),
				),
			),
			'color' => array(
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