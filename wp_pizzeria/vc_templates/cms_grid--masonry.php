<?php 
   // wp_enqueue_script( 'isotope' );
    //wp_enqueue_script('isotope-cms');
    /* get categories */
        $taxo = 'gallery-categories';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
        if(!isset($atts['button_link']) || empty($atts['button_link'])){
        $atts['button_link']='#';
    
    }
    if(!empty($atts['button_timeout'])){
        $button_timeout=$atts['button_timeout'];
    }else{
        $button_timeout=200;
    }
    if(!empty($atts['button_animation'])){
        $button_animation_classes=' onscroll-animate';
        $button_wrapper_attributes= 'data-animation="'.$atts['button_animation'].'"';
        $button_wrapper_attributes.= ' data-delay="'.$button_timeout.'"';
    }else{
        $button_animation_classes=' ';
        $button_wrapper_attributes='';
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
    if(!empty($atts['add_icon'])){
        $button_classes.=' with-right-arrow'; 
    }

    if(isset($atts['btn_align']) && !empty($atts['btn_align'])){
        $button_align=$atts['btn_align'];
    }else{
        $button_align=' text-center';
    }

    if(!empty($atts['timeout'])){
        $timeout=$atts['timeout'];
    }else{
        $timeout=200;
    }
    if(!empty($atts['filter_timeout'])){
        $filter_timeout=$atts['filter_timeout'];
    }else{
        $filter_timeout=200;
    }
    if(!empty($atts['animation'])){
        $animation_classes=' onscroll-animate';
        $wrapper_attributes= 'data-animation="'.$atts['animation'].'"';
        $wrapper_attributes.= ' data-delay="'.$timeout.'"';
    }else{
        $animation_classes=' ';
        $wrapper_attributes='';
    }
    if(!empty($atts['filter_animation'])){
        $filter_classes=' onscroll-animate';
        $filter_attributes= 'data-animation="'.$atts['filter_animation'].'"';
        $filter_attributes.= ' data-delay="'.$filter_timeout.'"';
    }else{
        $filter_classes=' ';
        $filter_attributes='';
    }
    if(isset($atts['btn_custom_color']) && !empty($atts['btn_custom_color'])){
        $button_style ='style="color:'.$btn_custom_color.'; border-color:'.$btn_custom_color.';"';
    }else{
        $button_style='';
    }
    $posts = $atts['posts'];
    $categories=array();
    while($posts->have_posts()){
        $posts->the_post();
        $cats = get_the_terms( get_the_ID(), $taxo );
        if(!empty($cats)){
            foreach ($cats as $cat) {
               $categories[]=$cat->slug;
            }
        }
    }
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter text-center section-gray <?php echo esc_attr($filter_classes); ?>" <?php echo ''.$filter_attributes; ?>>
            <?php echo esc_html__('Filter:','wp_pizzeria'); ?>
            <ul id="gallery-filter" class="list-filter ">
               <li><a class="active" href="#" data-group="all"><?php echo esc_html__('All','wp_pizzeria'); ?></a></li>
                <?php 
                if(is_array($atts['categories']))
                foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );
                    if(in_array($term->slug, $categories)):
                    ?>
                    <li><a class="<?php echo esc_attr('category-'.$term->slug);?>" href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endif; endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="row cms-grid cms-grid-list-items cms-grid-layout-masonry cms-grid-masonry   shuffle shuffle--container shuffle--fluid <?php echo esc_attr($animation_classes); ?>" <?php echo ''.$wrapper_attributes; ?>>
        <div class="col-md-3  col-sm-6 col-xs-12 shuffle__sizer"></div>
        <?php
       
        $size = 'full';
        while($posts->have_posts()){
            $random=rand(1,50);
            if($random %2 ==0){
                $icon_class='text-center';
                $info_class='text-center';
            }else{
                $icon_class='text-right';
                $info_class =' hidden';
            }
            $posts->the_post();
            $groups = array();
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    $ratio=$img[1]/$img[2];
                    if($ratio > 2 || $ratio == 2){
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_rectangle-large');
                        $cms_grid_class='col-md-6 col-sm-6 col-xs-12';
                        $icon_class='col-sm-5 pull-right text-right';
                        $info_class='col-sm-7 pull-left hidden-xs';
                    }elseif($ratio < 2 && $ratio > (4/3)){
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_square-img');
                        $cms_grid_class='col-md-3 col-sm-6 col-xs-12';
                    }else{
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_square-img');
                        $cms_grid_class='col-md-6 col-sm-6 col-xs-12';
                        $icon_class='col-sm-5 pull-right text-right';
                        $info_class='col-sm-7 pull-left hidden-xs';
                    }
                    
                    $img_w=$img[1];
                    $image_full=$img[0];
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';

                    $img_w=0;
                    $image_full=get_template_directory_uri().'/assets/images/no-image.jpg';
                endif;
            ?>
            <div class="cms-grid-item gallery-item <?php echo ''.$cms_grid_class; ?> " data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php 
                    
                    echo ''.$thumbnail;
                ?>
                <div class="gallery-item-detail">
                    <div class="gallery-item-detail-inner ">
                        <div class="gallery-item-icon <?php echo esc_attr($icon_class); ?>">
                            <a href="<?php echo esc_url($image_full); ?>" class="gallery-detail-icon" data-lightbox="gallery-images"><i class="fa fa-search"></i></a>
                            <a href="<?php the_permalink(); ?>" class="gallery-detail-icon"><i class="fa fa-expand"></i></a>
                        </div>
                        <div class="gallery-item-info <?php echo esc_attr($info_class); ?>">
                            <h4 class="gallery-item-heading"><?php the_title(); ?></h4>
                            <?php the_terms( get_the_ID(), 'gallery-categories', '', ' , ' ); ?>
                        </div>
                    </div>
                                
                </div>
            </div>
            <?php
        }
        ?>
        <!-- basic size of the grid -->
    </div>
    <?php
    if(isset($atts['pagination']) && $atts['pagination']){
        wp_pizzeria_paging_nav();
    }
    ?>
    <?php if(isset($atts['button_text']) && !empty($atts['button_text'])): ?>
        <p class="<?php echo esc_attr($button_align); ?>">
            <a href="<?php echo esc_url($atts['button_link']) ?>" class="<?php echo esc_attr($button_classes); ?> <?php echo esc_attr($button_animation_classes); ?>" <?php echo ''.$button_wrapper_attributes; ?> <?php echo ''.$button_style; ?>><?php echo esc_attr($atts['button_text']); ?></a>
        </p>
    <?php endif; ?>
</div>