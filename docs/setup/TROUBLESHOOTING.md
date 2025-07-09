# Troubleshooting Guide

This guide helps you resolve common issues with the BlazeCommerce Child Theme installation and configuration.

## Table of Contents

1. [Installation Issues](#installation-issues)
2. [Theme Activation Problems](#theme-activation-problems)
3. [Style and Layout Issues](#style-and-layout-issues)
4. [WooCommerce Integration Issues](#woocommerce-integration-issues)
5. [Performance Issues](#performance-issues)
6. [Block Editor Issues](#block-editor-issues)
7. [Customizer Issues](#customizer-issues)
8. [Debug Mode](#debug-mode)
9. [FAQ](#faq)

## Installation Issues

### Parent Theme Not Found

**Problem**: Error message "The parent theme is missing" or styles not loading correctly.

**Solution**:
1. Ensure Twenty Twenty-Five parent theme is installed:
   ```bash
   # Check if parent theme exists
   ls /wp-content/themes/twentytwentyfive/
   ```
2. Install Twenty Twenty-Five if missing:
   - Go to **Appearance → Themes**
   - Click **Add New**
   - Search for "Twenty Twenty-Five"
   - Install and activate, then reactivate child theme

### File Permission Issues

**Problem**: Cannot upload theme or files are not accessible.

**Solution**:
```bash
# Set correct permissions
chmod 755 /wp-content/themes/blazecommerce-child/
chmod 644 /wp-content/themes/blazecommerce-child/*.php
chmod 644 /wp-content/themes/blazecommerce-child/*.css
```

### Upload Size Limit

**Problem**: Theme ZIP file too large to upload.

**Solutions**:
1. **Increase upload limit** in `php.ini`:
   ```ini
   upload_max_filesize = 64M
   post_max_size = 64M
   ```
2. **Use FTP upload** instead of WordPress admin
3. **Use Git clone** for development

## Theme Activation Problems

### White Screen of Death

**Problem**: Blank white page after theme activation.

**Solution**:
1. **Enable debug mode** in `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', false);
   ```
2. **Check error logs** in `/wp-content/debug.log`
3. **Deactivate plugins** one by one to identify conflicts
4. **Switch to default theme** temporarily

### Fatal PHP Errors

**Problem**: PHP fatal errors preventing theme activation.

**Common Causes & Solutions**:
- **PHP version incompatibility**: Upgrade to PHP 8.0+
- **Missing functions**: Ensure all required plugins are active
- **Memory limit**: Increase PHP memory limit to 256M+
- **Syntax errors**: Check recent code changes

## Style and Layout Issues

### Parent Theme Styles Not Loading

**Problem**: Child theme doesn't inherit parent theme styles.

**Solution**:
1. **Check enqueue function** in `functions.php`:
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
2. **Clear cache** if using caching plugins
3. **Check browser cache** and hard refresh (Ctrl+F5)

### CSS Not Loading

**Problem**: Custom styles not appearing on frontend.

**Solutions**:
1. **Check file paths** in browser developer tools
2. **Verify CSS syntax** for errors
3. **Clear all caches** (plugin, browser, CDN)
4. **Check file permissions** (644 for CSS files)

### Responsive Design Issues

**Problem**: Layout breaks on mobile devices.

**Solutions**:
1. **Check viewport meta tag** in header
2. **Test CSS media queries** in browser dev tools
3. **Validate HTML structure** for proper nesting
4. **Check for conflicting CSS** from plugins

## WooCommerce Integration Issues

### WooCommerce Templates Not Loading

**Problem**: Custom WooCommerce templates not being used.

**Solution**:
1. **Check template hierarchy**:
   ```
   /woocommerce/single-product.php
   /woocommerce/archive-product.php
   /woocommerce/cart/cart.php
   ```
2. **Clear WooCommerce template cache**:
   - Go to **WooCommerce → Status → Tools**
   - Click "Clear template cache"
3. **Verify WooCommerce support** in `functions.php`:
   ```php
   add_theme_support('woocommerce');
   ```

### Cart and Checkout Issues

**Problem**: Cart or checkout pages not working properly.

**Solutions**:
1. **Regenerate pages**: **WooCommerce → Status → Tools → Create default pages**
2. **Check page templates** are assigned correctly
3. **Test with default theme** to isolate issue
4. **Disable conflicting plugins**

## Performance Issues

### Slow Page Loading

**Problem**: Pages load slowly or timeout.

**Solutions**:
1. **Install caching plugin** (WP Rocket, W3 Total Cache)
2. **Optimize images** (WebP format, compression)
3. **Minimize plugins** and deactivate unused ones
4. **Use CDN** for static assets
5. **Optimize database** with cleanup plugins

### High Memory Usage

**Problem**: PHP memory limit exceeded errors.

**Solutions**:
1. **Increase memory limit** in `wp-config.php`:
   ```php
   ini_set('memory_limit', '512M');
   ```
2. **Optimize queries** and remove unnecessary database calls
3. **Use object caching** (Redis, Memcached)

## Block Editor Issues

### Block Patterns Not Appearing

**Problem**: Custom block patterns not showing in editor.

**Solutions**:
1. **Check pattern registration** in `functions.php`
2. **Verify pattern files** exist in `/patterns/` directory
3. **Clear block editor cache**:
   ```php
   // Add to functions.php temporarily
   add_action('init', function() {
       wp_cache_delete('block_patterns', 'core');
   });
   ```

### Block Editor Not Loading

**Problem**: Gutenberg editor shows blank screen or errors.

**Solutions**:
1. **Disable conflicting plugins**
2. **Check JavaScript console** for errors
3. **Update WordPress** to latest version
4. **Clear browser cache** and cookies

## Customizer Issues

### Customizer Options Not Saving

**Problem**: Theme customizer changes don't persist.

**Solutions**:
1. **Check user permissions** (must be administrator)
2. **Increase PHP max_input_vars**:
   ```ini
   max_input_vars = 3000
   ```
3. **Disable caching** during customization
4. **Check for JavaScript errors** in browser console

### Live Preview Not Working

**Problem**: Customizer preview doesn't update.

**Solutions**:
1. **Clear all caches**
2. **Check for JavaScript conflicts**
3. **Disable plugins** temporarily
4. **Use incognito/private browsing** mode

## Debug Mode

### Enabling WordPress Debug

Add to `wp-config.php`:
```php
// Enable debug mode
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', true);

// Log queries (use sparingly)
define('SAVEQUERIES', true);
```

### Checking Error Logs

1. **WordPress logs**: `/wp-content/debug.log`
2. **Server logs**: Check cPanel or hosting control panel
3. **Browser console**: F12 → Console tab

### Debug Plugins

Useful plugins for debugging:
- **Query Monitor** - Database and performance monitoring
- **Debug Bar** - Debug information in admin bar
- **Log Deprecated Notices** - Track deprecated function usage

## FAQ

### Q: Why is my child theme not working?

**A**: Most common causes:
1. Parent theme not installed
2. Incorrect function names or syntax errors
3. File permission issues
4. Plugin conflicts

### Q: How do I reset the theme to default settings?

**A**: 
1. **Customizer**: Use "Reset to defaults" option
2. **Database**: Delete theme_mods from wp_options table
3. **Files**: Remove custom CSS from style.css

### Q: Can I use this theme with other page builders?

**A**: The theme is designed for WordPress Block Editor (Gutenberg). Page builders like Elementor or Divi may conflict with theme styles.

### Q: How do I update the child theme safely?

**A**:
1. **Backup** your site first
2. **Test** on staging environment
3. **Update** via WordPress admin or FTP
4. **Clear** all caches after update

### Q: Why are my customizations disappearing?

**A**: 
- Never modify parent theme files directly
- Always use child theme for customizations
- Check if plugin updates are overriding changes

## Getting Additional Help

### Support Channels

1. **Documentation**: Check other guides in `/docs/`
2. **GitHub Issues**: Report bugs and feature requests
3. **BlazeCommerce Support**: Contact for urgent issues
4. **WordPress Forums**: Community support

### Before Contacting Support

Please provide:
1. **WordPress version**
2. **Theme version**
3. **PHP version**
4. **Active plugins list**
5. **Error messages** (exact text)
6. **Steps to reproduce** the issue

### Useful Information Commands

```bash
# Check WordPress version
wp core version

# Check active plugins
wp plugin list --status=active

# Check theme information
wp theme list --status=active
```

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
