# Performance Optimization Guide

This guide covers performance optimization techniques and best practices for the BlazeCommerce Child Theme.

## Table of Contents

1. [Performance Principles](#performance-principles)
2. [Asset Optimization](#asset-optimization)
3. [Database Optimization](#database-optimization)
4. [Caching Strategies](#caching-strategies)
5. [Image Optimization](#image-optimization)
6. [JavaScript Optimization](#javascript-optimization)
7. [CSS Optimization](#css-optimization)
8. [Core Web Vitals](#core-web-vitals)
9. [Monitoring and Testing](#monitoring-and-testing)
10. [WooCommerce Performance](#woocommerce-performance)

## Performance Principles

### Key Metrics

Focus on these critical performance metrics:

- **First Contentful Paint (FCP)**: < 1.8 seconds
- **Largest Contentful Paint (LCP)**: < 2.5 seconds
- **First Input Delay (FID)**: < 100 milliseconds
- **Cumulative Layout Shift (CLS)**: < 0.1
- **Time to Interactive (TTI)**: < 3.8 seconds

### Performance Budget

Establish performance budgets:

```javascript
// Performance budget targets
const performanceBudget = {
    'total-page-size': '1.5MB',
    'javascript-size': '300KB',
    'css-size': '100KB',
    'image-size': '800KB',
    'font-size': '100KB',
    'requests': 50
};
```

## Asset Optimization

### Conditional Loading

Load assets only when needed:

```php
/**
 * Conditional asset loading
 */
function blazecommerce_child_conditional_assets() {
    // Load WooCommerce styles only on shop pages
    if (blazecommerce_child_is_woocommerce_page()) {
        wp_enqueue_style('woocommerce-custom', 
            get_stylesheet_directory_uri() . '/css/woocommerce.css',
            array(),
            '1.0.0'
        );
    }
    
    // Load contact form scripts only on contact page
    if (is_page('contact')) {
        wp_enqueue_script('contact-form',
            get_stylesheet_directory_uri() . '/js/contact-form.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
    
    // Load carousel scripts only when needed
    if (has_shortcode(get_post()->post_content, 'carousel') || is_front_page()) {
        wp_enqueue_script('carousel',
            get_stylesheet_directory_uri() . '/js/carousel.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_conditional_assets');
```

### Script Optimization

```php
/**
 * Optimize script loading
 */
function blazecommerce_child_optimize_scripts($tag, $handle, $src) {
    // Defer non-critical scripts
    $defer_scripts = array('analytics', 'social-widgets', 'comments');
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    // Async load for independent scripts
    $async_scripts = array('google-analytics', 'facebook-pixel');
    if (in_array($handle, $async_scripts)) {
        return str_replace(' src', ' async src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'blazecommerce_child_optimize_scripts', 10, 3);
```

### Resource Hints

```php
/**
 * Add resource hints for better performance
 */
function blazecommerce_child_resource_hints($urls, $relation_type) {
    switch ($relation_type) {
        case 'dns-prefetch':
            $urls[] = '//fonts.googleapis.com';
            $urls[] = '//fonts.gstatic.com';
            $urls[] = '//www.google-analytics.com';
            break;
            
        case 'preconnect':
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin'
            );
            break;
            
        case 'prefetch':
            if (is_front_page()) {
                $urls[] = get_permalink(get_option('page_for_posts'));
            }
            break;
    }
    
    return $urls;
}
add_filter('wp_resource_hints', 'blazecommerce_child_resource_hints', 10, 2);
```

## Database Optimization

### Query Optimization

```php
/**
 * Optimize database queries
 */
function blazecommerce_child_optimized_recent_posts($limit = 5) {
    // Use get_posts for simple queries (more efficient than WP_Query)
    $posts = get_posts(array(
        'numberposts' => $limit,
        'post_status' => 'publish',
        'fields' => 'ids', // Only get IDs if that's all you need
        'no_found_rows' => true, // Skip pagination queries
        'update_post_meta_cache' => false, // Skip meta cache if not needed
        'update_post_term_cache' => false, // Skip term cache if not needed
    ));
    
    return $posts;
}

/**
 * Efficient meta query
 */
function blazecommerce_child_get_featured_products() {
    global $wpdb;
    
    // Direct database query for better performance
    $product_ids = wp_cache_get('featured_products', 'blazecommerce_child');
    
    if (false === $product_ids) {
        $product_ids = $wpdb->get_col($wpdb->prepare("
            SELECT p.ID 
            FROM {$wpdb->posts} p
            INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
            WHERE p.post_type = 'product'
            AND p.post_status = 'publish'
            AND pm.meta_key = '_featured'
            AND pm.meta_value = 'yes'
            LIMIT %d
        ", 10));
        
        wp_cache_set('featured_products', $product_ids, 'blazecommerce_child', 3600);
    }
    
    return $product_ids;
}
```

### Transient Caching

```php
/**
 * Cache expensive operations
 */
function blazecommerce_child_get_popular_posts() {
    $cache_key = 'popular_posts_' . get_current_blog_id();
    $popular_posts = get_transient($cache_key);
    
    if (false === $popular_posts) {
        // Expensive query here
        $popular_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'meta_key' => 'post_views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ));
        
        // Cache for 1 hour
        set_transient($cache_key, $popular_posts, HOUR_IN_SECONDS);
    }
    
    return $popular_posts;
}

/**
 * Clear cache when needed
 */
function blazecommerce_child_clear_post_cache($post_id) {
    delete_transient('popular_posts_' . get_current_blog_id());
    delete_transient('recent_posts_' . get_current_blog_id());
}
add_action('save_post', 'blazecommerce_child_clear_post_cache');
```

## Caching Strategies

### Object Caching

```php
/**
 * Implement object caching
 */
function blazecommerce_child_get_menu_items($menu_location) {
    $cache_key = 'menu_items_' . $menu_location;
    $menu_items = wp_cache_get($cache_key, 'blazecommerce_child');
    
    if (false === $menu_items) {
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_location]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        
        wp_cache_set($cache_key, $menu_items, 'blazecommerce_child', 3600);
    }
    
    return $menu_items;
}
```

### Fragment Caching

```php
/**
 * Cache template fragments
 */
function blazecommerce_child_cached_template_part($template, $cache_key, $cache_time = 3600) {
    $output = get_transient($cache_key);
    
    if (false === $output) {
        ob_start();
        get_template_part($template);
        $output = ob_get_clean();
        
        set_transient($cache_key, $output, $cache_time);
    }
    
    echo $output;
}

// Usage
blazecommerce_child_cached_template_part(
    'template-parts/hero-banner',
    'hero_banner_' . get_the_ID(),
    DAY_IN_SECONDS
);
```

## Image Optimization

### Responsive Images

```php
/**
 * Add custom image sizes
 */
function blazecommerce_child_image_sizes() {
    add_image_size('hero-banner', 1920, 800, true);
    add_image_size('product-thumbnail', 300, 300, true);
    add_image_size('blog-featured', 800, 400, true);
}
add_action('after_setup_theme', 'blazecommerce_child_image_sizes');

/**
 * Generate responsive image markup
 */
function blazecommerce_child_responsive_image($image_id, $size = 'large', $class = '') {
    $image_src = wp_get_attachment_image_src($image_id, $size);
    $image_srcset = wp_get_attachment_image_srcset($image_id, $size);
    $image_sizes = wp_get_attachment_image_sizes($image_id, $size);
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    
    return sprintf(
        '<img src="%s" srcset="%s" sizes="%s" alt="%s" class="%s" loading="lazy">',
        esc_url($image_src[0]),
        esc_attr($image_srcset),
        esc_attr($image_sizes),
        esc_attr($image_alt),
        esc_attr($class)
    );
}
```

### WebP Support

```php
/**
 * Add WebP support
 */
function blazecommerce_child_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'blazecommerce_child_webp_support');

/**
 * Generate WebP versions
 */
function blazecommerce_child_generate_webp($metadata, $attachment_id) {
    if (!function_exists('imagewebp')) {
        return $metadata;
    }
    
    $upload_dir = wp_upload_dir();
    $file_path = get_attached_file($attachment_id);
    $file_info = pathinfo($file_path);
    
    if (in_array($file_info['extension'], array('jpg', 'jpeg', 'png'))) {
        $webp_path = $file_info['dirname'] . '/' . $file_info['filename'] . '.webp';
        
        // Create WebP version
        $image = null;
        switch ($file_info['extension']) {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($file_path);
                break;
            case 'png':
                $image = imagecreatefrompng($file_path);
                break;
        }
        
        if ($image) {
            imagewebp($image, $webp_path, 80);
            imagedestroy($image);
        }
    }
    
    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'blazecommerce_child_generate_webp', 10, 2);
```

### Lazy Loading

```php
/**
 * Enhanced lazy loading
 */
function blazecommerce_child_lazy_load_images($content) {
    if (is_admin() || is_feed()) {
        return $content;
    }
    
    // Add loading="lazy" to images
    $content = preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
    
    return $content;
}
add_filter('the_content', 'blazecommerce_child_lazy_load_images');
```

## JavaScript Optimization

### Code Splitting

```javascript
// Dynamic imports for code splitting
async function loadCarousel() {
    if (document.querySelector('.carousel')) {
        const { Carousel } = await import('./modules/carousel.js');
        new Carousel('.carousel');
    }
}

// Load only when needed
document.addEventListener('DOMContentLoaded', () => {
    loadCarousel();
});
```

### Debouncing and Throttling

```javascript
// Debounce function for search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Usage
const searchInput = document.getElementById('search');
const debouncedSearch = debounce(performSearch, 300);
searchInput.addEventListener('input', debouncedSearch);

const throttledScroll = throttle(handleScroll, 100);
window.addEventListener('scroll', throttledScroll);
```

### Intersection Observer

```javascript
// Efficient scroll-based animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe elements
document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
});
```

## CSS Optimization

### Critical CSS

```php
/**
 * Inline critical CSS
 */
function blazecommerce_child_critical_css() {
    if (is_front_page()) {
        $critical_css = file_get_contents(get_stylesheet_directory() . '/css/critical-home.css');
        echo '<style id="critical-css">' . $critical_css . '</style>';
    }
}
add_action('wp_head', 'blazecommerce_child_critical_css', 1);

/**
 * Load non-critical CSS asynchronously
 */
function blazecommerce_child_async_css($html, $handle, $href, $media) {
    if ($handle === 'main-styles') {
        $html = '<link rel="preload" href="' . $href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        $html .= '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
    }
    return $html;
}
add_filter('style_loader_tag', 'blazecommerce_child_async_css', 10, 4);
```

### CSS Purging

```javascript
// PurgeCSS configuration
module.exports = {
    content: [
        './templates/**/*.html',
        './parts/**/*.html',
        './patterns/**/*.php',
        './template-parts/**/*.php',
        './**/*.php'
    ],
    css: ['./style.css'],
    safelist: [
        'wp-block-*',
        'has-*',
        'is-*',
        /^woocommerce/,
        /^wp-/
    ]
};
```

## Core Web Vitals

### Largest Contentful Paint (LCP)

```php
/**
 * Optimize LCP
 */
function blazecommerce_child_optimize_lcp() {
    // Preload hero image
    if (is_front_page()) {
        $hero_image = get_theme_mod('hero_image');
        if ($hero_image) {
            echo '<link rel="preload" as="image" href="' . esc_url($hero_image) . '">';
        }
    }
    
    // Preload critical fonts
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/inter-var.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'blazecommerce_child_optimize_lcp', 1);
```

### Cumulative Layout Shift (CLS)

```css
/* Prevent layout shifts */
.hero-image {
    aspect-ratio: 16/9;
    object-fit: cover;
}

.product-image {
    aspect-ratio: 1/1;
    object-fit: cover;
}

/* Reserve space for ads */
.ad-banner {
    min-height: 250px;
    background: #f0f0f0;
}

/* Skeleton loaders */
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}
```

### First Input Delay (FID)

```javascript
// Optimize event handlers
document.addEventListener('DOMContentLoaded', () => {
    // Use event delegation
    document.addEventListener('click', (e) => {
        if (e.target.matches('.button')) {
            handleButtonClick(e);
        }
    });
    
    // Break up long tasks
    function processLargeArray(array) {
        return new Promise((resolve) => {
            const chunk = 100;
            let index = 0;
            
            function processChunk() {
                const endIndex = Math.min(index + chunk, array.length);
                
                for (let i = index; i < endIndex; i++) {
                    // Process item
                }
                
                index = endIndex;
                
                if (index < array.length) {
                    setTimeout(processChunk, 0);
                } else {
                    resolve();
                }
            }
            
            processChunk();
        });
    }
});
```

## Monitoring and Testing

### Performance Monitoring

```php
/**
 * Performance monitoring
 */
function blazecommerce_child_performance_monitor() {
    if (WP_DEBUG && current_user_can('manage_options')) {
        $queries = get_num_queries();
        $memory = size_format(memory_get_peak_usage(true));
        $time = timer_stop();
        
        echo "<!-- Performance: {$queries} queries, {$memory} memory, {$time}s -->";
    }
}
add_action('wp_footer', 'blazecommerce_child_performance_monitor');
```

### Testing Tools

1. **Google PageSpeed Insights**: Core Web Vitals analysis
2. **GTmetrix**: Detailed performance reports
3. **WebPageTest**: Advanced testing options
4. **Lighthouse**: Built-in Chrome auditing
5. **Query Monitor**: WordPress-specific debugging

## WooCommerce Performance

### Product Query Optimization

```php
/**
 * Optimize WooCommerce queries
 */
function blazecommerce_child_optimize_woo_queries() {
    // Disable cart fragments on non-shop pages
    if (!blazecommerce_child_is_woocommerce_page()) {
        wp_dequeue_script('wc-cart-fragments');
    }
    
    // Reduce product query complexity
    add_filter('woocommerce_product_query_meta_query', function($meta_query) {
        // Remove unnecessary meta queries
        return array_filter($meta_query, function($query) {
            return !isset($query['key']) || $query['key'] !== '_visibility';
        });
    });
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_optimize_woo_queries');
```

### Cart Optimization

```php
/**
 * Optimize cart performance
 */
function blazecommerce_child_optimize_cart() {
    // Cache cart totals
    add_filter('woocommerce_cart_needs_payment', function($needs_payment, $cart) {
        $cache_key = 'cart_needs_payment_' . md5(serialize($cart->get_cart()));
        $cached_result = wp_cache_get($cache_key, 'woocommerce');
        
        if (false !== $cached_result) {
            return $cached_result;
        }
        
        wp_cache_set($cache_key, $needs_payment, 'woocommerce', 300);
        return $needs_payment;
    }, 10, 2);
}
add_action('init', 'blazecommerce_child_optimize_cart');
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
