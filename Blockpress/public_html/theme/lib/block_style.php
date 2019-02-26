<?php

/**
 * Layout Styles
 */
$layout_styles = function ($styles) {
	$styles['Background color'] = array(
		'bg-color-1' => 'Color 1',
		'bg-color-2' => 'Color 2',
		'bg-color-3' => 'Color 3'
	);

	return $styles;
};

$layout_animation= function ($styles) {

	$styles['animation'] = array(
		'fade-up' => 'fade-up',
		'slide-up' => 'slide-up',
		'zoom-in-up' => 'zoom-in-up'
	);

	return $styles;
};

add_filter('acf/section/styles/content-text_image-boxed', $layout_animation);