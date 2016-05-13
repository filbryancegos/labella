<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cshero
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
        <div class="st-comments-wrap clearfix">
        	<div class="clearfix">
	            <h5 class="pull-left no-top-margin">
	                <span><?php comments_number(esc_html__('Comments Founds','wp_pizzeria'),esc_html__('1 Comments Founds','wp_pizzeria'),esc_html__('% Comments Founds','wp_pizzeria')); ?></span>
	            </h5>
	            <h5 class="pull-right margin-left no-top-margin"><a href="#respond" class="scroll-to"><?php echo esc_html__('Leave a Comment','wp_pizzeria'); ?></a></h5>
        	</div>	
            <div class="comment-list">
				<?php wp_list_comments( 'type=comment&callback=wp_pizzeria_comment' ); ?>
				
			</div>
			<?php wp_pizzeria_comment_nav(); ?>
			
        </div>
        <hr>
	<?php endif; // have_comments() ?>
	
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'button-yellow button-text-low button-long button-low',
			'title_reply'       => esc_html__( 'Write your Comment','wp_pizzeria'),
			'title_reply_to'    => esc_html__( 'Leave A Reply To %s','wp_pizzeria'),
			'cancel_reply_link' => esc_html__( 'Cancel Reply','wp_pizzeria'),
			'label_submit'      => esc_html__( 'Submit','wp_pizzeria'),
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' =>
					'<div class="row"><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">'.
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.esc_html__('Your Name','wp_pizzeria').'"/></div>',

					'email' =>
					'<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">'.
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.esc_html__('Your Email','wp_pizzeria').'"/></div></div>',
			)
			),
			'comment_field' =>  '<textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Message','wp_pizzeria').'" aria-required="true">' .
			'</textarea>',
	);
	comment_form($args);
	?>

</div><!-- #comments -->
