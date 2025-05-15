// jQuery(document).ready(function($) {
//     // Form handling
//     const form = $('#inspection-form');
//     const nextBtn = $('#nextBtn');
//     const prevBtn = $('#prevBtn');
//     const progressBar = $('.progress-bar');
//     const steps = $('.form-step');
//     let currentStep = 0;

//     // Set minimum date to today
//     const today = new Date().toISOString().split('T')[0];
//     $('#inspection-date').attr('min', today);

//     // Next button click handler
//     if (nextBtn.length) {
//         nextBtn.on('click', function() {
//             if (validateStep(currentStep)) {
//                 currentStep++;
//                 updateSteps();
//             }
//         });
//     }

//     // Previous button click handler
//     if (prevBtn.length) {
//         prevBtn.on('click', function() {
//             currentStep--;
//             updateSteps();
//         });
//     }

//     // Update steps and progress bar
//     function updateSteps() {
//         steps.hide();
//         $(steps[currentStep]).show();
        
//     // Update progress bar
//         const progress = ((currentStep + 1) / steps.length) * 100;
//         progressBar.css('width', progress + '%');

//     // Update button visibility
//         prevBtn.toggle(currentStep > 0);
//         nextBtn.toggle(currentStep < steps.length - 1);
//     }

//     // Validate current step
//     function validateStep(step) {
//         let isValid = true;
//         const currentForm = $(steps[step]);
        
//         // Clear previous validation messages
//         currentForm.find('.invalid-feedback').remove();
//         currentForm.find('.is-invalid').removeClass('is-invalid');
        
//         // Validate based on step
//         switch(step) {
//             case 0: // Schedule step
//                 const date = $('#inspection-date').val();
//                 const time = $('#inspection-time').val();
                
//                 if (!date) {
//                     showError('#inspection-date', 'Please select a date');
//       isValid = false;
//                 }
                
//                 if (!time) {
//                     showError('#inspection-time', 'Please select a time');
//       isValid = false;
//                 }
//                 break;
                
//             case 1: // Details step
//                 const name = $('#client-name').val();
//                 const email = $('#client-email').val();
//                 const phone = $('#client-phone').val();
                
//                 if (!name) {
//                     showError('#client-name', 'Please enter your name');
//       isValid = false;
//                 }
                
//                 if (!email) {
//                     showError('#client-email', 'Please enter your email');
//                     isValid = false;
//                 } else if (!isValidEmail(email)) {
//                     showError('#client-email', 'Please enter a valid email');
//                     isValid = false;
//                 }
                
//                 if (!phone) {
//                     showError('#client-phone', 'Please enter your phone number');
//                     isValid = false;
//                 }
//                 break;
                
//             case 2: // Realtor step
//                 const realtorName = $('#realtor-name').val();
//                 const realtorEmail = $('#realtor-email').val();
                
//                 if (!realtorName) {
//                     showError('#realtor-name', 'Please enter realtor name');
//         isValid = false;
//                 }
                
//                 if (!realtorEmail) {
//                     showError('#realtor-email', 'Please enter realtor email');
//                     isValid = false;
//                 } else if (!isValidEmail(realtorEmail)) {
//                     showError('#realtor-email', 'Please enter a valid email');
//           isValid = false;
//           }
//                 break;
//       }

//       return isValid;
//   }

//     // Show error message
//     function showError(selector, message) {
//         const input = $(selector);
//         input.addClass('is-invalid');
//         input.after(`<div class="invalid-feedback">${message}</div>`);
//     }

//     // Email validation
//     function isValidEmail(email) {
//         const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//         return re.test(email);
//     }

//     // Form submission
//     if (form.length) {
//         form.on('submit', function(e) {
//             e.preventDefault();
            
//             if (validateStep(currentStep)) {
//       const formData = {
//                     action: 'submit_inspection_form',
//                     nonce: $('#inspection-nonce').val(),
//                     date: $('#inspection-date').val(),
//                     time: $('#inspection-time').val(),
//                     name: $('#client-name').val(),
//                     email: $('#client-email').val(),
//                     phone: $('#client-phone').val(),
//                     address: $('#property-address').val(),
//                     realtor_name: $('#realtor-name').val(),
//                     realtor_email: $('#realtor-email').val(),
//                     notes: $('#additional-notes').val()
//                 };

//                 $.ajax({
//                     url: stl_ajax.ajax_url,
//                     type: 'POST',
//                     data: formData,
//                     beforeSend: function() {
//                         form.find('.form-message').remove();
//                         form.prepend('<div class="alert alert-info">Submitting form...</div>');
//                     },
//                     success: function(response) {
//                         form.find('.alert').remove();
//                         if (response.success) {
//                             form.prepend('<div class="alert alert-success">' + response.data.message + '</div>');
//                             form[0].reset();
//                             currentStep = 0;
//                             updateSteps();
//       } else {
//                             form.prepend('<div class="alert alert-danger">' + response.data.message + '</div>');
//                         }
//                     },
//                     error: function() {
//                         form.find('.alert').remove();
//                         form.prepend('<div class="alert alert-danger">An error occurred. Please try again.</div>');
//           }
//         });
//       }
//     });
//     }

//     // Real-time validation for date and time
//     $('#inspection-date, #inspection-time').on('change', function() {
//         const input = $(this);
//         input.removeClass('is-invalid');
//         input.next('.invalid-feedback').remove();
        
//         if (!input.val()) {
//             showError(input.attr('id'), 'This field is required');
//         }
//     });

//     // Initialize steps
//     updateSteps();
// }); 


// // pages animation on scroll

// AOS.init({
//     duration: 1000,
//     once: true
//   });