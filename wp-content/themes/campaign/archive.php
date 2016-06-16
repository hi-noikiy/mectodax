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
						<form role="search" method="get" id="searchform" class="searchform" action="http://localhost/nutrimenta">			  
							<input type="text" class="form-control" name="s" id="s" aria-describedby="inputSuccess2Status" placeholder="Buscar artículos">
						  	<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
						</form>
					</div>
				</div>
			</div>
		
		<div class="row articulos-blog">

		<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>

			<?php
			$postID = intval( get_the_ID() );
			$postLink = get_permalink();
			$postTitle = esc_attr( get_the_title() );
			$post_thumbnail_id = get_post_thumbnail_id();
			$excerpt = get_the_excerpt();
			$category = get_the_category();
			?>
			<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix col-md-4 col-sm-4 col-xs-6"); ?>>
				

				

				<div class="featured-image-holder show-date">
					<div class="tbWow fadeIn" style="visibility: visible; animation-name: fadeIn;">
						<div class="date-box normal <?php echo $category[0]->slug ?>">
							<div>
								<span class="day"><?php echo get_the_date('d'); ?></span>
								<span class="month"><?php echo get_the_date('M'); ?></span>
							</div>
						</div>
						<a href="<?php echo $postLink; ?>">
							<?php echo the_post_thumbnail(); ?>
							<!-- <img src="http://localhost/nutrimenta/wp-content/uploads/2016/05/post3.jpg" width="300" height="300" class=" none" alt="Ensalada de quinoa" title="Ensalada de quinoa"> -->
						</a>
					</div>
				</div>
				
				<div class="c-<?php echo $category[0]->slug ?> text-center">
					<header class="entry-header">
						<span class="categoria"><?php echo get_the_category_thumbnail($category[0]->term_id); ?> <?php echo $category[0]->cat_name; ?></span>
				        <h3 class="entry-title tbWow fadeIn text-center"><?php if(is_sticky()) echo '<i class="fa fa-bookmark-o"></i> '; ?><?php the_title(); ?></h3>
					</header>

				    <div class="entry-content clearfix">
				    	<p>
				        	<?php echo $excerpt; ?>			        
				        </p>
				    </div>
				    <div>
				    	<a class="clearfix" href="<?php echo $postLink; ?>">LEER</a>
				    </div>
				</div>

			</article>

		<?php 
				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		

		<?php	
		
		$navigation_choice = campaign_default_array($campaign_theme_options, 'blog-navigation-type', 'paged');			
		$prev_next = campaign_default_array($campaign_theme_options, 'blog-navigation-paginated-prevnext', true);
				
		campaign_navigation($navigation_choice, '', $prev_next);		

		?>

		</div> <!-- row -->

		</div>


	</div><!-- #primary -->

	<?php //get_sidebar(); ?>
	
</div><!-- #main-content -->

<?php
get_footer();
