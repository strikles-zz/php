<?php

/**
 * Disable admin bar
 */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page( __('Locations', 'Zeelander') );
}

/**
 * Disable admin bar
 */
function remove_admin_bar() {
	  show_admin_bar(false);
}
add_action('after_setup_theme', 'remove_admin_bar');

/*
Plugin Name: Remove Author Pages
Description: Trigger 404 error on author pages and change author links to home
Author: Vinicius Pinto <contact@codense.com>
Version: 0.2
*/

function remove_author_pages_page() {
	if ( is_author() ) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
	}
}

function remove_author_pages_link( $content ) {
	return get_option( 'home' );
}


require_once('wp_bootstrap_navwalker.php');
function zeelander_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'zeelander_register_theme_menu' );

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_action( 'template_redirect', 'remove_author_pages_page' );
add_filter( 'author_link', 'remove_author_pages_link' );

remove_filter( 'the_content', 'wpautop' );

