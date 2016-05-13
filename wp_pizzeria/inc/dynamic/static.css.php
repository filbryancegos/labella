<?php

/**
 * Auto create .css file from Theme Options
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_StaticCss
{

    public $scss;
    
    function __construct()
    {   
        /* scss */
        $this->scss = new scssc();
        
        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
             
        /* generate css over time */
		add_action('init', array($this, 'generate_over_time'));
        
        /* save option generate css */
       	add_action("redux/options/smof_data/saved", array(
            $this,
            'generate_file'
        ));
    }
	
    public function generate_over_time(){
    	
    	global $smof_data;
    	
    	if (!isset($smof_data['dev_mode'])) return ;
    	
    	if (!$smof_data['dev_mode']) return ;
    		
    	$this->generate_file();
    }
    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data, $wp_filesystem;
        
        if (! empty($smof_data)) {
            
        	$options_scss = get_template_directory() . '/assets/scss/options.scss';
        	
        	/* delete files options.scss */
        	$wp_filesystem->delete($options_scss);
        	
            /* write options to scss file */
            $wp_filesystem->put_contents($options_scss, $this->css_render(), FS_CHMOD_FILE); // Save it
            
            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }
            
            /* compile scss to css */
            $css = $this->scss_render();
            $css_light = $this->scss_light_render();
            
            $file = get_template_directory() . '/assets/css/static.css';
            $file_light = get_template_directory() . '/assets/css/light.css' ;
            
            /* delete files static.css */
            $wp_filesystem->delete($file);
            $wp_filesystem->delete($file_light);
            
            /* write static.css file */
            $wp_filesystem->put_contents($file, $css, FS_CHMOD_FILE); // Save it
            $wp_filesystem->put_contents( $file_light, $css_light, FS_CHMOD_FILE); // Save it
        }
    }
    
    /**
     * scss compile
     * 
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }
    public function scss_light_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master-light.scss"');
    }
    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $theme_framework_base,$wp_pizzeria_base;
        
        ob_start();
        /* custom css. */
        echo esc_attr($smof_data['custom_css']);
        /* google fonts. */
        if(isset($smof_data['google-font-1']) && !empty($smof_data['google-font-1']['font-family'])){
            $wp_pizzeria_base->wp_pizzeria_setGoogleFont($smof_data['google-font-1'], $smof_data['google-font-selector-1']);
        }
        if(isset($smof_data['google-font-2']) && !empty($smof_data['google-font-2']['font-family'])){
            $wp_pizzeria_base->wp_pizzeria_setGoogleFont($smof_data['google-font-2'], $smof_data['google-font-selector-2']);
        }
        /* forward options to scss. */
        
        if(!empty($smof_data['primary_color'])){
            echo '$primary_color:'.esc_attr($smof_data['primary_color']).';';
        }
        if(!empty($smof_data['secondary_color'])){
            echo '$secondary_color:'.esc_attr($smof_data['secondary_color']).';';
        }

        /* Header */
        if(!empty($smof_data['header_margin'])){
            if(!empty($smof_data['header_margin']['margin-top'])){
                echo '$header_margin_top:'.esc_attr($smof_data['header_margin']['margin-top']).';';
            }else{
                echo '$header_margin_top:0;';
            }
            if(!empty($smof_data['header_margin']['margin-right'])){
                echo '$header_margin_right:'.esc_attr($smof_data['header_margin']['margin-right']).';';
            }
            else{
                echo '$header_margin_right:0;';
            }
            if(!empty($smof_data['header_margin']['margin-bottom'])){
                echo '$header_margin_bottom:'.esc_attr($smof_data['header_margin']['margin-bottom']).';';
            }
            else{
                echo '$header_margin_bottom:0;';
            }
            if(!empty($smof_data['header_margin']['margin-left'])){
                echo '$header_margin_left:'.esc_attr($smof_data['header_margin']['margin-left']).';';
            }
            else{
                echo '$header_margin_left:0;';
            }
        }
        if(!empty($smof_data['header_padding'])){
            if(!empty($smof_data['header_padding']['padding-top'])){
                echo '$header_padding_top:'.esc_attr($smof_data['header_padding']['padding-top']).';';
            }else{
                echo '$header_padding_top:0;';
            }
            if(!empty($smof_data['header_padding']['padding-right'])){
                echo '$header_padding_right:'.esc_attr($smof_data['header_padding']['padding-right']).';';
            }
            else{
                echo '$header_padding_right:0;';
            }
            if(!empty($smof_data['header_padding']['padding-bottom'])){
                echo '$header_padding_bottom:'.esc_attr($smof_data['header_padding']['padding-bottom']).';';
            }
            else{
                echo '$header_padding_bottom:0;';
            }
            if(!empty($smof_data['header_padding']['padding-left'])){
                echo '$header_padding_left:'.esc_attr($smof_data['header_padding']['padding-left']).';';
            }
            else{
                echo '$header_padding_left:0;';
            }
        }


        /* Header Top */
        if(!empty($smof_data['header_top_margin'])){
            if(!empty($smof_data['header_top_margin']['margin-top'])){
                echo '$header_margin_top:'.esc_attr($smof_data['header_top_margin']['margin-top']).';';
            }else{
                echo '$header_top_margin_top:0;';
            }
            if(!empty($smof_data['header_top_margin']['margin-right'])){
                echo '$header_top_margin_right:'.esc_attr($smof_data['header_top_margin']['margin-right']).';';
            }
            else{
                echo '$header_top_margin_right:0;';
            }
            if(!empty($smof_data['header_top_margin']['margin-bottom'])){
                echo '$header_top_margin_bottom:'.esc_attr($smof_data['header_top_margin']['margin-bottom']).';';
            }
            else{
                echo '$header_top_margin_bottom:0;';
            }
            if(!empty($smof_data['header_top_margin']['margin-left'])){
                echo '$header_top_margin_left:'.esc_attr($smof_data['header_top_margin']['margin-left']).';';
            }
            else{
                echo '$header_top_margin_left:0;';
            }
        }
        if(!empty($smof_data['header_top_padding'])){
            if(!empty($smof_data['header_top_padding']['padding-top'])){
                echo '$header_top_padding_top:'.esc_attr($smof_data['header_top_padding']['padding-top']).';';
            }else{
                echo '$header_top_padding_top:0;';
            }
            if(!empty($smof_data['header_top_padding']['padding-right'])){
                echo '$header_top_padding_right:'.esc_attr($smof_data['header_top_padding']['padding-right']).';';
            }
            else{
                echo '$header_top_padding_right:0;';
            }
            if(!empty($smof_data['header_top_padding']['padding-bottom'])){
                echo '$header_top_padding_bottom:'.esc_attr($smof_data['header_top_padding']['padding-bottom']).';';
            }
            else{
                echo '$header_top_padding_bottom:0;';
            }
            if(!empty($smof_data['header_top_padding']['padding-left'])){
                echo '$header_top_padding_left:'.esc_attr($smof_data['header_top_padding']['padding-left']).';';
            }
            else{
                echo '$header_top_padding_left:0;';
            }
        }

        /* Footer */
        if(!empty($smof_data['footer_margin'])){
            if(!empty($smof_data['footer_margin']['margin-top'])){
                echo '$footer_margin_top:'.esc_attr($smof_data['footer_margin']['margin-top']).';';
            }else{
                echo '$footer_margin_top:0;';
            }
            if(!empty($smof_data['footer_margin']['margin-right'])){
                echo '$footer_margin_right:'.esc_attr($smof_data['footer_margin']['margin-right']).';';
            }
            else{
                echo '$footer_margin_right:0;';
            }
            if(!empty($smof_data['footer_margin']['margin-bottom'])){
                echo '$footer_margin_bottom:'.esc_attr($smof_data['footer_margin']['margin-bottom']).';';
            }
            else{
                echo '$footer_margin_bottom:0;';
            }
            if(!empty($smof_data['footer_margin']['margin-left'])){
                echo '$footer_margin_left:'.esc_attr($smof_data['footer_margin']['margin-left']).';';
            }
            else{
                echo '$footer_margin_left:0;';
            }
        }
        if(!empty($smof_data['footer_padding'])){
            if(!empty($smof_data['footer_padding']['padding-top'])){
                echo '$footer_padding_top:'.esc_attr($smof_data['footer_padding']['padding-top']).';';
            }else{
                echo '$footer_padding_top:0;';
            }
            if(!empty($smof_data['footer_padding']['padding-right'])){
                echo '$footer_padding_right:'.esc_attr($smof_data['footer_padding']['padding-right']).';';
            }
            else{
                echo '$footer_padding_right:0;';
            }
            if(!empty($smof_data['footer_padding']['padding-bottom'])){
                echo '$footer_padding_bottom:'.esc_attr($smof_data['footer_padding']['padding-bottom']).';';
            }
            else{
                echo '$footer_padding_bottom:0;';
            }
            if(!empty($smof_data['footer_padding']['padding-left'])){
                echo '$footer_padding_left:'.esc_attr($smof_data['footer_padding']['padding-left']).';';
            }
            else{
                echo '$footer_padding_left:0;';
            }
        }

        /* Footer Top */
        if(!empty($smof_data['footer_top_margin'])){
            if(!empty($smof_data['footer_top_margin']['margin-top'])){
                echo '$footer_top_margin_top:'.esc_attr($smof_data['footer_top_margin']['margin-top']).';';
            }else{
                echo '$footer_top_margin_top:0;';
            }
            if(!empty($smof_data['footer_top_margin']['margin-right'])){
                echo '$footer_top_margin_right:'.esc_attr($smof_data['footer_top_margin']['margin-right']).';';
            }
            else{
                echo '$footer_top_margin_right:0;';
            }
            if(!empty($smof_data['footer_top_margin']['margin-bottom'])){
                echo '$footer_top_margin_bottom:'.esc_attr($smof_data['footer_top_margin']['margin-bottom']).';';
            }
            else{
                echo '$footer_top_margin_bottom:0;';
            }
            if(!empty($smof_data['footer_top_margin']['margin-left'])){
                echo '$footer_top_margin_left:'.esc_attr($smof_data['footer_top_margin']['margin-left']).';';
            }
            else{
                echo '$footer_top_margin_left:0;';
            }
        }
        if(!empty($smof_data['footer_top_padding'])){
            if(!empty($smof_data['footer_top_padding']['padding-top'])){
                echo '$footer_top_padding_top:'.esc_attr($smof_data['footer_top_padding']['padding-top']).';';
            }else{
                echo '$footer_top_padding_top:0;';
            }
            if(!empty($smof_data['footer_top_padding']['padding-right'])){
                echo '$footer_top_padding_right:'.esc_attr($smof_data['footer_top_padding']['padding-right']).';';
            }
            else{
                echo '$footer_top_padding_right:0;';
            }
            if(!empty($smof_data['footer_top_padding']['padding-bottom'])){
                echo '$footer_top_padding_bottom:'.esc_attr($smof_data['footer_top_padding']['padding-bottom']).';';
            }
            else{
                echo '$footer_top_padding_bottom:0;';
            }
            if(!empty($smof_data['footer_top_padding']['padding-left'])){
                echo '$footer_top_padding_left:'.esc_attr($smof_data['footer_top_padding']['padding-left']).';';
            }
            else{
                echo '$footer_top_padding_left:0;';
            }
        }

        /* Footer Bottom */
        if(!empty($smof_data['footer_bottom_margin'])){
            if(!empty($smof_data['footer_bottom_margin']['margin-top'])){
                echo '$footer_bottom_margin_top:'.esc_attr($smof_data['footer_bottom_margin']['margin-top']).';';
            }else{
                echo '$footer_bottom_margin_top:0;';
            }
            if(!empty($smof_data['footer_bottom_margin']['margin-right'])){
                echo '$footer_bottom_margin_right:'.esc_attr($smof_data['footer_bottom_margin']['margin-right']).';';
            }
            else{
                echo '$footer_bottom_margin_right:0;';
            }
            if(!empty($smof_data['footer_bottom_margin']['margin-bottom'])){
                echo '$footer_bottom_margin_bottom:'.esc_attr($smof_data['footer_bottom_margin']['margin-bottom']).';';
            }
            else{
                echo '$footer_bottom_margin_bottom:0;';
            }
            if(!empty($smof_data['footer_bottom_margin']['margin-left'])){
                echo '$footer_bottom_margin_left:'.esc_attr($smof_data['footer_bottom_margin']['margin-left']).';';
            }
            else{
                echo '$footer_bottom_margin_left:0;';
            }
        }
        if(!empty($smof_data['footer_bottom_padding'])){
            if(!empty($smof_data['footer_bottom_padding']['padding-top'])){
                echo '$footer_bottom_padding_top:'.esc_attr($smof_data['footer_bottom_padding']['padding-top']).';';
            }else{
                echo '$footer_bottom_padding_top:0;';
            }
            if(!empty($smof_data['footer_bottom_padding']['padding-right'])){
                echo '$footer_bottom_padding_right:'.esc_attr($smof_data['footer_bottom_padding']['padding-right']).';';
            }
            else{
                echo '$footer_bottom_padding_right:0;';
            }
            if(!empty($smof_data['footer_bottom_padding']['padding-bottom'])){
                echo '$footer_bottom_padding_bottom:'.esc_attr($smof_data['footer_bottom_padding']['padding-bottom']).';';
            }
            else{
                echo '$footer_bottom_padding_bottom:0;';
            }
            if(!empty($smof_data['footer_bottom_padding']['padding-left'])){
                echo '$footer_bottom_padding_left:'.esc_attr($smof_data['footer_bottom_padding']['padding-left']).';';
            }
            else{
                echo '$footer_bottom_padding_left:0;';
            }
        }
        return ob_get_clean();
    }
}

new CMSSuperHeroes_StaticCss();