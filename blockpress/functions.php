<?php
/**
 * Blockpress starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Blockpress
 * @since   Blockpress 0.1
 */

define('MY_ACF_PATH', get_stylesheet_directory() . '/lib/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/lib/acf/');

// Include the ACF plugin.
include_once MY_ACF_PATH . 'acf.php';

require_once __DIR__ . '../../../../../vendor/autoload.php';
$timber = new Timber\Timber();
new Timmy\Timmy();

if (!class_exists('Timber')) {
	add_action('admin_notices', function () {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
	});

	add_filter('template_include', function ($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});

	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */

Timber::$dirname = array('views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action('after_setup_theme', array($this, 'theme_supports'));
		add_filter('timber/context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_to_twig'));
		add_action('init', array($this, 'import_libs_bl'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
		add_action('acf/init', array($this, 'block_register_bl'));
		add_action('init', array($this, 'bl_create_option_page'));

		// Register Primary Navigation
		register_nav_menu('primary', 'Primary Navigation');
		register_nav_menu('login_menu', 'Login Navigation');

		//register top widget bar
		register_sidebar(array(
			'name' => 'Top',
			'id' => 'top_widget',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		));

		self::setup_scripts();
		parent::__construct();

	}

	public function import_libs_bl() {
		foreach (glob(__DIR__ . '/lib/*.php') as $filename) {
			require $filename;
		}
	}
	public function block_register_bl() {

		$blocks = array_diff(scandir(__DIR__ . '/blocks/'), array('..', '.', '.DS_Store'));
		foreach ($blocks as $block) {
			require __DIR__ . '/blocks/' . $block;
		}

	}

	// Register the Site-wide Options Page
	public function bl_create_option_page() {
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

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context($context) {

		require __DIR__ . '/assets/dist/assets.php';
		$context['site'] = $this;
		$context['main_css'] = get_template_directory_uri() . '/assets/dist/' . $main_css;
		add_editor_style(get_template_directory_uri() . '/assets/dist/' . $main_css);
		$context['critical'] = str_replace(' ', '', $critical);
		$context['options'] = get_fields('option');
		$context['primary_menu'] = new Timber\Menu('primary');
		$context['login_menu'] = new Timber\Menu('login_menu');

		$context['ajax_url'] = admin_url('admin-ajax.php');
		$context['top_widget'] = Timber::get_widgets('top_widget');
		return $context;
	}

	private function setup_scripts() {

		add_action('wp_enqueue_scripts', function () {
			require __DIR__ . '/assets/dist/assets.php';
			$js = get_template_directory_uri() . '/assets/dist/' . $main_js;

			wp_enqueue_script('theme', $js, array(), '1.0.0', true);
		});

	}
	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		//add_theme_support( 'automatic-feed-links' );

		/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
		*/
		add_theme_support('title-tag');

		/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support('post-thumbnails');

		/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
		*/
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support('menus');
		add_theme_support('align-wide');
		add_theme_support('editor-styles');
		//add_theme_support('wp-block-styles');
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig($twig) {
		$twig->addExtension(new Twig_Extension_StringLoader());
		$twig->addFilter(new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		$twig->addFilter(new Twig_SimpleFilter('shuffle', array($this, 'shuffle_twig')));

		return $twig;
	}

	public function shuffle_twig($array) {
		shuffle($array);
		return $array;

	}

}

new StarterSite();

add_action('admin_enqueue_scripts', 'load_admin_style');

function load_admin_style() {
	wp_register_style('admin_css', get_template_directory_uri() . '/admin.css', false, '1.0.0');
}

add_filter('allowed_block_types', 'bp_allowed_block_types');

function bp_allowed_block_types($allowed_blocks) {

	$return = [];

	$str = json_decode(file_get_contents(__DIR__ . '/allowed_blocks.json'));
	foreach ($str as $key => $value) {
		$return[] = $value;
	}
	return $return;

}

function bp_get_theme_colors() {

	$css = file_get_contents(__DIR__ . '/assets/sass/base/variables.scss');
	$matches = [];
	preg_match_all('/#(?:[0-9a-fA-F]{6})/', $css, $matches);
	return $matches;

}

function bp_color_setup() {

	$matches = bp_get_theme_colors();
	$colors = [];
	//print_r($matches);
	// Disable Custom Colors
	add_theme_support('disable-custom-colors');

	for ($i = 0; $i < count($matches[0]); $i++) {
		$colors[] = array(
			'name' => __('Color-' . $i, 'bp'),
			'slug' => 'bg-color-' . $i,
			'color' => $matches[0][$i],
		);
	}

	//print_r($colors);

	// Editor Color Palette
	add_theme_support('editor-color-palette', array(
		$colors,
	));
}
add_action('after_setup_theme', 'bp_color_setup');

/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
 *
 */
add_action('acf/input/admin_footer', 'bp_acf_color_palette');

function bp_acf_color_palette() {

	$matches = bp_get_theme_colors();
	$matches = array_slice($matches[0], 0, 8);
	$matches = json_encode($matches);
	?>
<script type="text/javascript">
(function($) {

     acf.add_filter('color_picker_args', function( args, $field ){
          // add the hexadecimal22 codes here for the colors you want to appear as swatches
          args.palettes = <?php echo $matches ?>
          // return colors
          return args;
     });
})(jQuery);
</script>
<?php }
