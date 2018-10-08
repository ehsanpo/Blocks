<?php 
	// 
	// Custom Type Example
	// 
function bl_custom_post_register() {   

    $labels = array( 
        'name' => _x('Handlare', 'post type general name'), 
        'singular_name' => _x('Handlare Item', 'post type singular name'), 
    );   

    $args = array( 
        'labels' => $labels, 
        'public' => true, 
        'publicly_queryable' => true, 
        'show_ui' => true, 
        'query_var' => true, 
        'rewrite' => array( 'slug' => 'work', 'with_front'=> false ), 
        'capability_type' => 'post', 
        'hierarchical' => true,
        'has_archive' => true,  
        'menu_position' => null, 
        'supports' => array('title','editor','thumbnail','revisions') 
    ); 

	//register_post_type( 'chapter', $args );
}