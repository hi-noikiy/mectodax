<?php
/**
 * @package Greenback
 */

global $campaign_theme_options; 

$container_type = campaign_default_array($campaign_theme_options, 'container-type', 'wide');

// default settings
$title404 = campaign_default_array($campaign_theme_options, '404-title', 'Página no encontrada');
$message404 = campaign_default_array($campaign_theme_options, '404-message', 'La página que busca fue removida o no está disponible.');
$extra404 = campaign_default_array($campaign_theme_options, '404-extra', 'search');



?>

<article id="404-error-not-found" <?php post_class('col-xs-12'); ?>>
	
	<header class="entry-header">

	<h1 class="entry-title" style="text-align:left !important;color:#000"><?php echo esc_attr( 'Información no encontrada' ); ?></h1>
		
	</header>

	<?php echo apply_filters('the_content', 'La información que busca no existe o ya no está disponible'); ?>

	<?php if ($extra404 == 'search') {
	?>

	<section id="404-search-form" class="margin15">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group has-feedback buscar">
					<form role="search" method="get" id="searchform" class="searchform" action="http://localhost/nutrimenta">			  
						<input type="text" class="form-control" name="s" id="s" aria-describedby="inputSuccess2Status" placeholder="Buscar artículos">
						<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
					</form>
				</div>
			</div>
		</div>
		<!-- <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<p>
				<label class="input-group " style="width: 60%;">
					<span class="screen-reader-text"><?php esc_html_e('Search for:', 'campaign'); ?></span>
					<input type="search" class="search-field form-control" placeholder="<?php esc_html_e('Search', 'campaign'); ?>" value="" name="s" title="<?php esc_html_e('Search for:', 'campaign'); ?>">
				</label>
			</p>
			<p>
				<input type="submit" class="search-submit btn" value="Search">
			</p>		
		</form> -->
	</section>

	<?php
	}
	?>

	<?php
	if ($extra404 == 'latest' || $extra404 == 'random') {

		$args['post_type'] = 'post';

		if ($extra404 == 'random') {
			$args['orderby'] = 'rand';
		}
		
		$customQuery = new WP_Query( $args );
		?>

		<?php if ( $customQuery->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $customQuery->have_posts() ) : $customQuery->the_post(); ?>
			
				<?php				
				
				?>

			<?php endwhile; ?>

		<?php endif;
	}
	?>
	

</article><!-- #post-## -->