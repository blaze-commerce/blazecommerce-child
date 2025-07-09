# Block Patterns Guide

This guide covers all available block patterns in the BlazeCommerce Child Theme and how to use them effectively.

## Table of Contents

1. [What are Block Patterns](#what-are-block-patterns)
2. [Available Pattern Categories](#available-pattern-categories)
3. [Header Patterns](#header-patterns)
4. [Hero Banner Patterns](#hero-banner-patterns)
5. [Content Patterns](#content-patterns)
6. [Product Patterns](#product-patterns)
7. [Footer Patterns](#footer-patterns)
8. [Page Template Patterns](#page-template-patterns)
9. [Creating Custom Patterns](#creating-custom-patterns)
10. [Pattern Best Practices](#pattern-best-practices)

## What are Block Patterns

Block patterns are predefined block layouts that you can insert into your posts and pages. They provide:

- **Quick Setup**: Pre-designed layouts ready to use
- **Consistency**: Maintain design consistency across your site
- **Customization**: Easily modify content while keeping the design
- **Responsive**: All patterns are mobile-friendly

### How to Use Patterns

1. **Open** the block editor (Gutenberg)
2. **Click** the "+" button to add a new block
3. **Select** "Patterns" tab
4. **Choose** a pattern from the available categories
5. **Customize** the content to match your needs

## Available Pattern Categories

The theme includes patterns organized in these categories:

- **Banner**: Hero sections and promotional banners
- **Call to Action**: CTA sections and buttons
- **Content**: Text layouts and content sections
- **Footer**: Footer layouts and designs
- **Gallery**: Image galleries and portfolios
- **Header**: Header layouts and navigation
- **Page**: Full page layouts
- **Posts**: Blog post layouts
- **Team**: Team member showcases
- **Testimonial**: Customer testimonials

## Header Patterns

### Standard Header
**File**: `patterns/header.php`
**Usage**: Main site header with logo and navigation

```php
<!-- wp:group {"className":"site-header bg-white shadow-md"} -->
<div class="wp-block-group site-header bg-white shadow-md">
    <!-- wp:group {"className":"container mx-auto px-4 py-4"} -->
    <div class="wp-block-group container mx-auto px-4 py-4">
        <!-- wp:site-logo /-->
        <!-- wp:navigation {"className":"main-nav"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

**Customization Options**:
- Change background color classes
- Modify container padding
- Add additional navigation elements

### Vertical Header
**File**: `parts/vertical-header.html`
**Usage**: Sidebar-style header for unique layouts

**Features**:
- Vertical navigation layout
- Compact design for narrow spaces
- Mobile-responsive behavior

## Hero Banner Patterns

### Banner Hero
**File**: `patterns/banner-hero.php`
**Usage**: Main hero section for homepage

```php
<!-- wp:cover {"className":"hero-banner min-h-screen"} -->
<div class="wp-block-cover hero-banner min-h-screen">
    <!-- wp:group {"className":"text-center text-white"} -->
    <div class="wp-block-group text-center text-white">
        <!-- wp:heading {"level":1,"className":"text-5xl font-bold mb-4"} -->
        <h1 class="text-5xl font-bold mb-4">Welcome to Our Store</h1>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"className":"text-xl mb-8"} -->
        <p class="text-xl mb-8">Discover amazing products at unbeatable prices</p>
        <!-- /wp:paragraph -->
        
        <!-- wp:buttons {"className":"justify-center"} -->
        <div class="wp-block-buttons justify-center">
            <!-- wp:button {"className":"bg-blue-500 hover:bg-blue-600"} -->
            <div class="wp-block-button">
                <a class="wp-block-button__link bg-blue-500 hover:bg-blue-600">Shop Now</a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:cover -->
```

**Customization Tips**:
- Replace background image via block settings
- Modify text content and colors
- Adjust button styles and links
- Change layout alignment

### Banner Project Description
**File**: `patterns/banner-project-description.php`
**Usage**: Project or service description banners

**Features**:
- Image and text combination
- Flexible layout options
- Call-to-action integration

## Content Patterns

### Text Centered Statement
**File**: `patterns/text-centered-statement.php`
**Usage**: Highlighted text sections and quotes

```php
<!-- wp:group {"className":"py-16 bg-gray-50"} -->
<div class="wp-block-group py-16 bg-gray-50">
    <!-- wp:group {"className":"container mx-auto text-center"} -->
    <div class="wp-block-group container mx-auto text-center">
        <!-- wp:heading {"level":2,"className":"text-3xl font-bold mb-6"} -->
        <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
        <!-- /wp:heading -->
        
        <!-- wp:paragraph {"className":"text-lg text-gray-600 max-w-3xl mx-auto"} -->
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">We are committed to providing exceptional products and services that exceed our customers' expectations.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

### Text Feature Grid 3-Col
**File**: `patterns/text-feature-grid-3-col.php`
**Usage**: Feature highlights in three-column layout

**Structure**:
- Three equal columns
- Icon/image + title + description
- Responsive stacking on mobile

### Text Alternating Images
**File**: `patterns/text-alternating-images.php`
**Usage**: Content sections with alternating image placement

**Features**:
- Left/right image alternation
- Responsive layout
- Flexible content areas

## Product Patterns

### Product Cards
**File**: `patterns/productcards.php`
**Usage**: WooCommerce product grid display

```php
<!-- wp:group {"className":"product-grid grid grid-cols-1 md:grid-cols-3 gap-6"} -->
<div class="wp-block-group product-grid grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- wp:woocommerce/product-template -->
    <!-- wp:woocommerce/product-image /-->
    <!-- wp:woocommerce/product-title /-->
    <!-- wp:woocommerce/product-price /-->
    <!-- wp:woocommerce/product-button /-->
    <!-- /wp:woocommerce/product-template -->
</div>
<!-- /wp:group -->
```

### Single Product
**File**: `patterns/single-product.php`
**Usage**: Individual product page layout

**Components**:
- Product image gallery
- Product information
- Add to cart functionality
- Related products section

## Footer Patterns

### Footer Centered Logo Nav
**File**: `patterns/footer-centered-logo-nav.php`
**Usage**: Clean footer with centered logo and navigation

```php
<!-- wp:group {"className":"site-footer bg-gray-900 text-white py-12"} -->
<div class="wp-block-group site-footer bg-gray-900 text-white py-12">
    <!-- wp:group {"className":"container mx-auto text-center"} -->
    <div class="wp-block-group container mx-auto text-center">
        <!-- wp:site-logo {"className":"mb-6"} /-->
        
        <!-- wp:navigation {"className":"footer-nav mb-6"} /-->
        
        <!-- wp:paragraph {"className":"text-gray-400"} -->
        <p class="text-gray-400">© 2024 Your Company Name. All rights reserved.</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

### Footer Colophon 3-Col
**File**: `patterns/footer-colophon-3-col.php`
**Usage**: Three-column footer with detailed information

**Sections**:
- Company information
- Quick links
- Contact details
- Social media links

## Page Template Patterns

### Page Home Business
**File**: `patterns/page-home-business.php`
**Usage**: Complete business homepage layout

**Sections**:
- Hero banner
- Services overview
- About section
- Testimonials
- Contact CTA

### Page About Business
**File**: `patterns/page-about-business.php`
**Usage**: Professional about page layout

**Components**:
- Company story
- Team section
- Values and mission
- Company statistics

### Page Cart
**File**: `patterns/page-cart.php`
**Usage**: WooCommerce cart page layout

### Page Checkout
**File**: `patterns/page-checkout.php`
**Usage**: WooCommerce checkout page layout

## Creating Custom Patterns

### Pattern File Structure

Create a new PHP file in the `/patterns/` directory:

```php
<?php
/**
 * Title: Custom Pattern Name
 * Slug: blazecommerce-child/custom-pattern
 * Categories: banner, content
 * Keywords: custom, feature, highlight
 * Description: Brief description of the pattern
 */
?>

<!-- Your block markup here -->
```

### Pattern Registration

Patterns are automatically registered if placed in `/patterns/` directory. For manual registration:

```php
// Add to functions.php
function blazecommerce_child_register_custom_patterns() {
    register_block_pattern(
        'blazecommerce-child/custom-pattern',
        array(
            'title'       => __('Custom Pattern', 'blazecommerce-child'),
            'description' => __('A custom pattern for specific use case', 'blazecommerce-child'),
            'content'     => '<!-- wp:group --><!-- /wp:group -->',
            'categories'  => array('banner'),
            'keywords'    => array('custom', 'banner'),
        )
    );
}
add_action('init', 'blazecommerce_child_register_custom_patterns');
```

### Pattern Categories

Register custom pattern categories:

```php
function blazecommerce_child_register_pattern_categories() {
    register_block_pattern_category(
        'blazecommerce-ecommerce',
        array(
            'label' => __('E-commerce', 'blazecommerce-child'),
        )
    );
}
add_action('init', 'blazecommerce_child_register_pattern_categories');
```

## Pattern Best Practices

### Design Guidelines

1. **Responsive Design**: Always include mobile-responsive classes
2. **Accessibility**: Use proper heading hierarchy and alt text
3. **Performance**: Optimize images and minimize inline styles
4. **Consistency**: Follow theme design system and color palette

### Code Standards

```php
// Good pattern structure
<!-- wp:group {"className":"section-wrapper py-16"} -->
<div class="wp-block-group section-wrapper py-16">
    <!-- wp:group {"className":"container mx-auto px-4"} -->
    <div class="wp-block-group container mx-auto px-4">
        <!-- Content blocks here -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

### Tailwind CSS Classes

Use consistent Tailwind classes:

```css
/* Spacing */
p-4, py-8, px-6, m-4, mb-6

/* Colors */
bg-blue-500, text-white, text-gray-600

/* Layout */
grid, grid-cols-3, flex, justify-center

/* Typography */
text-lg, font-bold, leading-relaxed

/* Responsive */
md:grid-cols-2, lg:text-xl, sm:px-4
```

### Testing Patterns

1. **Test** in block editor
2. **Verify** responsive behavior
3. **Check** accessibility with screen readers
4. **Validate** HTML output
5. **Test** with different content lengths

### Pattern Documentation

Document each pattern with:

```php
/**
 * Title: Descriptive Pattern Name
 * Slug: blazecommerce-child/pattern-slug
 * Categories: appropriate, categories
 * Keywords: relevant, search, terms
 * Description: Clear description of pattern purpose and usage
 * Viewport Width: 1200 (optional, for pattern preview)
 */
```

### Version Control

- Keep patterns in version control
- Document changes in CHANGELOG.md
- Test patterns after WordPress updates
- Maintain backward compatibility

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
