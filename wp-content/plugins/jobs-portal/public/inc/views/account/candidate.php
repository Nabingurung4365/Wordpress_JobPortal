<?php
defined( 'ABSPATH' ) || die();

if ( $candidate = WL_JP_Helper::user_has_cv( get_current_user_id() ) ) :
	$post_id = $candidate->ID;

	$personal_name          = $candidate->post_title;
	$personal               = get_post_meta( $post_id, 'wljp_candidate_personal', true );
	$personal_email         = isset( $personal['email'] ) ? esc_attr( $personal['email'] ) : '';
	$personal_mobile        = isset( $personal['mobile'] ) ? esc_attr( $personal['mobile'] ) : '';
	$personal_date_of_birth = isset( $personal['date_of_birth'] ) ? esc_attr( $personal['date_of_birth'] ) : '';
	$personal_location      = isset( $personal['location'] ) ? esc_attr( $personal['location'] ) : '';
	$personal_gender        = isset( $personal['gender'] ) ? esc_attr( $personal['gender'] ) : '';

	$work_experience        = get_post_meta( $post_id, 'wljp_candidate_work_experience', true );
	$profile_title          = isset( $work_experience['profile_title'] ) ? esc_attr( $work_experience['profile_title'] ) : '';
	$profile_summary        = isset( $work_experience['profile_summary'] ) ? esc_attr( $work_experience['profile_summary'] ) : '';
	$total_experience       = ( isset( $work_experience['total_experience'] ) && is_array( $work_experience['total_experience'] ) ) ? $work_experience['total_experience'] : array();
	$total_experience_year  = isset( $total_experience['year'] ) ? esc_attr( $total_experience['year'] ) : '';
	$total_experience_month = isset( $total_experience['month'] ) ? esc_attr( $total_experience['month'] ) : '';
	$salary                 = isset( $work_experience['salary'] ) ? esc_attr( $work_experience['salary'] ) : '';
	$notice_period          = isset( $work_experience['notice_period'] ) ? esc_attr( $work_experience['notice_period'] ) : '';
	$last_working_day       = isset( $work_experience['last_working_day'] ) ? esc_attr( $work_experience['last_working_day'] ) : '';

	$employment = get_post_meta( $post_id, 'wljp_candidate_employment', true );

	$education = get_post_meta( $post_id, 'wljp_candidate_education', true );

	$skills = get_post_meta( $post_id, 'wljp_candidate_skills', true );

	$certification = get_post_meta( $post_id, 'wljp_candidate_certification', true );

	$desired_job         = get_post_meta( $post_id, 'wljp_candidate_desired_job', true );
	$locations           = ( isset( $desired_job['locations'] ) && is_array( $desired_job['locations'] ) ) ? $desired_job['locations'] : array();
	$locations_string    = implode( ', ', $locations );
	$desired_industry    = isset( $desired_job['industry'] ) ? esc_attr( $desired_job['industry'] ) : '';
	$desired_departments = ( isset( $desired_job['departments'] ) && is_array( $desired_job['departments'] ) ) ? $desired_job['departments'] : array();
	$desired_salary      = isset( $desired_job['salary'] ) ? esc_attr( $desired_job['salary'] ) : '';

	$desired_job_types   = ( isset( $desired_job['job_types'] ) && is_array( $desired_job['job_types'] ) ) ? $desired_job['job_types'] : array();
?>
<div class="col-sm-12 col-md-7 card p-3 mt-3">
	<header>
		<div class="wljp-cv-heading p-3">
			<span><?php _e( 'Your CV', WL_JP_DOMAIN ); ?></span>
		</div>
	</header>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" id="wljp-cv-update-form" class="wljp-cv-update-form">
		<?php $nonce = wp_create_nonce( 'cv-update' ); ?>
        <input type="hidden" name="cv-update" value="<?php echo $nonce; ?>">
        <input type="hidden" name="action" value="wljp-cv-update">

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Personal', WL_JP_DOMAIN ); ?></span></div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_name"><?php _e( 'Name', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_name" id="wljp_candidate_personal_name" class="w-100 d-block col" value="<?php echo $personal_name; ?>">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_email"><?php _e( 'Email Address', WL_JP_DOMAIN ); ?>:</label>
					<input type="email" name="candidate_personal_email" id="wljp_candidate_personal_email" class="w-100 d-block col" value="<?php echo $personal_email; ?>">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_mobile"><?php _e( 'Mobile', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_mobile" id="wljp_candidate_personal_mobile" class="w-100 d-block col" value="<?php echo $personal_mobile; ?>">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_date_of_birth"><?php _e( 'Date of Birth', WL_JP_DOMAIN ); ?>:</label>
					<input type="date" name="candidate_personal_date_of_birth" id="wljp_candidate_personal_date_of_birth" class="w-100 d-block col" value="<?php echo $personal_date_of_birth; ?>">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_location"><?php _e( 'Location', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_location" id="wljp_candidate_personal_location" class="w-100 d-block col" value="<?php echo $personal_location; ?>">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_gender"><?php _e( 'Gender', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_personal_gender" id="wljp_candidate_personal_gender" class="w-100 d-block col" value="<?php echo $personal_name; ?>">
					<?php foreach( WL_JP_Helper::get_gender_list() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>" <?php selected( $personal_gender, $key, true ); ?>><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Experience', WL_JP_DOMAIN ); ?></span></div>
            <div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_profile_title"><?php _e( 'Profile Title', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_title" id="wljp_candidate_work_experience_profile_title" class="w-100 d-block col" value="<?php echo $profile_title; ?>">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_profile_summary"><?php _e( 'Profile Summary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_summary" id="wljp_candidate_work_experience_profile_summary" class="w-100 d-block col" value="<?php echo $profile_summary; ?>">
				</div>
			</div>
			<div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_total_experience"><?php _e( 'Total Experience', WL_JP_DOMAIN ); ?>:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<select name="candidate_work_experience_total_experience[year]" id="wljp_candidate_work_experience_total_experience_year" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::total_experience_years() as $key => $value ) : ?>
						<option <?php selected( $key, $total_experience_year ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<select name="candidate_work_experience_total_experience[month]" id="wljp_candidate_work_experience_total_experience_month" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::total_experience_months() as $key => $value ) : ?>
						<option <?php selected( $key, $total_experience_month ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_work_experience_salary"><?php _e( 'Current / Latest Annual Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_salary" id="wljp_candidate_work_experience_salary" class="w-100 d-block col" value="<?php echo $salary; ?>">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_work_experience_notice_period"><?php _e( 'Notice Period', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_work_experience_notice_period" id="wljp_candidate_work_experience_notice_period" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::notice_period_list() as $key => $value ) : ?>
						<option <?php selected( $key, $notice_period ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-12 mt-2 wljp_last_working_day float-right">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="form-group col-md-6">
							<label for="wljp_candidate_work_experience_last_working_day"><?php _e( 'Last working day', WL_JP_DOMAIN ); ?>:</label>
							<input type="date" name="candidate_work_experience_last_working_day" id="wljp_candidate_work_experience_last_working_day" class="w-100 d-block col" value="<?php echo $last_working_day; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Employment', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_employment_rows">
				<?php if ( is_array( $employment ) && count ( $employment ) > 0 ) :
						foreach( $employment as $key => $value ) : 
							$job_title     = isset( $value['job_title'] ) ? esc_attr( $value['job_title'] ) : '';
							$company_name  = isset( $value['company_name'] ) ? esc_attr( $value['company_name'] ) : '';
							$industry      = isset( $value['industry'] ) ? esc_attr( $value['industry'] ) : '';
							$duration_from = isset( $value['duration_from'] ) ? esc_attr( $value['duration_from'] ) : '';
							$duration_to   = isset( $value['duration_to'] ) ? esc_attr( $value['duration_to'] ) : '';
						?>
				<div class="row wljp_candidate_employment_row mt-3">
					<div class="col-sm-12 mt-2">
						<span class="candidate_employment_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Job Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_job_title[]" class="w-100 d-block col" value="<?php echo $job_title; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Company Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_company_name[]" class="w-100 d-block col" value="<?php echo $company_name; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_employment_industry[]" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
							<option <?php selected( $key, $industry, true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration from', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_from[]" class="w-100 d-block col" value="<?php echo $duration_from; ?>">
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration to', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_to[]" class="w-100 d-block col" value="<?php echo $duration_to; ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_employment_row mt-3">
					<div class="col-sm-12 mt-2">
						<span class="candidate_employment_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Job Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_job_title[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Company Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_company_name[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_employment_industry[]" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration from', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_from[]" class="w-100 d-block col">
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration to', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_to[]" class="w-100 d-block col">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_employment_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Education', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_education_rows">
				<?php if ( is_array( $education ) && count ( $education ) > 0 ) :
						foreach( $education as $key => $value ) :
							$specialization  = isset( $value['specialization'] ) ? esc_attr( $value['specialization'] ) : '';
							$institute_name  = isset( $value['institute_name'] ) ? esc_attr( $value['institute_name'] ) : '';
							$course_type     = isset( $value['course_type'] ) ? esc_attr( $value['course_type'] ) : '';
							$year_of_passing = isset( $value['year_of_passing'] ) ? esc_attr( $value['year_of_passing'] ) : '';
						?>
				<div class="row wljp_candidate_education_row mt-3">
					<div class="col-sm-6 mt-2">
						<span class="candidate_education_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Education Specialization', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_specialization[]" class="w-100 d-block col" value="<?php echo $specialization; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Institute Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_institute_name[]" class="w-100 d-block col" value="<?php echo $institute_name; ?>">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Course Type', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_education_course_type[]" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::course_types() as $key => $value ) : ?>
							<option <?php selected( $key, $course_type, true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Year of Passing', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_year_of_passing[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>" value="<?php echo $year_of_passing; ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_education_row mt-3">
					<div class="col-sm-6 mt-2">
						<span class="candidate_education_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Education Specialization', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_specialization[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Institute Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_institute_name[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Course Type', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_education_course_type[]" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::course_types() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Year of Passing', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_year_of_passing[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_education_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Skills', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_skills_rows">
				<?php if ( is_array( $skills ) && count ( $skills ) > 0 ) :
						foreach( $skills as $value ) : ?>
				<div class="row wljp_candidate_skills_row">
					<div class="col-sm-12 mt-2">
						<span class="candidate_skills_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Skill', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_skills[]" class="w-100 d-block col" value="<?php echo esc_attr( $value ); ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_skills_row">
					<div class="col-sm-12 mt-2">
						<span class="candidate_skills_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Skill', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_skills[]" class="w-100 d-block col">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_skills_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Certification', WL_JP_DOMAIN ); ?></span></div>
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
						<input type="text" name="candidate_certification_title[]" class="w-100 d-block col" value="<?php echo esc_attr( $certification_title ); ?>">
					</div>
					<div class="col-sm-4 mt-2">
						<label><?php _e( 'Year of Certification', WL_JP_DOMAIN ); ?>:</label>
						<input type="number" step="1" name="candidate_certification_year[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>" value="<?php echo esc_attr( $year_of_certification ); ?>">
					</div>
				</div>
					<?php endforeach;
				else : ?>
				<div class="row wljp_candidate_certification_row">
					<div class="col-sm-8 mt-2">
						<span class="candidate_certification_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Certification Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_certification_title[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-4 mt-2">
						<label><?php _e( 'Year of Certification', WL_JP_DOMAIN ); ?>:</label>
						<input type="number" step="1" name="candidate_certification_year[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>">
					</div>
				</div>
				<?php endif; ?>
			</div>
			<button type="button" id="wljp_candidate_certification_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Desired Job Details', WL_JP_DOMAIN ); ?></span></div>
			<div class="row">
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_desired_job_locations"><?php _e( 'Job Locations', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_locations" id="wljp_candidate_desired_job_locations" class="w-100 d-block col" value="<?php echo $locations_string; ?>" placeholder="<?php _e( 'Separated by comma', WL_JP_DOMAIN ); ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_industry"><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_desired_job_industry" id="wljp_candidate_desired_job_industry" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
						<option <?php selected( $key, $desired_industry, true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_salary"><?php _e( 'Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_salary" id="wljp_candidate_desired_job_salary" class="w-100 d-block col" value="<?php echo $desired_salary; ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_departments"><?php _e( 'Departments', WL_JP_DOMAIN ); ?>:</label><br>
					<select data-placeholder="<?php esc_attr_e( 'Select departments', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_departments[]" id="wljp_candidate_desired_job_departments" class="w-100 d-block col" multiple>
					<?php $department_array = WL_JP_Helper::departments();
						foreach( $department_array as $key => $value ) : ?>
						<option <?php selected( true, in_array( $key, $desired_departments ), true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_types"><?php _e( 'Job Types', WL_JP_DOMAIN ); ?>:</label>
					<select data-placeholder="<?php esc_attr_e( 'Select job types', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_types[]" id="wljp_candidate_desired_job_types" class="w-100 d-block col" multiple>
					<?php $job_type_array = WL_JP_Helper::job_types();
						foreach( $job_type_array as $key => $value ) : ?>
						<option <?php selected( true, in_array( $key, $desired_job_types ), true ); ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="float-right wljp-cv-submit-block">
			<button type="submit" class="wljp-cv-update-submit"><?php esc_html_e( 'Update CV', WL_JP_DOMAIN ); ?></button>
		</div>
	</form>
	<div class="float-left">
		<a href="javascript:void(0)" class="wljp-cv-more-options"><?php _e( 'More Options', WL_JP_DOMAIN ); ?></a>
		<div class="mt-2 wljp-cv-delete">
        	<button type="button" id="wljp-cv-delete-button" class="btn btn-danger" data-message="<?php esc_attr_e( 'Are you sure to delete your CV? All of your job applications will also be removed.', WL_JP_DOMAIN ); ?>"><?php esc_html_e( 'Delete CV', WL_JP_DOMAIN ); ?></button>
		</div>
	</div>
</div>
<?php else : ?>
<div class="col-sm-12 col-md-7 card p-3 mt-3">
	<header>
		<div class="wljp-cv-heading p-3">
			<span><?php _e( 'Register your CV', WL_JP_DOMAIN ); ?></span>
		</div>
	</header>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" id="wljp-cv-form" class="wljp-cv-form">
		<?php $nonce = wp_create_nonce( 'cv' ); ?>
        <input type="hidden" name="cv" value="<?php echo $nonce; ?>">
        <input type="hidden" name="action" value="wljp-cv">

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Personal', WL_JP_DOMAIN ); ?>:</span></div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_name"><?php _e( 'Name', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_name" id="wljp_candidate_personal_name" class="w-100 d-block col">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_email"><?php _e( 'Email Address', WL_JP_DOMAIN ); ?>:</label>
					<input type="email" name="candidate_personal_email" id="wljp_candidate_personal_email" class="w-100 d-block col">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_mobile"><?php _e( 'Mobile', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_mobile" id="wljp_candidate_personal_mobile" class="w-100 d-block col">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_date_of_birth"><?php _e( 'Date of Birth', WL_JP_DOMAIN ); ?>:</label>
					<input type="date" name="candidate_personal_date_of_birth" id="wljp_candidate_personal_date_of_birth" class="w-100 d-block col">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_location"><?php _e( 'Location', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_personal_location" id="wljp_candidate_personal_location" class="w-100 d-block col">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_personal_gender"><?php _e( 'Gender', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_personal_gender" id="wljp_candidate_personal_gender" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::get_gender_list() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Experience', WL_JP_DOMAIN ); ?></span></div>
            <div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_profile_title"><?php _e( 'Profile Title', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_title" id="wljp_candidate_work_experience_profile_title" class="w-100 d-block col">
				</div>
			</div>
            <div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_profile_summary"><?php _e( 'Profile Summary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_profile_summary" id="wljp_candidate_work_experience_profile_summary" class="w-100 d-block col">
				</div>
			</div>
			<div class="row mt-2">
				<div class="form-group col-sm-12">
					<label for="wljp_candidate_work_experience_total_experience"><?php _e( 'Total Experience', WL_JP_DOMAIN ); ?>:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					<select name="candidate_work_experience_total_experience[year]" id="wljp_candidate_work_experience_total_experience_year" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::total_experience_years() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<select name="candidate_work_experience_total_experience[month]" id="wljp_candidate_work_experience_total_experience_month" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::total_experience_months() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_work_experience_salary"><?php _e( 'Current / Latest Annual Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_work_experience_salary" id="wljp_candidate_work_experience_salary" class="w-100 d-block col">
				</div>
				<div class="form-group col-sm-6">
					<label for="wljp_candidate_work_experience_notice_period"><?php _e( 'Notice Period', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_work_experience_notice_period" id="wljp_candidate_work_experience_notice_period" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::notice_period_list() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-12 mt-2 wljp_last_working_day float-right">
					<div class="row">
						<div class="col-md-6"></div>
						<div class="form-group col-md-6">
							<label for="wljp_candidate_work_experience_last_working_day"><?php _e( 'Last working day', WL_JP_DOMAIN ); ?>:</label>
							<input type="date" name="candidate_work_experience_last_working_day" id="wljp_candidate_work_experience_last_working_day" class="w-100 d-block col">
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Employment', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_employment_rows">
				<div class="row wljp_candidate_employment_row mt-3">
					<div class="col-sm-12 mt-2">
						<span class="candidate_employment_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Job Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_job_title[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Company Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_employment_company_name[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_employment_industry[]" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration from', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_from[]" class="w-100 d-block col">
					</div>
					<div class="col-md-6 mt-2">
						<label><?php _e( 'Duration to', WL_JP_DOMAIN ); ?>:</label>
						<input type="date" name="candidate_employment_duration_to[]" class="w-100 d-block col">
					</div>
				</div>
			</div>
			<button type="button" id="wljp_candidate_employment_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Education', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_education_rows">
				<div class="row wljp_candidate_education_row mt-3">
					<div class="col-sm-6 mt-2">
						<span class="candidate_education_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Education Specialization', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_specialization[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Institute Name', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_institute_name[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Course Type', WL_JP_DOMAIN ); ?>:</label>
						<select name="candidate_education_course_type" class="w-100 d-block col">
						<?php foreach( WL_JP_Helper::course_types() as $key => $value ) : ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-sm-6 mt-2">
						<label><?php _e( 'Year of Passing', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_education_year_of_passing[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>">
					</div>
				</div>
			</div>
			<button type="button" id="wljp_candidate_education_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Skills', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_skills_rows">
				<div class="row wljp_candidate_skills_row">
					<div class="col-sm-12 mt-2">
						<span class="candidate_skills_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Skill', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_skills[]" class="w-100 d-block col">
					</div>
				</div>
			</div>
			<button type="button" id="wljp_candidate_skills_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Certification', WL_JP_DOMAIN ); ?></span></div>
			<div id="wljp_candidate_certification_rows">
				<div class="row wljp_candidate_certification_row">
					<div class="col-sm-8 mt-2">
						<span class="candidate_certification_remove_label candidate_remove_label">X</span>
						<label><?php _e( 'Certification Title', WL_JP_DOMAIN ); ?>:</label>
						<input type="text" name="candidate_certification_title[]" class="w-100 d-block col">
					</div>
					<div class="col-sm-4 mt-2">
						<label><?php _e( 'Year of Certification', WL_JP_DOMAIN ); ?>:</label>
						<input type="number" step="1" name="candidate_certification_year[]" class="w-100 d-block col" placeholder="<?php _e( 'Format: XXXX', WL_JP_DOMAIN ); ?>">
					</div>
				</div>
			</div>
			<button type="button" id="wljp_candidate_certification_row_add_more" class="wljp_row_add_more btn btn-sm"><?php esc_html_e( 'Add more', WL_JP_DOMAIN ); ?></button>
		</div>

        <div class="card p-3 mb-4">
            <div class="wljp-cv-section-heading"><span><?php _e( 'Desired Job Details', WL_JP_DOMAIN ); ?></span></div>
			<div class="row">
				<div class="col-sm-12 mt-2">
					<label for="wljp_candidate_desired_job_locations"><?php _e( 'Job Locations', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_locations" id="wljp_candidate_desired_job_locations" class="w-100 d-block col" placeholder="<?php _e( 'Separated by comma', WL_JP_DOMAIN ); ?>">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_industry"><?php _e( 'Industry', WL_JP_DOMAIN ); ?>:</label>
					<select name="candidate_desired_job_industry" id="wljp_candidate_desired_job_industry" class="w-100 d-block col">
					<?php foreach( WL_JP_Helper::industries() as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_salary"><?php _e( 'Salary', WL_JP_DOMAIN ); ?>:</label>
					<input type="text" name="candidate_desired_job_salary" id="wljp_candidate_desired_job_salary" class="w-100 d-block col">
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_departments"><?php _e( 'Departments', WL_JP_DOMAIN ); ?>:</label><br>
					<select data-placeholder="<?php esc_attr_e( 'Select departments', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_departments[]" id="wljp_candidate_desired_job_departments" class="w-100 d-block col" multiple>
					<?php $department_array = WL_JP_Helper::departments();
						foreach( $department_array as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6 mt-2">
					<label for="wljp_candidate_desired_job_types"><?php _e( 'Job Types', WL_JP_DOMAIN ); ?>:</label>
					<select data-placeholder="<?php esc_attr_e( 'Select job types', WL_JP_DOMAIN ); ?>" name="candidate_desired_job_types[]" id="wljp_candidate_desired_job_types" class="w-100 d-block col" multiple>
					<?php $job_type_array = WL_JP_Helper::job_types();
						foreach( $job_type_array as $key => $value ) : ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="float-right wljp-cv-submit-block">
			<button type="submit" class="wljp-cv-submit"><?php _e( 'Register CV', WL_JP_DOMAIN ); ?></button>
		</div>
	</form>
</div>
<?php endif; ?>