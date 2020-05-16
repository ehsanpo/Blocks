<?php
/**
 * Blockpress starter-theme
 *
 * @package  WordPress
 * @subpackage  Blockpress
 * @since   Blockpress 0.1
 */


define( 'MY_ACF_URL', get_template_directory_uri() . '/inc/acf/' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}


//equire_once get_template_directory() . DIRECTORY_SEPARATOR . 'autoloader.php';

//  	$BP_ACF = get_template_directory() . '/inc/acf/';
// 	$BP_ACF_URL = get_stylesheet_directory_uri() . '/inc/acf/';

// // Customize the url setting to fix incorrect asset URLs.
// add_filter('acf/settings/url', 'my_acf_settings_url');
// function my_acf_settings_url($url) {
//     return get_stylesheet_directory_uri() . '/inc/acf/';
// 	//return MY_ACF_URL;
// }

// // (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin($show_admin) {
// 	return false;
// }
	