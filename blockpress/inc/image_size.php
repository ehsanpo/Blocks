<?php

add_filter('timmy/sizes', function ($sizes) {
	return array(
		'head' => array(
			'resize' => array(500, 300),
			'srcset' => array(
				array(480),
				2,
			),
			'sizes' => '(min-width: 60em) 100vw, 100vw',
			'name' => 'Head 1400x900',
			'post_types' => array('post', 'page'),
		),
		'body' => array(
			'resize' => array(600, 400, 'center'),
			'srcset' => array(
				2,
			),
			'sizes' => '(min-width: 62rem) 50vw, 100vw',
			'name' => 'Body 370',
			'post_types' => array('post', 'page'),
		),
		'news' => array(
			'resize' => array(600, 400, 'center'),
			'srcset' => array(
				2,
			),
			'sizes' => '(min-width: 62rem) 50vw, 100vw',
			'name' => 'Body 370',
			'post_types' => array('post', 'page'),
		),

	);
});
set_post_thumbnail_size(0, 0);