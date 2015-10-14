<?php

class WPBakeryShortCode_treatment_block extends WPBakeryShortCode {


	protected function content( $atts, $content = null ) {
		$atts = shortcode_atts( array(
			'title' 		=> 'Geen titel opgegeven',
			'button_text' 	=> '',
			'button_link' 	=> '',
			'text' 		=> ''
		), $atts );

		$title 		= $atts['title'];
		$button_text = $atts['button_text'];
		$button_link = $atts['button_link'];
		$text 	= $atts['text'];

		$html = '
			<div class="treatment-block">
				<div class="treatment-block-title">' . $title . '</div>
				<div class="treatment-block-content top-gap-sm">' . $text . '</div>
				<div class="row top-gap-sm">
					<div class="col-md-12 col-md-offset-0 col-sm-12">
						<a href="' . $button_link . '" class="blue-btn">' . $button_text . '</a>
					</div>
				</div>		
			</div>
		';

		return $html;
	}

	

}

add_action( 'vc_before_init', 'eenvoud_treatment_block' );


function eenvoud_treatment_block() {
	//$shortcode = new WPBakeryShortCode_Header_Shortcode(['base' => 'pagina_header']);

    vc_map( [
        "name" 				=> 'Treatment block',
        "base" 				=> "treatment_block",
        "class" 			=> "",
        "category" 			=> 'Content',
        'admin_enqueue_css' =>  get_bloginfo('template_url') . '/includes/vc-templates/assets/css/treatment-block-admin.css',
        'admin_enqueue_js' 	=>  get_bloginfo('template_url') . '/includes/vc-templates/assets/js/treatment-block-admin.js',
        'js_view'           => 'ViewTreatmentBlock',
        "params" => [
			[
				'type' => 'textfield',
				'heading' => 'Title',
				'holder' => 'h3',
				'param_name' => 'title',
				'description' => 'Title for block'
			],
			[
				'type' => 'textfield',
				'heading' => 'Button text',
				'holder' => 'button',
				'param_name' => 'button_text',
				'description' => 'Text for read more button'
			],
			[
				'type' => 'textfield',
				'heading' => 'Button link',
				'holder' => 'a',
				'param_name' => 'button_link',
				'description' => 'Link for read more button'
			],
			[
				'type' => 'textarea',
				'heading' => 'Content',
				'holder' => 'div',
				'param_name' => 'text',
				'description' => 'The block content'
			]
        ]
	]);
}