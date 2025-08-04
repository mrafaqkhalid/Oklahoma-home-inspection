<?php
/**
 * STL functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package STL
 */

// Define a theme version
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Theme setup
 */
function stl_setup() {
	load_theme_textdomain( 'stl', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( [
		'menu-1' => __( 'Primary Menu', 'stl' ),
	] );

	add_theme_support( 'html5', [
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
	] );

	add_theme_support( 'custom-background', apply_filters( 'stl_custom_background_args', [
		'default-color' => 'ffffff',
		'default-image' => '',
	] ) );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-logo', [
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	] );
}
add_action( 'after_setup_theme', 'stl_setup' );

/**
 * Set content width
 */
function stl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stl_content_width', 1170 );
}
add_action( 'after_setup_theme', 'stl_content_width', 0 );

/**
 * Register widget area.
 */
function stl_widgets_init() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'stl' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'stl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	] );
}
add_action( 'widgets_init', 'stl_widgets_init' );

/**
 * Enqueue styles and scripts
 */
function stl_enqueue_assets() {
	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );

	// AOS Animation
	wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

	// Main theme style
	wp_enqueue_style( 'stl-style', get_template_directory_uri() . '/assets/css/style.css', [], _S_VERSION );

	// JS
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true );
	
	// Enqueue the script with proper dependencies
	wp_enqueue_script( 'stl-script', get_template_directory_uri() . '/assets/js/script.js', ['jquery', 'bootstrap-js'], _S_VERSION, true );

	// Localize script for AJAX
	wp_localize_script( 'stl-script', 'stl_ajax', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'stl_nonce' )
	] );
}
add_action( 'wp_enqueue_scripts', 'stl_enqueue_assets' );

// Custom functionality includes
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/form-handler.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove Bootstrap select invalid styling
 */
function stl_custom_inline_styles() {
	echo '<style>
		.form-select.is-invalid,
		.was-validated .form-select:invalid {
			background-image: none !important;
			padding-right: 0.75rem !important;
			background-position: initial !important;
			background-size: initial !important;
			
		}

		.form-control:focus {
			box-shadow: none !important;
	</style>';
}
add_action( 'wp_head', 'stl_custom_inline_styles' );
remove_action('wp_head', 'wp_site_icon', 99);


// Javascript Time Picker 
function enqueue_flatpickr_assets() {
    // Flatpickr CSS
    wp_enqueue_style('flatpickr-css', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');

    // Flatpickr JS
    wp_enqueue_script('flatpickr-js', 'https://cdn.jsdelivr.net/npm/flatpickr', [], null, true);

    // Custom JS for initialization
    // wp_enqueue_script('custom-flatpickr-init', get_template_directory_uri() . '/js/flatpickr-init.js', ['flatpickr-js'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_flatpickr_assets');