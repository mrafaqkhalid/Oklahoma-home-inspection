jQuery(document).ready(function($) {
  try {
    // Navbar toggler handling
    $('.navbar-toggler').on('click', function() {

    
      
      // Toggle between hamburger and close icon
      $icon.toggleClass('fa-bars fa-times');
    });

    // // Mobile dropdown menu handling
    // const isMobile = () => window.innerWidth < 992;
    
    // // Close all dropdowns
    // const closeAllDropdowns = () => {
    //   $('.dropdown-menu').removeClass('show');
    //   $('.dropdown').removeClass('show');
    //   $('.dropdown-toggle').attr('aria-expanded', 'false');
    // };

    // // Handle dropdown clicks
    // $('.dropdown-toggle').on('click', function(e) {
    //   e.preventDefault();
    //   e.stopPropagation();
      
    //   const $dropdown = $(this).closest('.dropdown');
    //   const $menu = $dropdown.find('.dropdown-menu');
    //   const isOpen = $dropdown.hasClass('show');
      
    //   // Close other dropdowns first
    //   $('.dropdown').not($dropdown).removeClass('show');
    //   $('.dropdown-menu').not($menu).removeClass('show');
    //   $('.dropdown-toggle').not(this).attr('aria-expanded', 'false');
      
    //   // Toggle current dropdown
    //   $dropdown.toggleClass('show');
    //   $menu.toggleClass('show');
    //   $(this).attr('aria-expanded', !isOpen);
    // });

    // // Close dropdowns when clicking outside
    // $(document).on('click', function(e) {
    //   if (!$(e.target).closest('.dropdown').length) {
    //     closeAllDropdowns();
    //   }
    // });

    // // Handle window resize
    // $(window).on('resize', function() {
    //   if (!isMobile()) {
    //     closeAllDropdowns();
    //   }
    // });

    // // Initialize dropdowns
    // $('.dropdown-toggle').each(function() {
    //   $(this).attr('aria-expanded', 'false');
    // });

    // Animate On Scroll Init
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 1000, once: true });
      setTimeout(() => AOS.refresh(), 500);
    }

    // Navbar scroll behavior
    let lastScroll = 0;
    const navbar = $('.navbar');
    $(window).on('scroll', function() {
      const st = $(this).scrollTop();
      navbar.toggleClass('scrolled', st > 50);
      navbar.toggleClass('hidden', st > lastScroll);
      lastScroll = st;
    });

    // Step form navigation and validation
    const scheduleForm = $('#inspection-schedule-form');
    const detailsForm = $('#details-form');
    const confirmForm = $('#confirm-form');
    const steps = $('.step-item');
    const progressBar = $('.step-progress-bar');

    let currentStep = 1;

    $('#inspectionDate').attr('min', new Date().toISOString().split('T')[0]);

    function updateSteps(step) {
      const percentage = ((step - 1) / (steps.length - 1)) * 100;
      progressBar.css('width', `${percentage}%`);

      steps.each(function(index) {
        $(this).toggleClass('active', index + 1 === step)
               .toggleClass('completed', index + 1 < step);
      });

      scheduleForm.toggle(step === 1);
      detailsForm.toggle(step === 2);
      confirmForm.toggle(step === 3);
      $('#prevDetailsBtn').css('visibility', step === 1 ? 'hidden' : 'visible');
    }

    function showError(inputId, msgId, condition) {
      const input = $(`#${inputId}`);
      const msg = $(`#${msgId}`);
      if (condition) {
        input.addClass('is-invalid');
        msg.show();
        return false;
      } else {
        input.removeClass('is-invalid');
        msg.hide();
        return true;
      }
    }

    function validateScheduleStep() {
      let valid = true;
      // Date validation
      const dateVal = $('#inspectionDate').val();
      if (!dateVal) {
        $('#inspectionDate').addClass('is-invalid');
        $('#date-required').show();
        valid = false;
      } else {
        $('#inspectionDate').removeClass('is-invalid');
        $('#date-required').hide();
      }
      // Time validation
      const timeVal = $('#inspectionTime').val();
      if (!timeVal) {
        $('#inspectionTime').addClass('is-invalid');
        $('#time-required').show();
        valid = false;
      } else {
        $('#inspectionTime').removeClass('is-invalid');
        $('#time-required').hide();
      }
      return valid;
    }

    function validateDetailsStep() {
      let valid = true;
      // Name: only letters and spaces
      const nameVal = $('#fullName').val().trim();
      if (!/^[a-zA-Z\s]+$/.test(nameVal)) {
        $('#fullName').addClass('is-invalid');
        $('#fullname-required').show();
        valid = false;
      } else {
        $('#fullName').removeClass('is-invalid');
        $('#fullname-required').hide();
      }
      // Phone: exactly 10 digits
      const phoneVal = $('#phoneNumber').val().replace(/\D/g, '');
      if (phoneVal.length !== 10) {
        $('#phoneNumber').addClass('is-invalid');
        $('#phone-required').show();
        valid = false;
      } else {
        $('#phoneNumber').removeClass('is-invalid');
        $('#phone-required').hide();
      }
      // Email: valid format
      const emailVal = $('#email').val().trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(emailVal)) {
        $('#email').addClass('is-invalid');
        $('#email-required').show();
        valid = false;
      } else {
        $('#email').removeClass('is-invalid');
        $('#email-required').hide();
      }
      // Address
      if (!$('#streetAddress').val().trim()) {
        $('#streetAddress').addClass('is-invalid');
        $('#address-required').show();
        valid = false;
      } else {
        $('#streetAddress').removeClass('is-invalid');
        $('#address-required').hide();
      }
      // City
      if (!$('#city').val().trim()) {
        $('#city').addClass('is-invalid');
        $('#city-required').show();
        valid = false;
      } else {
        $('#city').removeClass('is-invalid');
        $('#city-required').hide();
      }
      // State
      if (!$('#state').val().trim()) {
        $('#state').addClass('is-invalid');
        $('#state-required').show();
        valid = false;
      } else {
        $('#state').removeClass('is-invalid');
        $('#state-required').hide();
      }
      // ZIP: 5 digits
      const zipVal = $('#zipCode').val().trim();
      if (!/^\d{5}$/.test(zipVal)) {
        $('#zipCode').addClass('is-invalid');
        $('#zip-required').show();
        valid = false;
      } else {
        $('#zipCode').removeClass('is-invalid');
        $('#zip-required').hide();
      }
      return valid;
    }

    function validateRealtorStep() {
      return showError('realtorName', 'realtor-name-required', !$('#realtorName').val().trim());
    }

    $('#nextBtn').on('click', function() {
      if (validateScheduleStep()) {
        currentStep = 2;
        updateSteps(currentStep);
      }
    });

    $('#prevDetailsBtn').on('click', function() {
      currentStep = 1;
      updateSteps(currentStep);
    });

    $('#nextDetailsBtn').on('click', function() {
      if (validateDetailsStep()) {
        currentStep = 3;
        updateSteps(currentStep);
      }
    });

    $('#prevConfirmBtn').on('click', function() {
      currentStep = 2;
      updateSteps(currentStep);
    });

    $('#submitBtn').on('click', function() {
      if (!validateRealtorStep()) return;

      if (typeof stl_ajax === 'undefined') {
        alert("AJAX settings not defined!");
        return;
      }

      const formData = new FormData();
      formData.append('action', 'submit_inspection_form');
      formData.append('nonce', stl_ajax.nonce);

      const fields = [
        { js: 'inspectionDate', php: 'date' },
        { js: 'inspectionTime', php: 'time' },
        { js: 'fullName', php: 'name' },
        { js: 'phoneNumber', php: 'phone' },
        { js: 'email', php: 'email' },
        { js: 'streetAddress', php: 'address' },
        { js: 'aptSuite', php: 'apt' },
        { js: 'city', php: 'city' },
        { js: 'state', php: 'state' },
        { js: 'zipCode', php: 'zip' },
        { js: 'realtorName', php: 'realtor_name' },
        { js: 'realtorEmail', php: 'realtor_email' },
        { js: 'realtorPhone', php: 'realtor_phone' },
        { js: 'inspectorNotes', php: 'notes' }
      ];
      fields.forEach(field => formData.append(field.php, $(`#${field.js}`).val()));

      const selectedServices = $('input[name="additional-services"]:checked')
        .map(function() { return this.value !== 'none' ? this.value : null; }).get();
      selectedServices.forEach(service => {
        if (service) formData.append('services[]', service);
      });

      $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Submitting...');

      $.ajax({
        url: stl_ajax.ajax_url,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success(response) {
          $('.alert').remove();
          if (response.success) {
            confirmForm.prepend(`<div class="alert alert-success mt-3"><i class="fas fa-check-circle me-2"></i>${response.data.message}</div>`);
            setTimeout(() => {
              scheduleForm[0].reset();
              detailsForm[0].reset();
              confirmForm[0].reset();
              currentStep = 1;
              updateSteps(currentStep);
              $('.alert').remove();
            }, 3000);
          } else {
            confirmForm.prepend(`<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle me-2"></i>${response.data.message}</div>`);
          }
        },
        error() {
          confirmForm.prepend(`<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle me-2"></i>An error occurred. Please try again.</div>`);
        },
        complete() {
          $('#submitBtn').prop('disabled', false).html('Place Order <i class="fas fa-check ms-2"></i>');
          setTimeout(() => $('.alert').remove(), 3000);
        }
      });
    });

    // Input format/validation
    $('input[type="tel"]').on('input', function() {
      let val = this.value.replace(/\D/g, '');
      if (val.length > 0) {
        val = val.length <= 3 ? `(${val}` :
              val.length <= 6 ? `(${val.slice(0, 3)}) ${val.slice(3)}` :
              `(${val.slice(0, 3)}) ${val.slice(3, 6)}-${val.slice(6, 10)}`;
      }
      this.value = val;
    });

    $('#zipCode').on('input', function() {
      const valid = /^\d{5}$/.test(this.value);
      $(this).toggleClass('is-invalid', !valid).toggleClass('is-valid', valid);
    });

    // Live validation feedback for all fields
    $('#inspectionDate').on('input change', function() {
      if ($(this).val()) $(this).removeClass('is-invalid');
    });
    $('#inspectionTime').on('change', function() {
      if ($(this).val()) $(this).removeClass('is-invalid');
    });
    $('#fullName').on('input', function() {
      if (/^[a-zA-Z\s]+$/.test($(this).val().trim())) $(this).removeClass('is-invalid');
    });
    $('#phoneNumber').on('input', function() {
      if ($(this).val().replace(/\D/g, '').length === 10) $(this).removeClass('is-invalid');
    });
    $('#email').on('input', function() {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (emailPattern.test($(this).val().trim())) $(this).removeClass('is-invalid');
    });
    $('#streetAddress').on('input', function() {
      if ($(this).val().trim()) $(this).removeClass('is-invalid');
    });
    $('#city').on('input', function() {
      if ($(this).val().trim()) $(this).removeClass('is-invalid');
    });
    $('#state').on('input', function() {
      if ($(this).val().trim()) $(this).removeClass('is-invalid');
    });
    $('#zipCode').on('input', function() {
      if (/^\d{5}$/.test($(this).val().trim())) $(this).removeClass('is-invalid');
    });

    updateSteps(currentStep);

    // Contact Form Handling
    $('#contactForm').on('submit', function(e) {
      e.preventDefault();
      console.log('Contact form submitted');

      const form = $(this);
      const submitBtn = $('#contactSubmitBtn');
      const formMessages = $('#form-messages');

      // Basic form validation
      if (!form[0].checkValidity()) {
        form.addClass('was-validated');
        return;
      }

      // Show loading state
      submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...');

      // Collect form data
      const formData = new FormData(this);
      formData.append('action', 'submit_contact_form');
      formData.append('nonce', stl_ajax.nonce);

      // Send AJAX request
      $.ajax({
        url: stl_ajax.ajax_url,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success(response) {
          console.log('Contact form AJAX response:', response);
          formMessages.removeClass('alert-danger alert-success');
          
          if (response.success) {
            formMessages.addClass('alert alert-success').html(
              '<i class="fas fa-check-circle me-2"></i>' + response.data.message
            );
            form[0].reset();
            form.removeClass('was-validated');
          } else {
            formMessages.addClass('alert alert-danger').html(
              '<i class="fas fa-exclamation-circle me-2"></i>' + response.data.message
            );
          }
        },
        error(xhr, status, error) {
          console.error('Contact form AJAX error:', { xhr, status, error });
          formMessages.removeClass('alert-success').addClass('alert alert-danger').html(
            '<i class="fas fa-exclamation-circle me-2"></i>An error occurred. Please try again.'
          );
        },
        complete() {
          submitBtn.prop('disabled', false).html('Send Message <i class="fas fa-paper-plane ms-2"></i>');
          setTimeout(() => formMessages.fadeOut(), 5000);
        }
      });
    });

    // Phone number formatting
    $('#contactPhone').on('input', function() {
      let val = this.value.replace(/\D/g, '');
      if (val.length > 0) {
        val = val.length <= 3 ? `(${val}` :
              val.length <= 6 ? `(${val.slice(0, 3)}) ${val.slice(3)}` :
              `(${val.slice(0, 3)}) ${val.slice(3, 6)}-${val.slice(6, 10)}`;
      }
      this.value = val;
    });

  } catch (err) {
    console.error("Form script initialization error:", err);
  }
});



// document.addEventListener("DOMContentLoaded", function () {
//   const nextPageBtn = document.getElementById("nextPageBtn");
//   const previousBtn = document.getElementById("previousBtn");
//   const nextPageNameSpan = document.getElementById("nextPageName");

//   const baseUrl = window.siteBaseUrl;

//   const pages = [
//     { name: "Landing", url: `${baseUrl}/home`, slug: "" },
//     { name: "Meet", url: `${baseUrl}/meet`, slug: "meet" },
//     { name: "Residential", url: `${baseUrl}/residential`, slug: "residential" },
//     { name: "Gas Line", url: `${baseUrl}/gas-line`, slug: "gas-line" },
//     { name: "Infrared Imaging", url: `${baseUrl}/infrared-imaging`, slug: "infrared-imaging" },
//     { name: "Mold Sampling", url: `${baseUrl}/mold-sampling`, slug: "mold-sampling" },
//     { name: "Radon Testing", url: `${baseUrl}/radon-testing`, slug: "radon-testing" },
//     { name: "Sewer Scopes", url: `${baseUrl}/sewer-scopes`, slug: "sewer-scopes" },
//     { name: "Termite Inspections", url: `${baseUrl}/termites-cost-billions`, slug: "termites-cost-billions" },
//     { name: "Contact", url: `${baseUrl}/contact`, slug: "contact" }
//   ];
  

//   const currentSlug = window.currentPageSlug;
//   if (!currentSlug) return;

//   const currentIndex = pages.findIndex(p => p.slug === currentSlug);
//   if (currentIndex === -1) return;

//   // Next page setup
//   if (currentIndex < pages.length - 1) {
//     const nextPage = pages[currentIndex + 1];
//     nextPageNameSpan.textContent = nextPage.name;
//     nextPageBtn.addEventListener("click", function () {
//       window.location.href = nextPage.url;
//     });
//   } else {
//     document.getElementById("nextBtnWrapper").style.display = "none";
//   }

//   // Previous page setup
//   if (currentIndex > 0) {
//     const prevPage = pages[currentIndex - 1];
//     previousBtn.addEventListener("click", function () {
//       window.location.href = prevPage.url;
//     });
//   } else {
//     previousBtn.style.display = "none";
//   }
// });

// Time Picker 

document.addEventListener("DOMContentLoaded", function () {
  flatpickr("#inspectionTime", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K", // 12-hour format with AM/PM
    time_24hr: false,
    minuteIncrement: 10
  });
});


const fullText = `St. Louis City • St. Louis County • Spanish Lake • Florissant • Hazelwood • St. Charles City • St. Charles County • Valley Park • Wildwood • Bridgeton • O’Fallon • St. Peters • Lake St. Louis • Harvester • Maryland Heights • Overland • University City • Chesterfield • Arnold • Pacific • Ballwin • Eureka • Maplewood • Kirkwood • Webster Groves • Rock Hill • Brentwood • Town and Country • Des Peres • Clayton • Creve Coeur • Manchester • Shrewsbury • Fenton • Ladue • Richmond Heights • High Ridge • South County • Jefferson County (Imperial, Hillsboro, Barnhart) • Crestwood • Sunset Hills • Wentzville • Cottleville • Glencoe • Tesson Ferry`;

  const shortText = fullText.slice(0, 222);
  const textElement = document.getElementById('locationsText');
  const button = document.getElementById('toggleButton');

  let isExpanded = false;

  // Set default shortened text
  textElement.textContent = shortText;
  textElement.classList.add('truncated');

  function toggleLocations() {
    if (isExpanded) {
      textElement.textContent = shortText;
      textElement.classList.add('truncated');
      button.textContent = 'View All Locations';
    } else {
      textElement.textContent = fullText;
      textElement.classList.remove('truncated');
      button.textContent = 'Show Less';
    }

    isExpanded = !isExpanded;
  }