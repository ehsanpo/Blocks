<?php
//require_once(__DIR__ . '/../../vendor/autoload.php');

define('I18N_THEME', 'theme');


/**
 * import lib
 */
foreach (glob(__DIR__ . '/lib/*.php' ) as $filename){
	require $filename;
}

/**
 * Class that defines the site. Use this to add define what this theme is capable of
 * and to add extra functions to the template engine.
 *
 * By default the site is exposed to templates as the property site, which means that any
 * public methods and properties of this class can be retrieved via that variable. See
 * https://github.com/jarednova/timber/wiki/TimberSite for default properties.
 *
 * Example: site.name, site.do_stuff()
 */

class Site extends TimberSite {
	function __construct() {
		self::setup_theme();

		// Register actions
		// add_action('init', array($this, 'custom_init'))

		self::setup_scripts();

		//self::disable_blog();
		self::disable_comments();

		// Setup the page composer
		PageComposer::for_post_types(array('page'));
		// //PageComposer::with_shared_content();
		PageComposer::with_blocks(array_diff(scandir(__DIR__ . '/blocks/'), array('..', '.')));

		// Register Primary Navigation
		register_nav_menu('primary', 'Primary Navigation');
		register_nav_menu('footer', 'Footer Navigation');

		parent::__construct();
	}
	/**
	 * Setup some extra Twig filters used by the theme.
	 */
	function twig_filters($twig) {
		return $twig;
	}
	private function setup_theme(){

		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
		add_post_type_support( 'page', 'excerpt' );

		// Allows the use of HTML5 markup for the listen options
		add_theme_support('html5', [
			'caption',
			'gallery',
			'search-form',
		]);

		add_action('admin_enqueue_scripts', array($this,'register_admin_assets'));
		//add_action( 'after_setup_theme', array($this, 'tsk_editor_styles'));
		
		add_filter('timber_context', array($this, 'timber_context'));
		add_filter('twig_apply_filters', array($this, 'twig_filters'));
			
		//add_filter( 'tiny_mce_plugins', array($this, 'disable_emojis_tinymce')  );
		add_filter( 'upload_mimes',  array($this, 'add_svg_to_upload_mimes'), 10, 1 );
		add_action('admin_head',  array($this, 'fix_svg_thumb_display') );
	}
	// Customize the editor style
	// It's just the Bootstrap typography, but I like it. Got the idea from Roots.io.
	
	private function editor_styles() {
		add_editor_style( get_template_directory_uri()  . '/assets/css/editor-style.css' );
	}
	function register_admin_assets(){
	
		$js = get_template_directory_uri() . '/assets/js/admin.js';
		$css = get_template_directory_uri() . '/admin-css.css';

		wp_enqueue_script('jquery-ui-position');

		wp_register_script('ws-acf-sections', $js);
		wp_enqueue_script('ws-acf-sections');

		wp_register_style('ws-acf-sections',$css);
		wp_enqueue_style('ws-acf-sections');
	}

	/*
	 * 
	 * Allow svg uploads
	 *
	 */

	function fix_svg_thumb_display() {
		  echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			 width: 100% !important;
			 height: auto !important;
		}
		</style>';
	}
	function add_svg_to_upload_mimes( $upload_mimes ) {
	
		$upload_mimes['svg'] = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';
		return $upload_mimes;
	}
	/**
	  * Setup any extra global variables you want all templates of the
	  * theme to have access to.
	  */
	function timber_context($ctx) {
		global $main_css, $above_the_fold_css,$hash ;

		$ctx['site'] = $this;
		$ctx['primary_menu'] = new TimberMenu('primary');
		$ctx['footer_menu'] = new TimberMenu('footer');

		// To fetch all options as an associative array
		$options = get_fields('option');
		$ctx['options'] = $options;

		// Get Google Analytics
		$ctx['google_analytics_id'] = get_field('google_analytics_id', 'options');

		$ctx['main_css'] = str_replace(' ', '', $main_css);
		
		$ctx['above_the_fold_css'] = str_replace(' ', '', $above_the_fold_css );
		$ctx['hash'] = str_replace(' ', '', $hash);
		return $ctx;
	}

	private function setup_scripts() {

		add_action('wp_enqueue_scripts', function() {
			
			$js = get_template_directory_uri() . '/assets/dist/main.min.js';
			$css = get_template_directory_uri() . '/assets/dist/css.css';
			// $modernizr = get_template_directory_uri() . '/assets/js/modernizr.js';
			// wp_enqueue_script('modernizr', $modernizr);
			wp_enqueue_style('theme', $css,array(), '1.0.0');
			wp_enqueue_script('theme', $js, array(), '1.0.0', true);
		});

	}

	/**
	 * Disable commenting on posts and pages.
	 */
	private function disable_comments() {
		// TODO: This should do a bit more than just remove the comments page
		add_action('admin_menu', function() {
			remove_menu_page('edit-comments.php');
		});
	}

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 * 
	 * @param    array  $plugins  
	 * @return   array             Difference betwen the two arrays
	 */
	private function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}

}

new Site();
