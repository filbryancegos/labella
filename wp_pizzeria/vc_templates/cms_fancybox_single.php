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
    $image_url = '';
    if (!empty($atts['item_image'])) {
        $attachment_image = wp_get_attachment_image_src($atts['item_image'], 'wp_pizzeria_rectangle-small');
        $image_url = $attachment_image[0];
    }
    $button_classes='';
    if(isset($atts['btn_style']) && !empty($atts['btn_style'])){
        $button_classes.=' '.$atts['btn_style'];
    }
    if(isset($atts['btn_size']) && !empty($atts['btn_size'])){
        $button_classes.=' '.$atts['btn_size'];
    }
    if(isset($atts['button_text_size']) && !empty($atts['button_text_size'])){
        $button_classes.=' '.$atts['button_text_size'];
    }
    if(isset($atts['btn_color']) && !empty($atts['btn_color'])){
        $button_classes.=' '.$atts['btn_color'];
    }else{
        $button_classes.=' ';
    }
    if(isset($atts['button_heavy']) && !empty($atts['button_heavy'])){
        $button_classes.=' button_heavy';
    }
    if(isset($atts['button_uppercase']) && !empty($atts['button_uppercase'])){
        $button_classes.=' button-uppercase';
    }

    $column_classes='';
    if(empty($atts['title']) && empty($atts['description'])){
        $column_classes='centered-column-bottom';
    }
    $item_align='';
    if($atts['content_align']=='left'){
         $item_align='cms-fancyboxes-item-left';
    }elseif($atts['content_align']=='right'){
         $item_align='cms-fancyboxes-item-right';
    }elseif($atts['content_align']=='center'){
         $item_align='text-center';
    }
    if(isset($atts['btn_custom_color']) && !empty($atts['btn_custom_color'])){
        $button_style ='style="color:'.$btn_custom_color.'; border-color:'.$btn_custom_color.';"';
    }else{
        $button_style='';
    }

?>
<div class="cms-fancyboxes-wrap <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($animation_classes); ?>" id="<?php echo esc_attr($atts['html_id']);?>" <?php echo ''.$wrapper_attributes; ?>>

<a href="#" class="<?php echo esc_attr($atts['template']);?>" >

    <div class="cms-fancyboxes-items">
        <?php if(!empty($image_url)):?>
            <img alt="<?php echo esc_html__('item image','wp_pizzeria');?>" src="<?php echo esc_url($image_url); ?>" />
        <?php endif; ?>
        <div class="cms-fancyboxes-item-over">
            <div class="centered-columns">
                <div class="centered-column <?php echo esc_attr($column_classes); ?>">
                    <div class="cms-fancyboxes-item-detail <?php echo esc_attr($item_align); ?>">
                        <?php if(!empty($atts['title'])): ?>
                            <h2><?php echo apply_filters('the_title',$atts['title']);?></h2>
                        <?php endif; ?>
                        <?php if(!empty($atts['description'])): ?>
                            <div class="cms-fancyboxes-item-desc">
                                <?php echo apply_filters('the_content',$atts['description']);?>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($atts['button_text']) && !empty($atts['button_text'])): ?>
                            <span  class="<?php echo esc_attr($button_classes); ?>" <?php echo ''.$button_style; ?>><?php echo esc_attr($atts['button_text']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</a>
</div>