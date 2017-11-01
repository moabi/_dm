<?php $comment_args = array(
	'title_reply' => 'Commentaires :',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' => '<div class="comment-form-author field">' . '<label for="author" class="label">' . __( 'Your Name*' ) . '</label> 
' . ( $req ? '<span>*</span>' : '' ) .

		            '<input 
id="author" class="input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' .
		            $aria_req . ' /></div>',

		'email' => '<div class="comment-form-email field">' .

		           '<label for="email" class="label">' . __( 'Your Email*' ) . '</label> 
' .

		           ( $req ? '<span>*</span>' : '' ) .

		           '<input 
id="email" class="email input" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . '</div>',

		'url' => ''
	) ),

	'comment_field' => '<div class="field">' .

	                   '<label for="comment" class="label" class="label">' . __( 'Message:' ) . '</label>' .

	                   '<textarea id="comment" 
name="comment" cols="45" rows="8" aria-required="true" class="textarea"></textarea>' .

	                   '</div>',

	'comment_notes_after' => '',
	'class_submit'  => 'submit button is-primary',
	'class_form'    => 'form comment-form'

);

comment_form( $comment_args ); ?>