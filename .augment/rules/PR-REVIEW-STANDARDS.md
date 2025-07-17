---
type: "always_apply"
priority: 1
scope: "blazecommerce_child"
---

# PR Review Standards - BlazeCommerce Child Theme (MANDATORY)

## 🚨 CRITICAL: Pre-PR Validation Requirements

### ALWAYS Apply Before Creating PRs
- **ALWAYS**: All Augment-generated code MUST automatically adhere to these standards BEFORE PR creation
- **ALWAYS**: Proactive compliance to ensure Claude review workflow efficiency
- **ALWAYS**: Reduced back-and-forth review cycles through immediate standards compliance

## 🔴 Critical Issues (Must Fix - BLOCKING)

### WordPress Security
- **Input Sanitization**: All `$_POST`, `$_GET`, `$_REQUEST` properly sanitized
- **Output Escaping**: All echoed variables properly escaped
- **Capability Checks**: Admin functions protected with `current_user_can()`
- **Nonce Verification**: All forms include proper nonce checks
- **SQL Injection**: All database queries use prepared statements
- **File Security**: No direct file access without permission checks

### Theme Compatibility
- **Parent Theme**: No modifications to parent theme files
- **WordPress Standards**: Follows WordPress PHP Coding Standards
- **Hook Usage**: Proper use of WordPress actions and filters
- **Function Prefixing**: All functions prefixed with `blazecommerce_child_`
- **Backward Compatibility**: No breaking changes to existing functionality

### Performance Issues
- **Asset Loading**: Conditional loading, proper enqueuing
- **Database Queries**: Optimized queries, proper caching
- **Memory Usage**: Efficient memory usage, no leaks
- **Load Times**: Fast page load times maintained

## 🟡 Important Issues (Should Fix - CONDITIONAL APPROVAL)

### WordPress Best Practices
- **Coding Standards**: PSR-1, PSR-2, WordPress standards compliance
- **Error Handling**: Proper error handling and user feedback
- **Internationalization**: Proper text domain usage
- **Accessibility**: WCAG AA compliance for theme elements
- **SEO**: Proper semantic HTML and meta tags

### Code Quality
- **Function Length**: Functions kept to reasonable size
- **Code Comments**: Adequate PHPDoc documentation
- **DRY Principle**: No code duplication
- **Single Responsibility**: Clear function purposes
- **Naming Conventions**: Consistent and descriptive naming

## 🟢 Suggestions (Nice to Have - APPROVED WITH NOTES)

### Theme Enhancements
- **Customizer Options**: Additional theme customization
- **Block Patterns**: Custom Gutenberg block patterns
- **Performance**: Advanced caching and optimization
- **Documentation**: Comprehensive theme documentation

## 🎯 WordPress-Specific Validation

### Security Compliance
```php
// REQUIRED: Input sanitization
$user_input = sanitize_text_field($_POST['user_input']);
$email = sanitize_email($_POST['email']);
$url = esc_url_raw($_POST['url']);

// REQUIRED: Output escaping
echo esc_html($user_data);
echo '<input value="' . esc_attr($user_input) . '">';
echo '<a href="' . esc_url($link_url) . '">Link</a>';

// REQUIRED: Capability checks
if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions.', 'blazecommerce-child'));
}

// REQUIRED: Nonce verification
if (!wp_verify_nonce($_POST['nonce'], 'action_name')) {
    wp_die(__('Security check failed.', 'blazecommerce-child'));
}

// REQUIRED: Prepared statements
global $wpdb;
$results = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->posts} WHERE post_status = %s",
    'publish'
));
```

### Theme Standards
```php
// REQUIRED: Function prefixing
function blazecommerce_child_custom_function() {
    // Implementation
}

// REQUIRED: Proper enqueuing
function blazecommerce_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_styles');

// REQUIRED: Internationalization
__('Text string', 'blazecommerce-child');
_e('Text string', 'blazecommerce-child');
```

### Performance Optimization
```php
// REQUIRED: Conditional loading
function blazecommerce_child_conditional_assets() {
    if (is_front_page()) {
        wp_enqueue_script('homepage-script', 
            get_stylesheet_directory_uri() . '/js/homepage.js'
        );
    }
}

// REQUIRED: Caching
function blazecommerce_child_get_cached_data($key) {
    $data = get_transient('blazecommerce_child_' . $key);
    if (false === $data) {
        $data = expensive_operation();
        set_transient('blazecommerce_child_' . $key, $data, HOUR_IN_SECONDS);
    }
    return $data;
}
```

## 🔄 Automated Compliance Checklist

### Before PR Creation (MANDATORY)
- [ ] **Security**: All inputs sanitized, outputs escaped, capability checks
- [ ] **Standards**: WordPress PHP coding standards compliance
- [ ] **Performance**: Conditional loading, optimized queries
- [ ] **Compatibility**: No parent theme modifications
- [ ] **Functionality**: All features work as expected
- [ ] **Documentation**: PHPDoc comments for all functions
- [ ] **Testing**: Manual testing completed
- [ ] **Internationalization**: Proper text domain usage

### Code Quality Gates
- [ ] **No Security Issues**: Zero security vulnerabilities
- [ ] **Standards Compliance**: Follows WordPress coding standards
- [ ] **Performance**: No performance regressions
- [ ] **Accessibility**: WCAG AA compliance maintained
- [ ] **SEO**: Proper semantic markup
- [ ] **Browser Compatibility**: Works across target browsers

## 🤖 Claude Review Integration

### Expected Review Format
```markdown
### FINAL VERDICT
**Status**: [PR_APPROVED_BY_BLAZE_BOT | CONDITIONAL APPROVAL | BLOCKED]
**Merge Readiness**: [READY TO MERGE | READY AFTER FIXES | NOT READY]
**Recommendation**: [Brief explanation]

**Claude AI PR Review Complete**
```

### WordPress-Specific Review Criteria
- **Security**: Input/output handling, capability checks
- **Performance**: Database queries, asset loading
- **Standards**: WordPress coding standards compliance
- **Compatibility**: Theme and plugin compatibility
- **Functionality**: Feature completeness and reliability

## 🚫 Enforcement Rules

### Blocking Conditions
- **Security vulnerabilities**: Any security issue blocks merge
- **Parent theme modifications**: Cannot modify parent theme
- **Standards violations**: Major coding standard violations
- **Performance regressions**: Significant performance impact
- **Functionality breaks**: Any broken functionality

### Conditional Approval Conditions
- **Minor standards issues**: Acceptable with fix timeline
- **Documentation gaps**: Acceptable with completion plan
- **Performance optimizations**: Minor improvements needed
- **Code organization**: Refactoring suggestions provided

### Auto-Approval Conditions
- **All checks pass**: Ready for immediate merge
- **Security compliant**: No security issues found
- **Performance optimized**: Meets performance standards
- **Well documented**: Complete documentation provided

---
**Priority**: ALWAYS | **Scope**: BlazeCommerce Child Theme | **Enforcement**: Automated + Manual
