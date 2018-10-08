<?php

/**
 * Layout Styles
 */
$layout_styles = function ($styles) {
	$styles['Background color'] = array(
		'bg_color_1' => 'Color 1',
		'bg_color_2' => 'Color 2',
		'bg_color_3' => 'Color 3'
	);

	return $styles;
};

add_filter('acf/section/styles/imageAndText-block', $layout_styles);
add_filter('acf/section/styles/LatestPosts', $layout_styles);
add_filter('acf/section/styles/links-block', $layout_styles);
add_filter('acf/section/styles/StandardBlock', $layout_styles);

