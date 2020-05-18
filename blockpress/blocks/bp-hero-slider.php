<?php

class bp_image_slider_block extends bp_blocks {
	function __construct() {
		$this->id = 'hero-slider';
		$this->name = 'Hero Slider';
		$this->description = __("A custom example block.", "bl");
		$this->loader = new bp_autoload();
		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadfc1',
			'title' => $this->id,
			'fields' => array(

				array(
					'key' => 'field_5bc732545afac',
					'label' => 'slides',
					'name' => 'slides',
					'_name' => 'slides',
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
					'layout' => 'row',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5bc72fbd99e27',
							'label' => 'Link',
							'name' => 'link',
							'_name' => 'link',
							'type' => 'page_link',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'post_type' => '',
							'taxonomy' => '',
							'allow_null' => 0,
							'allow_archives' => 1,
							'multiple' => 0,
						),
						array(
							'key' => 'field_5bc72ea599e24',
							'label' => 'image',
							'name' => 'image',
							'_name' => 'image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'head',
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
							'key' => 'field_5bc72ebc99e25',
							'label' => 'Headline',
							'name' => 'headline',
							'_name' => 'headline',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
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
		$context = parent::get_block_data($block, $content, $is_preview);
		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}
}

new bp_image_slider_block();
