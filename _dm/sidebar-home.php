<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-home' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area column is-4" role="complementary">
	<div class="wrapper">
		<?php dynamic_sidebar( 'sidebar-home' ); ?>
	</div>
</aside><!-- #secondary -->
