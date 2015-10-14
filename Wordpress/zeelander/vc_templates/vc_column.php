<?php
/**
 * @var $this WPBakeryShortCode_VC_Column
 */
$output = $font_color = $el_class = $width = $offset = '';
extract( shortcode_atts( array(
	'font_color' => '',
	'el_class' => '',
	'width' => '1/1',
	'css' => '',
	'offset' => ''
), $atts ) );

$el_class = $this->getExtraClass( $el_class );
if ($width == '2/4') {
	$width = '1/2';
}
//echo $width;
$width = wpb_translateColumnWidthToSpan( $width );
//echo $width;

$width = 'col-' . substr($width, strpos($width, 'sm-'));

//$width = vc_column_offset_class_merge( $offset, $width );
//$el_class .= ' wpb_column vc_column_container';
$style = $this->buildStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class, $this->settings['base'], $atts );

$output .= "\n\t" . '<div class="' . trim( $css_class . ' ' . vc_shortcode_custom_css_class( $css, ' ' ) ). '"' . $style . '>';
//$output .= "\n\t\t" . '<div class="wpb_wrapper">';
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
//$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $el_class ) . "\n";

echo $output;
//print_r($width);