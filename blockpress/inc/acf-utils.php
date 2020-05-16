<?php

// Register the Site-wide Options Page
function bl_create_option_page() {
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'General Settings',
			'menu_title' => 'General Settings',
			'menu_slug' => 'general-settings',
			'capability' => 'edit_posts',
			'redirect' => false,
		));
	}
}
add_action('init', 'bl_create_option_page');

?>