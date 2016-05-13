<?php 
	
    vc_remove_param("cms_fancybox", "title");
    vc_remove_param("cms_fancybox", "description");
    vc_remove_param("cms_fancybox", "button_type");
    vc_remove_param("cms_fancybox", "button_text");
    vc_remove_param("cms_fancybox", "icon1");
    vc_remove_param("cms_fancybox", "icon2");
    vc_remove_param("cms_fancybox", "icon3");
    vc_remove_param("cms_fancybox", "icon4");
    vc_remove_param("cms_fancybox", "icon5");
    vc_remove_param("cms_fancybox", "icon6");
    vc_remove_param("cms_fancybox", "image1");
    vc_remove_param("cms_fancybox", "image2");
    vc_remove_param("cms_fancybox", "image3");
    vc_remove_param("cms_fancybox", "image4");
    vc_remove_param("cms_fancybox", "image5");
    vc_remove_param("cms_fancybox", "image6");
    vc_remove_param("cms_fancybox", "title1");
    vc_remove_param("cms_fancybox", "title2");
    vc_remove_param("cms_fancybox", "title3");
    vc_remove_param("cms_fancybox", "title4");
    vc_remove_param("cms_fancybox", "title5");
    vc_remove_param("cms_fancybox", "title6");
    vc_remove_param("cms_fancybox", "description1");
    vc_remove_param("cms_fancybox", "description2");
    vc_remove_param("cms_fancybox", "description3");
    vc_remove_param("cms_fancybox", "description4");
    vc_remove_param("cms_fancybox", "description5");
    vc_remove_param("cms_fancybox", "description6");
    vc_remove_param("cms_fancybox", "button_link1");
    vc_remove_param("cms_fancybox", "button_link2");
    vc_remove_param("cms_fancybox", "button_link3");
    vc_remove_param("cms_fancybox", "button_link4");
    vc_remove_param("cms_fancybox", "button_link5");
    vc_remove_param("cms_fancybox", "button_link6");
    vc_remove_param("cms_fancybox", "heading_1");
    vc_remove_param("cms_fancybox", "heading_2");
    vc_remove_param("cms_fancybox", "heading_3");
    vc_remove_param("cms_fancybox", "heading_4");
    vc_remove_param("cms_fancybox", "heading_5");
	vc_remove_param("cms_fancybox", "heading_6");
    vc_add_param("cms_fancybox",array(
        "type" => "dropdown",
        "heading" => esc_html__("Select Number Cols",'wp_pizzeria'),
        "param_name" => "cms_cols",
        "value" => array(
            "1 Column",
            "2 Columns",
            "3 Columns",
            "4 Columns",
            "5 Columns",
            "6 Columns",
        ),
        "group" => esc_html__("General Settings", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox",array(
        'type' => 'hidden',
        'param_name' => 'html_id',
        'value' => 'cms-fancy-box',
    ));

    /* Fancybox item 1 */
	vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_1",
        "std"=>"",
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_1",
        "std"=>"",
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_1",
        "std"=>"",
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_1",
        "std"=>"",
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
            esc_html__( 'Glyphicons', 'wp_pizzeria' ) => 'glyphicons',
        ),
        'param_name' => 'icon_type_1',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pixelicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'rticon',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_1',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'glyphicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_1',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 1", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_1",
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
        'group' => esc_html__('Item 1', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_1",
        "value" =>'200',
        'group' => esc_html__('Item 1', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "1 Column",
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));

    /* Fancybox item 2 */
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_2",
        "std"=>"",
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_2",
        "std"=>"",
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_2",
        "std"=>"",
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_2",
        "std"=>"",
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
        ),
        'param_name' => 'icon_type_2',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pixelicons',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'rticon',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_2',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'glyphicons',
            'iconsPerPage' => 200, // default 200, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_2',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 2", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_2",
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
        'group' => esc_html__('Item 2', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "2 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_2",
        "value" =>'200',
        'group' => esc_html__('Item 2', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "2 Columns",
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));

    /* Fancybox item 3 */
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_3",
        "std"=>"",
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_3",
        "std"=>"",
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_3",
        "std"=>"",
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_3",
        "std"=>"",
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
        ),
        'param_name' => 'icon_type_3',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pixelicons',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'rticon',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_3',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'glyphicons',
            'iconsPerPage' => 200, // default 300, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type_3',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 3", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_3",
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
        'group' => esc_html__('Item 3', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_3",
        "value" =>'200',
        'group' => esc_html__('Item 3', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "3 Columns",
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));

    /* Fancybox item 4 */
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_4",
        "std"=>"",
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_4",
        "std"=>"",
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_4",
        "std"=>"",
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_4",
        "std"=>"",
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
        ),
        'param_name' => 'icon_type_4',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'fontawesome',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'openiconic',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'typicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'entypo',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'linecons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pixelicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'rticon',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_4',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'glyphicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_4',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 4", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_4",
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
        'group' => esc_html__('Item 4', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_4",
        "value" =>'200',
        'group' => esc_html__('Item 4', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "4 Columns",
                "5 Columns",
                "6 Columns",
            )
        )
    ));

    /* Fancybox item 5 */
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_5",
        "std"=>"",
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_5",
        "std"=>"",
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_5",
        "std"=>"",
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_5",
        "std"=>"",
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "5 Columns",
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
        ),
        'param_name' => 'icon_type_5',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'fontawesome',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'openiconic',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'typicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'entypo',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'linecons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pixelicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'rticon',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_5',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'glyphicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_5',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 5", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_5",
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
        'group' => esc_html__('Item 5', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_5",
        "value" =>'200',
        'group' => esc_html__('Item 5', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "5 Columns",
                "6 Columns",
            )
        )
    ));
    /* Fancybox item 6 */
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item title",'wp_pizzeria'),
        "param_name" => "title_6",
        "std"=>"",
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Item sub title",'wp_pizzeria'),
        "param_name" => "sub_title_6",
        "std"=>"",
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textarea",
        "heading" => esc_html__("Description",'wp_pizzeria'),
        "param_name" => "desc_6",
        "std"=>"",
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox",array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "link_6",
        "std"=>"",
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
        'dependency' => array(
            "element"=>"cms_cols",
            "value"=>array(
                "6 Columns",
            )
        ),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon library', 'wp_pizzeria' ),
        'value' => array(
            esc_html__( 'Font Awesome', 'wp_pizzeria' ) => 'fontawesome',
            esc_html__( 'Open Iconic', 'wp_pizzeria' ) => 'openiconic',
            esc_html__( 'Typicons', 'wp_pizzeria' ) => 'typicons',
            esc_html__( 'Entypo', 'wp_pizzeria' ) => 'entypo',
            esc_html__( 'Linecons', 'wp_pizzeria' ) => 'linecons',
            esc_html__( 'Pixel', 'wp_pizzeria' ) => 'pixelicons',
            esc_html__( 'P7 Stroke', 'wp_pizzeria' ) => 'pe7stroke',
            esc_html__( 'RT Icon', 'wp_pizzeria' ) => 'rticon',
        ),
        'param_name' => 'icon_type_6',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'fontawesome',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'openiconic',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'typicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'entypo',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'linecons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pixelicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'rticon',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons_6',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, 
            'type' => 'glyphicons',
            'iconsPerPage' => 200, 
        ),
        'dependency' => array(
            'element' => 'icon_type_6',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("Item 6", 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Animation", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "animation_6",
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
        'group' => esc_html__('Item 6', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "6 Columns",
            )
        )
    ));
    vc_add_param("cms_fancybox", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout_6",
        "value" =>'200',
        'group' => esc_html__('Item 6', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_cols",
            "value" => array(
                "6 Columns",
            )
        )
    ));
	$cms_template_attribute = array(
        'type' => 'cms_template_img',
        'param_name' => 'cms_template',
        "shortcode" => "cms_fancybox",
        "heading" => esc_html__("Shortcode Template",'wp_pizzeria'),
        "admin_label" => true,
        "description" => esc_html__('Choose fancy box layout', 'wp_pizzeria'),
        "group" => esc_html__("Template", 'wp_pizzeria'),
        'weight'=>1,
    );
    vc_add_param('cms_fancybox',$cms_template_attribute);
 ?>