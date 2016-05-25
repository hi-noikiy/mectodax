<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) && function_exists( 'fw_ext_social_twitter_get_connection' ) && function_exists( 'curl_exec' ) ) {

	class Widget_Twitter extends WP_Widget {

		/**
		 * @internal
		 */
		function __construct() {
			$widget_ops = array( 'description' => 'Twitter Feed' );
			parent::__construct( false, esc_html__( 'Twitter', 'campaign' ), $widget_ops );
		}

		/**
		 * @param array $args
		 * @param array $instance
		 */
		function widget( $args, $instance ) {
			extract( $args );

			$user          = esc_attr( $instance['user'] );
			$title         = esc_attr( $instance['title'] );
			$number        = ( (int) ( esc_attr( $instance['number'] ) ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
			$type_of_widget	= esc_attr( $instance['type_of_widget'] );
			$showAvatar 		= $instance['showAvatar'];
			$border_rad 		= $instance['border_rad'];
			$avatarSize	= esc_attr( $instance['avatarSize'] );

			$widget_id = $args['widget_id'];

			$tweets = get_site_transient( 'scratch_tweets_' . $user . '_' . $number );

			if ( empty( $tweets ) ) {
				/* @var $connection TwitterOAuth */
				$connection = fw_ext_social_twitter_get_connection();
				$tweets     = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $user . "&count=" . $number );
				set_site_transient( 'scratch_tweets_' . $user . '_' . $number, $tweets, 12 * HOUR_IN_SECONDS );
			}

			//wp_enqueue_style('twitter-widget', PARENT_URL . '/inc/widgets/twitter/static/css/style.css', array(), '1.0');

			$view_path = PARENT_DIR . '/inc/widgets/twitter/views/widget.php';
			echo fw_render_view( $view_path, compact( 'before_widget', 'after_widget', 'title', 'tweets', 'number', 'type_of_widget', 'before_title', 'after_title', 'widget_id', 'showAvatar', 'border_rad', 'avatarSize', 'user' ) );
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['user']			= esc_attr( $new_instance['user'] );
			$instance['title']         	= esc_attr( $new_instance['title'] );
			$instance['number']        	= ( (int) ( esc_attr( $new_instance['number'] ) ) > 0 ) ? esc_attr( $new_instance['number'] ) : 5;
			$instance['type_of_widget']	= esc_attr( $new_instance['type_of_widget'] );
			$instance['showAvatar'] 	= $new_instance['showAvatar'];
			$instance['border_rad'] 	= $new_instance['border_rad'];
			$instance['avatarSize']		= esc_attr( $new_instance['avatarSize'] );

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'user' => '', 'number' => '', 'title' => '', 'type_of_widget' => 'regular', 'show_avatar' => true, 'border_rad' => false, 'avatarSize' => 'normal' ) );

			$type_of_widget	= esc_attr( $instance['type_of_widget'] );
			$avatarSize	= esc_attr( $instance['avatarSize'] );

			?>
			<p>
				<label for="<?php echo '' . $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'campaign' ); ?> </label>
				<input type="text" name="<?php echo '' . $this->get_field_name( 'title' ); ?>"
				       value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
				       id="<?php $this->get_field_id( 'title' ); ?>"/>
			</p>
			<p>
				<label for="<?php echo '' . $this->get_field_id( 'user' ); ?>"><?php esc_html_e( 'User', 'campaign' ); ?> :</label>
				<input type="text" name="<?php echo '' . $this->get_field_name( 'user' ); ?>"
				       value="<?php echo esc_attr( $instance['user'] ); ?>" class="widefat"
				       id="<?php $this->get_field_id( 'user' ); ?>"/>
			</p>
			<p>
				<label for="<?php echo '' . $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of tweets', 'campaign' ); ?>
					:</label>
				<input type="text" name="<?php echo '' . $this->get_field_name( 'number' ); ?>"
				       value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat"
				       id="<?php echo '' . $this->get_field_id( 'number' ); ?>"/>
			</p>            
	        <p>
	        	<label for="<?php echo '' . $this->get_field_id('type_of_widget'); ?>"><?php esc_html_e('Type of list:', 'campaign'); ?></label>
				<select class="widefat" name='<?php echo '' . $this->get_field_name('type_of_widget'); ?>' id='<?php echo '' . $this->get_field_id('type_of_widget'); ?>'>
					<option title='Regular' value='regular' <?php if ($type_of_widget == 'regular') {echo ' selected="selected"';} ?>><?php esc_html_e( 'Regular', 'campaign' ); ?></option>
					<option title='Slider' value='slider' <?php if ($type_of_widget == 'slider') {echo ' selected="selected"';} ?>><?php esc_html_e( 'Slider', 'campaign' ); ?></option>
				</select>
	        </p>
			<p>
			    <input class="checkbox" type="checkbox" value="true" <?php checked( ( isset( $instance['showAvatar']) && ($instance['showAvatar'] == "true") ), true ); ?> id="<?php echo '' . $this->get_field_id( 'showAvatar' ); ?>" name="<?php echo '' . $this->get_field_name( 'showAvatar' ); ?>" />
			    <label for="<?php echo '' . $this->get_field_id( 'showAvatar' ); ?>"><?php esc_html_e( 'Display avatar image', 'campaign' ); ?></label>
			</p>
			<p>
			    <input class="checkbox" type="checkbox" value="true" <?php checked( ( isset( $instance['border_rad']) && ($instance['border_rad'] == "true") ), true ); ?> id="<?php echo '' . $this->get_field_id( 'border_rad' ); ?>" name="<?php echo '' . $this->get_field_name( 'border_rad' ); ?>" />
			    <label for="<?php echo '' . $this->get_field_id( 'border_rad' ); ?>"><?php esc_html_e( 'Circular Avatar image', 'campaign' ); ?></label>
			</p>          
	        <p>
	        	<label for="<?php echo '' . $this->get_field_id('avatarSize'); ?>"><?php esc_html_e('Avatar Size:', 'campaign'); ?></label>
				<select class="widefat" name='<?php echo '' . $this->get_field_name('avatarSize'); ?>' id='<?php echo '' . $this->get_field_id('avatarSize'); ?>'>
					<option title='Mini' value='mini' <?php if ($avatarSize == 'mini') {echo ' selected="selected"';} ?>><?php esc_html_e( 'Mini', 'campaign' ); ?></option>
					<option title='Normal' value='normal' <?php if ($avatarSize == 'normal') {echo ' selected="selected"';} ?>><?php esc_html_e( 'Normal', 'campaign' ); ?></option>
					<option title='Bigger' value='bigger' <?php if ($avatarSize == 'bigger') {echo ' selected="selected"';} ?>><?php esc_html_e( 'Bigger', 'campaign' ); ?></option>
				</select>
	        </p>
		<?php
		}
	}

}

if (!function_exists('twitterStatusUrlConverter')) {

/**
*
* twitterStatusUrlConverter
*
* To convert links on a twitter status to a clickable url. Also convert @ to follow link, and # to search
*
* @author: Mardix - http://mardix.wordpress.com, http://www.givemebeats.net
* @date: March 16 2009
* @license: LGPL (I don't care, it's free lol)
*
* @param string : the status
* @param bool : true|false, allow target _blank
* @param int : to truncate a link to max length
* @return String
*
* */
function twitterStatusUrlConverter($status, $targetBlank = true, $linkMaxLen=250){
  
  // The target
  $target=$targetBlank ? " target=\"_blank\" " : "";

    // convert link to url
	$status = preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",'<a href="$0">$0</a>', $status);

    // convert @ to follow
    $status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);

    // convert # to search
    $status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=%23$2\" title=\"Search $1\" $target >$1</a>",$status);

    // return the status
    return $status;
}

}

if (!function_exists('twitter_time_diff')) {
	function twitter_time_diff( $from, $to = '' ) {
	    $diff = human_time_diff($from,$to);
	    $replace = array(
	        ' hour' => 'h',
	        ' hours' => 'h',
	        ' day' => 'd',
	        ' days' => 'd',
	        ' minute' => 'm',
	        ' minutes' => 'm',
	        ' second' => 's',
	        ' seconds' => 's',
	    );
	    return strtr($diff,$replace);
	}
}

?>