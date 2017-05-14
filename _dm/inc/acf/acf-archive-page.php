<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 14/05/2017
 * Time: 09:36
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5916bc1ab5cd5',
		'title' => 'archive page',
		'fields' => array (
			array (
				'key' => 'field_5916bc274d45d',
				'label' => 'custom post type (post_type)',
				'name' => 'post_type',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => get_post_types(
					array(
						'public'   => true,
						'_builtin' => false
					)
				),
				'default_value' => array (

				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
			array (
				'key' => 'field_5918077479f9b',
				'label' => 'posts_per_page',
				'name' => 'posts_per_page',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_591807dc79f9c',
				'label' => 'category name (category_name)',
				'name' => 'category_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5918082d79f9d',
				'label' => 'order',
				'name' => 'order',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'ASC' => 'ASC',
					'DESC' => 'DESC',
				),
				'default_value' => array (
					0 => 'ASC',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
			array (
				'key' => 'field_5918085a79f9e',
				'label' => 'orderby',
				'name' => 'orderby',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'none' => 'none',
					'ID' => 'ID',
					'author' => 'author',
					'title' => 'title',
					'name' => 'name',
					'type' => 'type',
					'date' => 'date',
					'comment_count' => 'comment_count',
				),
				'default_value' => array (
					0 => 'date',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'templates/tpl-archive-custom-post.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;