<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package STL
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- AOS Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
  
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'stl'); ?></a>
    <header id="stickyHeader" class="container-fluid bg-white stickyHeader">
      <!-- Top Navbar -->
      <nav class=" p-2 border-bottom bg-white  px-lg-4" >
        <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="contact-number d-flex flex-column flex-md-row align-items-md-center">
         <a href="mailto:office@stlhomeinspector.com" class="text-dark me-md-3 text-decoration-none">
            <i class="fas fa-envelope"></i> office@stlhomeinspector.com
          </a>
          <a href="tel:3148052137" class="text-dark text-decoration-none">
           <i class="fas fa-phone"></i> 314 805 2137
              </a>
          </div>
          <div class="social-link d-flex">
            <a href="https://www.facebook.com/stlhiservicesfb" class="text-dark mx-2" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.google.com/localservices/prolist?g2lbs=AP8S6EObpcPA_hbSzsjxH37OWxsMGYN5XaH697HYoMNwMEyTVhU_uyh7qv8aHP68FjcsjmBg3TnHRfHAbjqUm72GXQdSWO61IfXJvFJ0_HT0OFtueJdbPvg%3D&hl=en-US&gl=us&ssta=1&q=st%20louis%20home%20inspectors&oq=st%20louis%20home%20inspectors&slp=MgA6HENoTUlrWUNPbnBtRGdBTVYyaFN6QUIwcjhBRkVSAggCYAB6owJDaGh6ZENCc2IzVnBjeUJvYjIxbElHbHVjM0JsWTNSdmNuTkluSm1kZ2V1Q2dJQUlXaVlRQWhBREdBQVlBUmdDR0FNaUdITjBJR3h2ZFdseklHaHZiV1VnYVc1emNHVmpkRzl5YzNvSlUzUXVJRXh2ZFdsemtnRU9hRzl0WlY5cGJuTndaV04wYjNLcUFXd0tDUzl0THpBeGJEQnRkd29KTDIwdk1ESmtNWG80RUFFcUV5SVBhRzl0WlNCcGJuTndaV04wYjNKektBQXlIeEFCSWhzRUpfTEk2ZFN6a0oteVpIS3dxdEh5cTlPb3NPeGhrVXFVaER3eUhCQUNJaGh6ZENCc2IzVnBjeUJvYjIxbElHbHVjM0JsWTNSdmNuUGdBUUGSAbICCgwvZy8xMnZzMmdtNHgKDS9nLzExYmJ0NTh0eGwKDS9nLzExbV9wX3RuM2sKDS9nLzExZjl3Nng5Y24KDS9nLzExZmhxaGszdzgKDS9nLzExZHhrNXdfamIKDS9nLzExZmQ3Nm0xMGoKCy9nLzF2N3B6MDN2CgwvZy8xcHAydGp3a2gKDS9nLzExcDl3YnFreDMKDC9nLzEyaHQzbTA4ZwoML2cvMXlnamRiOTI1Cg0vZy8xMWJ0X2o5YzJxCg0vZy8xMWR6ZGg4YjNkCg0vZy8xMWJ3aDV2YnF2Cg0vZy8xMWY2bmg1NTA1Cg0vZy8xMWdjbXdiNV94Cg0vZy8xMWR6MmczNDgzCg0vZy8xMWdoczF0Nm5qCg0vZy8xMWNra3N3d2QwEgQSAggBEgQKAggB&src=2&spp=CgwvZy8xMnZzMmdtNHg65AFXaVlRQWhBREdBQVlBUmdDR0FNaUdITjBJR3h2ZFdseklHaHZiV1VnYVc1emNHVmpkRzl5YzVJQkRtaHZiV1ZmYVc1emNHVmpkRzl5bWdFQXFnRnNDZ2t2YlM4d01Xd3diWGNLQ1M5dEx6QXlaREY2T0JBQktoTWlEMmh2YldVZ2FXNXpjR1ZqZEc5eWN5Z0FNaDhRQVNJYkJDZnl5T25VczVDZnNtUnlzS3JSOHF2VHFMRHNZWkZLbElROE1od1FBaUlZYzNRZ2JHOTFhWE1nYUc5dFpTQnBibk53WldOMGIzSno%3D&lrlstt=1688959715855&ved=2ahUKEwj-tvudmYOAAxXLhIkEHbmmD6UQvS56BAgSEAE&scp=ChNnY2lkOmhvbWVfaW5zcGVjdG9yEjsSEgn5ju36qbTYhxFb4Lsiyuo5viINU3QuIExvdWlzLCBNTyoUDXd-9xYV4i4qyh0CfxwXJaayQcowABoPaG9tZSBpbnNwZWN0b3JzIhhzdCBsb3VpcyBob21lIGluc3BlY3RvcnMqDkhvbWUgaW5zcGVjdG9yOkgKDS9nLzExcnRxNzQwenoSG2pvYl90eXBlX2lkOmhvbWVfaW5zcGVjdGlvbhoPSG9tZSBpbnNwZWN0aW9uIgJlbjACPc6qbz8%3D#ts=1" class="text-dark mx-2" target="_blank" ><i class="fab fa-google"></i></a>
            <a href="https://www.yelp.com/biz/stl-home-inspection-services-clayton?osq=home+inspectors&override_cta=Request+a+Quote" class="text-dark mx-2" target="_blank"><i class="fab fa-yelp"></i></a>
          </div>
        </div>
      </nav>

      <!-- Main Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light navbar.scrolled navbar.hidden  px-lg-4">
        <div class="container-fluid">
            <!-- Visible only on small to medium (mobile/tablet) screens -->
            <div class="d-lg-none d-flex align-items-center justify-content-between w-100  p-2">
              <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="logo"
                  src="https://stlhomeinspector.com/wp-content/themes/stlhomeinspector/images/header-logo.svg"
                  alt="STL Home Inspection" height="60" />
              </a>
              <button class="navbar-toggler border-0 " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>

            <!-- Visible on large screens and up -->
            <a class="navbar-brand d-none d-lg-block" href="<?php echo esc_url(home_url('/')); ?>">
              <img class="logo"
                src="https://stlhomeinspector.com/wp-content/themes/stlhomeinspector/images/header-logo.svg"
                alt="STL Home Inspection" height="60" />
            </a>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link typography-subheading"
                  href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle typography-subheading" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">Services
                  <span class="dropdown-icon ms-1 d-md-inline d-lg-none"><i class="fas fa-chevron-down"></i></span>
                </a>
                <ul class="dropdown-menu fw-bold">
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/residential')); ?>">Residential Inspections</a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/radon-testing')); ?>">Radon Testing </a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/sewer-scopes')); ?>">Sewer Scopes </a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/gas-line')); ?>">Gas Line Inspections</a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/termites-cost-billions')); ?>">Termite Inspections </a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/mold-sampling')); ?>">Mold Sampling </a></li>
                  <li><a class="dropdown-item typography-body fw-bold"
                      href="<?php echo esc_url(home_url('/infrared-imaging')); ?>">Infrared Imaging </a></li>
                </ul>
              </li>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle typography-subheading" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Report
                <span class="dropdown-icon ms-1 d-md-inline d-lg-none"><i class="fas fa-chevron-down"></i></span>
              </a>
              <ul class="dropdown-menu">
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Single Family" href="https://app.spectora.com/home-inspectors/stl-home-inspection-services/sample_report?sample_id=24202" target="_blank">Single Family</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="New Build" href="https://app.spectora.com/home-inspectors/stl-home-inspection-services/sample_report?sample_id=13181" target="_blank">New Build</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Condo" href="https://app.spectora.com/home-inspectors/stl-home-inspection-services/sample_report?sample_id=13183" target="_blank">Condo</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Four Unit" href="https://app.spectora.com/home-inspectors/stl-home-inspection-services/sample_report?sample_id=13176" target="_blank">Four Unit</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Duplex" href="https://app.spectora.com/home-inspectors/stl-home-inspection-services/sample_report?sample_id=13281" target="_blank">Duplex</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Radon Report" href="#" target="_blank">Radon Report</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Sewer Scope" href="https://app.spectora.com/home-inspectors/my-inspection-company-7ea327eabb/sample_report?sample_id=13184" target="_blank">Sewer Scope</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Gas Report" href="#" target="_blank">Gas Report</a>
                </li>
                <li itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item">
                  <a class="dropdown-item typography-body fw-bold" title="Termite Report" href="#" target="_blank">Termite Report</a>
                </li>
              </ul>
            </li>

              <li class="nav-item"><a class="nav-link typography-subheading"
                  href="<?php echo esc_url(home_url('/meet')); ?>">Meet</a></li>
              <li class="nav-item"><a class="nav-link typography-subheading"
                  href="<?php echo esc_url(home_url('#services-pricing-plans')); ?>">Price</a></li>
              <li class="nav-item"><a class="nav-link typography-subheading"
                  href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
            </ul>
          </div>
          <!-- Navbar Button -->
          <a href="/stl/#schedule-inspection" class="custom-btn-hover btn btn-danger d-none d-lg-inline-block typography-heading ">
            New Inspection
          </a>

        </div>
      </nav>
    </header>








<script>
  // navbar
  const toggler = document.querySelector('.navbar-toggler');
  const collapse = document.querySelector('.navbar-collapse');

  let isOpen = false;

  toggler.addEventListener('click', () => {
    if (!isOpen) {
      collapse.style.height = '100vh';
      collapse.style.opacity = '1';
    } else {
      collapse.style.height = '0';
      collapse.style.opacity = '0';
    }
    isOpen = !isOpen;
  });

  // navbar scroll animation 

  let lastScrollTop = 0;
  const header = document.querySelector('.stickyHeader');

  window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      // Scroll Down - Hide header
      header.classList.add('hide-up');
    } else {
      // Scroll Up - Show header
      header.classList.remove('hide-up');
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Avoid negative
  });

</script>
    <!-- <header id="masthead" class="site-header">
    <div class="site-branding">
      <?php
      the_custom_logo();
      if (is_front_page() && is_home()):
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php
      else:
        ?>
        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <?php
      endif;
      $stl_description = get_bloginfo('description', 'display');
      if ($stl_description || is_customize_preview()):
        ?>
        <p class="site-description"><?php echo $stl_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
      <?php endif; ?>
    </div>

    <nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'stl'); ?></button>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-1',
          'menu_id' => 'primary-menu',
        )
      );
      ?>
    </nav>
  </header>#masthead -->