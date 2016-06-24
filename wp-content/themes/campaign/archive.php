<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<style type="text/css">
	section#featured-image {display: none;}
	#main {padding: 200px 0 0;}
</style>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-12">
		<div id="content" class="site-content" role="main">
			<div class="row">
				<div class="col-md-12">
					<?php
						the_archive_title( '<h1 class="entry-title tbWow fadeIn text-center">', '</h1>' );
					?>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cats">
						<?php echo wp_list_categories(array(
							'title_li' => '',
						)); ?>
					</ul>
				</div>
			</div>


			<div class="row">
				<div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8 col-xs-6 col-xs-offset-6 busqueda">
					<div class="form-group has-feedback buscar">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">			  
							<input type="text" class="form-control" name="s" id="s" aria-describedby="inputSuccess2Status" placeholder="Buscar artículos">
						  	<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
						</form>
					</div>
				</div>
			</div>
		
		<div class="row articulos-blog">

		<?php
		if (is_category()) {
			$cat = get_the_category();
			$cualcat = $cat['0']->slug;
			
			echo do_shortcode('[ajax_load_more post_type="post" category="'.$cualcat.'" posts_per_page="6" scroll="false" transition="fade" button_label="Ver más"]');	
		}
		
		?>

		</div> <!-- row -->

		</div>


	</div><!-- #primary -->

	<?php //get_sidebar(); ?>
	
</div><!-- #main-content -->

<?php
get_footer();
