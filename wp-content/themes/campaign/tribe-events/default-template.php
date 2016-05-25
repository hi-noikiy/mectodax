<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

get_header();

global $campaign_theme_options;

$layoutClass = "col-xs-12 col-sm-8";

if (tribe_is_month()) {
	$layoutClass = "col-xs-12";
}

if (is_single()) {
	$layoutClass = "col-xs-12 col-sm-7";
}

$show_tec_bar = campaign_default_array($campaign_theme_options, 'tec-show-bar', 'no');
$showExport = campaign_default_array($campaign_theme_options, 'tec-archive-remove-export', 'no');

?>
<div id="main-content" class="main-content">

	<div id="primary" class="content-area <?php echo esc_attr($layoutClass); ?>">
		<div id="content" class="site-content" role="main">

		<div id="tribe-events-pg-template" class="show-tec-bar-<?php echo esc_attr($show_tec_bar); ?> show-ical-<?php echo esc_attr($showExport); ?>">
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
		</div> <!-- #tribe-events-pg-template -->

		</div>


	</div><!-- #primary -->

	<?php 
	if (!tribe_is_month()) :
		get_sidebar('events');
	endif;
	?>
			
</div><!-- #main -->

<?php get_footer(); ?>