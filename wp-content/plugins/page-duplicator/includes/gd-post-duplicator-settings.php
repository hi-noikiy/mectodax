<?php 


if (! current_user_can('manage_options')) {
    wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-post-duplicate' ) );
}

?>
<div class="wrap">
	<h1><?php _e( 'GD Post Duplicate', 'wp-post-duplicate' ); ?></h1>	
	<form method="POST" action="options.php">
		<?php 
			settings_fields( 'gd-post-duplicate-settings' );	
			do_settings_sections( 'gd-post-duplicate-settings' ); 
			submit_button();
		?>		
	</form>
	
</div>



