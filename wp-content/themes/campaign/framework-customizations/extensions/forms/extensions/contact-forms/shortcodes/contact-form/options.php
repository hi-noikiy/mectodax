<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type'  => 'hidden',
				'value' => uniqid( 'contact-form-' )
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'campaign' ),
				'options' => array(
					'form' => array(
						'label' => false,
						'type'  => 'form-builder',
						'value' => array(
							'json' => json_encode( array(
								array(
									'type'      => 'form-header-title',
									'shortcode' => 'form_header_title',
									'width'     => '',
									'options'   => array(
										'title'    => '',
										'subtitle' => '',
									)
								)
							) )
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'campaign' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Options', 'campaign' ),
						'type'    => 'tab',
						'options' => array(
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group' => array(
										'type' => 'group',
										'options' => array(
											'subject_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message Bla', 'campaign' ),
												'desc' => esc_html__( 'This text will be used as subject message for the email', 'campaign' ),
												'value' => esc_html__( 'New message', 'campaign' ),
											),
										)
									),
									'submit-button-group' => array(
										'type' => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'campaign' ),
												'desc' => esc_html__( 'This text will appear in submit button', 'campaign' ),
												'value' => esc_html__( 'Send', 'campaign' ),
											),
										)
									),
									'success-group' => array(
										'type' => 'group',
										'options' => array(
											'success_message'    => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'campaign' ),
												'desc' => esc_html__( 'This text will be displayed when the form will successfully send', 'campaign' ),
												'value' => esc_html__( 'Message sent!', 'campaign' ),
											),
										)
									),
									'failure_message'    => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'campaign' ),
										'desc' => esc_html__( 'This text will be displayed when the form will fail to be sent', 'campaign' ),
										'value' => esc_html__( 'Oops something went wrong.', 'campaign' ),
									),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'campaign' ),
										'help' => esc_html__( 'We recommend you to use an email that you verify often', 'campaign' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'campaign' ),
									),
								),
							),
						    'form_style'  => array(
						        'label' => esc_html__( 'Form Style', 'campaign' ),
						        'type'  => 'radio',
						        'value' => 'campaign_form_default',
						        'choices' => $GLOBALS['form_type']
						    ),
						    'show_labels'  => array(
						        'label' => esc_html__( 'Show Labels?', 'campaign' ),
						        'type'  => 'radio',
						        'value' => 'show_labels',
						        'choices' => $GLOBALS['show_labels']
						    ),
							'class'  => array(
								'label' => esc_html__( 'Custom Class', 'campaign' ),
								'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
								'type'  => 'text',
								'value' => '',
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer', 'campaign' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			)
		)
	)
);