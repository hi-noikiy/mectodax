<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

global $campaign_theme_options;


$bckg = isset($campaign_theme_options['issues-bckg-color']) ? $campaign_theme_options['issues-bckg-color']['regular'] : '#ffffff';
$bckgHover = isset($campaign_theme_options['issues-bckg-color']) ? $campaign_theme_options['issues-bckg-color']['hover'] : '#022D6D';

$link = isset($campaign_theme_options['issues-link-color']) ? $campaign_theme_options['issues-link-color']['regular'] : '#A02E2F';
$linkHover = isset($campaign_theme_options['issues-link-color']) ? $campaign_theme_options['issues-link-color']['hover'] : '#ffffff';

$titleColor = isset($campaign_theme_options['issues-title-color']) ? $campaign_theme_options['issues-title-color'] : '#ffffff';
$overlayColor = isset($campaign_theme_options['issues-overlay-bckg-color']) ? $campaign_theme_options['issues-overlay-bckg-color'] : '#3D5E8F';

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

if (defined('THEMEBLOSSOM_ISSUES_CPT')) {
	$args['post_type'] = THEMEBLOSSOM_ISSUES_CPT;
}

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div class="entry-content row <?php echo esc_attr($custom_class); ?>" <?php if ($custom_id) {echo ' id="' . esc_attr($custom_id) . '"';} ?>>

<?php
while ($our_query->have_posts()) :
$our_query->the_post();

?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
?>

<div class="col-xs-6 col-sm-3 tbWow fadeIn">

<div class="tb-issues-list data-bg-hover-children data-color-hover-children" data-bg="<?php echo esc_attr($bckg); ?>" data-bg-hover="<?php echo esc_attr($bckgHover); ?>" data-color="<?php echo esc_attr($titleColor); ?>" data-color-hover="<?php echo esc_attr($titleColor); ?>" data-a-color="<?php echo esc_attr($link); ?>" data-a-color-hover="<?php echo esc_attr($linkHover); ?>">

	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<?php if (has_post_thumbnail()) : ?>

<div class="tb-issues-list-thumbnail">

	<div class="post-title">
	<div class="absolutecenter" style="color: <?php echo esc_attr($titleColor); ?>;">
		<h1 style="color: <?php echo esc_attr($titleColor); ?>;"><span><?php echo esc_attr($post_title); ?></span></h1>
	</div>
	</div>

	<?php the_post_thumbnail('campaign-thumb-xl'); ?>

	<div class="absolute100" style="background-color: <?php echo esc_url($overlayColor); ?>"></div>
</div>
<?php endif; // thumbnail ?>

<div class="changing-data-attr">

<div class="read-more"><?php echo esc_html__('Read more', 'campaign'); ?></div>

</div>
</div>
</div>

<?php
endwhile;
?>

</div>

<?php
endif;

wp_reset_postdata(); // reset query

?>