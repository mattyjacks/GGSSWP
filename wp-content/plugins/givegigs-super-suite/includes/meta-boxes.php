<?php
/**
 * Meta Boxes for GiveGigs Super Suite
 *
 * This file handles the creation of meta boxes for establishing relationships
 * between different post types in the hierarchy:
 * Client > Project > Goal > Focus > Task
 *
 * @package GiveGigsSuperSuite
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register meta boxes for all post types.
 */
function ggsswp_register_meta_boxes() {
    // Project meta box (to select parent Client)
    add_meta_box(
        'ggsswp_project_client',
        __( 'Client', 'ggsswp' ),
        'ggsswp_project_client_meta_box_callback',
        'project',
        'side',
        'high'
    );

    // Goal meta box (to select parent Project)
    add_meta_box(
        'ggsswp_goal_project',
        __( 'Project', 'ggsswp' ),
        'ggsswp_goal_project_meta_box_callback',
        'goal',
        'side',
        'high'
    );

    // Focus meta box (to select parent Goal)
    add_meta_box(
        'ggsswp_focus_goal',
        __( 'Goal', 'ggsswp' ),
        'ggsswp_focus_goal_meta_box_callback',
        'focus',
        'side',
        'high'
    );

    // Task meta boxes (to select parent Focus and size)
    add_meta_box(
        'ggsswp_task_focus',
        __( 'Focus', 'ggsswp' ),
        'ggsswp_task_focus_meta_box_callback',
        'task',
        'side',
        'high'
    );

    add_meta_box(
        'ggsswp_task_size',
        __( 'Task Size', 'ggsswp' ),
        'ggsswp_task_size_meta_box_callback',
        'task',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ggsswp_register_meta_boxes' );

/**
 * Meta box callback for selecting a Client for a Project.
 *
 * @param WP_Post $post The current post object.
 */
function ggsswp_project_client_meta_box_callback( $post ) {
    // Add a nonce field for security
    wp_nonce_field( 'ggsswp_project_client_meta_box', 'ggsswp_project_client_meta_box_nonce' );

    // Get the current value
    $client_id = get_post_meta( $post->ID, '_client_id', true );

    // Query for clients
    $clients = get_posts( array(
        'post_type'      => 'client',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    if ( empty( $clients ) ) {
        echo '<p>' . esc_html__( 'No clients found. Please create a client first.', 'ggsswp' ) . '</p>';
        echo '<p><a href="' . esc_url( admin_url( 'post-new.php?post_type=client' ) ) . '" class="button">' . esc_html__( 'Create Client', 'ggsswp' ) . '</a></p>';
        return;
    }
    ?>
    <select name="ggsswp_project_client" id="ggsswp_project_client" class="widefat">
        <option value=""><?php esc_html_e( '— Select Client —', 'ggsswp' ); ?></option>
        <?php foreach ( $clients as $client ) : ?>
            <option value="<?php echo esc_attr( $client->ID ); ?>" <?php selected( $client_id, $client->ID ); ?>>
                <?php echo esc_html( $client->post_title ); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

/**
 * Meta box callback for selecting a Project for a Goal.
 *
 * @param WP_Post $post The current post object.
 */
function ggsswp_goal_project_meta_box_callback( $post ) {
    // Add a nonce field for security
    wp_nonce_field( 'ggsswp_goal_project_meta_box', 'ggsswp_goal_project_meta_box_nonce' );

    // Get the current value
    $project_id = get_post_meta( $post->ID, '_project_id', true );

    // Query for projects
    $projects = get_posts( array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    if ( empty( $projects ) ) {
        echo '<p>' . esc_html__( 'No projects found. Please create a project first.', 'ggsswp' ) . '</p>';
        echo '<p><a href="' . esc_url( admin_url( 'post-new.php?post_type=project' ) ) . '" class="button">' . esc_html__( 'Create Project', 'ggsswp' ) . '</a></p>';
        return;
    }
    ?>
    <select name="ggsswp_goal_project" id="ggsswp_goal_project" class="widefat">
        <option value=""><?php esc_html_e( '— Select Project —', 'ggsswp' ); ?></option>
        <?php foreach ( $projects as $project ) : ?>
            <option value="<?php echo esc_attr( $project->ID ); ?>" <?php selected( $project_id, $project->ID ); ?>>
                <?php echo esc_html( $project->post_title ); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

/**
 * Meta box callback for selecting a Goal for a Focus.
 *
 * @param WP_Post $post The current post object.
 */
function ggsswp_focus_goal_meta_box_callback( $post ) {
    // Add a nonce field for security
    wp_nonce_field( 'ggsswp_focus_goal_meta_box', 'ggsswp_focus_goal_meta_box_nonce' );

    // Get the current value
    $goal_id = get_post_meta( $post->ID, '_goal_id', true );

    // Query for goals
    $goals = get_posts( array(
        'post_type'      => 'goal',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    if ( empty( $goals ) ) {
        echo '<p>' . esc_html__( 'No goals found. Please create a goal first.', 'ggsswp' ) . '</p>';
        echo '<p><a href="' . esc_url( admin_url( 'post-new.php?post_type=goal' ) ) . '" class="button">' . esc_html__( 'Create Goal', 'ggsswp' ) . '</a></p>';
        return;
    }
    ?>
    <select name="ggsswp_focus_goal" id="ggsswp_focus_goal" class="widefat">
        <option value=""><?php esc_html_e( '— Select Goal —', 'ggsswp' ); ?></option>
        <?php foreach ( $goals as $goal ) : ?>
            <option value="<?php echo esc_attr( $goal->ID ); ?>" <?php selected( $goal_id, $goal->ID ); ?>>
                <?php echo esc_html( $goal->post_title ); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

/**
 * Meta box callback for selecting a Focus for a Task.
 *
 * @param WP_Post $post The current post object.
 */
function ggsswp_task_focus_meta_box_callback( $post ) {
    // Add a nonce field for security
    wp_nonce_field( 'ggsswp_task_focus_meta_box', 'ggsswp_task_focus_meta_box_nonce' );

    // Get the current value
    $focus_id = get_post_meta( $post->ID, '_focus_id', true );

    // Query for focus items
    $focus_items = get_posts( array(
        'post_type'      => 'focus',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    if ( empty( $focus_items ) ) {
        echo '<p>' . esc_html__( 'No focus items found. Please create a focus first.', 'ggsswp' ) . '</p>';
        echo '<p><a href="' . esc_url( admin_url( 'post-new.php?post_type=focus' ) ) . '" class="button">' . esc_html__( 'Create Focus', 'ggsswp' ) . '</a></p>';
        return;
    }
    ?>
    <select name="ggsswp_task_focus" id="ggsswp_task_focus" class="widefat">
        <option value=""><?php esc_html_e( '— Select Focus —', 'ggsswp' ); ?></option>
        <?php foreach ( $focus_items as $focus ) : ?>
            <option value="<?php echo esc_attr( $focus->ID ); ?>" <?php selected( $focus_id, $focus->ID ); ?>>
                <?php echo esc_html( $focus->post_title ); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

/**
 * Meta box callback for selecting a Task Size.
 *
 * @param WP_Post $post The current post object.
 */
function ggsswp_task_size_meta_box_callback( $post ) {
    // Add a nonce field for security
    wp_nonce_field( 'ggsswp_task_size_meta_box', 'ggsswp_task_size_meta_box_nonce' );

    // Get the current value
    $task_size = get_post_meta( $post->ID, '_task_size', true );
    if ( empty( $task_size ) ) {
        $task_size = 'M'; // Default to Medium if not set
    }

    // Size options
    $size_options = array(
        'S' => __( 'Small', 'ggsswp' ),
        'M' => __( 'Medium', 'ggsswp' ),
        'L' => __( 'Large', 'ggsswp' ),
    );
    ?>
    <div class="ggsswp-task-size-selector">
        <?php foreach ( $size_options as $value => $label ) : ?>
            <label class="ggsswp-size-option">
                <input type="radio" name="ggsswp_task_size" value="<?php echo esc_attr( $value ); ?>" <?php checked( $task_size, $value ); ?>>
                <span><?php echo esc_html( $label ); ?> (<?php echo esc_html( $value ); ?>)</span>
            </label><br>
        <?php endforeach; ?>
    </div>
    <style>
        .ggsswp-task-size-selector {
            margin: 10px 0;
        }
        .ggsswp-size-option {
            display: block;
            margin-bottom: 8px;
        }
    </style>
    <?php
}

/**
 * Save meta box data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function ggsswp_save_meta_box_data( $post_id ) {
    // Check if our nonce is set and verify it
    // Project - Client relationship
    if ( isset( $_POST['ggsswp_project_client_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['ggsswp_project_client_meta_box_nonce'], 'ggsswp_project_client_meta_box' ) ) {
        if ( isset( $_POST['ggsswp_project_client'] ) ) {
            $client_id = sanitize_text_field( $_POST['ggsswp_project_client'] );
            update_post_meta( $post_id, '_client_id', $client_id );
        }
    }

    // Goal - Project relationship
    if ( isset( $_POST['ggsswp_goal_project_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['ggsswp_goal_project_meta_box_nonce'], 'ggsswp_goal_project_meta_box' ) ) {
        if ( isset( $_POST['ggsswp_goal_project'] ) ) {
            $project_id = sanitize_text_field( $_POST['ggsswp_goal_project'] );
            update_post_meta( $post_id, '_project_id', $project_id );
        }
    }

    // Focus - Goal relationship
    if ( isset( $_POST['ggsswp_focus_goal_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['ggsswp_focus_goal_meta_box_nonce'], 'ggsswp_focus_goal_meta_box' ) ) {
        if ( isset( $_POST['ggsswp_focus_goal'] ) ) {
            $goal_id = sanitize_text_field( $_POST['ggsswp_focus_goal'] );
            update_post_meta( $post_id, '_goal_id', $goal_id );
        }
    }

    // Task - Focus relationship
    if ( isset( $_POST['ggsswp_task_focus_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['ggsswp_task_focus_meta_box_nonce'], 'ggsswp_task_focus_meta_box' ) ) {
        if ( isset( $_POST['ggsswp_task_focus'] ) ) {
            $focus_id = sanitize_text_field( $_POST['ggsswp_task_focus'] );
            update_post_meta( $post_id, '_focus_id', $focus_id );
        }
    }

    // Task Size
    if ( isset( $_POST['ggsswp_task_size_meta_box_nonce'] ) && 
         wp_verify_nonce( $_POST['ggsswp_task_size_meta_box_nonce'], 'ggsswp_task_size_meta_box' ) ) {
        if ( isset( $_POST['ggsswp_task_size'] ) ) {
            $task_size = sanitize_text_field( $_POST['ggsswp_task_size'] );
            // Validate that it's one of our allowed values
            if ( in_array( $task_size, array( 'S', 'M', 'L' ) ) ) {
                update_post_meta( $post_id, '_task_size', $task_size );
            }
        }
    }
}
add_action( 'save_post', 'ggsswp_save_meta_box_data' );
?>
