<?php
defined( 'ABSPATH' ) || die();

require_once( WL_JP_PLUGIN_DIR_PATH . 'includes/WL_JP_Helper.php' );

class WL_JP_Candidate {
	/**
	 * Add metaboxes to candidate post type
	 * @return void
	 */
	public static function add_meta_boxes() {
	    add_meta_box( 'wljp_candidate_account', __( 'Account Settings', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'account_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_personal', __( 'Personal', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'personal_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_work_experience', __( 'Work Experience', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'work_experience_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_employment', __( 'Employment', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'employment_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_education', __( 'Education', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'education_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_skills', __( 'Skills', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'skills_html' ), 'candidate', 'side' );
	    add_meta_box( 'wljp_candidate_certification', __( 'Certification', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'certification_html' ), 'candidate', 'advanced' );
	    add_meta_box( 'wljp_candidate_desired_job', __( 'Desired Job Details', WL_JP_DOMAIN ), array( 'WL_JP_Candidate', 'desired_job_html' ), 'candidate', 'advanced' );
	}

	/**
	 * Render html of account metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function account_html( $post ) {
		$post_id       = $post->ID;
		$user_id       = get_post_meta( $post_id, 'wljp_candidate_user_id', true );
		$user          = get_user_by( 'id', $user_id );
		if ( $user ) {
			$email    = $user->user_email;
			$username = $user->user_login;
		} else {
			$email = '';
			$username = '';
		}
	?>
		<?php wp_nonce_field( 'save_candidate_meta', 'candidate_meta' ); ?>
		<div class="wljp" id="wljp_candidate_account">
			<div class="row mt-2">
				<div class="col-sm-6">
					<?php if ( $username ) : ?>
					<label><?php _e( 'Username', WL_JP_DOMAIN ); ?>:</label><br>
					<span><strong><?php echo $username; ?></strong></span>
					<?php else : ?>
					<label for="wljp_candidate_account_username"><?php _e( 'Username', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_account_username" id="wljp_candidate_account_username" class="widefat" value="<?php echo $username; ?>" required>
					<?php endif; ?>
				</div>
				<div class="col-sm-6">
					<label for="wljp_candidate_account_email"><?php _e( 'Email Address', WL_JP_DOMAIN ); ?>:</label>
					<input type="email" name="candidate_account_email" id="wljp_candidate_account_email" class="widefat" value="<?php echo $email; ?>" required>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-sm-6">
					<label for="wljp_candidate_account_password"><?php _e( 'Password', WL_JP_DOMAIN ); ?>:</label>
					<input type="password" name="candidate_account_password" id="wljp_candidate_account_password" class="widefat">
				</div>
				<div class="col-sm-6">
					<label for="wljp_candidate_account_confirm_password"><?php _e( 'Confirm Password', WL_JP_DOMAIN ); ?>:</label>
					<input type="password" name="candidate_account_confirm_password" id="wljp_candidate_account_confirm_password" class="widefat">
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Render html of personal metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function personal_html( $post ) {
		$post_id       = $post->ID;
		$name          = $post->post_title;
		$personal      = get_post_meta( $post_id, 'wljp_candidate_personal', true );
		$email         = isset( $personal['email'] ) ? esc_attr( $personal['email'] ) : '';
		$mobile        = isset( $personal['mobile'] ) ? esc_attr( $personal['mobile'] ) : '';
		$date_of_birth = isset( $personal['date_of_birth'] ) ? esc_attr( $personal['date_of_birth'] ) : '';
		$location      = isset( $personal['location'] ) ? esc_attr( $personal['location'] ) : '';
		$gender        = isset( $personal['gender'] ) ? esc_attr( $personal['gender'] ) : '';
	?>
		<div class="wljp" id="wljp_candidate_personal">
			<div class="row">
				<?php if ( $name ) : ?>
				<div class="col-sm-6">
					<label><?php _e( 'Name', WL_JP_DOMAIN ); ?>:</label><br>
					<span><?php echo $name; ?></span>
				</div>
				<?php endif; ?>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_personal_email"><?php _e( 'Email Address', WL_JP_DOMAIN ); ?>:</label>
					<input type="email" name="candidate_personal_email" id="wljp_candidate_personal_email" class="widefat" value="<?php echo $email; ?>" required>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_personal_mobile"><?php _e( 'Mobile', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_mobile" id="wljp_candidate_personal_mobile" class="widefat" value="<?php echo $mobile; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_personal_date_of_birth"><?php _e( 'Date of Birth', WL_JP_DOMAIN ); ?>:</label>
					<input type="date" name="candidate_personal_date_of_birth" id="wljp_candidate_personal_date_of_birth" class="widefat" value="<?php echo $date_of_birth; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_personal_location"><?php _e( 'Location', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_location" id="wljp_candidate_personal_location" class="widefat" value="<?php echo $location; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_personal_gender"><?php _e( 'Gender', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_personal_gender" id="wljp_candidate_personal_gender" class="widefat">
					<?php foreach( WL_JP_Helper::get_gender_list() as $key => $value ) : ?>
						<option <?php selected( $key, $gender ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Render html of work_experience metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function work_experience_html( $post ) {
		$post_id                = $post->ID;
		$work_experience        = get_post_meta( $post_id, 'wljp_candidate_work_experience', true );
		$profile_title          = isset( $work_experience['profile_title'] ) ? esc_attr( $work_experience['profile_title'] ) : '';
		$profile_summary        = isset( $work_experience['profile_summary'] ) ? esc_attr( $work_experience['profile_summary'] ) : '';
		/* An associative array with keys: years and months */
		$total_experience       = ( isset( $work_experience['total_experience'] ) && is_array( $work_experience['total_experience'] ) ) ? $work_experience['total_experience'] : array();
		$total_experience_year  = isset( $total_experience['year'] ) ? esc_attr( $total_experience['year'] ) : '';
		$total_experience_month = isset( $total_experience['month'] ) ? esc_attr( $total_experience['month'] ) : '';
		$salary                 = isset( $work_experience['salary'] ) ? esc_attr( $work_experience['salary'] ) : '';
		$notice_period          = isset( $work_experience['notice_period'] ) ? esc_attr( $work_experience['notice_period'] ) : '';
		/* If notice period is "Currently Serving Notice Period" */
		$last_working_day       = isset( $work_experience['last_working_day'] ) ? esc_attr( $work_experience['last_working_day'] ) : '';
	?>
		<div class="wljp" id="wljp_candidate_work_experience">
			<div class="row">
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_work_experience_profile_title"><?php _e( 'Profile Title', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_title" id="wljp_candidate_work_experience_profile_title" class="widefat" value="<?php echo $profile_title; ?>">
				</div>
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_work_experience_profile_summary"><?php _e( 'Profile Summary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_summary" id="wljp_candidate_work_experience_profile_summary" class="widefat" value="<?php echo $profile_summary; ?>">
				</div>
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_work_experience_total_experience"><?php _e( 'Total Experience', WL_JP_DOMAIN ); ?>:</label>
				</div>
				<div class="col-sm-6">
					<select name="candidate_work_experience_total_experience[year]" id="wljp_candidate_work_experience_total_experience_year" class="widefat">
					<?php foreach( WL_JP_Helper::total_experience_years() as $key => $value ) : ?>
						<option <?php selected( $key, $total_experience_year ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6">
					<select name="candidate_work_experience_total_experience[month]" id="wljp_candidate_work_experience_total_experience_month" class="widefat">
					<?php foreach( WL_JP_Helper::total_experience_months() as $key => $value ) : ?>
						<option <?php selected( $key, $total_experience_month ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_work_experience_salary"><?php _e( 'Current / Latest Annual Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_salary" id="wljp_candidate_work_experience_salary" class="widefat" value="<?php echo $salary; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_work_experience_notice_period"><?php _e( 'Notice Period', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_work_experience_notice_period" id="wljp_candidate_work_experience_notice_period" class="widefat">
					<?php foreach( WL_JP_Helper::notice_period_list() as $key => $value ) : ?>
						<option <?php selected( $key, $notice_period ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-12 mt-2 wljp_last_working_day float-right">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<label for="wljp_candidate_work_experience_last_working_day"><?php _e( 'Last working day', WL_JP_DOMAIN ); ?>:</label>
							<input type="date" name="candidate_work_experience_last_working_day" id="wljp_candidate_work_experience_last_working_day" class="widefat" value="<?php echo $last_working_day; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Render html of employment metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function employment_html( $post ) {
		$post_id    = $post->ID;
		/* Array of array having keys: job_title, company_name, industry, duration_from, duration_to */
		$employment = get_post_meta( $post_id, 'wljp_candidate_employment', true );
	?>
		<div class="wljp" id="wljp_candidate_employment">
			<div id="wljp_candidate_employment_rows">
				<?php if ( is_array( $employment ) && count ( $employment ) > 0 ) :
						foreach( $employment as $key => $value ) : 
							$job_title     = isset( $value['job_title'] ) ? esc_attr( $value['job_title'] ) : '';
							$company_name  = isset( $value['company_name'] ) ? esc_attr( $value['company_name'] ) : '';
							$industry      = isset( $value['industry'] ) ? esc_attr( $value['industry'] ) : '';
							$duration_from = isset( $value['duration_from'] ) ? esc_attr( $value['duration_from'] ) : '';
							$duration_to   = isset( $value['duration_to'] ) ? esc_attr( $value['duration_to'] ) : '';
						?>
				<div class="row wljp_candidate_employment_row mt-2">
					<div class="col-sm-12 mt-2">
						<span class="candidate_employment_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Job Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_job_title[]" class="widefat" value="<?php echo $job_title; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Company Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_company_name[]" class="widefat" value="<?php echo $company_name; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_employment_industry[]" class="widefat">
						<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
							<option <?php selected( $key, $industry, true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration from', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_from[]" class="widefat" value="<?php echo $duration_from; ?>">
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration to', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_to[]" class="widefat" value="<?php echo $duration_to; ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_employment_row mt-2">
					<div class="col-sm-12 mt-2">
						<span class="candidate_employment_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Job Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_job_title[]" class="widefat">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Company Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_company_name[]" class="widefat">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_employment_industry" class="widefat">
						<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration from', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_from" class="widefat">
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration to', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_to" class="widefat">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_employment_row_add_more" class="wljp_row_add_more"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>
	<?php
	}

	/**
	 * Render html of education metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function education_html( $post ) {
		$post_id   = $post->ID;
		/* Array of array having keys: education_specialization, institute_name, course_type, year_of_passing */
		$education = get_post_meta( $post_id, 'wljp_candidate_education', true );
	?>
		<div class="wljp" id="wljp_candidate_education">
			<div id="wljp_candidate_education_rows">
				<?php if ( is_array( $education ) && count ( $education ) > 0 ) :
						foreach( $education as $key => $value ) :
							$specialization  = isset( $value['specialization'] ) ? esc_attr( $value['specialization'] ) : '';
							$institute_name  = isset( $value['institute_name'] ) ? esc_attr( $value['institute_name'] ) : '';
							$course_type     = isset( $value['course_type'] ) ? esc_attr( $value['course_type'] ) : '';
							$year_of_passing = isset( $value['year_of_passing'] ) ? esc_attr( $value['year_of_passing'] ) : '';
						?>
				<div class="row wljp_candidate_education_row">
					<div class="col-sm-6 mt-2">
						<span class="candidate_education_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Education Specialization', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_specialization[]" class="widefat" value="<?php echo $specialization; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Institute Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_institute_name[]" class="widefat" value="<?php echo $institute_name; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Course Type', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_education_course_type[]" class="widefat">
						<?php foreach( WL_JP_Helper::course_types() as $key => $value ) : ?>
							<option <?php selected( $key, $course_type, true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Year of Passing', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_year_of_passing[]" class="widefat" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>" value="<?php echo $year_of_passing; ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_education_row">
					<div class="col-sm-6 mt-2">
						<span class="candidate_education_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Education Specialization', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_specialization[]" class="widefat">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Institute Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_institute_name[]" class="widefat">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Course Type', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_education_course_type" class="widefat">
						<?php foreach( WL_JP_Helper::course_types() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Year of Passing', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_year_of_passing[]" class="widefat" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_education_row_add_more" class="wljp_row_add_more"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>
	<?php
	}

	/**
	 * Render html of skills metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function skills_html( $post ) {
		$post_id  = $post->ID;
		/* Array of array having keys: skill, experience */
		$skills   = get_post_meta( $post_id, 'wljp_candidate_skills', true );
	?>
		<div class="wljp" id="wljp_candidate_skills">
			<div id="wljp_candidate_skills_rows">
				<?php if ( is_array( $skills ) && count ( $skills ) > 0 ) :
						foreach( $skills as $value ) : ?>
				<div class="row wljp_candidate_skills_row">
					<div class="col-sm-12 mt-2">
						<span class="candidate_skills_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Skill', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_skills[]" class="widefat" value="<?php echo esc_attr( $value ); ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_skills_row">
					<div class="col-sm-12 mt-2">
						<span class="candidate_skills_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Skill', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_skills[]" class="widefat">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_skills_row_add_more" class="wljp_row_add_more"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>
	<?php
	}

	/**
	 * Render html of certification metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function certification_html( $post ) {
		$post_id       = $post->ID;
		/* Array of array having keys: certification_title, year_of_certification */
		$certification = get_post_meta( $post_id, 'wljp_candidate_certification', true );
	?>
		<div class="wljp" id="wljp_candidate_certification">
			<div id="wljp_candidate_certification_rows">
				<?php if ( is_array( $certification ) && count ( $certification ) > 0 ) :
						foreach( $certification as $key => $value ) :
							$certification_title   = isset( $value['certification_title'] ) ? esc_attr( $value['certification_title'] ) : '';
							$year_of_certification = isset( $value['year_of_certification'] ) ? esc_attr( $value['year_of_certification'] ) : '';
						?>
				<div class="row wljp_candidate_certification_row">
					<div class="col-sm-8 mt-2">
						<span class="candidate_certification_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Certification Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_certification_title[]" class="widefat" value="<?php echo esc_attr( $certification_title ); ?>">
					</div>
					<div class="col-sm-4 mt-2">
						<label><?php _e( 'Year of Certification', WL_JP_DOMAIN ); ?>:</label>
						<input type="number" step="1" name="candidate_certification_year[]" class="widefat" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>" value="<?php echo esc_attr( $year_of_certification ); ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_certification_row">
					<div class="col-sm-8 mt-2">
						<span class="candidate_certification_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Certification Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_certification_title[]" class="widefat">
					</div>
					<div class="col-sm-4 mt-2">
						<label><?php _e( 'Year of Certification', WL_JP_DOMAIN ); ?>:</label>
						<input type="number" step="1" name="candidate_certification_year[]" class="widefat">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_certification_row_add_more" class="wljp_row_add_more"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>
	<?php
	}

	/**
	 * Render html of desired_job metabox
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function desired_job_html( $post ) {
		$post_id     = $post->ID;
		/* Associative array having keys: locations, industry, salary, job_type */
		$desired_job        = get_post_meta( $post_id, 'wljp_candidate_desired_job', true );
		$locations          = ( isset( $desired_job['locations'] ) && is_array( $desired_job['locations'] ) ) ? $desired_job['locations'] : array();
		$locations_string   = implode( ', ', $locations );
		$industry           = isset( $desired_job['industry'] ) ? esc_attr( $desired_job['industry'] ) : '';
		$departments        = ( isset( $desired_job['departments'] ) && is_array( $desired_job['departments'] ) ) ? $desired_job['departments'] : array();
		$salary             = isset( $desired_job['salary'] ) ? esc_attr( $desired_job['salary'] ) : '';
		$job_types          = ( isset( $desired_job['job_types'] ) && is_array( $desired_job['job_types'] ) ) ? $desired_job['job_types'] : array();
	?>
		<div class="wljp" id="wljp_candidate_desired_job">
			<div class="row">
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_desired_job_locations"><?php _e( 'Job Locations', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_locations" id="wljp_candidate_desired_job_locations" class="widefat" value="<?php echo $locations_string; ?>" placeholder="<?php _e( 'Separated by comma', WL_JP_DOMAIN ); ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_industry"><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_desired_job_industry" id="wljp_candidate_desired_job_industry" class="widefat">
					<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
						<option <?php selected( $key, $industry ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_salary"><?php _e( 'Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_salary" id="wljp_candidate_desired_job_salary" class="widefat" value="<?php echo $salary; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_departments"><?php _e( 'Departments', WL_JP_DOMAIN ); ?>:</label><br>
					<select data-placeholder="<?php esc_attr_e( 'Select departments', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_departments[]" id="wljp_candidate_desired_job_departments" class="widefat" multiple>
					<?php $department_array = WL_JP_Helper::departments();
						foreach( $department_array as $key => $value ) : ?>
						<option <?php selected( true, in_array( $key, $departments ), true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_types"><?php _e( 'Job Types', WL_JP_DOMAIN ); ?>:</label>
					<select data-placeholder="<?php esc_attr_e( 'Select job types', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_types[]" id="wljp_candidate_desired_job_types" class="widefat" multiple>
					<?php $job_type_array = WL_JP_Helper::job_types();
						foreach( $job_type_array as $key => $value ) : ?>
						<option <?php selected( true, in_array( $key, $job_types ), true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Enqueue scripts and styles to admin candidate post type
	 * @param  string $hook_suffix
	 * @return void
	 */
	public static function enqueue_scripts_styles( $hook_suffix ) {
	    if ( in_array( $hook_suffix, array('post.php', 'post-new.php') ) ) {
	        $screen = get_current_screen();
	        if ( is_object( $screen ) && 'candidate' == $screen->post_type ) {
	        	/* Enqueue styles */
				wp_enqueue_style( 'wljp-bootstrap', WL_JP_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
				wp_enqueue_style( 'wljp-fSelect', WL_JP_PLUGIN_URL . 'assets/css/fSelect.css' );
				wp_enqueue_style( 'wljp-admin', WL_JP_PLUGIN_URL . 'assets/css/wljp-admin.css' );

	        	/* Enqueue scripts */
				wp_enqueue_script( 'wljp-jquery-validate-js', WL_JP_PLUGIN_URL . 'assets/js/jquery.validate.min.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-fSelect-js', WL_JP_PLUGIN_URL . 'assets/js/fSelect.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-admin-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-admin.js', array( 'jquery', 'wljp-jquery-validate-js' ), true, true );
	        }
	    }
	}

	/**
	 * Change title text for candidate post type
	 * @param  string $title
	 * @return string
	 */
	public static function change_title_text( $title ){
		$screen = get_current_screen();
		if  ( 'candidate' == $screen->post_type ) {
		  $title = __( 'Enter candidate name', WL_JP_DOMAIN );
		}
		return $title;
	}

	/**
	 * Set candidate columns
	 * @param array $columns
	 * @return array
	 */
	public static function set_columns( $columns ) {
		$newColumns = array();
		$newColumns['cb']    = $columns['cb'];
		$newColumns['title'] = __( 'Candidate Name', WL_JP_DOMAIN );
		$newColumns['date'] = __( 'Date', WL_JP_DOMAIN );
		return $newColumns;
	}

	/**
	 * Save metaboxes values
	 * @param  int $post_id
	 * @param  WP_Post $post
	 * @return void
	 */
	public static function save_metaboxes( $post_id, $post ) {
		if ( ! isset( $_POST['candidate_meta'] ) || ! wp_verify_nonce( $_POST['candidate_meta'], 'save_candidate_meta' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		if ( wp_is_post_revision( $post ) ) {
			return;
		}
		if ( $post->post_type !== 'candidate' ) {
			return;
		}

		$email            = isset( $_POST['candidate_account_email'] ) ? sanitize_email( $_POST['candidate_account_email'] ) : NULL;
		$password         = isset( $_POST['candidate_account_password'] ) ? $_POST['candidate_account_password'] : NULL;
		$confirm_password = isset( $_POST['candidate_account_confirm_password'] ) ? $_POST['candidate_account_confirm_password'] : NULL;

		$personal_name          = isset( $_POST['candidate_personal_name'] ) ? sanitize_text_field( $_POST['candidate_personal_name'] ) : NULL;
		$personal_email         = isset( $_POST['candidate_personal_email'] ) ? sanitize_email( $_POST['candidate_personal_email'] ) : NULL;
		$personal_mobile        = isset( $_POST['candidate_personal_mobile'] ) ? $_POST['candidate_personal_mobile'] : NULL;
		$personal_date_of_birth = isset( $_POST['candidate_personal_date_of_birth'] ) ? $_POST['candidate_personal_date_of_birth'] : NULL;
		$personal_location      = isset( $_POST['candidate_personal_location'] ) ? $_POST['candidate_personal_location'] : NULL;
		$personal_gender        = isset( $_POST['candidate_personal_gender'] ) ? $_POST['candidate_personal_gender'] : NULL;

		$work_experience_profile_title          = isset( $_POST['candidate_work_experience_profile_title'] ) ? sanitize_text_field( $_POST['candidate_work_experience_profile_title'] ) : NULL;
		$work_experience_profile_summary        = isset( $_POST['candidate_work_experience_profile_summary'] ) ? sanitize_text_field( $_POST['candidate_work_experience_profile_summary'] ) : NULL;
		$work_experience_total_experience       = ( isset( $_POST['candidate_work_experience_total_experience'] ) && is_array( $_POST['candidate_work_experience_total_experience'] ) ) ? $_POST['candidate_work_experience_total_experience'] : array();
		$work_experience_total_experience_year  = isset( $work_experience_total_experience['year'] ) ? intval( sanitize_text_field( $work_experience_total_experience['year'] ) ) : '';
		$work_experience_total_experience_month = isset( $work_experience_total_experience['month'] ) ? intval( sanitize_text_field( $work_experience_total_experience['month'] ) ) : '';
		$work_experience_salary                 = isset( $_POST['candidate_work_experience_salary'] ) ? sanitize_text_field( $_POST['candidate_work_experience_salary'] ) : NULL;
		$work_experience_notice_period          = isset( $_POST['candidate_work_experience_notice_period'] ) ? sanitize_text_field( $_POST['candidate_work_experience_notice_period'] ) : NULL;
		$work_experience_last_working_day       = isset( $_POST['candidate_work_experience_last_working_day'] ) ? sanitize_text_field( $_POST['candidate_work_experience_last_working_day'] ) : NULL;

		$employment_job_title     = ( isset( $_POST['candidate_employment_job_title'] ) && is_array( $_POST['candidate_employment_job_title'] ) ) ? $_POST['candidate_employment_job_title'] : array();
		$employment_company_name  = ( isset( $_POST['candidate_employment_company_name'] ) && is_array( $_POST['candidate_employment_company_name'] ) ) ? $_POST['candidate_employment_company_name'] : array();
		$employment_industry      = ( isset( $_POST['candidate_employment_industry'] ) && is_array( $_POST['candidate_employment_industry'] ) ) ? $_POST['candidate_employment_industry'] : array();
		$employment_duration_from = ( isset( $_POST['candidate_employment_duration_from'] ) && is_array( $_POST['candidate_employment_duration_from'] ) ) ? $_POST['candidate_employment_duration_from'] : array();
		$employment_duration_to   = ( isset( $_POST['candidate_employment_duration_to'] ) && is_array( $_POST['candidate_employment_duration_to'] ) ) ? $_POST['candidate_employment_duration_to'] : array();

		$education_specialization  = ( isset( $_POST['candidate_education_specialization'] ) && is_array( $_POST['candidate_education_specialization'] ) ) ? $_POST['candidate_education_specialization'] : array();
		$education_institute_name  = ( isset( $_POST['candidate_education_institute_name'] ) && is_array( $_POST['candidate_education_institute_name'] ) ) ? $_POST['candidate_education_institute_name'] : array();
		$education_course_type     = ( isset( $_POST['candidate_education_course_type'] ) && is_array( $_POST['candidate_education_course_type'] ) ) ? $_POST['candidate_education_course_type'] : array();
		$education_year_of_passing = ( isset( $_POST['candidate_education_year_of_passing'] ) && is_array( $_POST['candidate_education_year_of_passing'] ) ) ? $_POST['candidate_education_year_of_passing'] : array();

		$skills = ( isset( $_POST['candidate_skills'] ) && is_array( $_POST['candidate_skills'] ) ) ? $_POST['candidate_skills'] : array();

		$certification_title = ( isset( $_POST['candidate_certification_title'] ) && is_array( $_POST['candidate_certification_title'] ) ) ? $_POST['candidate_certification_title'] : array();
		$certification_year  = ( isset( $_POST['candidate_certification_year'] ) && is_array( $_POST['candidate_certification_year'] ) ) ? $_POST['candidate_certification_year'] : array();

		$desired_job_locations   = isset( $_POST['candidate_desired_job_locations'] ) ? sanitize_text_field( $_POST['candidate_desired_job_locations'] ) : NULL;
		$desired_job_industry    = isset( $_POST['candidate_desired_job_industry'] ) ? sanitize_text_field( $_POST['candidate_desired_job_industry'] ) : NULL;
		$desired_job_salary      = isset( $_POST['candidate_desired_job_salary'] ) ? sanitize_text_field( $_POST['candidate_desired_job_salary'] ) : NULL;
		$desired_job_departments = ( isset( $_POST['candidate_desired_job_departments'] ) && is_array( $_POST['candidate_desired_job_departments'] ) ) ? $_POST['candidate_desired_job_departments'] : array();
		$desired_job_types       = ( isset( $_POST['candidate_desired_job_types'] ) && is_array( $_POST['candidate_desired_job_types'] ) ) ? $_POST['candidate_desired_job_types'] : array();

		$personal = array(
			'name'          => $personal_name,
			'email'         => $personal_email,
			'mobile'        => $personal_mobile,
			'date_of_birth' => $personal_date_of_birth,
			'location'      => $personal_location,
			'gender'        => $personal_gender
		);

		$work_experience = array(
			'profile_title'    => $work_experience_profile_title,
			'profile_summary'  => $work_experience_profile_summary,
			'total_experience' => array(
				'year'  => $work_experience_total_experience_year,
				'month' => $work_experience_total_experience_month
			),
			'salary'           => $work_experience_salary,
			'notice_period'    => $work_experience_notice_period,
			'last_working_day' => $work_experience_last_working_day
		);

		$employment = array();
		foreach( $employment_job_title as $key => $job_title ) {
			array_push( $employment, array(
				'job_title'     => $job_title,
				'company_name'  => isset( $employment_company_name[$key] ) ? $employment_company_name[$key] : NULL,
				'industry'      => isset( $employment_industry[$key] ) ? $employment_industry[$key] : NULL,
				'duration_from' => isset( $employment_duration_from[$key] ) ? $employment_duration_from[$key] : NULL,
				'duration_to'   => isset( $employment_duration_to[$key] ) ? $employment_duration_to[$key] : NULL
			) );
		}

		$education = array();
		foreach( $education_specialization as $key => $specialization ) {
			array_push( $education, array(
				'specialization'  => $specialization,
				'institute_name'  => isset( $education_institute_name[$key] ) ? $education_institute_name[$key] : NULL,
				'course_type'     => isset( $education_course_type[$key] ) ? $education_course_type[$key] : NULL,
				'year_of_passing' => isset( $education_year_of_passing[$key] ) ? $education_year_of_passing[$key] : NULL
			) );
		}

		$certification = array();
		foreach( $certification_title as $key => $title ) {
			array_push( $certification, array(
				'certification_title'   => $title,
				'year_of_certification' => isset( $certification_year[$key] ) ? $certification_year[$key] : NULL,
			) );
		}

		if ( $desired_job_locations ) {
			$desired_job_locations = explode( ',', $desired_job_locations );
			$desired_job_locations = array_map( 'trim', $desired_job_locations );
		} else {
			$desired_job_locations = array();
		}

		$desired_job = array(
			'locations'   => $desired_job_locations,
			'industry'    => $desired_job_industry,
			'departments' => $desired_job_departments,
			'salary'      => $desired_job_salary,
			'job_types'   => $desired_job_types
		);

		update_post_meta( $post_id, 'wljp_candidate_personal', $personal );
		update_post_meta( $post_id, 'wljp_candidate_work_experience', $work_experience );
		update_post_meta( $post_id, 'wljp_candidate_employment', $employment );
		update_post_meta( $post_id, 'wljp_candidate_education', $education );
		update_post_meta( $post_id, 'wljp_candidate_skills', $skills );
		update_post_meta( $post_id, 'wljp_candidate_certification', $certification );
		update_post_meta( $post_id, 'wljp_candidate_desired_job', $desired_job );

		$user_id = get_post_meta( $post_id, 'wljp_candidate_user_id', true );

		$user_data = array();
		if ( empty( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {			
			return;
		}

		$user_data['user_email'] = $email;

		if ( ! empty( $password ) && ! empty( $confirm_password ) ) {
			if ( $password !== $confirm_password ) {
				return;
			} else {
				$user_data['user_pass'] = $password;
			}
		}

		$user_data['ID'] = $user_id;

		wp_update_user( $user_data );
	}
}