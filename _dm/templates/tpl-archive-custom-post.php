<?php
/*
Template Name: Archive custom post
Template Post Type: page
*/
get_header();
?>
<div class="section">
	<div id="primary" class="columns">
		<?php get_sidebar('listing'); ?>
		<main id="main" class="column" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

	</main><!-- #main -->

	</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();