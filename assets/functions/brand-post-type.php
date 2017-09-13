<?php
function brand_post() {
	register_post_type( 'brand',
		array('labels' => array(
			'name' => __('Brands', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Brand Post', 'jointswp'), /* This is the individual type */
			'all_items' => __('All brand Posts', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New brand Type', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Post Types', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Post Type', 'jointswp'), /* New Display Title */
			'view_item' => __('View Post Type', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Post Type', 'jointswp'), /* Search brand Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the brand post type', 'jointswp' ), /* brand Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-palmtree', /* the icon for the brand post type menu. uses built-in dashicons (CSS class name) */
				'rewrite'	=> array( 'slug' => 'brand', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'brand', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			'taxonomies'  => array( 'category' ),
			'supports' => array( 'title', 'editor', 'thumbnail', 'sticky')
		) /* end of options */
	); /* end of register post type */

}
add_action( 'init', 'brand_post');