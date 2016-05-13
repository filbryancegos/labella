<?php
vc_map(array(
    "name" => 'CMS Slider Carousel',
    "base" => "cms_slider_carousel",
    "icon" => "cs_icon_for_vc",
    "category" =>  esc_html__('CmsSuperheroes Shortcodes', 'wp_pizzeria'),
    "description" =>  '',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" =>  esc_html__("Select Number Slides",'wp_pizzeria'),
            "param_name" => "cms_slides",
            "value" => array(
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
            )
        ),
        array(
            'type' => 'checkbox',
            'heading' =>  esc_html__( 'Show nav', 'wp_pizzeria' ),
            'param_name' => 'nav',
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_slider_carousel.php",
                )
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' =>  esc_html__( 'Show Dots', 'wp_pizzeria' ),
            'param_name' => 'dots',
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_slider_carousel.php",
                )
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' =>  esc_html__( 'Auto Play', 'wp_pizzeria' ),
            'param_name' => 'autoplay',
        ),
        array(
            'type' => 'textfield',
            'heading' =>  esc_html__( 'Thumb width', 'wp_pizzeria' ),
            'param_name' => 'item_width',
            "description" =>esc_html__("Width Of thumbnail image",'wp_pizzeria'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_slider_carousel--layout1.php",
                )
            ),
            'value'=>218,
            'std'=>218
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Currency",'wp_pizzeria'),
            "param_name" => "currency",
            "value" => "$",
            "description" =>esc_html__("Currency  Of Price",'wp_pizzeria'),
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Extra Class",'wp_pizzeria'),
            "param_name" => "class",
            "value" => "",
            "description" => "",
        ),
        /* Start Slide 1 */
        array(
            "type" => "attach_image",
            "heading" =>  esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                )
            ),
            "group" =>  esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "std" => "#",
            "description" =>esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text1",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "1",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 1", 'wp_pizzeria')
        ),
        /* End Slide 1 */

        /* Start Slide 2 */
        array(
            "type" => "attach_image",
            "heading" =>esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                )
            ),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "std" => "#",
            "description" =>esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text2",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "2",
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 2", 'wp_pizzeria')
        ),
        /* End Slide 2 */

        /* Start Slide 3 */
        array(
            "type" => "attach_image",
            "heading" =>esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                )
            ),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "std" => "#",
            "description" =>esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text3",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "3",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>esc_html__("Slide 3", 'wp_pizzeria')
        ),
        /* End Slide 3 */

        /* Start Slide 4 */
        array(
            "type" => "attach_image",
            "heading" =>esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                )
            ),
            "group" =>esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "std" => "#",
            "description" =>  esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 4", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text4",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "4",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 4", 'wp_pizzeria')
        ),
        /* End Slide 4 */

        /* Start Slide 5 */
        array(
            "type" => "attach_image",
            "heading" =>  esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                )
            ),
            "group" =>  esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "std" => "#",
            "description" =>  esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 5", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text5",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    "5",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 5", 'wp_pizzeria')
        ),
        /* End Slide 5 */

        /* Start Slide 6 */
        array(
            "type" => "attach_image",
            "heading" =>  esc_html__("Image",'wp_pizzeria'),
            "param_name" => "image6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                )
            ),
            "group" =>  esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Title ",'wp_pizzeria'),
            "param_name" => "title6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Sub Title ",'wp_pizzeria'),
            "param_name" => "subtitle6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Sub Title Of Slide",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textarea",
            "heading" =>esc_html__("Description",'wp_pizzeria'),
            "param_name" => "desc6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "value" => "",
            "description" =>esc_html__("Description Of Slide",'wp_pizzeria'),
            "group" =>esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>esc_html__("Price",'wp_pizzeria'),
            "param_name" => "price6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "value" => "",
            "description" =>"",
            "group" =>esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Link",'wp_pizzeria'),
            "param_name" => "link6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "std" => "#",
            "description" =>  esc_html__("Link Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 6", 'wp_pizzeria')
        ),
        array(
            "type" => "textfield",
            "heading" =>  esc_html__("Button Text",'wp_pizzeria'),
            "param_name" => "text6",
            'dependency' => array(
                "element"=>"cms_slides",
                "value"=>array(
                    "6",
                    )
                ),
            "value" => "",
            "description" =>  esc_html__("Text Of Button",'wp_pizzeria'),
            "group" =>  esc_html__("Slide 6", 'wp_pizzeria')
        ),
        /* End Slide6 */
        
        /* Button Setting */
        array(
            'type' => 'dropdown',
            'param_name' => 'style',
            'value' => array(
                 esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
                 esc_html__( 'Void', 'wp_pizzeria' ) => ' button-void',
                 esc_html__( 'Void alt ', 'wp_pizzeria' ) => ' button-void-alt',
                 esc_html__( 'Clean', 'wp_pizzeria' ) => ' button-clean ',
            ),
            'heading' =>  esc_html__( 'Style', 'wp_pizzeria' ),
            'description' =>  esc_html__( 'Select tabs display style.', 'wp_pizzeria' ),
            'std'=>' ',
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'size',
            'value' => array(
                 esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
                 esc_html__( 'Big', 'wp_pizzeria' ) => ' button-big',
                 esc_html__( 'Long', 'wp_pizzeria' ) => ' button-long',
                 esc_html__( 'Low', 'wp_pizzeria' ) => ' button-low',
                 esc_html__( 'Small', 'wp_pizzeria' ) => ' button-small',
            ),
            'heading' =>  esc_html__( 'Size', 'wp_pizzeria' ),
            'description' =>  esc_html__( 'Select button display size.', 'wp_pizzeria' ),
            'std'=>' ',
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'button_text_size',
            'value' => array(
                 esc_html__( 'Normal', 'wp_pizzeria' ) => ' ',
                 esc_html__( 'Big', 'wp_pizzeria' ) => ' button-text-big',
                 esc_html__( 'Small', 'wp_pizzeria' ) => ' button-text-small',
            ),
            'heading' =>  esc_html__( 'Button Text Size', 'wp_pizzeria' ),
            'description' =>  esc_html__( 'Select button text display size.', 'wp_pizzeria' ),
            'std'=>' ',
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'color',
            'value' => array(
                 esc_html__( 'Primary color', 'wp_pizzeria' ) => ' button-primary-color',
                 esc_html__( 'Yellow', 'wp_pizzeria' ) => ' button-yellow',
                 esc_html__( 'Red', 'wp_pizzeria' ) => ' button-red',
                 esc_html__( 'Custom', 'wp_pizzeria' ) => ' button-custom',
            ),
            'heading' =>  esc_html__( 'Color', 'wp_pizzeria' ),
            'description' =>  esc_html__( 'Select button color.', 'wp_pizzeria' ),
            'std'=>' button-primary-color',
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'colorpicker',
            'param_name' => 'btn_custom_color',
            'heading' => esc_html__( 'Select button color', 'wp_pizzeria' ),
            "dependency" => array(
                "element" => "color",
                "value" => array(
                    " button-custom"
                )
            ),
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'checkbox',
            'heading' =>  esc_html__( 'Button Heavy?', 'wp_pizzeria' ),
            'param_name' => 'button_heavy',
            "group" =>  esc_html__("Button Setting", 'wp_pizzeria')
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Add icon?', 'wp_pizzeria' ),
            'param_name' => 'add_icon',
            'group' => esc_html__('Button Setting', 'wp_pizzeria'),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Text uppercase', 'wp_pizzeria' ),
            'param_name' => 'button_uppercase',
            'group' => esc_html__('Button Setting', 'wp_pizzeria'),
        ),
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_slider_carousel",
            "heading" => esc_html__("Shortcode Template",'wp_pizzeria'),
            "admin_label" => true,
            "description" => esc_html__('Choose slider carousel layout', 'wp_pizzeria'),
            "group" => esc_html__("Template", 'wp_pizzeria'),
            'weight'=>1,
        )
    )
));

class WPBakeryShortCode_cms_slider_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $atts_extra = shortcode_atts(array(
            'nav' => 'true',
            'dots' => 'true',
            'autoplay' => 'false',
            'autoplaytimeout' => '5000',
            'smartspeed' => '1000',
            'autoplayhoverpause' => 'true',
            'class' => '',
                ), $atts);

        $atts = array_merge($atts_extra,$atts);
        $html_id = cmsHtmlID('cms-slider-carousel');
        global $cms_slider_carousel;
        if($atts['cms_template']== 'cms_slider_carousel.php'){
            wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css','','2.0.0b','all');
            wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.0.0b',true);
            $atts['autoplaytimeout'] = isset($atts['autoplaytimeout'])?(int)$atts['autoplaytimeout']:5000;
            $atts['smartspeed'] = isset($atts['smartspeed'])?(int)$atts['smartspeed']:1000;
            $cms_slider_carousel[$html_id] = array(
                'nav' => $atts['nav'],
                'loop' => 'true',
                'dots' => $atts['dots'],
                'autoplay' => $atts['autoplay'],
                'autoplayTimeout' => $atts['autoplaytimeout'],
                'smartSpeed' => $atts['smartspeed'],
                'dotscontainer' => $html_id.' .cms-slider-dots',
                'responsive' => array(
                    0 => array(
                    "items" => 1,
                    ),
                    768 => array(
                        "items" => 1,
                        ),
                    992 => array(
                        "items" => 1,
                        ),
                    1200 => array(
                        "items" => 1,
                        )
                    ),
                'layout' => '0',
            );
            
        }else{
            wp_enqueue_style('wp-pizzeria-flexslider');
            wp_enqueue_script('wp-pizzeria-flexslider');
            $cms_slider_carousel[$html_id] = array(
                'layout' => '1',
                'itemWidth' => $atts['item_width'],
                'autoplay' => $atts['autoplay'],
            );
        } 
        wp_enqueue_script('owl-slider_carousel-cms',get_template_directory_uri().'/assets/js/owl.slider.carousel.cms.js',array('jquery'),'1.0.0',true);
        wp_localize_script('owl-slider_carousel-cms', "cms_slider_carousel", $cms_slider_carousel); 
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $atts['class'];
        $atts['html_id'] = $html_id;

        return parent::content($atts, $content);
    }
}

?>