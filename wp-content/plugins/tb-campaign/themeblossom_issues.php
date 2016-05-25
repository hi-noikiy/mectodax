<?php

add_action( 'init', 'register_cpt_issue', 1 );

define("THEMEBLOSSOM_ISSUES_CPT", "issue");
define("THEMEBLOSSOM_ISSUES_SINGULAR", "Issue");
define("THEMEBLOSSOM_ISSUES_PLURAL", "Issues");
define('THEMEBLOSSOM_ISSUES_SLUG', 'issue');

function register_cpt_issue() {


    $labels = array( 
        'name' => _x( THEMEBLOSSOM_ISSUES_PLURAL, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'singular_name' => _x( THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'add_new' => _x( 'Add New', THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'add_new_item' => _x( 'Add New ' . THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'edit_item' => _x( 'Edit ' . THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'new_item' => _x( 'New ' . THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'view_item' => _x( 'View ' . THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'search_items' => _x( 'Search ' . THEMEBLOSSOM_ISSUES_PLURAL, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'not_found' => _x( 'No ' . THEMEBLOSSOM_ISSUES_PLURAL . ' Found', THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'not_found_in_trash' => _x( 'No ' . THEMEBLOSSOM_ISSUES_PLURAL . ' Found in Trash', THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'parent_item_colon' => _x( 'Parent' . THEMEBLOSSOM_ISSUES_SINGULAR, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
        'menu_name' => _x( THEMEBLOSSOM_ISSUES_PLURAL, THEMEBLOSSOM_ISSUES_CPT, 'themeblossom' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
		
		'menu_icon' => 'dashicons-hammer',
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array('slug' => THEMEBLOSSOM_ISSUES_SLUG),
        'capability_type' => 'post'
    );

    register_post_type( THEMEBLOSSOM_ISSUES_CPT, $args );

    flush_rewrite_rules();

	add_filter( 'manage_edit-' . THEMEBLOSSOM_ISSUES_CPT . '_columns', 'set_custom_edit_issue_columns' );
	add_action( 'manage_' . THEMEBLOSSOM_ISSUES_CPT . '_posts_custom_column' , 'custom_issue_column', 10, 2 );
}

/*-----------------------CUSTOM COLUMNS-----------------------*/
function set_custom_edit_issue_columns($columns) {
	$columns = array(
		"cb"			=>	"<input type=\"checkbox\" />",
		"title"			=>	__("Name", 'themeblossom'),
		"_tb_issue_thumbnail"		=>	__("Preview Image", 'themeblossom'),
	);

	return $columns;
}

function custom_issue_column( $column, $post_id ) {
    switch ( $column ) {

        case '_tb_issue_thumbnail' :
			if (has_post_thumbnail($post_id)) the_post_thumbnail('campaign-wide-s-thumbnail');
            
            break;
    }
}

?>