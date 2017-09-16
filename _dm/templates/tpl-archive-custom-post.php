<?php
/*
Template Name: Archive custom post
Template Post Type: page
*/
get_header();
$is_sidebar_active = get_field('sidebar');

?>
<div class="section">
	<div id="primary" class="columns">

		<?php
        if($is_sidebar_active){
	        $sidebar_name = get_field('sidebar_name');
	        $sname = str_replace('Sidebar-','',$sidebar_name);
	        get_sidebar($sname);
        }
		     ?>
		<main id="main" class="column" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );


			endwhile; // End of the loop.
			?>

      <?php
        include dirname(__DIR__).'/template-parts/custom/assets-listing.php';
      ?>


	</main><!-- #main -->

	</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();