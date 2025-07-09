# API Reference

This document provides comprehensive documentation for all hooks, filters, and API functions available in the BlazeCommerce Child Theme.

## Table of Contents

1. [Action Hooks](#action-hooks)
2. [Filter Hooks](#filter-hooks)
3. [Theme Functions API](#theme-functions-api)
4. [Customizer API](#customizer-api)
5. [WooCommerce Integration](#woocommerce-integration)
6. [Block Editor Integration](#block-editor-integration)
7. [Custom Hooks](#custom-hooks)
8. [Usage Examples](#usage-examples)

## Action Hooks

### Theme Setup Hooks

#### `blazecommerce_child_after_setup_theme`
**Description**: Fires after theme setup is complete  
**Location**: `functions.php`  
**Parameters**: None

```php
add_action('blazecommerce_child_after_setup_theme', 'my_custom_setup');
function my_custom_setup() {
    // Custom theme setup code
}
```

#### `blazecommerce_child_enqueue_scripts`
**Description**: Fires when scripts and styles are enqueued  
**Location**: `functions.php`  
**Parameters**: None

```php
add_action('blazecommerce_child_enqueue_scripts', 'my_custom_assets');
function my_custom_assets() {
    wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/custom.js');
}
```

### Layout Hooks

#### `blazecommerce_child_header_before`
**Description**: Fires before the header content  
**Location**: `parts/header.html`  
**Parameters**: None

```php
add_action('blazecommerce_child_header_before', 'add_announcement_bar');
function add_announcement_bar() {
    echo '<div class="announcement-bar">Special offer!</div>';
}
```

#### `blazecommerce_child_header_after`
**Description**: Fires after the header content  
**Location**: `parts/header.html`  
**Parameters**: None

#### `blazecommerce_child_content_before`
**Description**: Fires before main content area  
**Location**: Various templates  
**Parameters**: None

#### `blazecommerce_child_content_after`
**Description**: Fires after main content area  
**Location**: Various templates  
**Parameters**: None

#### `blazecommerce_child_footer_before`
**Description**: Fires before the footer content  
**Location**: `parts/footer.html`  
**Parameters**: None

#### `blazecommerce_child_footer_after`
**Description**: Fires after the footer content  
**Location**: `parts/footer.html`  
**Parameters**: None

### WooCommerce Hooks

#### `blazecommerce_child_woocommerce_setup`
**Description**: Fires during WooCommerce theme setup  
**Location**: `functions.php`  
**Parameters**: None

```php
add_action('blazecommerce_child_woocommerce_setup', 'my_woo_customizations');
function my_woo_customizations() {
    // Remove default WooCommerce actions
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    
    // Add custom actions
    add_action('woocommerce_single_product_summary', 'my_custom_rating', 10);
}
```

#### `blazecommerce_child_product_loop_start`
**Description**: Fires at the start of product loops  
**Location**: WooCommerce templates  
**Parameters**: None

#### `blazecommerce_child_product_loop_end`
**Description**: Fires at the end of product loops  
**Location**: WooCommerce templates  
**Parameters**: None

## Filter Hooks

### Theme Configuration Filters

#### `blazecommerce_child_theme_options`
**Description**: Filters the theme options array  
**Parameters**: `$options` (array) - Theme options  
**Return**: array - Modified theme options

```php
add_filter('blazecommerce_child_theme_options', 'modify_theme_options');
function modify_theme_options($options) {
    $options['custom_option'] = 'default_value';
    return $options;
}
```

#### `blazecommerce_child_default_colors`
**Description**: Filters the default color palette  
**Parameters**: `$colors` (array) - Color definitions  
**Return**: array - Modified color palette

```php
add_filter('blazecommerce_child_default_colors', 'custom_color_palette');
function custom_color_palette($colors) {
    $colors['brand-primary'] = '#8b5cf6';
    $colors['brand-secondary'] = '#a78bfa';
    return $colors;
}
```

### Asset Filters

#### `blazecommerce_child_enqueue_styles`
**Description**: Filters styles to be enqueued  
**Parameters**: `$styles` (array) - Styles array  
**Return**: array - Modified styles array

```php
add_filter('blazecommerce_child_enqueue_styles', 'add_custom_styles');
function add_custom_styles($styles) {
    $styles['custom-style'] = array(
        'src' => get_stylesheet_directory_uri() . '/css/custom.css',
        'deps' => array('parent-style'),
        'version' => '1.0.0'
    );
    return $styles;
}
```

#### `blazecommerce_child_enqueue_scripts`
**Description**: Filters scripts to be enqueued  
**Parameters**: `$scripts` (array) - Scripts array  
**Return**: array - Modified scripts array

### Content Filters

#### `blazecommerce_child_excerpt_length`
**Description**: Filters the excerpt length  
**Parameters**: `$length` (int) - Number of words  
**Return**: int - Modified length

```php
add_filter('blazecommerce_child_excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length) {
    return 25; // 25 words instead of default
}
```

#### `blazecommerce_child_excerpt_more`
**Description**: Filters the excerpt "more" text  
**Parameters**: `$more` (string) - More text  
**Return**: string - Modified more text

```php
add_filter('blazecommerce_child_excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '">Read more</a>';
}
```

### Navigation Filters

#### `blazecommerce_child_nav_menu_args`
**Description**: Filters navigation menu arguments  
**Parameters**: `$args` (array) - Menu arguments  
**Return**: array - Modified arguments

```php
add_filter('blazecommerce_child_nav_menu_args', 'modify_nav_args');
function modify_nav_args($args) {
    if ($args['theme_location'] === 'primary') {
        $args['menu_class'] = 'nav-menu custom-class';
    }
    return $args;
}
```

## Theme Functions API

### Configuration Functions

#### `blazecommerce_child_get_theme_option($option, $default)`
**Description**: Retrieves theme customizer options  
**Parameters**:
- `$option` (string) - Option name
- `$default` (mixed) - Default value

**Return**: mixed - Option value or default

```php
$accent_color = blazecommerce_child_get_theme_option('accent_color', '#007cba');
$show_sidebar = blazecommerce_child_get_theme_option('show_sidebar', true);
```

#### `blazecommerce_child_set_theme_option($option, $value)`
**Description**: Sets theme customizer options  
**Parameters**:
- `$option` (string) - Option name
- `$value` (mixed) - Option value

**Return**: bool - Success status

### Utility Functions

#### `blazecommerce_child_is_woocommerce_page()`
**Description**: Checks if current page is WooCommerce-related  
**Parameters**: None  
**Return**: bool - True if WooCommerce page

```php
if (blazecommerce_child_is_woocommerce_page()) {
    // WooCommerce-specific code
}
```

#### `blazecommerce_child_get_asset_url($path)`
**Description**: Gets URL for theme assets  
**Parameters**: `$path` (string) - Asset path  
**Return**: string - Full asset URL

```php
$logo_url = blazecommerce_child_get_asset_url('images/logo.png');
```

#### `blazecommerce_child_render_icon($icon, $size, $class)`
**Description**: Renders SVG icons  
**Parameters**:
- `$icon` (string) - Icon name
- `$size` (string) - Icon size (small, medium, large)
- `$class` (string) - Additional CSS classes

**Return**: string - SVG markup

```php
echo blazecommerce_child_render_icon('cart', 'medium', 'text-blue-500');
```

### Content Functions

#### `blazecommerce_child_get_post_meta($post_id, $key, $single)`
**Description**: Enhanced post meta retrieval with caching  
**Parameters**:
- `$post_id` (int) - Post ID
- `$key` (string) - Meta key
- `$single` (bool) - Return single value

**Return**: mixed - Meta value

#### `blazecommerce_child_format_price($price, $currency)`
**Description**: Formats prices with proper currency display  
**Parameters**:
- `$price` (float) - Price amount
- `$currency` (string) - Currency code

**Return**: string - Formatted price

```php
$formatted_price = blazecommerce_child_format_price(29.99, 'USD');
// Output: $29.99
```

## Customizer API

### Registering Custom Sections

```php
function blazecommerce_child_customize_register($wp_customize) {
    // Add custom section
    $wp_customize->add_section('blazecommerce_custom', array(
        'title' => __('Custom Options', 'blazecommerce-child'),
        'priority' => 30,
        'description' => __('Customize theme appearance', 'blazecommerce-child'),
    ));
    
    // Add setting
    $wp_customize->add_setting('custom_setting', array(
        'default' => 'default_value',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh', // or 'postMessage' for live preview
    ));
    
    // Add control
    $wp_customize->add_control('custom_setting', array(
        'label' => __('Custom Setting', 'blazecommerce-child'),
        'section' => 'blazecommerce_custom',
        'type' => 'text',
    ));
}
add_action('customize_register', 'blazecommerce_child_customize_register');
```

### Custom Control Types

```php
// Color control
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
    'label' => __('Accent Color', 'blazecommerce-child'),
    'section' => 'colors',
)));

// Image control
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
    'label' => __('Hero Image', 'blazecommerce-child'),
    'section' => 'header_image',
)));

// Select control
$wp_customize->add_control('layout_style', array(
    'label' => __('Layout Style', 'blazecommerce-child'),
    'section' => 'layout',
    'type' => 'select',
    'choices' => array(
        'boxed' => __('Boxed', 'blazecommerce-child'),
        'full-width' => __('Full Width', 'blazecommerce-child'),
    ),
));
```

## WooCommerce Integration

### Product Hooks

#### `blazecommerce_child_product_meta`
**Description**: Fires in product meta area  
**Parameters**: `$product` (WC_Product) - Product object

```php
add_action('blazecommerce_child_product_meta', 'add_custom_product_info');
function add_custom_product_info($product) {
    $custom_field = get_post_meta($product->get_id(), 'custom_field', true);
    if ($custom_field) {
        echo '<div class="custom-product-info">' . esc_html($custom_field) . '</div>';
    }
}
```

### Cart and Checkout Hooks

#### `blazecommerce_child_cart_updated`
**Description**: Fires when cart is updated  
**Parameters**: `$cart_contents` (array) - Cart contents

#### `blazecommerce_child_checkout_fields`
**Description**: Filters checkout fields  
**Parameters**: `$fields` (array) - Checkout fields  
**Return**: array - Modified fields

```php
add_filter('blazecommerce_child_checkout_fields', 'customize_checkout_fields');
function customize_checkout_fields($fields) {
    $fields['billing']['billing_phone']['required'] = false;
    return $fields;
}
```

## Block Editor Integration

### Block Registration

```php
function blazecommerce_child_register_blocks() {
    // Register custom block
    register_block_type('blazecommerce-child/custom-block', array(
        'editor_script' => 'blazecommerce-child-blocks',
        'editor_style' => 'blazecommerce-child-blocks-editor',
        'style' => 'blazecommerce-child-blocks',
        'render_callback' => 'blazecommerce_child_render_custom_block',
    ));
}
add_action('init', 'blazecommerce_child_register_blocks');
```

### Block Patterns

```php
function blazecommerce_child_register_patterns() {
    register_block_pattern(
        'blazecommerce-child/hero-banner',
        array(
            'title' => __('Hero Banner', 'blazecommerce-child'),
            'description' => __('A hero banner with title and CTA', 'blazecommerce-child'),
            'content' => '<!-- wp:group --><!-- /wp:group -->',
            'categories' => array('banner'),
        )
    );
}
add_action('init', 'blazecommerce_child_register_patterns');
```

## Custom Hooks

### Creating Custom Hooks

```php
// In your theme functions
function blazecommerce_child_custom_function() {
    // Before custom action
    do_action('blazecommerce_child_before_custom_action');
    
    // Custom functionality
    $data = array('key' => 'value');
    
    // Filter the data
    $data = apply_filters('blazecommerce_child_custom_data', $data);
    
    // After custom action
    do_action('blazecommerce_child_after_custom_action', $data);
    
    return $data;
}
```

### Hook Documentation Template

```php
/**
 * Fires before custom action is performed.
 *
 * @since 1.0.0
 *
 * @param array $args Arguments passed to the action.
 */
do_action('blazecommerce_child_before_custom_action', $args);

/**
 * Filters custom data before processing.
 *
 * @since 1.0.0
 *
 * @param array $data The data to be filtered.
 * @param int   $id   The ID associated with the data.
 */
$data = apply_filters('blazecommerce_child_custom_data', $data, $id);
```

## Usage Examples

### Complete Customization Example

```php
// Add custom functionality
function my_theme_customizations() {
    // Modify theme options
    add_filter('blazecommerce_child_theme_options', function($options) {
        $options['show_breadcrumbs'] = true;
        return $options;
    });
    
    // Add custom header content
    add_action('blazecommerce_child_header_after', function() {
        if (blazecommerce_child_get_theme_option('show_breadcrumbs')) {
            echo '<div class="breadcrumbs">' . get_breadcrumbs() . '</div>';
        }
    });
    
    // Customize WooCommerce
    add_action('blazecommerce_child_woocommerce_setup', function() {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
        add_action('woocommerce_single_product_summary', 'my_custom_product_description', 20);
    });
}
add_action('after_setup_theme', 'my_theme_customizations');
```

### Plugin Integration Example

```php
// Integrate with third-party plugin
function integrate_with_plugin() {
    if (class_exists('ThirdPartyPlugin')) {
        // Use theme hooks to integrate
        add_action('blazecommerce_child_content_before', function() {
            if (is_single()) {
                ThirdPartyPlugin::display_widget();
            }
        });
        
        // Filter plugin output
        add_filter('third_party_plugin_output', function($output) {
            return '<div class="plugin-wrapper">' . $output . '</div>';
        });
    }
}
add_action('plugins_loaded', 'integrate_with_plugin');
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
