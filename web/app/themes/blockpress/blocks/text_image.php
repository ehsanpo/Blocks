<?php

class image_text_block {
	function __construct() {
		$this->id = "text-image";
		$this->name = __("Image & Text", "bl");
		$this->description = __("A custom example block.", "bl");
		$this->define();
		$this->register();
	}

	function define() {

		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf02',
			'title' => $this->id,
			'fields' => array(
				array(
					
					'key' => 'field_7afd44d0901f1',
					'label' => 'image',
					'name' => 'image',
					'_name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '33%',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_7afd451c901f4',
					'label' => 'Image on left',
					'name' => 'image_on_left',
					'_name' => 'image_on_left',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '33%',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_5c471ef5a5920',
					'label' => 'Add Padding',
					'name' => 'add_padding',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33%',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'key' => 'field_7afd44ee901f2',
					'label' => 'Headline',
					'name' => 'headline',
					'_name' => 'headline',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
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
					'key' => 'field_7afd4502901f3',
					'label' => 'Body text',
					'name' => 'body_text',
					'_name' => 'body_text',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array(
					'key' => 'field_72a38dd24c498',
					'label' => 'Link',
					'name' => 'add_link',
					'_name' => 'add_link',
					'type' => 'true_false',
					'message' => 'Add link(s) to the block?',
				),
				array(
					'key' => 'field_72a393191488a',
					'label' => 'Links',
					'name' => 'stn_link',
					'_name' => 'stn_link',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_72a38dd24c498',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'min' => 1,
					'max' => '',
					'layout' => 'block',
					'button_label' => 'Add another link',
					'sub_fields' => array (
						array (
							'key' => 'field_72a393731488b',
							'label' => 'Type',
							'name' => 'link_type',
							'_name' => 'link_type',
							'type' => 'radio',
							'required' => 1,
							'choices' => array (
								'page' => 'Page',
								'url' => 'URL',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_72a393a01488c',
							'label' => 'Text',
							'name' => 'link_text',
							'_name' => 'link_text',
							'type' => 'text',
							'required' => 1,
							'wrapper' => array (
								'width' => 50,
							),
						),
						array (
							'key' => 'field_72ffd4e416edb',
							'label' => 'Internal Page',
							'name' => 'link_page',
							'_name' => 'link_page',
							'type' => 'page_link',
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_72a393731488b',
										'operator' => '==',
										'value' => 'page',
									),
								),
							),
							'wrapper' => array (
								'width' => 50,
							),
							'post_type' => array (
								0 => 'page',
								1 => 'post',
							),
							'taxonomy' => array (
							),
							'allow_null' => 0,
							'multiple' => 0,
						),
						array (
							'key' => 'field_72a3b2dc137ce',
							'label' => 'External URL',
							'name' => 'link_url',
							'_name' => 'link_url',
							'type' => 'url',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_72a393731488b',
										'operator' => '==',
										'value' => 'url',
									),
								),
							),
							'wrapper' => array (
								'width' => 50,
							),
							'placeholder' => 'http://',
							'default_value' => 'http://',
						),
					),
				)

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

			$matches = bp_get_theme_colors();

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
		Timber::render("blocks/" . $this->id . ".twig", $context);

	}

}


new image_text_block();
