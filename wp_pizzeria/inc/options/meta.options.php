<?php
/**
 * Meta options
 * 
 * @author Fox
 * @since 1.0.0
 */
class CMSMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
            
            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', esc_html__('Setting', 'wp_pizzeria'), 'page');
        $this->add_meta_box('team_extra', esc_html__('Team extra field', 'wp_pizzeria'), 'teams');
        $this->add_meta_box('team_extra', esc_html__('Testimonial extra field', 'wp_pizzeria'), 'testimonials');
    }
    
    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_cms_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
	           
               <li class="tab"><a href="#tabs-general"><i class="fa fa-diamond"></i><?php esc_html_e('General', 'wp_pizzeria'); ?></a></li>
	           <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php esc_html_e('Header', 'wp_pizzeria'); ?></a></li>
               <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php esc_html_e('Page Title', 'wp_pizzeria'); ?></a></li>
	           
	        </ul>
	        <div class='panel-container'>
                <div id="tabs-general">
                    <?php
                    /* header. */
                    cms_options(array(
                        'id' => 'page_body_background',
                        'label' => esc_html__('Background image','wp_pizzeria'),
                        'type' => 'image',
                    ));
                    ?>
                </div>
                <div id="tabs-header">
                <?php
                /* header. */
                cms_options(array(
                    'id' => 'header',
                    'label' => esc_html__('Custom','wp_pizzeria'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_enable'))
                ));
                ?>  <div id="page_header_enable"><?php
                $menus = array();
                $menus[''] = 'Default';
                $obj_menus = wp_get_nav_menus();
                foreach ($obj_menus as $obj_menu){
                    $menus[$obj_menu->term_id] = $obj_menu->name;
                }
                $navs = get_registered_nav_menus();
                foreach ($navs as $key => $mav){
                    cms_options(array(
                    'id' => $key,
                    'label' => $mav,
                    'type' => 'select',
                    'options' => $menus
                    ));
                }
                cms_options(array(
                    'id' => 'header_sticky',
                    'label' => esc_html__('Disable header sticky ( Disable sticky header with larger screen 1600px )','wp_pizzeria'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    ));
                ?>
                </div>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                cms_options(array(
                    'id' => 'page_title',
                    'label' => esc_html__('Custom','wp_pizzeria'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?>  <div id="page_title_enable"><?php
                cms_options(array(
                    'id' => 'page_title_text',
                    'label' => esc_html__('Title','wp_pizzeria'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'sub_page_title',
                    'label' => esc_html__('Sub Title','wp_pizzeria'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'page_title_background',
                    'label' => esc_html__('Page Title Background','wp_pizzeria'),
                    'type' => 'image',
                ));
                cms_options(array(
                    'id' => 'page_title_type',
                    'label' => esc_html__('Layout','wp_pizzeria'),
                    'type' => 'imegesselect',
                    'options' => array(
                        '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
                        '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
                        '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
                        '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
                        '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
                    )
                ));
                ?>
                </div>
                </div>
               
            </div>
        </div>
        <?php
    }

    function team_extra(){
        cms_options(array(
            'id' => 'location',
            'label' => esc_html__('Team location','wp_pizzeria'),
            'type' => 'text',
        ));
    }

    function testimonial_extra(){
        cms_options(array(
            'id' => 'location',
            'label' => esc_html__('Testimonial location','wp_pizzeria'),
            'type' => 'text',
        ));
    }
}

new CMSMetaOptions();