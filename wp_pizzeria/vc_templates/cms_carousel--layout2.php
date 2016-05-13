<?php 
     $currency=get_woocommerce_currency_symbol();
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
    if(isset($atts['btn_custom_color']) && !empty($atts['btn_custom_color'])){
        $button_style ='style="color:'.$btn_custom_color.'; border-color:'.$btn_custom_color.';"';
    }else{
        $button_style='';
    }
 ?>
<div class="cms-carousel-wrap" >
    <div class="cms-carousel owl-carousel <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($animation_classes); ?>" id="<?php echo esc_attr($atts['html_id']);?>" <?php echo ''.$wrapper_attributes; ?>>
        <?php
        $posts = $atts['posts'];
        $i=0;
        while($posts->have_posts()){
            $posts->the_post();
            global $product, $post;
            $price=number_format((float)$product->get_price(), get_option('woocommerce_price_num_decimals'), get_option('woocommerce_price_decimal_sep'), ''); 
            $price= explode('.', $price);
        ?>
            <div class="product-preview-container">
                <div class="product-preview-big product-detail-trigger <?php if($i==0) echo 'active'; ?>" data-product-detail="#product-<?php echo get_the_ID(); ?>-detail ">
                    <div class="product-preview-inner">
                        <div class="product-photo">
                            <?php 
                                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wp_pizzeria_rectangle-large', false)):
                                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_rectangle-large');
                                else:
                                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ).'" alt="'.get_the_title().'" />';
                                endif;
                                echo ''.$thumbnail;
                            ?>
                        </div>
                        <div class="product-content">
                            <div class="product-content-inner">
                                <h4 class="product-title"><?php the_title();?></h4>
                                <div class="product-desc"><?php the_excerpt(); ?></div>
                                <div class="product-price">
                                    <?php if(isset($price[0]) && $price[0] !='' && $price[0]!= null){
                                    $price_html="Price: ".$currency;
                                
                                    if(isset($price[1]) && !empty($price[1])){ 
                                        $price_html .=$price[0].".";
                                    }else{ 
                                        $price_html .=$price[0];
                                    }
                                    if(isset($price[1]) && !empty($price[1])){
                                        $price_html .=$price[1];
                                    }
                                }else{
                                    $price_html='';
                                } 
                                echo ''.$price_html;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .product-preview -->
            </div>
        <?php $i++; } ?>
    </div><!-- .onscroll-animate -->
    <div id="product-details" class="product-details <?php echo esc_attr($animation_classes); ?>" <?php echo ''.$wrapper_attributes; ?>>
        <?php
        while($posts->have_posts()){
            $posts->the_post();
            global $product, $post;
            $childrens= $product->get_children();
            $pro=new WC_Product_Variable(get_the_ID());
            $pro_default=$pro->get_variation_default_attributes();
            $pro_default=$pro_default['pa_size'];
        ?>
        <div id="product-<?php echo get_the_ID(); ?>-detail" class="product-detail">
            <form>
                <input type="hidden" name="product-name" value="product<?php echo get_the_ID(); ?> name">
                <div class="row">
                    <div class="col-lg-3 col-md-8 col-xs-12 col-sm-12">
                        <div class="product-detail-left">
                            <h4 class="text-uppercase no-top-margin"><?php the_title();?></h4>
                            <span class="text-uppercase"><?php echo esc_html__('INGREDIENTS:','wp_pizzeria'); ?></span>
                            <div class="product-desc"><?php the_content();?></div>
                            <a href="<?php the_permalink();  ?>" class="button-yellow with-right-arrow button-uppercase form-submit-trigger"><?php echo esc_html__('Order now','wp_pizzeria'); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12">
                    <?php if(count($childrens) > 0): ?>
                        <div class="product-detail-middle">
                            <span class="text-uppercase"><?php echo esc_html__('select size:','wp_pizzeria'); ?></span>
                            <?php foreach ($childrens as $key => $children): 
                                    $product_variation = new WC_Product_Variation($children);
                                    $product_variation_price = $product_variation->get_price();
                                    $product_variation_name = $product_variation->get_variation_attributes();
                            ?>
                                <label class="product-size <?php if($product_variation_name['attribute_pa_size']==$pro_default) echo 'active' ?>">
                                    <input type="radio" name="product-size" value="<?php echo esc_attr($product_variation_name['attribute_pa_size']); ?>">
                                    <span class="product-size-img">
                                        <?php if($product_variation_name['attribute_pa_size']=='familly'): ?>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="43.988px" height="44.979px" viewBox="0 0 43.988 44.979" style="enable-background:new 0 0 43.988 44.979;" xml:space="preserve"> <path d="M37.383,16.22c3.517,7.474,0.886,16.918-5.946,21.733c-7.082,4.99-16.782,4.166-22.674-2.191 C2.7,29.22,1.912,20.428,7.131,12.854c4.695-6.813,14.018-8.953,20.577-5.988c-2.064,5.407-4.132,10.822-6.29,16.472 C26.876,20.904,32.102,18.574,37.383,16.22z M27.102,32.566c-0.002,1.413,1.051,2.507,2.422,2.515c1.354,0.008,2.424-1.1,2.426-2.51 c0.001-1.398-1.09-2.474-2.486-2.451C28.108,30.142,27.104,31.182,27.102,32.566z M13.273,14.833 c1.334,0.053,2.513-1.055,2.563-2.41c0.049-1.329-0.975-2.437-2.32-2.508c-1.404-0.074-2.527,0.919-2.622,2.318 C10.806,13.537,11.944,14.782,13.273,14.833z M23.347,32.031c1.395,0.009,2.481-1.067,2.467-2.445 c-0.013-1.351-1.053-2.4-2.39-2.414c-1.423-0.014-2.533,1.021-2.547,2.376C20.862,30.881,21.998,32.021,23.347,32.031z M30.313,21.663c-1.356-0.015-2.454,1.013-2.502,2.341c-0.049,1.342,1.101,2.552,2.429,2.556c1.368,0.004,2.497-1.121,2.496-2.489 C32.733,22.728,31.675,21.675,30.313,21.663z M9.766,33.943c0.002,1.377,1.02,2.435,2.363,2.459 c1.361,0.024,2.454-1.094,2.446-2.504c-0.007-1.361-1.066-2.449-2.384-2.447C10.758,31.453,9.763,32.476,9.766,33.943z M19.055,15.114c-1.412,0.003-2.447,1.067-2.431,2.496c0.016,1.351,1.068,2.375,2.445,2.379c1.387,0.003,2.446-1.089,2.429-2.508 C21.483,16.141,20.42,15.111,19.055,15.114z M8.195,24.771c1.288-0.005,2.425-1.131,2.445-2.422 c0.021-1.376-1.106-2.513-2.473-2.496c-1.368,0.02-2.482,1.168-2.449,2.528C5.75,23.689,6.878,24.777,8.195,24.771z M36.12,25.425 c0.969-0.006,1.674-0.747,1.662-1.75c-0.012-1.015-0.707-1.722-1.695-1.726c-0.987-0.003-1.801,0.831-1.768,1.811 C34.349,24.687,35.152,25.43,36.12,25.425z M27.534,36.958C27.505,36,26.739,35.29,25.76,35.312 c-1.018,0.023-1.698,0.724-1.678,1.728c0.02,0.961,0.814,1.732,1.752,1.698C26.778,38.705,27.563,37.882,27.534,36.958z M24.091,9.541c-0.013-0.973-0.744-1.688-1.723-1.684c-0.974,0.002-1.732,0.737-1.742,1.687c-0.01,0.948,0.866,1.827,1.795,1.803 C23.299,11.324,24.103,10.455,24.091,9.541z M15.21,23.873c-1.039-0.006-1.715,0.628-1.742,1.635 c-0.025,0.948,0.723,1.752,1.658,1.783c0.994,0.034,1.793-0.75,1.79-1.754C16.912,24.52,16.255,23.879,15.21,23.873z"/> <path d="M22.16,1.466c1.467,0.295,3.473,0.697,5.477,1.108c0.209,0.043,0.497,0.082,0.593,0.226 c0.267,0.406,0.452,0.866,0.669,1.304c-0.451,0.157-0.929,0.506-1.347,0.443c-1.881-0.286-3.741-0.972-5.615-0.996 C12.395,3.431,4.645,9.65,2.424,19.024c-2.571,10.852,4.697,21.734,15.863,23.752c9.054,1.636,18.534-4.085,21.474-12.866 c1.479-4.418,1.771-8.772-0.082-13.141c-0.246-0.579-0.361-1.177,0.35-1.49c0.806-0.356,1.169,0.167,1.46,0.84 c2.14,4.953,1.83,9.934-0.073,14.818c-3.299,8.468-9.694,13.109-18.49,13.957c-8.449,0.813-17.889-4.136-21.653-14.25 C-3.021,19.104,3.8,4.498,17.908,1.942C19.11,1.725,20.341,1.666,22.16,1.466z"/> <path d="M30.661,3.691c4.499,1.791,7.608,4.887,9.654,9.36c-5.255,2.337-10.445,4.645-15.953,7.094 C26.526,14.492,28.581,9.125,30.661,3.691z M35.381,8.472c-1.44,0-2.42,0.945-2.445,2.354c-0.026,1.438,1.008,2.531,2.404,2.542 c1.391,0.01,2.449-1.071,2.445-2.497C37.78,9.481,36.768,8.47,35.381,8.472z M27.57,14.899c0.003,0.958,0.754,1.729,1.691,1.733 c0.881,0.005,1.748-0.85,1.761-1.738c0.014-0.983-0.813-1.788-1.813-1.765C28.227,13.152,27.567,13.864,27.57,14.899z"/> <path d="M43.988,11.932c-0.199,0.224-0.42,0.69-0.679,0.712c-0.383,0.031-0.966-0.134-1.158-0.423 c-0.6-0.904-0.998-1.941-1.578-2.861c-2.061-3.264-4.907-5.607-8.402-7.16c-0.165-0.073-0.334-0.138-0.505-0.194 c-0.676-0.229-1.091-0.663-0.821-1.402c0.303-0.827,1.004-0.646,1.55-0.373c1.484,0.743,3.017,1.438,4.372,2.382 c3.066,2.137,5.333,5.001,6.895,8.425C43.767,11.267,43.836,11.511,43.988,11.932z"/> </svg>
                                        <?php elseif($product_variation_name['attribute_pa_size']=='medium'): ?>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="36px" height="36px" viewBox="0 0 43.988 44.979" style="enable-background:new 0 0 43.988 44.979;" xml:space="preserve"> <path d="M37.383,16.22c3.517,7.474,0.886,16.918-5.946,21.733c-7.082,4.99-16.782,4.166-22.674-2.191 C2.7,29.22,1.912,20.428,7.131,12.854c4.695-6.813,14.018-8.953,20.577-5.988c-2.064,5.407-4.132,10.822-6.29,16.472 C26.876,20.904,32.102,18.574,37.383,16.22z M27.102,32.566c-0.002,1.413,1.051,2.507,2.422,2.515c1.354,0.008,2.424-1.1,2.426-2.51 c0.001-1.398-1.09-2.474-2.486-2.451C28.108,30.142,27.104,31.182,27.102,32.566z M13.273,14.833 c1.334,0.053,2.513-1.055,2.563-2.41c0.049-1.329-0.975-2.437-2.32-2.508c-1.404-0.074-2.527,0.919-2.622,2.318 C10.806,13.537,11.944,14.782,13.273,14.833z M23.347,32.031c1.395,0.009,2.481-1.067,2.467-2.445 c-0.013-1.351-1.053-2.4-2.39-2.414c-1.423-0.014-2.533,1.021-2.547,2.376C20.862,30.881,21.998,32.021,23.347,32.031z M30.313,21.663c-1.356-0.015-2.454,1.013-2.502,2.341c-0.049,1.342,1.101,2.552,2.429,2.556c1.368,0.004,2.497-1.121,2.496-2.489 C32.733,22.728,31.675,21.675,30.313,21.663z M9.766,33.943c0.002,1.377,1.02,2.435,2.363,2.459 c1.361,0.024,2.454-1.094,2.446-2.504c-0.007-1.361-1.066-2.449-2.384-2.447C10.758,31.453,9.763,32.476,9.766,33.943z M19.055,15.114c-1.412,0.003-2.447,1.067-2.431,2.496c0.016,1.351,1.068,2.375,2.445,2.379c1.387,0.003,2.446-1.089,2.429-2.508 C21.483,16.141,20.42,15.111,19.055,15.114z M8.195,24.771c1.288-0.005,2.425-1.131,2.445-2.422 c0.021-1.376-1.106-2.513-2.473-2.496c-1.368,0.02-2.482,1.168-2.449,2.528C5.75,23.689,6.878,24.777,8.195,24.771z M36.12,25.425 c0.969-0.006,1.674-0.747,1.662-1.75c-0.012-1.015-0.707-1.722-1.695-1.726c-0.987-0.003-1.801,0.831-1.768,1.811 C34.349,24.687,35.152,25.43,36.12,25.425z M27.534,36.958C27.505,36,26.739,35.29,25.76,35.312 c-1.018,0.023-1.698,0.724-1.678,1.728c0.02,0.961,0.814,1.732,1.752,1.698C26.778,38.705,27.563,37.882,27.534,36.958z M24.091,9.541c-0.013-0.973-0.744-1.688-1.723-1.684c-0.974,0.002-1.732,0.737-1.742,1.687c-0.01,0.948,0.866,1.827,1.795,1.803 C23.299,11.324,24.103,10.455,24.091,9.541z M15.21,23.873c-1.039-0.006-1.715,0.628-1.742,1.635 c-0.025,0.948,0.723,1.752,1.658,1.783c0.994,0.034,1.793-0.75,1.79-1.754C16.912,24.52,16.255,23.879,15.21,23.873z"/> <path d="M22.16,1.466c1.467,0.295,3.473,0.697,5.477,1.108c0.209,0.043,0.497,0.082,0.593,0.226 c0.267,0.406,0.452,0.866,0.669,1.304c-0.451,0.157-0.929,0.506-1.347,0.443c-1.881-0.286-3.741-0.972-5.615-0.996 C12.395,3.431,4.645,9.65,2.424,19.024c-2.571,10.852,4.697,21.734,15.863,23.752c9.054,1.636,18.534-4.085,21.474-12.866 c1.479-4.418,1.771-8.772-0.082-13.141c-0.246-0.579-0.361-1.177,0.35-1.49c0.806-0.356,1.169,0.167,1.46,0.84 c2.14,4.953,1.83,9.934-0.073,14.818c-3.299,8.468-9.694,13.109-18.49,13.957c-8.449,0.813-17.889-4.136-21.653-14.25 C-3.021,19.104,3.8,4.498,17.908,1.942C19.11,1.725,20.341,1.666,22.16,1.466z"/> <path d="M30.661,3.691c4.499,1.791,7.608,4.887,9.654,9.36c-5.255,2.337-10.445,4.645-15.953,7.094 C26.526,14.492,28.581,9.125,30.661,3.691z M35.381,8.472c-1.44,0-2.42,0.945-2.445,2.354c-0.026,1.438,1.008,2.531,2.404,2.542 c1.391,0.01,2.449-1.071,2.445-2.497C37.78,9.481,36.768,8.47,35.381,8.472z M27.57,14.899c0.003,0.958,0.754,1.729,1.691,1.733 c0.881,0.005,1.748-0.85,1.761-1.738c0.014-0.983-0.813-1.788-1.813-1.765C28.227,13.152,27.567,13.864,27.57,14.899z"/> <path d="M43.988,11.932c-0.199,0.224-0.42,0.69-0.679,0.712c-0.383,0.031-0.966-0.134-1.158-0.423 c-0.6-0.904-0.998-1.941-1.578-2.861c-2.061-3.264-4.907-5.607-8.402-7.16c-0.165-0.073-0.334-0.138-0.505-0.194 c-0.676-0.229-1.091-0.663-0.821-1.402c0.303-0.827,1.004-0.646,1.55-0.373c1.484,0.743,3.017,1.438,4.372,2.382 c3.066,2.137,5.333,5.001,6.895,8.425C43.767,11.267,43.836,11.511,43.988,11.932z"/> </svg>
                                        <?php else: ?>
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 43.988 44.979" style="enable-background:new 0 0 43.988 44.979;" xml:space="preserve"> <path d="M37.383,16.22c3.517,7.474,0.886,16.918-5.946,21.733c-7.082,4.99-16.782,4.166-22.674-2.191 C2.7,29.22,1.912,20.428,7.131,12.854c4.695-6.813,14.018-8.953,20.577-5.988c-2.064,5.407-4.132,10.822-6.29,16.472 C26.876,20.904,32.102,18.574,37.383,16.22z M27.102,32.566c-0.002,1.413,1.051,2.507,2.422,2.515c1.354,0.008,2.424-1.1,2.426-2.51 c0.001-1.398-1.09-2.474-2.486-2.451C28.108,30.142,27.104,31.182,27.102,32.566z M13.273,14.833 c1.334,0.053,2.513-1.055,2.563-2.41c0.049-1.329-0.975-2.437-2.32-2.508c-1.404-0.074-2.527,0.919-2.622,2.318 C10.806,13.537,11.944,14.782,13.273,14.833z M23.347,32.031c1.395,0.009,2.481-1.067,2.467-2.445 c-0.013-1.351-1.053-2.4-2.39-2.414c-1.423-0.014-2.533,1.021-2.547,2.376C20.862,30.881,21.998,32.021,23.347,32.031z M30.313,21.663c-1.356-0.015-2.454,1.013-2.502,2.341c-0.049,1.342,1.101,2.552,2.429,2.556c1.368,0.004,2.497-1.121,2.496-2.489 C32.733,22.728,31.675,21.675,30.313,21.663z M9.766,33.943c0.002,1.377,1.02,2.435,2.363,2.459 c1.361,0.024,2.454-1.094,2.446-2.504c-0.007-1.361-1.066-2.449-2.384-2.447C10.758,31.453,9.763,32.476,9.766,33.943z M19.055,15.114c-1.412,0.003-2.447,1.067-2.431,2.496c0.016,1.351,1.068,2.375,2.445,2.379c1.387,0.003,2.446-1.089,2.429-2.508 C21.483,16.141,20.42,15.111,19.055,15.114z M8.195,24.771c1.288-0.005,2.425-1.131,2.445-2.422 c0.021-1.376-1.106-2.513-2.473-2.496c-1.368,0.02-2.482,1.168-2.449,2.528C5.75,23.689,6.878,24.777,8.195,24.771z M36.12,25.425 c0.969-0.006,1.674-0.747,1.662-1.75c-0.012-1.015-0.707-1.722-1.695-1.726c-0.987-0.003-1.801,0.831-1.768,1.811 C34.349,24.687,35.152,25.43,36.12,25.425z M27.534,36.958C27.505,36,26.739,35.29,25.76,35.312 c-1.018,0.023-1.698,0.724-1.678,1.728c0.02,0.961,0.814,1.732,1.752,1.698C26.778,38.705,27.563,37.882,27.534,36.958z M24.091,9.541c-0.013-0.973-0.744-1.688-1.723-1.684c-0.974,0.002-1.732,0.737-1.742,1.687c-0.01,0.948,0.866,1.827,1.795,1.803 C23.299,11.324,24.103,10.455,24.091,9.541z M15.21,23.873c-1.039-0.006-1.715,0.628-1.742,1.635 c-0.025,0.948,0.723,1.752,1.658,1.783c0.994,0.034,1.793-0.75,1.79-1.754C16.912,24.52,16.255,23.879,15.21,23.873z"/> <path d="M22.16,1.466c1.467,0.295,3.473,0.697,5.477,1.108c0.209,0.043,0.497,0.082,0.593,0.226 c0.267,0.406,0.452,0.866,0.669,1.304c-0.451,0.157-0.929,0.506-1.347,0.443c-1.881-0.286-3.741-0.972-5.615-0.996 C12.395,3.431,4.645,9.65,2.424,19.024c-2.571,10.852,4.697,21.734,15.863,23.752c9.054,1.636,18.534-4.085,21.474-12.866 c1.479-4.418,1.771-8.772-0.082-13.141c-0.246-0.579-0.361-1.177,0.35-1.49c0.806-0.356,1.169,0.167,1.46,0.84 c2.14,4.953,1.83,9.934-0.073,14.818c-3.299,8.468-9.694,13.109-18.49,13.957c-8.449,0.813-17.889-4.136-21.653-14.25 C-3.021,19.104,3.8,4.498,17.908,1.942C19.11,1.725,20.341,1.666,22.16,1.466z"/> <path d="M30.661,3.691c4.499,1.791,7.608,4.887,9.654,9.36c-5.255,2.337-10.445,4.645-15.953,7.094 C26.526,14.492,28.581,9.125,30.661,3.691z M35.381,8.472c-1.44,0-2.42,0.945-2.445,2.354c-0.026,1.438,1.008,2.531,2.404,2.542 c1.391,0.01,2.449-1.071,2.445-2.497C37.78,9.481,36.768,8.47,35.381,8.472z M27.57,14.899c0.003,0.958,0.754,1.729,1.691,1.733 c0.881,0.005,1.748-0.85,1.761-1.738c0.014-0.983-0.813-1.788-1.813-1.765C28.227,13.152,27.567,13.864,27.57,14.899z"/> <path d="M43.988,11.932c-0.199,0.224-0.42,0.69-0.679,0.712c-0.383,0.031-0.966-0.134-1.158-0.423 c-0.6-0.904-0.998-1.941-1.578-2.861c-2.061-3.264-4.907-5.607-8.402-7.16c-0.165-0.073-0.334-0.138-0.505-0.194 c-0.676-0.229-1.091-0.663-0.821-1.402c0.303-0.827,1.004-0.646,1.55-0.373c1.484,0.743,3.017,1.438,4.372,2.382 c3.066,2.137,5.333,5.001,6.895,8.425C43.767,11.267,43.836,11.511,43.988,11.932z"/> </svg>
                                        <?php endif; ?>
                                    </span>
                                    <?php echo esc_attr($product_variation_name['attribute_pa_size']); ?>:<?php echo ' '.esc_attr($currency).esc_attr($product_variation_price); ?>
                                </label><!-- .product-size -->
                            <?php endforeach; ?>                            
                        </div><!-- .product-detail-content -->
                    <?php endif; ?>
                    </div><!-- .col-lg-3 -->
                </div><!-- .row -->
            </form>
            <?php 

                if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                    $image=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    $image=$image[0];
                    $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_rectangle-larg');
                else:
                    $image=get_template_directory_uri().'/assets/images/no-image.jpg';
                    $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ).'" alt="'.get_the_title().'" />';
                endif;
               
            ?>
            <a class="product-detail-img" href="<?php echo esc_url($image); ?>" data-lightbox="product-1" style="background-image:url(<?php echo esc_url($image); ?>)">
                <?php  echo ''.$thumbnail; ?>
            </a>
        </div><!-- #product-1-detail -->
        <?php } ?>
    </div><!-- .product-details -->
    <?php if(isset($atts['button_text']) && !empty($atts['button_text'])): ?>
        <p class="<?php echo esc_attr($button_align); ?>">
            <a href="<?php echo esc_url($atts['button_link']) ?>" class="<?php echo esc_attr($button_classes); ?> <?php echo esc_attr($button_animation_classes); ?>" <?php echo ''.$button_wrapper_attributes; ?> <?php echo ''.$button_style; ?>><?php echo esc_attr($atts['button_text']); ?></a>
        </p>
    <?php endif; ?>
</div>