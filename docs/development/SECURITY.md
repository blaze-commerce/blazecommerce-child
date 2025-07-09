# Security Guidelines

This guide covers security best practices and implementation guidelines for the BlazeCommerce Child Theme.

## Table of Contents

1. [Security Principles](#security-principles)
2. [Input Validation and Sanitization](#input-validation-and-sanitization)
3. [Output Escaping](#output-escaping)
4. [Nonce Verification](#nonce-verification)
5. [User Capability Checks](#user-capability-checks)
6. [File Security](#file-security)
7. [Database Security](#database-security)
8. [AJAX Security](#ajax-security)
9. [Content Security Policy](#content-security-policy)
10. [Security Monitoring](#security-monitoring)

## Security Principles

### Defense in Depth

Implement multiple layers of security:

1. **Input Validation**: Validate all user inputs
2. **Output Escaping**: Escape all outputs
3. **Access Control**: Verify user permissions
4. **Data Integrity**: Use nonces and CSRF protection
5. **Secure Communication**: Use HTTPS and secure headers

### WordPress Security Standards

Follow WordPress security best practices:

- Use WordPress sanitization and escaping functions
- Implement proper capability checks
- Use nonces for form submissions
- Follow secure coding standards
- Regular security updates

## Input Validation and Sanitization

### Sanitization Functions

Always sanitize user inputs:

```php
// Text input sanitization
$user_input = sanitize_text_field($_POST['user_input']);

// Email sanitization
$email = sanitize_email($_POST['email']);

// URL sanitization
$url = esc_url_raw($_POST['url']);

// HTML sanitization
$html_content = wp_kses_post($_POST['content']);

// Integer sanitization
$number = absint($_POST['number']);

// Array sanitization
$array_data = array_map('sanitize_text_field', $_POST['array_field']);
```

### Custom Sanitization Functions

```php
/**
 * Sanitize color hex values
 */
function blazecommerce_child_sanitize_hex_color($color) {
    if ('' === $color) {
        return '';
    }
    
    // 3 or 6 hex digits, or the empty string.
    if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color)) {
        return $color;
    }
    
    return '';
}

/**
 * Sanitize checkbox values
 */
function blazecommerce_child_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Sanitize select options
 */
function blazecommerce_child_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control($setting->id)->choices;
    
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}
```

### Form Validation Example

```php
function blazecommerce_child_process_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_die(__('Security check failed', 'blazecommerce-child'));
    }
    
    // Sanitize inputs
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validate required fields
    $errors = array();
    
    if (empty($name)) {
        $errors[] = __('Name is required', 'blazecommerce-child');
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = __('Valid email is required', 'blazecommerce-child');
    }
    
    if (empty($message)) {
        $errors[] = __('Message is required', 'blazecommerce-child');
    }
    
    // Process if no errors
    if (empty($errors)) {
        // Process form data
        blazecommerce_child_send_contact_email($name, $email, $message);
    }
    
    return $errors;
}
```

## Output Escaping

### Escaping Functions

Always escape output data:

```php
// HTML escaping
echo esc_html($user_data);

// Attribute escaping
echo '<input value="' . esc_attr($user_input) . '">';

// URL escaping
echo '<a href="' . esc_url($link_url) . '">Link</a>';

// JavaScript escaping
echo '<script>var data = ' . wp_json_encode($data) . ';</script>';

// CSS escaping (rare, but available)
echo '<style>.class { color: ' . esc_attr($color) . '; }</style>';
```

### Template Output Examples

```php
// Safe template output
<h1><?php echo esc_html(get_the_title()); ?></h1>

<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" 
     alt="<?php echo esc_attr(get_the_title()); ?>">

<a href="<?php echo esc_url(get_permalink()); ?>" 
   class="<?php echo esc_attr($css_class); ?>">
    <?php echo esc_html($link_text); ?>
</a>

<!-- For trusted HTML content -->
<div class="content">
    <?php echo wp_kses_post(get_the_content()); ?>
</div>
```

### Custom Escaping Functions

```php
/**
 * Escape data for use in HTML data attributes
 */
function blazecommerce_child_esc_data_attr($data) {
    return esc_attr(wp_json_encode($data));
}

// Usage
echo '<div data-config="' . blazecommerce_child_esc_data_attr($config) . '">';
```

## Nonce Verification

### Creating Nonces

```php
// Create nonce for forms
$nonce = wp_create_nonce('my_action_nonce');

// Add to form
echo '<input type="hidden" name="my_nonce" value="' . esc_attr($nonce) . '">';

// Or use wp_nonce_field
wp_nonce_field('my_action_nonce', 'my_nonce');
```

### Verifying Nonces

```php
// Verify nonce in form processing
if (!wp_verify_nonce($_POST['my_nonce'], 'my_action_nonce')) {
    wp_die(__('Security check failed', 'blazecommerce-child'));
}

// Check and verify nonce (returns false if invalid)
if (!check_admin_referer('my_action_nonce', 'my_nonce')) {
    wp_die(__('Security check failed', 'blazecommerce-child'));
}
```

### AJAX Nonce Example

```php
// Enqueue nonce for AJAX
function blazecommerce_child_enqueue_ajax_script() {
    wp_enqueue_script('my-ajax-script', get_stylesheet_directory_uri() . '/js/ajax.js');
    wp_localize_script('my-ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('my_ajax_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_ajax_script');

// AJAX handler
function blazecommerce_child_ajax_handler() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
        wp_die(__('Security check failed', 'blazecommerce-child'));
    }
    
    // Process AJAX request
    $response = array('success' => true);
    wp_send_json($response);
}
add_action('wp_ajax_my_action', 'blazecommerce_child_ajax_handler');
add_action('wp_ajax_nopriv_my_action', 'blazecommerce_child_ajax_handler');
```

## User Capability Checks

### Capability Verification

```php
// Check user capabilities before sensitive operations
function blazecommerce_child_admin_function() {
    // Check if user can manage options
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions', 'blazecommerce-child'));
    }
    
    // Proceed with admin function
}

// Check specific capabilities
if (current_user_can('edit_posts')) {
    // User can edit posts
}

if (current_user_can('edit_post', $post_id)) {
    // User can edit specific post
}
```

### Custom Capability Checks

```php
/**
 * Check if user can perform theme customization
 */
function blazecommerce_child_can_customize_theme() {
    return current_user_can('customize') || current_user_can('manage_options');
}

/**
 * Check WooCommerce permissions
 */
function blazecommerce_child_can_manage_shop() {
    return current_user_can('manage_woocommerce') || current_user_can('manage_options');
}
```

## File Security

### Prevent Direct Access

```php
// Add to all PHP files
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Alternative method
defined('ABSPATH') || exit;
```

### File Upload Security

```php
/**
 * Secure file upload handling
 */
function blazecommerce_child_handle_file_upload($file) {
    // Check file type
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_types)) {
        return new WP_Error('invalid_file_type', __('Invalid file type', 'blazecommerce-child'));
    }
    
    // Check file size (5MB limit)
    if ($file['size'] > 5 * 1024 * 1024) {
        return new WP_Error('file_too_large', __('File too large', 'blazecommerce-child'));
    }
    
    // Use WordPress upload handling
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }
    
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($file, $upload_overrides);
    
    if ($movefile && !isset($movefile['error'])) {
        return $movefile;
    } else {
        return new WP_Error('upload_failed', $movefile['error']);
    }
}
```

### File Permission Settings

```bash
# Recommended file permissions
find /path/to/wordpress/ -type d -exec chmod 755 {} \;
find /path/to/wordpress/ -type f -exec chmod 644 {} \;
chmod 600 wp-config.php
```

## Database Security

### Prepared Statements

```php
global $wpdb;

// Safe database query with prepared statement
$user_id = 123;
$meta_key = 'custom_field';

$results = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->usermeta} WHERE user_id = %d AND meta_key = %s",
    $user_id,
    $meta_key
));

// Insert with prepared statement
$wpdb->insert(
    $wpdb->prefix . 'custom_table',
    array(
        'user_id' => $user_id,
        'data' => $data,
        'created_at' => current_time('mysql')
    ),
    array('%d', '%s', '%s')
);
```

### Avoid SQL Injection

```php
// NEVER do this (vulnerable to SQL injection)
$wpdb->get_results("SELECT * FROM table WHERE id = " . $_GET['id']);

// ALWAYS use prepared statements
$wpdb->get_results($wpdb->prepare(
    "SELECT * FROM table WHERE id = %d",
    absint($_GET['id'])
));
```

## AJAX Security

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
    },
    success: function(response) {
        // Handle response
    }
});

// PHP Handler
function blazecommerce_child_secure_ajax_handler() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'my_ajax_nonce')) {
        wp_send_json_error(__('Security check failed', 'blazecommerce-child'));
    }
    
    // Check capabilities if needed
    if (!current_user_can('edit_posts')) {
        wp_send_json_error(__('Insufficient permissions', 'blazecommerce-child'));
    }
    
    // Sanitize input
    $data = sanitize_text_field($_POST['data']);
    
    // Process request
    $result = process_data($data);
    
    wp_send_json_success($result);
}
add_action('wp_ajax_my_secure_action', 'blazecommerce_child_secure_ajax_handler');
```

## Content Security Policy

### CSP Headers

```php
/**
 * Add Content Security Policy headers
 */
function blazecommerce_child_add_csp_headers() {
    if (!is_admin()) {
        $csp = "default-src 'self'; ";
        $csp .= "script-src 'self' 'unsafe-inline' 'unsafe-eval' *.google.com *.googleapis.com; ";
        $csp .= "style-src 'self' 'unsafe-inline' *.googleapis.com; ";
        $csp .= "img-src 'self' data: *.gravatar.com; ";
        $csp .= "font-src 'self' *.googleapis.com *.gstatic.com; ";
        $csp .= "connect-src 'self'; ";
        $csp .= "frame-src 'self' *.youtube.com *.vimeo.com;";
        
        header("Content-Security-Policy: " . $csp);
    }
}
add_action('send_headers', 'blazecommerce_child_add_csp_headers');
```

### Security Headers

```php
/**
 * Add security headers
 */
function blazecommerce_child_security_headers() {
    if (!is_admin()) {
        // Prevent clickjacking
        header('X-Frame-Options: SAMEORIGIN');
        
        // Prevent MIME type sniffing
        header('X-Content-Type-Options: nosniff');
        
        // XSS protection
        header('X-XSS-Protection: 1; mode=block');
        
        // Referrer policy
        header('Referrer-Policy: strict-origin-when-cross-origin');
        
        // Force HTTPS (if using SSL)
        if (is_ssl()) {
            header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
        }
    }
}
add_action('send_headers', 'blazecommerce_child_security_headers');
```

## Security Monitoring

### Error Logging

```php
/**
 * Log security events
 */
function blazecommerce_child_log_security_event($event, $details = array()) {
    if (WP_DEBUG_LOG) {
        $log_entry = array(
            'timestamp' => current_time('mysql'),
            'event' => $event,
            'user_id' => get_current_user_id(),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'details' => $details
        );
        
        error_log('SECURITY EVENT: ' . wp_json_encode($log_entry));
    }
}

// Usage
blazecommerce_child_log_security_event('failed_nonce_verification', array(
    'action' => 'contact_form',
    'nonce' => $_POST['nonce']
));
```

### Failed Login Monitoring

```php
/**
 * Monitor failed login attempts
 */
function blazecommerce_child_monitor_failed_logins($username) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $attempts = get_transient('failed_login_' . $ip) ?: 0;
    $attempts++;
    
    set_transient('failed_login_' . $ip, $attempts, 15 * MINUTE_IN_SECONDS);
    
    if ($attempts >= 5) {
        blazecommerce_child_log_security_event('multiple_failed_logins', array(
            'username' => $username,
            'attempts' => $attempts,
            'ip' => $ip
        ));
    }
}
add_action('wp_login_failed', 'blazecommerce_child_monitor_failed_logins');
```

### Security Checklist

```php
/**
 * Security audit checklist
 */
function blazecommerce_child_security_audit() {
    $checks = array();
    
    // Check WordPress version
    $wp_version = get_bloginfo('version');
    $checks['wp_updated'] = version_compare($wp_version, '6.0', '>=');
    
    // Check if debug mode is disabled in production
    $checks['debug_disabled'] = !WP_DEBUG || WP_DEBUG_DISPLAY === false;
    
    // Check file permissions
    $checks['wp_config_secure'] = !is_readable(ABSPATH . 'wp-config.php');
    
    // Check for security plugins
    $security_plugins = array('wordfence', 'sucuri-scanner', 'better-wp-security');
    $checks['security_plugin'] = false;
    foreach ($security_plugins as $plugin) {
        if (is_plugin_active($plugin . '/' . $plugin . '.php')) {
            $checks['security_plugin'] = true;
            break;
        }
    }
    
    return $checks;
}
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
