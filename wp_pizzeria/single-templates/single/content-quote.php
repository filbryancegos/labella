<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog entry-post">
		<div class="entry-header">
		    <div class="entry-feature entry-quote"><?php $quote = wp_pizzeria_archive_quote(); ?></div>
		</div>
		<!-- .entry-header -->

		<div class="entry-content">
			<h1 class="entry-title no-bottom-margin">
				<?php if(is_sticky()): ?>
            		<i class="fa fa-thumb-tack"></i>
            	<?php endif; ?> 
				<?php the_title(); ?>
			</h1>
			<div class="entry-meta"><?php wp_pizzeria_post_detail(); ?></div>
			<?php if($quote){ echo apply_filters('the_content', preg_replace('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));} else { the_content(); }
	    		wp_link_pages( array(
	        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:','wp_pizzeria') . '</span>',
	        		'after'       => '</div>',
	        		'link_before' => '<span class="page-numbers">',
	        		'link_after'  => '</span>',
	    		) );
			?>
		</div>
		<div class="row">
            <div class="col-md-6">
                <?php wp_pizzeria_socials_share_post(); ?>
            </div>
            <div class="col-md-6 text-right">
                <?php wp_pizzeria_tags(); ?>
            </div>
        </div>
		<!-- .entry-content -->
		<!-- .entry-footer -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
