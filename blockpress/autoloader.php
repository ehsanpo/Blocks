<?php

class bp_autoload {
    public function __construct() {
        $this->ComposerVendors = __DIR__ . '../../../../../vendor/';
        $this->BP_BLOCKS = __DIR__ .'/blocks';
        $this->BP_INCLUDES =  __DIR__ .'/inc';
        $this->BP_ASSETS = __DIR__ . DIRECTORY_SEPARATOR . 'assets/dist/assets.php';
        $this->BP_ACF = __DIR__ . DIRECTORY_SEPARATOR . 'inc/acf/';
		//$this->BP_ACF_URL = get_stylesheet_directory_uri() . '/inc/acf/';
		$this->BP_ACF_URL = get_template_directory_uri().'/inc/acf/';
		$this->ALLOWED_BLOCKS = json_decode(file_get_contents(__DIR__ . '/allowed_blocks.json'));
		$this->CSS_VARIABLES = file_get_contents(__DIR__ . '/assets/sass/base/variables.scss');
		$this->MAIN_CSS = "";
		$this->CRITICAL = "";
		$this->MAIN_JS = "";

    }
    public function setup() {
		$this->load_acf();
		$this->load_inc();
		$this->timber();
		$this->load_blocks();
		$this->load_assets();
		
	}
	private function timber(){

		//start timber
		new Timber\Timber();
		new Timmy\Timmy();

		/**
		 * Sets the directories (inside your theme) to find .twig files
		*/
		Timber::$dirname = array('views');
	}
    private function load_blocks() {
		$blocks = glob($this->BP_BLOCKS . '/*.php');
        foreach ($blocks as $block) {
            require $block;
        }
    }

    private function load_inc() {
		$incs = glob($this->BP_INCLUDES . '/*.php');
        foreach ($incs as $inc) {
            require $inc;
        }
    }

    private function load_acf() {

        require_once $this->BP_ACF . 'acf.php';
    }
    private function load_assets() {

		require $this->BP_ASSETS;
		$this->MAIN_CSS = get_template_directory_uri() . '/assets/dist/' . $main_css;
		$this->CRITICAL = $critical;
		$this->MAIN_JS = $main_js;
		
	}
	public function bp_get_theme_colors() {

		$css = $this->CSS_VARIABLES ;
		$matches = [];
		preg_match_all('/#(?:[0-9a-fA-F]{6})/', $css, $matches);
		return $matches;
	
	}
}
