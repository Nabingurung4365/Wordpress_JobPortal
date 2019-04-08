<?php 
/*=======================================================================*/
//  Post Type rooms
/*=======================================================================*/
add_action('init', 'register_rooms');
function register_rooms(){
	$labels = array(
		'name' => _x('ROOMS', 'post type general name'),
		'singular_name' => _x('Rooms', 'post type singular name'),
		'add_new' => _x('Add New', 'Rooms'),
		'add_new_item' => __('LATEST UPCOMING Rooms'),
		'edit_item' => __('Edit Rooms'),
		'new_item' => __('New Rooms'),
		'view_item' => __('View Rooms'),
		'search_items' => __('Search Rooms'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''

					);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		//'Rooms_icon' => get_stylesheet_directory_uri() . '/images/slider-icon.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		//'Rooms_position' => '',
		'supports' => array('title','editor','thumbnail')
				);
	register_post_type('rooms' , $args);


}
?>