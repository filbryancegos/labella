<?php 
    if(!empty($atts['timeout'])){
        $timeout=$atts['timeout'];
    }else{
        $timeout=200;
    }
    if(!empty($atts['animation'])){
        $animation_classes=' onscroll-animate';
        $wrapper_attributes= ' data-animation="'.$atts['animation'].'"';
        $wrapper_attributes.= ' data-delay="'.$timeout.'"';
    }else{
        $animation_classes=' ';
        $wrapper_attributes='';
    }
    if(!isset($atts['i_type']) || empty($atts['i_type'])){
        $atts['i_type']='svg';
    }
?>
<div class="cms-fancyboxes-wraper <?php echo esc_attr($atts['template']);?> <?php if(!isset($atts['animation_icon']) || empty($atts['animation_icon'])) echo esc_attr($animation_classes); ?>" id="<?php echo esc_attr($atts['html_id']);?>" <?php if(!isset($atts['animation_icon']) || empty($atts['animation_icon'])) echo ''.$wrapper_attributes; ?> >
    <div class="cms-fancyboxes-item" onclick="">
    
        <div class="cms-fancyboxes-item-inner <?php if(isset($atts['animation_icon']) && !empty($atts['animation_icon'])) echo esc_attr($animation_classes); ?>" <?php if(isset($atts['animation_icon']) && !empty($atts['animation_icon'])) echo ''.$wrapper_attributes; ?> >
            <div class="cms-fancyboxes-item-icon">
            <?php if($atts['i_type']=='fonts_icon'): 
                $icon_name = "icon_" . $atts['icon_type'];
                $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
            ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
            <?php else: ?>
                <?php if (isset($atts['svg_icon']) && !empty($atts['svg_icon'])) :
                    $svg = rawurldecode( base64_decode( strip_tags( $atts['svg_icon'] ) ) );
                 ?>
                    <?php echo ''.$svg; ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </div>
    
    <?php if (isset($atts['title']) && !empty($atts['title'])) : ?>
        <h3 class="cms-fancyboxes-item-title bottom-line">
            <?php echo apply_filters('the_title',$atts['title']);?>
        </h3>
    <?php endif; ?>
    <?php if (isset($atts['description']) && !empty($atts['description'])) : ?>
        <div class="cms-fancyboxes-item-desc">
            <?php echo apply_filters('the_content',$atts['description']);?>
        </div>
    <?php endif; ?>
    </div>
</div>