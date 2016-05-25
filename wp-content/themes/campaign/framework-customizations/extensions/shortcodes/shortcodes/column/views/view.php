<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
	$id_to_class = array(
		'1_6' => 'col-sm-2',
		'1_4' => 'col-sm-3',
		'1_3' => 'col-sm-4',
		'1_2' => 'col-sm-6',
		'2_3' => 'col-sm-8',
		'3_4' => 'col-sm-9',
		'1_1' => 'col-sm-12'
	);

    if($atts['tablet'] !=''){
        $id_to_class = array(
            '1_6' => 'col-md-2',
            '1_4' => 'col-md-3',
            '1_3' => 'col-md-4',
            '1_2' => 'col-md-6',
            '2_3' => 'col-md-8',
            '3_4' => 'col-md-9',
            '1_1' => 'col-md-12'
        );
    }

    $xs_class = '';

    $id = uniqid( 'column-' );

    $custom_class = (isset($atts['class']) && $atts['class'] != '') ? $atts['class'] : '';
    $custom_id = (isset($atts['myid']) && $atts['myid'] != '') ? $atts['myid'] : $id;

    $overlay_style = $bg_color = $bg_image = $style = $column_color = $centered = '';

    if($atts['background_options']['background'] == 'image' && !empty($atts['background_options']['image']['background_image']['data']) ){
        $bg_image = 'background-image:url(' . $atts['background_options']['image']['background_image']['data']['icon'] . ');';
        $bg_image .= ' background-repeat: '.$atts['background_options']['image']['repeat'].';';
        $bg_image .= ' background-position: '.$atts['background_options']['image']['bg_position_x'].' '.$atts['background_options']['image']['bg_position_y'].';';
        $bg_image .= ' background-size: '.$atts['background_options']['image']['bg_size'].';';
        if(isset($atts['background_options']['image']['background_color'])) {
            $bg_color = 'background-color:' . $atts['background_options']['image']['background_color'] . ';';
        }
    }

    // background: color
    elseif($atts['background_options']['background'] == 'color'){
        if( isset($atts['background_options']['color']['background_color'])) {
            if( !empty($atts['background_options']['color']['background_color']) ){
                $bg_color = 'background-color:' . $atts['background_options']['color']['background_color'] . ';';
            }
        }
    }

    if (isset($atts['column_color']) && $atts['column_color']) {
        $column_color .= ' color: ' . $atts['column_color'] . ';';
    }

    $atts['padding_top'] = (int)$atts['padding_top'];
    $atts['padding_right'] = (int)$atts['padding_right'];
    $atts['padding_bottom'] = (int)$atts['padding_bottom'];
    $atts['padding_left'] = (int)$atts['padding_left'];
    $style = 'style="' . $bg_image . ' ' . $bg_color . $column_color;
    if($atts['padding_top'] != 0 || $atts['padding_right'] != 0 || $atts['padding_bottom'] != 0 || $atts['padding_left'] != 0) {
       $style .= ' padding: ' . $atts['padding_top'] . 'px ' . $atts['padding_right'] . 'px ' . $atts['padding_bottom'] . 'px ' . $atts['padding_left'] . 'px;';
       $xs_class = 'padding15-xs';

    } else {
        $xs_class = 'nopadding-xs';
    }

    $style .= '"';

    $animationClass = $animationDelay = '';

    if (isset($atts['animation_effect']) && !empty($atts['animation_effect']) && $atts['animation_effect'] != 'none') {
        $animationClass = ' tbWow ' . $atts['animation_effect'] . ' ';

        if (isset($atts['animation_delay']) && !empty($atts['animation_delay']) && $atts['animation_delay'] != '0') {
            $animationDelay = $atts['animation_delay'];
        }
    }

?>
    <?php if ((isset($atts['is_centered']) && $atts['is_centered'])) : // BOXED CONTENT ?>
    <?php $centered = ' ' . $atts['is_centered'] . ' '; ?>
    <?php endif; ?>

<div id="<?php echo esc_attr($custom_id); ?>" class="tb-column col-xs-12 <?php echo esc_attr($atts['tablet']); ?> <?php echo '' . $id_to_class[$atts['width']]; ?> <?php echo esc_attr($custom_class); ?> <?php echo esc_attr($atts['default_padding']); ?> <?php echo esc_attr($animationClass); ?>" <?php if ($animationDelay) { echo ' data-wow-delay="' . esc_attr($animationDelay) . '"'; } ?> >
    <div <?php echo  /* data validated already */  $style; ?> class="<?php echo esc_attr($centered); ?> <?php echo $xs_class; ?>">
		<?php echo do_shortcode($content); ?>
	</div>
</div>