<?php 
$template=$atts['template'];
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

 ?>
<div class="cms-fancyboxes-wraper <?php echo esc_attr($template);?>" id="<?php echo esc_attr($atts['html_id']);?>">

    <div class="row cms-fancyboxes-body">
        <?php
            $columns = ((int)$atts['cms_cols'])?(int)$atts['cms_cols']:1;
            $item_class = "";
            switch($columns){
                    case "1 Column":
                        $item_class = "";
                        break;
                    case "2 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-6";
                        break;
                    case "3 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
                        break;
                    case "4 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-3";
                    case "5 Columns":
                        $item_class = "col-sm-12-5";
                        break;
                    case "6 Columns":
                        $item_class = "col-xs-12 col-sm-6 col-md-4 col-lg-2";
                        break;

                    default:
                        $item_class = "";
                        break;
                }
            for($i=1;$i<=$columns;$i++){ ?>
                <?php 
                    $item_icon='';
                    switch ($atts['icon_type_'.$i]) {
                        case 'fontawesome':
                             $item_icon=$atts['icon_fontawesome_'.$i];
                            break;
                        case 'openiconic':
                             $item_icon=$atts['icon_openiconic_'.$i];
                            break;
                        case 'typicons':
                             $item_icon=$atts['icon_typicons_'.$i];
                            break;
                        case 'entypo':
                             $item_icon=$atts['icon_entypo_'.$i];
                            break;
                        case 'linecons':
                             $item_icon=$atts['icon_linecons_'.$i];
                            break;
                        case 'pixelicons':
                             $item_icon=$atts['icon_pixelicons_'.$i];
                            break;
                        case 'pe7stroke':
                             $item_icon=$atts['icon_pe7stroke_'.$i];
                            break;
                        case 'rticon':
                             $item_icon=$atts['icon_rticon_'.$i];
                            break;
                        case 'glyphicons':
                             $item_icon=$atts['icon_glyphicons_'.$i];
                            break;
                        default:
                            $item_icon=$atts['icon_fontawesome_'.$i];
                            break;
                    }
                    switch ($atts['content_align']) {
                        case 'left':
                           $align='text-left';
                            break;
                        case 'center':
                            $align='text-center';
                            break;
                        case 'right':
                            $align='text-right';
                            break;
                        default:
                            $align='text-left';
                            break;
                    }
                    if(!empty($atts['link_'.$i])){
                        $link=$atts['link_'.$i];
                    }else{
                        $link='#';
                    }
                    $animation_class='';
                    $animation_data='';
                    if(!empty($atts['animation_'.$i])){
                        $animation_class .=' onscroll-animate';
                        $animation_data .=' data-animation="'.$atts['animation_'.$i].'"';
                        if(!empty($atts['timeout_'.$i])){
                             $animation_data .=' data-delay="'.$atts['timeout_'.$i].'" ';
                        }else{
                            $animation_data .=' data-delay="200" ';
                        }
                    }
                ?>
                    <div class="<?php echo esc_attr($item_class);?> <?php echo esc_attr($align); ?>">
                        <div class="<?php echo ''.$animation_class; ?>" <?php echo ''.$animation_data; ?>>
                            <div class="fancybox-item" onclick="">
                                <a href="<?php echo esc_url($link) ?>" >
                                    <div class="fancybox-item-icon">
                                        <i class="<?php echo esc_attr($item_icon);?>"></i>
                                    </div>
                                </a>
                                <span class="fancybox-item-title"><?php echo esc_attr($atts['title_'.$i]); ?></span>
                                <span class="fancybox-item-sub-title"><?php echo esc_attr($atts['sub_title_'.$i]); ?></span>
                                <div class="fancybox-item-desc"><?php echo esc_attr($atts['desc_'.$i]); ?></div>
                            </div>
                        </div>
                    </div>
            <?php }
        ?>
    </div>
</div>