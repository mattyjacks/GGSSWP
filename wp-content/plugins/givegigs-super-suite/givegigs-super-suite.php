<?php
/**
 * Plugin Name:       GiveGigs Super Suite WordPress
 * Plugin URI:        #
 * Description:       A project management tool suite for WordPress. Manage Clients, Projects, Goals, Focus, and Tasks.
 * Version:           1.0.0
 * Author:            Your Name / Company
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ggsswp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GGSSWP_VERSION', '1.0.0' );
define( 'GGSSWP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GGSSWP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Load plugin files.
 */
function ggsswp_load_plugin_files() {
    // Load Custom Post Types registration
    require_once GGSSWP_PLUGIN_DIR . 'includes/post-types.php';
    
    // Load Meta Boxes for relationships between post types
    require_once GGSSWP_PLUGIN_DIR . 'includes/meta-boxes.php';
    
    // Load Admin Columns customization
    require_once GGSSWP_PLUGIN_DIR . 'includes/admin-columns.php';
    
    // Load Dashboard
    require_once GGSSWP_PLUGIN_DIR . 'includes/dashboard.php';
    
    // Load Admin Assets (CSS/JS)
    require_once GGSSWP_PLUGIN_DIR . 'includes/admin-assets.php';
}
add_action( 'plugins_loaded', 'ggsswp_load_plugin_files' );

/**
 * The code that runs during plugin activation.
 */
function ggsswp_activate() {
    // Trigger CPT registration hook to flush rewrite rules
    ggsswp_load_plugin_files();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ggsswp_activate' );

/**
 * The code that runs during plugin deactivation.
 */
function ggsswp_deactivate() {
	// Optional: Add any cleanup needed on deactivation
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'ggsswp_deactivate' );

?>
