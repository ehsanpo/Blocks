<?php
class text_block extends TwigBlock {
	function __construct() {
		$this->id = "text-block";
		$this->name = "Text Block";

		parent::__construct();
	}

	function define(&$fields) {
		$fields[] = array(
			'key' => 'field_66fd451c901f4',
			'label' => 'Small box',
			'name' => 'small_box',
			'_name' => 'small_box',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		);
		$fields[] = array(
			'key' => 'field_5afd4653014e6',
			'label' => 'stn_block',
			'name' => 'stn_block',
			'_name' => 'stn_block',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => 4,
			'layout' => 'table',
			'button_label' => 'Add column',
			'sub_fields' => array (
				array (
					'key' => 'field_5afd4671014e7',
					'label' => 'Body text',
					'name' => 'body_text',
					'_name' => 'body_text',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
				),
			),
		);
		
	}

	function get_template_data($data) {
		return $data;
	}
}

new text_block();

