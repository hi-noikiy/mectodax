<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
if ( defined( 'FW' ) ) {
	$fw_social_facebook = fw()->extensions->get( 'social-facebook' );
	if ( ! empty( $fw_social_facebook ) ) {

		class Widget_Facebook_Page_Stream extends WP_Widget {

			/**
			 * @internal
			 */
			function __construct() {
				$widget_ops = array( 'description' => 'Page Steam' );
				parent::__construct( false, esc_html__( 'Facebook', 'campaign' ), $widget_ops );
			}

			/**
			 * @param array $args
			 * @param array $instance
			 */
			function widget( $args, $instance ) {
				extract( $args );

				$title         = esc_attr( $instance['title'] );
				$page_id       = esc_attr( $instance['page_id'] );
				$number        = ( (int) ( esc_attr( $instance['number'] ) ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
				$type_of_widget	= esc_attr( $instance['type_of_widget'] );
				$showAvatar 		= $instance['showAvatar'];
				$border_rad 		= $instance['border_rad'];
				$before_widget = str_replace( 'class="', 'class="widget_facebook_page_stream ', $before_widget );
				$before_title         = str_replace( 'class="', 'class="widget_facebook_page_stream ', $before_title );

				$widget_id = $args['widget_id'];

				$result = fw_ext_social_facebook_graph_api_explorer( 'GET', $page_id, array( 'fields' => 'posts.limit(' . $number . '){created_time,message,from,link,actions,picture}' ), false );

				$result = json_decode( $result );
				if ( ! empty( $result->posts->data ) ) {
					$posts     = $result->posts->data;

					//wp_enqueue_style('facebook-widget', PARENT_URL . '/inc/widgets/facebook-page-stream/static/css/style.css', array(), '1.0');

					$view_path = PARENT_DIR . '/inc/widgets/facebook-page-stream/views/widget.php';
					echo fw_render_view( $view_path, compact( 'before_widget', 'after_widget', 'title', 'posts', 'number', 'type_of_widget', 'before_title', 'after_title', 'widget_id', 'showAvatar', 'border_rad' ) );
				}
			}

			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;

				$instance['page_id']			= esc_attr( $new_instance['page_id'] );
				$instance['title']         	= esc_attr( $new_instance['title'] );
				$instance['number']        	= ( (int) ( esc_attr( $new_instance['number'] ) ) > 0 ) ? esc_attr( $new_instance['number'] ) : 5;
				$instance['type_of_widget']	= esc_attr( $new_instance['type_of_widget'] );
				$instance['showAvatar'] 	= $new_instance['showAvatar'];
				$instance['border_rad'] 	= $new_instance['border_rad'];
				$instance['avatarSize']		= esc_attr( $new_instance['avatarSize'] );

				return $instance;
			}

			function form( $instance ) {
				$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'page_id' => '', 'number' => '', 'type_of_widget' => 'regular', 'show_avatar' => true, 'border_rad' => false ) );

				
				$type_of_widget	= esc_attr( $instance['type_of_widget'] );

				?>
				<p>
					<label
						for="<?php echo '' . $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'campaign' ); ?> </label>
					<input type="text" name="<?php echo '' . $this->get_field_name( 'title' ); ?>"
					       value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
					       id="<?php $this->get_field_id( 'title' ); ?>"/>
				</p>
				<p>
					<label
						for="<?php echo '' . $this->get_field_id( 'page_id' ); ?>"><?php esc_html_e( 'Page ID:', 'campaign' ); ?> </label>
					<input type="text" name="<?php echo '' . $this->get_field_name( 'page_id' ); ?>"
					       value="<?php echo esc_attr( $instance['page_id'] ); ?>" class="widefat"
					       id="<?php $this->get_field_id( 'page_id' ); ?>"/>
				</p>
				<p>
					<label
						for="<?php echo '' . $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts:', 'campaign' ); ?>
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
			<?php
			}
		}
	}
}


