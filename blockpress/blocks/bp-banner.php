<?php

class banner_block {
	function __construct() {
		$this->id = "banner";
		$this->name =  __("Banner", "bl");
		$this->description = __("A custom example block.", "bl");
		$this->loader = new bp_autoload();
		$this->define();
		$this->register();
	}
	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf06',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_7afd3f3a59f88',
					'label' => 'Title',
					'name' => 'title',
					'_name' => 'title',
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
					'readonly' => 0,
					'disabled' => 0,
				),
				array(
					'key' => 'field_5a79b736d8ad1',
					'label' => 'Banners',
					'name' => 'banners',
					'_name' => 'banners',
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
					'min' => '',
					'max' => '',
					'layout' => 'table',
					'button_label' => 'Lägg till rad',
					'sub_fields' => array(
						array(
							'key' => 'field_5a79b747d8ad2',
							'label' => 'bild',
							'name' => 'bild',
							'_name' => 'bild',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'url',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array(
							'key' => 'field_5a79b785d8ad3',
							'label' => 'text',
							'name' => 'text',
							'_name' => 'text',
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
							'readonly' => 0,
							'disabled' => 0,
						),
						array(
							'key' => 'field_5a79b78ad8ad4',
							'label' => 'Link',
							'name' => 'link',
							'name' => 'link',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => array(
							),
							'taxonomy' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
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
			"category" => "formatting",
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

new banner_block();
