<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div class="wrapper">


<article id="post-<?php the_ID(); ?>" <?php post_class('animated fadeIn content'); ?>>

	<div class="single-wrapper box">

	<div class="card-content">
		<?php

			the_content();

		?>
	</div><!-- .entry-content -->

		<footer class="card-footer">
			<section class="section">
				<?php include_once get_template_directory().'/inc/social-share.php'; ?>
			</section>

	<?php
	if ( 'post' === get_post_type() ) :
		echo '<div class="entry-meta">';
		if ( is_single() ) :
			twentyseventeen_posted_on();
		endif;
		echo '</div><!-- .entry-meta -->';
	endif;

	?>
		</footer>
	</div>
</article><!-- #post-## -->
</div>
