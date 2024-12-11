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
            'name'     => 'Responsive Navigation Block',
            'slug'     => 'getdave-responsive-navigation-block',
            'required' => false,
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
            'name'     => 'WooCommerce',
            'slug'     => 'woocommerce',
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
            'required' => true,
        ],
        [
            'name'               => 'Blaze Commerce',
            'slug'               => 'blazecommerce-wp-plugin-main',
            'source'             => get_stylesheet_directory() . '/plugins/blazecommerce-wp-plugin-main.zip',
            'required'           => true,
            'version'            => '1.5.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WPGraphQL CORSe',
            'slug'               => 'wp-graphql-cors',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-cors.zip',
            'required'           => true,
            'version'            => '2.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WooGraphQL',
            'slug'               => 'wp-graphql-woocommerce',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-woocommerce.zip',
            'required'           => true,
            'version'            => '0.19.0',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WPGraphQL JWT Authentication',
            'slug'               => 'wp-graphql-jwt-authentication',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-jwt-authentication.zip',
            'required'           => true,
            'version'            => '0.7.0',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Aelia Foundation Classes for WooCommerce',
            'slug'               => 'wc-aelia-foundation-classes',
            'source'             => get_stylesheet_directory() . '/plugins/wc-aelia-foundation-classes.zip',
            'required'           => true,
            'version'            => '2.6.2.241202',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Advanced Flat Rate Shipping For WooCommerce Market',
            'slug'               => 'advanced-flat-rate-shipping-for-woocommerce',
            'source'             => get_stylesheet_directory() . '/plugins/advanced-flat-rate-shipping-method-for-woocommerce.zip',
            'required'           => false,
            'version'            => '4.7.8',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Back In Stock Notifier for WooCommerce | WooCommerce Waitlist Pro',
            'slug'               => 'back-in-stock-notifier-for-woocommerce',
            'source'             => get_stylesheet_directory() . '/plugins/back-in-stock-notifier-for-woocommerce.5.7.4.zip',
            'required'           => false,
            'version'            => '5.7.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Blaze Commerce Checkout',
            'slug'               => 'blaze-online-checkout',
            'source'             => get_stylesheet_directory() . '/plugins/blaze-commerce-checkout-main.zip',
            'required'           => true,
            'version'            => '1.0.4',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Disable Comments',
            'slug'               => 'disable-comments',
            'source'             => get_stylesheet_directory() . '/plugins/disable-comments.2.4.6.zip',
            'required'           => false,
            'version'            => '2.4.6',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'GenerateBlocks',
            'slug'               => 'generateblocks',
            'source'             => get_stylesheet_directory() . '/plugins/generateblocks.1.9.1.zip',
            'required'           => true,
            'version'            => '1.9.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'GenerateBlocks Pro',
            'slug'               => 'generateblocks-pro',
            'source'             => get_stylesheet_directory() . '/plugins/generateblocks-pro.zip',
            'required'           => true,
            'version'            => '1.7.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Judge.me Product Reviews for WooCommerce',
            'slug'               => 'judgeme-product-reviews-woocommerce',
            'source'             => get_stylesheet_directory() . '/plugins/judgeme-product-reviews-woocommerce.zip',
            'required'           => false,
            'version'            => '1.3.24',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Max Mega Menu',
            'slug'               => 'megamenu',
            'source'             => get_stylesheet_directory() . '/plugins/megamenu.3.4.1.zip',
            'required'           => true,
            'version'            => '3.4.1',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Max Mega Menu - Pro Addon',
            'slug'               => 'megamenu-pro',
            'source'             => get_stylesheet_directory() . '/plugins/megamenu-pro.zip',
            'required'           => true,
            'version'            => '2.4.2',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'PW WooCommerce Gift Cards Pro',
            'slug'               => 'pw-woocommerce-gift-cards-pro',
            'source'             => get_stylesheet_directory() . '/plugins/pw-gift-cards.zip',
            'required'           => false,
            'version'            => '1.470',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'PW WooCommerce Gift Cards',
            'slug'               => 'pw-woocommerce-gift-cards',
            'source'             => get_stylesheet_directory() . '/plugins/pw-woocommerce-gift-cards.2.10.zip',
            'required'           => false,
            'version'            => '2.10',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'WooCommerce Advanced Product Labels',
            'slug'               => 'woocommerce-advanced-product-labels',
            'source'             => get_stylesheet_directory() . '/plugins/woocommerce-advanced-product-labels.zip',
            'required'           => false,
            'version'            => '1.3.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Aelia Currency Switcher for WooCommerce',
            'slug'               => 'woocommerce-aelia-currencyswitcher',
            'source'             => get_stylesheet_directory() . '/plugins/woocommerce-aelia-currencyswitcher.zip',
            'required'           => true,
            'version'            => '5.2.0.241007',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WooCommerce Checkout Field Editor',
            'slug'               => 'woocommerce-aelia-currencyswitcher',
            'source'             => get_stylesheet_directory() . '/plugins/woocommerce-checkout-field-editor.zip',
            'required'           => true,
            'version'            => '1.7.19',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'Variation Swatches for WooCommerce - Pro',
            'slug'               => 'woo-variation-swatches-pro',
            'source'             => get_stylesheet_directory() . '/plugins/woo-variation-swatches-pro.zip',
            'required'           => false,
            'version'            => '2.1.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Yoast SEO',
            'slug'               => 'wordpress-seo',
            'source'             => get_stylesheet_directory() . '/plugins/wordpress-seo.24.0.zip',
            'required'           => false,
            'version'            => '24.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Yoast SEO Premium',
            'slug'               => 'wordpress-seo-premium',
            'source'             => get_stylesheet_directory() . '/plugins/wordpress-seo-premium.zip',
            'required'           => false,
            'version'            => '24.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'WPGraphQL',
            'slug'               => 'wp-graphql',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql.zip',
            'required'           => true,
            'version'            => '1.29.3',
            'force_activation'   => true,
            'force_deactivation' => true,
        ],
        [
            'name'               => 'WPGraphQL for Gravity Forms',
            'slug'               => 'wp-graphql-gravity-forms',
            'source'             => get_stylesheet_directory() . '/plugins/wp-graphql-gravity-forms.zip',
            'required'           => false,
            'version'            => '0.13.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Yoast SEO: WooCommerce',
            'slug'               => 'yoast-woo-seo',
            'source'             => get_stylesheet_directory() . '/plugins/wpseo-woocommerce.zip',
            'required'           => false,
            'version'            => '16.4',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'YITH WooCommerce Wishlist',
            'slug'               => 'yith-woocommerce-wishlist',
            'source'             => get_stylesheet_directory() . '/plugins/yith-woocommerce-wishlist.zip',
            'required'           => false,
            'version'            => '4.0.1',
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'               => 'Yotpo Social Reviews for Woocommerce',
            'slug'               => 'yotpo-social-reviews-for-woocommerce',
            'source'             => get_stylesheet_directory() . '/plugins/yotpo-social-reviews-for-woocommerce.zip',
            'required'           => false,
            'version'            => '1.8.1',
            'force_activation'   => false,
            'force_deactivation' => false,
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
