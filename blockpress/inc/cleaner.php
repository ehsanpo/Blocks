<?php

//remove wp-embed.min.js
add_action('init', function () {

	// Remove the REST API endpoint.
	remove_action('rest_api_init', 'wp_oembed_register_route');

	// Turn off oEmbed auto discovery.
	// Don't filter oEmbed results.
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

	// Remove oEmbed discovery links.
	remove_action('wp_head', 'wp_oembed_add_discovery_links');

	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1);

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
// Remove the REST API lines from the HTML Header
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_resource_hints', 2);

// Removes from admin menu
add_action('admin_menu', 'bl_remove_admin_menus');
function bl_remove_admin_menus() {
	remove_menu_page('edit-comments.php');
}
// Removes from post and pages
add_action('init', 'bl_remove_comment_support', 100);

function bl_remove_comment_support() {
	remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');
}
// Removes from admin bar
function bl_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'bl_admin_bar_render');
