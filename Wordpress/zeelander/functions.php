<?php

/**
 * Include theme constants
 */
require_once 'includes/constants.php';

/**
 * Add custom post-types
 */
require_once 'includes/post-types.php';

/**
 * Remove Junk from head
 */
require_once 'includes/clean-head.php';

/**
 * Load the Stylesheets
 */
require_once 'includes/styles.php';

/**
 * Load the Scripts
 */
require_once 'includes/scripts.php';

/**
 * Enable/Disable functionality
 */
require_once 'includes/functionality.php';

/**
 * Add admin modifications
 */
require_once 'includes/admin/admin.php';

/**
 * Visual Composer Custom Elements (shortcodes)
 */
require_once 'includes/vc-templates/vc-templates.php';


function requireToVar($file){
    ob_start();
    require($file);
    return ob_get_clean();
}


//Add Excerpts to Pages
add_action('init', 'yourprefix_add_page_excerpt_support');

function yourprefix_add_page_excerpt_support() {
	add_post_type_support( 'page', 'excerpt' );
}