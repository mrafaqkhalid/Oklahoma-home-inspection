// jQuery(document).ready(function($) {
//     // Form navigation
//     const scheduleForm = $('#inspection-schedule-form');
//     const detailsForm = $('#details-form');
//     const confirmForm = $('#confirm-form');
    
//     // Navigation buttons
//     $('#nextBtn').on('click', function() {
//         if (validateScheduleForm()) {
//             scheduleForm.hide();
//             detailsForm.show();
//             updateStepProgress(2);
//         }
//     });

//     $('#prevDetailsBtn').on('click', function() {
//         detailsForm.hide();
//         scheduleForm.show();
//         updateStepProgress(1);
//     });

//     $('#nextDetailsBtn').on('click', function() {
//         if (validateDetailsForm()) {
//             detailsForm.hide();
//             confirmForm.show();
//             updateStepProgress(3);
//         }
//     });

//     $('#prevConfirmBtn').on('click', function() {
//         confirmForm.hide();
//         detailsForm.show();
//         updateStepProgress(2);
//     });

//     // Update step progress
//     function updateStepProgress(step) {
//         $('.step-item').removeClass('active');
//         $(`.step-item:nth-child(${step})`).addClass('active');
//         $('.step-progress-bar').css('width', `${(step - 1) * 50}%`);
//     }

//     // Form validation functions
//     function validateScheduleForm() {
//         let isValid = true;
//         const date = $('#inspectionDate').val();
//         const time = $('#inspectionTime').val();

//         // Reset error messages
//         $('.text-danger').hide();

//         // Validate date
//         if (!date) {
//             $('#date-required').show();
//             isValid = false;
//         } else {
//             const selectedDate = new Date(date);
//             const today = new Date();
//             if (selectedDate < today) {
//                 $('#date-invalid').show();
//                 isValid = false;
//             }
//         }

//         // Validate time
//         if (!time) {
//             $('#time-required').show();
//             isValid = false;
//         }

//         return isValid;
//     }

//     function validateDetailsForm() {
//         let isValid = true;
//         const requiredFields = ['fullName', 'phoneNumber', 'email', 'streetAddress', 'city', 'state', 'zipCode'];

//         // Reset error messages
//         $('.text-danger').hide();

//         // Validate required fields
//         requiredFields.forEach(field => {
//             const value = $(`#${field}`).val();
//             if (!value) {
//                 $(`#${field}-required`).show();
//                 isValid = false;
//             }
//         });

//         // Validate email format
//         const email = $('#email').val();
//         if (email && !isValidEmail(email)) {
//             $('#email-required').show();
//             isValid = false;
//         }

//         // Validate phone format
//         const phone = $('#phoneNumber').val();
//         if (phone && !isValidPhone(phone)) {
//             $('#phone-required').show();
//             isValid = false;
//         }

//         return isValid;
//     }

//     // Helper validation functions
//     function isValidEmail(email) {
//         return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
//     }

//     function isValidPhone(phone) {
//         return /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(phone);
//     }

//     // Form submission
//     $('#submitBtn').on('click', function(e) {
//         e.preventDefault();
        
//         if (validateConfirmForm()) {
//             const formData = new FormData();
            
//             // Schedule form data
//             formData.append('date', $('#inspectionDate').val());
//             formData.append('time', $('#inspectionTime').val());
//             formData.append('services', $('input[name="additional-services"]:checked').map(function() {
//                 return this.value;
//             }).get().join(','));

//             // Details form data
//             formData.append('name', $('#fullName').val());
//             formData.append('phone', $('#phoneNumber').val());
//             formData.append('email', $('#email').val());
//             formData.append('address', $('#streetAddress').val());
//             formData.append('apt', $('#aptSuite').val());
//             formData.append('city', $('#city').val());
//             formData.append('state', $('#state').val());
//             formData.append('zip', $('#zipCode').val());

//             // Realtor form data
//             formData.append('realtor_name', $('#realtorName').val());
//             formData.append('realtor_email', $('#realtorEmail').val());
//             formData.append('realtor_phone', $('#realtorPhone').val());
//             formData.append('notes', $('#inspectorNotes').val());
//             formData.append('action', 'submit_inspection_form');
//             formData.append('nonce', stl_ajax.nonce);

//             // Show loading state
//             const submitBtn = $(this);
//             const originalText = submitBtn.html();
//             submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');

//             // Send AJAX request
//             $.ajax({
//                 url: stl_ajax.ajax_url,
//                 type: 'POST',
//                 data: formData,
//                 processData: false,
//                 contentType: false,
//                 success: function(response) {
//                     if (response.success) {
//                         showSuccessMessage(response.data.message);
//                         resetForms();
//                     } else {
//                         showErrorMessage(response.data.message);
//                     }
//                 },
//                 error: function() {
//                     showErrorMessage('An error occurred. Please try again later.');
//                 },
//                 complete: function() {
//                     submitBtn.prop('disabled', false).html(originalText);
//                 }
//             });
//         }
//     });

//     function validateConfirmForm() {
//         let isValid = true;
//         const realtorName = $('#realtorName').val();

//         if (!realtorName) {
//             $('#realtor-name-required').show();
//             isValid = false;
//         }

//         return isValid;
//     }

//     function showSuccessMessage(message) {
//         const alert = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
//             message +
//             '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
//             '</div>');
//         $('.container').prepend(alert);
//     }

//     function showErrorMessage(message) {
//         const alert = $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
//             message +
//             '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
//             '</div>');
//         $('.container').prepend(alert);
//     }

//     function resetForms() {
//         scheduleForm[0].reset();
//         detailsForm[0].reset();
//         confirmForm[0].reset();
//         scheduleForm.show();
//         detailsForm.hide();
//         confirmForm.hide();
//         updateStepProgress(1);
//     }

//     // Set minimum date for date picker
//     const today = new Date().toISOString().split('T')[0];
//     $('#inspectionDate').attr('min', today);
// }); 