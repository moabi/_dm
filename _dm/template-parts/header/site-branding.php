<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="nav-center">
		<a class="nav-item" href="<?php echo get_home_url(); ?>">
			<?php
			if( class_exists('acf') ) {
				echo get_field('header_logo','options');
			}
			?>
		</a>
</div><!-- .site-branding -->
