<?php 
	vc_remove_param("vc_btn", "shape");
	vc_remove_param("vc_btn", "i_align");
	vc_remove_param("vc_btn", "i_type");
	vc_remove_param("vc_btn", "i_icon_fontawesome");
	vc_remove_param("vc_btn", "i_icon_openiconic");
	vc_remove_param("vc_btn", "i_icon_typicons");
	vc_remove_param("vc_btn", "i_icon_entypo");
	vc_remove_param("vc_btn", "i_icon_linecons");
	vc_remove_param("vc_btn", "i_icon_pixelicons");
	vc_remove_param("vc_btn", "button_block");
	vc_add_param('vc_btn',array(
		'type' => 'dropdown',
		'param_name' => 'style',
		'value' => array(
			esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
			esc_html__( 'Void', 'wp_pizzeria' ) => ' button-void',
			esc_html__( 'Void alt ', 'wp_pizzeria' ) => ' button-void-alt',
			esc_html__( 'Clean', 'wp_pizzeria' ) => ' button-clean ',
		),
		'heading' => esc_html__( 'Style', 'wp_pizzeria' ),
		'description' => '',
		'std'=>' ',
	));
	vc_add_param('vc_btn',array(
		'type' => 'dropdown',
		'param_name' => 'size',
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
	));
	vc_add_param('vc_btn',array(
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
	));
	vc_add_param('vc_btn',array(
		'type' => 'dropdown',
		'param_name' => 'color',
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
	));
	vc_add_param('vc_btn',array(
		'type' => 'colorpicker',
		'param_name' => 'btn_custom_color',
		'heading' => esc_html__( 'Select button color', 'wp_pizzeria' ),
		"dependency" => array(
            "element" => "color",
            "value" => array(
                " button-custom"
            )
        ),
	));
	vc_add_param('vc_btn',array(
		'type' => 'checkbox',
		'heading' => esc_html__( 'Button Heavy?', 'wp_pizzeria' ),
		'param_name' => 'button_heavy',
	));
	vc_add_param('vc_btn',array(
		'type' => 'checkbox',
		'heading' => esc_html__( 'Text uppercase', 'wp_pizzeria' ),
		'param_name' => 'button_uppercase',
	));
 ?>