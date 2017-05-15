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


            <div class="columns is-multiline">
            <?php

            //get acf otopns
            $post_types = (get_field('post_type')) ? get_field('post_type'): 'post';
            $posts_per_page = (get_field('posts_per_page')) ? get_field('posts_per_page') : '10';
            $order = (get_field('order')) ? get_field('order') : '10';
            $orderby = (get_field('orderby')) ? get_field('orderby') : 'date';
            $arguments = array(
	            //'category_name' => 'projets',
	            'post_type' => $post_types,
	            'ignore_sticky_posts' => 0,
	            'posts_per_page' => $posts_per_page,
                'order' => $order,
                'orderby'  => $orderby
            );
            $the_query = new WP_Query( $arguments );
            if ( $the_query->have_posts() ) {
	            while ( $the_query->have_posts() ) {
		            $the_query->the_post();
		            get_template_part( 'template-parts/post/content', 'grid' );
	            }
            } else {
                echo __('no post available','_dm');
            }
            ?>
            </div>


	</main><!-- #main -->

	</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();