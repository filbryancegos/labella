<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
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

				<?php if ( have_posts() ) : ?>

					<?php
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
						the_post();
					?>

					<header class="archive-header">
						<h1 class="archive-title"><?php printf( esc_html__( 'Author Archives: %s', 'wp_pizzeria' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
					</header><!-- .archive-header -->

					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
					?>


					<?php
					// If a user has filled out their description, show a bio on their entries.
					if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-info">
						<div class="author-avatar">
							<?php
							/**
							 * Filter the author bio avatar size.
							 *
							 * @since Twenty Twelve 1.0
							 *
							 * @param int $size The height and width of the avatar in pixels.
							 */
							$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
							echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
							?>
						</div><!-- .author-avatar -->
						<div class="author-description">
							<h2><?php printf( esc_html__( 'About %s', 'wp_pizzeria' ), get_the_author() ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- .author-description	-->
					</div><!-- .author-info -->
					<?php endif; ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'single-templates/content/content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php wp_pizzeria_paging_nav(); ?>

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
