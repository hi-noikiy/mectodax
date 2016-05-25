<?php


if ( function_exists( 'tribe_is_event') ) {

	// extend next/prev month links
	if (!function_exists('campaign_tribe_events_the_previous_month_link')) :
		function campaign_tribe_events_the_previous_month_link() {
			$html = '';
			$url  = tribe_get_previous_month_link(); // validated
			$date = Tribe__Events__Main::instance()->previousMonth( tribe_get_month_view_date() ); // validated

			if ( $date >= tribe_events_earliest_date( Tribe__Events__Date_Utils::DBYEARMONTHTIMEFORMAT ) ) {
				$text = tribe_get_previous_month_text(); // validated
				$html = '<a data-month="' . $date . '" href="' . $url . '" rel="prev" class="btn btn-tb-primary tbWow fadeIn"><span>&laquo;</span> ' . $text . ' </a>';
			}

			echo apply_filters( 'campaign_tribe_events_the_previous_month_link', $html );
		}
	endif;

	if (!function_exists('campaign_tribe_events_the_next_month_link')) :
		function campaign_tribe_events_the_next_month_link() {
			$html = '';
			$url  = tribe_get_next_month_link();
			$text = tribe_get_next_month_text();

			// Check if $url is populated (an empty string may indicate the date was out-of-bounds, ie on 32bit servers)
			if ( ! empty( $url ) ) {
				$date = Tribe__Events__Main::instance()->nextMonth( tribe_get_month_view_date() );
				if ( $date <= tribe_events_latest_date( Tribe__Events__Date_Utils::DBYEARMONTHTIMEFORMAT ) ) {
					$html = '<a data-month="' . $date . '" href="' . $url . '" rel="next" class="btn btn-tb-primary tbWow fadeIn">' . $text . ' <span>&raquo;</span></a>';
				}
			}

			echo apply_filters( 'campaign_tribe_events_the_next_month_link', $html );
		}
	endif;



	// extend tribe_the_day_link
	if ( ! function_exists( 'campaign_tribe_the_day_link' ) ) {
		/**
		 * Output an html link to a day
		 *
		 * @param string $date 'previous day', 'next day', 'yesterday', 'tomorrow', or any date string that strtotime() can parse
		 * @param string $text text for the link
		 *
		 * @return void
		 **/
		function campaign_tribe_the_day_link( $date = null, $text = null ) {
			$html = '';

			try {
				if ( is_null( $text ) ) {
					$text = tribe_get_the_day_link_label( $date );
				}

				$date = tribe_get_the_day_link_date( $date );
				$link = tribe_get_day_link( $date );

				$earliest = tribe_events_earliest_date( Tribe__Events__Date_Utils::DBDATEFORMAT );
				$latest   = tribe_events_latest_date( Tribe__Events__Date_Utils::DBDATEFORMAT );

				if ( $date >= $earliest && $date <= $latest ) {
					$html = '<a href="' . $link . '" data-day="' . $date . '" rel="prev" class="btn btn-tb-primary tbWow fadeIn">' . $text . '</a>';
				}

			} catch ( OverflowException $e ) {
			}

			echo apply_filters( 'campaign_tribe_the_day_link', $html );
		}
	}

	/**
	 * Modifying the thumbnail arguments in Month view tooltip from a filter.
	 *
	 * @link http://theeventscalendar.com/support/forums/topic/image-format-in-tooltip/
	 * @return array
	 */	
	if (!function_exists('change_tribe_json_tooltip_thumbnail')) :
		function change_tribe_json_tooltip_thumbnail( $json ) {
			$event_id = get_the_ID();
		
			if ( ! empty( $json['imageTooltipSrc'] ) ) {
				$thumb_id       = get_post_thumbnail_id( $event_id );       
				$thumbnail_atts = wp_get_attachment_image_src( $thumb_id, 'campaign-wide-s-thumbnail' );
		
				$json['imageTooltipSrc'] = $thumbnail_atts[0];
			}
		
			return $json;
		}

		add_filter( 'tribe_events_template_data_array', 'change_tribe_json_tooltip_thumbnail' );
	endif;
}

?>