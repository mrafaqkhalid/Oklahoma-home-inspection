<!-- Radon Testing Saves Lives Page Template -->
<?php /* Template Name: Radon Testing */ get_header(); ?>

<section class="py-5 bg-light pages-top-margin">
  <div class="container">
    <div class="row align-items-center py-5">

      <!-- Left Text Content -->
      <div class="col-md-6" data-aos="fade-right">
        <h2 class="fw-bold text-dark mb-3" style="font-size: 1.75rem;">Radon Testing Saves Lives</h2>

        <p class="text-muted" style="font-size: 0.95rem;">
          Radon is a radioactive gas found in the earth. It is a colorless, odorless, tasteless gas that can be harmful to human health. Radon gas is produced when uranium is mined in the ground. Uranium is a naturally occurring element found in all soils, but it is more concentrated in some soils than in others.
        </p>

        <p class="text-muted" style="font-size: 0.95rem;">
          Radon gas can enter homes and buildings through cracks in the foundation, walls, and floors. Inside, radon gas can accumulate in the air and be inhaled by people. When radon gas is inhaled, it can damage the lungs and increase the risk of lung cancer.
        </p>

        <p class="text-muted" style="font-size: 0.95rem;">
          The Environmental Protection Agency (EPA) estimates that radon is the second leading cause of lung cancer in the United States, after smoking. Each year, about 21,000 people die from lung cancer caused by radon exposure.
        </p>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center" data-aos="fade-left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/radon-testing.png"
             alt="Radon Detector Device"
             class="img-fluid rounded shadow"
             style="height: 400px; width: 100%; object-fit: cover;">
      </div>
    </div>

    <!-- Below Full-width Extra Content -->
    <div class="row mt-4" data-aos="fade-up">
      <div class="col">
        <ul class="text-muted" style="font-size: 0.95rem; list-style: none; padding-left: 0;">
          <li><strong class="text-danger">Installing a radon remediation system</strong> – a device installed in your home to remove radon gas from the air.</li>
          <li><strong class="text-danger">Sealing cracks and crevices</strong> – in your home's foundation, walls, and floors to prevent radon entry.</li>
          <li><strong class="text-danger">Increasing ventilation</strong> – open windows/doors or install fans to improve airflow.</li>
        </ul>
        <p class="text-muted" style="font-size: 0.95rem;">
          We utilize a 3rd party who will set up a calibrated instrument known as the <strong>Sun Nuclear Radon monitor</strong>, which is both AARST and NRPP certified. The test takes 2 days, and results are delivered on the day of pickup. <strong>No pickups are conducted on weekends.</strong> Rest assured, your family's safety is our #1 priority.
        </p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
