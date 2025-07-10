# Kimi-Dev Integration with Augment Code for WordPress Child Theme Development

## Two-Stage Approach for WordPress Child Theme Code Tasks

### Stage 1: File Localization for WordPress Child Themes
When working on WordPress child theme issues, first identify the relevant files:

**WordPress Child Theme Prompt Template:**
```
# File Localization Phase - WordPress Child Theme Context
Given the following WordPress child theme issue/task: {ISSUE_DESCRIPTION}

Child theme context: {THEME_CONTEXT}
Parent theme: {PARENT_THEME} (likely Astra or similar)
WordPress version: {WP_VERSION}
PHP version: {PHP_VERSION}

Please identify the key files that need to be modified. Consider:
1. Main child theme files (style.css, functions.php)
2. Template files in /templates directory (Block themes)
3. Template parts in /template-parts directory
4. Pattern files in /patterns directory
5. Block template parts in /parts directory
6. Custom template files (page templates, archive templates)
7. WooCommerce template overrides in /woocommerce directory
8. Asset files in /assets, /js, /src directories
9. Theme configuration (theme.json)
10. Custom post type templates and taxonomy templates

Output format:
- Core theme files: [main child theme files to modify]
- Template files: [template and template-part files to update]
- Pattern files: [block patterns to modify]
- WooCommerce templates: [WooCommerce template overrides]
- Asset files: [CSS/JS/image files to modify]
- Configuration files: [theme.json and other config files]
- Custom templates: [page templates and custom post type templates]
```

### Stage 2: WordPress Child Theme Code Editing
After file localization, perform WordPress child theme-specific modifications:

**WordPress Child Theme Editing Template:**
```
# Code Editing Phase - WordPress Child Theme Context
Files to modify: {IDENTIFIED_FILES}
WordPress child theme issue: {ISSUE_DESCRIPTION}
Theme file content: {FILE_CONTENT}

Please provide WordPress child theme-specific code modifications:
1. Follow WordPress coding standards (WPCS)
2. Maintain child theme best practices (proper parent theme inheritance)
3. Use WordPress hooks and filters appropriately
4. Implement proper theme customization patterns
5. Ensure compatibility with parent theme updates
6. Follow block theme development patterns (if applicable)
7. Implement proper WooCommerce template customizations
8. Add proper theme documentation and comments

Output format:
- Child theme best practices compliance
- Parent theme compatibility considerations
- Block theme pattern implementations
- WooCommerce integration considerations
- Code changes (with line numbers)
- Theme testing recommendations
- Performance and accessibility improvements
```

## Specialized Prompts for WordPress Child Theme Tasks

### WordPress Child Theme Customization
```
You are a WordPress child theme customization specialist. Use the two-stage approach:
1. First, locate all child theme files related to the customization
2. Then, provide child theme-compliant customizations with proper inheritance

Focus on:
- Proper child theme structure and organization
- Parent theme function overrides and extensions
- Template hierarchy and template part usage
- Block theme patterns and template parts
- WooCommerce template customizations
- Theme.json configuration and styling
- Custom post type and taxonomy templates
```

### WordPress Child Theme Testing
```
You are a WordPress child theme testing specialist. Use the two-stage approach:
1. First, identify child theme functionality that needs testing
2. Then, write comprehensive child theme test procedures

Focus on:
- Parent theme compatibility testing
- Template hierarchy verification
- Block theme pattern functionality
- WooCommerce template override testing
- Cross-browser and device testing
- Performance testing for theme assets
- Accessibility compliance testing
- WordPress core update compatibility
```

### WordPress Child Theme Performance Optimization
```
You are a WordPress child theme performance specialist. Use the two-stage approach:
1. First, identify performance bottlenecks in child theme files
2. Then, provide optimization recommendations

Focus on:
- CSS and JavaScript optimization
- Image optimization and lazy loading
- Template performance improvements
- Database query optimization
- Caching strategy implementation
- Core Web Vitals improvements
- Mobile performance optimization
- Asset loading optimization
```

## Integration with BlazeCommerce WordPress Child Theme Context

### Child Theme-Specific Considerations
- **Theme Name**: BlazeCommerce Child Theme
- **Parent Theme**: Astra (or similar)
- **Theme Type**: Block theme with traditional template support
- **WooCommerce Integration**: Custom template overrides
- **Block Patterns**: Custom patterns for e-commerce layouts
- **Template Parts**: Reusable components for headers, footers, etc.
- **Asset Management**: Custom CSS, JavaScript, and images

### WordPress Child Theme Development Workflow

1. **Context Gathering**: Use Augment Code to understand child theme architecture
2. **File Localization**: Apply Kimi-Dev's approach to child theme file structure
3. **Code Editing**: Implement child theme-compliant solutions
4. **Testing**: Use WordPress child theme testing procedures
5. **Performance Review**: Apply child theme optimization techniques

### WordPress Child Theme File Patterns

**Core Child Theme Files:**
- `style.css` - Main child theme stylesheet with parent theme import
- `functions.php` - Child theme functions and customizations
- `screenshot.jpg` - Theme screenshot
- `theme.json` - Block theme configuration

**Template Files (Block Theme):**
- `/templates/*.html` - Full site editing templates
- `/parts/*.html` - Template parts for headers, footers, etc.
- `/patterns/*.php` - Block patterns for content layouts

**Template Files (Traditional):**
- `/template-parts/*.php` - Template parts for content sections
- `index.php`, `single.php`, `page.php` - Main template files
- `archive.php`, `search.php` - Archive and search templates

**WooCommerce Integration:**
- `/woocommerce/*.php` - WooCommerce template overrides
- `/woocommerce/single-product/*.php` - Product page templates
- `/woocommerce/checkout/*.php` - Checkout process templates

**Asset Files:**
- `/assets/*.css` - Additional stylesheets
- `/js/*.js` - Custom JavaScript files
- `/src/css/*.css` - Source CSS files
- `/src/images/*` - Theme images and graphics

**Custom Templates:**
- `page-*.php` - Custom page templates
- `single-*.php` - Custom post type templates
- `taxonomy-*.php` - Custom taxonomy templates

## VS Code Integration for WordPress Child Theme Development

### Child Theme-Specific Commands
- **Child Theme Structure Check**: Validate child theme file organization
- **Parent Theme Compatibility**: Check compatibility with parent theme updates
- **Template Hierarchy Validation**: Verify template file hierarchy
- **WooCommerce Template Check**: Validate WooCommerce template overrides
- **Block Pattern Validation**: Check block patterns and template parts

### Integration Benefits for WordPress Child Themes

- **Augment Code**: Excellent WordPress child theme codebase understanding
- **Kimi-Dev**: Specialized software engineering with child theme context
- **Combined**: Child theme-compliant solutions with comprehensive theme knowledge
