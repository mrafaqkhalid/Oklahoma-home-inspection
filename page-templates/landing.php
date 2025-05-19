<?php
/**
 * Template Name: Landing Page
 * Description: A custom landing page template for STL Home Inspection
 * 
 * @package stl
 */

get_header();

?>

<!-- Hero Section -->
<section  id="section1"   class="hero position-relative d-flex text-white shadow-light-dark align-items-center">
  <div class="container-fluid px-5">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="fw-bold display-3">
          Master Certified <br> Thousands Inspected <br> Since
          <span style="color: #bb0a24;">2008</span>
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/src/airforce-retired.svg" -->
          <img src="https://stlhomeinspector.com/wp-content/themes/stlhomeinspector/images/airforce-retired.svg"
            alt="Air Force Logo" class="airforce-logo ms-2">
        </h1>

        <!-- Text with Left Sidebar -->
        <p class="lead with-sidebar">
          <span class="sidebar"></span>
          <span style="color: rgb(255, 69, 0);"> Highly Trained &amp; Observant:</span> Your Best Choice for Home
          Inspections
        </p>

        <!-- CTA Button (Only on MD & SM screens) -->
         <a href="#schedule-inspection"><button class="btn-danger d-lg-none my-5 typography-heading hero-button">New Inspection</button></a>
      </div>

      <!-- Right Side Video -->
      <div class="col-lg-6 text-center">
        <div class="video-wrapper">
          <iframe src="https://www.loom.com/embed/14a8b6e761f8436186f5797081e4795c?sid=1b89bf2b-d8cb-40fc-8513-86f7c34d0f16" 
            title="Meet The Inspector"
            frameborder="0" 
            allowfullscreen
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us   -->
<section   id="section2"  class="primary-color why-choose-us py-5">
  <div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Why Choose Us?</h2>
    <div class="row g-4 text-center mt-4">
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-shield-heart fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">FREE 200% GUARANTEE</h5>
          <p>If you're not satisfied, get a full refund & a new inspector.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-clock-rotate-left fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">Need Quick Turnaround?</h5>
          <p>I'll rearrange my schedule to accommodate urgent inspections.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-handshake fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">Free Buyer Protection Plan</h5>
          <p>Get a discounted second inspection if you don't purchase the first home.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-layer-group fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">Covering All Bases</h5>
          <p>Radon, Mold, Sewer, Termite, and Gas Safety inspections available.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-infinity fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">Service Never Ends</h5>
          <p>Lifetime assistance for your home inspection questions.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up">
        <div class="feature-box shadow p-4">
          <div class="icon">
            <i class="fas fa-file-alt fa-2x text-danger"></i>
          </div>
          <h5 class="fw-bold">Next-Day Reports</h5>
          <p>Reports delivered the next business day, including Gas Safety & Radon tests.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Thank you for serving us -->
<section  id="section3"  class="thank-you-section text-white " style="background: linear-gradient(to right, #bb0a24, #151515);">
  <div class="container-fluid">
    <div class="row ">
      <!-- Left: Content -->
      <div class="col-lg-6 data-aos="fade-right">
       <div class="content-wrap p-5">
       <h2 class="typography-heading mb-3">
          <?php echo esc_html(get_theme_mod('thank_you_title', 'Exclusive Discounts for First Responders')); ?>
        </h2>
        <p class="typography-subheading mb-4 text-white">
          <?php echo esc_html(get_theme_mod('thank_you_subtitle', 'We salute your service to our community')); ?>
        </p>

        <ul class="list-unstyled typography-body">
          <li class="mb-3 d-flex align-items-center">
            <i class="fas fa-fire-extinguisher me-3 fs-4 text-white"></i> Firefighters
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fas fa-shield-alt me-3 fs-4 text-white"></i> Police Officers
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fas fa-user-md me-3 fs-4 text-white"></i> Hospital Personnel
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="fas fa-flag-usa me-3 fs-4 text-white"></i> Military Members
          </li>
        </ul>
       </div>
      </div>

      <!-- Right: Tribute Image or Illustration -->
      <div class="col-lg-6 text-center" data-aos="fade-left">
        <div class="bg-black bg-afaq p-4 rounded shadow">
          <div class="flex-content">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/src/superman.png" alt="Thank You Image"
              class="img-fluid mb-3" style="max-height: 250px;">
            <h3 class="typography-heading">Thank You For Serving</h3>
            <p class="typography-small text-secondary">Your courage and commitment never go unnoticed.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Home Animation & Header -->
<section  id="section4" class="inspector-header primary-color" data-aos="fade-down">
  <div class="container text-center">
    <h1 class="main-title">ST. LOUIS HOME INSPECTOR</h1>
    <div class="divider"></div>
    <p class="intro-text" data-aos="fade-up">
      <?php
      $intro_text = get_theme_mod('inspector_intro_text', 'As a <strong>Certified Master Inspector®</strong> and proud member of InterNACHI and ASHI, I bring extensive knowledge and experience to every inspection. With certifications from InterNACHI and as an IAC2 (Indoor Air Consultant), I have a <strong>unique set of skills</strong> to identify issues others might miss. My goal is to protect your investment and ensure your family\'s safety.<br><br>Specializing in <strong>single-family homes</strong>, <strong>multi-family properties</strong>, <strong>light commercial buildings</strong>, <strong>historical homes</strong>, and <strong>condominiums</strong>, STL Home Inspection Services provides thorough, accurate inspections for your peace of mind.');
      echo wp_kses_post($intro_text);
      ?>
    </p>
  </div>
</section>

<!-- Review Section -->
<section  class="primary-color reviews-section">
  <div class="container text-center">
    <h2 class="section-title" data-aos="zoom-in">WHY CLIENTS TRUST STL HOME INSPECTION SERVICES</h2>

    <!-- Star Ratings -->
    <div class="ratings" data-aos="zoom-in-up">
      <a href="https://www.google.com/maps/place/STL+Home+Inspection+Services/@38.6296704,-90.500588,10z/data=!3m1!4b1!4m6!3m5!1s0x87d8b388045b58bd:0x48cc8c49fcb572ca!8m2!3d38.6296704!4d-90.500588!16s%2Fg%2F12vs2gm4x?entry=ttu&g_ep=EgoyMDI1MDUwNy4wIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="rating-text text-decoration-none">
      <img src="<?php echo get_template_directory_uri(); ?>/src/review.png" alt="Google Rating"
      style="height: 5rem; width: 8rem;">
      <strong class="d-block">4.9 Stars | 236 Reviews</strong>
      </a>
    </div>

    <!-- Feature Grid -->
    <div class="review-grid">
      <div class="review-box" data-aos="fade-right">
        <div class="review-icon"><i class="fas fa-award fa-1x"></i></div>
        <h3>17-Year Industry Veteran</h3>
        <p>Choosing a home inspector can be overwhelming with so many options, including inexperienced newcomers. As a
          seasoned professional with thousands of home inspections under my belt, I'm confident in the quality of my
          work. Many clients have avoided costly repairs thanks to my expertise. Don't just take my word for it—check
          out my top-rated Google reviews. On-site, my knowledge speaks for itself, backed by detailed reports and
          excellent online feedback. I take pride in helping people, earning one of the highest ratings among St.
          Louis home inspectors.</p>
      </div>

      <div class="review-box" data-aos="fade-left">
        <div class="review-icon"><i class="fas fa-file-alt fa-1x"></i></div>
        <h3>Modern Detailed Reports</h3>
        <p>Producing an accurate home inspection report requires thorough research, time on-site, professional tools,
          and a deep understanding of building systems. While no one knows everything, I founded one of the largest
          Facebook forums for home inspectors in the U.S. With over 11,000 members, if I don't know the answer, one of
          them likely does.</p>
      </div>

      <div class="review-box" data-aos="fade-right">
        <div class="review-icon"><i class="fas fa-lock fa-1x"></i></div>
        <h3>Confidential & Insured</h3>
        <p>Your privacy is my priority. I carry professional indemnity and public liability insurance, ensuring full
          protection. Rest assured, your inspection report will remain confidential and will never be shared without
          your explicit consent.
        </p>
      </div>

      <div class="review-box" data-aos="fade-left">
        <div class="review-icon"><i class="fas fa-camera fa-1x"></i></div>
        <h3>Drones & Thermal Scanning</h3>
        <p>Every home inspection I provide includes a complimentary infrared scan, uncovering issues hidden from plain
          sight. For roofs that are steep or hard to reach, I use advanced drone technology or an expandable eye stick
          to ensure a thorough inspection. If you can't be there in person, I'm happy to review the report with you
          via Zoom or Google Meet.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Plans Section -->
<section class="py-5" id="services-pricing-plans" style="background: linear-gradient(135deg, rgb(187, 10, 36), #212529);">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="typography-heading text-white display-5">Our Pricing Plans</h2>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- Residential Card -->
      <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
        <div class="p-4 rounded-4 shadow bg-white h-100 pricing-card position-relative">
          <h5 class="typography-heading mb-4 fs-3" style="color: #bb0a24;">Residential Properties</h5>
          <ul class="list-unstyled typography-body text-dark fs-6">
            <li class="d-flex justify-content-between py-2 border-bottom">Up to 1K Sq Ft <span
                class="fw-bold fs-5 text-dark">$389</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">1,001 – 1,999 Sq Ft <span
                class="fw-bold fs-5 text-dark">$420</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">2,000 – 2,500 Sq Ft <span
                class="fw-bold fs-5 text-dark">$460</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">2,501 – 3,000 Sq Ft <span
                class="fw-bold fs-5 text-dark">$480</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">3,001 – 3,500 Sq Ft <span
                class="fw-bold fs-5 text-dark">$500</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">3,501 – 4,000 Sq Ft <span
                class="fw-bold fs-5 text-dark">$540</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">4,001 – 4,599 Sq Ft <span
                class="fw-bold fs-5 text-dark">$600</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">4,500 – 5,000 Sq Ft <span
                class="fw-bold fs-5 text-dark">$660</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">Condo <span
                class="fw-bold fs-5 text-dark">–$75</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">70+ Year House <span
                class="fw-bold text-dark fs-5">+$50</span></li>
            <li class="d-flex justify-content-between py-2">60+ Miles from Arch <span
                class="fw-bold text-dark fs-5">+$50</span></li>
          </ul>
        </div>
      </div>

      <!-- Ancillary Services -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 rounded-4 shadow bg-white h-100 pricing-card">
          <h5 class="typography-heading mb-4 fs-3" style="color: #bb0a24;">Ancillary Services</h5>
          <ul class="list-unstyled typography-body text-dark fs-6">
            <li class="d-flex justify-content-between py-2 border-bottom">Radon Test <span
                class="fw-bold fs-5 text-dark">$150</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">Gas Safety <span
                class="fw-bold fs-5 text-dark">$200</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">Sewer Scope <span
                class="fw-bold fs-5 text-dark">$180</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">Termite <span
                class="fw-bold fs-5 text-dark">$60</span></li>
            <li class="d-flex justify-content-between py-2 border-bottom">Septic/Well <span class="fw-bold"><i
                  class="fas fa-phone text-dark"></i> Call Us</span></li>
            <li class="d-flex justify-content-between py-2">Mold Air Samples <span
                class="fw-bold fs-5 text-dark">$289</span></li>
          </ul>
          <p class="text-muted typography-small mt-3 fs-6">For 5k+ Sq Ft, commercial or multi please call.</p>
          <p class="text-muted typography-small mt-3 fs-6">💳 We accept Credit, debit, cash, check, bank transfer, Venmo
            or Cash App.</p>
        </div>
      </div>

      <!-- Schedule Instructions -->
      <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
        <div class="p-4 rounded-4 shadow bg-white h-100 d-flex flex-column justify-content-between pricing-card">
          <div>
            <h5 class="typography-heading mb-4 fs-3" style="color: #bb0a24;">Schedule in 2 Minutes</h5>
            <ol class="ps-3 typography-body text-dark fs-6">
              <li class="mb-3"><strong>Choose</strong> Use the form below to choose your preferred date/time and desired
                ancillaries.</li>
              <li class="mb-3"><strong>Tell us</strong> about you, your realtor (if you have one), and the property.
              </li>
              <li class="mb-3"><strong>Submit</strong> the request and get confirmation.</li>
              <li class="mb-3"><strong>Review</strong> A confirmation email will be sent the same day outlining all the
                details.</li>
              <li><strong>We'll schedule</strong> with the listing agent on the Showing Time app.</li>
            </ol>
          </div>

          <!-- Optional visual or note for better balance -->
          <div class="mt-4 text-center text-muted small">
            <i class="fas fa-calendar-check fs-2 text-danger " style="color: #bb0a24 !important;" ></i>
            <p class="mt-2">Inspections are booked 7 days a week!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Schedule Inspection Section -->
<section class="primary-color py-4" id="schedule-inspection">
  <div class="container">
    <!-- Step Indicator -->
    <div class="steps mb-4">
      <div class="step-progress">
        <div class="step-progress-bar" style="width: 33.33%"></div>
      </div>
      <div class="step-items d-flex justify-content-between">
        <div class="step-item active">
          <div class="step-circle">1</div>
          <div class="step-label small">Schedule</div>
        </div>
        <div class="step-item">
          <div class="step-circle">2</div>
          <div class="step-label small">Details</div>
        </div>
        <div class="step-item">
          <div class="step-circle">3</div>
          <div class="step-label small">Realtor Info</div>
        </div>
      </div>
    </div>

    <!-- Section Title -->
    <div class="text-center mb-4">
      <h2 class="h3 fw-bold">Schedule Your Inspection</h2>
      <p class="text-muted mb-0">Select your preferred date, time, and additional services</p>
    </div>

    <!-- Alert Banner -->
    <div class="alert custom-alert d-flex align-items-center mb-4">
      <div class="alert-icon me-3">
        <i class="fas fa-clock text-dark"></i>
      </div>
      <div class="alert-content">
        <h6 class="alert-heading mb-1">Quick Confirmation</h6>
        <p class="mb-0 small">
          Get confirmation in <strong>3 hours or less</strong>. Need urgent assistance?
          <a href="tel:+13148052137" class="alert-link">Call or text (314) 805-2137</a>
        </p>
      </div>
    </div>

    <!-- Main Form -->
    <form id="inspection-schedule-form" class="needs-validation" novalidate method="post" action="<?php echo esc_url( admin_url('/inc/form-handler.php') ); ?>">
    <input type="hidden" name="action" value="submit_inspection_form">
    <!-- Date and Time Selection -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div style="display: inline-flex; align-items: center; margin-bottom: 20px;">
            <i class="fas fa-calendar-alt" style="margin-right: 8px; font-size: 14px;"></i>
            <span style="font-size: 14px;">Choose Date and Time</span>
          </div>

          <div class="row g-3 ">
            <div class="col-md-5 sibling-col">
              <label for="inspectionDate" class="form-label">Preferred Date</label>
              <div class="date-input-group">
                <input type="date" id="inspectionDate" name="inspectionDate" class="form-control" required min="">
                <i class="fas fa-calendar-alt text-dark position-absolute"
                  style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
              </div>
              <div class="text-danger small mt-1" id="date-required" style="display: none;">Please Pick a Date
              </div>
              <div class="text-muted small mt-2">Available Monday through Saturday</div>
            </div>
<!-- Preferred Time Section -->
<div class="col-md-5 sibling-col">
  <label for="inspectionTimeDisplay" class="form-label">Preferred Time</label>
  <div class="position-relative">
    <!-- Readonly display input that triggers time picker -->
    <input type="text" id="inspectionTimeDisplay" class="form-control" placeholder="Click to select time" readonly>
    <i class="fas fa-clock text-dark position-absolute"
       style="right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
  </div>
  <!-- Hidden actual input to submit with form -->
  <input type="hidden" id="inspectionTime" name="inspectionTime">

    <!-- Time Picker Panel (Initially Hidden) -->
  <div class="time-container border rounded p-3 mt-2 bg-light" id="timePickerPanel" style="opacity: 1;display: block;top: 390px;left: 853.828px;">
    <div class="time-label">Enter Time</div>
    <div class="time-boxes d-flex gap-3 mb-3">
      <div class="time-box">
        <input type="number" id="hour" class="form-control" min="1" max="12" value="7">
        <div class="time-label-text text-center small mt-1 d-flex">Hour</div>
      </div>
      <div class="time-box">
        <input type="number" id="minute" class="form-control" min="0" max="59" step="1" value="15">
        <div class="time-label-text text-center small mt-1 d-flex">Minute</div>
      </div>
      <div class="time-box">
        <div class="am-pm d-flex ">
          <button type="button" id="amBtn" class=" btn-sm btn-outline-dark active">AM</button>
          <button type="button" id="pmBtn" class=" btn-sm btn-outline-dark">PM</button>
        </div>
      </div>
    </div>
    <div class="footer-buttons d-flex justify-content-end gap-2">
      <button type="button" class="btn btn-secondary btn-sm" onclick="cancelTime()">Cancel</button>
      <button type="button" class="btn btn-success btn-sm" onclick="submitTime()">OK</button>
    </div>
  </div>

  <div class="text-danger small mt-1" id="time-required" style="display: none;">Please Pick a Time</div>
</div>

            <div class="col-md-2 recommended-col">
              <label class="form-label">Recommended</label>

              <div class="recommended-box">
                <div><i class="fas fa-star text-warning "></i> 8:30 AM</div>
                <div><i class="fas fa-star text-warning"></i> 1:00 PM</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Services -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div style="display: inline-flex; align-items: center; margin-bottom: 20px;">
            <i class="fas fa-plus" style="margin-right: 8px; font-size: 14px;"></i>
            <span style="font-size: 14px;">Additional Services</span>
          </div>

          <div class="services-compact-grid">
            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="termite" value="termite"
                autocomplete="off">
              <label class="service-compact-label" for="termite">
                <i class="fas fa-bug service-icon-small text-dark"></i>
                <span class="service-name">Termite</span>
                <span class="price-small">$60</span>
              </label>
            </div>

            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="gasSafety" value="gasSafety"
                autocomplete="off">
              <label class="service-compact-label" for="gasSafety">
                <i class="fas fa-fire service-icon-small text-dark"></i>
                <span class="service-name">Gas Safety</span>
                <span class="price-small">$200</span>
              </label>
            </div>

            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="radon" value="radon"
                autocomplete="off">
              <label class="service-compact-label" for="radon">
                <i class="fas fa-radiation-alt service-icon-small text-dark"></i>
                <span class="service-name">Radon</span>
                <span class="price-small">$150</span>
              </label>
            </div>

            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="mold" value="mold"
                autocomplete="off">
              <label class="service-compact-label" for="mold">
                <i class="fas fa-microscope service-icon-small text-dark"></i>
                <span class="service-name">Mold</span>
                <span class="price-small">$289</span>
              </label>
            </div>

            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="sewerScope" value="sewerScope"
                autocomplete="off">
              <label class="service-compact-label" for="sewerScope">
                <i class="fas fa-water service-icon-small text-dark"></i>
                <span class="service-name">Sewer</span>
                <span class="price-small">$180</span>
              </label>
            </div>

            <div class="service-compact-card">
              <input type="checkbox" class="btn-check" name="additional-services" id="none" value="none"
                autocomplete="off">
              <label class="service-compact-label" for="none">
                <i class="fas fa-times service-icon-small text-dark"></i>
                <span class="service-name">None</span>
                <span class="price-small">$0</span>
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- Legal Notice -->
      <div class="text-center mb-4">
        <small class="text-muted">
          <i class="fas fa-shield-alt text-dark me-1"></i>
          Protected by reCAPTCHA and subject to Google's
          <a href="https://policies.google.com/privacy" target="_blank" class="text-decoration-none">Privacy Policy</a>
          and
          <a href="https://policies.google.com/terms" target="_blank" class="text-decoration-none">Terms of Service</a>
        </small>
      </div>

      <!-- Navigation Buttons - Schedule Step -->
      <div class="d-flex justify-content-end mt-4">
        <button type="button" id="nextBtn" class="next-previous-btn btn-danger navigation-btn">
          Next
          <i class="fas fa-arrow-right ms-2"></i>
        </button>
      </div>
    </form>

    <!-- Details Form Step -->
    <form id="details-form" class="needs-validation" novalidate style="display: none;">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <!-- Contact Information Section -->
          <div class="d-flex align-items-center gap-2 mb-4">
            <i class="fas fa-user"></i>
            <span>Contact Information</span>
          </div>

          <div class="row g-4">
            <!-- Full Name -->
            <div class="col-md-4">
              <div class="mb-1">Full Name</div>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-user text-muted small-icon"></i>
                </span>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                <div class="invalid-feedback">Please enter your full name</div>
              </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-4">
              <div class="mb-1">Phone Number</div>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-phone text-muted small-icon"></i>
                </span>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="(123) 456-7890" required>
                <div class="invalid-feedback">Please enter a valid phone number</div>
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-4">
              <div class="mb-1">Email Address</div>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-envelope text-muted small-icon"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com" required>
                <div class="invalid-feedback">Please enter a valid email address</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Property Information -->
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2 mb-4"> 
            <i class="fas fa-home"></i>
            <span>Property Details</span>
          </div>

          <div class="row g-4">
            <!-- Street Address -->
            <div class="col-md-12">
              <label for="streetAddress" class="form-label mb-1">Street Address</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-map-marker-alt text-muted small-icon"></i>
                </span>
                <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Enter street address" required>
                <div class="invalid-feedback">Please enter the street address</div>
              </div>
            </div>

            <div class="row g-4 mt-1">
              <!-- Apartment/Suite -->
              <div class="col-md-3">
                <label for="aptSuite" class="form-label">Apt/Suite <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="aptSuite" placeholder="Apt or Suite number">
              </div>

              <!-- City -->
              <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter city" required>
                <div class="invalid-feedback">Please enter the city name</div>
              </div>

              <!-- State -->
              <div class="col-md-2">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" placeholder="Enter state" maxlength="50" required>
                <div class="invalid-feedback">Please enter the state</div> 
              </div>

              <!-- ZIP Code -->
              <div class="col-md-3">
                <label for="zipCode" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zipCode" placeholder="12345" maxlength="5" required>
                <div class="invalid-feedback">Please enter a valid ZIP code</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Buttons - Details Step -->
      <div class="d-flex justify-content-between align-items-center mt-4">
        <button type="button" id="prevDetailsBtn" class="next-previous-btn btn-outline-danger navigation-btn">
          <i class="fas fa-arrow-left me-2"></i>
          Previous
        </button>
        <button type="button" id="nextDetailsBtn" class="next-previous-btn btn-danger navigation-btn">
          Next
          <i class="fas fa-arrow-right ms-2"></i>
        </button>
      </div>
    </form>

    <!-- Realtor Info Form Step -->
    <form id="confirm-form" class="needs-validation" novalidate style="display: none;">
      <div class="card shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex align-items-center gap-2 mb-4">
            <i class="fas fa-user-tie"></i>
            <span>Realtor Information</span>
          </div>

          <div class="row g-4">
            <!-- Realtor Name -->
            <div class="col-md-4">
              <label for="realtorName" class="form-label mb-1">Who is your realtor or rep?</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-user text-muted small-icon"></i>
                </span>
                <input type="text" class="form-control" id="realtorName" placeholder="Your realtor or representative"
                  required>
                <div class="invalid-feedback">Please enter your realtor's name</div>
              </div>
            </div>

            <!-- Realtor Email -->
            <div class="col-md-4">
              <label for="realtorEmail" class="form-label mb-1">What is their email address?</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-envelope text-muted small-icon"></i>
                </span>
                <input type="email" class="form-control" id="realtorEmail" placeholder="Your realtor email" required>
                <div class="invalid-feedback">Please enter your realtor's email address</div>
              </div>
            </div>

            <!-- Realtor Phone -->
            <div class="col-md-4">
              <label for="realtorPhone" class="form-label mb-1">May I have their phone number please?</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent">
                  <i class="fas fa-phone text-muted small-icon"></i>
                </span>
                <input type="tel" class="form-control" id="realtorPhone" placeholder="Your realtor contact" required>
                <div class="invalid-feedback">Please enter your realtor's phone number</div>
              </div>
            </div>

            <!-- Notes -->
            <div class="col-12 mt-4">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-clipboard text-danger"></i>
                    <label for="inspectorNotes" class="form-label mb-0 fw-medium">Notes For The Inspector</label>
                  </div>
                  <textarea class="form-control border-0 bg-light" id="inspectorNotes"
                    style="resize: none; font-size: 15px; height: 200px;"
                    placeholder="Please include any specific instructions, concerns, or additional information that would be helpful for the inspector to know before the inspection."></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="d-flex justify-content-between align-items-center mt-4">
        <button type="button" id="prevConfirmBtn" class="next-previous-btn btn-outline-danger navigation-btn">
          <i class="fas fa-arrow-left me-2"></i>
          Previous
        </button>
        <button type="button" id="submitBtn" class="next-previous-btn btn-danger navigation-btn">
          Place Order
          <i class="fas fa-check ms-2"></i>
        </button>
      </div>
    </form>
  </div>
</section>


<script>
 const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  let lastScrollTop = 0;

  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > lastScrollTop && currentScroll > 100) {
      // Show when scrolling down
      prevBtn.classList.add("show");
      nextBtn.classList.add("show");
    } else {
      // Hide when scrolling up or near top
      prevBtn.classList.remove("show");
      nextBtn.classList.remove("show");
    }

    lastScrollTop = currentScroll;
  });
</script>

<!-- Rest of the sections... -->
<?php get_footer(); ?>
