<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

if (class_exists('Tribe__Events__Main')) :

isset($atts['class']) ? $class = $atts['class'] : $class = '';
$title = isset($atts['box_title']) ? $atts['box_title'] : esc_html__('Upcoming Events', 'campaign');
$img = $atts['img_spacer'];
$button_label = isset($atts['button_label']) ? $atts['button_label'] : esc_html__('View More', 'campaign');

$show_custom_button = isset($atts['show_custom_button']) ? $atts['show_custom_button'] : 'no';
$custom_button_label = isset($atts['cb_label']) ? $atts['cb_label'] : '';
$cb_link = isset($atts['cb_link']) ? $atts['cb_link'] : '#';
$cb_target = isset($atts['cb_target']) ? $atts['cb_target'] : '_self';

$current_date = date('Y-m-d H:i:s');

// START THE LOOP
$args = array();
$args['post_type'] = 'tribe_events';

$args['posts_per_page'] = 1;

$args['meta_query'] = array(
	array(
		'key' => '_EventStartDate',
		'value' => $current_date,
		'compare'=> '>='
	)
);

$postQuery = new WP_Query($args);

if ($postQuery->have_posts()) :
	?>
	
	<div class="tb-upcoming-event">
	<h2><?php echo esc_attr( $title ); ?></h2>
	
	<?php
	while ($postQuery->have_posts()) : $postQuery->the_post();

		$postID = intval( get_the_ID() );
		$postTitle = esc_attr(get_the_title());
		$postLink = get_permalink();
		
		// $post_excerpt = wp_trim_words( get_the_excerpt(), 15 );
		$post_excerpt = get_the_excerpt();


		$post_date_string = tribe_get_start_date(NULL, true, 'Y-m-M-d-h-i');
		$post_date_array = explode('-', $post_date_string);

		$countdownString = $post_date_array[0] . ", " . intval($post_date_array[1]) . " - 1, " . intval($post_date_array[3]) . ", " . intval($post_date_array[4]) . ", " . intval($post_date_array[5]);


		?>

		<article id="post-<?php echo intval($postID); ?>" <?php post_class('tribe-events-single nobottommargin'); ?>>
			<?php
			if ($postTitle) {
				$postTitle = '<a href="' . esc_url($postLink) . '">' . $postTitle . '</a>';
				echo '<h1 class="smaller tbWow fadeIn">' . $postTitle . '</h1>';
			}

			if ($post_excerpt) {
				echo '<div class="tbWow fadeIn" data-wow-delay="0.3s">' . $post_excerpt . '</div>';
			}

			if (isset($img) && !empty($img['url'])) {

			?>

			<div class="tbWow fadeIn tb-image-spacer">
				<img src="<?php echo esc_url($img['url']); ?>" alt="">
			</div>

			<?php

			}

			?>

			<script type="text/javascript">
				jQuery(document).ready(function() {
					var untilStartDate = new Date(<?php echo esc_attr($countdownString); ?>);
					jQuery('#event-countdown').countdown({
						until: untilStartDate, format: 'dHMS', layout: jQuery('#event-countdown').html()
					});
				})
			</script>

			<div class="tbWow fadeInUp tb-primary-font" data-wow-delay='0.6s' id="event-countdown">
				<div class="event-date">
					<span class="event-label">{dn}</span>
					<span class="str event-label">{dl}</span>
				</div>
				<div class="event-date">
					<span class="event-label">{hn}</span>
					<span class="str event-label">{hl}</span>
				</div>
				<div class="event-date">
					<span class="event-label">{mn}</span>
					<span class="str event-label">{ml}</span>
				</div>
				<div class="event-date">
					<span class="event-label">{sn}</span>
					<span class="str event-label">{sl}</span>
				</div>
			</div>

			<div class="clear button_list btn48">

				<a href="<?php echo esc_url($postLink); ?>" class="btn btn-tb-secondary alignleft tbWow fadeIn"><?php echo esc_attr($button_label); ?></a>

				<?php if ($show_custom_button != 'no' && $custom_button_label) { ?>
				<a href="<?php echo esc_url($cb_link); ?>" target="<?php echo esc_attr($cb_target); ?>" class="btn btn-tb-primary alignright tbWow fadeIn" data-wow-delay="0.5s"><?php echo esc_attr($custom_button_label); ?></a>
				<?php } ?>
			</div>


		</article>

		<?php

		endwhile;
	?>

	</div>
	
	<?php
endif;

wp_reset_postdata(); // reset events query

endif; // class exists

?>