<?php

class faq_block {
	function __construct() {
		$this->id = "faq";
		$this->name = __("FAQ", "bl");
		$this->description = __("A custom example block.", "bl");
		$this->loader = new bp_autoload();
		$this->define();
		$this->register();
	}
	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadfdb',
			'title' => $this->name,
			'fields' => array(
				array(
					'key' => 'field_5d19beece2dcc',
					'label' => 'Questions',
					'name' => 'questions',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5d19bf58e2dcd',
							'label' => 'Question',
							'name' => 'question',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5d19bf84e2dce',
							'label' => 'Answer',
							'name' => 'answer',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/'. $this->id,
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));

	}
	function register() {

// Register a new block.
		acf_register_block(array(
			"name" => $this->id,
			"title" => $this->name,
			'mode' => 'edit',
			"description" => $this->description,
			"render_callback" => [$this, "render"],
			"category" => "common",
			"icon" => "admin-comments",
			"align" => "wide",
			"supports" => array(
				'align' => ['wide', 'full'],
			),
		));

	}
	function render($block, $content = "", $is_preview = false) {
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

			$matches = $this->loader->bp_get_theme_colors();

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

// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new faq_block();