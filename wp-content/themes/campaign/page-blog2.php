<?php
/**
 * @package campaign
 * 
 * Template Name: Blog With XS Thumbs
 */

get_header(); 

global $campaign_theme_options;

$layoutClass = "col-xs-12 col-sm-8";

$post_id = get_the_id();
$main_post_meta = fw_get_db_post_option($post_id);

$selected_categories = campaign_default_array($main_post_meta, 'page_select_categories', '');

if (!empty($selected_categories)) {
	$main_cat = implode(',', $selected_categories);
} else {
	$main_cat = -1;
}

?>
<div id="main-content" class="main-content">

	<div id="primary" class="content-area <?php echo esc_attr($layoutClass); ?>">
		<div id="content" class="site-content" role="main">
		
		
		<?php
		$args['post_type'] = 'post'; 
		
		if ($main_cat > 0) {
			$args['cat'] = $main_cat;
		}
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args['paged'] = $paged;  
		
		$customQuery = new WP_Query( $args );
		?>

		<?php if ( $customQuery->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $customQuery->have_posts() ) : $customQuery->the_post(); ?>

			<?php
			$postID = intval( get_the_ID() );
			$postLink = get_permalink();
			$postTitle = esc_attr( get_the_title() );
			$post_thumbnail_id = get_post_thumbnail_id();
			?>
			<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix"); ?>>

				<div class="media blog-page-with-thumbs">

				<div class="media-left hidden-xs">

				<?php if($post_thumbnail_id) : ?>
					<?php

					$link = $postLink;
					$icon_extra = 'link';

					campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, 'thumbnail', 'none', 0, 'no');
					
					?>
				<?php endif; ?>

				</div>

			    <div class="entry-content media-body nopadding">
					<header class="entry-header">
				        <h2 class="entry-title tbWow fadeIn"><?php if(is_sticky()) echo '<i class="fa fa-bookmark-o"></i> '; ?><a href="<?php echo esc_url($postLink); ?>"><?php the_title(); ?></a></h2>
					</header>
			        <?php echo wp_trim_words(get_the_content(), 45); ?>
			    </div>

			    </div> <!-- media -->
				<footer class="entry-meta clearfix">
			        <?php campaign_info_line(1, 1, 1, 1, ' / '); ?>
			    </footer>
			</article>

			<?php endwhile; ?>

			<div class="clear"></div>

			<?php	
			
			$navigation_choice = campaign_default_array($campaign_theme_options, 'blog-navigation-type', 'paged');			
			$prev_next = campaign_default_array($campaign_theme_options, 'blog-navigation-paginated-prevnext', true);
					
			campaign_navigation($navigation_choice, $customQuery, $prev_next);		

		else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>


	</div><!-- #primary -->

	<?php 
	get_sidebar();
	?>
			
</div><!-- #main -->

<?php get_footer(); ?>