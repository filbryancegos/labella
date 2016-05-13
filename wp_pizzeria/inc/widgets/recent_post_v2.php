<?php
add_action('widgets_init', 'cs_recent_post_widgets');

function cs_recent_post_widgets() {
    register_widget('CS_Recent_Post_Widget_V2');
}

class CS_Recent_Post_Widget_V2 extends WP_Widget {

    function CS_Recent_Post_Widget_V2() {
        parent::__construct(
                'cs_recent_post_v2', esc_html__('CS Recent Posts','wp_pizzeria'), array('description' => esc_html__('Recent Posts Widget.', 'wp_pizzeria'),)
        );
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent Posts', 'wp_pizzeria' ) : $instance['title'], $instance, $this->id_base);
        $show_date = (int) $instance['show_date'];
        $show_decs = (int) $instance['show_decs'];
        $number = (int) $instance['number'];

        echo balanceTags($before_widget);

        if($title) {
            echo balanceTags($before_title.$title.$after_title);
        }

        $sticky = get_option('sticky_posts');
        $args = array(
            'posts_per_page' => $number,
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in'  => $sticky,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => 1
        );

        $wp_query = new WP_Query($args);
        $extra_class = !empty($instance['extra_class']) ? $instance['extra_class'] : "";

        // no 'class' attribute - add one with the value of width
        if( strpos($before_widget, 'class') === false ) {
            $before_widget = str_replace('>', 'class="'. $extra_class . ' >"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="'. $extra_class . ' ', $before_widget);
        }
        ?>
        <?php if ($wp_query->have_posts()){ ?>
                <div class="cms-recent-post">
                    <div class="cms-recent-post-wrapper">
                        <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <div class="post-tiny">
                                <?php if (has_post_thumbnail()) : ?>
                                   <a class="post-featured-img" href="<?php the_permalink(); ?>">
                                      <?php the_post_thumbnail(array(50, 50)); ?>
                                   </a>
                                <?php endif; ?> 
                                <div class="cms-recent-details <?php if(has_post_thumbnail() == '') {echo 'no-image';} ?>">
                                    <h5 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <?php if ($show_date) { ?>
                                    <span class="wp-pizzeria-detail-element"><?php echo esc_html__('On ','wp_pizzeria'); ?><?php echo get_the_date('M, d, Y'); ?></span><span class="delimiter-inline">|</span><span class="wp-pizzeria-detail-element"><?php echo esc_html__('by ','wp_pizzeria'); ?><?php the_author_posts_link(); ?></span><span class="delimiter-inline">|</span><a class="wp-pizzeria-detail-element" href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php echo ' '.comments_number(' 0',' 1',' %'); ?></a>
                                    <?php }?> 
                                    <?php if ($show_decs) { ?>
                                        <div class="description"><?php echo wp_pizzeria_limit_words( strip_tags( get_the_excerpt() ),10)."..."; ?></div>
                                    <?php  } ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php } else { ?>
                <span class="notfound">No post found!</span>
            <?php
            }
         echo balanceTags($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = $new_instance['title'];
        $instance['show_date'] = $new_instance['show_date'];
        $instance['show_decs'] = $new_instance['show_decs'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['extra_class'] = $new_instance['extra_class'];

        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $show_date = isset($instance['show_date']) ? esc_attr($instance['show_date']) : '';
        $show_decs = isset($instance['show_decs']) ? esc_attr($instance['show_decs']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
                     $number = 5;
        ?>
        <p>
            <label for="<?php echo ''.$this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'wp_pizzeria' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('show_date'); ?>"><?php esc_html_e( 'Show date:', 'wp_pizzeria' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_date') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_date') ); ?>" <?php if($show_date!='') echo 'checked="checked";' ?> type="checkbox" value="1"  />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('show_decs'); ?>"><?php esc_html_e( 'Show Description:', 'wp_pizzeria' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('show_decs') ); ?>" name="<?php echo esc_attr( $this->get_field_name('show_decs') ); ?>" <?php if($show_decs!='') echo 'checked="checked";' ?> type="checkbox" value="1" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('number'); ?>"><?php esc_html_e( 'Number of products to show:', 'wp_pizzeria' ); ?></label>
            <input id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>
        <p>
            <label for="<?php echo ''.$this->get_field_id('extra_class'); ?>">Extra Class:</label>
            <input class="widefat" id="<?php echo ''.$this->get_field_id('extra_class'); ?>" name="<?php echo esc_attr($this->get_field_name('extra_class')); ?>" value="<?php if(isset($instance['extra_class'])){echo esc_attr($instance['extra_class']);} ?>" />
        </p>
        <?php
    }
}
?>