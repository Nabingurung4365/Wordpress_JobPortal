<?php 
/*=======================================================================*/
//  Job Type Job Post
/*=======================================================================*/
add_action('init', 'register_job');
function register_job(){
	$labels = array(
		'name' => _x('Job Post', 'post type general name'),

		'add_new' => _x('Add New', 'Job Post'),
		'add_new_item' => __('Job Post'),
		'edit_item' => __('Edit Job Post'),
		'new_item' => __('New Job Post'),
		'view_item' => __('View Job Post'),
		'search_items' => __('Search Job Post'),
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
		//'Job Post_icon' => get_stylesheet_directory_uri() . '/images/slider-icon.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		//'Job Post_position' => '',
		'supports' => array('title','thumbnail')
				);
	register_post_type('job' , $args);

$object_type=array("job");
	$labels = array(
		'name' => _x( 'Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Category' ),
		'all_items' => __( 'All Category' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ), 
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
		'Job Post_name' => __( 'Category' ),
	);
	$args=array(
		"hierarchical" => true,
		"labels" => $labels,
		"show_ui" => true,
		"query_var" => true
		
	);
	register_taxonomy('jobcat', $object_type, $args);

	
}
?>