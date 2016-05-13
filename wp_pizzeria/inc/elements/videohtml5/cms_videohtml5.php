<?php
vc_map(array(
    "name" => 'CMS Video Html5',
    "base" => "cms_videohtml5",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes',"wp_pizzeria"),
    "description" => '',
    "params" => array(
        
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Link video","wp_pizzeria"),
            "param_name" => "video_link",
            "value" => "",
            "group" =>esc_html__( "Video","wp_pizzeria"),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Style","wp_pizzeria"),
            "param_name" => "video_style",
            "value" => array(
                esc_html__('Default','wp_pizzeria')=>"default",
                esc_html__('Custom','wp_pizzeria')=>"custom",
            ),
            "std"=>'default',
            "group" =>esc_html__( "Video","wp_pizzeria")
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Video height","wp_pizzeria"),
            "param_name" => "video_height",
            "value" => "",
            "group" =>esc_html__( "Video","wp_pizzeria"),
            'dependency' => array(
                "element"=>"video_style",
                "value"=>'custom',
            ),
        ),
        
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__( "Video poster","wp_pizzeria"),
            "param_name" => "poster",
            "value" => "",
            "group" =>esc_html__( "Image","wp_pizzeria"),
            'dependency' => array(
                "element"=>"video_style",
                "value"=>'custom',
            ),
        ),
        array(
            "type" => "checkbox",
            "class" => "",
            "heading" => esc_html__( "Enable Overlay","wp_pizzeria"),
            "param_name" => "overlay",
            "value" =>array(esc_html__( "Enable","wp_pizzeria")=>'enable'),
            "group" =>esc_html__( "Video","wp_pizzeria"),
            'dependency' => array(
                "element"=>"video_style",
                "value"=>'custom',
            ),
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__( "Overlay background image","wp_pizzeria"),
            "param_name" => "overlay_image",
            "value" => "",
            "group" =>esc_html__( "Overlay","wp_pizzeria"),
            'dependency' => array(
                "element"=>"overlay",
                "not_empty"=>true
            ),
        ),  
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Overlay background opacity","wp_pizzeria"),
            "param_name" => "overlay_opacity",
            "value" => "0.5",
            "std"=>'0.5',
            "group" =>esc_html__( "Overlay","wp_pizzeria"),
            'dependency' => array(
                "element"=>"overlay",
                "not_empty"=>true
            ),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_html__( "Overlay background color","wp_pizzeria"),
            "param_name" => "overlay_color",
            "value" => "",
            "group" =>esc_html__( "Overlay","wp_pizzeria"),
            'dependency' => array(
                "element"=>"overlay",
                "not_empty"=>true
            ),
        ),      
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", "wp_pizzeria" ),
            "param_name" => "el_class",
            "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "wp_pizzeria" ),
            "group" => esc_html__("Video","wp_pizzeria")
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'html_id',
            'value' => 'cms-video',
        ),
    )
));

class WPBakeryShortCode_cms_videohtml5 extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        wp_enqueue_script('player_api',get_template_directory_uri().'/assets/js/player_api.js',array('jquery'),'1.0.0',true);
       
        $html_id = cmsHtmlID('cms-video');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>