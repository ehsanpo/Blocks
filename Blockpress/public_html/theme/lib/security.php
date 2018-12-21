<?php
/*
|--------------------------------------------------------------------------
| Hide WordPress version number from source code
|--------------------------------------------------------------------------
|
| By hiding your WordPress version number you can improve your site security.
|
*/
// Remove WordPress version number from both head file(generator meta tag) and RSS feeds
remove_action('wp_head', 'wp_generator');
/**
 * Remove the 'ver' query argument from the source path
 *
 * @param $src
 *
 * @return mixed
 */
function bl_remove_query_string_version($src)
{
    return remove_query_arg('ver', $src);
}
// Remove WP version from css
add_filter('style_loader_src', 'bl_remove_query_string_version', 9999);
// Remove Wp version from scripts
add_filter('script_loader_src', 'bl_remove_query_string_version', 9999);
/*
|--------------------------------------------------------------------------
| Custom Login Error Message
|--------------------------------------------------------------------------
|
| Login errors in WordPress can be used by hackers
| to guess whether they entered wrong username or password.
| By creating custom login errors in WordPress you can improve your login page secure.
| 
*/
function bl_custom_login_error_message()
{
    return __('Oops! Incorrect input', 'bl');
}
add_filter('login_errors', 'bl_custom_login_error_message');


// Remove xmlrpc login, used to burteforce wp login.

add_filter( 'xmlrpc_enabled', '__return_false' );


