<?php

/*=================================================================
=            Create the faillissement story Custom Post Type            =
=================================================================*/

    /*==========  Add the faillissement to the init  ==========*/

    add_action( 'init', 'register_cpt_faillissement' );

    /*==========  Register the faillissement CPT function  ==========*/

    function register_cpt_faillissement() {

        $labels = array(
            'name' => _x( 'Faillissementen', 'faillissement' ),
            'singular_name' => _x( 'faillissement', 'faillissement' ),
            'add_new' => _x( 'Nieuwe Toevoegen', 'faillissement' ),
            'add_new_item' => _x( 'Nieuw Entry Toevoegen', 'faillissement' ),
            'edit_item' => _x( 'Entry Bewerken', 'faillissement' ),
            'new_item' => _x( 'Nieuw Entry', 'faillissement' ),
            'view_item' => _x( 'Entry Bekijken', 'faillissement' ),
            'search_items' => _x( 'Entry Zoeken', 'faillissement' ),
            'not_found' => _x( 'Geen entry gevonden', 'faillissement' ),
            'not_found_in_trash' => _x( 'Geen entry gevonden in Trash', 'faillissement' ),
            'parent_item_colon' => _x( 'Parent entry:', 'faillissement' ),
            'menu_name' => _x( 'Faillissementen', 'faillissement' ),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'description' => 'Faillissementen',
            'supports' => array( 'title', 'author', 'editor'),

            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,


            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => false,
            'can_export' => true,
            'rewrite' => ['slug' => 'faillissementen'],
            'capability_type' => 'post'
        );

        register_post_type( 'faillissement', $args );
    }

    // ADD NEW COLUMNS
   	add_filter('manage_edit-faillissement_columns', 'faillissement_head');
	function faillissement_head($defaults) {
	    $temp['author'] = $defaults['author'];
	    $temp['date'] = $defaults['date'];
	    unset($defaults['author']);
	    unset($defaults['date']);

	    $defaults['samenvatting'] = 'Samenvatting';
	    $defaults['author'] = $temp['author'];
	    $defaults['date'] = $temp['date'];
	    //print_r($defaults); die();
	    return $defaults;
	}

	// SET CONTENT FOR NEW COLUMNS
	add_action('manage_faillissement_posts_custom_column', 'faillissement_content', 10, 2);
	function faillissement_content($column_name, $post_id) {
	    if ($column_name == 'samenvatting') {
	    	echo get_the_content($post_id);
	    }

	}

	// SET SORTABLE COLUMNS
	add_filter('manage_edit-faillissement_sortable_columns', 'faillissement_sortable_columns');
	function faillissement_sortable_columns( $columns ){

		$columns['stemmen'] = 'stemmen';

		return $columns;

	}

	// HANDLE SORTABLE COLUMNS
	add_filter('requests', 'faillissement_column_sorting');
	function faillissement_column_sorting( $vars ){
		if( isset($vars['orderby']) && 'stemmen' == $vars['orderby'] ){
			$vars = array_merge( $vars, array(
				'meta_key' => 'votes',
				'orderby'  => 'meta_value_num'
			));
		}
		return $vars;
	}


/*-----  End of Create the faillissement story Custom Post Type  ------*/

?>