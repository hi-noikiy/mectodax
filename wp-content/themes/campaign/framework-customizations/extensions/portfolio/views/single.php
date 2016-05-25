<?php
/**
 * @package campaign
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area col-xs-12">
		<div id="content" class="site-content" role="main">
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

				$postID = intval( get_the_ID() );
				$postLink = get_permalink();
				$postTitle = get_the_title();

				$this_post_meta = fw_get_db_post_option($postID);

				$show_video = (isset($this_post_meta['video_switch']) && !empty($this_post_meta['video_switch'])) ? $this_post_meta['video_switch'] : 'no';
				$video_url = (isset($this_post_meta['video_url']) && !empty($this_post_meta['video_url'])) ? $this_post_meta['video_url'] : '';

				?>
				<article id="post-<?php echo intval($postID); ?>" <?php post_class("post clearfix"); ?>>
					<header class="entry-header">
				        <h1 class="entry-title tbWow fadeIn"><?php the_title(); ?></h1>
					</header>

				    <div class="entry-content clearfix">
				        <?php the_content(); ?>
					

					<div id="tb-portfolio" class="row">

				    <?php

					$popup_video = '';

					if ($show_video != 'no' && !empty($video_url)) { // show video

						?>

				        <div class="col-xs-12">

				        <?php

						echo apply_filters('the_content', esc_url($video_url) );

						?>

				        </div>
				        
				        <?php

					} else { // show gallery

						$thumbnails = fw_ext_portfolio_get_gallery_images();

						if (!empty($thumbnails)) :

						$class = " col-xs-12 col-sm-3 tbWow fadeIn ";
						$delay = 0;

						?>
							

						<?php

						foreach ($thumbnails as $thumbnail) :

							if ($delay > 1) {
								$delay = 0;
							}

							$attachment_id = $thumbnail["attachment_id"];
							$attachment_url = $thumbnail["url"];

							$thumb_to_show = wp_get_attachment_image_src( $attachment_id, 'campaign-thumb-xl' );

						?>

				        <div class="tb-single-image tb-single-image-icon gallery-icon <?php echo esc_attr($class); ?>" <?php if ($delay) {echo ' data-wow-delay="' . esc_attr($delay) . 's" ';} ?>>
				            <a class="tb-single-image-wrap" href="<?php echo esc_url($attachment_url); ?>"
				                data-rel="prettyPhoto[gallery<?php echo intval($postID); ?>]">
				                <img src="<?php echo esc_url($thumb_to_show[0]); ?>">
				                <i class="tb-icon-zoom"></i>
				            </a>
				        </div>
				        
				        <?php

				        $delay += 0.3;

				        endforeach;

			        ?>

					<?php
					endif; // thumbnails exist

			    	} // show gallery
				    ?>

					</div> <!-- #tb-portfolio -->
				    
				    </div>
				</article>
				<?php


				endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer(); ?>
