<?php 
    /* get categories */
        $taxo = 'category';
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
    if(!empty($atts['filter_animation'])){
        $filter_classes=' onscroll-animate';
        $filter_attributes= 'data-animation="'.$atts['filter_animation'].'"';
        $filter_attributes.= ' data-delay="'.$filter_timeout.'"';
    }else{
        $filter_classes=' ';
        $filter_attributes='';
    }
    if(!empty($atts['filter_timeout'])){
        $filter_timeout=$atts['filter_timeout'];
    }else{
        $filter_timeout=200;
    }
    if(!empty($atts['timeout'])){
        $timeout=$atts['timeout'];
    }else{
        $timeout=200;
    }
    if(!empty($atts['animation'])){
        $animation_classes=' onscroll-animate';
        $wrapper_attributes= 'data-animation="'.$atts['animation'].'"';
        $wrapper_attributes.= ' data-delay="'.$timeout.'"';
    }else{
        $animation_classes=' ';
        $wrapper_attributes='';
    }
    if(isset($atts['item_animation']) && $atts['item_animation']){
        $item_animation_classes=' onscroll-animate';
    }else{
         $item_animation_classes=' ';
    }
    $p = $atts['posts'];
    $categories=array();
    while($p->have_posts()){
        $p->the_post();
        $cats = get_the_terms( get_the_ID(), $taxo );
        if(!empty($cats)){
            foreach ($cats as $cat) {
               $categories[]=$cat->slug;
            }
        }
    }
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?> " id="<?php echo esc_attr($atts['html_id']);?>"  >
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
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?> <?php echo esc_attr($animation_classes); ?>" <?php echo ''.$wrapper_attributes; ?>>

        <?php
        $i=1;
        $posts = $atts['posts'];
        while($posts->have_posts()){
            if( $i > (int)$atts['col_lg']){
                $i=1;
            }
            if(isset($atts['item_animation']) && $atts['item_animation']){
                if($i == 1){
                    $item_animation =' data-animation="fadeInLeft"';
                    $item_delay =' data-delay="200"';
                }elseif($i == $atts['col_lg']){
                    $item_animation =' data-animation="fadeInRight"';
                    $item_delay =' data-delay="300"';
                }else{
                    $item_animation =' data-animation="fadeInUp"';
                    $item_delay =' data-delay="300"';
                }
            }else{
                 $item_animation = $item_delay ='';
            }
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            $image=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
            ?>
            <div class="cms-grid-item <?php echo esc_attr($atts['item_class']);?> " data-groups='[<?php echo implode(',', $groups);?>]' >
                <article id="post-<?php the_ID(); ?>" class="post-preview <?php echo esc_attr($item_animation_classes); ?>"  <?php echo ''.$item_animation; ?> <?php echo ''.$item_delay; ?>>
                <?php if(isset($image[0]) && !empty($image[0])): ?>
                    <div class="entry-feature entry-feature-image">
                        <a href="<?php echo esc_url($image[0]); ?>" data-lightbox="blog-post<?php the_ID(); ?>">
                            <?php the_post_thumbnail( 'wp_pizzeria_rectangle' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="post-content">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                if(is_sticky()){
                                    echo "<i class='fa fa-thumb-tack'></i>";
                                }
                            ?>
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <?php wp_pizzeria_archive_detail(); ?>
                    <div class="entry-content">
                        <?php the_excerpt();?>
                    </div>
                    <?php wp_pizzeria_archive_readmore(); ?>
                </div>
            </article>
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
    <?php if(isset($atts['button_text']) && !empty($atts['button_text'])): ?>
        <p class="<?php echo esc_attr($button_align); ?>">
            <a href="<?php echo esc_url($atts['button_link']) ?>" class="<?php echo esc_attr($button_classes); ?> <?php echo esc_attr($button_animation_classes); ?>" <?php echo ''.$button_wrapper_attributes; ?> ><?php echo esc_attr($atts['button_text']); ?></a>
        </p>
    <?php endif; ?>
</div>