<?php
/**
* comments.php
*
* @author    Denis Franchi
* @package   Avik
* @version   1.3.2
*/

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$avik_comment_count = get_comments_number();
			if ( '1' === $avik_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Comments', 'avik' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $avik_comment_count, 'comments title', 'avik' ) ),
					number_format_i18n( $avik_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'avik' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	?>
	<?php
	comment_form(array('title_reply'=>'Got Something To Say!','avik'));
	?>
</div><!-- #comments -->
