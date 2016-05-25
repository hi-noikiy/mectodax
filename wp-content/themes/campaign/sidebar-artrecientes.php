<?php
/**
 * The Sidebar containing the issues widget areas.
 *
 * @package campaign
 */
?>
	<div id="secondary" class="widget-area col-xs-12 col-sm-4 col-md-4" role="complementary">
			<div class="form-group has-feedback buscar">
			 <form role="search" method="get" id="searchform" class="searchform" action="http://localhost/nutrimenta">			  
			  <input type="text" class="form-control" name="s" id="s" aria-describedby="inputSuccess2Status" placeholder="Buscar">
			  <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
			 </form>
			</div>

			<h3>Artículos recientes</h3>

			<?php
			$this_post = $post->ID;

			$args = array(
				
				'post_type' => 'post',
				'posts_per_page' => '3',
				'post__not_in' => array($this_post),
				'cat' => '-1'

				);
			
			query_posts( $args );


			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();
					$excerpt = get_the_excerpt();
					$category = get_the_category();
					
					echo '<div class="post_sidebar '.$category[0]->slug.'">';
					echo '<div class="image">';
					
					echo '<span class="ico">';
					echo get_the_category_thumbnail($category[0]->term_id);
					echo '</span>';
					the_post_thumbnail('thumbnail');

					echo '</div>';
					echo '<div class="texto">';
					echo '<a href="'.get_permalink().'">';
					the_title('<h5>', '</h5>');					
					echo '<p>'.$excerpt.'</p>';
					echo '</a>';
					echo '</div>';
					echo '</div>';
					echo '<hr>';
					

							

				

					

				endwhile;

			else :
				// If no content, include the "No posts found" template.				

			endif;
		?>

		<div>
			<p>
				<a href="<?php echo get_site_url(); ?>/blog">VER TODOS LOS ARTÍCULOS <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
			</p>
			<hr>
		</div>
		
	</div><!-- #secondary -->
