<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */
    vc_remove_param("vc_row", "parallax");
    vc_remove_param("vc_row", "parallax_image");
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__('Row Color', 'wp_pizzeria'),
        "param_name" => "row_color_text",
        "description" => esc_html__("Color text of row", 'wp_pizzeria'),
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Background Style", 'wp_pizzeria'),
        'param_name' => 'bg_style',
        'value' => array(
            'Default' => '',
            'Image / Parallax' => 'img_parallax',
            'Image / Fixed' => 'img_fixed',
            'Background Effect' => 'bg-effect-lg'
        ),
        'group' => 'Design Options',
        'description' => esc_html__("Select the kind of background would you like to set for this row.", 'wp_pizzeria')
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Parallax Speed", 'wp_pizzeria'),
        'param_name' => 'bd_p_speed',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "bg_style",
            "value" => array(
                "img_parallax"
            )
        ),
        'description' => esc_html__("Set speed moving for parallax default 0.1 .", 'wp_pizzeria')
    ));
    
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Overlay Color", 'wp_pizzeria'),
        'param_name' => 'overlay_row',
        'value' => array(
            'No' => '',
            'Yes' => 'yes'
        ),
        'group' => 'Design Options'
    ));
    vc_add_param("vc_row", array(
        "type" => "colorpicker",
        "class" => "",
        "heading" => esc_html__('Color', 'wp_pizzeria'),
        "param_name" => "overlay_color",
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "yes"
            )
        ),
        "description" => ''
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Opacity", 'wp_pizzeria'),
        'param_name' => 'overlay_opacity',
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "overlay_row",
            "value" => array(
                "yes"
            )
        ),
        'description' => esc_html__("Set opacity overlay color - ex: 0.6 .", 'wp_pizzeria')
    ));
    vc_add_param("vc_row", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
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
        )
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
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
        )
    ));
    vc_add_param("vc_row", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout",
        "value" =>'200',
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout",
        "value" =>'200',
    ));
    vc_add_param("vc_row", array(
        "type" => "checkbox",
        "heading" => esc_html__("Add left icon", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "left_icon",
    ));
    vc_add_param("vc_row", array(
        "type" => "checkbox",
        "heading" => esc_html__("Add right icon", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "right_icon",
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "checkbox",
        "heading" => esc_html__("Add left icon", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "left_icon",
    ));
    vc_add_param("vc_row_inner", array(
        "type" => "checkbox",
        "heading" => esc_html__("Add right icon", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "right_icon",
    ));
    vc_add_param('vc_row', array(
        'type' => 'attach_image',
        'heading' => esc_html__("Select Image", 'wp_pizzeria'),
        'param_name' => 'left_icon_image',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Width", 'wp_pizzeria'),
        'param_name' => 'left_icon_width',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Height", 'wp_pizzeria'),
        'param_name' => 'left_icon_height',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'attach_image',
        'heading' => esc_html__("Select Image", 'wp_pizzeria'),
        'param_name' => 'right_icon_image',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Width", 'wp_pizzeria'),
        'param_name' => 'right_icon_width',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'textfield',
        'heading' => esc_html__("Height", 'wp_pizzeria'),
        'param_name' => 'right_icon_height',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Position", 'wp_pizzeria'),
        'param_name' => 'left_position',
        'value' => array(
            'Left top' => 'top',
            'Left bottom' => 'bottom',
            'Left middle' => 'middle',
        ),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
    ));
    vc_add_param('vc_row', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Position", 'wp_pizzeria'),
        'param_name' => 'right_position',
        'value' => array(
            'Right top' => 'top',
            'Right bottom' => 'bottom',
            'Right middle' => 'middle',
        ),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
    ));

    vc_add_param('vc_row_inner', array(
        'type' => 'attach_image',
        'heading' => esc_html__("Select Image", 'wp_pizzeria'),
        'param_name' => 'left_icon_image',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'textfield',
        'heading' => esc_html__("Width", 'wp_pizzeria'),
        'param_name' => 'left_icon_width',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'textfield',
        'heading' => esc_html__("Height", 'wp_pizzeria'),
        'param_name' => 'left_icon_height',
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'attach_image',
        'heading' => esc_html__("Select Image", 'wp_pizzeria'),
        'param_name' => 'right_icon_image',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'textfield',
        'heading' => esc_html__("Width", 'wp_pizzeria'),
        'param_name' => 'right_icon_width',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'textfield',
        'heading' => esc_html__("Height", 'wp_pizzeria'),
        'param_name' => 'right_icon_height',
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Position", 'wp_pizzeria'),
        'param_name' => 'left_position',
        'value' => array(
            'Left top' => 'top',
            'Left bottom' => 'bottom',
            'Left middle' => 'middle',
        ),
        'dependency' => array(
            "element"=>"left_icon",
            "not_empty"=>true
        ),
        'group' => esc_html__("Left icon", 'wp_pizzeria'),
    ));
    vc_add_param('vc_row_inner', array(
        'type' => 'dropdown',
        'heading' => esc_html__("Position", 'wp_pizzeria'),
        'param_name' => 'right_position',
        'value' => array(
            'Right top' => 'top',
            'Right bottom' => 'bottom',
            'Right middle' => 'middle',
        ),
        'dependency' => array(
            "element"=>"right_icon",
            "not_empty"=>true
        ),
        'group' => esc_html__("Right icon", 'wp_pizzeria'),
    ));