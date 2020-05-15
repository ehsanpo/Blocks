<?php

/*
Add a 'Links Only' toolbar style for the following fields:
- Text/Image Block: text_caption
- Site-wide Settings: site_callout_text, site_footer_credits

Credit: http://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
 */

function bl_acf_wysiwyg_toolbar($toolbars) {

	$toolbars['Links Only'] = array();
	$toolbars['Text Based'] = array();

	// Only one row of buttons
	$toolbars['Links Only'][1] = array('link', 'unlink');
	$toolbars['Text Based'][1] = array('formatselect', 'bold', 'italic', 'link', 'unlink', 'bullist', 'numlist');

	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'bl_acf_wysiwyg_toolbar');

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