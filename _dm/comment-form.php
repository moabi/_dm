<?php $comment_args = array(
	'title_reply' => 'Got Something To Say:',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' => '<p class="comment-form-author">' . '<label for="author" class="label">' . __( 'Your Name*' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

		            '<input 
id="author" class="input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' .
		            $aria_req . ' /></p>',

		'email' => '<p class="comment-form-email">' .

		           '<label for="email" class="label">' . __( 'Your Email*' ) . '</label> ' .

		           ( $req ? '<span>*</span>' : '' ) .

		           '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . '</p>',

		'url' => ''
	) ),

	'comment_field' => '<p>' .

	                   '<label for="comment" class="label">' . __( 'Let us know what you have to say:' ) . '</label>' .

	                   '<textarea id="comment" 
name="comment" cols="45" rows="8" aria-required="true" class="textarea"></textarea>' .

	                   '</p>',

	'comment_notes_after' => '',

);

comment_form( $comment_args ); ?>