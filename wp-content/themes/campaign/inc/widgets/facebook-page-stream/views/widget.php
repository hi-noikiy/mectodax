<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $posts
 */


echo '' . $before_widget;
echo '' . $before_title . $title . $after_title;

if ($type_of_widget == 'regular') :
?>
	<div class="wrap-facebook <?php if ($showAvatar) echo 'facebook-show-avatar '; if ($border_rad) echo 'facebook-circle-avatar'; ?>">
		<ul>
			<?php

			foreach ( $posts as $post ) {

				$time_array = explode('+', $post->created_time);
				$time = date_parse(str_replace('T', ' ', $time_array[0]));
				$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);

				$post_linkA = $post->actions;
				$post_link = $post_linkA[0]->link;

		    	?>

				<li>
					<?php
					if ($showAvatar && $post->picture) {
						$avatar = $post->picture;

						echo '<div class="absolutecenter-top"><div class="facebook_avatar hidden-xs tbWow fadeIn">';

						if ($border_rad) {
							$imgClass = ' class="img-circle" ';
						} else {
							$imgClass = ' class="img-rounded" ';
						}

						echo '<a target="_blank" href="' . esc_url($post_link) . '"><img alt="" src="' . esc_html($avatar) . '"' . $imgClass . '></a>';
						echo '</div><div>';
					}
					?>
				
					<div class="facebook_data">
						<?php echo '' . esc_html($post->message); ?>
						<br><br><a target="_blank" href="<?php echo esc_url($post_link); ?>"><?php echo esc_html__('Read more &raquo;', 'campaign'); ?></a>
					</div>
				
					<div class="facebook_time tbWow fadeIn"><?php echo twitter_time_diff($uTime, current_time('timestamp')); ?> ago</div>

					<?php
					if ($showAvatar && $post->picture) {
						echo '</div></div>';
					}
					?>
				</li>

				<?php
			}

			?>
		</ul>
	</div>

<?php else :

wp_enqueue_style( 'flexslider', PARENT_URL . '/inc/css/flexslider.css' );
wp_enqueue_script('flexslider', PARENT_URL . "/inc/js/jquery.flexslider-min.js", false, '2.2.2', false);

?>
	<div class="wrap-facebook flexslider <?php if ($showAvatar) echo 'facebook-show-avatar '; if ($border_rad) echo 'facebook-circle-avatar'; ?>">
		<ul class="slides">
			<?php

			foreach ( $posts as $post ) {

				$time_array = explode('+', $post->created_time);
				$time = date_parse(str_replace('T', ' ', $time_array[0]));
				$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);

				$post_link = $post->link;

		    	?>

				<li>
					<?php
					if ($showAvatar && $post->picture) {
						$avatar = $post->picture;

						echo '<div class="absolutecenter-top"><div class="facebook_avatar hidden-xs">';

						if ($border_rad) {
							$imgClass = ' class="img-circle" ';
						} else {
							$imgClass = ' class="img-rounded" ';
						}

						echo '<a target="_blank" href="' . esc_url($post_link) . '"><img alt="" src="' . esc_html($avatar) . '"' . $imgClass . '></a>';
						echo '</div><div>';
					}
					?>
				
					<div class="facebook_data">
						<?php echo '' . esc_html($post->message); ?>
						<br><br><a target="_blank" href="<?php echo esc_url($post_link); ?>"><?php echo esc_html__('Read more &raquo;', 'campaign'); ?></a>
					</div>
				
					<div class="facebook_time tbWow fadeIn"><?php echo twitter_time_diff($uTime, current_time('timestamp')); ?> ago</div>

					<?php
					if ($showAvatar && $post->picture) {
						echo '</div></div>';
					}
					?>
				</li>

				<?php
			}
			?>
		</ul>
	</div>

	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#<?php echo esc_attr($widget_id); ?> .flexslider').flexslider({
			animation: "fade",
			animationLoop: true,
			directionNav: false,
			controlNav: false,
		});
	});
	</script>
<?php endif; ?>

<?php echo '' . $after_widget ?>