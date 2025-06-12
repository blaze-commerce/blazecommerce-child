<?php

// Enqueue parent and child theme styles
add_action('wp_enqueue_scripts', 'blaze_theme_enqueue_styles');
function blaze_theme_enqueue_styles() {
    $parent_handle = 'blaze-commerce-style'; // Handle for the parent theme's stylesheet
    $theme = wp_get_theme();

    // Load the parent theme stylesheet
    wp_enqueue_style(
        $parent_handle,
        get_template_directory_uri() . '/style.css',
        [],
        $theme->parent()->get('Version') // Cache-busting with parent theme's version
    );

    // Load the child theme stylesheet
    wp_enqueue_style(
        'blaze-child-style',
        get_stylesheet_uri(),
        [$parent_handle], // Make the parent stylesheet a dependency
        $theme->get('Version') // Cache-busting with child theme's version
    );
}

// Include TGM Plugin Activation class
$tgm_file = dirname(__FILE__) . '/class-tgm-plugin-activation.php';

if (file_exists($tgm_file)) {
    require_once $tgm_file;
} else {
    wp_die(
        'The TGM Plugin Activation class file is missing. Please download it from <a href="http://tgmpluginactivation.com/configuration/" target="_blank" rel="noopener noreferrer">TGM Plugin Activation</a> and place it in the child theme directory.',
        'Missing TGM Plugin Activation File'
    );
}

// Register required plugins using TGM Plugin Activation
add_action('tgmpa_register', 'blaze_theme_register_required_plugins');

function blaze_theme_register_required_plugins() {
    $plugins = [
        [
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'               => 'Blaze Commerce',
            'slug'               => 'blazecommerce-wp-plugin-main',
            'source'             => 'https://github.com/blaze-commerce/blazecommerce-wp-plugin/archive/refs/heads/main.zip',
            'required'           => true,
            'force_deactivation'   => true,
        ],
        [
            'name'               => 'Blaze Commerce Checkout',
            'slug'               => 'blaze-online-checkout',
            'source'             => 'https://github.com/blaze-commerce/blaze-commerce-checkout/archive/refs/heads/main.zip',
            'required'           => true,
            'force_activation'   => true,
            'force_deactivation'   => true,
        ],
        [
            'name'     => 'Create Block Theme',
            'slug'     => 'create-block-theme',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'The Icon Block',
            'slug'     => 'icon-block',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Gutenberg',
            'slug'     => 'gutenberg',
        ],
        [
            'name'     => 'WPGraphQL',
            'slug'     => 'wp-graphql',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'GenerateBlocks',
            'slug'     => 'generateblocks',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Back In Stock Notifier for WooCommerce',
            'slug'     => 'back-in-stock-notifier-for-woocommerce',
        ],
        [
            'name'     => 'Disable Comments',
            'slug'     => 'disable-comments',
        ],
        [
            'name'     => 'Yoast SEO',
            'slug'     => 'wordpress-seo',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Judge.me Product Reviews for WooCommerce',
            'slug'     => 'judgeme-product-reviews-woocommerce',
        ],
        [
            'name'     => 'YITH WooCommerce Wishlist',
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Yotpo Social Reviews for Woocommerce',
            'slug'     => 'yotpo-social-reviews-for-woocommerce',
        ],
        [
            'name'     => 'Variation Swatches for WooCommerce',
            'slug'     => 'woo-variation-swatches',
            'force_activation'   => true,
            'force_deactivation'   => true,
        ],
        [
            'name'     => 'WindPress',
            'slug'     => 'windpress',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Gravity Forms',
            'slug'     => 'gravityforms',
            'source'   => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/gravityforms.zip',
            'version'  => '2.9.1',
        ],
        [
            'name'               => 'Variation Swatches for WooCommerce - Pro',
            'slug'               => 'woo-variation-swatches-pro',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/woo-variation-swatches-pro.zip',
            'version'            => '2.1.4',
            'force_activation'   => true,
            'force_deactivation'   => true,
        ],
        [
            'name'               => 'Max Mega Menu',
            'slug'               => 'megamenu',
            'required'           => true,
            'force_activation'   => true,
        ],
        [
            'name'               => 'Max Mega Menu - Pro Addon',
            'slug'               => 'megamenu-pro',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/megamenu-pro.zip',
            'required'           => true,
            'version'            => '2.4.2',
            'force_activation'   => true,
        ],
        [
            'name'               => 'Yoast SEO Premium',
            'slug'               => 'wordpress-seo-premium',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wordpress-seo-premium.zip',
            'version'            => '24.0',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'               => 'Yoast SEO: WooCommerce',
            'slug'               => 'yoast-woo-seo',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wpseo-woocommerce.zip',
            'version'            => '16.4',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'               => 'WPGraphQL for Gravity Forms',
            'slug'               => 'wp-graphql-gravity-forms',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wp-graphql-gravity-forms.zip',
            'version'            => '0.13.0.1',
        ],
        [
            'name'               => 'WPGraphQL CORS',
            'slug'               => 'wp-graphql-cors',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wp-graphql-cors.zip',
            'required'           => true,
            'version'            => '2.1',
            'force_activation'   => true,
        ],
        [
            'name'               => 'WooGraphQL',
            'slug'               => 'wp-graphql-woocommerce',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wp-graphql-woocommerce.zip',
            'required'           => true,
            'version'            => '0.19.0',
            'force_activation'   => true,
        ],
        [
            'name'               => 'WooGraphQL Pro',
            'slug'               => 'woographql-pro',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/woographql-pro-v1.5.0.zip',
            'required'           => true,
            'version'            => '1.5.0',
            'force_activation'   => true,
        ],
        [
            'name'               => 'WPGraphQL JWT Authentication',
            'slug'               => 'wp-graphql-jwt-authentication',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wp-graphql-jwt-authentication.zip',
            'required'           => true,
            'version'            => '0.7.0',
            'force_activation'   => true,
        ],
        [
            'name'               => 'Aelia Foundation Classes for WooCommerce',
            'slug'               => 'wc-aelia-foundation-classes',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/wc-aelia-foundation-classes.zip',
            'version'            => '2.6.2.241202',
        ],
        [
            'name'               => 'Advanced Flat Rate Shipping For WooCommerce Market',
            'slug'               => 'advanced-flat-rate-shipping-for-woocommerce',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/advanced-flat-rate-shipping-method-for-woocommerce.zip',
            'version'            => '4.7.8',
        ],
        [
            'name'               => 'Aelia Currency Switcher for WooCommerce',
            'slug'               => 'woocommerce-aelia-currencyswitcher',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/woocommerce-aelia-currencyswitcher.zip',
            'version'            => '5.2.0.241007',
        ],
        [
            'name'               => 'WooCommerce Product Addons',
            'slug'               => 'woocommerce-product-addons',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/woocommerce-product-addons.zip',
            'version'            => '7.2.1',
        ],
        [
            'name'     => 'GenerateBlocks Pro',
            'slug'     => 'generateblocks-pro',
            'source'             => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/generateblocks-pro.zip',
            'required' => true,
            'force_activation'   => true,
        ],
        [
            'name'     => 'Photo Reviews for WooCommerce',
            'slug'     => 'woo-photo-reviews',
            'source'   => 'https://blazecommerce.io/wp-content/blaze-commerce-plugins/woo-photo-reviews.zip',
            'force_activation'   => true,
            'force_deactivation'   => true,
        ],
    ];

    $config = [
        'id'           => 'tgmpa', // Unique ID for TGM Plugin Activation
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'is_automatic' => false, // Automatically activate plugins after installation
    ];

    tgmpa($plugins, $config);
}

// Dynamically register all BlazeCommerce block patterns
add_action('init', 'blaze_register_patterns_dynamically');
function blaze_register_patterns_dynamically() {
    if (!function_exists('register_block_pattern')) {
        return;
    }

    $patterns_dir = get_stylesheet_directory() . '/patterns/';

    // Check if patterns directory exists
    if (!is_dir($patterns_dir)) {
        return;
    }

    // Get all PHP files in patterns directory that start with 'blaze-commerce-'
    $pattern_files = glob($patterns_dir . 'blaze-commerce-*.php');

    foreach ($pattern_files as $pattern_file) {
        $pattern_data = blaze_parse_pattern_header($pattern_file);

        if (!empty($pattern_data['title']) && !empty($pattern_data['slug'])) {
            // Get pattern content
            $content = blaze_get_pattern_content($pattern_file);

            if (!empty($content)) {
                register_block_pattern(
                    $pattern_data['slug'],
                    array(
                        'title'         => $pattern_data['title'],
                        'description'   => $pattern_data['description'] ?: '',
                        'content'       => $content,
                        'categories'    => $pattern_data['categories'] ?: array('featured'),
                        'keywords'      => $pattern_data['keywords'] ?: array(),
                        'viewportWidth' => $pattern_data['viewport_width'] ?: 1400,
                        'blockTypes'    => $pattern_data['block_types'] ?: array('core/post-content'),
                        'postTypes'     => $pattern_data['post_types'] ?: array('page', 'wp_template'),
                    )
                );
            }
        }
    }
}

// Parse pattern header to extract metadata
function blaze_parse_pattern_header($pattern_file) {
    $file_content = file_get_contents($pattern_file);
    $pattern_data = array();

    // Extract header comment block
    if (preg_match('/\/\*\*(.*?)\*\//s', $file_content, $matches)) {
        $header = $matches[1];

        // Parse each header field
        $fields = array(
            'title' => 'Title',
            'slug' => 'Slug',
            'categories' => 'Categories',
            'keywords' => 'Keywords',
            'block_types' => 'Block Types',
            'post_types' => 'Post Types',
            'viewport_width' => 'Viewport width',
            'description' => 'Description'
        );

        foreach ($fields as $key => $field) {
            if (preg_match('/\* ' . preg_quote($field, '/') . ':\s*(.+)/i', $header, $field_matches)) {
                $value = trim($field_matches[1]);

                // Handle array fields (comma-separated values)
                if (in_array($key, array('categories', 'keywords', 'block_types', 'post_types'))) {
                    $pattern_data[$key] = array_map('trim', explode(',', $value));
                } elseif ($key === 'viewport_width') {
                    $pattern_data[$key] = intval($value);
                } else {
                    $pattern_data[$key] = $value;
                }
            }
        }
    }

    return $pattern_data;
}

// Get pattern content from PHP file
function blaze_get_pattern_content($pattern_file) {
    if (!file_exists($pattern_file)) {
        return '';
    }

    ob_start();
    include $pattern_file;
    $content = ob_get_clean();

    // Extract WordPress block content (everything after PHP closing tag)
    if (strpos($content, '?>') !== false) {
        $content = substr($content, strpos($content, '?>') + 2);
    }

    return trim($content);
}




