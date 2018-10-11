<?php
/*
 * Template Name: AllEvent list
 * Description: Full Width Template
 */

$all_posts = Timber::get_posts('post_type=event&posts_per_page=1000');


render('list.twig', array(
	'post' => new SitePost(),
	'all_posts' => $all_posts,
));





