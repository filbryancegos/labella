
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $i=0;
        $animation_class='';
        $animation_attr='';
        if(!isset($atts['item_delay']) || empty($atts['item_delay'])){
            $atts['item_delay']=100;
        }
        if(isset($atts['animation']) && !empty($atts['animation'])){
            $animation_class=' onscroll-animate';
            $animation_attr=' data-animation="'.$atts['animation'].'"';
        }
        while($posts->have_posts()){
            $posts->the_post();
            $team_meta=wp_pizzeria_post_meta_data();
            $animation_delay='';
            if(isset($atts['animation']) && !empty($atts['animation'])){
                $delay=200 +($atts['item_delay']*$i);
                 $animation_delay =' data-delay="'.$delay.'"';
            }
            ?>
            <div class="cms-grid-item <?php echo esc_attr($atts['item_class']);?>" >
                <div class="cms-grid-item-wrap <?php echo  esc_attr($animation_class);?> " <?php echo ''.$animation_attr; ?> <?php echo ''.$animation_delay; ?>>
                    <div class="cms-grid-item-inner ">
                        <div class="cms-grid-item-head">
                            <div class="<?php echo ($i%2==0)? 'cms-grid-item-img' : 'cms-grid-item-img-alt';?>">
                                <div class="cms-grid-item-img-layer-1">
                                    <div class="cms-grid-item-img-layer-2">
                                        <div class="cms-grid-item-img-content">
                                             <?php 
                                                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                                                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                                                else:
                                                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                                                endif;
                                                echo ''.$thumbnail;
                                            ?>
                                            <?php wp_pizzeria_get_socials_share(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cms-grid-item-info">
                                <h4><?php the_title();?></h4>
                                <?php if(isset($team_meta->_cms_location) && !empty($team_meta->_cms_location)): ?>
                                    <em><?php echo esc_attr($team_meta->_cms_location); ?></em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="cms-grid-item-desc">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
    <?php
    if(isset($atts['pagination']) && $atts['pagination']){
        wp_pizzeria_paging_nav();
    }
    ?>
</div>