<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<?php global $smof_data, $wp_pizzeria_meta,$woocommerce;
?>
<?php if ($smof_data['enable_header_top'] =='1'): ?>
<div id="cshero-header-top">
    <div class="container">
        <div class="row">
             <div class="col-sm-12 col-md-4 col-lg-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
             <div class="col-sm-12 col-md-8 col-lg-8 text-right text-right-mobile">
               <div class="phone-bg">
                 <div class="phone-content">
                   <ul>
                      <li><small>Now Serving</small> <span><br>Breakfast</span></li>
                     <li><a href="tel:032-341-1234">(032) 341 1234</a></li>
                     <li><small>Delivers to Mactan and Mandaue Areas Only</small> <span><br>Flat Rate for Delivery: Php75</span></li>
                   </ul>
                 </div>
                </div>
             </div>
        </div>
    </div>
</div>
<?php endif;?>
<div id="cshero-header" class="cshero-main-header <?php if (!$smof_data['menu_sticky']) {echo 'no-sticky';} ?> . <?php if (is_page() && !empty($wp_pizzeria_meta->_cms_enable_header_fixed)) {echo 'header-fixed-page';} ?>">
    <div id="main-navigation-inner">
        <div class="container">
            <div class="relative-container clearfix">
                <div id="main-navigation-button"><i class="fa fa-reorder"></i></div>
                <div class="pull-left">
                    <div class="centered-columns">
                        <div class="centered-column">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img class="page-logo" alt="" src="<?php echo esc_url($smof_data['main_logo']['url']); ?>"></a>
                        </div>
                        <div class="centered-column hidden-xs">
                            <?php dynamic_sidebar('sidebar-4'); ?>
                        </div>
                    </div>
                </div>
                <nav id="main-navigation">
                    <?php

                        $attr = array(
                            'menu' =>wp_pizzeria_menu_location(),
                            'menu_class' => 'nav-menu menu-main-menu',
                        );

                        $menu_locations = get_nav_menu_locations();

                        if(!empty($menu_locations['primary'])){
                            $attr['theme_location'] = 'primary';
                        }

                        /* enable mega menu. */
                        if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

                        /* main nav. */
                    wp_nav_menu( $attr ); ?>
                    <?php if(isset($woocommerce) && $woocommerce):
                     ?>
                        <div class="menu-item has-small-label cart-trigger cms-cart-mini-button">
                            <i class="fa fa-shopping-cart"></i>
                            <span class=" small-label">
                                <span class="cart_total">
                                    <?php
                                        if($woocommerce){
                                            echo $woocommerce->cart->get_cart_contents_count();
                                        }else{
                                            echo '';
                                        }
                                    ?>
                                </span>

                            </span>
                        </div>
                    <?php endif; ?>
                </nav>
            </div><!-- .relative-container -->
        </div>
    </div>
</div>
<div id="main-navigation-placeholder"></div>
<!-- #site-navigation -->
