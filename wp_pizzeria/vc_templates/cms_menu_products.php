<?php
global $wp_query;

$currency=get_woocommerce_currency_symbol();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$taxonomies=explode(',', $taxonomies);
 ?>
 <?php if(count($taxonomies) > 0): ?>
<div class="cms-menu-products-wraper <?php echo esc_attr($template);?>" id="<?php echo esc_attr($html_id);?>">
	<div class="text-center">
		<ul class="list-bullets-inline">
			<?php foreach ($taxonomies as $taxonomy) :
				$taxo=get_term_by('id',(int)$taxonomy,'product_cat');
				if(!empty($taxo->slug)):
			 ?>
				<!-- <li><a href="#menu-<?php echo esc_attr($taxo->slug);?>" class="scroll-to"><?php echo esc_attr($taxo->name); ?></a></li> -->
			<?php endif; endforeach; ?>
		</ul>
	</div>

	<div class="cms-list-products">
		<?php foreach ($taxonomies as $taxonomy) :
				$taxo=get_term_by('id',(int)$taxonomy,'product_cat');
				if(!empty($taxo)):
				$args = array(
					'post_type' => 'product',
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $taxo->slug,
						),
					),
					'showposts'=>$number_product,
				);
            	$products_query = new WP_Query($args);
        	 	$count=$products_query->post_count;
        	 	if($count > 0):
		?>
			<div class="border-lines-container">
                <h5 class="border-lines" id="menu-<?php echo esc_attr($taxo->slug);?>"><?php echo esc_attr($taxo->name); ?></h5>
            </div>
            <?php

        	 	$i=1;
        	 	$j=1;
        	 	while ( $products_query->have_posts() ) : $products_query->the_post();
        	 	global $product;
        	 		if($j > 3){
                        $j=1;
                    }
        	 	?>
        	 	<?php if($j==1): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="col-md-4">
	                    <div class="product-preview-medium">
	                        <div class="product-img">
	                        <?php /*
	                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wp_pizzeria_square-img', false)):
	                                $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_pizzeria_square-img');
	                            else:
	                                $thumbnail = '<img src="'.esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ).'" alt="'.get_the_title().'" />';
	                            endif;
                                */
	                        ?>
	                            <a href="<?php the_permalink(); ?>" class=""><?php echo ''.$thumbnail; ?></a>
	                        </div>
	                        <div class="product-content">
	                        	<h4 class="product-title"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></h4>
	                            <?php the_excerpt(); ?>
	                            <div class="product-price">
                                <?php echo esc_html__('Solo Price:','wp_pizzeria'); ?>&nbsp; &#8369;<?php echo get_post_meta( get_the_ID(), 'rrp_price', true );?>
                                <?php echo esc_html__('Family Price:','wp_pizzeria'); ?>&nbsp; &#8369;<?php echo get_post_meta( get_the_ID(), 'family_price', true );?>
	                            </div>
	                        </div><!-- .product-content -->
	                    </div><!-- .product-preview-medium -->
	        		</div>
            	<?php if($j == 3 || $i==$count ): ?>
                    </div>
                 <?php endif; ?>
            	 <?php
            	  $j++;
                     $i++;

            	 endwhile;
            	 wp_reset_postdata();
            	 endif;
             ?>
		<?php endif; endforeach; ?>
	</div>
</div>
<?php endif; ?>
