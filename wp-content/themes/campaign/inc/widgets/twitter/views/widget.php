<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $tweets
 */

echo str_replace( 'class="', 'class="widget_twitter_tweets ', $before_widget );
echo str_replace( 'class="', 'class="widget_twitter_tweets ', $before_title );
echo "$title";
echo "$after_title";

if ($type_of_widget == 'regular') :
?>
	<div class="wrap-twitter">
		<ul>
			<?php

			if ($avatarSize != 'original') {
				$avatarSize = '_' . $avatarSize;
			}

			foreach ( $tweets as $tweet ) {
				
		    	$time = date_parse($tweet->created_at);
		    	$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);

		    	?>

				<li>
					<?php
					if ($showAvatar) {
						$avatar = $tweet->user->profile_image_url;

						$avatar = str_replace('_normal', $avatarSize, $avatar);

						echo '<div class="absolutecenter-stretch"><div class="hidden-xs hidden-sm tweet_avatar tweet_avatar' . $avatarSize . ' tbWow fadeIn">';

						if ($border_rad) {
							$imgClass = ' class="img-circle" ';
						} else {
							$imgClass = ' class="img-rounded" ';
						}

						echo '<a class="hidden-xs hidden-sm" href="https://twitter.com/' . $user . '"><img alt="' . $user . ' on Twitter" src="' . $avatar . '"' . $imgClass . '></a>';
						echo '</div><div>';
					}
					?>
					<div class="tweet_data tbWow fadeIn"><?php echo twitterStatusUrlConverter($tweet->text); ?></div>
					<div class="tweet_time tbWow fadeIn"><?php echo twitter_time_diff($uTime, current_time('timestamp')); ?> ago</div>

					<?php
					if ($showAvatar) {
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
	<div class="wrap-twitter flexslider">
		<ul class="slides">
			<?php

			if ($avatarSize != 'original') {
				$avatarSize = '_' . $avatarSize;
			}

			foreach ( $tweets as $tweet ) {
				
		    	$time = date_parse($tweet->created_at);
		    	$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);

		    	?>

				<li>
					<?php
					if ($showAvatar) {
						$avatar = $tweet->user->profile_image_url;
						$avatar = str_replace('_normal', $avatarSize, $avatar);

						echo '<div class="absolutecenter-stretch"><div class="hidden-xs tweet_avatar tweet_avatar' . $avatarSize . '">';

						if ($border_rad) {
							$imgClass = ' class="img-circle" ';
						} else {
							$imgClass = ' class="img-rounded" ';
						}

						echo '<a class="hidden-xs" href="https://twitter.com/' . $user . '"><img src="' . $avatar . '"' . $imgClass . '></a>';
						echo '</div><div>';
					}
					?>
					<div class="tweet_data"><?php echo twitterStatusUrlConverter($tweet->text); ?></div>
					<div class="tweet_time"><?php echo twitter_time_diff($uTime, current_time('timestamp')); ?> ago</div>

					<?php
					if ($showAvatar) {
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
<?php echo "$after_widget"; ?>