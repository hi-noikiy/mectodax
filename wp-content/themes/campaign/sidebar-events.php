<?php
/**
 * The Sidebar containing the events widget areas.
 *
 * @package campaign
 */

$sidebar_class = 'col-sm-4';

if (is_single()) {
	$sidebar_class = 'col-sm-5';
}

?>
	<div id="secondary" class="widget-area col-xs-12 <?php echo esc_attr($sidebar_class); ?>" role="complementary">
	<?php if (is_single()) : ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php
			/**
			 * The tribe_events_single_event_meta() function has been deprecated and has been
			 * left in place only to help customers with existing meta factory customizations
			 * to transition: if you are one of those users, please review the new meta templates
			 * and make the switch!
			 */
			if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
				tribe_get_template_part( 'modules/meta' );
			} else {
				echo tribe_events_single_event_meta();
			}
			?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

	<?php else : ?>

		<?php if ( is_active_sidebar( 'events' ) && dynamic_sidebar('events') ) {

			} elseif ( is_active_sidebar( 'sidebar' ) && dynamic_sidebar( 'sidebar' ) ) {

			} else {


			?>

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

		<?php } // end sidebar widget area ?>

	<?php endif; // is single? ?>
		
	</div><!-- #secondary -->
