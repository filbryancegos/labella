<?php
$terms = get_terms('product_cat', 'orderby=count&hide_empty=0');
$categories=array();
if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        if($term->count > 0){
            $categories[$term->name]=$term->term_id;
        }

    }
}
vc_map(array(
    "name" => 'CMS Menu Products',
    "base" => "cms_menu_products",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'wp_pizzeria'),
    "description" =>  '',
    "params" => array(
        //if(!empty($categories)){
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Product categories', 'wp_pizzeria' ),
                'param_name' => 'taxonomies',
                'value'=>$categories,
                'description' => esc_html__('Select product categories', 'wp_pizzeria' ),
            ),
        //}
        
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number products', 'wp_pizzeria' ),
            'param_name' => 'number_product',
            'description' => esc_html__('Number product show in a category', 'wp_pizzeria' ),
            'std'=>'4',
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'html_id',
            'value' => 'cms-menu-products',
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_menu_products",
            "heading" => esc_html__("Shortcode Template",'wp_pizzeria'),
            "admin_label" => true,
            "description" => esc_html__('Choose menu products layout', 'wp_pizzeria'),
            "group" => esc_html__("Template", 'wp_pizzeria'),
            'weight'=>1,
        )
    )
));

class WPBakeryShortCode_cms_menu_products extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('cms-menu-products');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>