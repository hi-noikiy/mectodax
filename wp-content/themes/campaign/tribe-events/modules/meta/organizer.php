<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="col-xs-12  col-sm-6 tribe-events-meta-group-organizer">
	<h3 class="tribe-events-single-section-title"> <?php esc_html_e( tribe_get_organizer_label_singular(), 'campaign' ) ?> </h3>
	<dl>
		<?php do_action( 'tribe_events_single_meta_organizer_section_start' ) ?>

		<dd class="fn org"> <?php echo tribe_get_organizer() ?> </dd>

		<?php if ( ! empty( $phone ) ): ?>
			<dt> <?php esc_html_e( 'Phone:', 'campaign' ) ?> </dt>
			<dd class="tel"> <?php echo '' . $phone ?> </dd>
		<?php endif ?>

		<?php if ( ! empty( $email ) ): ?>
			<dt> <?php esc_html_e( 'Email:', 'campaign' ) ?> </dt>
			<dd class="email"> <?php echo '' . $email ?> </dd>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
			<dt> <?php esc_html_e( 'Website:', 'campaign' ) ?> </dt>
			<dd class="url"> <?php echo '' . $website ?> </dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_organizer_section_end' ) ?>
	</dl>
</div>