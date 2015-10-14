<?php

class WPBakeryShortCode_pagina_header extends WPBakeryShortCode {


	protected function content( $atts, $content = null ) {

		//print_r($atts); die();

		$atts = shortcode_atts( array(
			'image' 				=> '',
			'height'				=> '50vh',
			'height_xs'				=> '15rem',
			'background_size' 		=> 1,
			'background_position_y' => 2,
			'image_crop'			=> 0,
		), $atts );

		//print_r($atts); die();
		$image_size = $atts['image_crop'] ? 'full' : 'full-width-slider' ;

		$img_url				= wp_get_attachment_image_src( $atts['image'], $image_size)[0];
		$height 				= $atts['height'];
		$height_xs 				= $atts['height_xs'];


		switch ($atts['background_position_y']) {
			case 1:
				$background_position_y = 'top';
				break;
			case 2:
				$background_position_y = 'center';
				break;
			case 3:
				$background_position_y = 'bottom';
				break;
		}

		switch ($atts['background_size']) {
			case 1:
				$background_size = 'cover';
				break;
			case 2:
				$background_size = 'contain';
				break;
		}


		$html = '
			<header class="row full-width-header">
				<div class="background hidden-xs" style="background-image: url(\''.
					$img_url . '\'); background-position: ' .
					$background_position_y . ' center; height:' .
					$height . '; background-size:' .
					$background_size . '; background-repeat: repeat-x"></div>
				<div class="background visible-xs" style="background-image: url(\''.
					$img_url . '\'); background-position: ' .
					$background_position_y . ' center; height:' .
					$height_xs . '; background-size:' .
					$background_size . '; background-repeat: repeat-x"></div>
			</header>
		';

		return $html;
	}
}

add_action( 'vc_before_init', 'eenvoud_page_header_vc_mp' );


function eenvoud_page_header_vc_mp() {
	//$shortcode = new WPBakeryShortCode_Header_Shortcode(['base' => 'pagina_header']);

    vc_map( [
        "name" 				=> 'Full Image',
        "base" 				=> "pagina_header",
        "class" 			=> "",
        "category" 			=> 'Content',
        'admin_enqueue_css' =>  get_bloginfo('template_url') . '/includes/vc-templates/assets/css/page-header-admin.css',
        'admin_enqueue_js' 	=>  get_bloginfo('template_url') . '/includes/vc-templates/assets/js/page-header-admin.js',
        'js_view'           => 'ViewPaginaHeader',
        "params" => [
			// [
			// 	'type' => 'textarea',
			// 	'heading' => 'Ondertitel',
			// 	'holder' => 'div',
			// 	'param_name' => 'sub_title',
			// 	'description' => 'Geef hier een ondertitel of korte tekst in'
			// ],
			// [
			// 	'type' => 'colorpicker',
			// 	'heading' => 'Tekst kleur',
			// 	'value'		=> '#000000',
			// 	'holder' => '',
			// 	'param_name' => 'color',
			// 	'description' => 'Kies een kleur voor de titel en de ondertitel'
			// ],
            [
				'type' => 'attach_image',
				'heading' => 'Background image',
				'param_name' => 'image',
				'holder' => 'img',
				'description' => 'Please provide a background image'
			],
			[
				'type' => 'textfield',
				'heading' => 'Height',
				'holder' => '',
				'param_name' => 'height',
				'description' => 'Height in rem units (1 rem is 10px)'
			],
			[
				'type' => 'textfield',
				'heading' => 'Height on mobile',
				'holder' => '',
				'param_name' => 'height_xs',
				'description' => 'Height in rem units (1 rem is 10px)'
			],
			[
				'type' => 'dropdown',
				'heading' => 'Image size',
				'param_name' => 'background_size',
				'value'	=> ['Cover' => 1, 'Contain' => 2],
				'holder' => '',
				//'description' => 'Geef hier a.u.b. een achtergrondafbeelding op'
			],
			[
				'type' => 'dropdown',
				'heading' => 'Image horizontal allignment',
				'param_name' => 'background_position_y',
				'value'	=> ['Top' => 1, 'Center' => 2, 'Bottom' => 3],
				'holder' => '',
				//'description' => 'Geef hier a.u.b. een achtergrondafbeelding op'
			],
			[
				'type' => 'checkbox',
				'heading' => 'Don\'t crop image?',
				'param_name' => 'image_crop',
				'holder' => '',
				'value'      => array( 'Please do not crop my image' => 1 ),
				//'description' => 'Geef hier a.u.b. een achtergrondafbeelding op'
			]

        ]
	]);
}
