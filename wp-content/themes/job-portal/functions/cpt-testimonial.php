<?php 
/*=======================================================================*/
// testimonial  Post Type
/*=======================================================================*/
add_action('init', 'register_testimonial');
function register_testimonial(){
	$labels = array(
		'name' => _x('Testimonial', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add New', 'Testimonial'),
		'add_new_item' => __('Testimonial'),
		'edit_item' => __('Edit Testimonial'),
		'new_item' => __('New Testimonial'),
		'view_item' => __('View Testimonial'),
		'search_items' => __('Search Testimonial'),
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
		'supports' => array('title', 'editor','thumbnail')
				);
	register_post_type('testimonial' , $args);
}
?>