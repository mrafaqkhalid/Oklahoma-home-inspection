<?php /* Template Name: Residential Inspections */ ?>
<?php get_header(); ?>

<!-- Residential Inspections Section -->
<section class="bg-light py-5 pages-top-margin">
  <div class="container">
  <div class="row align-items-center py-5">
    <!-- Text & Lists -->
    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
      <h2 class="fw-bold text-uppercase">Residential Inspections</h2>
      <p class="text-muted">What do you inspect? What's included? We get this question all the time. Below are systems and components we inspect.</p>

      <div class="row">
        <div class="col-6">
          <ul class="list-unstyled">
            <li><i class="fas fa-check text-danger me-2"></i>Roof</li>
            <li><i class="fas fa-check text-danger me-2"></i>Foundation</li>
            <li><i class="fas fa-check text-danger me-2"></i>Structure</li>
            <li><i class="fas fa-check text-danger me-2"></i>Cooling</li>
            <li><i class="fas fa-check text-danger me-2"></i>Electrical</li>
            <li><i class="fas fa-check text-danger me-2"></i>Attic</li>
            <li><i class="fas fa-check text-danger me-2"></i>Ventilation</li>
            <li><i class="fas fa-check text-danger me-2"></i>Windows</li>
          </ul>
        </div>
        <div class="col-6">
          <ul class="list-unstyled">
            <li><i class="fas fa-check text-danger me-2"></i>Exterior</li>
            <li><i class="fas fa-check text-danger me-2"></i>Crawl</li>
            <li><i class="fas fa-check text-danger me-2"></i>Heating</li>
            <li><i class="fas fa-check text-danger me-2"></i>Plumbing</li>
            <li><i class="fas fa-check text-danger me-2"></i>Fireplace</li>
            <li><i class="fas fa-check text-danger me-2"></i>Insulation</li>
            <li><i class="fas fa-check text-danger me-2"></i>Doors</li>
            <li><i class="fas fa-check text-danger me-2"></i>Interior</li>
          </ul>
        </div>
      </div>

      <h5 class="mt-4 fw-semibold">Additional Services Offered:</h5>
      <div class="d-flex flex-wrap gap-2">
        <span class="badge bg-danger"><i class="fas fa-vial me-1"></i>Radon Testing</span>
        <span class="badge bg-danger"><i class="fas fa-video me-1"></i>Sewer Video Scopes</span>
        <span class="badge bg-danger"><i class="fas fa-gas-pump me-1"></i>Gas Line Pressure</span>
        <span class="badge bg-danger"><i class="fas fa-bug me-1"></i>Termites Inspection</span>
        <span class="badge bg-danger"><i class="fas fa-dna me-1"></i>Mold Sampling</span>
      </div>

      <p class="text-muted mt-3">
        <i class="fas fa-home me-1"></i>We Can Inspect: New, Used, Historic, Condos, Townhomes even Frank Lloyd Wright homes.
      </p>
    </div>

    <!-- Image -->
    <div class="col-lg-6" data-aos="fade-left">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/residential-inspection.png" class="img-fluid rounded shadow" alt="Residential Home">
    </div>
  </div>
  </div>

</section>

<!-- Free Service Banner -->
<section class="bg-dark text-white text-center py-5" data-aos="fade-up">
  <div class="container">
    <h3 class="fw-bold text-uppercase">FREE (No Charge)</h3>
    <p class="lead">Roof or Chimney too tall? We can drone it.</p>
    <p><i class="fas fa-thermometer-half me-1 text-danger"></i>Thermal Imaging: <em>We See What Others Can't.</em></p>
    <a href="/stl/#schedule-inspection" class="btn  mt-3 custom-btn-hover">
  <i class="fas fa-calendar-check me-2"></i>Book Inspections
</a>

  </div>
</section>

<?php get_footer(); ?>
