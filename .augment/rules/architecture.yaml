---
type: "agent_requested"
description: "Architectural patterns for WordPress child theme development"
---

# Architecture Guidelines Rule

## Directory Structure
```
blazecommerce-child/
├── assets/                 # Static assets (css, js, images, fonts)
├── parts/                 # Block template parts (header, footer, navigation)
├── patterns/              # Block patterns (hero, product, layout)
├── templates/             # FSE templates (single-product.html, page.html)
├── template-parts/        # PHP template parts (content, navigation, footer)
├── woocommerce/           # WooCommerce overrides (single-product, archive, cart)
├── src/                   # Source files (css, js, images)
├── functions.php          # Theme functions and hooks
├── style.css              # Main stylesheet with theme header
└── theme.json             # Theme configuration
```

### File Naming
- Lowercase with hyphens
- Follow WordPress template conventions
- Group related files in subdirectories
- Use descriptive, functional names

## Component Architecture

### 1. Block Pattern Organization
```php
// Register patterns by category
function blazecommerce_register_block_patterns() {
    // Hero patterns
    register_block_pattern_category(
        'blazecommerce-hero',
        array('label' => __('BlazeCommerce Hero', 'blazecommerce'))
    );
    
    // Product patterns
    register_block_pattern_category(
        'blazecommerce-product',
        array('label' => __('BlazeCommerce Products', 'blazecommerce'))
    );
}
```

### 2. Template Part Structure
- Create reusable template parts
- Implement proper template hierarchy
- Use consistent naming conventions
- Document template part usage

### 3. Gutenberg Block Standards

#### Block Metadata (block.json)
```json
{
    "apiVersion": 3,
    "name": "blazecommerce/product-showcase",
    "title": "Product Showcase",
    "category": "blazecommerce",
    "supports": {
        "className": true, "anchor": true,
        "spacing": {"padding": true, "margin": true},
        "color": {"background": true, "text": true},
        "typography": {"fontSize": true, "fontWeight": true},
        "border": {"width": true, "style": true, "color": true, "radius": true}
    },
    "attributes": {
        "uniqueId": {"type": "string", "default": ""},
        "className": {"type": "string", "default": ""},
        "backgroundColor": {"type": "string", "default": ""},
        "textColor": {"type": "string", "default": ""},
        "style": {"type": "object", "default": {}}
    }
}
```

#### Block Registration
```php
function blazecommerce_register_custom_blocks() {
    register_block_type(__DIR__ . '/blocks/product-showcase');
    register_block_type(__DIR__ . '/blocks/hero-banner');
    add_filter('block_categories_all', 'blazecommerce_register_block_category');
}

function blazecommerce_register_block_category($categories) {
    return array_merge($categories, array(
        array('slug' => 'blazecommerce', 'title' => __('BlazeCommerce', 'blazecommerce'))
    ));
}
```

## State Management & Integration

### WordPress Options & Customizer
```php
// Theme options
function blazecommerce_get_theme_options() {
    return wp_parse_args(get_option('blazecommerce_options', array()), array(
        'logo_url' => '', 'primary_color' => '#000000', 'enable_cart_drawer' => true
    ));
}
```

### WooCommerce Integration
```php
// Customize product display
function blazecommerce_customize_product_display() {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    add_action('woocommerce_single_product_summary', 'blazecommerce_custom_product_title', 5);
}
```

### Block Development Best Practices

#### Unique ID Generation
```php
function blazecommerce_generate_block_id($attributes, $block_name) {
    return !empty($attributes['uniqueId']) ? $attributes['uniqueId'] :
           'blazecommerce-' . $block_name . '-' . wp_generate_uuid4();
}

function blazecommerce_render_product_showcase($attributes, $content, $block) {
    $unique_id = blazecommerce_generate_block_id($attributes, 'product-showcase');
    $wrapper_attributes = get_block_wrapper_attributes(array(
        'id' => $unique_id, 'class' => 'blazecommerce-product-showcase'
    ));
    return sprintf('<div %1$s>%2$s</div>', $wrapper_attributes, $content);
}
```

#### Block Patterns & Templates
```php
// Block pattern registration
function blazecommerce_register_block_patterns() {
    register_block_pattern('blazecommerce/hero-with-products', array(
        'title' => __('Hero Section with Products', 'blazecommerce'),
        'content' => '<!-- wp:blazecommerce/hero-banner --><!-- /wp:blazecommerce/hero-banner -->',
        'categories' => array('blazecommerce'),
        'keywords' => array('hero', 'products')
    ));
}

// Template part registration
function blazecommerce_register_template_parts() {
    register_block_pattern('blazecommerce/header-with-cart', array(
        'title' => __('Header with Cart', 'blazecommerce'),
        'content' => '<!-- wp:template-part {"slug":"header"} /-->',
        'categories' => array('header')
    ));
}
```

## Performance & Caching

### Asset Loading & Kinsta Cache
```php
// Optimized asset loading
function blazecommerce_enqueue_assets() {
    wp_add_inline_style('blazecommerce-style', blazecommerce_get_critical_css());
    wp_enqueue_style('blazecommerce-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('blazecommerce-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}

// Kinsta-compatible block caching
function blazecommerce_cache_block_output($block_name, $attributes, $callback) {
    $cache_key = 'blazecommerce_block_' . $block_name . '_' . md5(serialize($attributes));
    $cached_output = wp_cache_get($cache_key, 'blazecommerce_blocks');
    if (false === $cached_output) {
        $cached_output = call_user_func($callback, $attributes);
        wp_cache_set($cache_key, $cached_output, 'blazecommerce_blocks', HOUR_IN_SECONDS);
    }
    return $cached_output;
}

// Clear cache on content changes
function blazecommerce_clear_block_cache($post_id) {
    wp_cache_flush_group('blazecommerce_blocks');
    if (function_exists('kinsta_cache_purge')) { kinsta_cache_purge(); }
}
add_action('save_post', 'blazecommerce_clear_block_cache');

// Optimized queries with caching
function blazecommerce_get_featured_products($limit = 8) {
    $cache_key = 'blazecommerce_featured_products_' . $limit;
    $products = wp_cache_get($cache_key);
    if (false === $products) {
        $products = wc_get_products(array('featured' => true, 'limit' => $limit, 'status' => 'publish'));
        wp_cache_set($cache_key, $products, '', HOUR_IN_SECONDS);
    }
    return $products;
}
```

### Cache Management
- **Manual Clear**: `/wp-admin/admin.php?page=kinsta-tools`
- **Requirements**: Kinsta edge cache compatibility, 1-hour cacheable output
- **Invalidation**: Automatic on content changes

## Security, I18n & Extensibility

### Security & Permissions
```php
// Input validation, output escaping, capability checks
function blazecommerce_check_permissions($capability = 'manage_options') {
    if (!current_user_can($capability)) {
        wp_die(__('You do not have sufficient permissions.', 'blazecommerce'));
    }
}
```

### Internationalization
```php
function blazecommerce_setup_theme() {
    load_theme_textdomain('blazecommerce', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
```

### Extensibility & Testing
```php
// Custom hooks for extensibility
function blazecommerce_product_display() {
    do_action('blazecommerce_before_product_display');
    // Product display logic
    do_action('blazecommerce_after_product_display');
}
```

**Testing Requirements:**
- Unit testing with PHPUnit
- Integration testing for WooCommerce
- Accessibility compliance validation
- Cross-version compatibility testing

## Troubleshooting

### Cache Issues
1. **Block changes not appearing**: Navigate to `/wp-admin/admin.php?page=kinsta-tools`, click "Clear Cache"
2. **Performance issues**: Monitor rendering time, check queries, verify edge cache
3. **Development**: Disable caching during development, clear after updates

## Context
WordPress child theme development with FSE support, WooCommerce integration, Gutenberg blocks, performance optimization with Kinsta hosting, and security implementation.
