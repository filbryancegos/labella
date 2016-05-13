<?php
global $wp_pizzeria_base;
/* get local fonts. */
$local_fonts = is_admin() ? $wp_pizzeria_base->wp_pizzeria_getListLocalFontsName() : array() ;
/**
 * Home Options
 * 
 * @author Fox
 */
/* Start Dummy Data*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$msg = $disabled = '';
if (!class_exists('WPBakeryVisualComposerAbstract') or !class_exists('CmssuperheroesCore') or !function_exists('cptui_create_custom_post_types')){
    $disabled = ' disabled ';
    $msg='You should be install visual composer, Cmssuperheroes and Custom Post Type UI plugins to import data.';
}
$this->sections[] = array(
    'icon' => 'el-icon-briefcase',
    'title' => esc_html__('Demo Content', 'wp_pizzeria'),
    'fields' => array(
        array(
            'subtitle' => '<input type=\'button\' name=\'sample\' id=\'dummy-data\' '.$disabled.' value=\'Import Now\' /><div class=\'cms-dummy-process\'><div  class=\'cms-dummy-process-bar\'></div></div><div id=\'cms-msg\'><span class="cms-status"></span>'.$msg.'</div>',
            'id' => 'theme',
            'icon' => true,
            'default' => 'pizzeria',
            'options' => array(
                'pizzeria' => get_template_directory_uri().'/assets/images/dummy/pizzeria.png'
            ),
            'type' => 'image_select',
            'title' => 'Select Theme'
        )
    )
);
/* End Dummy Data*/

/**
 * 
 */
$this->sections[] = array(
    'title' => esc_html__('Favicon Icon', 'wp_pizzeria'),
    'icon' => 'el-icon-star',
    'fields' => array(
        array(
            'title' => esc_html__('Icon', 'wp_pizzeria'),
            'subtitle' => esc_html__('Select a favicon icon (.png, .jpg).', 'wp_pizzeria'),
            'id' => 'favicon_icon',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/favicon.png'
            )
        ),
    )
);

/**
 * Header Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'wp_pizzeria'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'wp_pizzeria'),
            'subtitle' => esc_html__('select a layout for header', 'wp_pizzeria'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'header_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'title' => 'Margin',
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '0',
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'header_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '0', 
                'padding-right'   => '0', 
                'padding-bottom'  => '30', 
                'padding-left'    => '0',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu.', 'wp_pizzeria'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Header', 'wp_pizzeria'),
            'default' => false,
        ),
    )
);

/* Header Top */

$this->sections[] = array(
    'title' => esc_html__('Header Top', 'wp_pizzeria'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable header top.', 'wp_pizzeria'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Top', 'wp_pizzeria'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'header_top_margin',
            'title' => 'Header Top Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('#cshero-header-top'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '25', 
                'margin-left'    => '0',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'header_top_padding',
            'title' => 'Header Top Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('#cshero-header-top'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '10', 
                'padding-right'   => '0', 
                'padding-bottom'  => '10', 
                'padding-left'    => '0',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        )
    )
);

/* Logo */
$this->sections[] = array(
    'title' => esc_html__('Logo', 'wp_pizzeria'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Logo', 'wp_pizzeria'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'wp_pizzeria'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        
    )
);

/**
 * Page Title
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title & BC', 'wp_pizzeria'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'wp_pizzeria'),
            'subtitle' => esc_html__('select a layout for page title', 'wp_pizzeria'),
            'default' => '3',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
                '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
                '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
            )
        ),
        array(
            'id'       => 'page_title_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'page title background with image, color, etc.', 'wp_pizzeria' ),
            'background-repeat'=>false,
            'background-position'=>false,
            'background-attachment'=>false,
            'background-size'=>false,
            'background-color'=>false,
            'default'=>array(
                'background-image'=>get_template_directory_uri().'/assets/images/page-title.png',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'page_title_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('#page-title'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '45', 
                'margin-left'    => '0',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'page_title_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('#page-title'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '0', 
                'padding-right'   => '0', 
                'padding-bottom'  => '0', 
                'padding-left'    => '0',
            ),
        )
    )
);
/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => esc_html__('Page Title', 'wp_pizzeria'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable sub page title.', 'wp_pizzeria'),
            'id' => 'enable_sub_page_title',
            'type' => 'switch',
            'title' => esc_html__('Enable sub page title', 'wp_pizzeria'),
            'default' => false,
        ),
        array(
            'id' => 'sub_page_title',
            'title' => 'Sub page title',
            'type' => 'text',
            'default' =>'',
            'required' => array( 0 => 'enable_sub_page_title', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'wp_pizzeria')
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'wp_pizzeria'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('The text before the breadcrumb home.', 'wp_pizzeria'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => esc_html__('Breadcrumb Home Prefix', 'wp_pizzeria'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #breadcrumb-text','.page-title #breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'wp_pizzeria'),
            'default' => array(
                'color' => '',
            )
        ),
    )
);

/**
 * Body
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Body', 'wp_pizzeria'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'body background with image, color, etc.', 'wp_pizzeria' ),
            'output'   => array('body'),
            'default'  => array(
                'background-color' => '#fff',
                'background-image'=>get_template_directory_uri().'/assets/images/backgrounds/bg1.png',
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'body_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('body'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '0',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'body_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('body'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '0', 
                'padding-right'   => '0', 
                'padding-bottom'  => '0', 
                'padding-left'    => '0',
            ),
        )
    )
);

/**
 * Content
 * 
 * Archive, Pages, Single, 404, Search, Category, Tags .... 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Content', 'wp_pizzeria'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'Container background with image, color, etc.', 'wp_pizzeria' ),
            'output'   => array('#main'),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'container_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('#main'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '80px',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'container_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('#main'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '0', 
                'padding-right'   => '0', 
                'padding-bottom'  => '0', 
                'padding-left'    => '80px',
            ),
        )
    )
);

/**
 * Page Loadding
 * 
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Page Loadding', 'wp_pizzeria'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable page loadding.', 'wp_pizzeria'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Enable Page Loadding', 'wp_pizzeria'),
            'default' => false,
        ),
         
    )
);

/**
 * Footer
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'wp_pizzeria'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable footer before.', 'wp_pizzeria'),
            'id' => 'enable_footer_before',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Before', 'wp_pizzeria'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background_color',
            'type'     => 'background',
            'title'    => esc_html__( 'Footer Background Color', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'footer  background with image, color, etc.', 'wp_pizzeria' ),
            'background-repeat'=>false,
            'background-position'=>false,
            'background-attachment'=>false,
            'background-image'=>false,
            'background-size'=>false,
            'output'   => array('.page-footer'),
            'default'  => array(
                'background-color' => '#fff',
            ),
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Footer Background Image', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'footer  background with image, color, etc.', 'wp_pizzeria' ),
            'background-repeat'=>false,
            'background-position'=>false,
            'background-attachment'=>false,
            'background-color'=>false,
            'background-size'=>false,
            'output'   => array('.page-footer:after'),
            'default'  => array(
                'background-color' => '#fff',
                'background-image'=>get_template_directory_uri().'/assets/images/backgrounds/bg3.png',
            ),
        ),
        array(
            'id'       => 'footer_before_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Footer Before Background ', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'footer before background with image, color, etc.', 'wp_pizzeria' ),
            'background-repeat'=>false,
            'background-position'=>false,
            'background-attachment'=>false,
            'background-size'=>false,
            'output'   => array('.page-footer:before'),
            'required' => array( 0 => 'enable_footer_before', 1 => '=', 2 => 1 ),
            'default'  => array(
                'background-image'=>get_template_directory_uri().'/assets/images/backgrounds/bg_footer.png',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('.page-footer'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '100px', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '0',
            ),
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('.page-footer'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '25px', 
                'padding-right'   => '0', 
                'padding-bottom'  => '0', 
                'padding-left'    => '0',
            ),
        )
    )
);

/* Footer top */
$this->sections[] = array(
    'title' => esc_html__('Footer Top', 'wp_pizzeria'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable footer top.', 'wp_pizzeria'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Top', 'wp_pizzeria'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_top_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'footer background with image, color, etc.', 'wp_pizzeria' ),
            'output'   => array('footer #cshero-footer-top'),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_top_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('#cshero-footer-top'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '0',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_top_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('#cshero-footer-top'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '0', 
                'padding-right'   => '0', 
                'padding-bottom'  => '60px', 
                'padding-left'    => '0',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        )
    )
);

/* footer bottom */
$this->sections[] = array(
    'title' => esc_html__('Footer Bottom', 'wp_pizzeria'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable footer bottom.', 'wp_pizzeria'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Bottom', 'wp_pizzeria'),
            'default' => false,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp_pizzeria' ),
            'subtitle' => esc_html__( 'background with image, color, etc.', 'wp_pizzeria' ),
            'output'   => array('footer #cshero-footer-bottom'),
            'default'   => array(
                'background-color'=> '#fff',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_bottom_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'output'         => array('#cshero-footer-bottom'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'margin-top'     => '0', 
                'margin-right'   => '0', 
                'margin-bottom'  => '0', 
                'margin-left'    => '0',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_pizzeria'),
            'id' => 'footer_bottom_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'output'         => array('#cshero-footer-bottom'),
            'units'          => array('px'),
            'units_extended' => 'false',
            'default' => array(
                'padding-top'     => '14px', 
                'padding-right'   => '0', 
                'padding-bottom'  => '14px', 
                'padding-left'    => '0',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable button back to top.', 'wp_pizzeria'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'wp_pizzeria'),
            'default' => true,
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Styling', 'wp_pizzeria'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('set color main color.', 'wp_pizzeria'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'wp_pizzeria'),
            'default' => '#f5d010'
        ),
        array(
            'id'       => 'mode',
            'type'     => 'select',
            'title'    => esc_html__( 'Select page mode', 'wp_pizzeria' ),
            'options'  => array('dark'=>'Dark','light'=>'Light'),
            'default'  => 'dark',
        ),
       
    )
);

/**
 * Typography
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'wp_pizzeria'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'line-height' => false,
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'wp_pizzeria'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Vollkorn',
                'google' => true,
                'font-size' => '15px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '29px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '26px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '23px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '21px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '19px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'line-height' => false,
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => 'Playfair Display',
                'google' => true,
                'font-size' => '17px',
                'text-align' => ''
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'wp_pizzeria'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Font 1', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => 'Playfair Display',
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'wp_pizzeria'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp_pizzeria'),
            'validate' => 'no_html',
            'default' => 'blockquote:before',
            'std'=>'blockquote:before',
            'value'=>'blockquote:before'
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Font 2', 'wp_pizzeria'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'wp_pizzeria'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp_pizzeria'),
            'validate' => 'no_html',
            'default' => '',
        ),
    )
);

/**
 * Custom CSS
 * 
 * extra css for customer.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'wp_pizzeria'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'wp_pizzeria'),
            'subtitle' => esc_html__('create your css code here.', 'wp_pizzeria'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'wp_pizzeria'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation mouse scroll...', 'wp_pizzeria'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => esc_html__('Smooth Scroll', 'wp_pizzeria'),
            'default' => false
        ),
    )
);
/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Optimal Core', 'wp_pizzeria'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'wp_pizzeria'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'wp_pizzeria'),
            'default' => false
        )
    )
);