<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'    => 'wp-editor',
		'tinymce' => true,
		'reinit'  => true,
		'wpautop' => false,
		'label'   => esc_html__( 'Content', 'campaign' ),
		'desc'    => esc_html__( 'Enter some content for this texblock', 'campaign' )
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);
