<?php if (!defined('FW')) die('Forbidden');

$options = array(
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
);