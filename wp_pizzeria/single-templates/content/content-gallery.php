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
	<div class="entry-feature entry-gallery">
		<?php wp_pizzeria_archive_gallery(); ?>
	</div>
	<div class="post-content">
	    <h2 class="entry-title">
	    	<a href="<?php the_permalink(); ?>">
	    		<?php
		    		if(is_sticky()){
		                echo "<i class='fa fa-thumb-tack'></i>";
		            }
		    	?>
	    		<?php the_title(); ?>
	    	</a>
	    </h2>
	    <div class="entry-meta"><?php wp_pizzeria_archive_detail(); ?></div>
	    <div class="entry-content">
			<?php echo wp_trim_words(get_the_excerpt());?>
		</div>
	    <?php wp_pizzeria_archive_readmore('margin-10'); ?>
	</div>
</article>
<hr>
