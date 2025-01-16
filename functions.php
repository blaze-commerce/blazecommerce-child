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
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Blaze Commerce',
            'slug'               => 'blazecommerce-wp-plugin-main',
            'source'             => 'https://github.com/blaze-commerce/blazecommerce-wp-plugin/archive/refs/heads/main.zip',
            'required'           => true,
        ],
        [
            'name'               => 'Blaze Commerce Checkout',
            'slug'               => 'blaze-online-checkout',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/blaze-commerce-checkout-main.zip',
            'required'           => true,
            'version'            => '1.0.4',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'     => 'Create Block Theme',
            'slug'     => 'create-block-theme',
            'required' => true,
        ],
        [
            'name'     => 'The Icon Block',
            'slug'     => 'icon-block',
            'required' => true,
        ],
        [
            'name'     => 'Gutenberg',
            'slug'     => 'gutenberg',
            'required' => true,
        ],
        [
            'name'     => 'Draft – Tailwind CSS for WordPress.',
            'slug'     => 'website-builder',
            'required' => true,
        ],
        [
            'name'     => 'WPGraphQL',
            'slug'     => 'wp-graphql',
            'required' => true,
        ],
        [
            'name'     => 'GenerateBlocks',
            'slug'     => 'generateblocks',
            'required' => true,
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
        ],
        [
            'name'     => 'Judge.me Product Reviews for WooCommerce',
            'slug'     => 'judgeme-product-reviews-woocommerce',
        ],
        [
            'name'     => 'YITH WooCommerce Wishlist',
            'slug'     => 'yith-woocommerce-wishlist',
        ],
        [
            'name'     => 'Yotpo Social Reviews for Woocommerce',
            'slug'     => 'yotpo-social-reviews-for-woocommerce',
        ],
        [
            'name'     => 'Variation Swatches for WooCommerce',
            'slug'     => 'woo-variation-swatches',
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
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/woo-variation-swatches-pro.zip',
            'version'            => '2.1.4',
        ],
        [
            'name'               => 'Max Mega Menu',
            'slug'               => 'megamenu',
            'required'           => true,
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Max Mega Menu - Pro Addon',
            'slug'               => 'megamenu-pro',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/megamenu-pro.zip',
            'required'           => true,
            'version'            => '2.4.2',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Yoast SEO Premium',
            'slug'               => 'wordpress-seo-premium',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wordpress-seo-premium.zip',
            'version'            => '24.0',
            'required' => true,
        ],
        [
            'name'               => 'Yoast SEO: WooCommerce',
            'slug'               => 'yoast-woo-seo',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wpseo-woocommerce.zip',
            'version'            => '16.4',
        ],
        [
            'name'               => 'WPGraphQL for Gravity Forms',
            'slug'               => 'wp-graphql-gravity-forms',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wp-graphql-gravity-forms.zip',
            'version'            => '0.13.0.1',
        ],
        [
            'name'               => 'WPGraphQL CORS',
            'slug'               => 'wp-graphql-cors',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wp-graphql-cors.zip',
            'required'           => true,
            'version'            => '2.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WooGraphQL',
            'slug'               => 'wp-graphql-woocommerce',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wp-graphql-woocommerce.zip',
            'required'           => true,
            'version'            => '0.19.0',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WPGraphQL JWT Authentication',
            'slug'               => 'wp-graphql-jwt-authentication',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wp-graphql-jwt-authentication.zip',
            'required'           => true,
            'version'            => '0.7.0',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Aelia Foundation Classes for WooCommerce',
            'slug'               => 'wc-aelia-foundation-classes',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/wc-aelia-foundation-classes.zip',
            'version'            => '2.6.2.241202',
        ],
        [
            'name'               => 'Advanced Flat Rate Shipping For WooCommerce Market',
            'slug'               => 'advanced-flat-rate-shipping-for-woocommerce',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/advanced-flat-rate-shipping-method-for-woocommerce.zip',
            'version'            => '4.7.8',
        ],
        [
            'name'               => 'Aelia Currency Switcher for WooCommerce',
            'slug'               => 'woocommerce-aelia-currencyswitcher',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/woocommerce-aelia-currencyswitcher.zip',
            'version'            => '5.2.0.241007',
        ],
        [
            'name'               => 'WooCommerce Product Addons',
            'slug'               => 'woocommerce-product-addons',
            'source'             => 'https://blazecommercechildthemeplugins.s3.us-east-2.amazonaws.com/woocommerce-product-addons.zip',
            'version'            => '7.2.1',
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
