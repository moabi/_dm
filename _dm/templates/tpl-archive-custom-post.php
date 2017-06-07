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

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


            <div id="list-grid" class="columns is-multiline">

            <?php
            $orga_terms = get_field('order_by_terms');

                $args_terms = array(
                    'taxonomy' => 'type',
                    'hide_empty' => true,
                );
                $terms = get_terms($args_terms);

                foreach($terms as $term) {

	                echo '<div class="column is-12">';
	                echo '<h2>' . $term->name . '</h2>';
	                echo '</div>';

	                //get acf options
	                $post_types     = ( get_field( 'post_type' ) ) ? get_field( 'post_type' ) : 'post';
	                $posts_per_page = ( get_field( 'posts_per_page' ) ) ? get_field( 'posts_per_page' ) : '10';
	                $order          = ( get_field( 'order' ) ) ? get_field( 'order' ) : '10';
	                $orderby        = ( get_field( 'orderby' ) ) ? get_field( 'orderby' ) : 'date';
	                $terms_arg      = isset( $term ) ? array(
		                'taxonomy' => 'type',
		                'field'    => 'slug',
		                'terms'    => $term->slug,
	                ) : '';
	                $arguments      = array(
		                //'category_name' => 'projets',
		                'post_type'           => $post_types,
		                'ignore_sticky_posts' => 0,
		                'posts_per_page'      => $posts_per_page,
		                'order'               => $order,
		                'orderby'             => $orderby,
		                'tax_query'           => array(
			                $terms_arg
		                ),
	                );
	                $the_query      = new WP_Query( $arguments );
	                if ( $the_query->have_posts() ) {
		                while ( $the_query->have_posts() ) {
			                $the_query->the_post();
			                get_template_part( 'template-parts/post/content', 'grid' );
		                }
	                }
                }


            ?>
            </div>


	</main><!-- #main -->

	</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();