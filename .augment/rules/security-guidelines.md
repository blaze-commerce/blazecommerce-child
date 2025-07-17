# Security Guidelines Rule

**Priority: ALWAYS**

**Description:** Enforce strict security practices for WordPress child theme development.

## Credential Protection (CRITICAL)

### Prohibited in ALL Files
- API Keys, Tokens, Passwords, SSH Keys, Database Credentials, Service Keys
- Use placeholder: `[REPLACE_WITH_ACTUAL_VALUE_FROM_USER_CREDENTIALS]`
- Never commit `.env` files with real values

## WordPress Security Standards

### Input/Output Security
```php
// Input sanitization
$user_input = sanitize_text_field($_POST['user_data']);
$email = sanitize_email($_POST['email']);
$url = esc_url_raw($_POST['url']);

// Output escaping
echo esc_html($user_data);
echo esc_attr($attribute_value);
echo esc_url($url);
echo wp_kses_post($html_content);

// Nonce verification
if (!wp_verify_nonce($_POST['nonce'], 'action_name')) {
    wp_die('Security check failed');
}

// Capability checks
if (!current_user_can('manage_options')) {
    wp_die('Insufficient permissions');
}

// Prepared statements
$wpdb->prepare("SELECT * FROM {$wpdb->posts} WHERE post_title = %s", $title);

// Prevent direct access
if (!defined('ABSPATH')) { exit; }
```

## Theme-Specific Security

### Block Pattern Security
- Sanitize dynamic content in patterns
- Validate block attributes
- Escape output in custom blocks
- Secure AJAX endpoints

### WooCommerce Security
- Validate order ownership before displaying data
- Sanitize product data inputs
- Secure payment processing hooks
- Protect customer information

### File Security
- Validate file types and extensions
- Use WordPress file system API
- Prevent direct file access

## Security Checklist

### Pre-Commit Requirements
- [ ] No credentials in code/documentation
- [ ] All inputs sanitized, outputs escaped
- [ ] Nonces implemented for forms
- [ ] Capability checks in place
- [ ] Database queries use prepared statements
- [ ] File operations secure
- [ ] No direct file access vulnerabilities

### Code Review
- Security-focused review for all changes
- Automated security scanning
- Dependency vulnerability checks
- Security testing before deployment

## Compliance & Monitoring
- WordPress Coding Standards compliance
- GDPR compliance for EU users
- Log security events, monitor suspicious activity
- Regular security audits and updates

## Enforcement
**ALWAYS** priority - cannot be bypassed. Ensures:
1. Data protection
2. Vulnerability prevention
3. Regulatory compliance
4. User trust
