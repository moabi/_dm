<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 03/05/2017
 * Time: 23:05
 */

$comments_args = array(
	'id_form'           => 'commentform',
	'class_form'        => 'comment-form',
	'id_submit'         => 'submit',
	'class_submit'      => 'submit button',
	'name_submit'       => 'submit',
	'title_reply'       => __( 'Leave a Reply' ),
	'title_reply_to'    => __( 'Leave a Reply to %s' ),
	'cancel_reply_link' => __( 'Cancel Reply' ),
	'label_submit'      => __( 'Post Comment' ),
	'format'            => 'xhtml',

	'comment_field' => '<div class="comment-form-comment field"><label class="label" for="comment">' . _x( 'Comment', 'noun' ) .
	                   '</label><p class="control"><textarea 
id="comment" 
name="comment" cols="45" rows="8" aria-required="true" class="textarea">' .
	                   '</textarea></p></div>',

	'must_log_in' => '<p class="must-log-in">' .
	                 sprintf(
		                 __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		                 wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	                 ) . '</p>',

	'logged_in_as' => '<p class="logged-in-as">' .
	                  sprintf(
		                  __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		                  admin_url( 'profile.php' ),
		                  $user_identity,
		                  wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
	                  ) . '</p>',

	'comment_notes_before' => '<p class="comment-notes">' .
	                          __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	                          '</p>',

	'comment_notes_after' => '',

	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

comment_form( $comments_args );