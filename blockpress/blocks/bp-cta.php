<?php

class bp_cta_block extends bp_blocks {
	function __construct() {
		$this->id = "cta";
		$this->name = "CTA";
		$this->description = __("A custom example block.", "bl");
		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadfcc',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_a3ac436aa4400',
					'label' => $this->name . '<img src="' . get_template_directory_uri() . '/assets/img/blocks/' . $this->id . '.png" style="width: 100px;vertical-align: middle;margin-left: 10px;" />',
					'type' => 'accordion',
					'conditional_logic' => 0,
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5afd44d0901f1',
					'label' => 'image',
					'name' => 'image',
					'_name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50%',
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
					'key' => 'field_5aa7e7d76d158',
					'label' => 'Headline',
					'name' => 'cta_headline',
					'_name' => 'cta_headline',
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
					'key' => 'field_5aa7e82e6d159',
					'label' => 'Sub headline',
					'name' => 'cta_subheadline',
					'name' => 'cta_subheadline',
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
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array(
					'key' => 'field_55a393191488b',
					'label' => 'Links',
					'name' => 'stn_link',
					'_name' => 'stn_link',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'min' => 1,
					'max' => '',
					'layout' => 'block',
					'button_label' => 'Add another link',
					'sub_fields' => array(
						array(
							'key' => 'field_69a393731488b',
							'label' => 'Type',
							'name' => 'link_type',
							'_name' => 'link_type',
							'type' => 'radio',
							'required' => 1,
							'choices' => array(
								'page' => 'Page',
								'url' => 'URL',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'layout' => 'horizontal',
						),
						array(
							'key' => 'field_69a393a01488c',
							'label' => 'Text',
							'name' => 'link_text',
							'_name' => 'link_text',
							'type' => 'text',
							'required' => 1,
							'wrapper' => array(
								'width' => 50,
							),
						),
						array(
							'key' => 'field_69ffd4e416edb',
							'label' => 'Internal Page',
							'name' => 'link_page',
							'_name' => 'link_page',
							'type' => 'page_link',
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_69a393731488b',
										'operator' => '==',
										'value' => 'page',
									),
								),
							),
							'wrapper' => array(
								'width' => 50,
							),
							'post_type' => array(
								0 => 'page',
								1 => 'post',
							),
							'taxonomy' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
						),
						array(
							'key' => 'field_69a3b2dc137ce',
							'label' => 'External URL',
							'name' => 'link_url',
							'_name' => 'link_url',
							'type' => 'url',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_69a393731488b',
										'operator' => '==',
										'value' => 'url',
									),
								),
							),
							'wrapper' => array(
								'width' => 50,
							),
							'placeholder' => 'http://',
							'default_value' => 'http://',
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

new bp_cta_block();
