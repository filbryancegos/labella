<?php
/**
 * The template for displaying Search Results pages
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

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'single-templates/content/content' ); ?>
                <?php endwhile; ?>

                <?php wp_pizzeria_paging_nav(); ?>

            <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'wp_pizzeria' ); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'wp_pizzeria' ); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>