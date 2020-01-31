<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<h3 class="comments-title">
<?php
// printf( _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title'),
// 	number_format_i18n( get_comments_number() ), get_the_title() );
printf( _nx( 'Ein Kommentar', '%1$s Kommentare', get_comments_number(), null),
	number_format_i18n( get_comments_number() ), null );
?>
			</h3>
			<ul class="comment-list">
<?php
wp_list_comments( array(
	'short_ping'  => true,
	'avatar_size' => 50,
) );
?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
<?php _e( 'Comments are closed.' ); ?>
			</p>
		<?php endif; ?>
		<?php 
		

		$args = array(
			'fields' => apply_filters(
				'comment_form_default_fields', array(
					'author' =>
						// '<label for="author">' . __( 'Your Name' ) . '</label> ' .
						// ( $req ? '<span class="required">*</span>' : '' )  .
						'<p class="comment-form-author">' . 
							'<input 
								id="author" 
								class="comment-form-author__author" 
								placeholder="' . __( 'Name' ) . ( $req ? '*' : '' ) . '" 
								name="author" 
								type="text" 
								value="' . esc_attr( $commenter['comment_author'] ) . '" 
								size="30"' . 
								$aria_req . 
							'/>' .
						'</p>'
						,
					'email'  => 
						// '<label for="email">' . __( 'Your Email' ) . '</label> ' .
						// ( $req ? '<span class="required">*</span>' : '' ) .
						'<p class="comment-form-email">' . 
							'<input 
								id="email" 
								class="comment-form-email__email" 
								placeholder="E-Mail' . ( $req ? '*' : '' ) . '" 
								name="email" 
								type="text" 
								value="' . esc_attr(  $commenter['comment_author_email'] ) . '" 
								size="30"' . 
								$aria_req . 
							'/>' .
						'</p>',
					// 'url'    => '<p class="comment-form-url">' .
					//  '<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
					// '<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
					//    '</p>'
				)
			),
			'comment_field' => 
				'<p class="comment-form-comment">' .
					// '<label for="comment">' . __( 'Let us know what you have to say:' ) . '</label>' .
					'<textarea 
						id="comment" 
						class="comment-form-comment__comment" 
						name="comment" 
						placeholder="Kommentar" 
						cols="45" 
						rows="8" 
						aria-required="true"
					></textarea>' .
				'</p>',
			'comment_notes_after' => '',
			'title_reply' => 'Einen Kommentar verfassen',
		);


		comment_form( $args );
		?>
	</div>