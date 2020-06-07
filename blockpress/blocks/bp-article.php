<?php

class bp_article_block extends bp_blocks {
	function __construct() {
		$this->id = 'article';
		$this->name = __("Article List", "bl");
		$this->description = __("A custom example block.", "bl");

		$this->define();
		$this->register();
	}
	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf11',
			'title' => $this->id,
			'fields' => array(
				array(
					'key' => 'field_a1ac436aa4400',
					'label' => $this->name . '<img src="' . get_template_directory_uri() . '/assets/img/blocks/' . $this->id . '.png" style="width: 100px;vertical-align: middle;margin-left: 10px;" />',
					'type' => 'accordion',
					'conditional_logic' => 0,
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
				array(
					'key' => 'field_f30b6b21ddc7f',
					'label' => 'Show',
					'name' => 'show',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => 33,
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'last' => 'Latest news',
						'select' => 'Selected news',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'late',
					'layout' => 'horizontal',
				),
				array(
					'key' => 'field_88e6e8c91c0cd',
					'label' => 'Post list',
					'name' => 'post_list',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'choices' => $this->get_post_types(),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'allow_null' => 0,
					'multiple' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,

				),
				array(
					'key' => 'field_abde22aeb2eb9',
					'label' => 'How many news to show',
					'name' => 'news_to_show',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => 33,
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						2 => 2,
						3 => 3,
						4 => 4,
						-1 => 'All',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 3,
					'layout' => 'horizontal',
				),
				array(
					'key' => 'field_9d239fc23c35a',
					'label' => 'Selected news list',
					'name' => 'selected_news_list',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_f30b6b21ddc7f',
								'operator' => '==',
								'value' => 'select',
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
					'multiple' => 1,
					'return_format' => 'object',
					'ui' => 1,
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
	function get_template_data($data) {

		$data['all_posts'] = Timber::get_posts('post_type=' . $data['post_list'] . '&numberposts=' . $data['news_to_show']);
		return $data;
	}
	function get_post_types() {

		$post_types = get_post_types(array('public' => true), 'objects');
		$post_type_array = [];

		foreach ($post_types as $obj) {
			if ($obj->name !== 'attachment') {
				$post_type_array[$obj->name] = $obj->label;
			}
		}

		return ($post_type_array);

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

		// $content
		$context = parent::get_block_data($block, $content, $is_preview);
		$context['fields'] = $this->get_template_data($context['fields']);

		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new bp_article_block();
