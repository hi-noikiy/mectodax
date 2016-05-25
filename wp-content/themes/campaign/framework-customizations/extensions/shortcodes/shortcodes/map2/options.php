<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$map_shortcode = fw()->extensions->get( 'shortcodes' )->get_shortcode('map2');

$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'campaign'),
				'desc'    => esc_html__( 'Select map population method.', 'campaign' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => true,
	),
    'map_type' => array(
        'label' => esc_html__('Map Type', 'campaign'),
        'desc'  => esc_html__('Select map type', 'campaign'),
        'type'  => 'select',
        'value' => '',
        'choices' => array(
            'roadmap' => esc_html__('Roadmap', 'campaign'),
            'terrain' => esc_html__('Terrain', 'campaign'),
            'satellite' => esc_html__('Satellite', 'campaign'),
            'hybrid' => esc_html__('Hybrid', 'campaign')
        ),
    ),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'campaign'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'campaign'),
		'type'  => 'text'
	),
	'map_style' => array(
		'label' => esc_html__('Map Style', 'campaign'),
		'desc'  => esc_html__('Get styles from https://snazzymaps.com, i.e. Please use minified string (no line breaks): http://www.textfixer.com/tools/remove-line-breaks.php', 'campaign'),
		'type'  => 'textarea'
	),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);