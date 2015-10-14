<?php

add_action( 'init', 'register_cpt_fotoboek' );

function register_cpt_fotoboek() {

    $labels = array(
        'name' => _x( 'Fotoboeken', 'fotoboek' ),
        'singular_name' => _x( 'Fotoboek', 'fotoboek' ),
        'add_new' => _x( 'Add New', 'fotoboek' ),
        'add_new_item' => _x( 'Add New Fotoboek', 'fotoboek' ),
        'edit_item' => _x( 'Edit Fotoboek', 'fotoboek' ),
        'new_item' => _x( 'New Fotoboek', 'fotoboek' ),
        'view_item' => _x( 'View Fotoboek', 'fotoboek' ),
        'search_items' => _x( 'Search Fotoboeken', 'fotoboek' ),
        'not_found' => _x( 'No fotoboeken found', 'fotoboek' ),
        'not_found_in_trash' => _x( 'No fotoboeken found in Trash', 'fotoboek' ),
        'parent_item_colon' => _x( 'Parent Fotoboek:', 'fotoboek' ),
        'menu_name' => _x( 'Fotoboeken', 'fotoboek' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'thumbnail' ),

        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,


        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'fotoboek', $args );
}