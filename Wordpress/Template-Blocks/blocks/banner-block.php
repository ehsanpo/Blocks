<?php

class bannerBlock extends TwigBlock {
	function __construct() {
		$this->id = "banner-block";
		$this->name = "banner Block";

		parent::__construct();
	}

	function define(&$fields) {
		$fields[] = array(
			'key' => 'field_5a79b736d8ad1',
			'label' => 'Banners',
			'name' => 'banners',
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
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Lägg till rad',
			'sub_fields' => array (
				array (
					'key' => 'field_5a79b747d8ad2',
					'label' => 'bild',
					'name' => 'bild',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array (
					'key' => 'field_5a79b785d8ad3',
					'label' => 'text',
					'name' => 'text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
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
				array (
					'key' => 'field_5a79b78ad8ad4',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'page_link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
			),
		
		);


		
	}

	function get_template_data($data) {
		return $data;
	}
}

new bannerBlock();

