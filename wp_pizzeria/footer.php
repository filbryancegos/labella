<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $smof_data, $woocommerce;
?>
    <?php if(isset($woocommerce) && $woocommerce): ?>
        <?php  $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
        <section id="cms-mini-cart" class="cms-mini-cart ">

                <div class="container">
                    <div class="cart-content">
                        <div class="cart-content-inner">
                                <div class="cart-close cart-trigger"><i class="fa fa-close"></i></div>
                                <div class="border-lines-container">
                                    <h1 class="no-top-margin border-lines">Cart</h1>
                                </div>
                                <div class="shopping_cart_dropdown">
                                    <?php if(!$cart_is_empty): ?>

                                    <form>
                                    <?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

                                            $_product = $cart_item['data'];

                                            // Only display if allowed
                                            if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
                                                continue;
                                            }

                                            // Get price
                                            $product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                                            $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
                                    ?>
                                        <div class="product-preview-small">
                                            <div class="product-img">
                                                <?php echo ''.$_product->get_image(array(83,76)); ?>
                                            </div>
                                            <div class="shopping_cart_dropdown">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h4 class="product-title"><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h4>
                                                        <?php $price= apply_filters( 'woocommerce_cart_item_price', $woocommerce->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                                                        <?php echo esc_html__('Price','wp_pizzeria').' '.$price.'/, '.esc_html__('order','wp_pizzeria'); ?>
                                                        <div class="product-pieces">
                                                            <?php
                                                                if ( $_product->is_sold_individually() ) {
                                                                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                                } else {
                                                                    $product_quantity = sprintf( '<input type="text" name="cart[%s][qty]" value="%s" readonly />', $cart_item_key,$cart_item['quantity'] );
                                                                }

                                                                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                                            ?>
                                                            <input type="number" class="quantity-second" value="" readonly>
                                                            </div>
                                                        <?php echo esc_html__('pieces','wp_pizzeria'); ?>
                                                    </div>
                                                    <div class="col-md-4 product-price">
                                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                                    </div>
                                                </div>
                                            </div><!-- .product-content -->
                                        </div><!-- .product-preview-small -->
                                    <?php endforeach; ?>
                                        <hr>
                                        <p class="text-right text-bigger"><?php echo esc_html__('Total: ','wp_pizzeria'); ?> <?php echo ''.$woocommerce->cart->get_cart_subtotal(); ?></p>
                                        <div class="row text-xs-center">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="col-sm-6 text-right text-xs-center">
                                                <div class="margin-15"></div>
												<?php $cart_url=$woocommerce->cart->get_cart_url(); ?>
                                                <a href="<?php echo esc_url($cart_url); ?>" class="button-yellow button-text-low button-long button-low scroll-to cart-trigger"><?php echo esc_html__('View Cart','wp_pizzeria'); ?></a>
                                            </div>
                                        </div>
                                    </form>

                                  <?php else: ?>
                                      <?php esc_html_e( 'No products in the cart.', 'wp_pizzeria' ); ?>
                                  <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- .cart-content -->
                </div><!-- .container -->

        </section><!-- #cart -->
    <?php endif; ?>
        </div><!-- #main -->
			<footer class="page-footer">
                <?php if ($smof_data['enable_footer_top'] =='1'): ?>
                    <?php
                        $sidebar=0;
                        for($i=5;$i<=7; $i++){
                            if(is_active_sidebar('sidebar-'.$i)){
                                $sidebar = $sidebar+1;
                            }

                        }

                    ?>
                    <div id="cshero-footer-top">
                        <div class="container">
                            <div class="row">
                            <?php for($j=5;$j<=(4+$sidebar); $j++){
                                $class=' col-md-'.(12/$sidebar).' responsive-column';
                                if($sidebar==3 && $j==6){
                                    $class .=' text-center';
                                }

                            ?>
                                <div class="<?php echo esc_attr($class)?>"><?php dynamic_sidebar('sidebar-'.$j); ?></div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <?php if ($smof_data['enable_footer_bottom'] =='1'): ?>
                    <div id="cshero-footer-bottom">
                         <div class="container">
                             <div class="row">
                                 <div class="col-xs-8 text-left"><?php dynamic_sidebar('sidebar-8'); ?></div>
                                 <div class="col-xs-4  text-right footer-socials"><?php dynamic_sidebar('sidebar-9'); ?></div>
                             </div>
                         </div>
                        <?php if ($smof_data['enable_footer_bottom'] =='1' && $smof_data['footer_botton_back_to_top']=='1'): ?>
                            <div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-angle-double-up"></i></span></div>
                        <?php endif ?>
                    </div>

                <?php endif;?>
		</footer><!-- #site-footer -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>
