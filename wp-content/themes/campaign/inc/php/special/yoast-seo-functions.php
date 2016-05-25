<?php

// let's rewrite breadcrumbs for The Events Calendar
if (!function_exists('campaign_yoast_breadcrumbs_tec')) {
	function campaign_yoast_breadcrumbs_tec($before, $after, $breadcrumb) {

		$wpseo_internallinks = get_option('wpseo_internallinks');
		$separator = $wpseo_internallinks['breadcrumbs-sep'];

		if (function_exists('tribe_get_events_link')) {
			$breadcrumbsArray = explode(" $separator ", $breadcrumb);
			$home = array_shift($breadcrumbsArray);
			$eventsLink = '<span typeof="v:Breadcrumb"><a href="' . tribe_get_events_link() . '" rel="v:url" property="v:title">' . esc_html__('Events', 'campaign') . '</a></span>';
			array_unshift($breadcrumbsArray, $home, $eventsLink);

			$breadcrumbs = implode(" $separator ", $breadcrumbsArray);

			$return = $before . $breadcrumbs . $after;

			return $return;
		} else {
			return false;
		}
	}
}

// let's rewrite breadcrumbs for TB's post types
if (!function_exists('campaign_wpseo_breadcrumb_links')) :
add_filter( 'wpseo_breadcrumb_links', 'campaign_wpseo_breadcrumb_links' );
function campaign_wpseo_breadcrumb_links( $links ) {
	global $campaign_theme_options;

	if ( is_single() ) {
		$cpt_object = get_post_type();

		if ( defined("THEMEBLOSSOM_ISSUES_CPT") &&  $cpt_object == THEMEBLOSSOM_ISSUES_CPT ) {
			$landing_page = campaign_default_array($campaign_theme_options, 'issues-page', 0);
			if ($landing_page) :
			array_splice( $links, -1, 0, array(
				array(
					'id'	=> $landing_page
				)
			));
			endif;
		}


		if ( $cpt_object == 'fw-portfolio' ) {
			$landing_page = campaign_default_array($campaign_theme_options, 'projects-page', 0);
			if ($landing_page) :
			array_splice( $links, -2, 1, array(
				array(
					'id'	=> $landing_page
				)
			));
			endif;
			
		}
	}

	return $links;
}
endif;

?>