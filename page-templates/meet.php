<?php /* Template Name: Meet */ get_header(); ?>

<section class="py-5 bg-light pages-top-margin">
  <div class="container">
    <div class="row g-4 align-items-start d-flex flex-column flex-lg-row py-5">

      <!-- Sidebar (Inspector Card) -->
      <div class="respnsiveness col-lg-4 col-md-12 order-1 order-lg-2 inspector-sidebar d-flex" data-aos="fade-left">
        <div class="card border-0 shadow-lg p-4 text-center w-100 d-flex flex-column">
          <!-- Inspector Image -->
          <div class="mb-4">
            <img src="https://stlhomeinspector.com/wp-content/themes/stlhomeinspector/images/billyboernerhomeinspector.jpg"
              alt="Billy Boerner" class="rounded-circle border border-3 mx-auto"
              style="width: 140px; height: 140px; object-fit: cover; border-color: rgb(206, 78, 64);">
          </div>

          <!-- Inspector Name and Title -->
          <h5 class="mt-3 typography-heading">Billy Boerner</h5>
          <p class="text-muted typography-small mb-2">Certified Home Inspector</p>

          <!-- Certifications and Badges -->
          <div class="d-flex justify-content-center flex-wrap gap-3 my-2">
            <span class="badge typography-small text-white" style="background-color: rgb(34, 37, 41);">InterNACHI</span>
            <span class="badge typography-small text-black" style="background-color: #bebebe;">ASHI</span>
            <span class="badge typography-small text-white" style="background-color: #bb0a24;">Master Certified</span>
          </div>

          <!-- Inspector Bio -->
          <p class="text-muted typography-small mt-2">
            <b> STL Home Inspection Services</b> was founded in 2008 during my time in the U.S. military, fueled by a long-standing passion for construction that began while I was leading renovation projects. Over the years, I have had the privilege of inspecting thousands of homes and commercial properties throughout St. Louis and the surrounding areas, helping clients avoid costly financial mistakes. As your dedicated home inspector, I hold certifications from InterNACHI (International Association of Certified Home Inspectors) and am a proud member of ASHI (American Society of Home Inspectors) and IAC2 (International Association of Certified Indoor Air Consultants). Your best interests are my utmost priority.
          </p>
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="faq-section col-lg-8 col-md-12 order-2 order-lg-1 d-flex" data-aos="fade-right">
        <div class="card border-0 shadow-lg p-4 w-100 d-flex flex-column">
          <h2 class="typography-heading mb-4">Frequently Asked Questions</h2>

          <!-- Accordion FAQ -->
          <div class="accordion" id="faqAccordion">
            <?php
            $faqs = [
              "Can I follow you during the inspection?" => "Absolutely! I encourage it.",
              "How long does the inspection take?" => "Inspections typically last 2.5 to 4 hours.",
              "How will I receive my inspection report?" => "You'll receive your report by email within 24 hours.",
              "What are the costs of your services?" => '<a href="' . esc_url(home_url('#services-pricing-plans')) . '">Click here for services and pricing.</a>',
              "Do you have a SUPRA Key?" => "Yes, I do.",
              "Do you conduct all inspections yourself?" => "I conduct building, radon, and mold inspections. Gas, sewer, and termite inspections are done by qualified third parties.",
              "What payment options do you accept?" => "We accept cash, checks, credit cards, and Venmo.",
              "Will there be pictures in my report?" => "Yes, I include pictures to help illustrate the findings.",
              "How thorough is your inspection process?" => "Attention to detail is my top priority. With 229 Google reviews and more, my clients' satisfaction speaks volumes."
            ];

            $i = 0;
            foreach ($faqs as $question => $answer) {
              $collapseId = "faqCollapse" . $i;
              echo "
                <div class='accordion-item'>
                  <h2 class='accordion-header' id='heading{$i}'>
                    <button class='accordion-button " . ($i !== 0 ? "collapsed" : "") . "' type='button' data-bs-toggle='collapse' data-bs-target='#{$collapseId}' aria-expanded='" . ($i === 0 ? "true" : "false") . "' aria-controls='{$collapseId}'>
                      {$question}
                    </button>
                  </h2>
                  <div id='{$collapseId}' class='accordion-collapse collapse " . ($i === 0 ? "show" : "") . "' aria-labelledby='heading{$i}' data-bs-parent='#faqAccordion'>
                    <div class='accordion-body typography-body'>
                      {$answer}
                    </div>
                  </div>
                </div>
              ";
              $i++;
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
