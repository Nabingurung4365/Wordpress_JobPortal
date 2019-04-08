<?php 
/*=======================================================================*/
//  Post Type services
/*=======================================================================*/
add_action('init', 'register_services');
function register_services(){
	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('Services', 'post type singular name'),
		'add_new' => _x('Add New', 'Services'),
		'add_new_item' => __('Services'),
		'edit_item' => __('Edit Services'),
		'new_item' => __('New Services'),
		'view_item' => __('View Services'),
		'search_items' => __('Search Services'),
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
		//'menu_icon' => get_stylesheet_directory_uri() . '/images/Services-icon.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		//'menu_position' => '',
		'supports' => array('title','editor', 'thumbnail')
				);
	register_post_type('services' , $args);

}



?>