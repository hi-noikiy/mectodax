<?php get_header(); ?>

<?php

$layoutClass = 'col-sm-8';
$show_sidebar = 1;

if (class_exists('WooCommerce') && (is_cart() || is_checkout())) {
	$layoutClass = '';
	$show_sidebar = 0;
}

?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 <?php echo esc_attr($layoutClass); ?>">
		<div id="content" class="site-content" role="main">
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template('', true);
					endif;

				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php
	if ($show_sidebar) {
		get_sidebar();
	}
	?>

</div><!-- #main-content -->

<?php get_footer(); ?>