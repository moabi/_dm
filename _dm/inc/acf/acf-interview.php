<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 15/05/2017
 * Time: 21:13
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5919fd8eca3b1',
		'title' => 'interviews',
		'fields' => array (
			array (
				'key' => 'field_5919fd942f51e',
				'label' => 'Block',
				'name' => 'block',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_5919fda42f51f',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => 'Add a block',
				'sub_fields' => array (
					array (
						'key' => 'field_5919fda42f51f',
						'label' => 'Question',
						'name' => 'question',
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
						'key' => 'field_5919fdb42f520',
						'label' => 'Answer',
						'name' => 'answer',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'interview_post_type',
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