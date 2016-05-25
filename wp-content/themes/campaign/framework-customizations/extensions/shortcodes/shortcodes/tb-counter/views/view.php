<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<?php
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : 'counter' . rand(10000, 99999);

$number = (isset($atts['number']) && $atts['number']) ? $atts['number'] : '';

$font_size = (isset($atts['font_size']) && $atts['font_size']) ? $atts['font_size'] : '16';
$font_line = (isset($atts['font_line']) && $atts['font_line']) ? $atts['font_line'] : '25';
$font_color = (isset($atts['font_color']) && $atts['font_color']) ? $atts['font_color'] : '#282828';
$time_an = (isset($atts['time_an']) && $atts['time_an']) ? $atts['time_an'] : '400';
$padding = (isset($atts['padding']) && $atts['padding']) ? $atts['padding'] : '10';

$text_before = (isset($atts['text_before']) && $atts['text_before']) ? $atts['text_before'] : '';
$text_after = (isset($atts['text_after']) && $atts['text_after']) ? $atts['text_after'] : '';

global $campaign_theme_options;

$body_typo = campaign_default_array($campaign_theme_options, 'tb-body-typography', '16px');

$body_size = str_replace('px', '', $body_typo['font-size']);

?>

<div class="campaign_counter" style="font-size: <?php echo campaign_px_to_em($body_size, intval($font_size)); ?>em; line-height: <?php echo intval($font_line); ?>px; padding:  <?php echo intval($padding); ?>px 0; color: <?php echo esc_attr($font_color); ?>;">
	<?php if ($text_before) : ?>
	<span><?php echo esc_attr($text_before); ?></span>
	<?php endif; ?>
	<span class="<?php echo esc_attr($custom_class); ?>"><?php echo esc_attr($number); ?></span>
	<?php if ($text_after) : ?>
	<span><?php echo esc_attr($text_after); ?></span>
	<?php endif; ?>
</div>

<script>
jQuery(document).ready(function($) {
$('.<?php echo esc_attr($custom_class); ?>').counterUp({
	time: <?php echo esc_attr($time_an); ?>
});

});
</script>