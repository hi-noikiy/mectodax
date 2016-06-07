<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */

?>

	<?php if (is_page_template('page-templates/visual-builder-template.php')) : ?>

	</div><!-- #main -->

	<?php else : ?>
			</div>
		</div>
	</div><!-- #main -->
	<?php endif; ?>


		

<?php

global $campaign_theme_options;

$showFooterPromoLine = campaign_default_array($campaign_theme_options, 'switch-promo-footer', 1);

if ($showFooterPromoLine) :

	if (campaign_social_buttons()) :
?>

		<footer id="footer-promo">
			<div class="container">
			<?php echo campaign_social_buttons('', 1, 1); // validated in appropriate function ?>
			</div>
		</footer>

<?php
	endif; // if there are social buttons
endif; // footer promo
?>

<?php
$showFooterTwitterWidget = campaign_default_array($campaign_theme_options, 'switch-footer-wide', 0);

if ($showFooterTwitterWidget && is_active_sidebar( 'footer-wide' )) :
?>

		<footer id="wide-footer">
			<div class="container">
				<?php
				
				dynamic_sidebar( 'footer-wide' );

				?>
			</div>
		</footer>

<?php
endif; // footer promo
?>

<?php
$footerColumns = campaign_default_array($campaign_theme_options, 'footer-widgets', '4cols');
if ($footerColumns != 'no') :
	$footerClass = ' col-sm-3 ';

	if ($footerColumns == '3cols') {
		$footerClass = ' col-sm-4 ';
	}

	$numberOfFooterCols = intval(str_replace('cols', '', $footerColumns));

	$footerClass .= ' col-xs-12 ';

	$footerWidgetExists = 0;

	$footerColumnsCounter = 1;

	while ($footerColumnsCounter <= $numberOfFooterCols) {
		$widgetArea = 'footer' . $footerColumnsCounter;

		if (is_active_sidebar($widgetArea )) :
			$footerWidgetExists = 1;
			break;
		endif;

		$footerColumnsCounter++;
	}

	if ($footerWidgetExists) :
	?>
	<footer id="main-footer" class="site-footer">
		<div class="container">
			<div class="row">
	<?php
	endif;

	$footerColumnsCounter = 1;

	while ($footerColumnsCounter <= $numberOfFooterCols) {
		$widgetArea = 'footer' . $footerColumnsCounter;

		if (is_active_sidebar($widgetArea )) :
			echo '<div class="' . $footerClass . '">';
			dynamic_sidebar($widgetArea);
			echo '</div>';
		endif;

		$footerColumnsCounter++;
	}

	if ($footerWidgetExists) :
	?>
			</div>
		</div>
	</footer>
	<?php
	endif;


endif;
?>


	
		<footer id="footer-navigation">
		
			<div class="container">
			
			<div class="row">

			<div class="disclaimer-area col-xs-12 col-sm-8 col-md-10">
			
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_navigation', 'depth' => 1, 'fallback_cb' => false ) ); ?>
			</nav>

			<div class="clear"></div>

			<div class="clear">
				<span>Nutrimentta © 2016. Derechos reservados.</span> <span><a href="<?php echo get_site_url(); ?>/aviso-de-privacidad">Aviso de privacidad</a></span> <span>Diseño: <a href="http://estrategasdigitales.com/" target="_blank">Estrategas Digitales</a></span>
				<?php
				// $footerText = campaign_default_array($campaign_theme_options, 'footer-text', '');
				// if ($footerText) {
				// 	echo apply_filters( 'the_content', $footerText);
				// }
				?>
			</div>

			</div>

			<div class="col-xs-12 col-sm-4 col-md-2">

			<?php
			$emptyArray = array();
			$footerLogoFile = campaign_default_array($campaign_theme_options, 'footer-logo', $emptyArray);

			if (!empty($footerLogoFile) && campaign_default_array($footerLogoFile, 'url', '')) :
			?>
			<h2 id="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $footerLogoFile["url"] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></h2>
			<?php endif; ?>
		
			</div>

			</div>
			
			</div>
			
		</footer>

	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
