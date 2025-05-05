<?php
/**
 * Admin Assets for GiveGigs Super Suite
 *
 * Handles loading of CSS and JS files in the admin area.
 *
 * @package GiveGigsSuperSuite
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue admin styles and scripts.
 */
function ggsswp_enqueue_admin_assets() {
    $screen = get_current_screen();
    
    // Only load on our plugin's pages
    if ( ! $screen ) {
        return;
    }
    
    // Check if we're on one of our post types or the dashboard
    $our_post_types = array( 'client', 'project', 'goal', 'focus', 'task' );
    $is_our_page = in_array( $screen->post_type, $our_post_types ) || 
                   ( $screen->base === 'toplevel_page_ggsswp_suite' );
    
    if ( ! $is_our_page ) {
        return;
    }
    
    // Enqueue our admin stylesheet
    wp_enqueue_style(
        'ggsswp-admin-styles',
        GGSSWP_PLUGIN_URL . 'assets/css/admin-style.css',
        array(),
        GGSSWP_VERSION,
        'all'
    );
    
    // We can add JavaScript here in the future if needed
    // wp_enqueue_script( ... );
}
add_action( 'admin_enqueue_scripts', 'ggsswp_enqueue_admin_assets' );
?>
