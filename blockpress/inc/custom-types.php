<?php
//
// Custom Type Example
//

function bl_custom_post_register() {

	$slug = "custom-post"; // <===== Change this
	$name = "Custom Post"; // <===== Change this
	$labels = array(
		'name' => __($name, 'post type general name'),
		'singular_name' => __($name, 'post type singular name'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => $slug, 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => false,
		'menu_position' => null,
		'taxonomies' => array('post_tag', 'category'),
		'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
		'capabilities' => array(
			'edit_post' => 'edit_gallery',
			'edit_posts' => 'edit_galleries',
			'edit_others_posts' => 'edit_other_galleries',
			'publish_posts' => 'publish_galleries',
			'read_post' => 'read_gallery',
			'read_private_posts' => 'read_private_galleries',
			'delete_post' => 'delete_gallery',
		),
		// as pointed out by iEmanuele, adding map_meta_cap will map the meta correctly
		'map_meta_cap' => true,
	);
	//register_post_type($slug, $args);

}

bl_custom_post_register();