<?php

$postID = intval( get_the_ID() );
$postLink = get_permalink();
$postTitle = esc_attr( get_the_title() );
$post_thumbnail_id = get_post_thumbnail_id();

$show_featured_image = 'yes';
$show_related_posts = 'no';

$related_posts_title = '';

$this_post_meta = 0;

if (is_single()) {
	$this_post_meta = fw_get_db_post_option($postID);
	$show_featured_image = (isset($this_post_meta['featured_switch']) && !empty($this_post_meta['featured_switch'])) ? $this_post_meta['featured_switch'] : $show_featured_image;
	$show_related_posts = (isset($this_post_meta['related_switch']) && !empty($this_post_meta['related_switch'])) ? $this_post_meta['related_switch'] : $show_related_posts;
	$related_posts_title = (isset($this_post_meta['related_subtitle']) && !empty($this_post_meta['related_subtitle'])) ? $this_post_meta['related_subtitle'] : $related_posts_title;
}

?>
<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix"); ?>>
	<header class="entry-header">

		<?php
		if (is_archive()) {
			$title_tag = 'h2';
		} else {
			$title_tag = 'h1';
		}
		?>

        <<?php echo esc_attr($title_tag); ?> class="entry-title tbWow fadeIn"><a href="<?php echo esc_url($postLink); ?>"><?php the_title(); ?></a></<?php echo esc_attr($title_tag); ?>>
	</header>

	<?php if($post_thumbnail_id && $show_featured_image == 'yes') : ?>
		<?php

		$image = wp_get_attachment_image_src($post_thumbnail_id, 'campaign-blog-full');

		if (is_single()) {
			$fullImage = wp_get_attachment_image_src($post_thumbnail_id, 'full');
			$link = $fullImage[0];
			$extra_rel = ' data-rel="prettyPhoto"';
			$icon_extra = 'zoom';

			?>

	        <div id="tb-content-thumbnail" class="tb-single-image tb-single-image-icon tbWow fadeIn">
	            <a class="tb-single-image-wrap" href="<?php echo esc_url($link); ?>" <?php echo '' . $extra_rel; ?>>
	                <img src="<?php echo esc_url($image[0]); ?>">
	                <i class="tb-icon-<?php echo esc_attr($icon_extra); ?>"></i>
	            </a>
	        </div>

			<?php

		} else {

			$link = $postLink;
			$icon_extra = 'link';

			campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, 'campaign-blog-full', 'none', 0, 'yes');
			echo '<div class="clear" style="height: 30px;"></div>';
		}
		

		?>

	<?php endif; ?>

    <div class="entry-content clearfix">
        <?php
        if (is_single()) {
        	the_content();
        } else {
        	the_excerpt();
        }
        ?>


        <?php wp_link_pages( array(
            'before'      => '<div class="info-line"><span class="page-links-title">' . esc_html__( 'Pages:', 'campaign' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); ?>
    </div>

	<footer class="entry-meta clearfix">
        <?php campaign_info_line(1, 1, 1, 1, ' / '); ?>
    </footer>
</article>

<?php

if (!is_single()) {
	$show_related_posts = 'no';
}

if ($show_related_posts == 'yes') {

if (!empty($related_posts_title)) {
	echo "<h2>" . $related_posts_title . "</h2>";
}

wp_enqueue_style('slick');
wp_enqueue_style('slick-theme');
wp_enqueue_script('slick');

global $campaign_theme_options;

$relatedColorR = isset($campaign_theme_options['related-posts-color']) ? $campaign_theme_options['related-posts-color']['regular'] : '#21477F';
$relatedColorH = isset($campaign_theme_options['related-posts-color']) ? $campaign_theme_options['related-posts-color']['hover'] : '#ffffff';

$relatedColorLinkR = isset($campaign_theme_options['related-posts-link-color']) ? $campaign_theme_options['related-posts-link-color']['regular'] : '#A02E2F';
$relatedColorLinkH = isset($campaign_theme_options['related-posts-link-color']) ? $campaign_theme_options['related-posts-link-color']['hover'] : '#ffffff';

$relatedColorBckgR = isset($campaign_theme_options['related-posts-bckg-color']) ? $campaign_theme_options['related-posts-bckg-color']['regular'] : '#ffffff';
$relatedColorBckgH = isset($campaign_theme_options['related-posts-bckg-color']) ? $campaign_theme_options['related-posts-bckg-color']['hover'] : '#B60D21';

$relatedOverlay = isset($campaign_theme_options['related-posts-overlay-bckg-color']) ? $campaign_theme_options['related-posts-overlay-bckg-color'] : '#043174';

$related_query = campaign_related_posts($postID, 3);

if ($related_query->have_posts()) :

?>

<div class="tb-posts-carousel overflowhidden">

<?php

$delay = 0;

while ($related_query->have_posts()) : $related_query->the_post();

$delay += 0.3;

$post_title = get_the_title();
$post_link = get_permalink();

?>

<div class="slick-slide data-bg-hover-children data-color-hover-children col-xs-6 hidden-xs tbWow fadeInUp" data-bg="<?php echo esc_attr($relatedColorBckgR); ?>" data-bg-hover="<?php echo esc_attr($relatedColorBckgH); ?>" data-color="<?php echo esc_attr($relatedColorR); ?>" data-color-hover="<?php echo esc_attr($relatedColorH); ?>" data-a-color="<?php echo esc_attr($relatedColorLinkR); ?>" data-a-color-hover="<?php echo esc_attr($relatedColorLinkH); ?>" data-wow-delay="<?php echo '' . $delay; ?>s">

	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<?php if (has_post_thumbnail()) : ?>

<div class="tb-post-carousel-thumbnail">

	<div class="post-title" style="color: <?php echo esc_attr($relatedColorH); ?>;">
		<h1 style="color: <?php echo esc_attr($relatedColorH); ?>;"><?php echo esc_attr($post_title); ?></h1>

		<div class="post-date"><i class="icon-clock"></i> <?php echo get_the_date(get_option('date_format')); ?></div>
	</div>

	<?php the_post_thumbnail('campaign-thumb-xl'); ?>

	<div class="absolute100" style="background-color: <?php echo esc_url($relatedOverlay); ?>"></div>
</div>
<?php endif; // thumbnail ?>

<div class="changing-data-attr">

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
		slidesToShow: 2,
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

wp_reset_postdata();

} // show related posts
?>