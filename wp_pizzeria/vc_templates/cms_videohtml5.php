<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
parse_str( parse_url( $video_link, PHP_URL_QUERY ), $vars );
if ( ! isset( $vars['v'] ) ) {
        $video_id= '';
}else{
    $video_id =$vars['v'];
}
$style=$overlay_style='';
$image=wp_get_attachment_image_src($poster,'full',false);
if(!empty($image[0])){
    $style .= 'background-image:url('.$image[0].');';
}
if(!empty($video_height)){
    $style .= ' height:'.$video_height.'px;';
}
if(!empty($style)){
    $style = 'style="'.$style.'"';
}
if(isset($overlay) && $overlay){
	$overlay_image=wp_get_attachment_image_src($overlay_image,'full',false);
	$overlay_style .='top:0; left:0; width:100%; height:100%;';
	if(!empty($overlay_image[0])){
	    $overlay_style .= 'background-image:url('.$overlay_image[0].');';
	}
	if(!empty($overlay_color)){
		$overlay_style .= 'background-color:'.$overlay_color.';';
	}
	if(!empty($overlay_opacity)){
		$overlay_style .= 'opacity:'.$overlay_opacity.';';
	}
}
if(!empty($overlay_style)){
	$overlay_style = 'style="'.$overlay_style.'"';
}
?>
 <?php if(!empty($video_id)): ?>
<?php if($video_style=='custom'): ?>
 <div class="cms-videos cms-video-wrapper" <?php echo  ''.$style; ?>>
<?php else: ?>
	<div class="cms-videos cms-video-wrapper" >
<?php endif; ?>
 	<?php if(($video_style=='custom') && isset($overlay) && $overlay): ?>
 		<div class="cms-video-overlay" <?php echo ''.$overlay_style; ?>></div>
 	<?php endif; ?>
 	<?php if($video_style=='custom'): ?>
    <div id="<?php echo esc_attr($html_id); ?>-play" class="cms-video-main-play icon-video onscroll-animate" data-delay="200" data-animation="fadeIn"></div>
    <?php endif; ?>
    <iframe id="<?php echo esc_attr($html_id); ?>" class=" <?php echo (($video_style=='custom')? 'cms-video-main' :'cms-video-main-default') ?>" src="<?php echo esc_url('http://www.youtube.com/embed/'.$video_id.'?enablejsapi=1&amp;html5=1') ?>" allowfullscreen></iframe>

</div>
<?php endif; ?>
