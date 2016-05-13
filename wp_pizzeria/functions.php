<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/**
 * Add global values.
 */
global $smof_data, $wp_filesystem, $wp_pizzeria_meta, $wp_pizzeria_base;

/* Add WP_Filesystem. */
if ( !function_exists('WP_Filesystem') ) {

	require_once(ABSPATH . 'wp-admin/includes/file.php');

	WP_Filesystem();
}

/* Dismiss vc update. */
if(function_exists('vc_set_as_theme')) vc_set_as_theme( true );

/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );

if(class_exists("WP_Pizzeria_Base")){
    $wp_pizzeria_base = new WP_Pizzeria_Base;
}

/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

/* Add custom vc params. */

    /* Add theme elements */
    add_action('vc_before_init', 'wp_pizzeria_vc_elements');

    function wp_pizzeria_vc_elements(){
    	global  $woocommerce;
        if(class_exists('CmsShortCode')){
            require( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
            require( get_template_directory() . '/inc/elements/slider_carousel/cms_slider_carousel.php' );
            require( get_template_directory() . '/inc/elements/videohtml5/cms_videohtml5.php' );
            if(isset($woocommerce) && $woocommerce){
            	require( get_template_directory() . '/inc/elements/menu_products/cms_menu_products.php' );
            }
        }
    }
    add_action('vc_after_init', 'wp_pizzeria_vc_params');
    function wp_pizzeria_vc_params() {
        require( get_template_directory() . '/vc_params/vc_rows.php' );
        require( get_template_directory() . '/vc_params/vc_btn.php' );
        require( get_template_directory() . '/vc_params/cms_fancybox_single.php' );
        require( get_template_directory() . '/vc_params/cms_fancybox.php' );
        require( get_template_directory() . '/vc_params/vc_column.php' );
        require( get_template_directory() . '/vc_params/cms_grid.php' );
        require( get_template_directory() . '/vc_params/cms_carousel.php' );
        require( get_template_directory() . '/vc_params/vc-custom-heading.php' );
        require( get_template_directory() . '/vc_params/vc_single_image.php' );
    }

/* Remove hook woocommerce */
if(isset($woocommerce) && $woocommerce){
	require( get_template_directory() . '/woocommerce/woocommerce-hook.php' );
}
/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/libs/scss.inc.php' );
}

/* Add Meta Core Options */
if(is_admin()){
     require( get_template_directory() . '/inc/options/require.plugins.php' );
    if(!class_exists('CsCoreControl')){
        /* add mete core */
        require( get_template_directory() . '/inc/metacore/core.options.php' );
        /* add meta options */
        require( get_template_directory() . '/inc/options/meta.options.php' );
    }

    /* tmp plugins. */

}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css*/
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add mega menu */
if(!class_exists('HeroMenuWalker')){
    require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}

/* Add widgets */
require( get_template_directory() . '/inc/widgets/recent_post_v2.php' );
require( get_template_directory() . '/inc/widgets/social.php' );
require( get_template_directory() . '/inc/widgets/login.php' );

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */

 add_action( 'woocommerce_product_options_pricing', 'wc_rrp_product_field' );
 function wc_rrp_product_field() {
     woocommerce_wp_text_input( array( 'id' => 'rrp_price', 'class' => 'wc_input_price short', 'label' => __( 'Solo Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')' ) );
 }

 add_action( 'save_post', 'wc_rrp_save_product' );
 function wc_rrp_save_product( $product_id ) {
     // If this is a auto save do nothing, we only save when update button is clicked
 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
 		return;
 	if ( isset( $_POST['rrp_price'] ) ) {
 		if ( is_numeric( $_POST['rrp_price'] ) )
 			update_post_meta( $product_id, 'rrp_price', $_POST['rrp_price'] );
 	} else delete_post_meta( $product_id, 'rrp_price' );
 }

 add_action( 'woocommerce_product_options_pricing', 'wc_family_product_field' );
 function wc_family_product_field() {
     woocommerce_wp_text_input( array( 'id' => 'family_price', 'class' => 'wc_input_price short', 'label' => __( 'Family Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')' ) );
 }

 add_action( 'save_post', 'wc_family_save_product' );
 function wc_family_save_product( $product_id ) {
     // If this is a auto save do nothing, we only save when update button is clicked
 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
 		return;
 	if ( isset( $_POST['family_price'] ) ) {
 		if ( is_numeric( $_POST['family_price'] ) )
 			update_post_meta( $product_id, 'family_price', $_POST['family_price'] );
 	} else delete_post_meta( $product_id, 'family_price' );
 }

function wp_pizzeria_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'wp_pizzeria' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp_pizzeria' , get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );

	// Add woocommerce
	add_theme_support('woocommerce');

	// Adds custom header
	add_theme_support( 'custom-header' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote',) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'wp_pizzeria' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('wp_pizzeria_related-img', 100, 100, true);
	add_image_size('wp_pizzeria_square-img', 570, 520, true);
	add_image_size('wp_pizzeria_rectangle-medium', 370, 250, true);
	add_image_size('wp_pizzeria_rectangle', 370, 350, true);
	add_image_size('wp_pizzeria_rectangle-large', 570, 297, true);
	add_image_size('wp_pizzeria_rectangle-small', 570, 220, true);
	add_image_size('wp_pizzeria_large', 1170, 580, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}

add_action( 'after_setup_theme', 'wp_pizzeria_setup' );

/**
 * Get meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_pizzeria_meta_data(){
    global $post, $wp_pizzeria_meta;

    if(!isset($post->ID)) return ;

    $wp_pizzeria_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));

    if(empty($wp_pizzeria_meta)) return ;

    foreach ($wp_pizzeria_meta as $key => $meta){
        $wp_pizzeria_meta->$key = rawurldecode($meta);
    }
}
add_action('wp', 'wp_pizzeria_meta_data');

/**
 * Get post meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_pizzeria_post_meta_data(){
    global $post;

    if(!isset($post->ID)) return null;

    $post_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));

    if(empty($post_meta)) return null;

    foreach ($post_meta as $key => $meta){
        $post_meta->$key = rawurldecode($meta);
    }

    return $post_meta;
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function wp_pizzeria_scripts_styles() {

	global $smof_data, $wp_styles;

	/** theme options. */
	$script_options = array(
	    'menu_sticky'=> $smof_data['menu_sticky'],
	    'back_to_top'=> $smof_data['footer_botton_back_to_top'],
	    'page_loadding'=> $smof_data['enable_page_loadding'],
	);

	/*------------------------------------- JavaScript ---------------------------------------*/


	/** --------------------------libs--------------------------------- */


	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('wp-pizzeria-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');

	/* Add parallax plugin. */
	wp_enqueue_script('wp-pizzeria-parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true);

	/* Add smoothscroll plugin */
	if($smof_data['smoothscroll']){
	   wp_enqueue_script('wp-pizzeria-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}

	/** --------------------------custom------------------------------- */

	/* Add main.js */
	wp_register_script('wp-pizzeria-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	wp_localize_script('wp-pizzeria-main', 'CMSOptions', $script_options);
	wp_enqueue_script('wp-pizzeria-main');
	/* Add jquery.nav.min.js */
    wp_enqueue_script('wp-pizzeria-jquery-nav-min', get_template_directory_uri() . '/assets/js/jquery.nav.min.js', array( 'jquery' ), '1.0.0', true);

    /* Add menu.js */
    wp_enqueue_script('wp-pizzeria-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);

	/* Add modernizr-custom.min.js */
    wp_enqueue_script('wp-pizzeria-modernizr-custom', get_template_directory_uri() . '/assets/js/modernizr-custom.min.js', array( 'jquery' ), '1.3.0', true);

	/* Add jquery.inview.min.js */
    wp_enqueue_script('wp-pizzeria-inview-js', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array( 'jquery' ), '1.3.0', true);

    /* Add jquery.flexslider-min.js */
    wp_register_script('wp-pizzeria-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), '2.5.0', true);

	/* Add isotope.pkgd.min.js */
    wp_register_script('wp-pizzeria-isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'),'2.2.0',true);

	/* Add lightbox.min.js */
    wp_enqueue_script('wp-pizzeria-lightbox', get_template_directory_uri().'/assets/js/lightbox.min.js', array('jquery'),'2.7.1',true);

	/* Add lightbox.min.js */
    wp_enqueue_script('wp-pizzeria-scrollTo', get_template_directory_uri().'/assets/js/jquery.scrollTo.min.js', array('jquery'),'1.4.13',true);

	/* Add jquery.isotope.cms.js */
	wp_register_script('wp-pizzeria-isotope-cms', get_template_directory_uri().'/assets/js/jquery.isotope.cms.js', array('wp-pizzeria-isotope'));

	/* Add jquery.mousewheel.js */
	wp_enqueue_script('wp-pizzeria-mousewheel', get_template_directory_uri().'/assets/js/jquery.mousewheel.min.js', array('jquery'));

	/* Add jquery.singlePageNav.js */
	//wp_enqueue_script('singlePageNav', get_template_directory_uri().'/assets/js/jquery.singlePageNav.js', array('jquery'));

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/

	/** --------------------------libs--------------------------------- */

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('wp-pizzeria-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('wp-pizzeria-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads Font Ionicons. */
	wp_enqueue_style('wp-pizzeria-font-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.1');

	/* Loads Pe Icon. */
	wp_enqueue_style('wp-pizzeria-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');

	/** --------------------------custom------------------------------- */

	/* Loads our main stylesheet. */
	wp_enqueue_style( 'wp-pizzeria-style', get_stylesheet_uri(), array( 'wp-pizzeria-bootstrap' ));/* Loads our main stylesheet. */

	/* animate.min.css . */
	wp_enqueue_style( 'wp-pizzeria--fonts', get_template_directory_uri() . '/assets/css/fonts.css');

	/* animate.min.css . */
	wp_enqueue_style( 'wp-pizzeria-animate-css', get_template_directory_uri() . '/assets/css/animate.min.css');

	/* flexslider.css . */
	wp_register_style( 'wp-pizzeria-flexslider', get_template_directory_uri() . '/assets/css/flexslider.css');

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'wp-pizzeria-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'wp-pizzeria-style' ), '20121010' );
	$wp_styles->add_data( 'wp-pizzeria-ie', 'conditional', 'lt IE 9' );

	/* WooCommerce */
	if(class_exists('WooCommerce')){
	    wp_enqueue_style( 'wp-pizzeria-woocommerce', get_template_directory_uri() . "/assets/css/woocommerce.css", array(), '1.0.0');
	}

	/* Load static css*/
	wp_enqueue_style('wp-pizzeria-static', get_template_directory_uri() . '/assets/css/static.css', array( 'wp-pizzeria-style' ), '1.0.0');

	/* Load lightbox css*/
	wp_enqueue_style('wp-pizzeria-lightbox', get_template_directory_uri() . '/assets/css/lightbox.css');

	if($smof_data['mode'] == 'light'){
		wp_enqueue_style('wp-pizzeria-light-mode-css', get_template_directory_uri() . '/assets/css/light.css', array( 'wp-pizzeria-style' ), '1.0.0');
	}
}

add_action( 'wp_enqueue_scripts', 'wp_pizzeria_scripts_styles' );

function wp_pizzeria_admin_load_css() {
	wp_enqueue_style('wp-pizzeria-admin-css', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'wp_pizzeria_admin_load_css');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function wp_pizzeria_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'wp_pizzeria' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp_pizzeria' ),
		'before_widget' => '<aside id="%1$s" class="sidebar-section widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="wg-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Top Left', 'wp_pizzeria' ),
		'id' => 'sidebar-2',
		'description' => esc_html__( 'Appears when using the optional Header with a page set as Header top left', 'wp_pizzeria' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Top Right', 'wp_pizzeria' ),
		'id' => 'sidebar-3',
		'description' => esc_html__( 'Appears when using the optional Header with a page set as Header top right', 'wp_pizzeria' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Header Bottom', 'wp_pizzeria' ),
    	'id' => 'sidebar-4',
    	'description' => esc_html__( 'Appears when using the optional Header with a page set as Header bottom', 'wp_pizzeria' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 1', 'wp_pizzeria' ),
    	'id' => 'sidebar-5',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 1', 'wp_pizzeria' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h2 class="footer-heading">',
    	'after_title' => '</h2>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 2', 'wp_pizzeria' ),
    	'id' => 'sidebar-6',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 2', 'wp_pizzeria' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h2 class="footer-heading ">',
    	'after_title' => '</h2>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 3', 'wp_pizzeria' ),
    	'id' => 'sidebar-7',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 3', 'wp_pizzeria' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h2 class="footer-heading text-uppercase">',
    	'after_title' => '</h2>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Botom Left', 'wp_pizzeria' ),
    	'id' => 'sidebar-8',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer bottom left', 'wp_pizzeria' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Boton Right', 'wp_pizzeria' ),
    	'id' => 'sidebar-9',
    	'description' => esc_html__( 'Appears when using the optional Footer Boton with a page set as Footer Boton right', 'wp_pizzeria' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Login', 'wp_pizzeria' ),
    	'id' => 'sidebar-10',
    	'description' => '',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Shop', 'wp_pizzeria' ),
    	'id' => 'shop',
    	'description' => '',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_pizzeria_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function wp_pizzeria_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'wp_pizzeria_page_menu_args' );

/**
 * Add field subtitle to post.
 *
 * @since 1.0.0
 */
function wp_pizzeria_add_subtitle_field(){
    global $post, $wp_pizzeria_meta;

    /* get current_screen. */
    $screen = get_current_screen();

    /* show field in post. */
    if(in_array($screen->id, array('post'))){

        /* get value. */
        $value = get_post_meta($post->ID, 'post_subtitle', true);

        /* html. */
        echo '<div class="subtitle"><input type="text" name="post_subtitle" value="'.esc_attr($value).'" id="subtitle" placeholder = "'.__('Subtitle', 'wp_pizzeria').'" style="width: 100%;margin-top: 4px;"></div>';
    }
}

add_action( 'edit_form_after_title', 'wp_pizzeria_add_subtitle_field' );

/**
 * Save custom theme meta.
 *
 * @since 1.0.0
 */
function wp_pizzeria_save_meta_boxes($post_id) {

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'wp_pizzeria_save_meta_boxes');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function wp_pizzeria_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" >
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wp_pizzeria' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'wp_pizzeria' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'wp_pizzeria' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function wp_pizzeria_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" >
			<div class="pagination loop-pagination">
				<?php echo ''.$links; ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function wp_pizzeria_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation" >
		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			  <a class="btn btn-default post-prev left" href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-angle-left"></i><?php echo esc_attr($prev_post->post_title); ?></a>
			<?php endif; ?>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
			  <a class="btn btn-default post-next right" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?><i class="fa fa-angle-right"></i></a>
			<?php } ?>

			</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/* Add Custom Comment */
function wp_pizzeria_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

		$tag = 'div';
		$add_below = 'comment';
    ?>
    <div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
    <?php endif; ?>
    <div class="comment-author-image vcard">
    	<?php echo get_avatar( $comment, 100 ); ?>

    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    	<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' , 'wp_pizzeria'); ?></em>
    <?php endif; ?>
    <div class="comment-content">
    		<h6 class="comment-author"><?php echo get_comment_author_link(); ?></h6>
    		<div class="comment-detail">
    		<?php
    			$comment_date=get_comment_date('d - F - Y',get_comment_ID());
	    			$comment_time=get_comment_date( 'H:i',get_comment_ID());
	    			if(!empty($comment_time)){
	    				$comment_date .=esc_html__(', at ','wp_pizzeria').$comment_time.esc_html__('hr','wp_pizzeria');
	    			}
    			echo esc_attr($comment_date);
    		?>
    		</div>
    		<?php comment_text(); ?>
    		<div class="reply">
    		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    		</div>
    </div>
    </div>
    </div>
    <?php
}

/**
 * limit words
 *
 * @since 1.0.0
 */
if (!function_exists('wp_pizzeria_limit_words')) {
    function wp_pizzeria_limit_words($string, $word_limit) {
        $words = explode(' ', $string, ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return implode(' ', $words)."";
    }
}

add_filter('cms-shorcode-list', 'wp_pizzeria_shortcodes_list');
function wp_pizzeria_shortcodes_list(){
 $cms_shortcodes_list = array(
	  'cms_carousel',
	  'cms_grid',
	  'cms_fancybox_single',
	  'cms_fancybox',
	);
 return $cms_shortcodes_list;
}


if (!function_exists('wp_pizzeria_excerpt_more')) {
	function wp_pizzeria_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'wp_pizzeria_excerpt_more');
}


if (!function_exists('wp_pizzeria_excerptlength')) {
	function wp_pizzeria_excerptlength( $length  ) {
		return 25;
	}
	add_filter('excerpt_length', 'wp_pizzeria_excerptlength');
}

/**
 * List socials share for post.
 *
 * @since 1.0.0
 */

if (!function_exists('wp_pizzeria_get_socials_share()')) {
    function wp_pizzeria_get_socials_share(){
        ?>
         <div class="wp-pizzeria-socials">
        	<div class="wp-pizzeria-socials-content">
                <a href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a>
                <a href="https://twitter.com/home?status=<?php esc_url('Check out this article', 'wp_pizzeria');?>:%20<?php esc_attr(get_the_title());?>%20-%20<?php the_permalink();?>"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a>
        	</div>
        </div>
        <?php
    }
}

/**
 * Add class light_mode to <body>.
 *
 * @since 1.0.0
 */
 if (!function_exists('wp_pizzeria_page_mode')) {
	function wp_pizzeria_page_mode( $classes  ) {
		global $smof_data;
		if($smof_data['mode'] == 'light'){
			$classes[] = 'light_mode';
		}
		return $classes;
	}
	add_filter('body_class', 'wp_pizzeria_page_mode');
}

/**
 * replace css to pass validate w3c
 *
 */
function wp_pizzeria_ValidateStylesheet($src) {
 if(strstr($src,'font-awesome-css') || strstr($src,'mediaelement-css') || strstr($src,'wp-mediaelement-css')|| strstr($src,'flexslider-css')){
  return str_replace('rel', 'property="stylesheet" rel', $src);
 }
 else{
  return $src;
 }

}
add_filter('style_loader_tag', 'wp_pizzeria_ValidateStylesheet');


/**
 * Add product to mini cart
 *
 */
add_filter('add_to_cart_fragments', 'wp_pizzeria_header_add_to_cart_fragment');
if(!function_exists('wp_pizzeria_header_add_to_cart_fragment')){
    function wp_pizzeria_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        ob_start();
        ?>
        <span class="cart_total"><?php echo ''.$woocommerce->cart->cart_contents_count; ?></span>
        <?php
        $fragments['span.cart_total'] = ob_get_clean();
        return $fragments;
    }
}
add_filter('add_to_cart_fragments', 'wp_pizzeria_header_add_to_cart_content');
if(!function_exists('wp_pizzeria_header_add_to_cart_content')){
    function wp_pizzeria_header_add_to_cart_content( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <?php if(isset($woocommerce) && $woocommerce): ?>
        <?php  $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
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
	                            <div class="product-content">
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
    <?php endif; ?>
    <?php
    $fragments['div.shopping_cart_dropdown'] = ob_get_clean();
    return $fragments;
	}
}


/**
 * Set home page.
 *
 * get home title and update options.
 *
 * @return Home page title.
 * @author FOX
 */
function wp_pizzeria_set_home_page(){

    $home_page = 'Home';

    $page = get_page_by_title($home_page);

    if(!isset($page->ID))
        return ;

    update_option('show_on_front', 'page');
    update_option('page_on_front', $page->ID);
}

add_action('cms_import_finish', 'wp_pizzeria_set_home_page');

/**
 * Set menu locations.
 *
 * get locations and menu name and update options.
 *
 * @return string[]
 * @author FOX
 */
function wp_pizzeria_set_menu_location(){

    $setting = array(
        'Main' => 'primary'
    );

    $navs = wp_get_nav_menus();

    $new_setting = array();

    foreach ($navs as $nav){

        if(!isset($setting[$nav->name]))
            continue;

        $id = $nav->term_id;
        $location = $setting[$nav->name];

        $new_setting[$location] = $id;
    }

    set_theme_mod('nav_menu_locations', $new_setting);
}

add_action('cms_import_finish', 'wp_pizzeria_set_menu_location');

add_filter( 'lostpassword_url', 'wp_pizzeria_lost_password_page', 10, 2 );
function wp_pizzeria_lost_password_page( $lostpassword_url, $redirect ) {
    return home_url( '/wp-login.php?action=lostpassword&amp;redirect_to=' . $redirect );
}
