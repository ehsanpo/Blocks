<?php
// $post =  new TimberPost();
// render('front-page.twig', array(
// 	'post' => new TimberPost()
// ));

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

Timber::render('front-page.twig', $context);
