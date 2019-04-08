<?php
defined( 'ABSPATH' ) || die();

class WL_JP_Helper {
	/**
	 * Flush rewrite rules if the previously added flag exists,
	 * and then remove the flag.
	 * @return void
	 */
	public static function flush_rewrite_rules_maybe() {
	    if ( get_option( 'wljp_flush_rewrite_rules_flag' ) ) {
	        flush_rewrite_rules();
	        delete_option( 'wljp_flush_rewrite_rules_flag' );
	    }
	}

	public static function get_gender_list() {
		return array(
			''       => esc_html__( 'Unspecified', WL_JP_DOMAIN ),
			'male'   => esc_html__( 'Male', WL_JP_DOMAIN ),
			'female' => esc_html__( 'Female', WL_JP_DOMAIN )
		);
	}

	public static function total_experience_years() {
		return array(
			''   => esc_html__( 'Unspecified', WL_JP_DOMAIN ),
			'0'  => sprintf( esc_html__( '%d Yr', WL_JP_DOMAIN ), 0 ),
			'1'  => sprintf( esc_html__( '%d Yr', WL_JP_DOMAIN ), 1 ),
			'2'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 2 ),
			'3'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 3 ),
			'4'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 4 ),
			'5'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 5 ),
			'6'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 6 ),
			'7'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 7 ),
			'8'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 8 ),
			'9'  => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 9 ),
			'10' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 10 ),
			'11' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 11 ),
			'12' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 12 ),
			'13' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 13 ),
			'14' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 14 ),
			'15' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 15 ),
			'16' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 16 ),
			'17' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 17 ),
			'18' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 18 ),
			'19' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 19 ),
			'20' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 20 ),
			'21' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 21 ),
			'22' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 22 ),
			'23' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 23 ),
			'24' => sprintf( esc_html__( '%d Yrs', WL_JP_DOMAIN ), 24 ),
			'25' => sprintf( esc_html__( '> %d Yrs', WL_JP_DOMAIN ), 25 )
		);
	}

	public static function total_experience_months() {
		return array(
			''   => esc_html__( 'Unspecified', WL_JP_DOMAIN ),
			'0'  => sprintf( esc_html__( '%d Month', WL_JP_DOMAIN ), 0 ),
			'1'  => sprintf( esc_html__( '%d Month', WL_JP_DOMAIN ), 1 ),
			'2'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 2 ),
			'3'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 3 ),
			'4'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 4 ),
			'5'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 5 ),
			'6'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 6 ),
			'7'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 7 ),
			'8'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 8 ),
			'9'  => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 9 ),
			'10' => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 10 ),
			'11' => sprintf( esc_html__( '%d Months', WL_JP_DOMAIN ), 11 )
		);
	}

	public static function notice_period_list() {
		return array(
			''        => esc_html__( 'Unspecified', WL_JP_DOMAIN ),
			'0-week'  => sprintf( esc_html__( '< %d week', WL_JP_DOMAIN ), 1 ),
			'1-week'  => sprintf( esc_html__( '%d week', WL_JP_DOMAIN ), 1 ),
			'2-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 2 ),
			'3-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 3 ),
			'4-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 4 ),
			'5-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 5 ),
			'6-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 6 ),
			'7-week'  => sprintf( esc_html__( '%d weeks', WL_JP_DOMAIN ), 7 ),
			'2-month' => sprintf( esc_html__( '%d month', WL_JP_DOMAIN ), 2 ),
			'3-month' => sprintf( esc_html__( '%d months', WL_JP_DOMAIN ), 3 ),
			'current' => esc_html__( 'Currently Serving Notice Period', WL_JP_DOMAIN )
		);
	}

	public static function industries() {
		return array( '' => esc_html__( 'Unspecified', WL_JP_DOMAIN ) ) + get_terms( array( 
		    'taxonomy' => 'industry',
		    'fields'   => 'id=>name'
		) );
	}

	public static function departments() {
		return get_terms( array( 
		    'taxonomy' => 'department',
		    'fields'   => 'id=>name'
		) );
	}

	public static function job_types() {
		return array( '' => esc_html__( 'Unspecified', WL_JP_DOMAIN ) ) + get_terms( array( 
		    'taxonomy' => 'job_type',
		    'fields'   => 'id=>name'
		) );
	}

	public static function course_types() {
		return array(
			'full-time'      => esc_html__( 'Full Time', WL_JP_DOMAIN ),
			'part-time'      => esc_html__( 'Part Time', WL_JP_DOMAIN ),
			'correspondence' => esc_html__( 'Correspondence', WL_JP_DOMAIN )
		);
	}

	public static function user_has_cv( $user_id ) {
		$query = new WP_Query(
			array(
				'post_type'      => 'candidate',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'no_found_rows'  => false,
				'meta_query'     => array(
					'user_id' => array(
						'key'   => 'wljp_candidate_user_id',
						'value' => $user_id
					)
				)
			)
		);

		if ( $query->post_count === 1 ) {
			return $query->posts[0];
		}
		return false;
	}

	public static function is_applied( $candidate_id, $job_id ) {
		global $wpdb;
		return $wpdb->get_row( "SELECT created_at FROM {$wpdb->prefix}wljp_candidate_job WHERE candidate_id = $candidate_id AND job_id = $job_id" );
	}

	/* Setting: general_jobs_per_page */
	public static function general_jobs_per_page() {
		return isset( get_option( 'wljp_general' )['jobs_per_page'] ) ? get_option( 'wljp_general' )['jobs_per_page'] : 15;
	}

	/* Setting: general_admin_applications_per_page */
	public static function general_admin_applications_per_page() {
		return isset( get_option( 'wljp_general' )['admin_applications_per_page'] ) ? get_option( 'wljp_general' )['admin_applications_per_page'] : 15;
	}

	/* Setting: general_candidate_jobs_applied_per_page */
	public static function general_candidate_jobs_applied_per_page() {
		return isset( get_option( 'wljp_general' )['candidate_jobs_applied_per_page'] ) ? get_option( 'wljp_general' )['candidate_jobs_applied_per_page'] : 5;
	}

	/* Setting: general_job_portal_page_id */
	public static function general_job_portal_page_id() {
		return isset( get_option( 'wljp_general' )['job_portal_page_id'] ) ? get_option( 'wljp_general' )['job_portal_page_id'] : 0;
	}

	/* Setting: general_job_portal_page_url */
	public static function general_job_portal_page_url() {
		$general_job_portal_page_id = self::general_job_portal_page_id();
		return $general_job_portal_page_id ? get_permalink( $general_job_portal_page_id ) : home_url();
	}

	/* Setting: general_account_page_id */
	public static function general_account_page_id() {
		return isset( get_option( 'wljp_general' )['account_page_id'] ) ? get_option( 'wljp_general' )['account_page_id'] : 0;
	}

	/* Setting: general_account_page_url */
	public static function general_account_page_url() {
		$general_account_page_id = self::general_account_page_id();
		return $general_account_page_id ? get_permalink( $general_account_page_id ) : home_url();
	}
} ?>