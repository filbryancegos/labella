<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

 get_header(); ?>
 <?php if (is_page('shop') || is_page('459')): ?>
 	<div id="main-bg-2">
 		<div id="page-default" class="container">
 			<div id="primary">
 				<div id="content" >
 					<?php while ( have_posts() ) : the_post(); ?>
 						<?php get_template_part( 'single-templates/content', 'page' ); ?>
 						<?php comments_template( '', true ); ?>
 					<?php endwhile; // end of the loop. ?>
 				</div><!-- #content -->
 			</div><!-- #primary -->
 		</div>
 	</div>
 <?php endif; ?>
 <?php if ( is_page('home') || is_page('996')): ?>
 		<div id="page-default" class="container">
 			<div id="primary">
 				<div id="content" >
 					<?php while ( have_posts() ) : the_post(); ?>
 						<?php get_template_part( 'single-templates/content', 'page' ); ?>
 						<?php comments_template( '', true ); ?>
 					<?php endwhile; // end of the loop. ?>
 				</div><!-- #content -->
 			</div><!-- #primary -->
 		</div>
 <?php else: ?>
 	<div id="main-bg">
 		<div id="page-default" class="container">
 			<div id="primary">
 				<div id="content" >
 					<?php while ( have_posts() ) : the_post(); ?>
 						<?php get_template_part( 'single-templates/content', 'page' ); ?>
 						<?php comments_template( '', true ); ?>
 					<?php endwhile; // end of the loop. ?>
 				</div><!-- #content -->
 			</div><!-- #primary -->
 		</div>
 	</div>
 <?php endif; ?>
 <?php get_footer(); ?>
