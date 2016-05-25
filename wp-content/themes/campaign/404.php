<?php
/**
 * @package campaign
 */

get_header(); ?>

<style type="text/css">
	section#featured-image {display: none;}
	#main {padding: 200px 0 0;}
</style>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12">
		<div id="content" class="site-content" role="main">

		<?php get_template_part( 'content', 'none' ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- #main-content -->

<?php get_footer(); ?>
