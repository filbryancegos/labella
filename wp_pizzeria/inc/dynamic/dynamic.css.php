<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $wp_pizzeria_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $wp_pizzeria_base->wp_pizzeria_compressCss($css);
        }
        echo '<style type="text/css" data-type="cms_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $wp_pizzeria_meta;
        ob_start();
            if(isset($wp_pizzeria_meta->_cms_page_body_background) && !empty($wp_pizzeria_meta->_cms_page_body_background)){ 
                $body_background_image=wp_get_attachment_url($wp_pizzeria_meta->_cms_page_body_background);
                if(!empty($body_background_image)){
            ?>
                    body{
                        background-image: url(<?php echo esc_attr($body_background_image);?>) !important;
                    }
        <?php   
                } 
            }
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();