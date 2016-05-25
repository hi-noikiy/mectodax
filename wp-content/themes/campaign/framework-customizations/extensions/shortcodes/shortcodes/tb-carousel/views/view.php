<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$helpArray = array(
	'post_type' => 'post',
	'post'		=> array(
		'taxonomy' => 0
	)
);


$tax_array = array(
	'post' => 'category'
);


$post_type_select = (isset($atts['post_type_select']) && $atts['post_type_select']) ? $atts['post_type_select'] : $helpArray;
$post_type = $post_type_select['post_type'];
if ($post_type == 'post') {
	$post_taxonomy = $post_type_select[$post_type]['taxonomy'];
} else {
	$post_taxonomy = 0;
}

$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = campaign_string_explode($post_order);

$posts_number = (isset($atts['posts_number']) && $atts['posts_number']) ? intval($atts['posts_number']) : get_option('posts_per_page');
if (intval($posts_number) > 50) {
	$posts_number = 50;
}
if (!intval($posts_number)) {
	$posts_number = get_option('posts_per_page');
}

// colors
$color = (isset($atts['color']) && $atts['color']) ? $atts['color'] : '#21477F';
$color_hover = (isset($atts['color_hover']) && $atts['color_hover']) ? $atts['color_hover'] : '#ffffff';
$a_color = (isset($atts['a_color']) && $atts['a_color']) ? $atts['a_color'] : '#A02E2F';
$a_color_hover = (isset($atts['a_color_hover']) && $atts['a_color_hover']) ? $atts['a_color_hover'] : '#FFFFFF';
$background_color = (isset($atts['background_color']) && $atts['background_color']) ? $atts['background_color'] : '#ffffff';
$background_color_hover = (isset($atts['background_color_hover']) && $atts['background_color_hover']) ? $atts['background_color_hover'] : '#D20921';
$overlay_color = (isset($atts['overlay_color']) && $atts['overlay_color']) ? $atts['overlay_color'] : '#043174';


$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : 'slick' . rand(10000, 99999);
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : 'slick' . rand(10000, 99999);

$args = array();
$args['post_type'] = $post_type;
$args['posts_per_page'] = $posts_number;
$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}

if (isset($post_taxonomy) && $post_taxonomy) {
	$args['tax_query'] = array(
        array(
            'taxonomy' => $tax_array[$post_type],
            'field' => 'id',
            'terms' => $post_taxonomy
        )
    );
}

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div class="tb-posts-carousel">

<?php
while ($our_query->have_posts()) : $our_query->the_post();
?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
?>

<div class="data-bg-hover-children data-color-hover-children" data-bg="<?php echo esc_attr($background_color); ?>" data-bg-hover="<?php echo esc_attr($background_color_hover); ?>" data-color="<?php echo esc_attr($color); ?>" data-color-hover="<?php echo esc_attr($color_hover); ?>" data-a-color="<?php echo esc_attr($a_color); ?>" data-a-color-hover="<?php echo esc_attr($a_color_hover); ?>">

	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<?php if (has_post_thumbnail()) : ?>

<div class="tb-post-carousel-thumbnail">

	<?php if ($post_type == 'post') : ?>

	<div class="post-categories data-color-hover" style="background: <?php echo esc_attr($background_color_hover); ?>; color: <?php echo esc_attr($color_hover); ?>;" data-a-color="<?php echo esc_attr($a_color_hover); ?>">
		<?php the_category(', '); ?>
	</div>

	<?php endif; ?>

	<div class="post-title" style="color: <?php echo esc_attr($color_hover); ?>;">
		<h1 style="color: <?php echo esc_attr($color_hover); ?>;"><?php echo esc_attr($post_title); ?></h1>

		<?php if ($post_type == 'post') : ?>
		<div class="post-date"><i class="icon-clock"></i> <?php echo get_the_date(get_option('date_format')); ?></div>
		<?php endif; ?>
	</div>

	<?php the_post_thumbnail('campaign-thumb-xl'); ?>

	<div class="absolute100" style="background-color: <?php echo esc_url($overlay_color); ?>"></div>
</div>
<?php endif; // thumbnail ?>

<div class="changing-data-attr">

<?php
if ($post_type == 'post') : 
the_excerpt(); 
else :
echo '<p>' . wp_trim_words(get_the_content(), 30 ) . '</p>';
endif;
?>

<div class="read-more"><?php echo esc_html__('Read more', 'campaign'); ?></div>

</div>
</div>

<?php
endwhile;
?>

</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.tb-posts-carousel').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
  		infinite: true,
	  	autoplay: true,
	  	autoplaySpeed: 5000,
  		speed: 600,
		responsive: [
		{
		  breakpoint: 600,
		  settings: {
		    slidesToShow: 2,
		    slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
		    slidesToShow: 1,
		    slidesToScroll: 1
		  }
		}
		]
	});
});
		</script>

<?php
endif;

wp_reset_postdata(); // reset query

?>