<?php

/**
return social buttons

@param $class - class for block of elements
@param $type - set of icons
@param $animation - deprecated
**/
if (!function_exists('campaign_social_buttons')) :

function campaign_social_buttons($class = '', $type = 1, $animation = 0) {
	global $campaign_theme_options;
	
	if (trim($class)) { $class = 'class="' . $class . '"'; }
	
	$snb = '';

	$icon_mail = 'icon-mail2';
	$icon_facebook = 'icon-facebook';
	$icon_twitter = 'icon-twitter';
	$icon_instagram = 'icon-instagram';
	$icon_linkedin = 'icon-linkedin2';
	$icon_googleplus = 'icon-google-plus';
	$icon_pinterest = 'genericon genericon-pinterest-alt';
	$icon_flickr = 'icon-flickr2';
	$icon_youtube = 'icon-youtube3';
	$icon_vimeo = 'icon-vimeo';
	
	if ($type == 2) {
	$icon_mail = 'icon-mail3';
	$icon_facebook = 'icon-facebook2';
	$icon_twitter = 'icon-twitter2';
	$icon_linkedin = 'icon-linkedin';
	$icon_googleplus = 'icon-google-plus2';
	$icon_pinterest = 'icon-pinterest2';
	$icon_flickr = 'icon-flickr3';
	$icon_vimeo = 'icon-vimeo2';
	}

	$aClass = '';
	$delay = '';
	$mainDelay = '';
	$dataDelay = '';
	$dataDelaySuffix = '';

	if ($animation) {
		$aClass = ' class="tbWow fadeIn"';
		$delay = 0;
		$mainDelay = 0.1;
		$dataDelay = ' data-wow-delay="';
		$dataDelaySuffix = 's"';
	}

	$social_link_email = campaign_default_array($campaign_theme_options, 'promo-text-email', FALSE);
	if ($social_link_email && is_email($social_link_email)) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a href="' . esc_url('mailto:' . $social_link_email) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_mail . '"></span></a>';
	}
	
	$social_link_facebook = campaign_default_array($campaign_theme_options, 'promo-text-facebook', FALSE);
	if ($social_link_facebook) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_facebook) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_facebook . '"></span></a>';
	}
	
	$social_link_twitter = campaign_default_array($campaign_theme_options, 'promo-text-twitter', FALSE);
	if ($social_link_twitter) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_twitter) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_twitter . '"></span></a>';
	}
	
	$social_link_instagram = campaign_default_array($campaign_theme_options, 'promo-text-instagram', FALSE);
	if ($social_link_instagram) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_instagram) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_instagram . '"></span></a>';
	}
	
	$social_link_linkedin = campaign_default_array($campaign_theme_options, 'promo-text-linkedin', FALSE);
	if ($social_link_linkedin) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_linkedin) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_linkedin . '"></span></a>';
	}
	
	$social_link_googleplus = campaign_default_array($campaign_theme_options, 'promo-text-googleplus', FALSE);
	if ($social_link_googleplus) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_googleplus) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_googleplus . '"></span></a>';
	}
	
	$social_link_pinterest = campaign_default_array($campaign_theme_options, 'promo-text-pinterest', FALSE);
	if ($social_link_pinterest) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_pinterest) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_pinterest . '"></span></a>';
	}
	
	$social_link_flickr = campaign_default_array($campaign_theme_options, 'promo-text-flickr', FALSE);
	if ($social_link_flickr) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_flickr) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_flickr . '"></span></a>';
	}
	
	$social_link_youtube = campaign_default_array($campaign_theme_options, 'promo-text-youtube', FALSE);
	if ($social_link_youtube) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_youtube) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_youtube . '"></span></a>';
	}
	
	$social_link_vimeo = campaign_default_array($campaign_theme_options, 'promo-text-vimeo', FALSE);
	if ($social_link_vimeo) {
		$delay += $mainDelay;
		$delayE = $dataDelay . $delay . $dataDelaySuffix;
		if (!$delayE) { $delayE = ''; }
		$snb .= '<a target="_blank" href="' . esc_url($social_link_vimeo) . '"' . $aClass . $delayE . '><span aria-hidden="true" class="' . $icon_vimeo . '"></span></a>';
	}
	
	if (trim($snb)) {
		if ($class) {
			$return = "<div $class>$snb";
			$return .= "</div>";
		} else {
			$return = $snb;
		}
		
		return $return;	
	} else {
		return FALSE;
	}
}

endif;

?>