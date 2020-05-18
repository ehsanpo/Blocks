<?php
class bp_blocks {

	function __construct() {
		// $this->id = 'hero-slider';
		// $this->name = 'Hero Slider';
		// $this->description = __("A custom example block.", "bl");

		// $this->define();
		// $this->register();
	}
	function bp_get_theme_colors(){
		$loader = new bp_autoload();
		return $loader->bp_get_theme_colors();
	}
	function get_block_data($block, $content = "", $is_preview = false){

		$context = Timber::get_context();

		$block['name'] = str_replace("acf/", "bp-", $block['name']);
		// Store block values.
		$context["block"] = $block;

		// Store field values.
		$context["fields"] = get_fields();

		// Store $is_preview value.
		$context["is_preview"] = $is_preview;

		//fix color and animation

		//add custom class

		$bp_color_class = "";
		if ($context["fields"]['block_color']) {

			$bp_acf_color_picker_values = $context["fields"]['block_color'];

		// Set array of color classes (for block editor) and hex codes (from ACF)

			$matches = $this->bp_get_theme_colors();

			$bp_block_colors = [
		// Change these to match your color class (gutenberg) and hex codes (acf)
				"bg-color-1" => $matches[0][0],
				"bg-color-2" => $matches[0][1],
				"bg-color-3" => $matches[0][2],
			];

		// Loop over colors array and set proper class if background color selection matches value
			foreach ($bp_block_colors as $key => $value) {
				if ($bp_acf_color_picker_values == $value) {
					$bp_color_class = $key;
				}
			}
		}

		if (isset($context["block"]['className'])) {
			$context["block"]['className'] .= ' ' . $bp_color_class;
		} else {
			$context["block"]['className'] = ' ' . $bp_color_class;
		}
		return $context;
	}

}

new bp_blocks();
