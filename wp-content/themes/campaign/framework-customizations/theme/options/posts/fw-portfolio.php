<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'main' => array(
		'title'   => esc_html__( 'Portfolio Options', 'campaign' ),
		'type'    => 'box',
		'options' => array(
			'featured_title'=> array(
				'label' => esc_html__( 'Extra title - It will be shown on the promo image area', 'campaign' ),
				'type'  => 'text',
			),			
			'featured_subtitle'=> array(
				'label' => esc_html__( 'Extra subtitle - It will be shown on the promo image area', 'campaign' ),
				'type'  => 'text',
				'value' => '',
			),
			'video_switch'                    => array(
				'label'        => esc_html__( 'Show video instead gallery?', 'campaign' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'campaign' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'campaign' )
				),
				'value'        => 'no'
			),				
			'video_url'=> array(
				'label' => esc_html__( 'Video URL', 'campaign' ),
				'type'  => 'text',
				'value' => esc_html__('', 'campaign'),
			),
		),
	),
	'side' => array(
		'title' => esc_html__( 'Header Image', 'campaign' ),
		'type'  => 'box',
		'context' => 'side',
		'priority' => 'low',
		'options' => array(	
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'campaign' ),
				'desc'  => esc_html__( 'Upload header image', 'campaign' ),
				'type'  => 'upload',			
			),
			'featured_height'=> array(
				'label' => esc_html__( 'Promo Image Height', 'campaign' ),
				'type'  => 'short-text',
				'value' => '300',
			),
		),
	),
);