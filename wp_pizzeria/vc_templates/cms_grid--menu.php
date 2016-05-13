<?php 
$categories=get_terms('product_cat');
    /* get categories */
        $currency=get_woocommerce_currency_symbol();
        $taxo = 'product_cat';
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
            $filter_attributes= 'data-animation="'.$atts['filter_animation'].'"';
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
    <div class="row cms-grid cms-grid-list-products <?php echo esc_attr($atts['grid_class']);?> <?php echo esc_attr($animation_classes); ?>" <?php echo ''.$wrapper_attributes; ?>>
        
        <?php
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            global $product, $post;
            $price=$product->get_price();
            $price= explode('.', $price);
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item col-md-4" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="product-preview product-detail-trigger " data-product-detail="#product-<?php echo get_the_ID(); ?>-detail ">
                <div class="product-preview-inner">
                    <div class="product-photo">
                        <div class="product-price">
                            <?php if(isset($price[0]) && $price[0] !='' && $price[0]!= null){
                                $price_html="<sub>".$currency."</sub>";
                            
                                if(isset($price[1]) && !empty($price[1])){ 
                                    $price_html .=$price[0].".";
                                }else{ 
                                    $price_html .=$price[0];
                                }
                                if(isset($price[1]) && !empty($price[1])){
                                    $price_html .="<sup>".$price[1]."</sup>";
                                }
                            }else{
                                $price_html='';
                            } 
                            echo ''.$price_html;
                            ?>
                                
                        </div>
                        <?php 
                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wp_pizzeria_square-img', false)):
                                $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_square-img');
                            else:
                                $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ).'" alt="'.get_the_title().'" />';
                            endif;
                            echo ''.$thumbnail;
                        ?>
                    </div>
                    <h3 class="product-title"><?php the_title();?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="cart-trigger button-clean button-text-small"><?php esc_html_e('Order now','wp_pizzeria'); ?></a>
                </div>
            </div><!-- .product-preview -->
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