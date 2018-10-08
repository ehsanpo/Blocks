<?php
/*
 * Template Name: List
 * Description: Full Width Template
 */


$post =  new SitePost();
$list_type = get_field( "list" );
$all_posts  = Timber::get_posts('posttype='.$list_type .'&numberposts=-1');

render('list.twig', array(
	'post' => $post ,
	'all_posts' => $all_posts,
));





