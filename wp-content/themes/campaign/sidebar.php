<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package campaign
 */
?>
	<div id="secondary" class="widget-area col-xs-12 col-sm-4" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php esc_html_e( 'Archives', 'campaign' ); ?></h3>
				<ul class="list-group">
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php esc_html_e( 'Meta', 'campaign' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
