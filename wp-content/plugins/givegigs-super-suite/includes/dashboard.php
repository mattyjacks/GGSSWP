<?php
/**
 * Dashboard for GiveGigs Super Suite
 *
 * Provides a central dashboard to view and manage projects, goals, focus areas, and tasks.
 *
 * @package GiveGigsSuperSuite
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the main dashboard page content.
 */
function ggsswp_main_dashboard_page() {
    ?>
    <div class="wrap ggsswp-dashboard">
        <h1><?php esc_html_e( 'GiveGigs Super Suite Dashboard', 'ggsswp' ); ?></h1>
        
        <div class="ggsswp-dashboard-header">
            <div class="ggsswp-stats-overview">
                <?php ggsswp_display_stats_overview(); ?>
            </div>
            
            <div class="ggsswp-quick-actions">
                <h3><?php esc_html_e( 'Quick Actions', 'ggsswp' ); ?></h3>
                <div class="ggsswp-action-buttons">
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=client' ) ); ?>" class="button">
                        <span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'New Client', 'ggsswp' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>" class="button">
                        <span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'New Project', 'ggsswp' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=goal' ) ); ?>" class="button">
                        <span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'New Goal', 'ggsswp' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=focus' ) ); ?>" class="button">
                        <span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'New Focus', 'ggsswp' ); ?>
                    </a>
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=task' ) ); ?>" class="button">
                        <span class="dashicons dashicons-plus-alt"></span> <?php esc_html_e( 'New Task', 'ggsswp' ); ?>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="ggsswp-dashboard-content">
            <div class="ggsswp-dashboard-column">
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Recent Clients', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_recent_clients(); ?>
                </div>
                
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Recent Projects', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_recent_projects(); ?>
                </div>
            </div>
            
            <div class="ggsswp-dashboard-column">
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Recent Goals', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_recent_goals(); ?>
                </div>
                
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Recent Focus Areas', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_recent_focus(); ?>
                </div>
            </div>
            
            <div class="ggsswp-dashboard-column">
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Recent Tasks', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_recent_tasks(); ?>
                </div>
                
                <div class="ggsswp-dashboard-card">
                    <h3><?php esc_html_e( 'Task Distribution', 'ggsswp' ); ?></h3>
                    <?php ggsswp_display_task_distribution(); ?>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .ggsswp-dashboard {
            margin: 20px 0;
        }
        
        .ggsswp-dashboard-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.04);
        }
        
        .ggsswp-stats-overview {
            flex: 2;
        }
        
        .ggsswp-quick-actions {
            flex: 1;
            text-align: right;
        }
        
        .ggsswp-action-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 5px;
        }
        
        .ggsswp-dashboard-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .ggsswp-dashboard-column {
            flex: 1;
            min-width: 300px;
        }
        
        .ggsswp-dashboard-card {
            background: #fff;
            padding: 15px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.04);
            margin-bottom: 20px;
        }
        
        .ggsswp-dashboard-card h3 {
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .ggsswp-item-list {
            margin: 0;
        }
        
        .ggsswp-item-list li {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f5f5f5;
        }
        
        .ggsswp-item-list li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .ggsswp-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
        }
        
        .ggsswp-stat-box {
            text-align: center;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 3px;
        }
        
        .ggsswp-stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #0073aa;
            display: block;
        }
        
        .ggsswp-stat-label {
            font-size: 13px;
            color: #72777c;
        }
        
        /* Task size styling */
        .ggsswp-size-s {
            display: inline-block;
            padding: 2px 8px;
            background-color: #e7f5ea;
            color: #0a6b1d;
            border-radius: 3px;
            font-weight: bold;
        }
        
        .ggsswp-size-m {
            display: inline-block;
            padding: 2px 8px;
            background-color: #e6f0f9;
            color: #0a4b6b;
            border-radius: 3px;
            font-weight: bold;
        }
        
        .ggsswp-size-l {
            display: inline-block;
            padding: 2px 8px;
            background-color: #f9e6e6;
            color: #6b0a0a;
            border-radius: 3px;
            font-weight: bold;
        }
    </style>
    <?php
}

/**
 * Display statistics overview.
 */
function ggsswp_display_stats_overview() {
    // Count posts for each post type
    $client_count = wp_count_posts( 'client' )->publish;
    $project_count = wp_count_posts( 'project' )->publish;
    $goal_count = wp_count_posts( 'goal' )->publish;
    $focus_count = wp_count_posts( 'focus' )->publish;
    $task_count = wp_count_posts( 'task' )->publish;
    
    // Get task counts by size
    $small_tasks = count( get_posts( array(
        'post_type'      => 'task',
        'posts_per_page' => -1,
        'meta_key'       => '_task_size',
        'meta_value'     => 'S',
    ) ) );
    
    $medium_tasks = count( get_posts( array(
        'post_type'      => 'task',
        'posts_per_page' => -1,
        'meta_key'       => '_task_size',
        'meta_value'     => 'M',
    ) ) );
    
    $large_tasks = count( get_posts( array(
        'post_type'      => 'task',
        'posts_per_page' => -1,
        'meta_key'       => '_task_size',
        'meta_value'     => 'L',
    ) ) );
    ?>
    <h3><?php esc_html_e( 'Statistics Overview', 'ggsswp' ); ?></h3>
    <div class="ggsswp-stats-grid">
        <div class="ggsswp-stat-box">
            <span class="ggsswp-stat-number"><?php echo esc_html( $client_count ); ?></span>
            <span class="ggsswp-stat-label"><?php esc_html_e( 'Clients', 'ggsswp' ); ?></span>
        </div>
        <div class="ggsswp-stat-box">
            <span class="ggsswp-stat-number"><?php echo esc_html( $project_count ); ?></span>
            <span class="ggsswp-stat-label"><?php esc_html_e( 'Projects', 'ggsswp' ); ?></span>
        </div>
        <div class="ggsswp-stat-box">
            <span class="ggsswp-stat-number"><?php echo esc_html( $goal_count ); ?></span>
            <span class="ggsswp-stat-label"><?php esc_html_e( 'Goals', 'ggsswp' ); ?></span>
        </div>
        <div class="ggsswp-stat-box">
            <span class="ggsswp-stat-number"><?php echo esc_html( $focus_count ); ?></span>
            <span class="ggsswp-stat-label"><?php esc_html_e( 'Focus Areas', 'ggsswp' ); ?></span>
        </div>
        <div class="ggsswp-stat-box">
            <span class="ggsswp-stat-number"><?php echo esc_html( $task_count ); ?></span>
            <span class="ggsswp-stat-label"><?php esc_html_e( 'Tasks', 'ggsswp' ); ?></span>
        </div>
    </div>
    
    <div class="ggsswp-task-distribution" style="margin-top: 15px;">
        <h4><?php esc_html_e( 'Tasks by Size', 'ggsswp' ); ?></h4>
        <div style="display: flex; gap: 10px;">
            <div style="flex: 1; text-align: center;">
                <span class="ggsswp-size-s"><?php echo esc_html( $small_tasks ); ?></span>
                <span class="ggsswp-stat-label"><?php esc_html_e( 'Small', 'ggsswp' ); ?></span>
            </div>
            <div style="flex: 1; text-align: center;">
                <span class="ggsswp-size-m"><?php echo esc_html( $medium_tasks ); ?></span>
                <span class="ggsswp-stat-label"><?php esc_html_e( 'Medium', 'ggsswp' ); ?></span>
            </div>
            <div style="flex: 1; text-align: center;">
                <span class="ggsswp-size-l"><?php echo esc_html( $large_tasks ); ?></span>
                <span class="ggsswp-stat-label"><?php esc_html_e( 'Large', 'ggsswp' ); ?></span>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Display recent clients.
 */
function ggsswp_display_recent_clients() {
    $clients = get_posts( array(
        'post_type'      => 'client',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    
    if ( empty( $clients ) ) {
        echo '<p>' . esc_html__( 'No clients found.', 'ggsswp' ) . '</p>';
        return;
    }
    
    echo '<ul class="ggsswp-item-list">';
    foreach ( $clients as $client ) {
        $project_count = count( get_posts( array(
            'post_type'      => 'project',
            'posts_per_page' => -1,
            'meta_key'       => '_client_id',
            'meta_value'     => $client->ID,
        ) ) );
        
        echo '<li>';
        echo '<a href="' . esc_url( get_edit_post_link( $client->ID ) ) . '"><strong>' . esc_html( $client->post_title ) . '</strong></a>';
        echo ' <span class="ggsswp-item-meta">(' . sprintf( _n( '%s project', '%s projects', $project_count, 'ggsswp' ), number_format_i18n( $project_count ) ) . ')</span>';
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=client' ) ) . '">' . esc_html__( 'View all clients', 'ggsswp' ) . ' →</a></p>';
}

/**
 * Display recent projects.
 */
function ggsswp_display_recent_projects() {
    $projects = get_posts( array(
        'post_type'      => 'project',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    
    if ( empty( $projects ) ) {
        echo '<p>' . esc_html__( 'No projects found.', 'ggsswp' ) . '</p>';
        return;
    }
    
    echo '<ul class="ggsswp-item-list">';
    foreach ( $projects as $project ) {
        $client_id = get_post_meta( $project->ID, '_client_id', true );
        $client_name = $client_id ? get_the_title( $client_id ) : __( 'No client', 'ggsswp' );
        
        echo '<li>';
        echo '<a href="' . esc_url( get_edit_post_link( $project->ID ) ) . '"><strong>' . esc_html( $project->post_title ) . '</strong></a>';
        echo ' <span class="ggsswp-item-meta">(' . esc_html( $client_name ) . ')</span>';
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=project' ) ) . '">' . esc_html__( 'View all projects', 'ggsswp' ) . ' →</a></p>';
}

/**
 * Display recent goals.
 */
function ggsswp_display_recent_goals() {
    $goals = get_posts( array(
        'post_type'      => 'goal',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    
    if ( empty( $goals ) ) {
        echo '<p>' . esc_html__( 'No goals found.', 'ggsswp' ) . '</p>';
        return;
    }
    
    echo '<ul class="ggsswp-item-list">';
    foreach ( $goals as $goal ) {
        $project_id = get_post_meta( $goal->ID, '_project_id', true );
        $project_name = $project_id ? get_the_title( $project_id ) : __( 'No project', 'ggsswp' );
        
        echo '<li>';
        echo '<a href="' . esc_url( get_edit_post_link( $goal->ID ) ) . '"><strong>' . esc_html( $goal->post_title ) . '</strong></a>';
        echo ' <span class="ggsswp-item-meta">(' . esc_html( $project_name ) . ')</span>';
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=goal' ) ) . '">' . esc_html__( 'View all goals', 'ggsswp' ) . ' →</a></p>';
}

/**
 * Display recent focus areas.
 */
function ggsswp_display_recent_focus() {
    $focus_items = get_posts( array(
        'post_type'      => 'focus',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    
    if ( empty( $focus_items ) ) {
        echo '<p>' . esc_html__( 'No focus areas found.', 'ggsswp' ) . '</p>';
        return;
    }
    
    echo '<ul class="ggsswp-item-list">';
    foreach ( $focus_items as $focus ) {
        $goal_id = get_post_meta( $focus->ID, '_goal_id', true );
        $goal_name = $goal_id ? get_the_title( $goal_id ) : __( 'No goal', 'ggsswp' );
        
        echo '<li>';
        echo '<a href="' . esc_url( get_edit_post_link( $focus->ID ) ) . '"><strong>' . esc_html( $focus->post_title ) . '</strong></a>';
        echo ' <span class="ggsswp-item-meta">(' . esc_html( $goal_name ) . ')</span>';
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=focus' ) ) . '">' . esc_html__( 'View all focus areas', 'ggsswp' ) . ' →</a></p>';
}

/**
 * Display recent tasks.
 */
function ggsswp_display_recent_tasks() {
    $tasks = get_posts( array(
        'post_type'      => 'task',
        'posts_per_page' => 10,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    
    if ( empty( $tasks ) ) {
        echo '<p>' . esc_html__( 'No tasks found.', 'ggsswp' ) . '</p>';
        return;
    }
    
    echo '<ul class="ggsswp-item-list">';
    foreach ( $tasks as $task ) {
        $focus_id = get_post_meta( $task->ID, '_focus_id', true );
        $focus_name = $focus_id ? get_the_title( $focus_id ) : __( 'No focus', 'ggsswp' );
        $task_size = get_post_meta( $task->ID, '_task_size', true );
        
        echo '<li>';
        echo '<a href="' . esc_url( get_edit_post_link( $task->ID ) ) . '"><strong>' . esc_html( $task->post_title ) . '</strong></a> ';
        
        if ( $task_size ) {
            echo '<span class="ggsswp-size-' . strtolower( esc_attr( $task_size ) ) . '">' . esc_html( $task_size ) . '</span> ';
        }
        
        echo '<span class="ggsswp-item-meta">(' . esc_html( $focus_name ) . ')</span>';
        echo '</li>';
    }
    echo '</ul>';
    
    echo '<p><a href="' . esc_url( admin_url( 'edit.php?post_type=task' ) ) . '">' . esc_html__( 'View all tasks', 'ggsswp' ) . ' →</a></p>';
}

/**
 * Display task distribution.
 */
function ggsswp_display_task_distribution() {
    // This could be expanded with more detailed statistics or graphs
    echo '<p>' . esc_html__( 'Task distribution visualization will be available in a future update.', 'ggsswp' ) . '</p>';
}
?>
