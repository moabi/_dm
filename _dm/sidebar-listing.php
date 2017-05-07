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

if ( ! is_active_sidebar( 'sidebar-listing' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar-listing" role="complementary">
	<div class="wrapper">
		<?php dynamic_sidebar( 'sidebar-listing' ); ?>
	</div>
</aside><!-- #secondary -->
