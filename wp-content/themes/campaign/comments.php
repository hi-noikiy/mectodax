<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Greenback
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'campaign' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation info-line" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&lsaquo; Older Comments', 'campaign' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rsaquo;', 'campaign' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( 'callback=campaign_comments' );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation info-line" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&lsaquo; Older Comments', 'campaign' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rsaquo;', 'campaign' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'campaign' ); ?></p>
	<?php endif; ?>

	<?php 

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
	
		comment_form(array(

			$fields = array(
	      	'author' =>
		      	'<p class="comment-form-author input-group">' .
				'<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>' .
		      	'<input id="author" placeholder=" ' . esc_html__('Name', 'campaign') .
				( $req ? esc_html__(' (required)', 'campaign') : '' ) .
				'" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) .
		      	'" size="30"' . $aria_req . ' /></p>',
				
			'email' =>
				'<p class="comment-form-email input-group">' .
				'<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>' .
				'<input id="email" placeholder=" ' . esc_html__('Email', 'campaign') .
				( $req ? esc_html__(' (required)', 'campaign') : '' ) .
				'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' /></p>',
				
			'url' =>
				'<p class="comment-form-url input-group">' .
				'<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>' .
				'<input id="url" placeholder=" ' . esc_html__('URL', 'campaign') .
				'" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30" /></p>',
			),
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' =>
				'<p class="comment-form-comment">' .
				'<textarea cols="45" rows="8" id="comment" name="comment" aria-required="true" placeholder=" ' . esc_html__('Comment (required)', 'campaign') .
				'"></textarea></p>',
    	)
	); ?>

</div><!-- #comments -->
