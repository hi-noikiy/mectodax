<?php
get_header();

global $wp_query;
$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

$taxonomy        = $ext_portfolio_settings['taxonomy_name'];
$term            = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
$term_id         = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
$categories      = fw_ext_portfolio_get_listing_categories( $term_id );

$image = fw_get_db_term_option($term_id, $taxonomy, 'header_image', '');

$listing_classes = fw_ext_portfolio_get_sort_classes( $wp_query->posts, $categories );
$loop_data       = array(
	'settings'        => $ext_portfolio_instance->get_settings(),
	'categories'      => $categories,
	'listing_classes' => $listing_classes
);
set_query_var( 'fw_portfolio_loop_data', $loop_data );
?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content col-xs-12" role="main">


				<header class="entry-header">
					<?php
					if ( ! empty( $term ) ) {
						echo '<h1 class="entry-title">' . $term->name . '</h1>';
					} else {
						echo '<h1 class="entry-title">' . esc_html__( 'Gallery', 'campaign' ) . '</h1>';
					}
					?>
				</header>
				<div class="entry-content row">
						<?php if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();
									include(  fw()->extensions->get( 'portfolio' )->locate_view_path('loop-item') );
								endwhile;
								?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
				</div>
		
				<div class="clear"></div>

				<?php 		
				
				$navigation_choice = campaign_default_array($campaign_theme_options, 'blog-navigation-type', 'paged');			
				$prev_next = campaign_default_array($campaign_theme_options, 'blog-navigation-paginated-prevnext', true);
						
				campaign_navigation($navigation_choice, '', $prev_next);
				?>



		</div>
	</div>
</div>
<?php
unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );
set_query_var( 'fw_portfolio_loop_data', '' );

get_footer();

?>