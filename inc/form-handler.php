<?php
/**
 * Handles the AJAX submission for the inspection form.
 */

// Handle form submission
function handle_inspection_form() {
    // Verify nonce
    if (!check_ajax_referer('stl_nonce', 'nonce', false)) {
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'));
        return;
    }

    // Validate required fields
    $required_fields = array('date', 'time', 'name', 'phone', 'email', 'address', 'city', 'state', 'zip');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error(array('message' => 'Please fill in all required fields.'));
            return;
        }
    }

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
        'no_realtor' => (isset($_POST['no_realtor']) && $_POST['no_realtor'] === '1') ? 1 : 0,
        'realtor_name' => isset($_POST['realtor_name']) ? sanitize_text_field($_POST['realtor_name']) : '',
        'realtor_email' => isset($_POST['realtor_email']) ? sanitize_email($_POST['realtor_email']) : '',
        'realtor_phone' => isset($_POST['realtor_phone']) ? sanitize_text_field($_POST['realtor_phone']) : '',
        'notes' => isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '',
        'created_at' => current_time('mysql')
    );

    // Insert into database
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_inspections';
    
    // Verify table exists
    if (!stl_verify_inspection_table()) {
        wp_send_json_error(array('message' => 'Database configuration error. Please contact the administrator.'));
        return;
    }
    
    $result = $wpdb->insert($table_name, $data);

    if ($result === false) {
        wp_send_json_error(array('message' => 'Failed to save your request. Please try again.'));
        return;
    }

    // Send success response
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
        no_realtor tinyint(1) DEFAULT 0,
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

// Verify and create inspection table if it doesn't exist
function stl_verify_inspection_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'stl_inspections';
    
    // Check if table exists
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
    
    if (!$table_exists) {
        stl_create_inspection_table();
        
        // Verify table was created
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
        if (!$table_exists) {
            return false;
        }
    } else {
        // Check if no_realtor column exists, add it if it doesn't
        $column_exists = $wpdb->get_var("SHOW COLUMNS FROM $table_name LIKE 'no_realtor'");
        if (!$column_exists) {
            $wpdb->query("ALTER TABLE $table_name ADD COLUMN no_realtor tinyint(1) DEFAULT 0");
        }
    }
    return true;
}

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
        stl_create_contact_table();
        
        // Verify table was created
        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
        if (!$table_exists) {
            return false;
        }
    }
    return true;
}

// Handle contact form submission
function handle_contact_form() {
    if (!check_ajax_referer('stl_nonce', 'nonce', false)) {
        wp_send_json_error(array('message' => 'Security check failed. Please refresh the page and try again.'));
        return;
    }

    // Verify table exists
    if (!stl_verify_contact_table()) {
        wp_send_json_error(array('message' => 'Database configuration error. Please contact the administrator.'));
        return;
    }

    // Validate required fields
    $required_fields = array('name', 'email', 'message', 'subject');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
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
        wp_send_json_error(array(
            'message' => 'An unexpected error occurred. Please try again.'
        ));
    }
}
add_action('wp_ajax_submit_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form'); 

