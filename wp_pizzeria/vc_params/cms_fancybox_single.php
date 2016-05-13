<?php 
	vc_remove_param("cms_fancybox_single", "button_type");
	vc_remove_param("cms_fancybox_single", "image");
	vc_remove_param("cms_fancybox_single", "title_item");
	vc_remove_param("cms_fancybox_single", "description_item");
	vc_remove_param("cms_fancybox_single", "icon_type");
	vc_remove_param("cms_fancybox_single", "icon_fontawesome");
	vc_remove_param("cms_fancybox_single", "icon_openiconic");
	vc_remove_param("cms_fancybox_single", "icon_typicons");
	vc_remove_param("cms_fancybox_single", "icon_entypo");
	vc_remove_param("cms_fancybox_single", "icon_linecons");
	vc_remove_param("cms_fancybox_single", "icon_pixelicons");
	vc_remove_param("cms_fancybox_single", "icon_pe7stroke");
	vc_remove_param("cms_fancybox_single", "icon_rticon");
	vc_remove_param("cms_fancybox_single", "icon_glyphicons");
    vc_remove_param('cms_fancybox_single','cms_template');
    vc_add_param('cms_fancybox_single',array(
        "type" => "textfield",
        "heading" => esc_html__("Link",'wp_pizzeria'),
        "param_name" => "button_link",
        "value" => "#",
        "description" => "",
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param('cms_fancybox_single',array(
        "type" => "textfield",
        "heading" => esc_html__("Text",'wp_pizzeria'),
        "param_name" => "button_text",
        "value" => "",
        "description" => "",
        "group" => esc_html__("Buttons Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
    ));
	vc_add_param('cms_fancybox_single',array(
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
		'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
	));
	vc_add_param('cms_fancybox_single',array(
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
		'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
	));
	vc_add_param('cms_fancybox_single',array(
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
		'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
	));
	vc_add_param('cms_fancybox_single',array(
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
		'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
	));
    vc_add_param('cms_fancybox_single',array(
        'type' => 'colorpicker',
        'param_name' => 'btn_custom_color',
        'heading' => esc_html__( 'Select button color', 'wp_pizzeria' ),
        "dependency" => array(
            "element" => "btn_color",
            "value" => array(
                " button-custom"
            )
        ),
        'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
    ));
	vc_add_param('cms_fancybox_single',array(
		'type' => 'checkbox',
		'heading' => esc_html__( 'Button Heavy?', 'wp_pizzeria' ),
		'param_name' => 'button_heavy',
		'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
	));
    vc_add_param('cms_fancybox_single',array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Text uppercase', 'wp_pizzeria' ),
        'param_name' => 'button_uppercase',
        'group' => esc_html__('Buttons Settings', 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
    ));
	vc_add_param("cms_fancybox_single", array(
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
        ),
		'group' => esc_html__('General Settings', 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox_single", array(
        "type" => "textfield",
        "heading" => esc_html__("Timeout", 'wp_pizzeria'),
        "admin_label" => true,
        "param_name" => "timeout",
        "value" =>'200',
        'group' => esc_html__('General Settings', 'wp_pizzeria'),
    ));
    vc_add_param("cms_fancybox_single", array(
        "type" => "attach_image",
        "heading" => esc_html__("Image",'wp_pizzeria'),
        "param_name" => "item_image",
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single.php"
            )
        ),
        "group" => esc_html__("General Settings", 'wp_pizzeria'),
        "admin_label" => true,
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon type', 'wp_pizzeria' ),
        'param_name' => 'i_type',
        'value' => array(
            'SVG'=>'svg',
            'Fonts icon' => 'fonts_icon',
        ),
        'std'=>'svg',
        'description' => esc_html__( 'Select icon type', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single--layout1.php"
            )
        ),
    ));
    
    vc_add_param("cms_fancybox_single", array(
        'type' => 'textarea_raw_html',
        'heading' => esc_html__( 'Icon SVG', 'wp_pizzeria' ),
        'value' => base64_encode( '' ),
        'param_name' => 'svg_icon',
        'description' => esc_html__( 'Enter SVG icon.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "i_type",
            "value" => array(
                "svg"
            )
        )
    ));

    vc_add_param("cms_fancybox_single", array(
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
        'param_name' => 'icon_type',
        'description' => esc_html__( 'Select icon library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria'),
        "dependency" => array(
            "element" => "i_type",
            "value" => array(
                "fonts_icon"
            )
        )
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_fontawesome',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'fontawesome',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_openiconic',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'openiconic',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'openiconic',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_typicons',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'typicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'typicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_entypo',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'entypo',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'entypo',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_linecons',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'linecons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'linecons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pixelicons',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pixelicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'pixelicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_pe7stroke',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'pe7stroke',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'pe7stroke',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_rticon',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'rticon',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'rticon',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'iconpicker',
        'heading' => esc_html__( 'Icon', 'wp_pizzeria' ),
        'param_name' => 'icon_glyphicons',
        'value' => '',
        'settings' => array(
            'emptyIcon' => true, // default true, display an "EMPTY" icon?
            'type' => 'glyphicons',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'icon_type',
            'value' => 'glyphicons',
        ),
        'description' => esc_html__( 'Select icon from library.', 'wp_pizzeria' ),
        "group" => esc_html__("General Settings", 'wp_pizzeria')
    ));
    vc_add_param("cms_fancybox_single", array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Animation icon', 'wp_pizzeria' ),
        'param_name' => 'animation_icon',
        'group' => esc_html__('General Settings', 'wp_pizzeria'),
        'description' => esc_html__('Animation applies only to the icon section','wp_pizzeria'),
        "dependency" => array(
            "element" => "cms_template",
            "value" => array(
                "cms_fancybox_single--layout1.php"
            )
        ),
    ));
	$cms_template_attribute = array(
        'type' => 'cms_template_img',
        'param_name' => 'cms_template',
        "shortcode" => "cms_fancybox_single",
        "heading" => esc_html__("Shortcode Template",'wp_pizzeria'),
        "admin_label" => true,
        "description" => esc_html__('Choose fancy box layout', 'wp_pizzeria'),
        "group" => esc_html__("Template", 'wp_pizzeria'),
        'weight'=>1,
    );
    vc_add_param('cms_fancybox_single',$cms_template_attribute);
 ?>