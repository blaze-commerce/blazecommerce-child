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

// Register BlazeCommerce block pattern category
add_action('init', 'blaze_register_pattern_categories');
function blaze_register_pattern_categories() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'blazecommerce-layout',
            array(
                'label' => __('BlazeCommerce Layout', 'blaze-child'),
                'description' => __('Layout patterns for BlazeCommerce themes', 'blaze-child'),
            )
        );

        register_block_pattern_category(
            'blazecommerce-media',
            array(
                'label' => __('BlazeCommerce Media', 'blaze-child'),
                'description' => __('Media and gallery patterns for BlazeCommerce themes', 'blaze-child'),
            )
        );

        register_block_pattern_category(
            'blazecommerce-content',
            array(
                'label' => __('BlazeCommerce Content', 'blaze-child'),
                'description' => __('Content patterns for BlazeCommerce themes', 'blaze-child'),
            )
        );
    }
}

// Register BlazeCommerce block patterns
add_action('init', 'blaze_register_block_patterns');
function blaze_register_block_patterns() {
    if (function_exists('register_block_pattern')) {
        // Register Our Expert pattern
        register_block_pattern(
            'blaze-commerce/our-expert',
            array(
                'title'         => __('Our Expert', 'blaze-child'),
                'description'   => __('A professional expert section showcasing expertise with responsive layout for desktop, tablet, and mobile.', 'blaze-child'),
                'content'       => blaze_get_pattern_content('blaze-commerce-our-expert'),
                'categories'    => array('blazecommerce-layout'),
                'keywords'      => array('expert', 'team', 'professional', 'specialist', 'about', 'profile'),
                'viewportWidth' => 1400,
                'blockTypes'    => array('core/post-content'),
                'postTypes'     => array('page', 'wp_template'),
            )
        );
    }
}

// Helper function to get pattern content from PHP files
function blaze_get_pattern_content($pattern_name) {
    $pattern_file = get_stylesheet_directory() . '/patterns/' . $pattern_name . '.php';

    if (file_exists($pattern_file)) {
        ob_start();
        include $pattern_file;
        $content = ob_get_clean();

        // Extract content between the PHP opening/closing tags
        $pattern = '/<!-- wp:.*?-->(.*?)<!-- \/wp:.*?-->/s';
        if (preg_match($pattern, $content, $matches)) {
            return trim($matches[0]);
        }

        // If no WordPress blocks found, return the content after the PHP header
        $lines = explode("\n", $content);
        $content_lines = array();
        $in_content = false;

        foreach ($lines as $line) {
            if (strpos($line, '?>') !== false) {
                $in_content = true;
                continue;
            }
            if ($in_content) {
                $content_lines[] = $line;
            }
        }

        return trim(implode("\n", $content_lines));
    }

    return '';
}
