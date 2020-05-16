<?php
/**
 * Blockpress starter-theme
 *
 * @package  WordPress
 * @subpackage  Blockpress
 * @since   Blockpress 0.1
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

class StarterSite extends Timber\Site {

    public function __construct() {
        $this->loader = new bp_autoload();
        $this->loader->setup();

        // Register Primary Navigation
        register_nav_menu('primary', 'Primary Navigation');

        //register top widget bar
        register_sidebar(array(
            'name' => 'Top',
            'id' => 'top_widget',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        ));
        self::add_action();
        self::setup_scripts();
        parent::__construct();

    }
    public function add_action() {

        add_action('init', array($this, 'import_libs_bl'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('init', array($this, 'bl_create_option_page'));
        add_action('after_setup_theme', array($this, 'theme_supports'));
        add_filter('timber/context', array($this, 'add_to_context'));
        add_filter('timber/twig', array($this, 'add_to_twig'));
        add_filter('allowed_block_types', array($this, 'bp_allowed_block_types'));
        add_action('after_setup_theme', array($this, 'bp_color_setup'));
        add_action('acf/init', array($this, 'block_register_bl'));
        add_action('acf/input/admin_footer', array($this, 'bp_acf_color_palette'));
        // Customize the url setting to fix incorrect asset URLs.
        add_filter('acf/settings/url', array($this, 'my_acf_settings_url'));
        // (Optional) Hide the ACF admin menu item.
        add_filter('acf/settings/show_admin', array($this, 'my_acf_settings_show_admin'));

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


        $context['site'] = $this;
		$context['main_css'] = $this->loader->MAIN_CSS;
		
        $context['critical'] = str_replace(' ', '', $this->loader->CRITICAL );
        $context['options'] = get_fields('option');
        $context['primary_menu'] = new Timber\Menu('primary');
        $context['ajax_url'] = admin_url('admin-ajax.php');
        $context['top_widget'] = Timber::get_widgets('top_widget');
        return $context;
    }

    private function setup_scripts() {

		add_action( 'enqueue_block_editor_assets', function() {
            wp_enqueue_style( 'main_css', $this->loader->MAIN_CSS , false, '1.0', 'all' );
            wp_enqueue_style( 'theme_critical', get_template_directory_uri() . '/assets/dist/' . $this->loader->CRITICAL , false, '1.0', 'all' );

        } );
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script('theme', $this->loader->MAIN_JS, array(), '1.0.0', true);
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

    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig($twig) {
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter(new Twig_SimpleFilter('shuffle', array($this, 'shuffle_twig')));

        return $twig;
    }

    public function shuffle_twig($array) {
        shuffle($array);
        return $array;

    }
    public function my_acf_settings_url($url) {

        return $this->loader->BP_ACF_URL;
    }
    public function my_acf_settings_show_admin($show_admin) {
        return false;
    }
    public function bp_allowed_block_types($allowed_blocks) {

        $return = [];
        $str = $this->loader->ALLOWED_BLOCKS;
        foreach ($str as $key => $value) {
            $return[] = $value;
        }
        return $return;

    }

    public function bp_color_setup() {

        $matches = $this->loader->bp_get_theme_colors();
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

        // Editor Color Palette
        add_theme_support('editor-color-palette', array(
            $colors,
        ));
    }

    /**
     * ACF Color Palette
     *
     * Add default color palatte to ACF color picker for branding
     * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
     *
     */
    public function bp_acf_color_palette() {

		$matches = $this->loader->bp_get_theme_colors();

        $matches = array_slice($matches[0], 0, 8);
		$matches = json_encode($matches);

        ?>
		<script type="text/javascript">
			(function($) {

				acf.add_filter('color_picker_args', function( args, $field ){
					args.palettes = <?php echo $matches ?>;
					return args;
				});
			})(jQuery);
		</script>
	<?php }
}

new StarterSite();
