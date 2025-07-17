---
type: "always_apply"
priority: 1
scope: "blazecommerce_child"
---

# Security Guidelines - BlazeCommerce Child Theme

## 🔒 Core Security Principles
- **Defense in Depth**: Input validation → Output escaping → Access control → Data integrity → Secure communication
- **WordPress Standards**: Use WP sanitization/escaping functions, capability checks, nonces, secure coding

## 🛡️ Input Validation & Sanitization

### Essential Sanitization
```php
// Common sanitization patterns
$user_input = sanitize_text_field($_POST['user_input']);
$email = sanitize_email($_POST['email']);
$url = esc_url_raw($_POST['url']);
$html_content = wp_kses_post($_POST['content']);
$number = absint($_POST['number']);
$array_data = array_map('sanitize_text_field', $_POST['array_field']);
```

### Custom Sanitization Functions
```php
// Hex color validation
function blazecommerce_child_sanitize_hex_color($color) {
    return (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color)) ? $color : '';
}

// Checkbox sanitization
function blazecommerce_child_sanitize_checkbox($checked) {
    return (isset($checked) && $checked) ? true : false;
}

// Select option validation
function blazecommerce_child_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    return array_key_exists($input, $choices) ? $input : $setting->default;
}
```

## 🔐 Output Escaping & Nonce Verification

### Essential Escaping
```php
// Always escape output data
echo esc_html($user_data);                    // HTML content
echo '<input value="' . esc_attr($input) . '">'; // Attributes
echo '<a href="' . esc_url($link) . '">Link</a>'; // URLs
echo '<script>var data = ' . wp_json_encode($data) . ';</script>'; // JS

// Template examples
<h1><?php echo esc_html(get_the_title()); ?></h1>
<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
<div class="content"><?php echo wp_kses_post(get_the_content()); ?></div>
```

### Nonce Implementation
```php
// Form validation with nonce
function blazecommerce_child_process_contact_form() {
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_die(__('Security check failed', 'blazecommerce-child'));
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $errors = array();
    if (empty($name)) $errors[] = __('Name is required', 'blazecommerce-child');
    if (empty($email) || !is_email($email)) $errors[] = __('Valid email is required', 'blazecommerce-child');
    if (empty($message)) $errors[] = __('Message is required', 'blazecommerce-child');

    if (empty($errors)) {
        blazecommerce_child_send_contact_email($name, $email, $message);
    }
    return $errors;
}

// AJAX with nonce
function blazecommerce_child_enqueue_ajax_script() {
    wp_enqueue_script('my-ajax-script', get_stylesheet_directory_uri() . '/js/ajax.js');
    wp_localize_script('my-ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('my_ajax_nonce')
    ));
}

function blazecommerce_child_ajax_handler() {
    if (!wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
        wp_die(__('Security check failed', 'blazecommerce-child'));
    }
    wp_send_json(array('success' => true));
}
add_action('wp_ajax_my_action', 'blazecommerce_child_ajax_handler');
```

## 👤 User Capabilities & File Security

### Capability Checks
```php
// Always verify user permissions
function blazecommerce_child_admin_function() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions', 'blazecommerce-child'));
    }
}

// Custom capability helpers
function blazecommerce_child_can_customize_theme() {
    return current_user_can('customize') || current_user_can('manage_options');
}

function blazecommerce_child_can_manage_shop() {
    return current_user_can('manage_woocommerce') || current_user_can('manage_options');
}
```

### File Security
```php
// Prevent direct access (add to all PHP files)
defined('ABSPATH') || exit;

// Secure file upload
function blazecommerce_child_handle_file_upload($file) {
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_types)) {
        return new WP_Error('invalid_file_type', __('Invalid file type', 'blazecommerce-child'));
    }

    if ($file['size'] > 5 * 1024 * 1024) { // 5MB limit
        return new WP_Error('file_too_large', __('File too large', 'blazecommerce-child'));
    }

    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    return wp_handle_upload($file, array('test_form' => false));
}
```

## 🗄️ Database Security

### Prepared Statements (ALWAYS USE)
```php
global $wpdb;

// Safe queries with prepared statements
$results = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->usermeta} WHERE user_id = %d AND meta_key = %s",
    $user_id, $meta_key
));

// Safe inserts
$wpdb->insert($wpdb->prefix . 'custom_table', array(
    'user_id' => $user_id,
    'data' => $data,
    'created_at' => current_time('mysql')
), array('%d', '%s', '%s'));

// NEVER do this (SQL injection risk)
// $wpdb->get_results("SELECT * FROM table WHERE id = " . $_GET['id']);
```

## 🔗 AJAX & Security Headers

### Secure AJAX Implementation
```php
// JavaScript
jQuery.ajax({
    url: ajax_object.ajax_url,
    type: 'POST',
    data: {
        action: 'my_secure_action',
        nonce: ajax_object.nonce,
        data: form_data
    }
});

// PHP Handler
function blazecommerce_child_secure_ajax_handler() {
    if (!wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
        wp_send_json_error(__('Security check failed', 'blazecommerce-child'));
    }
    if (!current_user_can('edit_posts')) {
        wp_send_json_error(__('Insufficient permissions', 'blazecommerce-child'));
    }

    $data = sanitize_text_field($_POST['data']);
    wp_send_json_success(process_data($data));
}
add_action('wp_ajax_my_secure_action', 'blazecommerce_child_secure_ajax_handler');
```

### Security Headers & CSP
```php
// Content Security Policy & Security Headers
function blazecommerce_child_security_headers() {
    if (!is_admin()) {
        // CSP
        $csp = "default-src 'self'; script-src 'self' 'unsafe-inline' *.google.com; style-src 'self' 'unsafe-inline' *.googleapis.com; img-src 'self' data: *.gravatar.com;";
        header("Content-Security-Policy: " . $csp);

        // Security headers
        header('X-Frame-Options: SAMEORIGIN');
        header('X-Content-Type-Options: nosniff');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');

        if (is_ssl()) {
            header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
        }
    }
}
add_action('send_headers', 'blazecommerce_child_security_headers');
```

## 📊 Security Monitoring

### Event Logging & Failed Login Monitoring
```php
// Log security events
function blazecommerce_child_log_security_event($event, $details = array()) {
    if (WP_DEBUG_LOG) {
        $log_entry = array(
            'timestamp' => current_time('mysql'),
            'event' => $event,
            'user_id' => get_current_user_id(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'details' => $details
        );
        error_log('SECURITY EVENT: ' . wp_json_encode($log_entry));
    }
}

// Monitor failed logins
function blazecommerce_child_monitor_failed_logins($username) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $attempts = get_transient('failed_login_' . $ip) ?: 0;
    $attempts++;
    set_transient('failed_login_' . $ip, $attempts, 15 * MINUTE_IN_SECONDS);

    if ($attempts >= 5) {
        blazecommerce_child_log_security_event('multiple_failed_logins', array(
            'username' => $username, 'attempts' => $attempts, 'ip' => $ip
        ));
    }
}
add_action('wp_login_failed', 'blazecommerce_child_monitor_failed_logins');
```

## ✅ Security Checklist
- **File Permissions**: Directories 755, Files 644, wp-config.php 600
- **WordPress Updates**: Keep core, themes, plugins updated
- **Security Plugins**: Wordfence, Sucuri, or iThemes Security
- **Debug Mode**: Disabled in production (`WP_DEBUG = false`)
- **HTTPS**: SSL certificate installed and enforced
- **Backups**: Regular automated backups configured

---
**Optimized**: July 2025 | **Focus**: Input validation, output escaping, nonce verification, capability checks
