<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$sizes = array();

$value = 0;
$max_value = 155;

while ($value <= $max_value) {
	$sizes[$value] = $value . "px";
	$value++;
}

$time_an = array();
$value = 100;
$max_value = 2000;

while ($value <= $max_value) {
    $time_an[$value] = $value;
    $value += 100;
}

$options = array(
    'number'  => array(
        'label' => esc_html__( 'Number', 'campaign' ),
        'desc'  => esc_html__( 'Several formats available - please check documentation', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
    'font_size' => array(
        'label' => esc_html__( 'Font Size', 'campaign' ),
        'type'  => 'select',
        'value' => '16',
        'choices' => $sizes
    ),
    'font_line' => array(
        'label' => esc_html__( 'Line Height', 'campaign' ),
        'type'  => 'select',
        'value' => '25',
        'choices' => $sizes
    ),
    'font_color' => array(
        'label' => esc_html__('Color', 'campaign'),
        'value'   => '#282828',
        'type'    => 'color-picker'
    ),
    'text_before'  => array(
        'label' => esc_html__( 'Text Before', 'campaign' ),
        'desc'  => esc_html__( 'Inline with counter', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
    'text_after'  => array(
        'label' => esc_html__( 'Text After', 'campaign' ),
        'desc'  => esc_html__( 'Inline with counter', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
    'time_an' => array(
        'label' => esc_html__( 'Animation Time', 'campaign' ),
        'desc' => esc_html__( 'In ms', 'campaign' ),
        'type'  => 'select',
        'value' => '400',
        'choices' => $time_an
    ),
    'padding' => array(
        'label' => esc_html__( 'Top and bottom padding', 'campaign' ),
        'type'  => 'select',
        'value' => '10',
        'choices' => $sizes
    ),
    'class'  => array(
        'label' => esc_html__( 'Custom Class', 'campaign' ),
        'desc'  => esc_html__( 'Enter custom CSS class', 'campaign' ),
        'type'  => 'text',
        'value' => '',
    ),
);
