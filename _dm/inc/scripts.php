<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 08/05/2017
 * Time: 16:58
 */
function add_theme_scripts() {
	//wp_enqueue_style( 'style', get_stylesheet_uri() );


	wp_enqueue_script(
		'vue-js',
		'https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.2/vue.min.js',
		array (),
		'2.3.2',
		true);

	wp_enqueue_script(
		'script',
		get_template_directory_uri() . '/assets/js/custom.js',
		array ('jquery'),
		1.1,
		true);


}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );