<?php
/**
 * Admin Columns for GiveGigs Super Suite
 *
 * Customizes the columns displayed in the WordPress admin for our custom post types.
 * Shows relationships between post types in the list views.
 *
 * @package GiveGigsSuperSuite
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add custom columns to the Project post type.
 *
 * @param array $columns The existing columns.
 * @return array Modified columns.
 */
function ggsswp_project_columns( $columns ) {
    $new_columns = array();
    
    // Insert columns after title
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        
        if ( $key === 'title' ) {
            $new_columns['client'] = __( 'Client', 'ggsswp' );
        }
    }
    
    return $new_columns;
}
add_filter( 'manage_project_posts_columns', 'ggsswp_project_columns' );

/**
 * Add custom columns to the Goal post type.
 *
 * @param array $columns The existing columns.
 * @return array Modified columns.
 */
function ggsswp_goal_columns( $columns ) {
    $new_columns = array();
    
    // Insert columns after title
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        
        if ( $key === 'title' ) {
            $new_columns['project'] = __( 'Project', 'ggsswp' );
            $new_columns['client'] = __( 'Client', 'ggsswp' );
        }
    }
    
    return $new_columns;
}
add_filter( 'manage_goal_posts_columns', 'ggsswp_goal_columns' );

/**
 * Add custom columns to the Focus post type.
 *
 * @param array $columns The existing columns.
 * @return array Modified columns.
 */
function ggsswp_focus_columns( $columns ) {
    $new_columns = array();
    
    // Insert columns after title
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        
        if ( $key === 'title' ) {
            $new_columns['goal'] = __( 'Goal', 'ggsswp' );
            $new_columns['project'] = __( 'Project', 'ggsswp' );
            $new_columns['client'] = __( 'Client', 'ggsswp' );
        }
    }
    
    return $new_columns;
}
add_filter( 'manage_focus_posts_columns', 'ggsswp_focus_columns' );

/**
 * Add custom columns to the Task post type.
 *
 * @param array $columns The existing columns.
 * @return array Modified columns.
 */
function ggsswp_task_columns( $columns ) {
    $new_columns = array();
    
    // Insert columns after title
    foreach ( $columns as $key => $value ) {
        $new_columns[ $key ] = $value;
        
        if ( $key === 'title' ) {
            $new_columns['size'] = __( 'Size', 'ggsswp' );
            $new_columns['focus'] = __( 'Focus', 'ggsswp' );
            $new_columns['goal'] = __( 'Goal', 'ggsswp' );
            $new_columns['project'] = __( 'Project', 'ggsswp' );
            $new_columns['client'] = __( 'Client', 'ggsswp' );
        }
    }
    
    return $new_columns;
}
add_filter( 'manage_task_posts_columns', 'ggsswp_task_columns' );

/**
 * Display the content for the custom Project columns.
 *
 * @param string $column_name The name of the column.
 * @param int    $post_id     The current post ID.
 */
function ggsswp_project_column_content( $column_name, $post_id ) {
    if ( $column_name === 'client' ) {
        $client_id = get_post_meta( $post_id, '_client_id', true );
        if ( $client_id ) {
            $client = get_post( $client_id );
            if ( $client ) {
                echo '<a href="' . esc_url( get_edit_post_link( $client_id ) ) . '">' . esc_html( $client->post_title ) . '</a>';
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    }
}
add_action( 'manage_project_posts_custom_column', 'ggsswp_project_column_content', 10, 2 );

/**
 * Display the content for the custom Goal columns.
 *
 * @param string $column_name The name of the column.
 * @param int    $post_id     The current post ID.
 */
function ggsswp_goal_column_content( $column_name, $post_id ) {
    if ( $column_name === 'project' ) {
        $project_id = get_post_meta( $post_id, '_project_id', true );
        if ( $project_id ) {
            $project = get_post( $project_id );
            if ( $project ) {
                echo '<a href="' . esc_url( get_edit_post_link( $project_id ) ) . '">' . esc_html( $project->post_title ) . '</a>';
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'client' ) {
        $project_id = get_post_meta( $post_id, '_project_id', true );
        if ( $project_id ) {
            $client_id = get_post_meta( $project_id, '_client_id', true );
            if ( $client_id ) {
                $client = get_post( $client_id );
                if ( $client ) {
                    echo '<a href="' . esc_url( get_edit_post_link( $client_id ) ) . '">' . esc_html( $client->post_title ) . '</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    }
}
add_action( 'manage_goal_posts_custom_column', 'ggsswp_goal_column_content', 10, 2 );

/**
 * Display the content for the custom Focus columns.
 *
 * @param string $column_name The name of the column.
 * @param int    $post_id     The current post ID.
 */
function ggsswp_focus_column_content( $column_name, $post_id ) {
    if ( $column_name === 'goal' ) {
        $goal_id = get_post_meta( $post_id, '_goal_id', true );
        if ( $goal_id ) {
            $goal = get_post( $goal_id );
            if ( $goal ) {
                echo '<a href="' . esc_url( get_edit_post_link( $goal_id ) ) . '">' . esc_html( $goal->post_title ) . '</a>';
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'project' ) {
        $goal_id = get_post_meta( $post_id, '_goal_id', true );
        if ( $goal_id ) {
            $project_id = get_post_meta( $goal_id, '_project_id', true );
            if ( $project_id ) {
                $project = get_post( $project_id );
                if ( $project ) {
                    echo '<a href="' . esc_url( get_edit_post_link( $project_id ) ) . '">' . esc_html( $project->post_title ) . '</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'client' ) {
        $goal_id = get_post_meta( $post_id, '_goal_id', true );
        if ( $goal_id ) {
            $project_id = get_post_meta( $goal_id, '_project_id', true );
            if ( $project_id ) {
                $client_id = get_post_meta( $project_id, '_client_id', true );
                if ( $client_id ) {
                    $client = get_post( $client_id );
                    if ( $client ) {
                        echo '<a href="' . esc_url( get_edit_post_link( $client_id ) ) . '">' . esc_html( $client->post_title ) . '</a>';
                    } else {
                        echo '—';
                    }
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    }
}
add_action( 'manage_focus_posts_custom_column', 'ggsswp_focus_column_content', 10, 2 );

/**
 * Display the content for the custom Task columns.
 *
 * @param string $column_name The name of the column.
 * @param int    $post_id     The current post ID.
 */
function ggsswp_task_column_content( $column_name, $post_id ) {
    if ( $column_name === 'size' ) {
        $size = get_post_meta( $post_id, '_task_size', true );
        if ( $size ) {
            // Add a visual indicator for size
            $size_class = 'ggsswp-size-' . strtolower( $size );
            $size_label = '';
            switch ( $size ) {
                case 'S':
                    $size_label = __( 'Small', 'ggsswp' );
                    break;
                case 'M':
                    $size_label = __( 'Medium', 'ggsswp' );
                    break;
                case 'L':
                    $size_label = __( 'Large', 'ggsswp' );
                    break;
            }
            echo '<span class="' . esc_attr( $size_class ) . '">' . esc_html( $size ) . '</span> <span class="screen-reader-text">' . esc_html( $size_label ) . '</span>';
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'focus' ) {
        $focus_id = get_post_meta( $post_id, '_focus_id', true );
        if ( $focus_id ) {
            $focus = get_post( $focus_id );
            if ( $focus ) {
                echo '<a href="' . esc_url( get_edit_post_link( $focus_id ) ) . '">' . esc_html( $focus->post_title ) . '</a>';
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'goal' ) {
        $focus_id = get_post_meta( $post_id, '_focus_id', true );
        if ( $focus_id ) {
            $goal_id = get_post_meta( $focus_id, '_goal_id', true );
            if ( $goal_id ) {
                $goal = get_post( $goal_id );
                if ( $goal ) {
                    echo '<a href="' . esc_url( get_edit_post_link( $goal_id ) ) . '">' . esc_html( $goal->post_title ) . '</a>';
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'project' ) {
        $focus_id = get_post_meta( $post_id, '_focus_id', true );
        if ( $focus_id ) {
            $goal_id = get_post_meta( $focus_id, '_goal_id', true );
            if ( $goal_id ) {
                $project_id = get_post_meta( $goal_id, '_project_id', true );
                if ( $project_id ) {
                    $project = get_post( $project_id );
                    if ( $project ) {
                        echo '<a href="' . esc_url( get_edit_post_link( $project_id ) ) . '">' . esc_html( $project->post_title ) . '</a>';
                    } else {
                        echo '—';
                    }
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    } elseif ( $column_name === 'client' ) {
        $focus_id = get_post_meta( $post_id, '_focus_id', true );
        if ( $focus_id ) {
            $goal_id = get_post_meta( $focus_id, '_goal_id', true );
            if ( $goal_id ) {
                $project_id = get_post_meta( $goal_id, '_project_id', true );
                if ( $project_id ) {
                    $client_id = get_post_meta( $project_id, '_client_id', true );
                    if ( $client_id ) {
                        $client = get_post( $client_id );
                        if ( $client ) {
                            echo '<a href="' . esc_url( get_edit_post_link( $client_id ) ) . '">' . esc_html( $client->post_title ) . '</a>';
                        } else {
                            echo '—';
                        }
                    } else {
                        echo '—';
                    }
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
        } else {
            echo '—';
        }
    }
}
add_action( 'manage_task_posts_custom_column', 'ggsswp_task_column_content', 10, 2 );

/**
 * Add some basic styling for the admin columns.
 */
function ggsswp_admin_column_styles() {
    $screen = get_current_screen();
    if ( ! $screen ) {
        return;
    }

    // Only apply to our post types
    $our_post_types = array( 'client', 'project', 'goal', 'focus', 'task' );
    if ( ! in_array( $screen->post_type, $our_post_types ) ) {
        return;
    }
    ?>
    <style type="text/css">
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
add_action( 'admin_head', 'ggsswp_admin_column_styles' );

/**
 * Make our custom columns sortable.
 *
 * @param array $columns The sortable columns.
 * @return array Modified sortable columns.
 */
function ggsswp_sortable_columns( $columns ) {
    $columns['size'] = 'size';
    return $columns;
}
add_filter( 'manage_edit-task_sortable_columns', 'ggsswp_sortable_columns' );

/**
 * Handle sorting for our custom columns.
 *
 * @param WP_Query $query The WordPress query.
 */
function ggsswp_sort_custom_columns( $query ) {
    if ( ! is_admin() ) {
        return;
    }

    $orderby = $query->get( 'orderby' );

    if ( 'size' === $orderby ) {
        $query->set( 'meta_key', '_task_size' );
        $query->set( 'orderby', 'meta_value' );
    }
}
add_action( 'pre_get_posts', 'ggsswp_sort_custom_columns' );
?>
