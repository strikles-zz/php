<?php

function eenvoud_roots_scripts()
{
    wp_enqueue_script( 'eenvoud_script', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), THEME_VERSION, true);
    //wp_enqueue_script( 'acf_maps', get_template_directory_uri() . '/assets/js/acfmaps.js', array('jquery'), THEME_VERSION, true);
}

if (!is_admin()) {
    add_action( 'wp_enqueue_scripts', 'eenvoud_roots_scripts' );
}

