<?php
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
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
} ?>

<?php

$venue_details = array();

if ( $venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;
}

if ( $venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( $venue_address ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<?php
if ($archiveTitlePosition == 'below') :
	if ($post_thumbnail_id) {
		campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, $featuredImageSize, $archiveImageType, 0, $showDatebox);
		echo '<div class="clear" style="height: 30px;"></div>';
	}
endif;
?>

<!-- Event Cost -->
<?php if ( tribe_get_cost() ) : ?> 
	<div class="tribe-events-event-cost">
		<span><?php echo tribe_get_cost( null, true ); ?></span>
	</div>
<?php endif; ?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h2 class="tribe-events-list-event-title entry-title summary">
	<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta vcard"> <div class="author <?php echo esc_attr($has_venue_address); ?>">

	<!-- Schedule & Recurrence Details -->
	<div class="updated published time-details">
		<?php echo tribe_events_event_schedule_details() ?>
	</div>

	<?php if ( $venue_details ) : ?>
		<!-- Venue Display Info -->
		<div class="tribe-events-venue-details">
			<?php echo implode( ', ', $venue_details) ; ?>
		</div> <!-- .tribe-events-venue-details -->
	<?php endif; ?>

</div> </div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<?php
if ($archiveTitlePosition == 'above') :
	if ($post_thumbnail_id) {
		echo '<div class="clear" style="height: 30px;"></div>';
		campaign_post_thumbnail($postLink, $postTitle, $post_thumbnail_id, $featuredImageSize, $archiveImageType, 0, $showDatebox);
	}
endif;
?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php the_excerpt() ?>
	<a href="<?php echo tribe_get_event_link() ?>" class="tribe-events-read-more btn btn-tb-primary tbWow fadeIn" rel="bookmark"><?php esc_html_e( 'Find out more', 'campaign' ) ?> &raquo;</a>
</div><!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>
