# Accessibility Guide

This guide covers the accessibility features and compliance standards implemented in the BlazeCommerce Child Theme.

## Table of Contents

1. [WCAG 2.1 AA Compliance](#wcag-21-aa-compliance)
2. [Keyboard Navigation](#keyboard-navigation)
3. [Screen Reader Support](#screen-reader-support)
4. [Color and Contrast](#color-and-contrast)
5. [Typography and Readability](#typography-and-readability)
6. [Images and Media](#images-and-media)
7. [Forms and Interactions](#forms-and-interactions)
8. [Testing Accessibility](#testing-accessibility)
9. [Implementation Guidelines](#implementation-guidelines)

## WCAG 2.1 AA Compliance

### Compliance Standards

The theme meets WCAG 2.1 AA standards across four principles:

1. **Perceivable**: Information must be presentable in ways users can perceive
2. **Operable**: Interface components must be operable by all users
3. **Understandable**: Information and UI operation must be understandable
4. **Robust**: Content must be robust enough for various assistive technologies

### Key Features

- **Color Contrast**: Minimum 4.5:1 ratio for normal text, 3:1 for large text
- **Keyboard Navigation**: Full keyboard accessibility
- **Screen Reader Support**: Proper semantic markup and ARIA labels
- **Responsive Design**: Works across all devices and zoom levels
- **Focus Management**: Clear focus indicators and logical tab order

## Keyboard Navigation

### Navigation Support

All interactive elements are keyboard accessible:

```css
/* Focus indicators */
a:focus,
button:focus,
input:focus,
textarea:focus,
select:focus {
    outline: 2px solid var(--wp--preset--color--primary);
    outline-offset: 2px;
    box-shadow: 0 0 0 2px rgba(0, 123, 186, 0.3);
}

/* Remove outline for mouse users */
.js-focus-visible :focus:not(.focus-visible) {
    outline: none;
}
```

### Skip Links

Skip navigation for screen readers:

```html
<!-- In header template -->
<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e('Skip to content', 'blazecommerce-child'); ?>
</a>
```

```css
.skip-link {
    position: absolute;
    left: -9999px;
    z-index: 999999;
    padding: 8px 16px;
    background: var(--wp--preset--color--primary);
    color: white;
    text-decoration: none;
    font-weight: 600;
}

.skip-link:focus {
    left: 6px;
    top: 7px;
    clip: auto !important;
    height: auto;
    width: auto;
}
```

### Keyboard Shortcuts

Implemented keyboard shortcuts:

- **Tab**: Navigate forward through interactive elements
- **Shift + Tab**: Navigate backward
- **Enter/Space**: Activate buttons and links
- **Escape**: Close modals and dropdowns
- **Arrow Keys**: Navigate within menus and carousels

### Menu Navigation

```javascript
// Keyboard navigation for dropdown menus
document.addEventListener('keydown', function(e) {
    const activeElement = document.activeElement;
    const menuItem = activeElement.closest('.menu-item');
    
    if (!menuItem) return;
    
    switch(e.key) {
        case 'ArrowDown':
            e.preventDefault();
            // Navigate to next menu item
            break;
        case 'ArrowUp':
            e.preventDefault();
            // Navigate to previous menu item
            break;
        case 'Escape':
            // Close submenu
            break;
    }
});
```

## Screen Reader Support

### Semantic HTML

Proper HTML structure for screen readers:

```html
<!-- Semantic page structure -->
<header role="banner">
    <nav role="navigation" aria-label="Main navigation">
        <!-- Navigation content -->
    </nav>
</header>

<main role="main" id="main">
    <article>
        <header>
            <h1>Article Title</h1>
        </header>
        <div class="entry-content">
            <!-- Article content -->
        </div>
    </article>
</main>

<aside role="complementary" aria-label="Sidebar">
    <!-- Sidebar content -->
</aside>

<footer role="contentinfo">
    <!-- Footer content -->
</footer>
```

### ARIA Labels and Descriptions

```html
<!-- Search form -->
<form role="search" aria-label="Site search">
    <label for="search-field" class="screen-reader-text">Search for:</label>
    <input type="search" 
           id="search-field" 
           placeholder="Search..." 
           aria-describedby="search-description">
    <span id="search-description" class="screen-reader-text">
        Enter keywords to search the site
    </span>
    <button type="submit" aria-label="Submit search">
        <span aria-hidden="true">🔍</span>
    </button>
</form>

<!-- Navigation with ARIA -->
<nav aria-label="Main navigation">
    <ul role="menubar">
        <li role="none">
            <a href="/" role="menuitem">Home</a>
        </li>
        <li role="none">
            <button role="menuitem" 
                    aria-expanded="false" 
                    aria-haspopup="true">
                Products
            </button>
            <ul role="menu" aria-label="Products submenu">
                <li role="none">
                    <a href="/category1" role="menuitem">Category 1</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
```

### Screen Reader Text

```css
.screen-reader-text {
    border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    clip-path: inset(50%);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute !important;
    width: 1px;
    word-wrap: normal !important;
}

.screen-reader-text:focus {
    background-color: #f1f1f1;
    border-radius: 3px;
    box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
    clip: auto !important;
    clip-path: none;
    color: #21759b;
    display: block;
    font-size: 14px;
    font-weight: bold;
    height: auto;
    left: 5px;
    line-height: normal;
    padding: 15px 23px 14px;
    text-decoration: none;
    top: 5px;
    width: auto;
    z-index: 100000;
}
```

### Heading Hierarchy

```html
<!-- Proper heading structure -->
<h1>Page Title</h1>
    <h2>Main Section</h2>
        <h3>Subsection</h3>
        <h3>Another Subsection</h3>
    <h2>Another Main Section</h2>
        <h3>Subsection</h3>
```

## Color and Contrast

### Color Contrast Ratios

Meeting WCAG AA standards:

```css
/* Text contrast ratios */
:root {
    /* Normal text: 4.5:1 minimum */
    --text-primary: #1a1a1a;      /* 16.94:1 on white */
    --text-secondary: #4a5568;     /* 7.54:1 on white */
    
    /* Large text: 3:1 minimum */
    --text-large: #2d3748;        /* 10.7:1 on white */
    
    /* Link colors */
    --link-color: #2563eb;        /* 5.93:1 on white */
    --link-hover: #1d4ed8;        /* 7.04:1 on white */
    
    /* Background colors */
    --bg-primary: #ffffff;
    --bg-secondary: #f7fafc;      /* 1.04:1 with white text */
    --bg-dark: #1a202c;           /* 15.3:1 with white text */
}
```

### Color Independence

Ensure information isn't conveyed by color alone:

```html
<!-- Good: Uses both color and text -->
<div class="status-message success">
    <span class="icon" aria-hidden="true">✓</span>
    <span class="text">Success: Your order has been placed</span>
</div>

<!-- Good: Uses both color and icons -->
<button class="btn btn-danger" aria-describedby="delete-warning">
    <span class="icon" aria-hidden="true">🗑️</span>
    Delete Item
</button>
<span id="delete-warning" class="screen-reader-text">
    This action cannot be undone
</span>
```

### High Contrast Mode Support

```css
/* High contrast mode support */
@media (prefers-contrast: high) {
    :root {
        --text-primary: #000000;
        --bg-primary: #ffffff;
        --link-color: #0000ff;
        --border-color: #000000;
    }
    
    .card {
        border: 2px solid var(--border-color);
    }
}

/* Windows High Contrast Mode */
@media screen and (-ms-high-contrast: active) {
    .icon {
        filter: invert(1);
    }
}
```

## Typography and Readability

### Font Choices

Accessible font selection:

```css
:root {
    /* Highly legible font stack */
    --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 
                    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    
    /* Avoid decorative fonts for body text */
    --font-heading: var(--font-primary);
}

body {
    font-family: var(--font-primary);
    font-size: 18px; /* Minimum 16px for accessibility */
    line-height: 1.6; /* Minimum 1.5 for readability */
    letter-spacing: 0.01em;
}
```

### Responsive Typography

```css
/* Scalable typography */
html {
    font-size: 16px; /* Base font size */
}

@media (min-width: 768px) {
    html {
        font-size: 18px;
    }
}

/* Respect user preferences */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
```

### Text Spacing

```css
/* Adequate text spacing */
p {
    margin-bottom: 1.5em;
}

h1, h2, h3, h4, h5, h6 {
    margin-top: 1.5em;
    margin-bottom: 0.5em;
    line-height: 1.3;
}

/* List spacing */
ul, ol {
    margin-bottom: 1.5em;
    padding-left: 2em;
}

li {
    margin-bottom: 0.5em;
}
```

## Images and Media

### Alternative Text

```php
// Proper alt text implementation
function blazecommerce_child_get_image_alt($image_id, $fallback = '') {
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    
    if (empty($alt)) {
        $alt = $fallback ?: get_the_title($image_id);
    }
    
    return esc_attr($alt);
}

// Usage in templates
$image_id = get_post_thumbnail_id();
$alt_text = blazecommerce_child_get_image_alt($image_id, 'Featured image for ' . get_the_title());

echo wp_get_attachment_image($image_id, 'large', false, array(
    'alt' => $alt_text,
    'class' => 'featured-image'
));
```

### Decorative Images

```html
<!-- Decorative images -->
<img src="decoration.jpg" alt="" role="presentation">

<!-- CSS background images for decoration -->
<div class="hero-banner" role="img" aria-label="Mountain landscape background">
    <!-- Content -->
</div>
```

### Video Accessibility

```html
<!-- Video with captions and transcripts -->
<video controls>
    <source src="video.mp4" type="video/mp4">
    <track kind="captions" src="captions.vtt" srclang="en" label="English">
    <track kind="descriptions" src="descriptions.vtt" srclang="en" label="Audio descriptions">
    <p>Your browser doesn't support video. <a href="video.mp4">Download the video</a>.</p>
</video>

<!-- Transcript link -->
<p><a href="transcript.html">Read video transcript</a></p>
```

## Forms and Interactions

### Form Accessibility

```html
<!-- Accessible form structure -->
<form>
    <fieldset>
        <legend>Contact Information</legend>
        
        <div class="form-group">
            <label for="name">Full Name <span class="required" aria-label="required">*</span></label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   required 
                   aria-describedby="name-error"
                   aria-invalid="false">
            <div id="name-error" class="error-message" role="alert" aria-live="polite">
                <!-- Error message appears here -->
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email Address <span class="required" aria-label="required">*</span></label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   required 
                   aria-describedby="email-help email-error">
            <div id="email-help" class="help-text">
                We'll never share your email with anyone else.
            </div>
            <div id="email-error" class="error-message" role="alert" aria-live="polite">
                <!-- Error message appears here -->
            </div>
        </div>
    </fieldset>
    
    <button type="submit">Send Message</button>
</form>
```

### Error Handling

```javascript
// Accessible error handling
function showFormError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorElement = document.getElementById(fieldId + '-error');
    
    // Update field attributes
    field.setAttribute('aria-invalid', 'true');
    field.classList.add('error');
    
    // Show error message
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    
    // Focus the field
    field.focus();
}

function clearFormError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorElement = document.getElementById(fieldId + '-error');
    
    field.setAttribute('aria-invalid', 'false');
    field.classList.remove('error');
    errorElement.textContent = '';
    errorElement.style.display = 'none';
}
```

## Testing Accessibility

### Automated Testing Tools

1. **axe-core**: Browser extension for accessibility testing
2. **WAVE**: Web accessibility evaluation tool
3. **Lighthouse**: Built-in Chrome accessibility audit
4. **Pa11y**: Command-line accessibility testing

### Manual Testing

#### Keyboard Testing
1. **Tab through** all interactive elements
2. **Verify focus** is visible and logical
3. **Test keyboard shortcuts** work correctly
4. **Ensure no keyboard traps** exist

#### Screen Reader Testing
1. **NVDA** (Windows, free)
2. **JAWS** (Windows, commercial)
3. **VoiceOver** (macOS, built-in)
4. **Orca** (Linux, free)

#### Testing Checklist

```markdown
- [ ] All images have appropriate alt text
- [ ] Heading hierarchy is logical (h1 → h2 → h3)
- [ ] Color contrast meets WCAG AA standards
- [ ] All interactive elements are keyboard accessible
- [ ] Focus indicators are visible
- [ ] Form labels are properly associated
- [ ] Error messages are announced to screen readers
- [ ] Skip links work correctly
- [ ] Page has a descriptive title
- [ ] Language is declared in HTML
- [ ] Content is readable without CSS
- [ ] No content flashes more than 3 times per second
```

## Implementation Guidelines

### Development Workflow

1. **Design Phase**: Consider accessibility from the start
2. **Development**: Use semantic HTML and ARIA appropriately
3. **Testing**: Test with keyboard and screen readers
4. **Review**: Use automated tools for validation
5. **User Testing**: Include users with disabilities

### Code Standards

```php
// Accessibility helper functions
function blazecommerce_child_get_aria_label($context, $fallback = '') {
    $labels = array(
        'search' => __('Search the site', 'blazecommerce-child'),
        'menu' => __('Main navigation', 'blazecommerce-child'),
        'cart' => __('Shopping cart', 'blazecommerce-child'),
    );
    
    return isset($labels[$context]) ? $labels[$context] : $fallback;
}

function blazecommerce_child_render_skip_link($target, $text) {
    printf(
        '<a class="skip-link screen-reader-text" href="#%s">%s</a>',
        esc_attr($target),
        esc_html($text)
    );
}
```

### Continuous Monitoring

1. **Regular audits** with accessibility tools
2. **User feedback** collection
3. **Staff training** on accessibility
4. **Documentation updates** as standards evolve

---

**Last Updated**: December 2024  
**Version**: 1.0.1  
**Maintained by**: BlazeCommerce Team
