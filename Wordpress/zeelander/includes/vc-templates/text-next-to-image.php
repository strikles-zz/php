<?php

class WPBakeryShortCode_text_next_to_image extends WPBakeryShortCode {


	protected function content( $atts, $content = null ) {

		//print_r($atts); die();

		$atts = shortcode_atts( array(
			'title' 		=> 'Geen titel opgegeven',
			'image' 		=> '',
			'text_left'		=> true
		), $atts );

		//print_r($atts); die();

		$img_url	= wp_get_attachment_image_src( $atts['image'],'full')[0];
		$text_left	= $atts['text_left'];

		$text_html = '
			<div class="text-container col-sm-5">
				<section class="content">' . apply_filters('the_content', $content) . '</section>
			</div>
		';

		$image_html = '
			<div class="img-container col-sm-7" style="background-image: url(\'' . $img_url . '\');">
				<div class="background">
					<img class="img-responsive header-pic" src="' . $img_url . '" alt="header">
				</div>
			</div>
		';
			
	
		
		$html = '<div class="wpb_text_next_to_image"><div class="shortcode-container row clearfix">

		' . ( $text_left == 1 ? $text_html . "\r\n" . $image_html : $image_html . "\r\n" . $text_html ). '
		</div></div>';

		return $html;
	}

}
	
vc_map( [
    "name" => 'Tekst naast afbeelding',
    "base" => "text_next_to_image",
    "class" 			=> "",
    "category" 			=> 'Content',
    'admin_enqueue_css' =>  get_bloginfo('template_url') . '/includes/vc-templates/assets/css/text-next-to-image-admin.css',
    'admin_enqueue_js' 	=>  get_bloginfo('template_url') . '/includes/vc-templates/assets/js/text-next-to-image-admin.js',
    'js_view'           => 'ViewTextNextToImage',
    "params" => [
		[
			'type' => 'textarea_html',
			'heading' => 'Tekst',
			'holder' => 'div',
			'param_name' => 'content',
			'description' => 'Geef hier de content in'
		],
        [
			'type' => 'attach_image',
			'heading' => 'Afbeelding',
			'param_name' => 'image',
			'holder' => 'img',
			'description' => 'Geef hier a.u.b. een achtergrondafbeelding op'
		],
		[
			'type' => 'dropdown',
			'heading' => 'Positie',
			'param_name' => 'text_left',
			'value'	=> ['Tekst links' => 1, 'Tekst rechts' => 2],
			'holder' => '',
			//'description' => 'Geef hier a.u.b. een achtergrondafbeelding op'
		]

    ]
]);
