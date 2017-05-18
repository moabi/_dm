<?php
// Register Custom Post Type
function assets_post_type() {

	$labels = array(
		'name'                  => _x( 'Assets', 'Post Type General Name', '_dm' ),
		'singular_name'         => _x( 'Asset', 'Post Type Singular Name', '_dm' ),
		'menu_name'             => __( 'assets', '_dm' ),
		'name_admin_bar'        => __( 'Assets', '_dm' ),
		'archives'              => __( 'Assets archives', '_dm' ),
		'attributes'            => __( 'Item Attributes', '_dm' ),
		'parent_item_colon'     => __( 'Parent Item:', '_dm' ),
		'all_items'             => __( 'All Items', '_dm' ),
		'add_new_item'          => __( 'Add New Item', '_dm' ),
		'add_new'               => __( 'Add New', '_dm' ),
		'new_item'              => __( 'New Item', '_dm' ),
		'edit_item'             => __( 'Edit Item', '_dm' ),
		'update_item'           => __( 'Update Item', '_dm' ),
		'view_item'             => __( 'View Item', '_dm' ),
		'view_items'            => __( 'View Items', '_dm' ),
		'search_items'          => __( 'Search Item', '_dm' ),
		'not_found'             => __( 'Not found', '_dm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_dm' ),
		'featured_image'        => __( 'Featured Image', '_dm' ),
		'set_featured_image'    => __( 'Set featured image', '_dm' ),
		'remove_featured_image' => __( 'Remove featured image', '_dm' ),
		'use_featured_image'    => __( 'Use as featured image', '_dm' ),
		'insert_into_item'      => __( 'Insert into item', '_dm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_dm' ),
		'items_list'            => __( 'Items list', '_dm' ),
		'items_list_navigation' => __( 'Items list navigation', '_dm' ),
		'filter_items_list'     => __( 'Filter items list', '_dm' ),
	);

	$args = array(
		'label'                 => __( 'Asset', '_dm' ),
		'description'           => __( 'all the digital manager assets', '_dm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail','post-formats' ),
		'taxonomies'            => array('post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'assets_post_type', $args );

}
add_action( 'init', 'assets_post_type', 0 );






// Register Custom Post Type
function interview_post_type() {

	$labels = array(
		'name'                  => _x( 'Interviews', 'Post Type General Name', '_dm' ),
		'singular_name'         => _x( 'Interview', 'Post Type Singular Name', '_dm' ),
		'menu_name'             => __( 'Interviews', '_dm' ),
		'name_admin_bar'        => __( 'Interviews', '_dm' ),
		'archives'              => __( 'Interviews archives', '_dm' ),
		'attributes'            => __( 'Interviews Attributes', '_dm' ),
		'parent_item_colon'     => __( 'Parent Item:', '_dm' ),
		'all_items'             => __( 'All Items', '_dm' ),
		'add_new_item'          => __( 'Add New Item', '_dm' ),
		'add_new'               => __( 'Add New', '_dm' ),
		'new_item'              => __( 'New Item', '_dm' ),
		'edit_item'             => __( 'Edit Item', '_dm' ),
		'update_item'           => __( 'Update Item', '_dm' ),
		'view_item'             => __( 'View Item', '_dm' ),
		'view_items'            => __( 'View Items', '_dm' ),
		'search_items'          => __( 'Search Item', '_dm' ),
		'not_found'             => __( 'Not found', '_dm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '_dm' ),
		'featured_image'        => __( 'Featured Image', '_dm' ),
		'set_featured_image'    => __( 'Set featured image', '_dm' ),
		'remove_featured_image' => __( 'Remove featured image', '_dm' ),
		'use_featured_image'    => __( 'Use as featured image', '_dm' ),
		'insert_into_item'      => __( 'Insert into item', '_dm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '_dm' ),
		'items_list'            => __( 'Items list', '_dm' ),
		'items_list_navigation' => __( 'Items list navigation', '_dm' ),
		'filter_items_list'     => __( 'Filter items list', '_dm' ),
	);
	$rewrite = array(
		'slug'                  => 'interview',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Interview', '_dm' ),
		'description'           => __( 'all the digital manager interviews', '_dm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'post-formats', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'interview_post_type', $args );

}
add_action( 'init', 'interview_post_type', 0 );




// Register Custom Taxonomy
function assets_taxonomy() {

	$labels = array(
		'name'                       => _x( 'types', 'Taxonomy General Name', '_dm' ),
		'singular_name'              => _x( 'type', 'Taxonomy Singular Name', '_dm' ),
		'menu_name'                  => __( 'Type', '_dm' ),
		'all_items'                  => __( 'All types', '_dm' ),
		'parent_item'                => __( 'type Item', '_dm' ),
		'parent_item_colon'          => __( 'type Item:', '_dm' ),
		'new_item_name'              => __( 'New type Name', '_dm' ),
		'add_new_item'               => __( 'Add New type', '_dm' ),
		'edit_item'                  => __( 'Edit type', '_dm' ),
		'update_item'                => __( 'Update type', '_dm' ),
		'view_item'                  => __( 'View type', '_dm' ),
		'separate_items_with_commas' => __( 'Separate types with commas', '_dm' ),
		'add_or_remove_items'        => __( 'Add or remove types', '_dm' ),
		'choose_from_most_used'      => __( 'Choose from the most used', '_dm' ),
		'popular_items'              => __( 'Popular types', '_dm' ),
		'search_items'               => __( 'Search types', '_dm' ),
		'not_found'                  => __( 'Not Found', '_dm' ),
		'no_terms'                   => __( 'No types', '_dm' ),
		'items_list'                 => __( 'types list', '_dm' ),
		'items_list_navigation'      => __( 'types list navigation', '_dm' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'type', array( 'assets_post_type' ), $args );

}
add_action( 'init', 'assets_taxonomy', 0 );



