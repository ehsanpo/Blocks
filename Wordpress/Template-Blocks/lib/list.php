<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5bb4ded55de91',
	'title' => 'List',
	'fields' => array(
		array(
			'key' => 'field_5bb4dedb78333',
			'label' => 'List',
			'name' => 'list',
			'type' => 'posttype_select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'post',
			'allow_null' => 0,
			'multiple' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'list-template.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array('the_content'),
	'active' => 1,
	'description' => '',
));

endif;
