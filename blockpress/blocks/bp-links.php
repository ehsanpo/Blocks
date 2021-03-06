<?php

class bp_links_block extends bp_blocks{
	function __construct() {
		$this->id = "links";
		$this->name = "Links";
		$this->description = __("A custom example block.", "bl");

		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_4d19bedbadf00',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_a7ac436aa4400',
					'label' => $this->name . '<img src="' . get_template_directory_uri() . '/assets/img/blocks/' . $this->id . '.png" style="width: 100px;vertical-align: middle;margin-left: 10px;" />',
					'type' => 'accordion',
					'conditional_logic' => 0,
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
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
		$context = parent::get_block_data($block, $content,$is_preview);

		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new bp_links_block();
