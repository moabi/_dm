<?php
/**
 * Twenty Seventeen: Color Patterns
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function twentyseventeen_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	/**
	 * Filter Twenty Seventeen default saturation level.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $saturation integer
	 */
	$saturation = absint( apply_filters( 'twentyseventeen_custom_colors_saturation', 50 ) );
	$reduced_saturation = ( .8 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$css = '';


	/**
	 * Filters Twenty Seventeen custom colors CSS.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $css        string Base theme colors CSS.
	 * @param $hue        int    The user's selected color hue.
	 * @param $saturation string Filtered theme color saturation level.
	 */
	return apply_filters( 'twentyseventeen_custom_colors_css', $css, $hue, $saturation );
}
