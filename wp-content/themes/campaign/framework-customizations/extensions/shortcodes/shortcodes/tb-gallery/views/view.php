<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : '';
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : '';

$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = campaign_string_explode($post_order);

$item_number = (isset($atts['item_number']) && $atts['item_number']) ? intval($atts['item_number']) : 12;

// let's create some magic :)
$args = array();
$args['posts_per_page'] = $item_number;

$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}

$args['post_type'] = 'fw-portfolio';
$args['meta_key'] = '_thumbnail_id';

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div class="entry-content row <?php echo esc_attr($custom_class); ?>" <?php if ($custom_id) {echo ' id="' . esc_attr($custom_id) . '"';} ?>>

<?php
while ($our_query->have_posts()) :
$our_query->the_post();


$thumbnails = fw_ext_portfolio_get_gallery_images();
$thumbnails_number = count($thumbnails);

$this_post_meta = fw_get_db_post_option(get_the_id());
$show_video = (isset($this_post_meta['video_switch']) && !empty($this_post_meta['video_switch'])) ? $this_post_meta['video_switch'] : 'no';

?>
<div class="tb-portfolio-img col-xs-6 col-sm-3 fadeIn tbWow">
	<a href="<?php the_permalink() ?>">
		<?php
		if( has_post_thumbnail() ) {
			$imageA = wp_get_attachment_image_src(get_post_thumbnail_id(), 'campaign-thumb-xl');
			$image = $imageA[0];
		} else {
			$image = fw()->extensions->get('portfolio')->locate_URI('/static/img/no-photo.jpg');
		}
		?>
		<img src="<?php echo esc_url($image); ?>" />
		<span class="absolutecenter-stretch-column">
		<h3><?php the_title(); ?></h3>
		
		<?php if ($thumbnails_number && $show_video != 'yes') : ?>
		<?php
		if ($thumbnails_number == 1) {
			$number_of_images = ' image';
		} else {
			$number_of_images = ' images';
		}
		?>
		<p><?php echo '' . $thumbnails_number . $number_of_images; ?></p>
		<?php endif; ?>

		</span>
	</a>

</div>

<?php
endwhile;
?>

</div>

<?php
endif;

wp_reset_postdata(); // reset query

?>