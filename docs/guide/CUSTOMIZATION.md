# Theme Customization Guide

This guide covers all aspects of customizing the BlazeCommerce Child Theme to match your brand and requirements.

## Table of Contents

1. [WordPress Customizer](#wordpress-customizer)
2. [Theme.json Configuration](#themejson-configuration)
3. [CSS Customization](#css-customization)
4. [Block Pattern Customization](#block-pattern-customization)
5. [Template Customization](#template-customization)
6. [Color Schemes](#color-schemes)
7. [Typography](#typography)
8. [Logo and Branding](#logo-and-branding)
9. [Layout Options](#layout-options)
10. [Advanced Customizations](#advanced-customizations)

## WordPress Customizer

### Accessing the Customizer

Navigate to **Appearance → Customize** to access theme options.

### Available Sections

#### Site Identity
- **Site Title**: Your website name
- **Tagline**: Brief description of your site
- **Site Icon**: Favicon for browser tabs
- **Logo**: Upload your brand logo

```php
// Get customizer values in templates
$site_title = get_bloginfo('name');
$tagline = get_bloginfo('description');
$logo_id = get_theme_mod('custom_logo');
```

#### Colors
- **Accent Color**: Primary brand color
- **Background Color**: Site background
- **Text Color**: Default text color
- **Link Color**: Hyperlink color

```php
// Access color options
$accent_color = blazecommerce_child_get_theme_option('blazecommerce_child_accent_color', '#007cba');
```

#### Typography
- **Heading Font**: Font family for headings
- **Body Font**: Font family for body text
- **Font Sizes**: Predefined size scale

#### Header Options
- **Header Layout**: Choose header style
- **Navigation Position**: Menu placement
- **Header Background**: Background color/image

#### Footer Options
- **Footer Layout**: Column configuration
- **Footer Text**: Copyright and additional text
- **Social Links**: Social media icons

### Custom Theme Options

The theme adds custom sections:

```php
// Register custom customizer options
function blazecommerce_child_customize_register($wp_customize) {
    // Add BlazeCommerce section
    $wp_customize->add_section('blazecommerce_child_options', array(
        'title' => __('BlazeCommerce Options', 'blazecommerce-child'),
        'priority' => 30,
    ));
    
    // Add accent color setting
    $wp_customize->add_setting('blazecommerce_child_accent_color', array(
        'default' => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    // Add color control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blazecommerce_child_accent_color', array(
        'label' => __('Accent Color', 'blazecommerce-child'),
        'section' => 'blazecommerce_child_options',
    )));
}
add_action('customize_register', 'blazecommerce_child_customize_register');
```

## Theme.json Configuration

### Understanding theme.json

The `theme.json` file controls global styles and settings for the block editor.

### Key Configuration Areas

#### Color Palette
```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "name": "Primary",
          "slug": "primary",
          "color": "#007cba"
        },
        {
          "name": "Secondary",
          "slug": "secondary",
          "color": "#005a87"
        }
      ]
    }
  }
}
```

#### Typography Scale
```json
{
  "settings": {
    "typography": {
      "fontSizes": [
        {
          "name": "Small",
          "slug": "small",
          "size": "14px"
        },
        {
          "name": "Medium",
          "slug": "medium",
          "size": "18px"
        }
      ]
    }
  }
}
```

#### Layout Settings
```json
{
  "settings": {
    "layout": {
      "contentSize": "800px",
      "wideSize": "1200px"
    }
  }
}
```

### Customizing theme.json

1. **Edit** the `theme.json` file in your child theme
2. **Override** parent theme settings
3. **Add** new color palettes or font sizes
4. **Test** changes in the block editor

## CSS Customization

### Child Theme CSS Structure

```css
/* style.css structure */

/* 1. Theme Header (required) */
/*
Theme Name: BlazeCommerce Child
Template: twentytwentyfive
*/

/* 2. CSS Reset/Normalize */
/* 3. Base Styles */
/* 4. Layout Components */
/* 5. Block Styles */
/* 6. WooCommerce Styles */
/* 7. Responsive Styles */
/* 8. Custom Utilities */
```

### Adding Custom Styles

#### Method 1: Direct CSS
```css
/* Add to style.css */
.custom-button {
    background-color: var(--wp--preset--color--primary);
    color: white;
    padding: 12px 24px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

.custom-button:hover {
    background-color: var(--wp--preset--color--secondary);
}
```

#### Method 2: CSS Custom Properties
```css
:root {
    --custom-spacing: 2rem;
    --custom-border-radius: 8px;
    --custom-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.card {
    padding: var(--custom-spacing);
    border-radius: var(--custom-border-radius);
    box-shadow: var(--custom-shadow);
}
```

#### Method 3: Tailwind CSS Classes
```html
<!-- Use Tailwind classes in templates -->
<div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
    Custom styled content
</div>
```

### Responsive Design

```css
/* Mobile First Approach */
.hero-section {
    padding: 1rem;
    text-align: center;
}

/* Tablet */
@media (min-width: 768px) {
    .hero-section {
        padding: 2rem;
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .hero-section {
        padding: 4rem;
        text-align: left;
    }
}
```

## Block Pattern Customization

### Modifying Existing Patterns

1. **Copy** pattern file from `/patterns/` directory
2. **Edit** the pattern content and styles
3. **Update** pattern registration if needed

Example pattern customization:
```php
<?php
/**
 * Title: Custom Hero Banner
 * Slug: blazecommerce-child/custom-hero
 * Categories: banner
 */
?>

<!-- wp:group {"className":"hero-banner bg-gradient-to-r from-blue-500 to-purple-600"} -->
<div class="wp-block-group hero-banner bg-gradient-to-r from-blue-500 to-purple-600">
    <!-- wp:heading {"level":1,"className":"text-white text-4xl font-bold"} -->
    <h1 class="text-white text-4xl font-bold">Welcome to Our Store</h1>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"className":"text-white text-lg"} -->
    <p class="text-white text-lg">Discover amazing products at great prices</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons -->
    <div class="wp-block-buttons">
        <!-- wp:button {"className":"bg-white text-blue-500 hover:bg-gray-100"} -->
        <div class="wp-block-button">
            <a class="wp-block-button__link bg-white text-blue-500 hover:bg-gray-100">Shop Now</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
```

### Creating New Patterns

1. **Create** new PHP file in `/patterns/` directory
2. **Add** pattern header with title, slug, and categories
3. **Write** block markup using WordPress block syntax
4. **Register** pattern in `functions.php` if needed

## Template Customization

### Full Site Editing Templates

#### Customizing Templates
1. **Go to** Appearance → Theme Editor
2. **Select** template to edit
3. **Modify** using block editor
4. **Save** changes

#### Template Hierarchy
```
templates/
├── index.html          # Default template
├── home.html           # Homepage template
├── single.html         # Single post template
├── page.html           # Page template
├── archive.html        # Archive template
└── 404.html           # 404 error template
```

### PHP Template Parts

For advanced customizations, create PHP template parts:

```php
// template-parts/custom-header.php
<header class="site-header bg-white shadow-md">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'flex space-x-6',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>
```

## Color Schemes

### Predefined Color Schemes

The theme includes several color schemes:

#### Default Scheme
```css
:root {
    --primary-color: #007cba;
    --secondary-color: #005a87;
    --accent-color: #ff6b35;
    --text-color: #333333;
    --background-color: #ffffff;
}
```

#### Dark Scheme
```css
:root {
    --primary-color: #4a9eff;
    --secondary-color: #2563eb;
    --accent-color: #f59e0b;
    --text-color: #f3f4f6;
    --background-color: #1f2937;
}
```

### Creating Custom Color Schemes

1. **Define** CSS custom properties
2. **Update** theme.json color palette
3. **Test** across all components
4. **Ensure** accessibility compliance

```css
/* Custom brand colors */
:root {
    --brand-primary: #8b5cf6;
    --brand-secondary: #a78bfa;
    --brand-accent: #fbbf24;
    --brand-neutral: #6b7280;
}
```

## Typography

### Font Configuration

#### Google Fonts Integration
```php
// Add to functions.php
function blazecommerce_child_enqueue_fonts() {
    wp_enqueue_style('google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_enqueue_fonts');
```

#### CSS Font Stack
```css
:root {
    --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    --font-secondary: 'Georgia', 'Times New Roman', serif;
    --font-mono: 'Fira Code', 'Monaco', 'Consolas', monospace;
}

body {
    font-family: var(--font-primary);
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-primary);
    font-weight: 600;
}
```

### Typography Scale

```css
/* Responsive typography scale */
:root {
    --text-xs: 0.75rem;
    --text-sm: 0.875rem;
    --text-base: 1rem;
    --text-lg: 1.125rem;
    --text-xl: 1.25rem;
    --text-2xl: 1.5rem;
    --text-3xl: 1.875rem;
    --text-4xl: 2.25rem;
}

@media (min-width: 768px) {
    :root {
        --text-base: 1.125rem;
        --text-lg: 1.25rem;
        --text-xl: 1.5rem;
        --text-2xl: 1.875rem;
        --text-3xl: 2.25rem;
        --text-4xl: 3rem;
    }
}
```

## Logo and Branding

### Logo Setup

1. **Upload** logo via Customizer → Site Identity
2. **Set** appropriate dimensions
3. **Add** retina version for high-DPI displays

```php
// Custom logo support
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
));
```

### Brand Guidelines Implementation

```css
/* Brand consistency */
.brand-primary { color: var(--brand-primary); }
.brand-secondary { color: var(--brand-secondary); }
.brand-accent { color: var(--brand-accent); }

.btn-primary {
    background-color: var(--brand-primary);
    color: white;
}

.btn-secondary {
    background-color: var(--brand-secondary);
    color: white;
}
```

## Layout Options

### Container Widths

```css
/* Layout containers */
.container-sm { max-width: 640px; }
.container-md { max-width: 768px; }
.container-lg { max-width: 1024px; }
.container-xl { max-width: 1280px; }
.container-2xl { max-width: 1536px; }
```

### Grid Systems

```css
/* CSS Grid layouts */
.grid-2 { 
    display: grid; 
    grid-template-columns: repeat(2, 1fr); 
    gap: 2rem; 
}

.grid-3 { 
    display: grid; 
    grid-template-columns: repeat(3, 1fr); 
    gap: 2rem; 
}

@media (max-width: 768px) {
    .grid-2, .grid-3 {
        grid-template-columns: 1fr;
    }
}
```

## Advanced Customizations

### Custom Post Types Integration

```php
// Support for custom post types
function blazecommerce_child_custom_post_type_support() {
    add_post_type_support('product', 'custom-fields');
    add_post_type_support('portfolio', 'thumbnail');
}
add_action('init', 'blazecommerce_child_custom_post_type_support');
```

### Performance Optimizations

```php
// Optimize asset loading
function blazecommerce_child_optimize_assets() {
    // Remove unused CSS
    wp_dequeue_style('wp-block-library-theme');
    
    // Defer non-critical JavaScript
    add_filter('script_loader_tag', function($tag, $handle) {
        if ('non-critical-script' === $handle) {
            return str_replace(' src', ' defer src', $tag);
        }
        return $tag;
    }, 10, 2);
}
add_action('wp_enqueue_scripts', 'blazecommerce_child_optimize_assets', 100);
```

### Accessibility Enhancements

```css
/* Focus indicators */
a:focus, button:focus, input:focus, textarea:focus, select:focus {
    outline: 2px solid var(--brand-primary);
    outline-offset: 2px;
}

/* Skip links */
.skip-link {
    position: absolute;
    left: -9999px;
    z-index: 999999;
    padding: 8px 16px;
    background: var(--brand-primary);
    color: white;
    text-decoration: none;
}

.skip-link:focus {
    left: 6px;
    top: 7px;
}
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
