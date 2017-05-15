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
<div class="column is-half is-hidden grid-item">
<article
        v-on:click="goToLocation('<?php echo get_permalink(); ?>')"
        id="post-<?php the_ID(); ?>"
    <?php post_class(); ?>
>

	<div class="card">

		<?php if (has_post_thumbnail()) { ?>
			<div class="card-image">
				<figure class="image is-4by3">
					<?php the_post_thumbnail('twentyseventeen-featured-image'); ?>
				</figure>
			</div>
		<?php } else { ?>


		<?php } ?>

	<div class="card-content">
		<header class="entry-header">
			<?php

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header><!-- .entry-header -->
		<?php
		if ( is_single() ) {
			the_content();
		} else {
			the_excerpt();
		}

		?>
	</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
</div>