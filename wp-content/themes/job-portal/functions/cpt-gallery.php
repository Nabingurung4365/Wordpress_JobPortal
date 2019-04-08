<?php 
/*=======================================================================*/
// Gallery  Post Type
/*=======================================================================*/
add_action('init', 'register_Gallery');
function register_gallery(){
	$labels = array(
		'name' => _x('Gallery', 'post type general name'),
		'singular_name' => _x('Gallery', 'post type singular name'),
		'add_new' => _x('Add New', 'Gallery'),
		'add_new_item' => __('Gallery'),
		'edit_item' => __('Edit Gallery'),
		'new_item' => __('New Gallery'),
		'view_item' => __('View Gallery'),
		'search_items' => __('Search Gallery'),
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
		//'menu_icon' => get_stylesheet_directory_uri() . '/images/slider-icon.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		//'menu_position' => '',
		'supports' => array('title','thumbnail')
				);
	register_post_type('gallery' , $args);
}
?>