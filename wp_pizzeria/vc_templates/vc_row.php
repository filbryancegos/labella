<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $full_width = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $row_data = $row_style = $html_overlay_row=$html_left=$html_right ='';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
switch ($bg_style){
    case 'img_parallax':
            $css_classes[]= " cms_parallax";
            $row_data .= " data-speed = $bd_p_speed";
            $row_style .= "background-position: 50% 0;background-attachment:fixed;";

        break;
    case 'img_fixed':
        $row_style .= "background-attachment:fixed;background-repeat: no-repeat;";
        $css_classes[]='background-image-fixed';
        break;
}
if( isset($row_color_text) && !empty($row_color_text)){
	$row_style .="color:".$row_color_text;
}
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
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $content_placement ) ) {
		$css_classes[] = ' vc_row-o-content-' . $content_placement;
	}
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if($overlay_row == 'yes') {
    $html_overlay_row .= '<div class="cms-overlay-color" style="background-color: '.$overlay_color.'; opacity: '.$overlay_opacity.';"></div>';
    $css_classes[]='row-overlay-color';
    $css_classes[]='relative-container';
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

if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$style = ' style ="'.$row_style.'"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' '.$row_data.' '.$style.' >';
$output.=$html_left; 
$output.=$html_overlay_row; 

$output .= wpb_js_remove_wpautop( $content );
$output.=$html_right; 
$output .= '</div>';
$output .= $after_output;

echo ''.$output;