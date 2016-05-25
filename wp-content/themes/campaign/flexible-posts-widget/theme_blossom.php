<?php
/**
 * Flexible Posts Widget: ThemeBlossom
 * 
 * @since 3.4.0
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo '' . $before_widget;

if ( ! empty( $title ) )
	echo '' . $before_title . $title . $after_title;

if ( $flexible_posts->have_posts() ):
?>

<div class="upw-posts hfeed tb">






	<?php
	while ( $flexible_posts->have_posts() ) : $flexible_posts->the_post();
		global $post; ?>

		<article <?php post_class(); ?>>

			<?php if (current_theme_supports('post-thumbnails') && has_post_thumbnail()) : ?>
			<div class="entry-image tbWow fadeIn hidden-xs hidden-sm" data-wow-delay="0.3s" data-wow-duration="0.8s">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail($thumbsize, array('class' => 'img-rounded')); ?>
				</a>
			</div>
			<?php endif; ?>

			<div class="upw-content <?php if (!has_post_thumbnail()) { echo 'nomargin'; } ?>">

				<?php if (get_the_title()) : ?>

				
				<h4 class="entry-title tbWow fadeIn" data-wow-delay="0.1s">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_title(); ?>
					</a>
				</h4>
				
				<?php endif; ?>

				<div class="entry-summary tbWow fadeIn" data-wow-delay="0.1s">
					<p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
				</div>

			</div>

		</article>

	<?php endwhile; ?>



</div>

<?php	
endif; // End have_posts()
	
echo '' . $after_widget;
