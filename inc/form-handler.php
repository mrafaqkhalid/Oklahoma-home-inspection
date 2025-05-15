<?php
/**
 * Handles the AJAX submission for the inspection form.
 */

// Handle form submission
function handle_inspection_form() {
    error_log('Inspection form submission started');
    error_log('POST data: ' . print_r($_POST, true));

    // Verify nonce
    if (!check_ajax_referer('stl_nonce', 'nonce', false)) {
        error_log('Nonce verification failed');
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'));
        return;
    }
    error_log('Nonce verification passed');

    // Validate required fields
    $required_fields = array('date', 'time', 'name', 'phone', 'email', 'address', 'city', 'state', 'zip');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            error_log('Missing required field: ' . $field);
            wp_send_json_error(array('message' => 'Please fill in all required fields.'));
            return;
        }
    }
    error_log('All required fields present');

    // Sanitize and validate data
    $data = array(
        'date' => sanitize_text_field($_POST['date']),
        'time' => sanitize_text_field($_POST['time']),
        'name' => sanitize_text_field($_POST['name']),
        'phone' => sanitize_text_field($_POST['phone']),
        'email' => sanitize_email($_POST['email']),
        'address' => sanitize_text_field($_POST['address']),
        'apt' => isset($_POST['apt']) ? sanitize_text_field($_POST['apt']) : '',
        'city' => sanitize_text_field($_POST['city']),
        'state' => sanitize_text_field($_POST['state']),
        'zip' => sanitize_text_field($_POST['zip']),
        'services' => isset($_POST['services']) ? implode(',', array_map('sanitize_text_field', $_POST['services'])) : '',
        'realtor_name' => isset($_POST['realtor_name']) ? sanitize_text_field($_POST['realtor_name']) : '',
        'realtor_email' => isset($_POST['realtor_email']) ? sanitize_email($_POST['realtor_email']) : '',
        'realtor_phone' => isset($_POST['realtor_phone']) ? sanitize_text_field($_POST['realtor_phone']) : '',
        'notes' => isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '',
        'created_at' => current_time('mysql')
    );
    error_log('Data sanitized: ' . print_r($data, true));

    // Insert into database
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_inspections';
    
    // Check if table exists
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    if (!$table_exists) {
        error_log('Table does not exist, creating it now...');
        stl_create_inspection_table();
        
        // Verify table was created
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
        if (!$table_exists) {
            error_log('Failed to create table!');
            wp_send_json_error(array('message' => 'Database configuration error. Please contact the administrator.'));
            return;
        }
        error_log('Table created successfully');
    }
    
    $result = $wpdb->insert($table_name, $data);
    error_log('Insert result: ' . ($result === false ? 'Failed: ' . $wpdb->last_error : 'Success'));

    if ($result === false) {
        error_log('DB insert failed: ' . $wpdb->last_error);
        wp_send_json_error(array('message' => 'Failed to save your request. Please try again.'));
        return;
    }

    // Send success response
    error_log('Sending success response');
    wp_send_json_success(array(
        'message' => 'Thank you! Your inspection request has been submitted successfully. We will contact you shortly to confirm your appointment.'
    ));
}
add_action('wp_ajax_submit_inspection_form', 'handle_inspection_form');
add_action('wp_ajax_nopriv_submit_inspection_form', 'handle_inspection_form');

// Create database table on theme activation
function stl_create_inspection_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_inspections';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        date date NOT NULL,
        time varchar(20) NOT NULL,
        name varchar(100) NOT NULL,
        phone varchar(30) NOT NULL,
        email varchar(100) NOT NULL,
        address varchar(255) NOT NULL,
        apt varchar(50),
        city varchar(100) NOT NULL,
        state varchar(50) NOT NULL,
        zip varchar(20) NOT NULL,
        services text,
        realtor_name varchar(100),
        realtor_email varchar(100),
        realtor_phone varchar(30),
        notes text,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'stl_create_inspection_table');

// Helper function to display services in a readable way
// Usage: echo stl_display_services($row['services']);
if (!function_exists('stl_display_services')) {
    function stl_display_services($services_serialized) {
        $services = maybe_unserialize($services_serialized);
        if (!empty($services) && is_array($services)) {
            $out = '<ul>';
            foreach ($services as $service) {
                $out .= '<li>' . esc_html(ucwords(str_replace(['_', '-'], ' ', $service))) . '</li>';
            }
            $out .= '</ul>';
            return $out;
        } else {
            return '<em>No additional services selected.</em>';
        }
    }
}

function stl_create_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_contact';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(30) NOT NULL,
        subject varchar(200) NOT NULL,
        message text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'stl_create_contact_table');

// Verify and create contact table if it doesn't exist
function stl_verify_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_contact';
    
    // Check if table exists
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    
    if (!$table_exists) {
        error_log('Contact table does not exist, creating it now...');
        stl_create_contact_table();
        
        // Verify table was created
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
        if (!$table_exists) {
            error_log('Failed to create contact table!');
            return false;
        }
        error_log('Contact table created successfully');
    }
    return true;
}

// Handle contact form submission
function handle_contact_form() {
    error_log('Contact Form AJAX POST: ' . print_r($_POST, true));

    if (!check_ajax_referer('stl_nonce', 'nonce', false)) {
        error_log('Contact form nonce verification failed');
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'));
        return;
    }

    // Verify table exists
    if (!stl_verify_contact_table()) {
        error_log('Contact table verification failed');
        wp_send_json_error(array('message' => 'Database configuration error. Please contact the administrator.'));
        return;
    }

    // Validate required fields
    $required_fields = array('name', 'email', 'message');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            error_log('Missing required field: ' . $field);
            wp_send_json_error(array('message' => 'Please fill in all required fields.'));
            return;
        }
    }

    // Sanitize and validate data
    $data = array(
        'name' => sanitize_text_field($_POST['name']),
        'email' => sanitize_email($_POST['email']),
        'phone' => isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '',
        'subject' => isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '',
        'message' => sanitize_textarea_field($_POST['message']),
        'created_at' => current_time('mysql')
    );

    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_contact';

    try {
        $result = $wpdb->insert($table_name, $data);

        if ($result === false) {
            error_log('Contact DB insert failed: ' . $wpdb->last_error);
            wp_send_json_error(array(
                'message' => 'Failed to submit contact form. Please try again.'
            ));
        } else {
            // Send email notification
            $to = get_option('admin_email');
            $subject = 'New Contact Form Submission';
            $message = "New contact form submission:\n\n";
            $message .= "Name: " . $data['name'] . "\n";
            $message .= "Email: " . $data['email'] . "\n";
            $message .= "Phone: " . $data['phone'] . "\n";
            $message .= "Subject: " . $data['subject'] . "\n";
            $message .= "Message: " . $data['message'] . "\n";
            
            wp_mail($to, $subject, $message);

            wp_send_json_success(array(
                'message' => 'Thank you! Your message has been sent successfully.'
            ));
        }
    } catch (Exception $e) {
        error_log('Exception in contact form handler: ' . $e->getMessage());
        wp_send_json_error(array(
            'message' => 'An unexpected error occurred. Please try again.'
        ));
    }
}
add_action('wp_ajax_submit_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form'); 

