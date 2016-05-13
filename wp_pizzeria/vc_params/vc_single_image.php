<?php 
	vc_add_param('vc_single_image',array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'On click action', 'wp_pizzeria' ),
		'param_name' => 'onclick',
		'value' => array(
			esc_html__( 'None', 'wp_pizzeria' ) => '',
			esc_html__( 'Link to large image', 'wp_pizzeria' ) => 'img_link_large',
			esc_html__( 'Open prettyPhoto', 'wp_pizzeria' ) => 'link_image',
			esc_html__( 'Open Light box', 'wp_pizzeria' ) => 'light_box',
			esc_html__( 'Open custom link', 'wp_pizzeria' ) => 'custom_link',
			esc_html__( 'Zoom', 'wp_pizzeria' ) => 'zoom',
		),
		'description' => esc_html__( 'Select action for click action.', 'wp_pizzeria' ),
		'std' => ''
	));
 ?>