<?php
/*
Plugin Name: Page Duplicator
Plugin URI:  http://www.gd-marketing.com/
Description: Page Duplicator allow you to create duplicate any Post / Page of on your site. That includes posts, pages and custom post types.
Version:     1.0.0
Author:      Nathan Jones
Author URI:  http://www.gd-marketing.com/
 */

class GD_Page_Duplicator {
	
	public function __construct() {
		$duplicable_posts = get_option( 'duplicable_post_types', array(
			'post',
			'page'
		) );
		if( ! empty( $duplicable_posts ) ) {
			foreach( $duplicable_posts as $duplicable ) {
				add_filter( $duplicable . '_row_actions', array( $this, 'add_duplicate_post_button' ), 10, 2 );
			}
		}
		add_action( 'init', array( $this, 'duplicate_dat_page' ) );
		add_action( 'admin_notices', array( $this, 'duplicate_dat_page_admin_notice' ) );
		add_action( 'admin_menu', array( $this, 'create_gd_page_duplicate_settings' ) );
		add_action( 'admin_init', array( $this, 'gd_page_duplicate_settings_api_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'gd_page_duplicate_enqueue_scripts_and_styles' ) );
	}
	
	
	public function create_gd_page_duplicate_settings() {
		add_submenu_page( 
			  'options-general.php',   //or 'options.php' 
			  __( 'GD Post Duplicate', 'wp-post-duplicater' ), 
			__( 'GD Post Duplicate', 'wp-post-duplicater' ), 
			'manage_options', 
			'gd-post-duplicate-settings', 
			array( $this, 'gd_page_duplicate_settings_page' )
		);
	}	
	
	
	public function gd_page_duplicate_settings_api_init() {
	
		register_setting(
			'gd-post-duplicate-settings',
			'duplicable_post_types'
		);
	
		add_settings_section(
			'gd-post-duplicate-settings',         
			__( 'Post Type Options', 'wp-post-duplicater' ),
			array( $this, 'gd_page_duplicate_setting_section_callback_function' ),
			'gd-post-duplicate-settings'                          
		);
		
		add_settings_field( 
			'duplicable_post_types',                      
			__( 'Post Types', 'wp-post-duplicater' ),     
			array( $this, 'gd_page_duplicate_duplicable_post_types_callback_function' ), 
			'gd-post-duplicate-settings',                      
			'gd-post-duplicate-settings',    
			array(                           
				__( 'Select which post types should be duplicate. By default, posts and pages are duplicate-able.', 'wp-post-duplicater' )
			)
		);
				
	} 
	
	public function gd_page_duplicate_settings_page() {
		include_once( plugin_dir_path( __FILE__ ) . 'includes/gd-post-duplicator-settings.php' );
	}
	
	
	public function gd_page_duplicate_setting_section_callback_function() {
		echo '<p>' . __( 'Select which post types should be duplicate.', 'wp-post-duplicater' ) . '</p>';
	 }
	 
	
	public function gd_page_duplicate_duplicable_post_types_callback_function( $args ) {
		$previously_saved_post_types = get_option( 'duplicable_post_types', array(
			'post',
			'page'
		) );
		$post_types = get_post_types( '', 'names' );
		unset( $post_types[ 'attachment' ] );
		unset( $post_types[ 'nav_menu_item'] );
		unset( $post_types[ 'revision' ] );
		?>
			<select id="select_duplicable_post_types" name="duplicable_post_types[]" multiple>
				<?php
					foreach ( $post_types as $post_type ) {
						$post_type_labels = get_post_type_object( $post_type );
						$post_type_name = ( isset( $post_type_labels->labels->singular_name ) ) ? $post_type_labels->labels->singular_name : $post_type;
						$selected = ( in_array( $post_type, $previously_saved_post_types ) ) ? 'selected="selected"' : '';
						echo '<option value="' . $post_type . '" ' . $selected . '>' . ucwords( $post_type_name ) . '</option>';
					}
				?>
			</select>
			<p class="description"><?php echo $args[0]; ?></p>
		<?php
	}
	
	
	public function add_duplicate_post_button( $actions, $post ) {
		$duplicable_posts = get_option( 'duplicable_post_types', array(
			'post',
			'page'
		) );
		if( ! empty( $duplicable_posts ) ) {
			foreach( $duplicable_posts as $duplicable ) {
	
				if( $duplicable == 'post' ) {
					if( ! in_array( $post->post_type, $duplicable_posts ) ) {
						return $actions;
					}
				}
				$post_type_labels = get_post_type_object( $post->post_type );
				$actions['duplicate_post'] = '<a href="'. add_query_arg( 
					array( 
						'do_action' => 'duplicate_post',
						'nonce' => wp_create_nonce( 'duplicate_post-' . (int) $post->ID ), 
						'post_id' => (int) $post->ID 
					), 
					esc_url( admin_url( 'edit.php?post_type=page' ) ) 
				) . '" >' . sprintf( __( 'Duplicate %s', 'yikes-inc-easy-mailchimp-extender' ), $post_type_labels->labels->singular_name ) . '</a>';
			}
		}
		return $actions;		
	}
	
	
	public function duplicate_dat_page() {
		if( isset( $_GET['do_action'] ) && $_GET['do_action'] == 'duplicate_post' && isset( $_GET['nonce'] ) ) {
	
			wp_verify_nonce( $_GET['nonce'], 'duplicate_post-' . $_REQUEST['post_id'] );
			$page_id = (int) $_GET['post_id'];
			$page_object = get_post( $page_id );
			$taxonomies = get_object_taxonomies( $page_object->post_type );
			$post_meta_data = get_post_meta( $page_id );
			
			if( $page_object ) {
				
				$new_page_title = $page_object->post_title . ' - Duplicate';
				$new_page_author = $page_object->post_author;
				$new_page_content = $page_object->post_content;
				$new_page_image_id = get_post_thumbnail_id( $page_id );
				
				// Create post object
				$my_post = array(
				  'post_title'    => $new_page_title,
				  'post_content'  => $new_page_content,
				  'post_type' => $page_object->post_type,
				  'post_status'   => 'draft',
				  'post_author'   => $new_page_author,
				);
				
				// Insert the post into the database
				$new_post = wp_insert_post( $my_post );
								
	
								
				if( $new_post ) {
					// Loop over returned taxonomies, and re-assign them to the new post_type
					if( $taxonomies ) {
						foreach( $taxonomies as $taxonomy ) {
							$terms = wp_get_post_terms( $page_id, $taxonomy );
							if( $terms ) {
								$assigned_terms = array();
								foreach( $terms as $assigned_term ) {
									$assigned_terms[] = $assigned_term->term_id;
								}
								wp_set_object_terms( $new_post, $assigned_terms, $taxonomy, false );
							}
						}
					}
					// Loop over returned metadata, and re-assign them to the new post_type
					if( $post_meta_data ) {
						foreach( $post_meta_data as $meta_data => $value ) {
							if( is_array( $value ) ) {
								foreach( $value as $meta_value => $meta_text ) {
									/* 
									*	- Check for serialized data in some meta field
									*	This is really In place for EDD imports 
									*	The varialble pricing field is a serialized array
									*/
									if( is_serialized( $meta_text ) ) {
										update_post_meta( $new_post, $meta_data,  unserialize( $meta_text ) );
									} else {
										update_post_meta( $new_post, $meta_data,  $meta_text );
									}
								}
							} else {
								update_post_meta( $new_post, $meta_data, $value );
							}
						}
					}
					// re-assign the featured image
					if( $new_page_image_id ) {
						set_post_thumbnail( $new_post, $new_page_image_id );
					}
					wp_redirect( esc_url_raw( admin_url( 'edit.php?post_type=' . $page_object->post_type . '&post_duplicated=true&duplicated_post=' . (int) $new_post ) ) );
					exit();
				}
			}
		}
	}
	
	/*
	*	Display Duplicate Notices
	*	@since 0.1
	*/
	public function duplicate_dat_page_admin_notice() {
		if( isset( $_GET['post_duplicated'] ) && $_GET['post_duplicated'] == 'true' ) {
			$page_id = (int) $_GET['duplicated_post'];
			$page_data = get_post( $page_id );
			?>
			<div class="updated">
				<p><?php echo str_replace( ' - Duplicate', '', $page_data->post_title ); ?> <?php _e( 'Sucessfully Duplicated', 'wp-post-duplicater' ); ?> &#187; <a href="<?php echo esc_url_raw( admin_url( 'post.php?post=' . $page_id . '&action=edit' ) ); ?>">edit post</a></p>
			</div>
			<?php
		}
	}

	/*
	*	Enqueue the page duplicater scripts/styles where needed
	*	@since 0.1
	*/
	public function gd_page_duplicate_enqueue_scripts_and_styles( $hook ) {
		// on our settings page, let's enqueue select2
		if( $hook == 'settings_page_gd-post-duplicate-settings' ) {
			wp_enqueue_script( 'select2.min.js', plugin_dir_url( __FILE__ ) . 'includes/js/select2.min.js', array( 'jquery' ), 'all', true );
			wp_enqueue_script( 'select2-init.js', plugin_dir_url( __FILE__ ) . 'includes/js/select2-init.js', array( 'select2.min.js' ), 'all', true );
			wp_enqueue_style( 'select2.min.css', plugin_dir_url( __FILE__ ) . 'includes/css/select2.css' );
		}
	}
	
}
new GD_Page_Duplicator;