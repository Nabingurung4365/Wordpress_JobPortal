jQuery(document).ready(function($) {
	try {
		$("#post").validate();
	} catch (e) {}

	var wljpJobSalary = $('.wljp_job_salary');
	var wljpJobSalaryValue = $('input[name="wljp_job_salary"]:checked').val();
	if(wljpJobSalaryValue == 'range') {
		wljpJobSalary.show();
	} else {
		wljpJobSalary.hide();
	}
	$('input[name="wljp_job_salary"]').on('change', function() {
		if(this.value == 'range') {
			wljpJobSalary.fadeIn();
		} else {
			wljpJobSalary.fadeOut();
		}
	});

	var wljpLastWorkingDay = $('.wljp_last_working_day');
	var wljpNoticePeriod = $('select[name="candidate_work_experience_notice_period"]').val();
	if(wljpNoticePeriod == 'current') {
		wljpLastWorkingDay.show();
	} else {
		wljpLastWorkingDay.hide();
	}
	$('select[name="candidate_work_experience_notice_period"]').on('change', function() {
		if(this.value == 'current') {
			wljpLastWorkingDay.fadeIn();
		} else {
			wljpLastWorkingDay.fadeOut();
		}
	});

	try {
		var wljpJobDepartments = $('#wljp_candidate_desired_job_departments');
		var wljpJobDepartmentsPlaceholder = wljpJobDepartments.data('placeholder');
		wljpJobDepartments.fSelect({
			'placeholder': wljpJobDepartmentsPlaceholder
		});

		var wljpJobTypes = $('#wljp_candidate_desired_job_types');
		var wljpJobTypesPlaceholder = wljpJobTypes.data('placeholder');
		wljpJobTypes.fSelect({
			'placeholder': wljpJobTypesPlaceholder
		});
	} catch (e) {}

	$(document).on('click', '#wljp_candidate_education_row_add_more', function() {
		$('.wljp_candidate_education_row').first().clone().find('input').attr({ value: '' }).end().appendTo('#wljp_candidate_education_rows');
	});
	$(document).on('click', '.candidate_education_remove_label', function() {
		if ( $('.wljp_candidate_education_row').length > 1 ) {
			$(this).parent().parent().remove();
		}
	});

	$(document).on('click', '#wljp_candidate_employment_row_add_more', function() {
		 $('.wljp_candidate_employment_row').first().clone().find('input').attr({ value: '' }).end().appendTo('#wljp_candidate_employment_rows');
	});
	$(document).on('click', '.candidate_employment_remove_label', function() {
		if (  $('.wljp_candidate_employment_row').length > 1 ) {
			$(this).parent().parent().remove();
		}
	});

	$(document).on('click', '#wljp_candidate_certification_row_add_more', function() {
		$('.wljp_candidate_certification_row').first().clone().find('input').attr({ value: '' }).end().appendTo('#wljp_candidate_certification_rows');
	});
	$(document).on('click', '.candidate_certification_remove_label', function() {
		if ( $('.wljp_candidate_certification_row').length > 1 ) {
			$(this).parent().parent().remove();
		}
	});

	$(document).on('click', '#wljp_candidate_skills_row_add_more', function() {
		$('.wljp_candidate_skills_row').first().clone().find('input').attr({ value: '' }).end().appendTo('#wljp_candidate_skills_rows');
	});
	$(document).on('click', '.candidate_skills_remove_label', function() {
		if ( $('.wljp_candidate_skills_row').length > 1 ) {
			$(this).parent().parent().remove();
		}
	});

	/* Copy target content to clipboard on click */
	function copyToClipboard(selector, target) {
		$(document).on('click', selector, function() {
			var value = $(target).text();
			var temp = $("<input>");
			$("body").append(temp);
			temp.val(value).select();
			document.execCommand("copy");
			temp.remove();
			toastr.success('Copied to clipboard.');
		});
	}

	copyToClipboard('#wljp_job_portal_shortcode_copy', '#wljp_job_portal_shortcode');
	copyToClipboard('#wljp_job_portal_account_shortcode_copy', '#wljp_job_portal_account_shortcode');
});