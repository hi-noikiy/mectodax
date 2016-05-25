<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>

<div class="grid_blog">
		

		<?php
    	$args = array('category_name' => 'Cocina', 'post_type' => 'post', 'posts_per_page' => '1');

		$query = new WP_Query( $args );
 
		if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post();

        $category = get_the_category();    
        

        ?>
		 
		 <div class="item-grid">
		    
		                <?php if ( has_post_thumbnail() ) { ?>
		                    
		                        <?php the_post_thumbnail('full'); ?>
		                    
		                <?php } ?>
		    <div class="info bg-<?php echo $category[0]->slug; ?>">

		 		<span class="categoria"><?php echo get_the_category_thumbnail($category[0]->term_id); ?> <?php echo $category[0]->cat_name; ?></span>
		    	<h3 class="nombre_post"><?php the_title(); ?></h3>
		    	<a href="<?php the_permalink(); ?>">LEER</a>
		    </div>
		 </div>

		<?php endwhile; 
 		wp_reset_postdata();
 		else : ?>
 		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
 		<?php endif; ?>

<?php
$image = $atts['image']['url'];
$img_attributes = array(
	'src' => $image,
	'class' => 'image-sola',
);
echo '<div class="item-grid">'.fw_html_tag('img', $img_attributes).'</div>';
?>

 		<?php
    	$args = array('category_name' => 'Patología y Nutrición', 'post_type' => 'post', 'posts_per_page' => '1');

		$query = new WP_Query( $args );
 
		if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post();

        $category = get_the_category();	
        ?>
		 
		 <div class="item-grid">
		    
		                <?php if ( has_post_thumbnail() ) { ?>
		                    
		                        <?php the_post_thumbnail('full'); ?>
		                    
		                <?php } ?>
		    <div class="info bg-<?php echo $category[0]->slug; ?>">
		 		<span class="categoria"><?php echo get_the_category_thumbnail($category[0]->term_id); ?> <?php echo $category[0]->cat_name; ?></span>
		    	<h3 class="nombre_post"><?php the_title(); ?></h3>
		    	<a href="<?php the_permalink(); ?>">LEER</a>
		    </div>
		 </div>

		<?php endwhile; 
 		wp_reset_postdata();
 		else : ?>
 		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
 		<?php endif; ?>

<?php

$image2 = $atts['image2']['url'];
$img_attributes2 = array(
	'src' => $image2,
	'class' => 'image-sola',
);
echo '<div class="item-grid">'.fw_html_tag('img', $img_attributes2).'</div>';

?>

<?php

$image3 = $atts['image3']['url'];
$img_attributes3 = array(
	'src' => $image3,
	'class' => 'image-sola',
);
echo '<div class="item-grid">'.fw_html_tag('img', $img_attributes3).'</div>';

?>

		<?php
    	$args = array('category_name' => 'Bienestar', 'post_type' => 'post', 'posts_per_page' => '1');

		$query = new WP_Query( $args );
 
		if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post();

        $category = get_the_category();	
        ?>
		 
		 <div class="item-grid">
		    
		                <?php if ( has_post_thumbnail() ) { ?>
		                    
		                        <?php the_post_thumbnail('full'); ?>
		                    
		                <?php } ?>
		    <div class="info bg-<?php echo $category[0]->slug; ?>">
		 		<span class="categoria"><?php echo get_the_category_thumbnail($category[0]->term_id); ?> <?php echo $category[0]->cat_name; ?></span>
		    	<h3 class="nombre_post"><?php the_title(); ?></h3>
		    	<a href="<?php the_permalink(); ?>">LEER</a>
		    </div>
		 </div>

		<?php endwhile; 
 		wp_reset_postdata();
 		else : ?>
 		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
 		<?php endif; ?>

<?php

$image4 = $atts['image4']['url'];
$img_attributes4 = array(
	'src' => $image4,
	'class' => 'image-sola',
);
echo '<div class="item-grid">'.fw_html_tag('img', $img_attributes4).'</div>';

?>
		
		<?php
    	$args = array('category_name' => 'Nutrición', 'post_type' => 'post', 'posts_per_page' => '1');

		$query = new WP_Query( $args );
 
		if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post();

        $category = get_the_category();
		
        ?>
		 
		 <div class="item-grid">
		    
		                <?php if ( has_post_thumbnail() ) { ?>
		                    
		                        <?php the_post_thumbnail('full'); ?>
		                    
		                <?php } ?>
		    <div class="info bg-<?php echo $category[0]->slug; ?>">
		    	<?php
		    	
		    	?>
		 		<span class="categoria"><?php echo get_the_category_thumbnail($category[0]->term_id); ?> <?php echo $category[0]->cat_name; ?></span>
		    	<h3 class="nombre_post"><?php the_title(); ?></h3>
		    	<a href="<?php the_permalink(); ?>">LEER</a>
		    </div>
		 </div>

		<?php endwhile; 
 		wp_reset_postdata();
 		else : ?>
 		<!-- <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p> -->
 		<?php endif; ?>


</div>