<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $css = $el_id = '';
$output = $after_output = $html_left=$html_right ='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
if(!empty($animation)){
	$css_classes[]='onscroll-animate';
	$wrapper_attributes[]= 'data-animation="'.esc_attr($animation).'"';
	$wrapper_attributes[]= 'data-delay="'.esc_attr($timeout).'"';
}
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if(isset($left_icon) && $left_icon){
	$css_classes []='relative-container';
	$left_icon_style='';
	$left_image = wp_get_attachment_image_src($left_icon_image,'full',false);
	if(!empty($left_image[0])){
		$left_icon_style .=' background-image:url('.$left_image[0].');';
	}
	if(!empty($left_icon_width)){
		$left_icon_style .=' width:'.$left_icon_width.'px;';
	}
	if(!empty($left_icon_height)){
		$left_icon_style .=' height:'.$left_icon_height.'px;';
	}
	switch ($left_position) {
		case 'top':
			$left_icon_style .=' top:0;';
			break;
		case 'bottom':
			$left_icon_style .=' bottom:0;';
			break;
		case 'middle':
			$left_icon_style .=' top:50%; -o-transform:translateY(-50%);-ms-transform:translateY(-50%);-moz-transform:translateY(-50%);-khtml-transform:translateY(-50%);transform:translateY(-50%); -webkit-transform:translateY(-50%)';
			break;
		default:
			$left_icon_style .=' top:0;';
			break;
	}
	if(!empty($left_icon_style)){
		$left_icon_style = 'style="'.$left_icon_style.'"';
	}
	$html_left ='<div class="wp-pizzeria-row-left hidden-sm hidden-xs" '.$left_icon_style.'></div>';
}

if(isset($right_icon) && $right_icon){
	$css_classes []='relative-container';
	$right_icon_style='';
	$right_image = wp_get_attachment_image_src($right_icon_image,'full',false);
	if(!empty($right_image[0])){
		$right_icon_style .=' background-image:url('.$right_image[0].');';
	}
	if(!empty($right_icon_width)){
		$right_icon_style .=' width:'.$right_icon_width.'px;';
	}
	if(!empty($right_icon_height)){
		$right_icon_style .=' height:'.$right_icon_height.'px;';
	}
	switch ($right_position) {
		case 'top':
			$right_icon_style .=' top:0;';
			break;
		case 'bottom':
			$right_icon_style .=' bottom:0;';
			break;
		case 'middle':
			$right_icon_style .=' top:50%; -o-transform:translateY(-50%);-ms-transform:translateY(-50%);-moz-transform:translateY(-50%);-khtml-transform:translateY(-50%);transform:translateY(-50%); -webkit-transform:translateY(-50%)';
			break;
		default:
			$right_icon_style .=' top:0;';
			break;
	}
	if(!empty($right_icon_style)){
		$right_icon_style = 'style="'.$right_icon_style.'"';
	}
	$html_right ='<div class="wp-pizzeria-row-right hidden-sm hidden-xs" '.$right_icon_style.'></div>';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output.=$html_left;
$output .= wpb_js_remove_wpautop( $content );
$output.=$html_right; 
$output .= '</div>';
$output .= $after_output;

echo ''.$output;