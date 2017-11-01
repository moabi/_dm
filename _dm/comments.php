<?php if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

      <h2 class="comments-title title is-5">
		  <?php
		  $comments_number = get_comments_number();
		  if ( '1' === $comments_number ) {
			  /* translators: %s: post title */
			  /* 1 Response to &ldquo;%s&rdquo; */
			  printf(
				  _x(
					  '1 Response',
					  'comments title',
					  'bulmapress'
				  ),
				  get_the_title()
			  );
		  } else {
			  /* translators: 1: number of comments, 2: post title */
			  /* %1$s Response to &ldquo;%2$s&rdquo; */
			  /* %1$s Responses to &ldquo;%2$s&rdquo; */
			  printf(
				  _nx(
					  '%1$s Response',
					  '%1$s Responses',
					  $comments_number,
					  'comments title',
					  'bulmapress'
				  ),
				  number_format_i18n( $comments_number ),
				  get_the_title()
			  );
		  }
		  ?>
      </h2>

      <!--        <ol class="comment-list">-->
      <!--            --><?php
//            wp_list_comments( array(
//                'avatar_size' => 48,
//                'style'       => 'ol',
//                'short_ping'  => true,
//                'reply_text'  => '<a class="button is-small"><span class="icon is-small"><i class="fa fa-reply"></i></span><span>'.__( 'Reply', 'bulmapress' ).'</span></a>',
//                // 'reply_text'  => twentyseventeen_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'bulmapress' ),
//            ) );
//            ?>
      <!--        </ol>-->

      <!--        <ul class="comment-list">-->
      <!--            --><?php //wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
      <!--        </ul>-->

      <ol class="comment-list">
		  <?php
		  wp_list_comments( array(
			  'style'       => 'ol',
			  'callback' => 'bulmapress_comment',
			  'type' => 'comment',
			  'reply_text' => __( 'Reply', 'bulmapress' ),
			  //'reply_text'  => '<a class="button is-small"><span class="icon is-small"><i class="fa fa-reply"></i></span><span>'.__( 'Reply', 'bulmapress' ).'</span></a>',
			  //'page' => 1,
			  //'per_page' => 1,
			  'avatar_size' => 48,
			  'short_ping'  => false,
		  ) );
		  ?>
      </ol>


      <nav class="comment-nav nav">
        <div class="nav-left">
                <span class="nav-item">
                <?php previous_comments_link(); ?>
                </span>
        </div>
        <div class="nav-center">
			<?php the_comments_pagination( array(
				'prev_text' => '<span>' . __( 'Previous', 'bulmapress' ) . '</span>',
				'next_text' => '<span>' . __( 'Next', 'bulmapress' ) . '</span>',
			) ); ?>
        </div>
        <div class="nav-right">
                <span class="nav-item">
                <?php next_comments_link(); ?>
                </span>
        </div>
      </nav>


		<?php

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

      <p class="no-comments"><?php _e( 'Comments are closed.', 'bulmapress' ); ?></p>
		<?php
	endif;

	include_once 'comment-form.php';
	?>

</div><!-- #comments -->