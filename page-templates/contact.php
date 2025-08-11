<?php /* Template Name: Client Care */ get_header(); ?>

<section class="py-5 bg-light pages-top-margin">
  <div class="container">
    <div class="row align-items-start gy-4 py-5">
      <!-- Left Column -->
      <div class="col-lg-6" data-aos="fade-right">
        <h2 class="fw-bold text-dark mb-3">CLIENT CARE</h2>
        <p class="text-muted fs-6">
          Have questions? We have answers! Oklahoma Home Inspector & Pest Control is here for you Monday to Saturday, 9 AM to 5 PM.
        </p>
        <p class="text-muted fs-6">
          Call us at <strong>NW OK 580 707 4204, OKC 405 463 1738</strong> or use the form below to message us, and we'll respond within three hours or less!
        </p>
      </div>

      <!-- Right Column (Contact Form) -->
      <div class="col-lg-6" data-aos="fade-left">
        <h4 class="fw-semibold text-dark mb-5">Message us</h4>
        <div id="form-messages"></div>
        <form id="contactForm" class="needs-validation" novalidate>
          <?php wp_nonce_field('stl_nonce', 'nonce'); ?>
          <input type="hidden" name="action" value="submit_contact_form">
          <div class="mb-3">
            <label for="contactName" class="form-label">Your Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="contactName" name="name" required>
            <div class="invalid-feedback">Please enter your name.</div>
          </div>
          <div class="mb-3">
            <label for="contactEmail" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="contactEmail" name="email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>
          <div class="mb-3">
            <label for="contactPhone" class="form-label">Your Phone</label>
            <input type="tel" class="form-control optional" id="contactPhone" name="phone">
          </div>
          <div class="mb-3">
            <label for="contactSubject" class="form-label">Subject <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" id="contactSubject" name="subject" required>
            <div class="invalid-feedback">Please enter a subject.</div>
          </div>
        <div class="mb-3">
          <label for="contactMessage" class="form-label">
            Message <span class="text-danger">*</span>
          </label>
          <textarea class="form-control" id="contactMessage" name="message" required rows="5" style="height: auto;"></textarea>
          <div class="invalid-feedback">Please enter a message.</div>
        </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="next-previous-btn btn-danger" id="contactSubmitBtn">
              Send Message <i class="fas fa-paper-plane ms-2"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
// Enqueue script with localized data
wp_enqueue_script('stl-contact-form', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
wp_localize_script('stl-contact-form', 'stl_ajax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('stl_nonce')
));
?>

<?php get_footer(); ?>