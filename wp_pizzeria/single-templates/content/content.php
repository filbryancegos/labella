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
$image=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(isset($image[0]) && !empty($image[0])): ?>
		<div class="entry-feature entry-feature-image">
			<?php the_post_thumbnail( 'wp_pizzeria_rectangle' ); ?>
		</div>
	<?php endif; ?>
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
<!-- #post -->
