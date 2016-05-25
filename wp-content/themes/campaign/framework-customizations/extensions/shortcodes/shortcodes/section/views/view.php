<?php if (!defined('FW')) die('Forbidden');

$id = uniqid( 'section-' );
$bg_color = $bg_image = $bg_video_data_attr = $extra_classes = $margin_bottom = $section_padding = $overlay_style = $box_sizing = $stretch = '';

$padding = 0;

if(isset($atts['section_padding']) && $atts['section_padding'] != '') {
	$extra_classes .= $atts['section_padding'];
}

if(isset($atts['padding']) && $atts['padding'] != '') {
	$padding += (int)str_replace('px', '', $atts['padding']);
    $section_padding = ' padding-top: ' . $padding . 'px; padding-bottom: ' . $padding . 'px; ';
}

if(isset($atts['margin_bottom']) && $atts['margin_bottom'] != ''){
	$margin_bottom = 'margin-bottom:'.-(int)str_replace('px', '', $atts['margin_bottom']).'px;';
}


// background: image
if($atts['background_options']['background'] == 'image' && !empty($atts['background_options']['image']['background_image']['data']) ){
	$bg_image = 'background-image:url(' . $atts['background_options']['image']['background_image']['data']['icon'] . ');';
	$bg_image .= ' background-repeat: '.$atts['background_options']['image']['repeat'].';';
	$bg_image .= ' background-position: '.$atts['background_options']['image']['bg_position_x'].' '.$atts['background_options']['image']['bg_position_y'].';';
	$bg_image .= ' background-size: '.$atts['background_options']['image']['bg_size'].';';
	if(isset($atts['background_options']['image']['background_color'])) {
		$bg_color = 'background-color:' . $atts['background_options']['image']['background_color'] . ';';
	}
}

// background: slider
$slider_images = array();
if($atts['background_options']['background'] == 'slider') { 
	if (!empty($atts['background_options']['slider']['background_image']['data']) && !empty($atts['background_options']['slider']['background_image']['data']['icon']) ) {
		$slider_images[] = 'background-image:url(' . $atts['background_options']['slider']['background_image']['data']['icon'] . ');';
	}
	if (!empty($atts['background_options']['slider']['background_image2']['data']) && !empty($atts['background_options']['slider']['background_image2']['data']['icon']) ){
		$slider_images[] = 'background-image:url(' . $atts['background_options']['slider']['background_image2']['data']['icon'] . ');';
	}
	if (!empty($atts['background_options']['slider']['background_image3']['data']) && !empty($atts['background_options']['slider']['background_image3']['data']['icon']) ){
		$slider_images[] = 'background-image:url(' . $atts['background_options']['slider']['background_image3']['data']['icon'] . ');';
	}

	if (!empty($slider_images)) {
		$bg_image = $slider_images[0];
	}

	$extra_classes .= ' campaign_section_with_slides ';
}

// background: video
elseif($atts['background_options']['background'] == 'video' && $atts['background_options']['video']['video'] != ''){
	$bg_video_data_attr = 'data-wallpaper-options=' . json_encode(array('source' => array('video' => $atts['background_options']['video']['video'])));
	$extra_classes .= ' background-video';
}

// background: color
elseif($atts['background_options']['background'] == 'color'){
	if( isset($atts['background_options']['color']['background_color'])) {
        if( !empty($atts['background_options']['color']['background_color']) ){
		    $bg_color = 'background-color:' . $atts['background_options']['color']['background_color'] . ';';
        }
	}
}

if($atts['background_options']['background'] == 'image' || $atts['background_options']['background'] == 'slider' || $atts['background_options']['background'] == 'video'){
	$type = $atts['background_options']['background'];
	$overlay = $atts['background_options'][$type]['overlay_options']['overlay'];
	if($overlay == 'yes'){

		$overlay_bg = $atts['background_options'][$type]['overlay_options']['yes']['background'];
		$opacity_param = 'overlay_opacity_'.$atts['background_options']['background'];
		$opacity = $atts['background_options'][$type]['overlay_options']['yes'][$opacity_param]/100;
		if($overlay_bg == 'fw-custom'){
			$overlay_style = '<div class="fw-main-row-overlay" style="background-color: '.$atts['background_options'][$type]['overlay_options']['yes']['background']['color'].'; opacity: '.$opacity.';"></div>';
		}
		else{
			$overlay_style = '<div class="fw-main-row-overlay" style="background: ' . $overlay_bg . '; opacity: '.$opacity.';"></div>';
		}
	}
}



$custom_class = (isset($atts['class']) && $atts['class'] != '') ? $atts['class'] : '';
$custom_id = (isset($atts['myid']) && $atts['myid'] != '') ? $atts['myid'] : $id;

?>

<?php if($atts['background_options']['background'] == 'image' && $atts['background_options']['image']['parallax'] == 'yes') :
	$extra_classes .= ' parallax-section'; ?>
	<script>
		jQuery(document).ready(function($) {
			$('#<?php echo esc_attr($custom_id); ?>').parallax("50%", 0.1);
		});
	</script>
<?php endif; ?>


<section id="<?php echo esc_attr($custom_id); ?>" class="campaign_section <?php echo esc_attr($extra_classes); ?> <?php echo esc_attr($custom_class); ?> tbWow fadeIn" style="<?php echo '' . $bg_color; ?> <?php echo '' . $bg_image; ?> <?php echo '' . $margin_bottom; ?> <?php echo '' . $box_sizing; ?>" <?php echo '' . $bg_video_data_attr; ?> >
	<?php echo '' . $overlay_style; ?>

	<?php
	if (!empty($slider_images)) {
		foreach ($slider_images as $slider_image) :
		echo '<div class="campaign_section_slide" style="' . $slider_image . '"></div>';
		endforeach;
	}
	?>

	<?php if ((isset($atts['is_boxed']) && $atts['is_boxed'])) : // BOXED CONTENT ?>
		<div class="container" <?php if (!empty($section_padding)) { echo "style='$section_padding'";} ?>><div class="row">
	<?php else : ?>
		<div class="campaign_no_container" <?php if (!empty($section_padding)) { echo "style='$section_padding'";} ?>>
	<?php endif; ?>
		<?php if ((isset($atts['is_stretched']) && $atts['is_stretched'])) : // BOXED CONTENT ?>
		<?php $stretch = $atts['is_stretched']; ?>
		<?php endif; ?>

		<?php echo str_replace('tb-column', 'tb-column ' . $stretch, str_replace('fw-row', 'fw-row ' . $stretch, do_shortcode($content))); ?>
	<?php if ((isset($atts['is_boxed']) && $atts['is_boxed'])) : // BOXED CONTENT ?>
		</div></div>
	<?php else : ?>
		</div>
	<?php endif; ?>

</section>