<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>
<div id="main-bg">
<div class="container">
    <div class="row">
        <div id="primary" class="col-md-8">
            <div id="content" >
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
                    <hr>
                    <?php comments_template( '', true ); ?>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <div class="col-md-4 wp_pizzeria_sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>
