<?php 
    vc_remove_param('cms_carousel','cms_template');
    vc_add_param("cms_carousel", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Carousel item animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation",
        "value" => array(
            "None" => "",
            "Bounce" => "bounce",
            "Flash" => "flash",
            "Pulse" => "pulse",
            "Rubber Band" => "rubberBand",
            "Shake" => "shake",
            "Swing" => "swing",
            "Tada" => "tada",
            "Wobble" => "wobble",
            "Bounce In" => "bounceIn",
            "Bounce In Down" => "bounceInDown",
            "Bounce In Left" => "bounceInLeft",
            "Bounce In Right" => "bounceInRight",
            "Bounce In Up" => "bounceInUp",
            "Bounce Out" => "bounceOut",
            "Bounce Out Down" => "bounceOutDown",
            "Bounce Out Left" => "bounceOutLeft",
            "Bounce Out Right" => "bounceOutRight",
            "Bounce Out Up" => "bounceOutUp",
            "Fade In" => "fadeIn",
            "Fade In Down" => "fadeInDown",
            "Fade In Down Big" => "fadeInDownBig",
            "Fade In Left" => "fadeInLeft",
            "Fade In Left Big" => "fadeInLeftBig",
            "Fade In Right" => "fadeInRight",
            "Fade In Right Big" => "fadeInRightBig",
            "Fade In Up" => "fadeInUp",
            "Fade In Up Big" => "fadeInUpBig",
            "Fade Out" => "fadeOut",
            "Fade Out Down" => "fadeOutDown",
            "Fade ut Down Big" => "fadeOutDownBig",
            "Fade Out Left" => "fadeOutLeft",
            "Fade Out Left Big" => "fadeOutLeftBig",
            "Fade Out Right" => "fadeOutRight",
            "Fade Out Right Big" => "fadeOutRightBig",
            "Fade Out Up" => "fadeOutUp",
            "Fade Out Up Big" => "fadeOutUpBig",
            "Flip In X" => "flipInX",
            "Flip In Y" => "flipInY",
            "Flip Out X" => "flipOutX",
            "Flip Out Y" => "flipOutY",
            "Light Speed In" => "lightSpeedIn",
            "Light Speed Out" => "lightSpeedOut",
            "Rotate In" => "rotateIn",
            "Rotate In Down Left" => "rotateInDownLeft",
            "Rotate In Down Right" => "rotateInDownRight",
            "Rotate In Up Left" => "rotateInUpLeft",
            "Rotate In Up Right" => "rotateInUpRight",
            "Rotate Out" => "rotateOut",
            "Rotate Out Down Left" => "rotateOutDownLeft",
            "Rotate Out Down Right" => "rotateOutDownRight",
            "Rotate Out Up Left" => "rotateOutUpLeft",
            "Rotate Out Up Right" => "rotateOutUpRight",
            "Slide In Down" => "slideInDown",
            "Slide In Left" => "slideInLeft",
            "Slide In Right" => "slideInRight",
            "Slide Out Left" => "slideOutLeft",
            "Slide Out Right" => "slideOutRight",
            "Slide Out Up" => "slideOutUp",
            "Slide In Up" => "slideInUp",
            "Slide Out Down" => "slideOutDown",
            "Roll In" => "rollIn",
            "Roll Out" => "rollOut",
            "Zoom In" => "zoomIn",
            "Zoom In Down" => "zoomInDown",
            "Zoom In Left" => "zoomInLeft",
            "Zoom In Right" => "zoomInRight",
            "Zoom In Up" => "zoomInUp",
            "Zoom Out" => "zoomOut",
            "Zoom Out Down" => "zoomOutDown",
            "Zoom Out Left" => "zoomOutLeft",
            "Zoom Out Right" => "zoomOutRight",
            "Zoom Out Up" => "zoomOutUp",
        ),
        "group" => esc_html__("Carousel Settings", 'wp_pizzeria'),

    ));
    vc_add_param("cms_carousel", array(
        "type" => "textfield",
        "class" => "",
        "heading" => esc_html__("Time out", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout",
        "value" => "200",
        "group" => esc_html__("Carousel Settings", 'wp_pizzeria'),
        "description" => esc_html__('Time delay between items', 'wp_pizzeria'),
    ));
    
/*== Button Settings ==*/
    vc_add_param('cms_carousel',array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "button_link",
        "value" => "#",
        "description" => "",
        "group" => esc_html__("Button Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        "type" => "textfield",
        "heading" => esc_html__("Text",'wp_pizzeria'),
        "param_name" => "button_text",
        "value" => "",
        "description" => "",
        "group" => esc_html__("Button Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'dropdown',
        'param_name' => 'btn_style',
        'value' => array(
            esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
            esc_html__( 'Void', 'wp_pizzeria' ) => ' button-void',
            esc_html__( 'Void alt ', 'wp_pizzeria' ) => ' button-void-alt',
            esc_html__( 'Clean', 'wp_pizzeria' ) => ' button-clean ',
        ),
        'heading' => esc_html__( 'Style', 'wp_pizzeria' ),
        'description' => '',
        'std'=>' ',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'dropdown',
        'param_name' => 'btn_size',
        'value' => array(
            esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
            esc_html__( 'Big', 'wp_pizzeria' ) => ' button-big',
            esc_html__( 'Long', 'wp_pizzeria' ) => ' button-long',
            esc_html__( 'Low', 'wp_pizzeria' ) => ' button-low',
            esc_html__( 'Small', 'wp_pizzeria' ) => ' button-small',
        ),
        'heading' => esc_html__( 'Size', 'wp_pizzeria' ),
        'description' => esc_html__( 'Select button display size.', 'wp_pizzeria' ),
        'std'=>' ',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'dropdown',
        'param_name' => 'button_text_size',
        'value' => array(
            esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
            esc_html__( 'Big', 'wp_pizzeria' ) => ' button-text-big',
            esc_html__( 'Small', 'wp_pizzeria' ) => ' button-text-small',
        ),
        'heading' => esc_html__( 'Button Text Size', 'wp_pizzeria' ),
        'description' => esc_html__( 'Select button text display size.', 'wp_pizzeria' ),
        'std'=>' ',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'dropdown',
        'param_name' => 'btn_color',
        'value' => array(
            esc_html__( 'Default', 'wp_pizzeria' ) => ' ',
            esc_html__( 'Primary color', 'wp_pizzeria' ) => ' button-primary-color',
            esc_html__( 'Yellow', 'wp_pizzeria' ) => ' button-yellow',
            esc_html__( 'Red', 'wp_pizzeria' ) => ' button-red',
            esc_html__( 'Custom', 'wp_pizzeria' ) => ' button-custom',
        ),
        'heading' => esc_html__( 'Color', 'wp_pizzeria' ),
        'description' => esc_html__( 'Select button color.', 'wp_pizzeria' ),
        'std'=>' ',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'colorpicker',
        'param_name' => 'btn_custom_color',
        'heading' => esc_html__( 'Select button color', 'wp_pizzeria' ),
        "dependency" => array(
            "element" => "btn_color",
            "value" => array(
                " button-custom"
            )
        ),
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Button Heavy?', 'wp_pizzeria' ),
        'param_name' => 'button_heavy',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Add icon?', 'wp_pizzeria' ),
        'param_name' => 'add_icon',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Text uppercase', 'wp_pizzeria' ),
        'param_name' => 'button_uppercase',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param("cms_carousel", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Button Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "Button_animation",
        "value" => array(
            "None" => "",
            "Bounce" => "bounce",
            "Flash" => "flash",
            "Pulse" => "pulse",
            "Rubber Band" => "rubberBand",
            "Shake" => "shake",
            "Swing" => "swing",
            "Tada" => "tada",
            "Wobble" => "wobble",
            "Bounce In" => "bounceIn",
            "Bounce In Down" => "bounceInDown",
            "Bounce In Left" => "bounceInLeft",
            "Bounce In Right" => "bounceInRight",
            "Bounce In Up" => "bounceInUp",
            "Bounce Out" => "bounceOut",
            "Bounce Out Down" => "bounceOutDown",
            "Bounce Out Left" => "bounceOutLeft",
            "Bounce Out Right" => "bounceOutRight",
            "Bounce Out Up" => "bounceOutUp",
            "Fade In" => "fadeIn",
            "Fade In Down" => "fadeInDown",
            "Fade In Down Big" => "fadeInDownBig",
            "Fade In Left" => "fadeInLeft",
            "Fade In Left Big" => "fadeInLeftBig",
            "Fade In Right" => "fadeInRight",
            "Fade In Right Big" => "fadeInRightBig",
            "Fade In Up" => "fadeInUp",
            "Fade In Up Big" => "fadeInUpBig",
            "Fade Out" => "fadeOut",
            "Fade Out Down" => "fadeOutDown",
            "Fade ut Down Big" => "fadeOutDownBig",
            "Fade Out Left" => "fadeOutLeft",
            "Fade Out Left Big" => "fadeOutLeftBig",
            "Fade Out Right" => "fadeOutRight",
            "Fade Out Right Big" => "fadeOutRightBig",
            "Fade Out Up" => "fadeOutUp",
            "Fade Out Up Big" => "fadeOutUpBig",
            "Flip In X" => "flipInX",
            "Flip In Y" => "flipInY",
            "Flip Out X" => "flipOutX",
            "Flip Out Y" => "flipOutY",
            "Light Speed In" => "lightSpeedIn",
            "Light Speed Out" => "lightSpeedOut",
            "Rotate In" => "rotateIn",
            "Rotate In Down Left" => "rotateInDownLeft",
            "Rotate In Down Right" => "rotateInDownRight",
            "Rotate In Up Left" => "rotateInUpLeft",
            "Rotate In Up Right" => "rotateInUpRight",
            "Rotate Out" => "rotateOut",
            "Rotate Out Down Left" => "rotateOutDownLeft",
            "Rotate Out Down Right" => "rotateOutDownRight",
            "Rotate Out Up Left" => "rotateOutUpLeft",
            "Rotate Out Up Right" => "rotateOutUpRight",
            "Slide In Down" => "slideInDown",
            "Slide In Left" => "slideInLeft",
            "Slide In Right" => "slideInRight",
            "Slide Out Left" => "slideOutLeft",
            "Slide Out Right" => "slideOutRight",
            "Slide Out Up" => "slideOutUp",
            "Slide In Up" => "slideInUp",
            "Slide Out Down" => "slideOutDown",
            "Roll In" => "rollIn",
            "Roll Out" => "rollOut",
            "Zoom In" => "zoomIn",
            "Zoom In Down" => "zoomInDown",
            "Zoom In Left" => "zoomInLeft",
            "Zoom In Right" => "zoomInRight",
            "Zoom In Up" => "zoomInUp",
            "Zoom Out" => "zoomOut",
            "Zoom Out Down" => "zoomOutDown",
            "Zoom Out Left" => "zoomOutLeft",
            "Zoom Out Right" => "zoomOutRight",
            "Zoom Out Up" => "zoomOutUp",
        ),
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param("cms_carousel", array(
        "type" => "textfield",
        "heading" => esc_html__("Button Animation Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "button_timeout",
        "value" =>'200',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
    vc_add_param('cms_carousel',array(
        'type' => 'dropdown',
        'param_name' => 'btn_align',
        'value' => array(
            esc_html__( 'Center', 'wp_pizzeria' ) => ' text-center',
            esc_html__( 'Left', 'wp_pizzeria' ) => ' text-left',
            esc_html__( 'Right ', 'wp_pizzeria' ) => ' text-right',
        ),
        'heading' => esc_html__( 'Button align', 'wp_pizzeria' ),
        'description' => '',
        'std'=>' text-center',
        'group' => esc_html__('Button Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_carousel.php",
                "cms_carousel--layout2.php",
            )
        ),
    ));
	$cms_template_attribute = array(
        'type' => 'cms_template_img',
        'param_name' => 'cms_template',
        "shortcode" => "cms_carousel",
        "heading" => esc_html__("Shortcode Template",'wp_pizzeria'),
        "admin_label" => true,
        "description" => esc_html__('Choose fancy box layout', 'wp_pizzeria'),
        "group" => esc_html__("Template", 'wp_pizzeria'),
        'weight'=>1,
    );
    vc_add_param('cms_carousel',$cms_template_attribute); 
 ?>