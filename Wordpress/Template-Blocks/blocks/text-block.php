<?php

class textBlock extends TwigBlock {
	function __construct() {
		$this->id = "text-block";
		$this->name = "text Block";

		parent::__construct();
	}

	function define(&$fields) {
		$fields[] = array(
			'key' => 'field_5a79a74bcc432',
			'label' => 'Headline',
			'name' => 'text_headline',
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
		);
		$fields[] = array(
			'key' => 'field_5a79a754cc433',
			'label' => 'Body text',
			'name' => 'text_body_text',
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
			'media_upload' => 1,
		);
		$fields[] = array(
			'key' => 'field_5a79a762cc434',
			'label' => 'Link text',
			'name' => 'text_link_text',
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
		);
		$fields[] = array(
			'key' => 'field_5a79a773cc435',
			'label' => 'Link',
			'name' => 'text_link',
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
		);

		
	}

	function get_template_data($data) {
		return $data;
	}
}

new textBlock();

