<?php

class links_block {
	function __construct() {
		$this->id = "links";
		$this->name = "Links";
		$this->description = __("A custom example block.", "bl");
		$this->loader = new bp_autoload();
		$this->define();
		$this->register();
	}
	
	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf00',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_5afd4a59ebf37',
					'label' => 'Links',
					'name' => 'links',
					'_name' => 'links',
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
					'max' => 4,
					'layout' => 'row',
					'button_label' => 'Add Column',
					'sub_fields' => array(
						array(
							'key' => 'field_5afd4a91ebf38',
							'label' => 'Icon',
							'name' => 'icon',
							'_name' => 'icon',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50%',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'preview_size' => 'full',
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
							'key' => 'field_33fd451c901f2',
							'label' => 'Is icon?',
							'name' => 'is_icon',
							'_name' => 'is_icon',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50%',
								'class' => '',
								'id' => '',
							),
							'message' => '',
							'default_value' => 0,
						),
						array(
							'key' => 'field_5afd4aa6ebf39',
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
							'key' => 'field_5afd4ab3ebf3a',
							'label' => 'Body text',
							'name' => 'body_text',
							'_name' => 'body_text',
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
							'toolbar' => 'basic',
							'media_upload' => 0,
						),
						array(
							'key' => 'field_66fd4aa6ebf39',
							'label' => 'Link text',
							'name' => 'link_text',
							'_name' => 'link_text',
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
							'key' => 'field_7b0fec443f712',
							'label' => 'Link type',
							'name' => 'link_type',
							'_name' => 'link_type',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'page' => 'Page',
								'url' => 'URL',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'vertical',
						),
						array(
							'key' => 'field_7b0fecab3f713',
							'label' => 'Link page',
							'name' => 'link_page',
							'_name' => 'link_page',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_7b0fec443f712',
										'operator' => '==',
										'value' => 'page',
									),
								),
							),
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
						array(
							'key' => 'field_7b0fecd03f714',
							'label' => 'Link url',
							'name' => 'link_url',
							'_name' => 'link_url',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_7b0fec443f712',
										'operator' => '==',
										'value' => 'url',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => 'http://',
						),
					),

				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/' . $this->id,
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

new links_block();
