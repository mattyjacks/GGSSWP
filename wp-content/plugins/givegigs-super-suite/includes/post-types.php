<?php
/**
 * Register Custom Post Types for GiveGigs Super Suite
 *
 * @package GiveGigsSuperSuite
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types.
 */
function ggsswp_register_post_types() {

	// Client CPT
	$client_labels = array(
		'name'                  => _x( 'Clients', 'Post type general name', 'ggsswp' ),
		'singular_name'         => _x( 'Client', 'Post type singular name', 'ggsswp' ),
		'menu_name'             => _x( 'Clients', 'Admin Menu text', 'ggsswp' ),
        'name_admin_bar'        => _x( 'Client', 'Add New on Toolbar', 'ggsswp' ),
		// ... other labels ...
	);
	$client_args = array(
		'labels'             => $client_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'ggsswp_suite', // Group under a main menu
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
        'menu_icon'          => 'dashicons-businesswoman',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
        'show_in_rest'       => true, // Enable Gutenberg editor and REST API support
	);
	register_post_type( 'client', $client_args );

    // Project CPT
	$project_labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'ggsswp' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'ggsswp' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'ggsswp' ),
        'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'ggsswp' ),
		// ... other labels ...
	);
	$project_args = array(
		'labels'             => $project_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
        'show_in_menu'       => 'ggsswp_suite', // Group under a main menu
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 21,
        'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
        'show_in_rest'       => true,
	);
	register_post_type( 'project', $project_args );

    // Goal CPT
	$goal_labels = array(
		'name'                  => _x( 'Goals', 'Post type general name', 'ggsswp' ),
		'singular_name'         => _x( 'Goal', 'Post type singular name', 'ggsswp' ),
		'menu_name'             => _x( 'Goals', 'Admin Menu text', 'ggsswp' ),
        'name_admin_bar'        => _x( 'Goal', 'Add New on Toolbar', 'ggsswp' ),
		// ... other labels ...
	);
	$goal_args = array(
		'labels'             => $goal_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
        'show_in_menu'       => 'ggsswp_suite', // Group under a main menu
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'goal' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
        'menu_icon'          => 'dashicons-awards',
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' ),
        'show_in_rest'       => true,
	);
	register_post_type( 'goal', $goal_args );

    // Focus CPT (formerly Focus Folder)
	$focus_labels = array(
		'name'                  => _x( 'Focus', 'Post type general name', 'ggsswp' ), // Renamed
		'singular_name'         => _x( 'Focus', 'Post type singular name', 'ggsswp' ), // Renamed
		'menu_name'             => _x( 'Focus', 'Admin Menu text', 'ggsswp' ),        // Renamed
        'name_admin_bar'        => _x( 'Focus', 'Add New on Toolbar', 'ggsswp' ),     // Renamed
		// ... other labels ...
	);
	$focus_args = array(
		'labels'             => $focus_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
        'show_in_menu'       => 'ggsswp_suite', // Group under a main menu
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'focus' ), // Renamed slug
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 23,
        'menu_icon'          => 'dashicons-category',
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields' ),
        'show_in_rest'       => true,
	);
	register_post_type( 'focus', $focus_args ); // Renamed CPT key

    // Task CPT (formerly Giglet)
	$task_labels = array(
		'name'                  => _x( 'Tasks', 'Post type general name', 'ggsswp' ),
		'singular_name'         => _x( 'Task', 'Post type singular name', 'ggsswp' ),
		'menu_name'             => _x( 'Tasks', 'Admin Menu text', 'ggsswp' ),
        'name_admin_bar'        => _x( 'Task', 'Add New on Toolbar', 'ggsswp' ),
        'all_items'             => __( 'All Tasks', 'ggsswp' ),
        'add_new_item'          => __( 'Add New Task', 'ggsswp' ),
        'add_new'               => __( 'Add New', 'ggsswp' ),
        'new_item'              => __( 'New Task', 'ggsswp' ),
        'edit_item'             => __( 'Edit Task', 'ggsswp' ),
        'update_item'           => __( 'Update Task', 'ggsswp' ),
        'view_item'             => __( 'View Task', 'ggsswp' ),
        'view_items'            => __( 'View Tasks', 'ggsswp' ),
        'search_items'          => __( 'Search Task', 'ggsswp' ),
        'not_found'             => __( 'Not found', 'ggsswp' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'ggsswp' ),
        'featured_image'        => __( 'Featured Image', 'ggsswp' ), // Might not be needed
        'set_featured_image'    => __( 'Set featured image', 'ggsswp' ),
        'remove_featured_image' => __( 'Remove featured image', 'ggsswp' ),
        'use_featured_image'    => __( 'Use as featured image', 'ggsswp' ),
        'insert_into_item'      => __( 'Insert into task', 'ggsswp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this task', 'ggsswp' ),
        'items_list'            => __( 'Tasks list', 'ggsswp' ),
        'items_list_navigation' => __( 'Tasks list navigation', 'ggsswp' ),
        'filter_items_list'     => __( 'Filter tasks list', 'ggsswp' ),
	);
	$task_args = array(
		'labels'             => $task_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
        'show_in_menu'       => 'ggsswp_suite', // Group under a main menu
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'task' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 24,
        'menu_icon'          => 'dashicons-list-view',
		'supports'           => array( 'title', 'editor', 'author', 'custom-fields', 'comments' ), // Added comments support
        'show_in_rest'       => true,
	);
	register_post_type( 'task', $task_args );

}
add_action( 'init', 'ggsswp_register_post_types' );


/**
 * Add top-level admin menu page for the suite.
 */
function ggsswp_add_admin_menu() {
    add_menu_page(
        __( 'GiveGigs Suite', 'ggsswp' ), // Page Title
        __( 'GiveGigs Suite', 'ggsswp' ), // Menu Title
        'manage_options',                  // Capability
        'ggsswp_suite',                    // Menu Slug
        'ggsswp_main_dashboard_page',      // Function to display page content
        'dashicons-analytics',             // Icon URL
        19                                 // Position (just above Clients)
    );

     // Add a Dashboard Submenu (optional, points to the main page for now)
    add_submenu_page(
        'ggsswp_suite',                    // Parent Slug
        __( 'Dashboard', 'ggsswp' ),       // Page Title
        __( 'Dashboard', 'ggsswp' ),       // Menu Title
        'manage_options',                  // Capability
        'ggsswp_suite',                    // Menu Slug (same as parent to avoid duplicate page)
        'ggsswp_main_dashboard_page'       // Function
    );
}
add_action( 'admin_menu', 'ggsswp_add_admin_menu' );

// Dashboard functionality is now in includes/dashboard.php

/**
 * Flush rewrite rules on CPT registration changes.
 * Only runs once on activation/deactivation or theme switch.
 */
function ggsswp_rewrite_flush() {
    ggsswp_register_post_types();
    flush_rewrite_rules();
}
// You can hook this elsewhere if needed, but activation/deactivation covers CPT registration.
// register_activation_hook( __FILE__, 'ggsswp_rewrite_flush' ); // Already handled in main plugin file
// register_deactivation_hook( __FILE__, 'ggsswp_rewrite_flush' ); // Already handled
?>
