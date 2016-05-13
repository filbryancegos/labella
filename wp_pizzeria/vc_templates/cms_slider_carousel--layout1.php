<?php
$html_id=$atts['html_id'];
$template=$atts['template'];
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 ?>
<div id="<?php echo esc_attr($html_id); ?>" class="cms-slider-carousel  <?php echo esc_attr($template);?>">
    <div  id="<?php echo esc_attr($html_id).'-slider'; ?>" class="flexslider cms-slider-carousel-slider">
        <ul class="cms-slider-carousel-slides slides">
        <?php 
            for($i=1;$i <= (int)$atts['cms_slides']; $i++){
                $image=wp_get_attachment_image_src($atts['image'.$i],'wp_pizzeria_large');
                $image=$image[0];

                if(isset($atts['price'.$i]) && !empty($atts['price'.$i])){
                    $price=explode('.', $atts['price'.$i]);
                }
            if(isset($image) && !empty($image)):
        ?>
            <li>
                <a href="<?php echo esc_url($atts['link'.$i]); ?>" class="scroll-to">
                    <article class="offer-alt">
                        <img alt="product" src="<?php echo esc_url($image); ?>">
                        <div class="offer-detail">
                            <h4 class="offer-heading"> <?php echo apply_filters('the_title',$atts['title'.$i]);?></h4>
                            <?php if(!empty($atts['subtitle'.$i])): ?>
                                <h3><?php echo esc_attr($atts['subtitle'.$i]); ?></h3>
                            <?php endif; ?>
                            <em><?php echo apply_filters('the_title',$atts['desc'.$i]);?></em>
                            <div class="price-huge clearfix">
                                <div class="pull-left">
                                <?php if(isset($atts['price'.$i]) && !empty($atts['price'.$i])): ?>
                                    <span class="price-currency"><?php echo esc_attr($atts['currency']) ?></span>
                                    <?php if($price[0]): ?>
                                        <span class="price-val-1"><?php echo esc_attr($price[0]) ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </div>
                                <div class="pull-left">
                                    <?php if(isset($atts['price'.$i]) && !empty($atts['price'.$i])): ?>
                                        <?php if($price[1]): ?>
                                            <span class="price-val-2"><?php echo esc_attr($price[1]) ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="offer-price-small">
                            $<span class="offer-price-val1">7</span><span class="offer-price-val2">99</span>
                        </div>
                    </article>
                </a>
            </li>
        <?php endif; }?>
        </ul>
    </div><!-- #slider-specials -->
    <div id="<?php echo esc_attr($html_id).'-thumbs'; ?>" class="flexslider cms-slider-carousel-thumbs">
        <ul class="slides">
        <?php 
            for($i=1;$i <= (int)$atts['cms_slides']; $i++){
                $image_thumb=wp_get_attachment_image_src($atts['image'.$i],'wp_pizzeria_large');
            if(isset($image_thumb[0]) && !empty($image_thumb[0])):
         ?>
            <li>
                <img alt="<?php echo esc_html__('Slide thumbnail','wp_pizzeria') ?>" src="<?php echo esc_url($image_thumb[0]); ?>" />
            </li>
            
        <?php endif; } ?>
        </ul>
    </div><!-- #slider-specials-thumbs -->
</div>