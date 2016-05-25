
<?php

global $campaign_theme_options;


$bckg = isset($campaign_theme_options['issues-bckg-color']) ? $campaign_theme_options['issues-bckg-color']['regular'] : '#ffffff';
$bckgHover = isset($campaign_theme_options['issues-bckg-color']) ? $campaign_theme_options['issues-bckg-color']['hover'] : '#022D6D';

$link = isset($campaign_theme_options['issues-link-color']) ? $campaign_theme_options['issues-link-color']['regular'] : '#A02E2F';
$linkHover = isset($campaign_theme_options['issues-link-color']) ? $campaign_theme_options['issues-link-color']['hover'] : '#ffffff';

$titleColor = isset($campaign_theme_options['issues-title-color']) ? $campaign_theme_options['issues-title-color'] : '#ffffff';
$overlayColor = isset($campaign_theme_options['issues-overlay-bckg-color']) ? $campaign_theme_options['issues-overlay-bckg-color'] : '#3D5E8F';

$postID = intval( get_the_ID() );
$post_title = get_the_title();
$post_link = get_permalink();
$post_thumbnail_id = get_post_thumbnail_id();

$show_featured_image = 'yes';

if (is_single()) :


$this_post_meta = fw_get_db_post_option($postID);
$show_featured_image = (isset($this_post_meta['featured_switch']) && !empty($this_post_meta['featured_switch'])) ? $this_post_meta['featured_switch'] : $show_featured_image;

?>
<article id="post-<?php echo intval($postID); ?>" <?php post_class("post single-issue clearfix tbWow fadeIn"); ?>>
	<header class="entry-header">
        <h1 class="entry-title tbWow fadeIn"><?php if(is_sticky()) echo '<i class="fa fa-bookmark-o"></i> '; ?><a href="<?php echo esc_url($postLink); ?>"><?php the_title(); ?></a></h1>
	</header>

	<?php if($post_thumbnail_id && $show_featured_image == 'yes') : ?>
		<?php

		$image = wp_get_attachment_image_src($post_thumbnail_id, 'campaign-blog-full');		
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
</article>

<?php
else:
?>

<div class="col-xs-6 col-sm-3">

<div class="tb-issues-list data-bg-hover-children data-color-hover-children tbWow fadeIn" data-bg="<?php echo esc_attr($bckg); ?>" data-bg-hover="<?php echo esc_attr($bckgHover); ?>" data-color="<?php echo esc_attr($titleColor); ?>" data-color-hover="<?php echo esc_attr($titleColor); ?>" data-a-color="<?php echo esc_attr($link); ?>" data-a-color-hover="<?php echo esc_attr($linkHover); ?>">

	<a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>" class="absolute100"><?php echo esc_attr($post_title); ?></a>

<?php if (has_post_thumbnail()) : ?>

<div class="tb-issues-list-thumbnail">

	<div class="post-title">
	<div class="absolutecenter" style="color: <?php echo esc_attr($titleColor); ?>;">
		<h1 style="color: <?php echo esc_attr($titleColor); ?>;"><?php echo esc_attr($post_title); ?></h1>
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

<?php endif; ?>