<?php 
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
            $filter_attributes= ' data-animation="'.$atts['filter_animation'].'"';
            $filter_attributes.= ' data-delay="'.$filter_timeout.'"';
        }else{
            $filter_classes=' ';
            $filter_attributes='';
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
        <div class="cms-grid-filter text-center <?php echo esc_attr($filter_classes); ?>" <?php echo ''.$filter_attributes; ?>>
            <?php echo esc_html__('Filter:','wp_pizzeria'); ?>
            <ul id="gallery-filter" class="list-filter">
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
    <div class="row cms-grid cms-grid-list-items <?php echo esc_attr($atts['grid_class']);?> <?php echo esc_attr($animation_classes); ?>" <?php echo ''.$wrapper_attributes; ?>>
        <?php
        $size = 'wp_pizzeria_rectangle-medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <?php if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                    $img_w=$img[1];
                    $image_full=$img[0];
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';

                    $img_w=0;
                    $image_full=get_template_directory_uri().'/assets/images/no-image.jpg';
                endif;
            ?>
            <div class="cms-grid-item gallery-item <?php echo esc_attr($atts['item_class']);?> " data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php 
                    
                    echo ''.$thumbnail;
                ?>
                <div class="gallery-item-detail">
                    <div class="gallery-item-detail-inner ">
                        <div class="row">
                            <div class="gallery-item-icon text-right col-sm-5 pull-right">
                                <a href="<?php echo esc_url($image_full); ?>" class="gallery-detail-icon" data-lightbox="gallery-images"><i class="fa fa-search"></i></a>
                                <a href="<?php the_permalink(); ?>" class="gallery-detail-icon"><i class="fa fa-expand"></i></a>
                            </div>
                            <div class="gallery-item-info col-sm-7 hidden-xs pull-left">
                                <h4 class="gallery-item-heading"><?php the_title(); ?></h4>
                                <?php the_terms( get_the_ID(), 'gallery-categories', '', ' , ' ); ?>
                            </div>
                        </div>
                    </div>
                                
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    if(isset($atts['pagination']) && $atts['pagination']){
        wp_pizzeria_paging_nav();
    }
    ?>
</div>