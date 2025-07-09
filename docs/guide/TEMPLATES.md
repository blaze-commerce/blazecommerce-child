# Templates Guide

This guide covers the template system in the BlazeCommerce Child Theme, including Full Site Editing (FSE) templates and PHP template parts.

## Table of Contents

1. [Template Hierarchy](#template-hierarchy)
2. [FSE Templates](#fse-templates)
3. [PHP Template Parts](#php-template-parts)
4. [WooCommerce Templates](#woocommerce-templates)
5. [Custom Templates](#custom-templates)
6. [Template Customization](#template-customization)
7. [Template Parts](#template-parts)
8. [Best Practices](#best-practices)

## Template Hierarchy

### WordPress Template Hierarchy

The theme follows WordPress template hierarchy:

```
1. Custom Page Template (if assigned)
2. page-{slug}.php
3. page-{id}.php
4. page.php
5. singular.php
6. index.php
```

### FSE Template Hierarchy

For Full Site Editing:

```
1. Custom Template (if assigned)
2. page-{slug}.html
3. page-{id}.html
4. page.html
5. singular.html
6. index.html
```

## FSE Templates

### Available FSE Templates

Located in `/templates/` directory:

#### Core Templates
- `index.html` - Default template for all content
- `home.html` - Blog homepage template
- `page.html` - Default page template
- `single.html` - Single post template
- `archive.html` - Archive pages template
- `search.html` - Search results template
- `404.html` - Error page template

#### Specialized Templates
- `page-wide.html` - Full-width page template
- `page-no-title.html` - Page without title display
- `page-with-sidebar.html` - Page with sidebar layout
- `coming-soon.html` - Coming soon page template

#### WooCommerce Templates
- `archive-product.html` - Shop page template
- `single-product.html` - Product page template
- `page-cart.html` - Cart page template
- `page-checkout.html` - Checkout page template
- `order-confirmation.html` - Order confirmation template

### Template Structure

Basic FSE template structure:

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","className":"site-main"} -->
<main class="wp-block-group site-main">
    <!-- wp:group {"className":"container mx-auto px-4 py-8"} -->
    <div class="wp-block-group container mx-auto px-4 py-8">
        
        <!-- wp:post-title {"level":1} /-->
        <!-- wp:post-content /-->
        
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

### Customizing FSE Templates

#### Method 1: Site Editor
1. Go to **Appearance → Theme Editor**
2. Select template to edit
3. Modify using block editor
4. Save changes

#### Method 2: File Editing
1. Copy template from parent theme (if exists)
2. Modify HTML structure
3. Add custom classes and blocks
4. Test responsive behavior

### Template Examples

#### Custom Page Template
```html
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:cover {"className":"hero-section min-h-screen"} -->
<div class="wp-block-cover hero-section min-h-screen">
    <!-- wp:post-title {"level":1,"className":"text-white text-5xl"} /-->
    <!-- wp:post-excerpt {"className":"text-white text-xl"} /-->
</div>
<!-- /wp:cover -->

<!-- wp:group {"className":"content-section py-16"} -->
<div class="wp-block-group content-section py-16">
    <!-- wp:post-content /-->
</div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
```

## PHP Template Parts

### Available Template Parts

Located in `/template-parts/` directory:

- `content.php` - Default post content
- `content-page.php` - Page content
- `content-search.php` - Search result content
- `content-none.php` - No content found
- `content-preview.php` - Post preview

### Template Part Structure

```php
<?php
/**
 * Template part for displaying posts
 *
 * @package BlazeCommerce_Child
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-post'); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        endif;
        ?>
    </header>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
        endif;
        ?>
    </div>

    <footer class="entry-footer">
        <?php blazecommerce_child_entry_footer(); ?>
    </footer>
</article>
```

### Using Template Parts

```php
// In main template files
get_template_part('template-parts/content', get_post_type());

// With variables
get_template_part('template-parts/content', 'page', array(
    'show_title' => false,
    'custom_class' => 'featured-content'
));
```

## WooCommerce Templates

### WooCommerce Template Override

Templates in `/woocommerce/` directory override WooCommerce defaults:

```
woocommerce/
├── single-product/
│   ├── product-image.php
│   ├── product-thumbnails.php
│   └── tabs/
├── cart/
│   └── cart.php
├── checkout/
│   └── form-checkout.php
└── myaccount/
    └── dashboard.php
```

### Product Page Template

```php
<?php
/**
 * Single Product Template
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Product Images -->
        <div class="product-images">
            <?php woocommerce_show_product_images(); ?>
        </div>
        
        <!-- Product Summary -->
        <div class="product-summary">
            <?php woocommerce_template_single_title(); ?>
            <?php woocommerce_template_single_rating(); ?>
            <?php woocommerce_template_single_price(); ?>
            <?php woocommerce_template_single_excerpt(); ?>
            <?php woocommerce_template_single_add_to_cart(); ?>
        </div>
        
    </div>
    
    <!-- Product Tabs -->
    <div class="product-tabs mt-12">
        <?php woocommerce_output_product_data_tabs(); ?>
    </div>
    
    <!-- Related Products -->
    <div class="related-products mt-12">
        <?php woocommerce_output_related_products(); ?>
    </div>
</div>

<?php get_footer('shop'); ?>
```

### Cart Template Customization

```php
<?php
/**
 * Cart Page Template
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-cart-form">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8"><?php esc_html_e('Shopping Cart', 'blazecommerce-child'); ?></h1>
        
        <?php do_action('woocommerce_before_cart_table'); ?>
        
        <div class="cart-table-wrapper">
            <table class="shop_table cart woocommerce-cart-form__contents">
                <!-- Cart table content -->
            </table>
        </div>
        
        <div class="cart-actions mt-8">
            <?php woocommerce_cart_totals(); ?>
        </div>
    </div>
</div>
```

## Custom Templates

### Creating Custom Page Templates

#### Method 1: FSE Template
1. Create new HTML file in `/templates/`
2. Add template header:
```html
<!-- wp:template-part {"slug":"header"} /-->
<!-- Custom content blocks -->
<!-- wp:template-part {"slug":"footer"} /-->
```

#### Method 2: PHP Template
1. Create PHP file with template header:
```php
<?php
/*
Template Name: Custom Landing Page
*/

get_header(); ?>

<div class="custom-template">
    <!-- Custom content -->
</div>

<?php get_footer(); ?>
```

### Template Assignment

#### Assign to Pages
1. Edit page in WordPress admin
2. Select template from "Page Attributes" meta box
3. Save page

#### Conditional Templates
```php
// In functions.php
function blazecommerce_child_custom_template($template) {
    if (is_page('special-page')) {
        $custom_template = locate_template('page-special.php');
        if ($custom_template) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('template_include', 'blazecommerce_child_custom_template');
```

## Template Customization

### Adding Custom Fields

```php
// Display custom fields in templates
$custom_value = get_post_meta(get_the_ID(), 'custom_field_key', true);
if ($custom_value) {
    echo '<div class="custom-field">' . esc_html($custom_value) . '</div>';
}
```

### Conditional Content

```php
// Show content based on conditions
if (is_front_page()) {
    get_template_part('template-parts/hero-banner');
}

if (has_post_thumbnail()) {
    the_post_thumbnail('large', array('class' => 'featured-image'));
}

if (is_user_logged_in()) {
    echo '<div class="member-content">Welcome back!</div>';
}
```

### Custom Loops

```php
// Custom query in templates
$featured_posts = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'meta_key' => 'featured',
    'meta_value' => 'yes'
));

if ($featured_posts->have_posts()) :
    while ($featured_posts->have_posts()) : $featured_posts->the_post();
        get_template_part('template-parts/content', 'featured');
    endwhile;
    wp_reset_postdata();
endif;
```

## Template Parts

### Creating Reusable Parts

Located in `/parts/` directory for FSE:

```html
<!-- parts/custom-cta.html -->
<!-- wp:group {"className":"cta-section bg-blue-500 text-white py-16"} -->
<div class="wp-block-group cta-section bg-blue-500 text-white py-16">
    <!-- wp:heading {"className":"text-center text-3xl font-bold"} -->
    <h2 class="text-center text-3xl font-bold">Ready to Get Started?</h2>
    <!-- /wp:heading -->
    
    <!-- wp:buttons {"className":"justify-center mt-8"} -->
    <div class="wp-block-buttons justify-center mt-8">
        <!-- wp:button {"className":"bg-white text-blue-500"} -->
        <div class="wp-block-button">
            <a class="wp-block-button__link bg-white text-blue-500">Contact Us</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
```

### Using Template Parts

```html
<!-- In FSE templates -->
<!-- wp:template-part {"slug":"custom-cta"} /-->

<!-- In PHP templates -->
<?php get_template_part('parts/custom-cta'); ?>
```

## Best Practices

### Performance Optimization

1. **Minimize Database Queries**
```php
// Use get_posts() for simple queries
$posts = get_posts(array(
    'numberposts' => 5,
    'post_type' => 'product'
));
```

2. **Cache Complex Queries**
```php
$cache_key = 'featured_products_' . get_current_blog_id();
$featured_products = wp_cache_get($cache_key);

if (false === $featured_products) {
    // Complex query here
    wp_cache_set($cache_key, $featured_products, '', 3600);
}
```

### Accessibility

1. **Proper Heading Hierarchy**
```html
<!-- wp:heading {"level":1} -->
<h1>Page Title</h1>
<!-- /wp:heading -->

<!-- wp:heading {"level":2} -->
<h2>Section Title</h2>
<!-- /wp:heading -->
```

2. **Alt Text for Images**
```php
the_post_thumbnail('large', array(
    'alt' => get_the_title(),
    'class' => 'featured-image'
));
```

### Security

1. **Escape Output**
```php
echo esc_html(get_the_title());
echo esc_url(get_permalink());
echo wp_kses_post(get_the_content());
```

2. **Sanitize Input**
```php
$custom_value = sanitize_text_field($_POST['custom_field']);
```

### Responsive Design

```html
<!-- Use responsive classes -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Content -->
</div>
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
