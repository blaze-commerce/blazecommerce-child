---
type: "agent_requested"
description: "Performance optimization guidelines for BlazeCommerce child theme"
---

# Performance Optimization - BlazeCommerce Child Theme

## 🎯 Key Metrics & Targets
- **FCP**: < 1.8s | **LCP**: < 2.5s | **FID**: < 100ms | **CLS**: < 0.1 | **TTI**: < 3.8s
- **Budget**: Total 1.5MB | JS 300KB | CSS 100KB | Images 800KB | Fonts 100KB | Requests <50

## 🚀 Asset Optimization

### Conditional Loading
```php
// Load assets only when needed
function blazecommerce_child_conditional_assets() {
    if (blazecommerce_child_is_woocommerce_page()) {
        wp_enqueue_style('woocommerce-custom', get_stylesheet_directory_uri() . '/css/woocommerce.css');
    }
    if (is_page('contact')) {
        wp_enqueue_script('contact-form', get_stylesheet_directory_uri() . '/js/contact-form.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_conditional_assets');
```

### Script Optimization
```php
// Defer/async non-critical scripts
function blazecommerce_child_optimize_scripts($tag, $handle, $src) {
    $defer_scripts = array('analytics', 'social-widgets', 'comments');
    $async_scripts = array('google-analytics', 'facebook-pixel');

    if (in_array($handle, $defer_scripts)) return str_replace(' src', ' defer src', $tag);
    if (in_array($handle, $async_scripts)) return str_replace(' src', ' async src', $tag);
    return $tag;
}
add_filter('script_loader_tag', 'blazecommerce_child_optimize_scripts', 10, 3);
```

### Resource Hints
```php
// DNS prefetch, preconnect for external resources
function blazecommerce_child_resource_hints($urls, $relation_type) {
    if ($relation_type === 'dns-prefetch') {
        $urls[] = '//fonts.googleapis.com';
        $urls[] = '//www.google-analytics.com';
    }
    return $urls;
}
add_filter('wp_resource_hints', 'blazecommerce_child_resource_hints', 10, 2);
```

## 💾 Database & Caching

### Optimized Queries
```php
// Use get_posts for simple queries, direct SQL for complex ones
function blazecommerce_child_optimized_recent_posts($limit = 5) {
    return get_posts(array(
        'numberposts' => $limit,
        'fields' => 'ids',
        'no_found_rows' => true,
        'update_post_meta_cache' => false
    ));
}

// Cache expensive queries
function blazecommerce_child_get_featured_products() {
    $product_ids = wp_cache_get('featured_products', 'blazecommerce_child');
    if (false === $product_ids) {
        global $wpdb;
        $product_ids = $wpdb->get_col($wpdb->prepare("
            SELECT p.ID FROM {$wpdb->posts} p
            INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
            WHERE p.post_type = 'product' AND p.post_status = 'publish'
            AND pm.meta_key = '_featured' AND pm.meta_value = 'yes' LIMIT %d
        ", 10));
        wp_cache_set('featured_products', $product_ids, 'blazecommerce_child', 3600);
    }
    return $product_ids;
}
```

### Transient & Object Caching
```php
// Cache expensive operations
function blazecommerce_child_get_popular_posts() {
    $cache_key = 'popular_posts_' . get_current_blog_id();
    $popular_posts = get_transient($cache_key);
    if (false === $popular_posts) {
        $popular_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'meta_key' => 'post_views',
            'orderby' => 'meta_value_num'
        ));
        set_transient($cache_key, $popular_posts, HOUR_IN_SECONDS);
    }
    return $popular_posts;
}

// Fragment caching for templates
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
```

## 🖼️ Image & JS Optimization

### Images: Responsive, WebP, Lazy Loading
```php
// Custom image sizes
function blazecommerce_child_image_sizes() {
    add_image_size('hero-banner', 1920, 800, true);
    add_image_size('product-thumbnail', 300, 300, true);
}
add_action('after_setup_theme', 'blazecommerce_child_image_sizes');

// WebP support
function blazecommerce_child_webp_support($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'blazecommerce_child_webp_support');

// Lazy loading
function blazecommerce_child_lazy_load_images($content) {
    if (!is_admin() && !is_feed()) {
        $content = preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
    }
    return $content;
}
add_filter('the_content', 'blazecommerce_child_lazy_load_images');
```

### JavaScript: Code Splitting & Performance
```javascript
// Dynamic imports for code splitting
async function loadCarousel() {
    if (document.querySelector('.carousel')) {
        const { Carousel } = await import('./modules/carousel.js');
        new Carousel('.carousel');
    }
}

// Debounce for search/scroll events
function debounce(func, wait) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func(...args), wait);
    };
}

// Throttle for scroll events
const throttle = (func, limit) => {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Intersection Observer for animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
```

## 🎨 CSS Optimization

### Critical CSS & Async Loading
```php
// Inline critical CSS for above-the-fold content
function blazecommerce_child_critical_css() {
    if (is_front_page()) {
        $critical_css = file_get_contents(get_stylesheet_directory() . '/css/critical-home.css');
        echo '<style id="critical-css">' . $critical_css . '</style>';
    }
}
add_action('wp_head', 'blazecommerce_child_critical_css', 1);

// Load non-critical CSS asynchronously
function blazecommerce_child_async_css($html, $handle, $href, $media) {
    if ($handle === 'main-styles') {
        return '<link rel="preload" href="' . $href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    }
    return $html;
}
add_filter('style_loader_tag', 'blazecommerce_child_async_css', 10, 4);
```

## ⚡ Core Web Vitals & WooCommerce

### LCP, CLS, FID Optimization
```php
// Preload critical resources
function blazecommerce_child_optimize_lcp() {
    if (is_front_page()) {
        $hero_image = get_theme_mod('hero_image');
        if ($hero_image) echo '<link rel="preload" as="image" href="' . esc_url($hero_image) . '">';
    }
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/fonts/inter-var.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'blazecommerce_child_optimize_lcp', 1);
```

```css
/* Prevent layout shifts with aspect ratios */
.hero-image { aspect-ratio: 16/9; object-fit: cover; }
.product-image { aspect-ratio: 1/1; object-fit: cover; }
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    animation: loading 1.5s infinite;
}
```

```javascript
// Event delegation & task chunking for FID
document.addEventListener('click', (e) => {
    if (e.target.matches('.button')) handleButtonClick(e);
});
```

### WooCommerce Performance
```php
// Disable cart fragments on non-shop pages
function blazecommerce_child_optimize_woo_queries() {
    if (!blazecommerce_child_is_woocommerce_page()) {
        wp_dequeue_script('wc-cart-fragments');
    }
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_optimize_woo_queries');
```

## 📊 Monitoring & Testing
- **Tools**: PageSpeed Insights, GTmetrix, Lighthouse, Query Monitor
- **Debug**: `WP_DEBUG` performance monitoring in footer

---
**Optimized**: July 2025 | **Target**: <2.5s LCP, <0.1 CLS, <100ms FID
