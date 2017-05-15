<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 08/05/2017
 * Time: 16:58
 */
function add_theme_scripts() {
	//wp_enqueue_style( 'style', get_stylesheet_uri() );

	if (!is_admin()) {
		wp_deregister_script('jquery');

		// Google API (CDN)
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', false, '1.10.1', true);

		wp_enqueue_script('jquery');
	}


	wp_enqueue_script(
		'vue-js',
		'https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.2/vue.min.js',
		array (),
		'2.3.2',
		true);

	wp_enqueue_script(
		'custom',
		get_template_directory_uri() . '/assets/js/custom.js',
		array ('jquery'),
		1.1,
		true);

	if(is_page_template('templates/tpl-archive-custom-post.php')){
		wp_enqueue_script(
			'archive-cp',
			get_template_directory_uri() . '/assets/js/archive-cp.js',
			array ('jquery'),
			1.1,
			true);
	}


}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );