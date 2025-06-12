# Functions Reference

This document provides comprehensive documentation for all custom functions in the BlazeCommerce Child Theme.

## Table of Contents

1. [Theme Setup Functions](#theme-setup-functions)
2. [Enqueue Functions](#enqueue-functions)
3. [Customizer Functions](#customizer-functions)
4. [WooCommerce Functions](#woocommerce-functions)
5. [Utility Functions](#utility-functions)
6. [Hook Reference](#hook-reference)

## Theme Setup Functions

### `blazecommerce_child_setup()`

**Description**: Main theme setup function that configures theme features and support.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'blazecommerce-child'),
        'footer' => __('Footer Menu', 'blazecommerce-child'),
    ));
}
add_action('after_setup_theme', 'blazecommerce_child_setup');
```

**Parameters**: None

**Return**: void

**Since**: 1.0.0

---

## Enqueue Functions

### `blazecommerce_child_enqueue_styles()`

**Description**: Properly enqueues parent and child theme stylesheets.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Enqueue child theme stylesheet with parent as dependency
    wp_enqueue_style('child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_styles');
```

**Parameters**: None

**Return**: void

**Since**: 1.0.0

**Notes**: 
- Parent stylesheet is loaded first as dependency
- Child theme version is used for cache busting
- Follows WordPress best practices for child themes

### `blazecommerce_child_enqueue_scripts()`

**Description**: Enqueues custom JavaScript files for the theme.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_enqueue_scripts() {
    wp_enqueue_script('blazecommerce-child-script', 
        get_stylesheet_directory_uri() . '/js/script.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_scripts');
```

**Parameters**: None

**Return**: void

**Since**: 1.0.0

---

## Customizer Functions

### `blazecommerce_child_customize_register()`

**Description**: Registers custom theme options in WordPress Customizer.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_customize_register($wp_customize) {
    // Add custom section
    $wp_customize->add_section('blazecommerce_child_options', array(
        'title' => __('BlazeCommerce Options', 'blazecommerce-child'),
        'priority' => 30,
    ));
    
    // Add custom setting
    $wp_customize->add_setting('blazecommerce_child_accent_color', array(
        'default' => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Add custom control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blazecommerce_child_accent_color', array(
        'label' => __('Accent Color', 'blazecommerce-child'),
        'section' => 'blazecommerce_child_options',
    )));
}
add_action('customize_register', 'blazecommerce_child_customize_register');
```

**Parameters**: 
- `$wp_customize` (WP_Customize_Manager): WordPress Customizer manager object

**Return**: void

**Since**: 1.0.0

---

## WooCommerce Functions

### `blazecommerce_child_woocommerce_setup()`

**Description**: Configures WooCommerce theme support and features.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'blazecommerce_child_woocommerce_setup');
```

**Parameters**: None

**Return**: void

**Since**: 1.0.0

### `blazecommerce_child_woocommerce_cart_count()`

**Description**: Returns the current cart item count for display.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_woocommerce_cart_count() {
    if (function_exists('WC')) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

// Usage in templates
$cart_count = blazecommerce_child_woocommerce_cart_count();
echo sprintf(__('Cart (%d)', 'blazecommerce-child'), $cart_count);
```

**Parameters**: None

**Return**: int - Number of items in cart

**Since**: 1.0.0

---

## Utility Functions

### `blazecommerce_child_get_theme_option()`

**Description**: Retrieves theme customizer options with fallback defaults.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_get_theme_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

// Usage examples
$accent_color = blazecommerce_child_get_theme_option('blazecommerce_child_accent_color', '#007cba');
$logo_url = blazecommerce_child_get_theme_option('custom_logo');
```

**Parameters**:
- `$option_name` (string): Name of the theme option
- `$default` (mixed): Default value if option doesn't exist

**Return**: mixed - Theme option value or default

**Since**: 1.0.0

### `blazecommerce_child_is_woocommerce_page()`

**Description**: Checks if current page is a WooCommerce page.

**Location**: `functions.php`

**Usage**:
```php
function blazecommerce_child_is_woocommerce_page() {
    if (function_exists('is_woocommerce')) {
        return is_woocommerce() || is_cart() || is_checkout() || is_account_page();
    }
    return false;
}

// Usage in templates
if (blazecommerce_child_is_woocommerce_page()) {
    // WooCommerce specific code
}
```

**Parameters**: None

**Return**: bool - True if WooCommerce page, false otherwise

**Since**: 1.0.0

---

## Hook Reference

### Action Hooks

#### `blazecommerce_child_header_before`
**Description**: Fires before the header content
**Location**: `parts/header.html`
**Usage**:
```php
add_action('blazecommerce_child_header_before', 'my_custom_header_content');
```

#### `blazecommerce_child_footer_after`
**Description**: Fires after the footer content
**Location**: `parts/footer.html`
**Usage**:
```php
add_action('blazecommerce_child_footer_after', 'my_custom_footer_content');
```

### Filter Hooks

#### `blazecommerce_child_theme_options`
**Description**: Filters theme options array
**Parameters**: `$options` (array)
**Usage**:
```php
add_filter('blazecommerce_child_theme_options', function($options) {
    $options['new_option'] = 'default_value';
    return $options;
});
```

#### `blazecommerce_child_enqueue_styles`
**Description**: Filters styles to be enqueued
**Parameters**: `$styles` (array)
**Usage**:
```php
add_filter('blazecommerce_child_enqueue_styles', function($styles) {
    $styles['custom-style'] = get_stylesheet_directory_uri() . '/css/custom.css';
    return $styles;
});
```

---

## Function Naming Conventions

All custom functions follow these naming conventions:

1. **Prefix**: All functions start with `blazecommerce_child_`
2. **Descriptive**: Function names clearly describe their purpose
3. **Consistent**: Similar functions use consistent naming patterns
4. **No Conflicts**: Prefixing prevents conflicts with other themes/plugins

## Adding New Functions

When adding new functions:

1. **Follow naming conventions** with `blazecommerce_child_` prefix
2. **Add PHPDoc comments** with description, parameters, return values
3. **Update this documentation** with function details and examples
4. **Include usage examples** for complex functions
5. **Test thoroughly** before committing

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
