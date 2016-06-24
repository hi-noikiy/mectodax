<?php
/**
 * @package campaign
 * 
 * Template Name: Blog
 */

get_header(); 

global $campaign_theme_options;

$layoutClass = "col-xs-12 col-sm-12 col-md-12";

$post_id = get_the_id();
$main_post_meta = fw_get_db_post_option($post_id);

$selected_categories = campaign_default_array($main_post_meta, 'page_select_categories', '');

if (!empty($selected_categories)) {
	$main_cat = implode(',', $selected_categories);
} else {
	$main_cat = -1;
}

?>
<style type="text/css">
	section#featured-image {display: none;}
	#main {padding: 200px 0 0;}
</style>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area <?php echo esc_attr($layoutClass); ?>">

		<div id="content" class="site-content" role="main">

		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><?php printf( __( 'Resultados para: %s', 'campaign' ), get_search_query() ); ?> </h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 col-md-offset-8">
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
			$keyword = $_GET['s'];
			echo do_shortcode('[ajax_load_more post_type="post" search="'.$keyword.'" posts_per_page="6" scroll="false" transition="fade" button_label="Ver más"]');
		?>

			</div> <!-- row -->

		</div>


	</div><!-- #primary -->

	<?php 
	//get_sidebar();
	?>
			
</div><!-- #main -->

<?php get_footer(); ?>