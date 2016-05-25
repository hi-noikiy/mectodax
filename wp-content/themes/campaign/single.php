<?php
/**
 * @package campaign
 */

get_header(); ?>

<style type="text/css">
	section#featured-image {display: none;}
	#main {padding: 200px 0 0;}
</style>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12 col-sm-8 col-md-8">
		<div id="content" class="site-content" role="main">			
		<?php	


			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					$category = get_the_category();

					the_title('<h1>', '</h1>');

					echo '<span class="encategoria '.$category[0]->slug.'">';
					echo '<span class="title"><span>'.$category[0]->name.'</span></span>';
					echo '<span class="ico">';

						switch ($category[0]->name) {

							case 'Nutrición':
								echo '<img src="'.get_template_directory_uri ().'/images/ico_nutricion.jpg">';
								break;
							case 'Cocina':
								echo '<img src="'.get_template_directory_uri ().'/images/ico_cocina.jpg">';
								break;
							case 'Patología y Nutrición':
								echo '<img src="'.get_template_directory_uri ().'/images/ico_patologia.jpg">';
								break;
							case 'Bienestar':
								echo '<img src="'.get_template_directory_uri ().'/images/ico_bienestar.jpg">';
								break;

							default:
								
								break;
						}

					echo '</span>';					
					echo '</span>';
					echo '<hr>';				

					the_content();

					

				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar('artrecientes'); ?>
	
	

</div><!-- #main-content -->


<?php get_footer(); ?>
