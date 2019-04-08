<?php
defined( 'ABSPATH' ) || die();

require_once( WL_JP_PLUGIN_DIR_PATH . 'includes/WL_JP_Helper.php' );

class WL_JP_Job_Front {
	/**
	 * Register job post type
	 * @return void
	 */
	public static function register_job_post_type() {
		$labels = array(
			'name'                  => _x( 'Jobs', 'Post Type General Name', WL_JP_DOMAIN ),
			'singular_name'         => _x( 'Job', 'Post Type Singular Name', WL_JP_DOMAIN ),
			'menu_name'             => __( 'Job Portal', WL_JP_DOMAIN ),
			'name_admin_bar'        => __( 'Job', WL_JP_DOMAIN ),
			'archives'              => __( 'Job Archives', WL_JP_DOMAIN ),
			'attributes'            => __( 'Job Attributes', WL_JP_DOMAIN ),
			'all_items'             => __( 'All Jobs', WL_JP_DOMAIN ),
			'add_new_item'          => __( 'Add New Job', WL_JP_DOMAIN ),
			'add_new'               => __( 'Add New', WL_JP_DOMAIN ),
			'new_item'              => __( 'New Job', WL_JP_DOMAIN ),
			'edit_item'             => __( 'Edit Job', WL_JP_DOMAIN ),
			'update_item'           => __( 'Update Job', WL_JP_DOMAIN ),
			'view_item'             => __( 'View Job', WL_JP_DOMAIN ),
			'view_items'            => __( 'View Jobs', WL_JP_DOMAIN ),
			'search_items'          => __( 'Search Job', WL_JP_DOMAIN ),
			'not_found'             => __( 'Not found', WL_JP_DOMAIN ),
			'not_found_in_trash'    => __( 'Not found in Trash', WL_JP_DOMAIN ),
			'items_list'            => __( 'Job list', WL_JP_DOMAIN ),
			'items_list_navigation' => __( 'Job list navigation', WL_JP_DOMAIN ),
			'filter_items_list'     => __( 'Filter Job list', WL_JP_DOMAIN ),
		);
		$args = array(
			'label'                 => __( 'Job', WL_JP_DOMAIN ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'taxonomies'            => array( 'job_type', 'industry', 'department' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => false,
	        'menu_icon'             => 'dashicons-megaphone',
			'menu_position'         => 26,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite'               => array( 'slug' => 'job' ),
		);
		register_post_type( 'job', $args );
	}

	/**
	 * Register job_type taxonomy
	 * @return void
	 */
	public static function register_job_type_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Job Types', 'Taxonomy General Name', WL_JP_DOMAIN ),
			'singular_name'              => _x( 'Job Type', 'Taxonomy Singular Name', WL_JP_DOMAIN ),
			'menu_name'                  => __( 'Job Types', WL_JP_DOMAIN ),
			'all_items'                  => __( 'All Job Types', WL_JP_DOMAIN ),
			'parent_item'                => __( 'Parent Job Type', WL_JP_DOMAIN ),
			'parent_item_colon'          => __( 'Parent Job Type:', WL_JP_DOMAIN ),
			'new_item_name'              => __( 'New Job Type', WL_JP_DOMAIN ),
			'add_new_item'               => __( 'Add New Job Type', WL_JP_DOMAIN ),
			'edit_item'                  => __( 'Edit Job Type', WL_JP_DOMAIN ),
			'update_item'                => __( 'Update Job Type', WL_JP_DOMAIN ),
			'view_item'                  => __( 'View Job Type', WL_JP_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate job types with commas', WL_JP_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove job types', WL_JP_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used', WL_JP_DOMAIN ),
			'popular_items'              => __( 'Popular Job Types', WL_JP_DOMAIN ),
			'search_items'               => __( 'Search Job Types', WL_JP_DOMAIN ),
			'not_found'                  => __( 'Not Found', WL_JP_DOMAIN ),
			'no_terms'                   => __( 'No Job Types', WL_JP_DOMAIN ),
			'items_list'                 => __( 'Job Types list', WL_JP_DOMAIN ),
			'items_list_navigation'      => __( 'Job Types list navigation', WL_JP_DOMAIN ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => 'job_type' ),
		);
		register_taxonomy( 'job_type', array( 'job' ), $args );
	}

	/**
	 * Register industry taxonomy
	 * @return void
	 */
	public static function register_industry_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Industries', 'Taxonomy General Name', WL_JP_DOMAIN ),
			'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', WL_JP_DOMAIN ),
			'menu_name'                  => __( 'Industries', WL_JP_DOMAIN ),
			'all_items'                  => __( 'All Industries', WL_JP_DOMAIN ),
			'parent_item'                => __( 'Parent Industry', WL_JP_DOMAIN ),
			'parent_item_colon'          => __( 'Parent Industry:', WL_JP_DOMAIN ),
			'new_item_name'              => __( 'New Industry', WL_JP_DOMAIN ),
			'add_new_item'               => __( 'Add New Industry', WL_JP_DOMAIN ),
			'edit_item'                  => __( 'Edit Industry', WL_JP_DOMAIN ),
			'update_item'                => __( 'Update Industry', WL_JP_DOMAIN ),
			'view_item'                  => __( 'View Industry', WL_JP_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate industries with commas', WL_JP_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove industries', WL_JP_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used', WL_JP_DOMAIN ),
			'popular_items'              => __( 'Popular Industries', WL_JP_DOMAIN ),
			'search_items'               => __( 'Search Industries', WL_JP_DOMAIN ),
			'not_found'                  => __( 'Not Found', WL_JP_DOMAIN ),
			'no_terms'                   => __( 'No Industries', WL_JP_DOMAIN ),
			'items_list'                 => __( 'Industries list', WL_JP_DOMAIN ),
			'items_list_navigation'      => __( 'Industries list navigation', WL_JP_DOMAIN ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => 'industry' ),
		);
		register_taxonomy( 'industry', array( 'job' ), $args );
	}

	/**
	 * Register department taxonomy
	 * @return void
	 */
	public static function register_department_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Departments', 'Taxonomy General Name', WL_JP_DOMAIN ),
			'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', WL_JP_DOMAIN ),
			'menu_name'                  => __( 'Departments', WL_JP_DOMAIN ),
			'all_items'                  => __( 'All Departments', WL_JP_DOMAIN ),
			'parent_item'                => __( 'Parent Department', WL_JP_DOMAIN ),
			'parent_item_colon'          => __( 'Parent Department:', WL_JP_DOMAIN ),
			'new_item_name'              => __( 'New Department', WL_JP_DOMAIN ),
			'add_new_item'               => __( 'Add New Department', WL_JP_DOMAIN ),
			'edit_item'                  => __( 'Edit Department', WL_JP_DOMAIN ),
			'update_item'                => __( 'Update Department', WL_JP_DOMAIN ),
			'view_item'                  => __( 'View Department', WL_JP_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate departments with commas', WL_JP_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove departments', WL_JP_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used', WL_JP_DOMAIN ),
			'popular_items'              => __( 'Popular Departments', WL_JP_DOMAIN ),
			'search_items'               => __( 'Search Departments', WL_JP_DOMAIN ),
			'not_found'                  => __( 'Not Found', WL_JP_DOMAIN ),
			'no_terms'                   => __( 'No Departments', WL_JP_DOMAIN ),
			'items_list'                 => __( 'Departments list', WL_JP_DOMAIN ),
			'items_list_navigation'      => __( 'Departments list navigation', WL_JP_DOMAIN ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => 'department' ),
		);
		register_taxonomy( 'department', array( 'job' ), $args );
	}

	/**
	 * Register skill taxonomy
	 * @return void
	 */
	public static function register_skill_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Skills Required', 'Taxonomy General Name', WL_JP_DOMAIN ),
			'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', WL_JP_DOMAIN ),
			'menu_name'                  => __( 'Skills', WL_JP_DOMAIN ),
			'all_items'                  => __( 'All Skills', WL_JP_DOMAIN ),
			'new_item_name'              => __( 'New Skill', WL_JP_DOMAIN ),
			'add_new_item'               => __( 'Add New Skill', WL_JP_DOMAIN ),
			'edit_item'                  => __( 'Edit Skill', WL_JP_DOMAIN ),
			'update_item'                => __( 'Update Skill', WL_JP_DOMAIN ),
			'view_item'                  => __( 'View Skill', WL_JP_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate skills with commas', WL_JP_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove skills', WL_JP_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used', WL_JP_DOMAIN ),
			'popular_items'              => __( 'Popular Skills', WL_JP_DOMAIN ),
			'search_items'               => __( 'Search Skills', WL_JP_DOMAIN ),
			'not_found'                  => __( 'Not Found', WL_JP_DOMAIN ),
			'no_terms'                   => __( 'No Skills', WL_JP_DOMAIN ),
			'items_list'                 => __( 'Skills list', WL_JP_DOMAIN ),
			'items_list_navigation'      => __( 'Skills list navigation', WL_JP_DOMAIN ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => false,
			'show_in_nav_menus'          => false,
			'show_in_menu'               => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => 'skill' ),
		);
		register_taxonomy( 'skill', array( 'job' ), $args );
	}

	/**
	 * Register job_location taxonomy
	 * @return void
	 */
	public static function register_job_location_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Job Locations', 'Taxonomy General Name', WL_JP_DOMAIN ),
			'singular_name'              => _x( 'Job Location', 'Taxonomy Singular Name', WL_JP_DOMAIN ),
			'menu_name'                  => __( 'Job Locations', WL_JP_DOMAIN ),
			'all_items'                  => __( 'All Job Locations', WL_JP_DOMAIN ),
			'new_item_name'              => __( 'New Location', WL_JP_DOMAIN ),
			'add_new_item'               => __( 'Add New Job Location', WL_JP_DOMAIN ),
			'edit_item'                  => __( 'Edit Job Location', WL_JP_DOMAIN ),
			'update_item'                => __( 'Update Job Location', WL_JP_DOMAIN ),
			'view_item'                  => __( 'View Job Location', WL_JP_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate job locations with commas', WL_JP_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove job locations', WL_JP_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used', WL_JP_DOMAIN ),
			'popular_items'              => __( 'Popular Job Locations', WL_JP_DOMAIN ),
			'search_items'               => __( 'Search Job Locations', WL_JP_DOMAIN ),
			'not_found'                  => __( 'Not Found', WL_JP_DOMAIN ),
			'no_terms'                   => __( 'No Job Locations', WL_JP_DOMAIN ),
			'items_list'                 => __( 'Job Locations list', WL_JP_DOMAIN ),
			'items_list_navigation'      => __( 'Job Locations list navigation', WL_JP_DOMAIN ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => false,
			'show_in_nav_menus'          => false,
			'show_in_menu'               => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => 'job_location' ),
		);
		register_taxonomy( 'job_location', array( 'job' ), $args );
	}

	/**
	 * Include single page template for job
	 * @param  string $template
	 * @return string
	 */
	public static function single_template( $template ) {
	    global $post;
		global $wp;
	    if ( $post->post_type == 'job' ) {
        	return WL_JP_PLUGIN_DIR_PATH . 'public/inc/templates/single-job.php';
	    }
	    return $template;
	}

	/**
	 * Enqueue scripts and styles to job page templates
	 * @return void
	 */
	public static function enqueue_scripts_styles( ) {
		self::enqueue_scripts_single_template();
	}

	/**
	 * Enqueue scripts and styles to single job page template
	 * @return void
	 */
	private static function enqueue_scripts_single_template() {
		if ( is_single() && get_post_type() == 'job' ) {
			self::enqueue_libraries();
		}
	}

	/**
	 * Enqueue scripts and styles
	 * @return void
	 */
	private static function enqueue_libraries() {
		/* Enqueue styles */
		wp_enqueue_style( 'wljp-bootstrap', WL_JP_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'wljp-font-awesome', WL_JP_PLUGIN_URL . 'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'wljp-toastr', WL_JP_PLUGIN_URL . 'assets/css/toastr.min.css' );
		wp_enqueue_style( 'wljp-public', WL_JP_PLUGIN_URL . 'assets/css/wljp-public.css' );

		/* Enqueue scripts */
		wp_enqueue_script( 'jquery-form' );
		wp_enqueue_script( 'wljp-popper-js', WL_JP_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-bootstrap-js', WL_JP_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-toastr-js', WL_JP_PLUGIN_URL . 'assets/js/toastr.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-moment-js', WL_JP_PLUGIN_URL . 'assets/js/moment.min.js', array(), '', true );
		wp_enqueue_script( 'wljp-public-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-public.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-public-ajax-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-public-ajax.js', array( 'jquery' ), true, true );
		wp_localize_script( 'wljp-public-ajax-js', 'WLJPAjax', array( 'security' => wp_create_nonce( 'wljp' ) ) );
		wp_localize_script( 'wljp-public-ajax-js', 'wljpajaxurl', esc_url( admin_url( 'admin-post.php' ) ) );
		wp_localize_script( 'wljp-public-ajax-js', 'WLJPAdminUrl', admin_url() );
	}
}
?>