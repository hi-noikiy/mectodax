<?php



/***********************************************************************************/
/**
/* CUSTOM SCRIPTS AND STYLES
**/
/***********************************************************************************/
if (!function_exists('campaign_custom_footer_scripts')) {
	add_action('wp_footer', 'campaign_custom_footer_scripts', 1000);
	do_action('campaign_custom_footer_scripts');
	
	function campaign_custom_footer_scripts() {
	
		global $campaign_theme_options;
		
		// custom js
		$customJS = campaign_default_array($campaign_theme_options, 'custom-js-code', '');
		if (trim($customJS)) {
			echo '<script type="text/javascript">' . esc_js($customJS) . '</script>';
		}

		// Sticky Navigation
		$showStickyNavigation = campaign_default_array($campaign_theme_options, 'sticky-navigation', 1);
		if ($showStickyNavigation) {


		?>
		
		<script>


			var heightHeader = jQuery('#masthead').height();
			heightHeader2 = "-" + (heightHeader + 100);
			heightHeader3 = "-" + (heightHeader + 100);
			var screenRes = jQuery(window).width();

			var not_safari = true;
			if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
				not_safari = false;
			}

			if (screenRes > 991 && not_safari && jQuery('body').hasClass('showStickyNavigation')) {

				/*
				var inview = new Waypoint.Inview({
				  element: jQuery('#masthead')[0],
				  exited: function(direction) {
				    jQuery('#site-branding').addClass('make-it-sticky');
				  },
				  enter: function(direction) {
				    jQuery('#site-branding').removeClass('make-it-sticky');
				  }
				});
				*/


				var waypoint = new Waypoint({
					element: document.getElementById('masthead'),
					handler: function(direction) {
						jQuery('#site-branding').toggleClass('make-it-sticky');
					},
					offset: heightHeader2
				})

				var waypoint = new Waypoint({
					element: document.getElementById('masthead'),
					handler: function(direction) {
						jQuery('#site-branding').toggleClass('put-it-on-screen');
					},
					offset: heightHeader3
				})

			}

/*

			var stickyNavigation = new Waypoint.Sticky({
				element: jQuery('#site-branding')[0],
			});

*/
		
		</script>		
  
		<?php

		}
		
		$useAnimate = campaign_default_array($campaign_theme_options, 'switch-use-animation', 0);
		if ($useAnimate) : 
		?>
		
		<script>
		
			wow = new WOW(
				{
					boxClass: 		'tbWow',
					animateClass: 	'animated',
					offset:       	0,
					mobile:			false
				}
			);
			wow.init();

		</script>		
  
		<?php 
		endif;
		
		$useStickySidebar = campaign_default_array($campaign_theme_options, 'switch-sticky-sidebar', 0);

		if ($useStickySidebar) :

			$stickySidebarMarginTop = 40;

			if (is_user_logged_in()) {
				$stickySidebarMarginTop += 32;
			}

			if ($showStickyNavigation) {
				$stickyNavigationImgMargin = campaign_default_array($campaign_theme_options, 'logo-margins2', 0);
				if ($stickyNavigationImgMargin) {
					$stickyNavigationImgMarginTop = str_replace('px', '', $stickyNavigationImgMargin['margin-top']);
					$stickyNavigationImgMarginBottom = str_replace('px', '', $stickyNavigationImgMargin['margin-bottom']);
				} else {
					$stickyNavigationImgMarginBottom = $stickyNavigationImgMarginTop = 0;
				}

				$stickyNavigationLineHeight = $stickyNavigationImgMarginBottom + $stickyNavigationImgMarginTop;

				$stickyNavigationImgHeight = 0;

				if (campaign_check_val($campaign_theme_options, 'main-logo')) {
					if ($campaign_theme_options['main-logo']['height']) {
						$stickyNavigationImgHeight = ceil($campaign_theme_options['main-logo']['height'] * 0.8);
						$stickyNavigationLineHeight += $stickyNavigationImgHeight;
					}					
				}

				$stickySidebarMarginTop += $stickyNavigationLineHeight;
			}

		?>
		
		<script>
			jQuery(document).ready(function() {

				jQuery('#secondary, .custom-sidebar-widget').theiaStickySidebar({
					// Settings
					additionalMarginTop: <?php echo floor($stickySidebarMarginTop); ?>
				});

			});
		</script>		
  
		<?php
		endif;

		?>

		<?php if (class_exists('WooCommerce') && is_single()) : ?>	
		
		<script>
			jQuery(document).ready(function() {
				if (jQuery('.tb-single-product').hasClass('product-type-variable')) {
					jQuery('.single_add_to_cart_button').addClass('btn').addClass('btn-tb-primary');
				}
			});
		</script>

		<?php endif; ?>

		<?php
	}
}

/**
HEADER
**/
if (!function_exists('campaign_custom_header_scripts')) {
	add_action('wp_head', 'campaign_custom_header_scripts', 1000);
	do_action('campaign_custom_header_scripts');
	
	function campaign_custom_header_scripts() {
	
	global $campaign_theme_options;
	
	echo '<style type="text/css">';

	/**
	Navigation
	**/

	$loadingScreen = 173;
	if (campaign_check_val($campaign_theme_options, 'ls-logo')) {
		$loadingScreen = max(intval($campaign_theme_options['ls-logo']['width']), intval($campaign_theme_options['ls-logo']['width'])) + 30;
	}
	echo "#themeblossom_loading_screen_logo {width: " . $loadingScreen . "px; height: " . $loadingScreen . "px;}";
	echo "#themeblossom_loading_screen_logo .loader_ring {width: " . $loadingScreen . "px; height: " . $loadingScreen . "px; border-radius:  " . $loadingScreen . "px;}";


	$navigationLinkLH = isset($campaign_theme_options['navigation-typography']) ? $campaign_theme_options['navigation-typography']['line-height'] : '100px';
	echo ".primary-navigation ul li:hover > ul {top: $navigationLinkLH" . ";}";

	$navigationLinkFS = isset($campaign_theme_options['navigation-typography']) ? $campaign_theme_options['navigation-typography']['font-size'] : '12px';
	echo ".primary-navigation ul li {font-size: $navigationLinkFS ;}";

	$navigationL1Typo = isset($campaign_theme_options['navigation-link-color-level1']) ? $campaign_theme_options['navigation-link-color-level1']['hover'] : '#fff';
	echo "#primary-navigation > div > ul > li > a:hover, #primary-navigation > div > ul > li:hover > a, #primary-navigation > div > ul > li.current-menu-item > a, #primary-navigation > div > ul > li.current-menu-ancestor > a {color: $navigationL1Typo ; }";

	$navigationL2Typo = isset($campaign_theme_options['navigation-link-color-level2']) ? $campaign_theme_options['navigation-link-color-level2']['hover'] : '#3ebcd8';
	echo "#masthead .primary-navigation .mega-menu ul .current-menu-item a {color: $navigationL2Typo ; }";

	// Sticky Navigation
	$showStickyNavigation = campaign_default_array($campaign_theme_options, 'sticky-navigation', 1);
	if ($showStickyNavigation) {
		$stickyNavigationImgMargin = campaign_default_array($campaign_theme_options, 'logo-margins2', 0);
		if ($stickyNavigationImgMargin) {
			$stickyNavigationImgMarginTop = str_replace('px', '', $stickyNavigationImgMargin['margin-top']);
			$stickyNavigationImgMarginBottom = str_replace('px', '', $stickyNavigationImgMargin['margin-bottom']);
		} else {
			$stickyNavigationImgMarginBottom = $stickyNavigationImgMarginTop = 0;
		}

		$stickyNavigationLineHeight = $stickyNavigationImgMarginBottom + $stickyNavigationImgMarginTop;

		$stickyNavigationImgHeight = 0;

		if (campaign_check_val($campaign_theme_options, 'main-logo')) {
			if ($campaign_theme_options['main-logo']['height']) {
				$stickyNavigationImgHeight = ceil($campaign_theme_options['main-logo']['height'] * 0.8);
				$stickyNavigationLineHeight += $stickyNavigationImgHeight;
			}					
		}

		echo '#site-branding.make-it-sticky #primary-navigation > div > ul > li > a {line-height: ' . $stickyNavigationLineHeight . 'px; }';
		echo '#site-branding.make-it-sticky #main-logo img {max-height: ' . $stickyNavigationImgHeight . 'px; }';
	}

	/**
	Buttons
	**/
	$buttonDefaultBckg = isset($campaign_theme_options['default-button-bckg-color']) ? $campaign_theme_options['default-button-bckg-color']['regular'] : '#D20921';
	$buttonDefaultBckgHover = isset($campaign_theme_options['default-button-bckg-color']) ? $campaign_theme_options['default-button-bckg-color']['hover'] : '#F30A26';

	echo ".btn-tb-primary, #tribe-bar-form .tribe-bar-submit input.btn-tb-primary[type=\"submit\"], .woocommerce .button.btn-tb-primary, .woocommerce a.button.btn-tb-primary {background-color: $buttonDefaultBckg !important; background: $buttonDefaultBckg !important; } .btn-tb-primary:hover, .btn-tb-secondary.current, #tribe-bar-form .tribe-bar-submit input.btn-tb-primary[type=\"submit\"]:hover, .woocommerce .button.btn-tb-primary:hover, .woocommerce a.button.btn-tb-primary:hover {background-color: $buttonDefaultBckgHover !important; background: $buttonDefaultBckgHover !important;}";
	
	$buttonSecondaryBckg = isset($campaign_theme_options['secondary-button-bckg-color']) ? $campaign_theme_options['secondary-button-bckg-color']['regular'] : '#043174';
	$buttonSecondaryBckgHover = isset($campaign_theme_options['secondary-button-bckg-color']) ? $campaign_theme_options['secondary-button-bckg-color']['hover'] : '#053f95';

	echo ".btn-tb-secondary, #tribe-bar-form .tribe-bar-submit input.btn-tb-secondary[type=\"submit\"], .woocommerce .button.btn-tb-secondary, .woocommerce a.button.btn-tb-secondary {background-color: $buttonSecondaryBckg ; background: $buttonSecondaryBckg ; } .btn-tb-secondary:hover, .btn-tb-primary.current, #tribe-bar-form .tribe-bar-submit input.btn-tb-secondary[type=\"submit\"]:hover, .woocommerce .button.btn-tb-secondary:hover, .woocommerce a.button.btn-tb-secondary:hover {background-color: $buttonSecondaryBckgHover !important; background: $buttonSecondaryBckgHover !important;}";
	
	$buttonBorder1Bckg = isset($campaign_theme_options['border-button1-bckg-color']) ? $campaign_theme_options['border-button1-bckg-color']['regular'] : '#D20921';
	$buttonBorder1BckgHover = isset($campaign_theme_options['border-button1-bckg-color']) ? $campaign_theme_options['border-button1-bckg-color']['hover'] : '#FFFFFF';

	echo ".btn-border1 {background-color: $buttonBorder1Bckg ; background: $buttonBorder1Bckg ; } .btn-border1:hover {background-color: $buttonBorder1BckgHover ; background: $buttonBorder1BckgHover ;}";
	
	$buttonBorder2Bckg = isset($campaign_theme_options['border-button2-bckg-color']) ? $campaign_theme_options['border-button2-bckg-color']['regular'] : '#043174';
	$buttonBorder2BckgHover = isset($campaign_theme_options['border-button2-bckg-color']) ? $campaign_theme_options['border-button2-bckg-color']['hover'] : '#FFFFFF';

	echo ".btn-border2 {background-color: $buttonBorder2Bckg ; background: $buttonBorder2Bckg ; } .btn-border2:hover {background-color: $buttonBorder2BckgHover ; background: $buttonBorder2BckgHover ;}";

	/**
	Content
	**/
	
	$dateBoxBckg = isset($campaign_theme_options['date-box-bckg']) ? $campaign_theme_options['date-box-bckg'] : '#00BFF3';
	?>
	
	.featured-image-holder.show-date .date-box {
	    background: <?php echo esc_attr($dateBoxBckg); ?>;
	}

	<?php
	/**
	Newsletter
	**/
	$newsletterBckg = isset($campaign_theme_options['newsletter-submit-bckg']) ? $campaign_theme_options['newsletter-submit-bckg']['regular'] : '#D20921';
	$newsletterBckgHover = isset($campaign_theme_options['newsletter-submit-bckg']) ? $campaign_theme_options['newsletter-submit-bckg']['hover'] : '#F30A26';
	$newsletterBckgActive = isset($campaign_theme_options['newsletter-submit-bckg']) ? $campaign_theme_options['newsletter-submit-bckg']['active'] : '#F30A26';

	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit '  .  "{background-color: $newsletterBckg ; background: $newsletterBckg ; }";
	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit:hover, aside.widget_newsletterwidget input[type="submit"].newsletter-submit:focus '  .  "{background-color: $newsletterBckgHover ; background: $newsletterBckgHover ; }";
	echo 'aside.widget_newsletterwidget input[type="submit"].newsletter-submit:active '  .  "{background-color: $newsletterBckgActive ; background: $newsletterBckgActive ; }";



	/**
	Forms
	**/
	$submitDefaultBckg = isset($campaign_theme_options['default-submit-bckg']) ? $campaign_theme_options['default-submit-bckg']['regular'] : '#D20921';
	$submitDefaultBckgHover = isset($campaign_theme_options['default-submit-bckg']) ? $campaign_theme_options['default-submit-bckg']['hover'] : '#F30A26';
	$submitDefaultBckgActive = isset($campaign_theme_options['default-submit-bckg']) ? $campaign_theme_options['default-submit-bckg']['active'] : '#F30A26';

	echo 'input[type="button"], input[type="reset"], input[type="submit"] '  .  "{background-color: $submitDefaultBckg ; background: $submitDefaultBckg ; }";
	echo 'input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus '  .  "{background-color: $submitDefaultBckgHover ; background: $submitDefaultBckgHover ; }";
	echo 'input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active '  .  "{background-color: $submitDefaultBckgActive ; background: $submitDefaultBckgActive ; }";


	// TYPE 1
	$submitStyle1Bckg = isset($campaign_theme_options['style1-submit-bckg']) ? $campaign_theme_options['style1-submit-bckg']['regular'] : '#D20921';
	$submitStyle1BckgHover = isset($campaign_theme_options['style1-submit-bckg']) ? $campaign_theme_options['style1-submit-bckg']['hover'] : '#F30A26';
	$submitStyle1BckgActive = isset($campaign_theme_options['style1-submit-bckg']) ? $campaign_theme_options['style1-submit-bckg']['active'] : '#F30A26';

	echo '.campaign_form_style1 input[type="button"], .campaign_form_style1 input[type="reset"], .campaign_form_style1 input[type="submit"] '  .  "{background-color: $submitStyle1Bckg ; background: $submitStyle1Bckg ; }";
	echo '.campaign_form_style1 input[type="button"]:hover, .campaign_form_style1 input[type="reset"]:hover, .campaign_form_style1 input[type="submit"]:hover, .campaign_form_style1 input[type="button"]:focus, .campaign_form_style1 input[type="reset"]:focus, .campaign_form_style1 input[type="submit"]:focus '  .  "{background-color: $submitStyle1BckgHover ; background: $submitStyle1BckgHover ; }";
	echo '.campaign_form_style1 input[type="button"]:active, .campaign_form_style1 input[type="reset"]:active, .campaign_form_style1 input[type="submit"]:active '  .  "{background-color: $submitStyle1BckgActive ; background: $submitStyle1BckgActive ; }";

	$inputStyle1Color = isset($campaign_theme_options['style1-input-color']) ? $campaign_theme_options['style1-input-color']['regular'] : '#2A2A2A';
	$inputStyle1ColorHover = isset($campaign_theme_options['style1-input-color']) ? $campaign_theme_options['style1-input-color']['hover'] : '#F9F9F9';
	$inputStyle1Bckg = isset($campaign_theme_options['style1-input-bckg']) ? $campaign_theme_options['style1-input-bckg']['regular'] : '#E0E5EB';
	$inputStyle1BckgHover = isset($campaign_theme_options['style1-input-bckg']) ? $campaign_theme_options['style1-input-bckg']['hover'] : '#043174';

	echo '.campaign_form_style1 .wrap-forms input[type="text"], .campaign_form_style1 .wrap-forms input[type="email"], .campaign_form_style1 .wrap-forms input[type="password"], .campaign_form_style1 .wrap-forms textarea, .campaign_form_style1 .wrap-forms select, .campaign_form_style1 .wrap-forms .selectize-input, .campaign_form_style1 .wrap-forms .selectize-dropdown, .campaign_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable] '  .  "{background-color: $inputStyle1Bckg; background: $inputStyle1Bckg; color: $inputStyle1Color; }";
	echo '.campaign_form_style1 .wrap-forms input[type="text"]:focus, .campaign_form_style1 .wrap-forms input[type="email"]:focus, .campaign_form_style1 .wrap-forms input[type="password"]:focus, .campaign_form_style1 .wrap-forms textarea:focus, .campaign_form_style1 .wrap-forms select, .campaign_form_style1 .wrap-forms .selectize-control.single .selectize-input.input-active, .campaign_form_style1 .wrap-forms .selectize-dropdown, .campaign_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable]:hover,
.campaign_form_style1 .wrap-forms .selectize-control .selectize-dropdown-content > div[data-selectable].selected '  .  "{background-color: $inputStyle1BckgHover; background: $inputStyle1BckgHover; color: $inputStyle1ColorHover; }";

	/**
	Related / Featured Posts
	**/
	$relatedColorR = isset($campaign_theme_options['related-posts-color']) ? $campaign_theme_options['related-posts-color']['regular'] : '#21477F';
	$relatedColorH = isset($campaign_theme_options['related-posts-color']) ? $campaign_theme_options['related-posts-color']['hover'] : '#ffffff';

	$relatedColorLinkR = isset($campaign_theme_options['related-posts-link-color']) ? $campaign_theme_options['related-posts-link-color']['regular'] : '#A02E2F';
	$relatedColorLinkH = isset($campaign_theme_options['related-posts-link-color']) ? $campaign_theme_options['related-posts-link-color']['hover'] : '#ffffff';

	$relatedColorBckgR = isset($campaign_theme_options['related-posts-bckg-color']) ? $campaign_theme_options['related-posts-bckg-color']['regular'] : '#ffffff';
	$relatedColorBckgH = isset($campaign_theme_options['related-posts-bckg-color']) ? $campaign_theme_options['related-posts-bckg-color']['hover'] : '#B60D21';

	/**
	Gallery / Portfolio
	**/
	$portfolioOverlay = isset($campaign_theme_options['portfolio-overlay-bckg-color']) ? $campaign_theme_options['portfolio-overlay-bckg-color'] : '#043174';
	$portfolioOverlayOpacity = isset($campaign_theme_options['portfolio-overlay-opacity']) ? $campaign_theme_options['portfolio-overlay-opacity'] : '0.7';
	$portfolioColor = isset($campaign_theme_options['portfolio-color']) ? $campaign_theme_options['portfolio-color'] : '#ffffff';

	echo ".tb-portfolio-img span {background-color: " . campaign_hex2rgb_output($portfolioOverlay, $portfolioOverlayOpacity) . " ;}";
	echo ".tb-portfolio-img h3, .tb-portfolio-img p {color: $portfolioColor;}";

	/**
	Footer
	**/
	$footerPromoIconsR = isset($campaign_theme_options['footer-promo-link-color']) ? $campaign_theme_options['footer-promo-link-color']['regular'] : '#9BADC7';
	$footerPromoIconsH = isset($campaign_theme_options['footer-promo-link-color']) ? $campaign_theme_options['footer-promo-link-color']['hover'] : '#E1E7EF';

	echo "#footer-promo a {border-color: $footerPromoIconsR ; } #footer-promo a:hover {border-color: $footerPromoIconsH ;}";

	/**
	CUSTOM CSS
	**/
	$customCSS = campaign_default_array($campaign_theme_options, 'custom-css-code', '');
	if ($customCSS) {
		echo esc_attr($customCSS);
	}	
	
	echo '</style>';

	} // campaign_custom_header_scripts

} // exists campaign_custom_header_scripts ?

?>