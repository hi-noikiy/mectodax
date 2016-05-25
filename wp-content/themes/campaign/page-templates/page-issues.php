<?php
/**
 * Template Name: Issues
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content col-xs-12" role="main">

		<article id="post-<?php the_id(); ?>" <?php post_class("post issues-list clearfix"); ?>>
			<header class="entry-header">
		        <h1 class="entry-title tbWow fadeIn"><?php the_title(); ?></h1>
			</header>
		<?php
		if (defined("THEMEBLOSSOM_ISSUES_CPT")) {
			$args['post_type'] = THEMEBLOSSOM_ISSUES_CPT;
		}

		$our_query = new WP_Query($args);

		if ( $our_query->have_posts() ) :
			?>

			<div class="entry-content row <?php echo esc_attr($custom_class); ?>" <?php if ($custom_id) {echo ' id="' . esc_attr($custom_id) . '"';} ?>>

			<?php
			while ( $our_query->have_posts() ) : $our_query->the_post();

				get_template_part( 'content', 'issue' );

			endwhile;
			?>

			</div>

			<div class="clear"></div>

			<?php	
			
			$navigation_choice = campaign_default_array($campaign_theme_options, 'blog-navigation-type', 'paged');			
			$prev_next = campaign_default_array($campaign_theme_options, 'blog-navigation-paginated-prevnext', true);
					
			campaign_navigation($navigation_choice, $our_query, $prev_next);		

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;

		?>

		</article>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
?>