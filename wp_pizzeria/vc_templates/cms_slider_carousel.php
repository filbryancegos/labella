<?php
$html_id=$atts['html_id'];
$template=$atts['template'];
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$button_classes = array(
	'cart-trigger',
	$atts['style'],
	$atts['size'],
	$atts['button_text_size'],
	$atts['color'],
);
if(!empty($button_heavy)){
	$button_classes[]='button-heavy'; 
}
if(!empty($add_icon)){
        $button_classes[]=' with-right-arrow'; 
}
if(isset($button_uppercase) && !empty($button_uppercase)){
        $button_classes[]=' button-uppercase';
}
if ( $button_classes ) {
	$button_classes = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $button_classes ) ), $this->settings['base'], $atts ) );

}
if(isset($atts['btn_custom_color']) && !empty($atts['btn_custom_color'])){
        $button_style ='style="color:'.$btn_custom_color.'; border-color:'.$btn_custom_color.';"';
    }else{
        $button_style='';
    }
 ?>
<div id="<?php echo esc_attr($html_id); ?>" class="cms-slider-carousel owl-pagination-dash owl-navigation-box <?php echo esc_attr($template);?>">
    <?php 
    	for($i=1;$i <= (int)$atts['cms_slides']; $i++){
    		$image=wp_get_attachment_image_src($atts['image'.$i],'wp_pizzeria_large');
    	if(isset($image[0]) && !empty($image[0])):
    ?>
	    <div class="offer">
	        <img alt="product" src="<?php echo esc_url($image[0]);?>">
	        <?php if(isset($atts['price'.$i]) && !empty($atts['price'.$i])): 
	        	$price = explode('.', $atts['price'.$i]);
	        ?>
		        <div class="offer-price-small">
		        	<span class="offer-price-currency"><?php echo esc_attr($atts['currency']); ?></span>
		        	<?php if(isset($price[0]) && !empty($price[0])): ?>
			        	<span class="offer-price-val1"><?php echo esc_attr($price[0]); ?></span>
			        <?php endif; ?>
			        <?php if(isset($price[1]) && !empty($price[1])): ?>
		        		<span class="offer-price-val2"><?php echo esc_attr($price[1]); ?></span>
		        	<?php endif; ?>
		        </div>
		    <?php endif; ?>
	        <div class="offer-detail">
	        	<div class="offer-detail-inner">
	            	<div class="offer-detail-content">
	            		<?php if(!empty($atts['title'.$i])): ?>
		                    <h6><?php echo esc_attr($atts['title'.$i]); ?></h6>
		                <?php endif; ?>
		                <?php if(!empty($atts['subtitle'.$i])): ?>
	                    	<h3><?php echo esc_attr($atts['subtitle'.$i]); ?></h3>
	                    <?php endif; ?>
	                    <?php if(!empty($atts['desc'.$i])): ?>
	                    	<em><?php echo apply_filters('the_title',$atts['desc'.$i]);?></em>
	                    <?php endif; ?>
	                    <div class="price-huge clearfix">
	                    	<?php if(isset($atts['price'.$i]) && !empty($atts['price'.$i])): 
	                    		$price = explode('.', $atts['price'.$i]);
	                    	?>
		                        <div class="pull-left">
		                            <div class="price-currency"><?php echo esc_attr($atts['currency']) ?></div>
		                            <?php if(isset($price[0]) && !empty($price[0])): ?>
							        	<span class="price-val-1"><?php echo esc_attr($price[0]) ?></span>
							        <?php endif; ?>
		                        </div>
		                    <?php endif; ?>
		                        <div class="pull-left">
		                        	<?php if(isset($atts['price'.$i]) && !empty($atts['price'.$i])): ?>
			                            <?php if(isset($price[1]) && !empty($price[1])): ?>
							        		<span class="price-val-2"><?php echo esc_attr($price[1]) ?></span>
							        	<?php endif; ?>
							        <?php endif; ?>
							        	<?php if(!empty($atts['text'.$i])): ?>
			                            	<a href="<?php echo esc_url($atts['link'.$i]); ?>" class="<?php echo esc_attr($button_classes); ?>" <?php echo ''.$button_style; ?>><?php echo esc_attr($atts['text'.$i]); ?></a>
			                        	<?php endif; ?>
		                        </div>
	                    </div>
	                </div>
	        	</div><!-- .offer-detail-inner -->
	        </div><!-- .offer-detail -->
	    </div><!-- .offer -->
    <?php endif; } ?>
</div><!-- #product-slider -->