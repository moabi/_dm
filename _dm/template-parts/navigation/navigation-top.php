<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<div id="mobile-toggle"
     v-bind:class="{ cross: showMobileMenu }"
     v-on:click="showMobileMenu = !showMobileMenu">
	<svg viewBox="0 0 800 600">
		<path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
		<path d="M300,320 L540,320" id="middle"></path>
		<path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
	</svg>
</div>
<div class="nav-right nav-menu animated" v-bind:class="{ 'is-active fadeInDown': showMobileMenu }">
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
		'container'     => '',
		//'container_class'       => '',
		'items_wrap' => '%3$s',
		'walker'            =>  new bulma_walker_nav_menu
	) ); ?>
</div>


