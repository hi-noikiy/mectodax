<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */ 

global $campaign_theme_options;


$archiveImageType = 'none';
$archiveTitlePosition = campaign_default_array($campaign_theme_options, 'tec-archive-title-position', 'above');
$featuredImageSize = 'campaign-blog-full';

// thumbnail
$post_thumbnail_id = 0;

if ($archiveImageType != 'no') :
$post_thumbnail_id = get_post_thumbnail_id();
endif;

$showDatebox = campaign_default_array($campaign_theme_options, 'tec-archive-date-box', 'no');

$postID = intval( get_the_ID() );
$postLink = esc_url( get_permalink() );
$postTitle = get_the_title();


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<?php while ( have_posts() ) :  the_post(); ?>

		<?php
		if ($archiveTitlePosition == 'below') :
			if ($post_thumbnail_id) {
				campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, $featuredImageSize, $archiveImageType, 0, $showDatebox, 1);
				echo '<div class="clear" style="height: 30px;"></div>';
			}
		endif;
		?>

		<!-- Notices -->
		<?php tribe_the_notices() ?>

		<?php the_title( '<h1 class="tribe-events-single-event-title summary entry-title">', '</h1>' ); ?>

		<?php
		if ($archiveTitlePosition == 'above') :
			if ($post_thumbnail_id) {
				echo '<div class="clear" style="height: 30px;"></div>';
				campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, $featuredImageSize, $archiveImageType, 0, $showDatebox, 1);
			}
		endif;
		?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div>

			
			<div class="tribe-events-single-section tribe-events-event-meta secondary tribe-clearfix tbWow fadeIn">
			
			<?php
			do_action( 'tribe_events_single_event_meta_secondary_section_start' );

			tribe_get_template_part( 'modules/meta/map' );

			do_action( 'tribe_events_single_event_meta_secondary_section_end' );
			?>
				
			</div>

			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>


</div><!-- #tribe-events-content -->