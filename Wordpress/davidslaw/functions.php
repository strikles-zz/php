<?php

/**
 * Include theme constants
 */
require_once 'includes/constants.php';

/**
 * Remove Junk from head
 */
require_once 'includes/clean-head.php';

/**
 * Remove Junk from head
 */
require_once 'includes/bankruptcy_reports.php';

/**
 * Load the Stylesheets
 */
require_once 'includes/styles.php';

/**
 * Load the Scripts
 */
require_once 'includes/scripts.php';

/**
 * Load the Scripts
 */
require_once 'includes/wp_bootstrap_navwalker.php';

/**
 * Disable admin bar
 */
function remove_admin_bar() {
	  show_admin_bar(false);
}
add_action('after_setup_theme', 'remove_admin_bar');

add_theme_support( 'menus' );

// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus(
    array(
    	'header_navigation' => __( 'Header Navigation' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );

//excerpt adjustment

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );