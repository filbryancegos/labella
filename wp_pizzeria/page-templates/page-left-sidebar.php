<?php
/**
 * Template Name: Page Left Sidebar
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header(); ?>
<div id="page-left-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
            <div id="primary" class="col-md-8">
                <div id="content" >

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'single-templates/content', 'page' ); ?>
                <?php comments_template( '', true ); ?>
            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #primary -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
