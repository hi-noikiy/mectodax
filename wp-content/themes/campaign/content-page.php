<?php

$postID = intval( get_the_ID() );
$postLink = get_permalink();
$postTitle = esc_attr( get_the_title() );
$post_thumbnail_id = get_post_thumbnail_id();

$show_featured_image = 'yes';

$this_post_meta = 0;

$this_post_meta = fw_get_db_post_option($postID);
$show_featured_image = (isset($this_post_meta['featured_switch']) && !empty($this_post_meta['featured_switch'])) ? $this_post_meta['featured_switch'] : $show_featured_image;

?>

<article id="post-<?php echo '' . $postID; ?>" <?php post_class("post clearfix"); ?>>
	<header class="entry-header">
        <h1 class="entry-title tbWow fadeIn"><?php the_title(); ?></h1>
	</header>

	<?php if($post_thumbnail_id && $show_featured_image == 'yes') : ?>
		<?php

		$image = wp_get_attachment_image_src($post_thumbnail_id, 'campaign-blog-full');

		if (is_single()) {
			$fullImage = wp_get_attachment_image_src($post_thumbnail_id, 'full');
			$link = $fullImage[0];
			$extra_rel = ' data-rel="prettyPhoto"';
			$icon_extra = 'zoom';
		} else {
			$link = $postLink;
			$extra_rel = '';
			$icon_extra = 'link';
		}
		
		?>

        <div id="tb-content-thumbnail" class="tb-single-image tb-single-image-icon tbWow fadeIn">
            <a class="tb-single-image-wrap" href="<?php echo esc_url($link); ?>" <?php echo '' . $extra_rel; ?>>
                <img src="<?php echo esc_url($image[0]); ?>">
                <i class="tb-icon-<?php echo esc_attr($icon_extra); ?>"></i>
            </a>
        </div>
	<?php endif; ?>

    <div class="entry-content clearfix">
        <?php the_content(); ?>


        <?php wp_link_pages( array(
            'before'      => '<div class="info-line"><span class="page-links-title">' . esc_html__( 'Pages:', 'campaign' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); ?>
    </div>

    <?php if (is_single()) : ?>
	<footer class="entry-meta clearfix">
        <?php campaign_info_line(1, 1, 1, 1, ' / '); ?>
    </footer>
	<?php endif; ?>
</article>