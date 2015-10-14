<?php

function eenvoud_roots_styles()
{
    if (get_template_directory_uri() . '/assets/css/vendor.min.css'){
        wp_enqueue_style( 'vendor_styles', get_template_directory_uri() . '/assets/css/vendor.min.css', array(), THEME_VERSION );
    }
    wp_enqueue_style( 'eenvoud_style', get_template_directory_uri() . '/assets/css/style.min.css', array(), THEME_VERSION);
    //wp_enqueue_style( 'gravity_reset', get_template_directory_uri() . '/assets/css/gf_reset.css', array('gforms_formsmain_css', 'gforms_ready_class_css', 'gforms_reset_css', 'gforms_browsers_css'), THEME_VERSION);
}

if (!is_admin()) {
	add_action( 'wp_enqueue_scripts', 'eenvoud_roots_styles' );
}