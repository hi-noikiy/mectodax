<?php
$postID = intval( get_the_ID() );
			$postLink = get_permalink();
			$postTitle = esc_attr( get_the_title() );
			$post_thumbnail_id = get_post_thumbnail_id();
			$excerpt = get_the_excerpt();
			$category = get_the_category();
			$num = $alm_found_posts;

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
