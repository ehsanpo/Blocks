<?php
class bp_post_filter_block extends bp_blocks {
	function __construct() {
		$this->id = "filter-post";
		$this->name = "Post Filter";
		$this->description = __("A custom example block.", "bl");

		$this->post_type = array(
			0 => 'post', // <==== Edit For Custom Post
			1 => 'page',
		);
		$this->tax_type = "category"; // <==== Edit For Custom Taxonomy
		$this->tax_order = "term_order"; // <==== Edit For categoty list order

		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf09',
			'title' => $this->name,
			'fields' => array(

				array(
					'key' => 'field_88a38dd24c477',
					'label' => 'Show filters',
					'name' => 'show_filters',
					'_name' => 'show_filters',
					'type' => 'true_false',
					'default_value' => 0,
				),
				array(
					'key' => 'field_5af2da467118d',
					'label' => 'Cases',
					'name' => 'cases',
					'_name' => 'cases',
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
					'button_label' => 'Add Case',
					'sub_fields' => array(
						array(
							'key' => 'field_5af2da507118e',
							'label' => 'Project',
							'name' => 'project',
							'_name' => 'project',
							'type' => 'post_object',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'post_type' => $this->post_type,
							'taxonomy' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'return_format' => 'ID',
							'ui' => 1,
						),
						array(
							'key' => 'field_5af2da7e7118f',
							'label' => 'Attribute',
							'name' => 'attribute',
							'_name' => 'attribute',
							'type' => 'text',
							'instructions' => '',
							'return_format' => 'value',
							'default_value' => '',
							'layout' => 'vertical',
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
	function get_template_data($data) {

		$terms = get_terms(array(
			"taxonomy" => $this->tax_type,
			"orderby" => $this->tax_order,
		));

		$posts = $data['cases'];
		for ($i = 0; $i < count($posts); $i++) {
			$post = new TimberPost($posts[$i]['project']);
			$posts[$i]['project'] = $post;
			$posts[$i]['project']->cats = str_replace(array("category-", 'status-publish', 'has-post-thumbnail'), "", $posts[$i]['project']->class);

		}

		$data['cases'] = $posts;
		$data['terms'] = $terms;

		return $data;
	}
	function render($block, $content = "", $is_preview = false) {
		$context = parent::get_block_data($block, $content, $is_preview);
		$context['fields'] = $this->get_template_data($context['fields']);
		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new bp_post_filter_block;
