<?php

class WPBakeryShortCode_fullimage_withcontent extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		//print_r($atts); die();

		$atts = shortcode_atts( array(
			'image'                       => '',
			'height'                      => 30,
			'height_xs'                   => 15,
			'background_size'             => 1,
			'background_position_y'       => 2,
			'image_crop'                  => 0,
			'content'                     => '',
			'content_action_button'       => '',
			'content_action_button_class' => '',
			'content_action_button_url'   => '',
			'background_color'            => 'rgba(255,255,255,0.7)',
			'background_width'            => '50%',
			'background_height'           => '50%',
			'background_padding'          => '2'
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

		$content_background_style_pieces = [
			'margin'  => "margin-top: 3rem",
			'float'   => "float: right",
			'sizing'  => "box-sizing:border-box",
			'color'   => "background-color:".$atts['background_color'],
			'height'  => "height:".$atts['background_height'],
			'width'   => "width:".$atts['background_width'],
			'padding' => "padding:".$atts['background_padding']."rem"
		];

		$content_background_style_pieces_mobile = [
			'margin'  => "margin:1rem auto",
			'sizing'  => "box-sizing:border-box",
			'color'   => "background-color:".$atts['background_color'],
			'height'  => "height:90%",
			'width'   => "width:90%",
			'padding' => "padding:".$atts['background_padding']."rem"

		];

		$content_style = implode(';', $content_background_style_pieces);
		$content_style_mobile = implode(';', $content_background_style_pieces_mobile);

		$action_btn = "";
		$action_btn_url = get_bloginfo('url').$atts['content_action_button_url'];
		if(!empty($atts['content_action_button']))
		{
			$action_btn .= "</p><br /><a href='".$action_btn_url."' class='".$atts['content_action_button_class']."'>".$atts['content_action_button']."</a>";
		}

		$content_html = "<div class='container'><div style='".$content_style."'>".$content.$action_btn."</div></div>";
		$content_html_mobile = "<div class='container'><div style='".$content_style_mobile."'>".$content.$action_btn."</div></div>";

		$html = '
			<header class="row full-width-image-withcontent">
				<div class="background hidden-xs" style="position: relative; background-image: url(\''.
					$img_url . '\'); background-position: ' .
					$background_position_y . ' center; height:' .
					$height . 'rem; background-size:' .
					$background_size . '; background-repeat: repeat-x">'.$content_html.'</div>
				<div class="background visible-xs" style="position: relative; background-image: url(\''.
					$img_url . '\'); background-position: ' .
					$background_position_y . ' center; min-height:' .
					$height_xs . 'rem; background-size:' .
					$background_size . '; background-repeat: repeat-x">'.$content_html_mobile.'</div>
			</header>
		';

		return $html;
	}
}

add_action( 'vc_before_init', 'eenvoud_fullimage_withcontent_vc_mp' );


function eenvoud_fullimage_withcontent_vc_mp() {

    vc_map( [
        "name" 				=> 'Full Image with content',
        "base" 				=> "fullimage_withcontent",
        "class" 			=> "",
        "category" 			=> 'Content',
        'admin_enqueue_css' =>  get_bloginfo('template_url') . '/includes/vc-templates/assets/css/page-header-admin.css',
        'admin_enqueue_js' 	=>  get_bloginfo('template_url') . '/includes/vc-templates/assets/js/page-header-admin.js',
        'js_view'           => 'ViewPaginaHeader',
        "params" => [
			[
				'type'        => 'textarea_html',
				'holder'      => 'div',
				'class'       => 'custom_class_for_element', //will be outputed in the backend editor
				'heading'     => __( 'Content', 'js_composer' ),
				'param_name'  => 'content', //param_name for textarea_html must be named "content"
				'value'       => __( '', 'js_composer' ),
				'description' => __( 'Dummy text for content element.', 'js_composer' )
			],
			[
				'type' => 'textfield',
				'heading' => 'Content Action Button',
				'holder' => '',
				'param_name' => 'content_action_button',
				'description' => 'Button Text'
			],
			[
				'type' => 'textfield',
				'heading' => 'Content Action Button Class',
				'holder' => '',
				'param_name' => 'content_action_button_class',
				'description' => 'Button Class'
			],
			[
				'type' => 'textfield',
				'heading' => 'Content Action Button URL',
				'holder' => '',
				'param_name' => 'content_action_button_url',
				'description' => 'Button URL'
			],
			[
				'type' => 'colorpicker',
				'heading' => 'Content Background',
				'value'		=> '',
				'holder' => '',
				'param_name' => 'background_color',
				'description' => 'Choose a background color for the content'
			],
			[
				'type' => 'textfield',
				'heading' => 'Background Height',
				'holder' => '',
				'param_name' => 'background_height',
				'description' => 'Background Height'
			],
			[
				'type' => 'textfield',
				'heading' => 'Background Width',
				'holder' => '',
				'param_name' => 'background_width',
				'description' => 'Background Width'
			],
			[
				'type' => 'textfield',
				'heading' => 'Background Padding',
				'holder' => '',
				'param_name' => 'background_padding',
				'description' => 'Padding in rem units (1 rem is 10px)'
			],
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
