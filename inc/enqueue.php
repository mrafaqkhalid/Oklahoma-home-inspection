<?php 

function custom_enqueue_styles() {
    // AOS CSS
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4');

    // Font Awesome 5 and 6 (avoid loading both unless needed)
    wp_enqueue_style('fontawesome-6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2');
    // If you're only using FA 6, remove the next line to avoid conflict
    wp_enqueue_style('fontawesome-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');

    // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', array(), null);

    // Custom style.css
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style/style.css');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_scripts() {
    // jQuery (WordPress already includes it, but we'll make sure it's loaded first)
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);

    // AOS JS
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');
