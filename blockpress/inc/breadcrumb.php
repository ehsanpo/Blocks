<?php
function bl_the_breadcrumb() {
	global $post;
	//dont show on search page & single shops
	if (is_search() || is_front_page()) {
		return;
	}
	if ($post && get_post_meta($post->ID, 'hide_breadcrumb', true) == FALSE) {
		echo '<div class="breadcrumbs"><span>' . __('You are here', 'site') . ':</span><ul>';
		if (!is_front_page()) {
			echo '<li><a href="';
			echo get_option('home');
			echo '">';
			echo __('Home', 'site');
			echo '</a></li><li class="separator">›</li>';
			if (is_category() || is_single()) {
				echo '<li>';
				if (is_single()) {
					echo get_post_type($post);
				}
				the_category(' </li><li class="separator">›</li><li> ');
				if (is_single()) {
					echo '</li><li class="separator">›</li><li class="active">';
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				if ($post->post_parent) {
					$anc = get_post_ancestors($post->ID);
					$title = get_the_title();
					foreach ($anc as $ancestor) {
						$output = '<li><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> <li class="separator">›</li>';
					}
					echo $output;
					echo '<li class="active" title="' . $title . '"> ' . $title . '</li>';
				} else {
					echo '<li class="active">' . get_the_title() . '</li>';
				}
			}
		} elseif (is_tag()) {single_tag_title();} elseif (is_day()) {
			echo "<li>Archive for ";
			the_time('F jS, Y');
			echo '</li>';} elseif (is_month()) {
			echo "<li>Archive for ";
			the_time('F, Y');
			echo '</li>';} elseif (is_year()) {
			echo "<li>Archive for ";
			the_time('Y');
			echo '</li>';} elseif (is_author()) {
			echo "<li>Author Archive";
			echo '</li>';} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			echo "<li>Blog Archives";
			echo '</li>';} elseif (is_search()) {
			echo "<li>Search Results";
			echo '</li>';} elseif (is_front_page()) {
			echo "<li> " . __('Home', 'site') . " </li>";
		}
		echo '</ul>';
		echo '</div>';
	}
}