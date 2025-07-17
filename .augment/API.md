# API Reference - BlazeCommerce Child Theme

## 🔗 Action Hooks

### Theme Setup
- **`blazecommerce_child_after_setup_theme`**: After theme setup complete
- **`blazecommerce_child_enqueue_scripts`**: Scripts/styles enqueue time

```php
add_action('blazecommerce_child_after_setup_theme', 'my_custom_setup');
add_action('blazecommerce_child_enqueue_scripts', 'my_custom_assets');
```

### Layout Hooks
- **`blazecommerce_child_header_before/after`**: Header content hooks
- **`blazecommerce_child_content_before/after`**: Main content area hooks
- **`blazecommerce_child_footer_before/after`**: Footer content hooks

```php
add_action('blazecommerce_child_header_before', 'add_announcement_bar');
function add_announcement_bar() {
    echo '<div class="announcement-bar">Special offer!</div>';
}
```

### WooCommerce Hooks
- **`blazecommerce_child_woocommerce_setup`**: WooCommerce theme setup

```php
add_action('blazecommerce_child_woocommerce_setup', 'my_woo_customizations');
function my_woo_customizations() {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    add_action('woocommerce_single_product_summary', 'my_custom_rating', 10);
}
```

- **`blazecommerce_child_product_loop_start/end`**: Product loop hooks

## 🔧 Filter Hooks

### Theme Configuration
- **`blazecommerce_child_theme_options`**: Filters theme options array
- **`blazecommerce_child_default_colors`**: Filters color palette

```php
add_filter('blazecommerce_child_theme_options', 'modify_theme_options');
add_filter('blazecommerce_child_default_colors', 'custom_color_palette');
function custom_color_palette($colors) {
    $colors['brand-primary'] = '#8b5cf6';
    return $colors;
}
```

### Assets & Content
- **`blazecommerce_child_enqueue_styles/scripts`**: Filters assets to enqueue
- **`blazecommerce_child_excerpt_length/more`**: Excerpt customization
- **`blazecommerce_child_nav_menu_args`**: Navigation menu arguments

```php
add_filter('blazecommerce_child_excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length) {
    return 25; // 25 words instead of default
}
```

## 🛠️ Theme Functions API

### Configuration Functions
```php
// Get/set theme options
$accent_color = blazecommerce_child_get_theme_option('accent_color', '#007cba');
blazecommerce_child_set_theme_option('show_sidebar', true);
```

### Utility Functions
```php
// Check WooCommerce pages
if (blazecommerce_child_is_woocommerce_page()) {
    // WooCommerce-specific code
}

// Get asset URLs
$logo_url = blazecommerce_child_get_asset_url('images/logo.png');

// Render SVG icons
echo blazecommerce_child_render_icon('cart', 'medium', 'icon-class');
```

### Content Functions
```php
// Enhanced post meta with caching
$meta_value = blazecommerce_child_get_post_meta($post_id, 'custom_key', true);

// Format prices with currency
$formatted_price = blazecommerce_child_format_price(29.99, 'USD'); // Output: $29.99
```

## 🎨 Customizer API

### Custom Sections & Controls
```php
function blazecommerce_child_customize_register($wp_customize) {
    // Add section
    $wp_customize->add_section('blazecommerce_custom', array(
        'title' => __('Custom Options', 'blazecommerce-child'),
        'priority' => 30,
    ));

    // Add setting & control
    $wp_customize->add_setting('custom_setting', array(
        'default' => 'default_value',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_setting', array(
        'label' => __('Custom Setting', 'blazecommerce-child'),
        'section' => 'blazecommerce_custom',
        'type' => 'text',
    ));
}
add_action('customize_register', 'blazecommerce_child_customize_register');
```

## 🛒 WooCommerce Integration

### Product & Checkout Hooks
```php
// Product meta area
add_action('blazecommerce_child_product_meta', 'add_custom_product_info');
function add_custom_product_info($product) {
    $custom_field = get_post_meta($product->get_id(), 'custom_field', true);
    if ($custom_field) {
        echo '<div class="custom-product-info">' . esc_html($custom_field) . '</div>';
    }
}

// Customize checkout fields
add_filter('blazecommerce_child_checkout_fields', 'customize_checkout_fields');
function customize_checkout_fields($fields) {
    $fields['billing']['billing_phone']['required'] = false;
    return $fields;
}
```

## 📝 Block Editor Integration

### Block Registration & Patterns
```php
// Register custom block
function blazecommerce_child_register_blocks() {
    register_block_type('blazecommerce-child/custom-block', array(
        'render_callback' => 'blazecommerce_child_render_custom_block',
    ));
}
add_action('init', 'blazecommerce_child_register_blocks');

// Register block pattern
function blazecommerce_child_register_patterns() {
    register_block_pattern('blazecommerce-child/hero-banner', array(
        'title' => __('Hero Banner', 'blazecommerce-child'),
        'content' => '<!-- wp:group --><!-- /wp:group -->',
        'categories' => array('banner'),
    ));
}
add_action('init', 'blazecommerce_child_register_patterns');
```

## 🔗 Custom Hooks & Usage Examples

### Creating Custom Hooks
```php
function blazecommerce_child_custom_function() {
    do_action('blazecommerce_child_before_custom_action');
    $data = apply_filters('blazecommerce_child_custom_data', array('key' => 'value'));
    do_action('blazecommerce_child_after_custom_action', $data);
    return $data;
}
```

### Complete Integration Example
```php
function my_theme_customizations() {
    // Theme options
    add_filter('blazecommerce_child_theme_options', function($options) {
        $options['show_breadcrumbs'] = true;
        return $options;
    });

    // Header content
    add_action('blazecommerce_child_header_after', function() {
        if (blazecommerce_child_get_theme_option('show_breadcrumbs')) {
            echo '<div class="breadcrumbs">' . get_breadcrumbs() . '</div>';
        }
    });
}
add_action('after_setup_theme', 'my_theme_customizations');
```

---
**Optimized**: July 2025 | **Focus**: Hooks, filters, customizer, WooCommerce, blocks
