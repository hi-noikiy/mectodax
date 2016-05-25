<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>

<?php

$type_of_content = (isset($atts['post_type']) && $atts['post_type']) ? $atts['post_type'] : 'posts';
$post_order = (isset($atts['order']) && $atts['order']) ? $atts['order'] : 'date-DESC';
$post_orderA = campaign_string_explode($post_order);

$item_number = (isset($atts['item_number']) && $atts['item_number']) ? intval($atts['item_number']) : 4;
$number_of_posts = (get_option('posts_per_page') <= $item_number) ? $item_number + 1 : get_option('posts_per_page');

$title_color = (isset($atts['title_color']) && $atts['title_color']) ? $atts['title_color'] : '#282828';
$title_background = (isset($atts['title_background']) && $atts['title_background']) ? $atts['title_background'] : '#FFFFFF';


$show_caption = (isset($atts['show_caption']) && $atts['show_caption']) ? $atts['show_caption'] : 'centered';

$helpArray = array(
	'background' => 'none',
	'image' => array(
		'background_image' => '',
		'background_color' => ''
	)
);

$background = (isset($atts['background_options']) && $atts['background_options']) ? $atts['background_options'] : $helpArray;

$caption_img = (isset($atts['caption_img']) && $atts['caption_img']) ? $atts['caption_img'] : '';
$caption_text = (isset($atts['caption_text']) && $atts['caption_text']) ? $atts['caption_text'] : '';
$caption_page = (isset($atts['caption_page']) && $atts['caption_page']) ? $atts['caption_page'] : 0;

$color = (isset($atts['color']) && $atts['color']) ? $atts['color'] : '#FFFFFF';
$a_color = (isset($atts['a_color']) && $atts['a_color']) ? $atts['a_color'] : '#FFFFFF';

$custom_id = (isset($atts['myid']) && $atts['myid']) ? $atts['myid'] : 'slick' . rand(10000, 99999);
$custom_class = (isset($atts['class']) && $atts['class']) ? $atts['class'] : 'slick' . rand(10000, 99999);

// let's create some magic :)
$args = array();
$args['posts_per_page'] = $number_of_posts;

$args['orderby'] = $post_orderA[0];

if (isset($post_orderA[1])) {
	$args['order'] = $post_orderA[1];
}

if ($type_of_content == 'posts') {

    $args['post_type'] = 'fw-portfolio';
    $args['meta_key'] = '_thumbnail_id';

}

$our_query = new WP_Query($args);

if ($our_query->have_posts()) :
?>

<div id="<?php echo esc_attr($custom_id); ?>" class="tb-portfolio-carousel-holder number-of-items-<?php echo intval($item_number); ?> caption-position-<?php echo esc_attr($show_caption); ?> <?php echo esc_attr($custom_class); ?>">

<?php

if ($show_caption != 'hidden') :

$caption_style = '';
if (isset($background['background']) && $background['background'] && $background['background'] == 'image') {
	$background_image = (isset($background['image']) && isset($background['image']['background_image']) && isset($background['image']['background_image']['data']) &&  isset($background['image']['background_image']['data']) && isset($background['image']['background_image']['data']['icon']) && !empty($background['image']['background_image']['data']['icon'])) ? 'background-image: url(' . $background['image']['background_image']['data']['icon'] . ');' : '';
	$background_color = (isset($background['image']) && isset($background['image']['background_color']) && !empty($background['image']['background_color'])) ? 'background-color: ' . $background['image']['background_color'] . ';' : '';

	if ($background_color || $background_color) {
		$caption_style .= ' style="';
		$caption_style .= $background_image;
		$caption_style .= $background_color;
		$caption_style .= '" ';
	}
}

?>

<div class="tb-portfolio-caption" <?php echo '' . $caption_style; ?>>
	
	<?php if (!empty($caption_text) || !empty($caption_img['attachment_id'])) : ?>
		<div class="tb-portfolio-caption-text2">
		<?php echo wp_get_attachment_image(intval($caption_img['attachment_id']), 'full'); ?>
		<div class="clear"></div>
		<?php echo esc_attr($caption_text); ?>
		</div>
	<?php endif; ?>
	
	<?php if (!empty($caption_page) && intval($caption_page)) : ?>
		<div class="tb-portfolio-caption-link absolutecenter">
		<a href="<?php echo get_permalink(intval($caption_page)); ?>" style="color: <?php echo esc_attr($a_color); ?>"><?php echo esc_html__('View More', 'campaign'); ?></a>
		</div>
	<?php endif; ?>
</div>

<?php endif; ?>

<div class="tb-portfolio-carousel data-color-hover" <?php if ($a_color) : ?>data-a-color="<?php echo esc_attr($a_color); ?>"<?php endif; ?>>

<?php
while ($our_query->have_posts()) : $our_query->the_post();
?>

<?php
$post_title = get_the_title();
$post_link = get_permalink();
$postID = get_the_id();

$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $postID) , 'campaign-thumb-xl' ) ;
?>

<div style="background: url(<?php echo esc_url($featured_image[0]); ?>);">

<!-- <?php echo($featured_image[0]); ?> -->

<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<div class="slide_title tb-half-margin absolutecenter tb-primary-font">
<h3 class="hidden"><?php echo esc_attr($post_title); ?></h3>
<span><?php echo esc_attr($post_title); ?></span>
</div>

</div>


<?php
endwhile;
?>

</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.tb-portfolio-carousel').slick({
		slidesToShow: <?php echo intval($item_number); ?>,
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

</div>

<?php
endif;

wp_reset_postdata(); // reset query

?>