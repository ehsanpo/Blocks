<?php

class bp_faq_block extends bp_blocks {
	function __construct() {
		$this->id = "faq";
		$this->name = __("FAQ", "bl");
		$this->description = __("A custom example block.", "bl");
		$this->define();
		$this->register();
	}
	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadfdb',
			'title' => $this->name,
			'fields' => array(
				array(
					'key' => 'field_a4ac436aa4400',
					'label' => $this->name . '<img src="' . get_template_directory_uri() . '/assets/img/blocks/' . $this->id . '.png" style="width: 100px;vertical-align: middle;margin-left: 10px;" />',
					'type' => 'accordion',
					'conditional_logic' => 0,
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
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
		$context = parent::get_block_data($block, $content,$is_preview);
		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new bp_faq_block();
