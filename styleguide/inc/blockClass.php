<?php

class {#name#} extends bp_blocks {
	function __construct() {
		$this->id = {#name#};
		$this->name = __("{#title#}", "bl");
		$this->description = __("{#description#}", "bl");

		$this->register();
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
		$context = parent::get_block_data($block, $content, $is_preview);
		// Render the block.
		Timber::render("blocks/bp-" . $this->id . ".twig", $context);

	}

}

new {#name#}();

