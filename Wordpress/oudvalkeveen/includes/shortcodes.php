<?php

function youtube_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'url' 			=> 'no foo',
		'title' 		=> 'default baz',
		'description' 	=> '',
		'image' 		=> 'http://oudvalkeveen.dev.eenvoudmedia.nl/wp-content/uploads/2015/03/youtube-logo.jpg'
	), $atts, 'bartag' );

	$html = '<a class="youtube" href="' . $atts['url'] . '?rel=0&amp;wmode=transparent">
				<img src="' . wp_get_attachment_image_src( $atts['image'],'full')[0]. '" alt="" />
				<div class="top-desc">
					<h2>' . $atts['title'] . '</h2>
				</div>
				<p class="description">' . $atts['description'] . '</p>
			</a>';



	return $html;
}
add_shortcode( 'youtube', 'youtube_shortcode' );


add_action( 'vc_before_init', 'youtube_shortcode_vc_map' );
function youtube_shortcode_vc_map() {
    vc_map( array(
        "name" => __( "Youtube", "my-text-domain" ),
        "base" => "youtube",
        "class" => "",
        "category" => __( 'Content', 'my-text-domain' ),
        "params" => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => 'Geef een titel op'
			),
			array(
				'type' => 'textfield',
				'heading' => 'Youtube URL',
				'param_name' => 'url',
				'description' => 'Voert u hier a.u.b. de link naar de youtube video in'
			),
            array(
				'type' => 'attach_images',
				'heading' => __( 'Images', 'js_composer' ),
				'param_name' => 'image',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),
			array(
				'type' => 'textarea', //'textarea_html',
				'holder' => 'div',
				'class' => 'vc_toggle_content',
				'heading' => 'Omschrijving',
				'param_name' => 'description',
				'value' => __( '<p>Voorbeeld bericht over deze video</p>', 'js_composer' ),
				'description' => 'Geef een omschrijving op'
			),
        ),
    ) );
}