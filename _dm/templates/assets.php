<?php
/*
Template Name: assets
Template Post Type: page
*/
get_header();
?>
<div class="section" id="assets-tpl">
	<div id="primary" class="columns">

		<main id="main" class="column" role="main">
			<?php
			while ( have_posts() ) : the_post();


				include dirname(__DIR__).'/template-parts/vue/assets.html';
		  get_template_part( 'template-parts/page/content', 'page' );
			endwhile; // End of the loop.
			?>

	</main><!-- #main -->

	</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();