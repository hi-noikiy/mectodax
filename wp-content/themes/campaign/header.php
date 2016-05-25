<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->


<?php

// create a global variable
global $campaign_theme_options;

?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri (); ?>/inc/css/ed.css">

	<?php

	if (function_exists('wp_site_icon') && has_site_icon()) {
		wp_site_icon();
	} else {

		$favicon = isset($campaign_theme_options['favicon']['url']) ? $campaign_theme_options['favicon']['url'] : '';
		if ($favicon) {
		?>
		<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>">
		<?php
		}

		$apple_touch_icon = isset($campaign_theme_options['apple_touch_icon']['url']) ? $campaign_theme_options['favicon']['url'] : '';
		if ($apple_touch_icon) {
		?>
		<link rel="apple-touch-icon" href="<?php echo esc_url($apple_touch_icon); ?>">
		<?php
		}

	}
	?>

	<?php if (is_page('contacto')) { ?>
			<style type="text/css">
				#footer-navigation {
				    margin-top: 0px !important;
				}
			</style>
	<?php } ?> 
	

	<?php wp_head(); ?>
</head>

<?php

$body_class = '';

$animate = campaign_default_array($campaign_theme_options, 'switch-use-animation', 0);
if ($animate) {
	$body_class .= " animation-effect";
}

$usePrettyPhoto = campaign_default_array($campaign_theme_options, 'switch-use-prettyPhoto', 1);
if ($usePrettyPhoto) {
	$body_class .= ' usePrettyPhoto';
}

$showStickyNavigation = campaign_default_array($campaign_theme_options, 'sticky-navigation', 1);
if ($showStickyNavigation) {
	$body_class .= ' showStickyNavigation';
}

?>

<body <?php body_class( $body_class ); ?>>


<?php
$showLoadingScreen = campaign_default_array($campaign_theme_options, 'show-loading-screen', 1);
if ($showLoadingScreen) {
	?>

	<div id="themeblossom_loading_screen" class="pace absolutecenter">
		<div id="themeblossom_loading_screen_logo">

		<div class="loader_ring"></div>

		<?php

		if (campaign_check_val($campaign_theme_options, 'ls-logo')) {
			if ($campaign_theme_options['ls-logo']['url']) {
				echo '<img src="' . esc_url($campaign_theme_options['ls-logo']['url']) . '"  width="' . intval($campaign_theme_options['ls-logo']['width']) . 'px;">';
			}					
		}

		?>		

		</div>
	</div>

	<?php
}
?>

<?php if (has_nav_menu( 'contribute' )) : ?>
<div id="overlay-menu" class="hidden-xs">
	<div id="overlay-menu-trigger"><i class="icon-cross"></i></div>

	<div class="absolutecenter">
		<div id="overlay-menu-holder">
			<?php wp_nav_menu( array( 'theme_location' => 'contribute', 'menu_class' => 'overlay-menu absolutecenter', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header">

		<?php
		$showPromoLine = campaign_default_array($campaign_theme_options, 'switch-promo', 0);

		if ($showPromoLine) { ?>
	
		<div id="promo">
			<div class="container">

			<div class="row">

			<div class="col-xs-12 col-sm-6">
					
			<?php

			$promoLeft = campaign_default_array($campaign_theme_options, 'header-promo-left', 'menu');

			if ($promoLeft == 'menu') {
				wp_nav_menu( array( 'theme_location' => 'top_menu', 'menu_class' => 'top-nav-menu' ) );
			}

			if ($promoLeft == 'text') {
				$promoLeftText = campaign_default_array($campaign_theme_options, 'header-promo-text', '');
				if (trim($promoLeftText)) {
					echo esc_attr( $promoLeftText );
				}
			}

			?>

			</div>
			
			<div class="col-xs-12 col-sm-6">

			<?php
			$promoRight = campaign_default_array($campaign_theme_options, 'header-promo-right', 'icons');

			if ($promoRight != 'hide') {
				echo '<div class="alignright">';
				echo campaign_social_buttons('', 2);
			}

			if ($promoRight == 'search') { ?>

			<a href="#search-container" class="search-button hidden-xs"><span class="icon-search"></span></a>

			<?php
			}


			if ($promoRight != 'hide') {
				echo '</div>';
			}
			?>

			</div>

			<?php if ($promoRight == 'search') { ?>
			<div id="search-container" class="search-box-wrapper">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
			<?php } ?>

			</div>
			
			</div>
		</div>

		<?php
		}
		?>
		<div id="site-branding" class="header-main">

			<div class="container">

			<h1 class="site-title" id="main-logo">

				<a id="main-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

				<?php
				$logoC = false;

				if (campaign_check_val($campaign_theme_options, 'main-logo')) {
					if ($campaign_theme_options['main-logo']['url']) {
						echo '<img src="' . esc_url($campaign_theme_options['main-logo']['url']) . '" alt="' . get_option( 'blogname' ) . '">';
						$logoC = true;
					}					
				}

				if (!$logoC && campaign_check_val($campaign_theme_options, 'text-logo')) {
					if ($campaign_theme_options['text-logo']) {
						echo esc_attr( $campaign_theme_options['text-logo'] );
						$logoC = true;
					}
				}

				if (!$logoC) {
					echo get_option( 'blogname' );
				}
				?>
				</a>

			</h1>

			<nav id="primary-navigation" class="site-navigation primary-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu','items_wrap' => '<ul class="nav navbar-nav">%3$s
					<li class="soc">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="soc">
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="soc">
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                	</ul>' ) ); ?>
			</nav>
			
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if (is_page_template('page-templates/visual-builder-template.php')) : ?>

	<?php
		if (is_front_page()) {
			echo do_shortcode('[rev_slider alias="home"]');
		}	
	?>	

	<div id="main" class="site-main nopadding">

	<?php else : ?>

	<?php

	$this_post_promo_image = $this_post_promo_url = 0;

	if (is_single() || is_page()) {

		$this_post_id = get_the_id();
		$this_post_meta = fw_get_db_post_option($this_post_id);

		$this_post_promo_image = isset($this_post_meta['header_image']) ? $this_post_meta['header_image'] : '';
	}

	if (is_archive()) {
		if (is_tax('fw-portfolio-category')) {
			$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
			$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

			$taxonomy        = $ext_portfolio_settings['taxonomy_name'];
			$term            = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
			$term_id         = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;

			$this_post_promo_image = fw_get_db_term_option($term_id, $taxonomy, 'header_image', '');
		}
	}

	$featuredImage = isset($campaign_theme_options['featured-image']) ? $campaign_theme_options['featured-image'] : array();

	$featuredImageHeight = isset($campaign_theme_options['featured-image-height']['height']) ? $campaign_theme_options['featured-image-height']['height'] : '136';

	$featuredSpecialClass = '';

	if (class_exists('WooCommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		$featuredImageHeightShop = isset($campaign_theme_options['woocommerce-featured-image-height']['height']) ? $campaign_theme_options['woocommerce-featured-image-height']['height'] : '136';
		if ($featuredImageHeightShop) {
			$featuredImageHeight = $featuredImageHeightShop;
			$featuredSpecialClass = ' onshop ';
		}
	}

	if (defined('THEMEBLOSSOM_ISSUES_CPT') && (is_singular(THEMEBLOSSOM_ISSUES_CPT) || is_post_type_archive(THEMEBLOSSOM_ISSUES_CPT))) {
		$featuredImageHeightIssues = isset($campaign_theme_options['issues-featured-image-height']['height']) ? $campaign_theme_options['issues-featured-image-height']['height'] : '136';
		if ($featuredImageHeightIssues) {
			$featuredImageHeight = $featuredImageHeightIssues;
			$featuredSpecialClass = ' onissues ';
		}		
	}

	if ( function_exists('tribe_is_event') && ( tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' )) ) {
		$featuredImageHeightEvents = isset($campaign_theme_options['events-featured-image-height']['height']) ? $campaign_theme_options['events-featured-image-height']['height'] : '136';
		if ($featuredImageHeightEvents) {
			$featuredImageHeight = $featuredImageHeightEvents;
			$featuredSpecialClass = ' onevents ';
		}		
	}

	$featured_image_style = '';

	if ((isset($this_post_promo_image) && !empty($this_post_promo_image) && $this_post_promo_image) || (!empty($featuredImage))) {

		if ($this_post_promo_image) {
			$this_post_promo_url = $this_post_promo_image['url'];	
		}

		if ($this_post_promo_url) :
			$this_post_promo_height = str_replace('px', '', $this_post_meta['featured_height']);

			$featured_image_style = ' style="';

			$featured_image_style .= 'background-image: url(' . esc_url($this_post_promo_url) .');';

			if (isset($this_post_promo_height) && !empty($this_post_promo_height) && intval($this_post_promo_height) != $featuredImageHeight ) {
				$featuredImageHeight = intval($this_post_promo_height) . 'px';
				$featured_image_style .= 'height: ' . $featuredImageHeight . ';';
			}

			$featured_image_style .= '" ';
		endif;
	
	if ($featuredImageHeight != '0px') {
		echo '<section id="featured-image" class="hidden-xs ' . $featuredSpecialClass . '"' . $featured_image_style . '><div class="container absolutecenter-left"><div class="featured-titles">';

		if (isset($this_post_meta['featured_subtitle']) && !empty($this_post_meta['featured_subtitle'])) {
			echo "<h3>" . $this_post_meta['featured_subtitle'] . "</h3>";
		}

		if (isset($this_post_meta['featured_title']) && !empty($this_post_meta['featured_title'])) {
			echo "<h2>" . $this_post_meta['featured_title'] . "</h2>";
		}

		echo '</div></div></section>';
	}

	} // there is a header image

	?>

	<?php
	if (is_home() || is_front_page() || is_page_template('page-templates/visual-builder-template.php') || !function_exists('yoast_breadcrumb') ) :
		$showBreadcrumbs = 0;
	else :
		$showBreadcrumbs = campaign_default_array($campaign_theme_options, 'show-breadcrumbs', 1);
	endif;

	if ($showBreadcrumbs) :

	$breadcrumbsType = 0;

	$showPrevNext = campaign_default_array($campaign_theme_options, 'show-breadcrumbs-prevnext', 1);

	if (function_exists('yoast_breadcrumb')) {
		$breadcrumbsType = 'normal';
	}

	if ( function_exists('is_woocommerce') && is_woocommerce() ) {
		$breadcrumbsType = 'woocommerce';
	}

	if (function_exists('tribe_is_event') && tribe_is_event()) {
		$breadcrumbsType = 'tribe-event';
	}

	if ( function_exists('tribe_is_upcoming') && ( tribe_is_upcoming() || tribe_is_past() || tribe_is_day() || tribe_is_month() ) ) {
		$breadcrumbsType = 'tribe-events';
	}

	if ($breadcrumbsType) :
	?>
	
	<div id="breadcrumbs">
		<div class="container">

		<?php
		
		if ($breadcrumbsType == 'woocommerce') {
			woocommerce_breadcrumb();
		}
		
		if ($breadcrumbsType == 'normal') {
			yoast_breadcrumb('<nav class="breadcrumbs alignleft" itemprop="breadcrumb">', '</nav>');

			if ($showPrevNext && (
						is_singular('post')
						|| (is_singular('fw-portfolio'))
						|| (is_singular('issue'))
					)
				) :

				$next_post = get_next_post();
				$prev_post = get_previous_post();

				if (!empty($next_post) || !empty($prev_post)) :
		?>

				<nav class="prevnext alignright">
					<ul>
						<?php if (!empty($prev_post)) : ?>
						<li>&laquo; <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"><?php echo esc_attr($prev_post->post_title); ?></a></li>
						<?php endif; ?>

						<?php if (!empty($next_post)) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a> &raquo;</li>
						<?php endif; ?>
					</ul>
				</nav>

		<?php
				endif; // prev/next exists

			endif; // show prev/next
		}

		if ($breadcrumbsType == 'tribe-events') {
			echo '<nav class="breadcrumbs tec-breadcrumbs alignleft" itemprop="breadcrumb"><a href="' . esc_url( home_url() ) . '"  rel="v:url" property="v:title">' . esc_html__('Home', 'campaign') . '</a> &raquo ' . esc_html__('Events', 'campaign') . '</nav>';
		}

		if ($breadcrumbsType == 'tribe-event') {
			echo campaign_yoast_breadcrumbs_tec('<nav class="breadcrumbs tec-breadcrumbs alignleft" itemprop="breadcrumb">', '</nav>', yoast_breadcrumb('', '', false));

			if ($showPrevNext) :
		?>

			<nav class="prevnext alignright">
				<ul>
					<?php if ( tribe_get_prev_event_link() ) : ?>
						<li>&laquo; <?php tribe_the_prev_event_link( '%title%' ) ?></li>
					<?php endif; ?>

					<?php if ( tribe_get_next_event_link() ) : ?>
						<li><?php tribe_the_next_event_link( '%title%' ) ?> &raquo;</li>
					<?php endif; ?>
				</ul>
			</nav>

		<?php

			endif; // show prev/next
		
		}

		?>
		
		</div>

	</div>

	<?php
	endif; // if breadcrumbs function exists

	endif; // if breadcrumbs
	?>

	<div id="main" class="site-main">

		<div class="container">
		
			<div class="row">
	<?php endif; // not visual builder ?>