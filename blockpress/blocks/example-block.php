<?php 

// class example_block{

// 	function __construct() {
// 		$this->id = 'example_block';
// 		$this->name = __( 'Example Block', 'bl' );

// 		//parent::__construct();
// 		$this->define();
// 		$this->register();
// 	}
// 	function define() {

// acf_add_local_field_group(array(
// 	'key' => 'group_5d0231c54ef32',
// 	'title' => 'Quiz builder',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5d02320e29cc3',
// 			'label' => 'questions',
// 			'name' => 'questions',
// 			'type' => 'repeater',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'collapsed' => '',
// 			'min' => 0,
// 			'max' => 0,
// 			'layout' => 'row',
// 			'button_label' => 'Add question',
// 			'sub_fields' => array(
// 				array(
// 					'key' => 'field_5d02323529cc4',
// 					'label' => 'Questions type',
// 					'name' => 'questions_type',
// 					'type' => 'radio',
// 					'instructions' => '',
// 					'required' => 1,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'choices' => array(
// 						'one' => 'One right',
// 						'multi' => 'Multichoice',
// 						'sort' => 'Sort',
// 					),
// 					'allow_null' => 0,
// 					'other_choice' => 0,
// 					'default_value' => '',
// 					'layout' => 'vertical',
// 					'return_format' => 'value',
// 					'save_other_choice' => 0,
// 				),
// 				array(
// 					'key' => 'field_5d0232a829cc5',
// 					'label' => 'Question',
// 					'name' => 'question',
// 					'type' => 'text',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'prepend' => '',
// 					'append' => '',
// 					'maxlength' => '',
// 				),
// 				array(
// 					'key' => 'field_5d0232c329cc6',
// 					'label' => 'One right answers',
// 					'name' => 'one_answers',
// 					'type' => 'repeater',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5d02323529cc4',
// 								'operator' => '==',
// 								'value' => 'one',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '100',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'collapsed' => '',
// 					'min' => 0,
// 					'max' => 0,
// 					'layout' => 'table',
// 					'button_label' => '',
// 					'sub_fields' => array(
// 						array(
// 							'key' => 'field_5d02331929cc7',
// 							'label' => 'Text',
// 							'name' => 'text',
// 							'type' => 'text',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'default_value' => '',
// 							'placeholder' => '',
// 							'prepend' => '',
// 							'append' => '',
// 							'maxlength' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02333329cc8',
// 							'label' => 'image',
// 							'name' => 'image',
// 							'type' => 'image',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'return_format' => 'id',
// 							'preview_size' => 'full',
// 							'library' => 'all',
// 							'min_width' => '',
// 							'min_height' => '',
// 							'min_size' => '',
// 							'max_width' => '',
// 							'max_height' => '',
// 							'max_size' => '',
// 							'mime_types' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02333829cc9',
// 							'label' => 'Is right?',
// 							'name' => 'is_right',
// 							'type' => 'true_false',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'message' => '',
// 							'default_value' => 0,
// 							'ui' => 0,
// 							'ui_on_text' => '',
// 							'ui_off_text' => '',
// 						),
// 					),
// 				),
// 				array(
// 					'key' => 'field_5d02336529cca',
// 					'label' => 'Multichoice answers',
// 					'name' => 'multichoice_answers',
// 					'type' => 'repeater',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5d02323529cc4',
// 								'operator' => '==',
// 								'value' => 'multi',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '100',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'collapsed' => '',
// 					'min' => 0,
// 					'max' => 0,
// 					'layout' => 'table',
// 					'button_label' => '',
// 					'sub_fields' => array(
// 						array(
// 							'key' => 'field_5d02337e29ccb',
// 							'label' => 'Text',
// 							'name' => 'text',
// 							'type' => 'text',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'default_value' => '',
// 							'placeholder' => '',
// 							'prepend' => '',
// 							'append' => '',
// 							'maxlength' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02338529ccc',
// 							'label' => 'Image',
// 							'name' => 'image',
// 							'type' => 'image',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'return_format' => 'id',
// 							'preview_size' => 'full',
// 							'library' => 'all',
// 							'min_width' => '',
// 							'min_height' => '',
// 							'min_size' => '',
// 							'max_width' => '',
// 							'max_height' => '',
// 							'max_size' => '',
// 							'mime_types' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02338a29ccd',
// 							'label' => 'Is right',
// 							'name' => 'is_right',
// 							'type' => 'true_false',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'message' => '',
// 							'default_value' => 0,
// 							'ui' => 0,
// 							'ui_on_text' => '',
// 							'ui_off_text' => '',
// 						),
// 					),
// 				),
// 				array(
// 					'key' => 'field_5d02345b29cd2',
// 					'label' => 'Sort answers Type',
// 					'name' => 'sort_answers_type',
// 					'type' => 'radio',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5d02323529cc4',
// 								'operator' => '==',
// 								'value' => 'sort',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'choices' => array(
// 						'normal' => 'Normal',
// 						'grid' => 'Grid',
// 					),
// 					'allow_null' => 0,
// 					'other_choice' => 0,
// 					'default_value' => '',
// 					'layout' => 'vertical',
// 					'return_format' => 'value',
// 					'save_other_choice' => 0,
// 				),
// 				array(
// 					'key' => 'field_5d0233d029cce',
// 					'label' => 'Sort answers',
// 					'name' => 'sort_answers',
// 					'type' => 'repeater',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => array(
// 						array(
// 							array(
// 								'field' => 'field_5d02323529cc4',
// 								'operator' => '==',
// 								'value' => 'sort',
// 							),
// 						),
// 					),
// 					'wrapper' => array(
// 						'width' => '',
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'collapsed' => '',
// 					'min' => 0,
// 					'max' => 0,
// 					'layout' => 'table',
// 					'button_label' => '',
// 					'sub_fields' => array(
// 						array(
// 							'key' => 'field_5d02341d29ccf',
// 							'label' => 'Text',
// 							'name' => 'text',
// 							'type' => 'text',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'default_value' => '',
// 							'placeholder' => '',
// 							'prepend' => '',
// 							'append' => '',
// 							'maxlength' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02343529cd0',
// 							'label' => 'Image',
// 							'name' => 'image',
// 							'type' => 'image',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'return_format' => 'array',
// 							'preview_size' => 'full',
// 							'library' => 'all',
// 							'min_width' => '',
// 							'min_height' => '',
// 							'min_size' => '',
// 							'max_width' => '',
// 							'max_height' => '',
// 							'max_size' => '',
// 							'mime_types' => '',
// 						),
// 						array(
// 							'key' => 'field_5d02343e29cd1',
// 							'label' => 'Positions',
// 							'name' => 'positions',
// 							'type' => 'number',
// 							'instructions' => '',
// 							'required' => 0,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 								'width' => '',
// 								'class' => '',
// 								'id' => '',
// 							),
// 							'default_value' => '',
// 							'placeholder' => '',
// 							'prepend' => '',
// 							'append' => '',
// 							'min' => '',
// 							'max' => '',
// 							'step' => '',
// 						),
// 					),
// 				),
// 			),
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'block',
// 				'operator' => '==',
// 				'value' => 'acf/quiz-builder',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => array(
// 		0 => 'permalink',
// 		1 => 'the_content',
// 		2 => 'excerpt',
// 		3 => 'discussion',
// 		4 => 'comments',
// 		5 => 'revisions',
// 		6 => 'slug',
// 		7 => 'author',
// 		8 => 'format',
// 		9 => 'page_attributes',
// 		10 => 'featured_image',
// 		11 => 'categories',
// 		12 => 'tags',
// 		13 => 'send-trackbacks',
// 	),
// 	'active' => true,
// 	'description' => '',
// ));

// 	}
// 	function register(){

// 		// Register a new block.
// 	    acf_register_block( array(
// 	        'name'            => $this->id,
// 	        'title'           => $this->name,
// 	        'description'     => __( 'A custom example block.', 'your-text-domain' ),
// 	        'render_callback' => [$this, 'render'], //($this, 'nebula_get_latest_post')
// 	        'category'          => 'formatting',
// 	        'icon'            => 'admin-comments',
// 	    ) );

// 	}
// 	function get_template_data() {

// 		return $data;
// 	}
// 	function render( $block, $content = '', $is_preview = false) {
// 	    $context = Timber::get_context();
// 	    // Store block values.
// 	    $context['block'] = $block;

// 	    // Store field values.
// 	    $context['fields'] = get_fields();

// 	    // Store $is_preview value.
// 	    $context['is_preview'] = $is_preview;

// 	    // Render the block.
// 	    Timber::render( 'blocks/example-block.twig', $context );
// 	}

// }

// new example_block();


