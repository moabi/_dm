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
<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
	<div class="card assets-card">
	<div class="card-content">
        <div class="columns">

                <div class="column is-2">
                    <?php
                    $link = get_field('link');
                    $parse = parse_url($link);
                    $host = isset($parse['host']) ? $parse['host'] : '';
                    ?>
					<?php
                    if(has_post_thumbnail()){
	                    the_post_thumbnail(array(65,65));
                    } else {
                        echo '<img src="https://logo.clearbit.com/'.$host.'" alt="'.get_the_title().'"/>';
                    }
                     ?>
                </div>
                <div class="column">
                    <header class="entry-header">
						<?php
    the_title( '<h2 class="entry-title">', '</h2>' );

    if($link) {
	    echo '<a target="_blank" rel="no-follow" href="' . $link . '">' . remove_http_uris( $link ) . '</a>';
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
                </div>

        </div>


	</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
</div>