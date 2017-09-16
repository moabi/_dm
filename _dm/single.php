<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="section">
<div class="container">
<div class="columns">
	<div id="primary" class="column is-7 is-offset-1">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content-single', get_post_format() );

//					echo '<div class="columns">';
//					echo '<div class="column is-11 is-offset-1">';
//					the_post_navigation( array(
//						'prev_text'                  => __( '%title' ),
//						'next_text'                  => __( '%title' ),
//						'screen_reader_text' => __( ' ' ),
//					) );
//					echo '</div>';
//					echo '</div>';

					// If comments are open or we have at least one comment, load up the comment template.

					echo '<div class="columns">';
					echo '<div class="column is-11 is-offset-1">';

					echo '</div>';
					echo '</div>';


				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
</div><!-- .wrap -->
  </div><!-- .wrap -->
<?php get_footer();
