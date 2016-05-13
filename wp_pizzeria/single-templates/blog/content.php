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

<article id="post-<?php the_ID(); ?>" class="post-preview" onclick="">
	
	<div class="entry-feature entry-feature-image">
	<?php if(isset($image[0]) && !empty($image[0])): ?>
		<a href="<?php echo esc_url($image[0]); ?>" data-lightbox="blog-post<?php the_ID(); ?>">
			<?php the_post_thumbnail( 'wp_pizzeria_rectangle' ); ?>
		</a>
	<?php else: ?>
		<a href="<?php echo esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ); ?>" data-lightbox="blog-post<?php the_ID(); ?>">
			<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/no-image.jpg' ); ?>" >
		</a>
	<?php endif; ?>
	</div>
	
	<div class="post-content">
	    <h2 class="entry-title">
	    		<?php
		    		if(is_sticky()){
		                echo "<i class='fa fa-thumb-tack'></i>";
		            }
		    	?>
	    		<?php the_title(); ?>
	    </h2>
	    <?php wp_pizzeria_archive_detail(); ?>
	    <div class="entry-content">
			<?php echo wp_trim_words(get_the_excerpt());?>
		</div>
	    <?php wp_pizzeria_archive_readmore(); ?>
	</div>
</article>
<!-- #post -->
