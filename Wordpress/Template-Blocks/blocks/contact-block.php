<?php

class contactBlock extends TwigBlock {
	function __construct() {
		$this->id = "contact-block";
		$this->name = "contact Block";

		parent::__construct();
	}

	function define(&$fields) {
		$fields[] = array(
			'key' => 'field_5a79c6596c58f',
			'label' => 'Contact block',
			'name' => 'contact_block',
			'type' => 'wysiwyg',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 0,
		);

		$fields[] = array(
			'key' => 'field_5a79c68c3be6d',
			'label' => 'Google Maps',
			'name' => 'google_maps',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		);
		
		$fields[] = array(
			'key' => 'field_5a7c304c191d1',
			'label' => 'Contact background',
			'name' => 'contact_background',
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
		);
		
	}

	function get_template_data($data) {
		return $data;
	}
}

new contactBlock();

