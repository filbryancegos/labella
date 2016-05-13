<?php 
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, CMS Theme already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>
<div class="container">
    <div class="row">
        <section id="primary" class="col-md-8">
            <div id="content" >

            <?php if ( have_posts() ) :
                $i=1;
                    $j=1;
                    $count=$wp_query->post_count;
                     ?>
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    if($j > 3){
                        $j=1;
                    }
                    ?>
                    <?php if($j==1): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 blog-item">  
                    <?php
                     get_template_part( 'single-templates/blog/content', '');
                     ?>
                     </div>
                     <?php if($j == 3 || $i==$count ): ?>
                        </div>
                     <?php endif; ?>
                     <?php
                     $j++;
                     $i++;
                endwhile;

                wp_pizzeria_paging_nav();
                ?>

            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>