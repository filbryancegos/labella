<div class="cms-carousel owl-carousel <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
            $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_related-img');
        else:
            $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
        endif;
        $item_meta=wp_pizzeria_post_meta_data();
        ?>
        <div class="cms-carousel-item">
            <?php the_content() ?>
            <div class="testimonial-image">
                <?php echo ''.$thumbnail; ?>
            </div>
            <div class="testimonial-detail">
                <?php 
                    $info = get_the_title();
                    if(isset($item_meta->_cms_location) && !empty($item_meta->_cms_location)){
                        $info .=' | <em>'.$item_meta->_cms_location.'</em>';
                    }
                    echo ''.$info;
                 ?>
            </div>
        </div><!-- .testimonial -->
        
<?php
    }
?>
</div>