# Setup Guide

This guide will walk you through the installation and initial setup of the BlazeCommerce Child Theme.

## Prerequisites

Before installing the BlazeCommerce Child Theme, ensure you have:

- WordPress 6.0 or higher
- PHP 8.0 or higher
- Twenty Twenty-Five parent theme installed and activated
- WooCommerce plugin (if using e-commerce features)
- FTP/SFTP access or WordPress admin access

## Installation Methods

### Method 1: WordPress Admin Dashboard

1. **Download** the theme ZIP file
2. **Navigate** to WordPress Admin → Appearance → Themes
3. **Click** "Add New" → "Upload Theme"
4. **Select** the theme ZIP file and click "Install Now"
5. **Activate** the BlazeCommerce Child Theme

### Method 2: FTP Upload

1. **Extract** the theme ZIP file
2. **Upload** the `blazecommerce-child` folder to `/wp-content/themes/`
3. **Navigate** to WordPress Admin → Appearance → Themes
4. **Activate** the BlazeCommerce Child Theme

### Method 3: Git Clone (Development)

```bash
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/blaze-commerce/blazecommerce-child.git
```

## Initial Configuration

### 1. Verify Parent Theme

Ensure the Twenty Twenty-Five parent theme is installed:

```php
// This should be in your WordPress themes directory
/wp-content/themes/twentytwentyfive/
```

### 2. Check Theme Activation

After activation, verify the theme is working:

1. Visit your website frontend
2. Check that styles are loading correctly
3. Verify the parent theme styles are inherited

### 3. Configure Child Theme Functions

The child theme automatically enqueues parent theme styles. Verify in `functions.php`:

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

## WooCommerce Setup (Optional)

If using WooCommerce features:

### 1. Install WooCommerce

1. **Navigate** to Plugins → Add New
2. **Search** for "WooCommerce"
3. **Install** and **Activate** WooCommerce
4. **Complete** the WooCommerce setup wizard

### 2. Configure WooCommerce Templates

The theme includes custom WooCommerce templates in `/woocommerce/` directory:

- Product pages
- Cart and checkout
- My Account pages
- Shop and category pages

### 3. Test WooCommerce Integration

1. Create a test product
2. Visit the shop page
3. Test the cart and checkout process
4. Verify custom templates are loading

## Theme Customization

### 1. WordPress Customizer

Access theme options via:
**Appearance → Customize**

Available options:
- Site identity
- Colors and typography
- Header and footer settings
- WooCommerce settings

### 2. Full Site Editing

Use the Site Editor for advanced customization:
**Appearance → Theme Editor**

Edit:
- Templates
- Template parts
- Block patterns
- Global styles

## Troubleshooting

### Common Issues

**Parent theme styles not loading:**
- Verify Twenty Twenty-Five is installed
- Check `functions.php` enqueue function
- Clear any caching plugins

**WooCommerce templates not working:**
- Ensure WooCommerce is activated
- Check template hierarchy
- Verify template files exist in `/woocommerce/`

**Block patterns not appearing:**
- Check pattern registration in `functions.php`
- Verify pattern files exist in `/patterns/`
- Clear block editor cache

### Debug Mode

Enable WordPress debug mode for troubleshooting:

```php
// Add to wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

## Performance Optimization

### 1. Caching

Install a caching plugin:
- WP Rocket (Premium)
- W3 Total Cache (Free)
- WP Super Cache (Free)

### 2. Image Optimization

- Enable WebP support
- Use lazy loading (built-in)
- Optimize images before upload

### 3. Asset Optimization

The theme includes:
- Minified CSS and JavaScript
- Conditional loading
- Optimized font loading

## Security Considerations

### 1. Keep Updated

- Update WordPress core regularly
- Update the parent theme
- Update plugins and child theme

### 2. Security Plugins

Consider installing:
- Wordfence Security
- Sucuri Security
- iThemes Security

### 3. File Permissions

Set proper file permissions:
- Folders: 755
- Files: 644
- wp-config.php: 600

## Next Steps

After successful installation:

1. **Read** the [Customization Guide](../guide/CUSTOMIZATION.md)
2. **Explore** available [Block Patterns](../guide/BLOCK-PATTERNS.md)
3. **Review** [Performance Guidelines](../development/PERFORMANCE.md)
4. **Check** [Security Best Practices](../development/SECURITY.md)

## Support

For installation issues:
- Check [Troubleshooting Guide](TROUBLESHOOTING.md)
- Contact BlazeCommerce support
- Review WordPress.org support forums

---

**Last Updated**: December 2024  
**Version**: 1.0.1
