<?php
/**
 * Template Name: Blog Right Sidebar
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header(); ?>
<div id="page-right-sidebar" class="page-blogs">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-md-8">
                <div id="content" >
<?php global $wp_query, $paged; ?>

                <?php $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged); ?>
                    <?php if ( have_posts() ) :
                    $i=1;
                    $j=1;
                    $count=$wp_query->post_count;
                ?>
                    <?php while ( have_posts() ) : the_post();
                    if($j > 2){
                        $j=1;
                    }
                    ?>
                    <?php if($j==1): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 blog-item">
                    <?php
                     get_template_part( 'single-templates/blog/content', '');
                     ?>
                     </div>
                     <?php if($j == 2 || $i==$count ): ?>
                        </div>
                     <?php endif; ?>
                     <?php
                     $j++;
                     $i++;
                    endwhile; // end of the loop.?>

                    <?php wp_pizzeria_paging_nav(); ?>

                <?php else : ?>
                    <?php get_template_part( 'single-templates/content', 'none' ); ?>
                <?php endif; ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
