# Functions Reference - BlazeCommerce Child Theme

## 🚀 Theme Setup Functions

### `blazecommerce_child_setup()`
**Main theme setup function - configures features and support**

```php
function blazecommerce_child_setup() {
    // Theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));

    // Navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'blazecommerce-child'),
        'footer' => __('Footer Menu', 'blazecommerce-child'),
    ));
}
add_action('after_setup_theme', 'blazecommerce_child_setup');
```

## 📦 Enqueue Functions

### `blazecommerce_child_enqueue_styles()`
**Properly enqueues parent and child theme stylesheets**

```php
function blazecommerce_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_styles');
```

### `blazecommerce_child_enqueue_scripts()`
**Enqueues custom JavaScript files**

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

## 🎨 Customizer Functions

### `blazecommerce_child_customize_register()`
**Registers custom theme options in WordPress Customizer**

```php
function blazecommerce_child_customize_register($wp_customize) {
    // Custom section
    $wp_customize->add_section('blazecommerce_child_options', array(
        'title' => __('BlazeCommerce Options', 'blazecommerce-child'),
        'priority' => 30,
    ));

    // Custom setting & control
    $wp_customize->add_setting('blazecommerce_child_accent_color', array(
        'default' => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blazecommerce_child_accent_color', array(
        'label' => __('Accent Color', 'blazecommerce-child'),
        'section' => 'blazecommerce_child_options',
    )));
}
add_action('customize_register', 'blazecommerce_child_customize_register');
```

## 🛒 WooCommerce Functions

### `blazecommerce_child_woocommerce_setup()`
**Configures WooCommerce theme support and features**

```php
function blazecommerce_child_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'blazecommerce_child_woocommerce_setup');
```

### `blazecommerce_child_woocommerce_cart_count()`
**Returns current cart item count**

```php
function blazecommerce_child_woocommerce_cart_count() {
    if (function_exists('WC')) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

// Usage: $cart_count = blazecommerce_child_woocommerce_cart_count();
```

## 🔧 Utility Functions

### `blazecommerce_child_get_theme_option()`
**Retrieves theme customizer options with fallback defaults**

```php
function blazecommerce_child_get_theme_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

// Usage examples
$accent_color = blazecommerce_child_get_theme_option('blazecommerce_child_accent_color', '#007cba');
$logo_url = blazecommerce_child_get_theme_option('custom_logo');
```

### `blazecommerce_child_is_woocommerce_page()`
**Checks if current page is WooCommerce-related**

```php
function blazecommerce_child_is_woocommerce_page() {
    if (function_exists('is_woocommerce')) {
        return is_woocommerce() || is_cart() || is_checkout() || is_account_page();
    }
    return false;
}
// Usage: if (blazecommerce_child_is_woocommerce_page()) { /* WooCommerce code */ }
```

### `blaze_disable_action_scheduler_for_staging()`
**Disables Action Scheduler on staging domains (.blz.onl)**

```php
function blaze_disable_action_scheduler_for_staging() {
    $current_domain = $_SERVER['HTTP_HOST'] ?? '';
    if (strpos($current_domain, '.blz.onl') !== false) {
        add_filter('action_scheduler_queue_runner_interval', '__return_false');
        add_filter('action_scheduler_disable_default_runner', '__return_true');
    }
}
add_action('init', 'blaze_disable_action_scheduler_for_staging');
```

## 🔗 Hook Reference

### Action Hooks
- **`blazecommerce_child_header_before`**: Fires before header content
- **`blazecommerce_child_footer_after`**: Fires after footer content

```php
add_action('blazecommerce_child_header_before', 'my_custom_header_content');
add_action('blazecommerce_child_footer_after', 'my_custom_footer_content');
```

### Filter Hooks
- **`blazecommerce_child_theme_options`**: Filters theme options array
- **`blazecommerce_child_enqueue_styles`**: Filters styles to be enqueued

```php
add_filter('blazecommerce_child_theme_options', function($options) {
    $options['new_option'] = 'default_value';
    return $options;
});
```

## 📝 Function Standards

### Naming Conventions
1. **Prefix**: `blazecommerce_child_` for all functions
2. **Descriptive**: Clear purpose in function name
3. **Consistent**: Similar patterns for similar functions
4. **No Conflicts**: Prefixing prevents theme/plugin conflicts

### Adding New Functions
1. Follow naming conventions with proper prefix
2. Add PHPDoc comments (description, parameters, return)
3. Update this documentation with examples
4. Test thoroughly before committing

---
**Optimized**: July 2025 | **Focus**: Theme setup, WooCommerce, customizer, utility functions
