<?php
/**
 * Page title template
 * @since 1.0.0
 * @author Fox
 */
function wp_pizzeria_page_title(){
    global $smof_data, $wp_pizzeria_meta, $wp_pizzeria_base;
    
    /* page options */
    if(is_page() && isset($wp_pizzeria_meta->_cms_page_title) && $wp_pizzeria_meta->_cms_page_title){
        if(isset($wp_pizzeria_meta->_cms_page_title_type)){
            $smof_data['page_title_layout'] = $wp_pizzeria_meta->_cms_page_title_type;
        }
    }
    $page_title_image='';
    if(isset($wp_pizzeria_meta->_cms_page_title) && $wp_pizzeria_meta->_cms_page_title && isset($wp_pizzeria_meta->_cms_page_title_background) && !empty($wp_pizzeria_meta->_cms_page_title_background)){
        $page_title_image=wp_get_attachment_url($wp_pizzeria_meta->_cms_page_title_background);
    }elseif(isset($smof_data['page_title_background']['background-image']) && !empty($smof_data['page_title_background']['background-image'])){
         $page_title_image=$smof_data['page_title_background']['background-image'];
    }
    if($smof_data['page_title_layout']){
        ?>
        <div id="page-title" class="page-title">
            <?php 
                if(!empty($page_title_image)):
            ?>
                <img class="img-full" alt="<?php echo esc_html__('page title img','wp_pizzeria');?>" src="<?php echo esc_url($page_title_image) ?>">
            <?php 
                endif;
            ?>
            <div class="container">
            <div class="row">
            <?php switch ($smof_data['page_title_layout']){
                case '1':
                    ?>

                    <div class="page-title-wrap">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $wp_pizzeria_base->wp_pizzeria_getPageTitle(); ?></h1><?php wp_pizzeria_page_sub_title(); ?></div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_pizzeria_base->wp_pizzeria_getBreadCrumb(); ?></div>
                    </div>
                        
                    <?php
                    break;
                case '2':
                    ?>
                    <div class="page-title-wrap">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_pizzeria_base->wp_pizzeria_getBreadCrumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $wp_pizzeria_base->wp_pizzeria_getPageTitle(); ?></h1><?php wp_pizzeria_page_sub_title(); ?></div>
                    </div>
                    <?php          
                    break;
                case '3':
                    ?>
                    <div class="page-title-wrap">
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $wp_pizzeria_base->wp_pizzeria_getPageTitle(); ?></h1><?php wp_pizzeria_page_sub_title(); ?></div>
                    </div>
                    <?php
                    break;
                case '4':
                    ?>
                    <div class="page-title-wrap">
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $wp_pizzeria_base->wp_pizzeria_getBreadCrumb(); ?></div>
                    </div>
                    <?php
                    break;
            } ?>
            </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
}

/**
 * Get sub page title.
 *
 * @author Fox
 */
function wp_pizzeria_page_sub_title(){
    global $wp_pizzeria_meta, $post,$smof_data;

    if(isset($wp_pizzeria_meta->_cms_sub_page_title) && !empty($wp_pizzeria_meta->_cms_sub_page_title)){
        $sub_page_title=$wp_pizzeria_meta->_cms_sub_page_title;
    }elseif($smof_data['enable_sub_page_title']=='1'){
        if(isset($smof_data['sub_page_title']) && !empty($smof_data['sub_page_title'])){
            $sub_page_title=$smof_data['sub_page_title'];
        }else{
            $sub_page_title=''; 
        }
    }else{
       $sub_page_title=''; 
    }
    if(!empty($sub_page_title)){
        echo '<p class="page-sub-title">'.esc_attr($sub_page_title).'</p>';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo '<p class="page-sub-title">'.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'</p>';
    }
}

/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function wp_pizzeria_header(){
    global $smof_data;
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

/**
 * Get menu location ID.
 * 
 * @param string $option
 * @return NULL
 */
function wp_pizzeria_menu_location($option = '_cms_primary'){
    global $wp_pizzeria_meta;
    /* get menu id from page setting */
    return (isset($wp_pizzeria_meta->_cms_header) && !empty($wp_pizzeria_meta->_cms_header) && isset($wp_pizzeria_meta->$option) && $wp_pizzeria_meta->$option) ? $wp_pizzeria_meta->$option : null ;
}

function wp_pizzeria_get_page_loading() {
    global $smof_data;
    
    if($smof_data['enable_page_loadding']){
        echo '  <div id="page-loader" class="bg-pattern bg-white">
                    <div class="page-loader-content">
                        <div id="loader-pizza-corpus">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="200px" height="200px" viewBox="0 0 128.917 127.773" style="enable-background:new 0 0 128.917 127.773;" xml:space="preserve"> <path d="M112.148,43.321c10.551,21.945,2.659,49.678-17.838,63.816c-21.246,14.655-50.346,12.235-68.023-6.434 C8.099,81.495,5.735,55.679,21.392,33.442C35.476,13.434,63.444,7.15,83.121,15.859c-6.193,15.873-12.396,31.774-18.869,48.367 C80.627,57.078,96.305,50.234,112.148,43.321z M81.305,91.321c-0.007,4.149,3.154,7.36,7.266,7.386 c4.061,0.024,7.272-3.229,7.277-7.373c0.004-4.104-3.27-7.261-7.458-7.194C84.325,84.205,81.313,87.258,81.305,91.321z M39.819,39.253c4.004,0.151,7.538-3.104,7.688-7.078c0.148-3.904-2.925-7.158-6.96-7.365c-4.212-0.215-7.582,2.698-7.865,6.809 C32.417,35.445,35.832,39.099,39.819,39.253z M70.039,89.749c4.184,0.029,7.443-3.131,7.402-7.175 c-0.04-3.969-3.159-7.051-7.171-7.088c-4.269-0.043-7.598,2.997-7.641,6.973C62.586,86.372,65.992,89.722,70.039,89.749z M90.937,59.303c-4.067-0.042-7.361,2.978-7.505,6.874c-0.146,3.944,3.3,7.498,7.285,7.508c4.105,0.01,7.492-3.295,7.487-7.312 C98.198,62.432,95.023,59.342,90.937,59.303z M29.295,95.366c0.007,4.042,3.062,7.148,7.089,7.22 c4.083,0.07,7.361-3.215,7.339-7.356c-0.021-3.995-3.2-7.188-7.152-7.183C32.274,88.052,29.288,91.056,29.295,95.366z M57.163,40.076c-4.235,0.009-7.343,3.131-7.292,7.326c0.048,3.971,3.203,6.975,7.335,6.986c4.162,0.01,7.337-3.197,7.288-7.365 C64.448,43.092,61.258,40.068,57.163,40.076z M24.585,68.434c3.864-0.015,7.275-3.323,7.334-7.11 c0.063-4.043-3.318-7.384-7.419-7.328c-4.104,0.052-7.446,3.427-7.346,7.423C17.251,65.257,20.632,68.451,24.585,68.434z M108.358,70.354c2.906-0.019,5.021-2.196,4.986-5.14c-0.036-2.979-2.121-5.058-5.087-5.067c-2.96-0.012-5.402,2.436-5.304,5.316 C103.044,68.186,105.456,70.368,108.358,70.354z M82.602,104.217c-0.087-2.812-2.385-4.898-5.323-4.833 c-3.054,0.065-5.095,2.125-5.033,5.074c0.059,2.823,2.444,5.088,5.257,4.987C80.333,109.346,82.686,106.932,82.602,104.217z M72.272,23.711c-0.038-2.855-2.233-4.953-5.169-4.945c-2.922,0.01-5.197,2.166-5.226,4.955c-0.028,2.781,2.599,5.363,5.387,5.292 C69.896,28.944,72.308,26.393,72.272,23.711z M45.63,65.794c-3.117-0.02-5.146,1.849-5.226,4.804 c-0.076,2.784,2.167,5.143,4.972,5.236c2.983,0.098,5.38-2.202,5.369-5.151C50.733,67.696,48.764,65.813,45.63,65.794z"/> <path d="M66.479,0c4.401,0.869,10.418,2.046,16.429,3.255c0.627,0.124,1.492,0.237,1.779,0.664 c0.801,1.19,1.357,2.543,2.009,3.827c-1.352,0.464-2.788,1.482-4.042,1.299C77.012,8.21,71.432,6.192,65.811,6.124 C37.184,5.77,13.934,24.036,7.271,51.561c-7.713,31.861,14.09,63.813,47.59,69.741c27.163,4.804,55.603-11.998,64.422-37.782 c4.439-12.974,5.314-25.753-0.247-38.584c-0.737-1.7-1.083-3.453,1.048-4.379c2.418-1.045,3.508,0.49,4.382,2.472 c6.421,14.54,5.49,29.167-0.219,43.512c-9.896,24.861-29.082,38.496-55.47,40.98c-25.346,2.385-53.667-12.146-64.958-41.848 C-9.063,51.791,11.4,8.901,53.722,1.398C57.33,0.757,61.021,0.583,66.479,0z"/> </svg>
                        </div>
                        
                        <div id="loader-pizza-piece">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 58.88 59.156" style="enable-background:new 0 0 58.88 59.156;" xml:space="preserve"> <path d="M18.897,10.835C32.395,16.096,41.72,25.19,47.858,38.322C32.091,45.187,16.523,51.959,0,59.156 C6.493,42.551,12.656,26.792,18.897,10.835z M33.058,24.871c-4.319,0.005-7.261,2.776-7.336,6.919 c-0.077,4.225,3.023,7.432,7.211,7.461c4.173,0.028,7.348-3.144,7.334-7.329C40.254,27.838,37.218,24.868,33.058,24.871z M9.626,43.747c0.009,2.815,2.263,5.077,5.073,5.092c2.644,0.012,5.245-2.498,5.282-5.104c0.042-2.887-2.439-5.253-5.438-5.185 C11.595,38.619,9.617,40.708,9.626,43.747z"/> <path d="M58.88,35.033c-0.597,0.656-1.262,2.029-2.036,2.091c-1.15,0.095-2.899-0.392-3.476-1.238 c-1.799-2.655-2.993-5.703-4.733-8.4c-6.181-9.589-14.721-16.471-25.207-21.027c-0.494-0.218-1.002-0.406-1.514-0.575 c-2.028-0.673-3.275-1.945-2.464-4.111c0.908-2.431,3.011-1.9,4.65-1.098c4.452,2.181,9.049,4.219,13.116,6.992 c9.199,6.279,15.998,14.69,20.686,24.741C58.214,33.079,58.424,33.802,58.88,35.033z"/> </svg>
                        </div>
                        <div class="page-loader-text">Loading</div>
                    </div>
                </div>';
    }
}


/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_archive_detail(){
    $date=get_the_date(get_option( 'date_format' ),get_the_ID());
    ?>
    <div class="wp-pizzeria-detail">
        <span class="wp-pizzeria-detail-element"><?php esc_html_e('by ', 'wp_pizzeria'); ?><?php the_author_posts_link(); ?></span><!--
        --><span class="delimiter-inline">/</span><!--
        --><span class="wp-pizzeria-detail-element"><?php esc_html_e('on ', 'wp_pizzeria'); ?> <a href="#"><?php echo esc_attr($date); ?></a></span><!--
        --><span class="delimiter-inline">/</span><!--
        --><a class="wp-pizzeria-detail-element" href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?> <?php esc_html_e('Comments', 'wp_pizzeria'); ?></a>
    </div>
    <?php
}

/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_post_detail(){
    $date=get_the_date(get_option( 'date_format' ),get_the_ID());
    ?>
    <div class="wp-pizzeria-detail">
        <span class="wp-pizzeria-detail-element"><?php esc_html_e('by ', 'wp_pizzeria'); ?><?php the_author_posts_link(); ?></span><!--
        --><span class="delimiter-inline">/</span><!--
        --><span class="wp-pizzeria-detail-element"><?php esc_html_e('on ', 'wp_pizzeria'); ?><a href="#"><?php echo esc_attr($date); ?></a></span><!--
        --><span class="delimiter-inline">/</span><!--
        --><a class="wp-pizzeria-detail-element" href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?> <?php esc_html_e('Comments', 'wp_pizzeria'); ?></a><!--
        --><span class="delimiter-inline">/</span><!--
        --><span class="wp-pizzeria-detail-element"><?php the_category(','); ?></span>
    </div>
    <?php
}
/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_archive_readmore( $class=''){
    echo '<a class="button-void-alt button-low '.$class.'" href="'.esc_url(get_the_permalink()).'" title="'.get_the_title().'" >'.esc_html__('Read More', 'wp_pizzeria').'</a>';
}

/**
 * Media Audio.
 * 
 * @param string $before
 * @param string $after
 */
function wp_pizzeria_archive_audio() {
	global $wp_pizzeria_base;
    /* get shortcode audio. */
    $shortcode = $wp_pizzeria_base->wp_pizzeria_getShortcodeFromContent('audio', get_the_content());
    
    if($shortcode != ''){
        echo do_shortcode($shortcode);
        
        return true;
        
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        
        return false;
    }
    
}

/**
 * Media Video.
 *
 * @param string $before
 * @param string $after
 */
function wp_pizzeria_archive_video() {
    
    global $wp_embed, $wp_pizzeria_base;
     /* Get Local Video */
    $local_video = $wp_pizzeria_base->wp_pizzeria_getShortcodeFromContent('video', get_the_content());
    
    /* Get embed */
    $remote_video = $wp_pizzeria_base->wp_pizzeria_getShortcodeFromContent('embed', get_the_content());
    /* Get video press, need install jetpack plugin */
    $wpvideo = $wp_pizzeria_base->wp_pizzeria_getShortcodeFromContent('wpvideo', get_the_content());
    $youtube = preg_match('/http[^[\ |\n]*(youtube\.|vimeo\.|wordpress\.tv)[^[\ |\n]*/i', get_the_content(), $matches);
    if($local_video){
        /* view local. */
        echo '<div class="entry-media entry-video entry-local-video">'.do_shortcode($local_video).'</div>';
        return true;
    } elseif ($remote_video) {
        /* view embed video. */
        echo '<div class="entry-media entry-video entry-remote-video">'.$wp_embed->run_shortcode($remote_video).'</div>';
        return true;
    } elseif(isset($matches[0]) && !empty($matches[0])){
        echo '<div class="entry-media entry-video entry-remote-video">'.apply_filters('the_content', $matches[0]).'</div>';
        return true;
    }elseif($wpvideo){
        if(class_exists('Jetpack')){
            echo '<div class="entry-media entry-video entry-remote-video">'.apply_filters('the_content', $wpvideo).'</div>';
            return true;
        }else{
            return false;
        }
    }
    elseif (has_post_thumbnail()) {
        /* view thumbnail. */
        echo '<div class="entry-media entry-feature-image">';
        the_post_thumbnail('blog-grid');
        echo '</div>';
    } else {
        return false;
    } 
    
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_archive_gallery(){
	global $wp_pizzeria_base;
    /* get shortcode gallery. */
    $shortcode = $wp_pizzeria_base->wp_pizzeria_getShortcodeFromContent('gallery', get_the_content());
    
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
        
        if(!empty($ids)){
        
            $array_id = explode(",", $ids[1]);
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>
        			<?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):?>
        				<div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                    		<img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                    	</div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
                </div>
                <ol class="carousel-indicators ">
                    <?php $j = 0; ?>
                    <?php foreach ($array_id as $img_id): 
                        $attachment_img = wp_get_attachment_image_src($img_id, 'wp_sport-rectangle-horizontal', false);

                        if($attachment_img[0] != ''): ?>
                            <li data-target="#carousel-<?php the_ID() ?>" data-slide-to="<?php  echo esc_attr($j); ?>" class="<?php if( $j == 0 ){ echo 'active'; } ?>">

                            </li>
                       <?php  $j++; endif; 
                      endforeach; ?>
                </ol>
        	</div>
            <?php
            
            return true;
        
        } else {
            return false;
        }
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
    }
}

/**
 * Quote Text.
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_archive_quote() {
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if(!empty($blockquote[0])){
        echo ''.$blockquote[0].'';
        return true;
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        return false;
    }
}

/**
 * Get icon from post format.
 * 
 * @return multitype:string Ambigous <string, mixed>
 * @author Fox
 * @since 1.0.0
 */
function wp_pizzeria_archive_post_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>esc_html__('STANDARD', 'wp_pizzeria'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = esc_html__('GALLERY', 'wp_pizzeria');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = esc_html__('LINK', 'wp_pizzeria');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = esc_html__('QUOTE', 'wp_pizzeria');
            break;
        case 'video':
            $post_icon['icon'] = 'fa  fa-youtube-play';
            $post_icon['text'] = esc_html__('VIDEO', 'wp_pizzeria');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = esc_html__('AUDIO', 'wp_pizzeria');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = esc_html__('STANDARD', 'wp_pizzeria');
            break;
    }
    echo '<i class="'.$post_icon['icon'].'"></i>';
}

/**
 * List socials share for post.
 * 
 * @since 1.0.0
 */

if (!function_exists('wp_pizzeria_socials_share_post')) {
    function wp_pizzeria_socials_share_post(){
        ?>
        <div class="wp_pizzeria_socials_share_post">
            <?php echo esc_html__('Share it:','wp_pizzeria'); ?>
            <span class="delimiter-inline"></span>
            <a class="icon-rounded" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a>
            <a class="icon-rounded" target="_blank" href="https://twitter.com/home?status=<?php esc_url('Check out this article');?>:%20<?php get_the_title();?>%20-%20<?php the_permalink();?>"><i class="fa fa-twitter"></i></a>
            <a class="icon-rounded" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=&amp;description=<?php get_the_title();?>"><i class="fa fa-pinterest-p"></i></a>
         </div>
        <?php
    }
}

/**
 * List tags
 * 
 * @since 1.0.0
 */
 if (!function_exists('wp_pizzeria_tags')) {
    function wp_pizzeria_tags(){
        $tags=get_the_tags();
        if(!empty($tags) && count($tags) > 0 && !empty($tags[0])){
            $output ='<div class="wp_pizzeria_tags">';
            $output .=esc_html__('Tags: ','wp_pizzeria');
            $count = count($tags);
            foreach ($tags as $key=>$tag) {

                $output .='<a href="'.esc_url(get_tag_link($tag->term_id)).'"><em>'.$tag->name.'</em></a>';
                if($count > 1){
                    if( $key < $count-1){
                        $output .=', ';
                    }
                }
                
            }
            $output .='</div>';
        }else{
             $output='';
        }
        echo ''.$output;
    }
    
}