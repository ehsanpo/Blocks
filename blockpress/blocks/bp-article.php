<?php

class article_block {
	function __construct() {
		$this->id = 'article';
		$this->name = __("Article List", "bl");
		$this->description = __("A custom example block.", "bl");
		$this->loader = new bp_autoload();
		$this->define();
		$this->register();
	}

	function define() {
		acf_add_local_field_group(array(
			'key' => 'group_5d19bedbadf11',
			'title' => $this->id,
			'fields' => array(
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
					'type' => 'posttype_select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
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
			$context["fields"] = $this->get_template_data($context["fields"]);
	
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
		function get_template_data($data) {
			return array(
				'posts' => Timber::get_posts('post_type=' . $data['post_list'] . '&numberposts=' . $data['news_to_show']),
				'data' => $data,
			);
		}
}

new article_block();
