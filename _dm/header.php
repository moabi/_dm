<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
	<?php
	if( class_exists('acf') ) {
		echo  get_field('head','options');
	}
	?>
<style>
    <?php
$css = '.home .site-content-contain {background-image: url( '.get_field('home-background','option').'); }';
$css .= get_field('custom_css','option');
echo $css;
 ?>
</style>
</head>

<?php
if( class_exists('acf') ) {
	$body_tag =  get_field('body_tag','options');
} else {
	$body_tag = '';
}
?>
<body <?php body_class(); ?> data-ga="<?php echo $ga_code; ?>">
<?php
if( class_exists('acf') ) {
	echo  get_field('after_body_insert','options');
}
?>
<div id="vue-app" class="site">

<!--	<header id="masthead" class="site-header" role="banner">-->
<!--		<div class="section">-->
<!--			<div class="container is-paddingless">-->
<!--				<nav class="nav">-->
<!--					<div class="nav-left">-->
<!--					</div>-->
<?php //get_template_part( 'template-parts/header/site', 'branding' ); ?>
<!--				</nav>-->
<!--			</div>-->
<!--		</div>-->
<!--	</header><!-- #masthead -->

	<?php
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
		echo '<div class="single-featured-image-header hero is-primary" style="background-image: url('.get_the_post_thumbnail_url().')">';
		//the_post_thumbnail( 'twentyseventeen-featured-image' );
		echo '<div class="hero-foot">';
		echo '<div class="container">';
		echo '<div class="tabs is-centered">';
		echo '<h1>';
		echo get_the_title();
		echo '</h1>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
