<?php

class bp_testimonials_block extends bp_blocks {
	function __construct() {
		$this->id = "testimonials";
		$this->name = "Testimonials";
		$this->description = __("A custom example block.", "bl");

		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadfbb',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_a9ac436aa4400',
					'label' => $this->name . '<img src="' . get_template_directory_uri() . '/assets/img/blocks/' . $this->id . '.png" style="width: 100px;vertical-align: middle;margin-left: 10px;" />',
					'type' => 'accordion',
					'conditional_logic' => 0,
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5bfea3c871521',
					'label' => 'Headline',
					'name' => 'headline',
					'_name' => 'headline',
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
					'key' => 'field_5bfea3ce71522',
					'label' => 'Description',
					'name' => 'description',
					'_name' => 'description',
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
					'key' => 'field_5bfea3e271523',
					'label' => 'Testimonials',
					'name' => 'testimonials',
					'_name' => 'testimonials',
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
							'key' => 'field_5bfea3f971524',
							'label' => 'Image',
							'name' => 'image',
							'_name' => 'image',
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
							'preview_size' => 'body',
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
							'key' => 'field_5bfea42271525',
							'label' => 'Name',
							'name' => 'name',
							'_name' => 'name',
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
							'key' => 'field_5bfea43d71528',
							'label' => 'Description',
							'name' => 'description',
							'_name' => 'description',
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
							'key' => 'field_5bfea4da71529',
							'label' => 'Testimonial',
							'name' => 'testimonial',
							'_name' => 'testimonial',
							'type' => 'textarea',
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
							'maxlength' => '',
							'rows' => '',
							'new_lines' => '',
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
		$context = parent::get_block_data($block, $content,$is_preview);
		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}
}

new bp_testimonials_block();
