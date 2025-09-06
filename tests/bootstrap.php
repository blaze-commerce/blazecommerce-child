<?php
/**
 * PHPUnit bootstrap file for BlazeCommerce Child Theme
 *
 * @package BlazeCommerce_Child_Theme
 */

// Define test environment
define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', __DIR__ . '/../vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php' );

// WordPress test environment setup
$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
    $_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

// Forward custom PHPUnit Polyfills configuration to PHPUnit bootstrap file
$_phpunit_polyfills_path = getenv( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH' );
if ( false !== $_phpunit_polyfills_path ) {
    define( 'WP_TESTS_PHPUNIT_POLYFILLS_PATH', $_phpunit_polyfills_path );
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
    echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    exit( 1 );
}

// Give access to tests_add_filter() function
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the theme being tested
 */
function _manually_load_theme() {
    // Load parent theme first
    switch_theme( 'twentytwentyfive' );
    
    // Then load child theme
    switch_theme( 'blazecommerce-child' );
    
    // Load theme functions
    require dirname( __DIR__ ) . '/functions.php';
}

tests_add_filter( 'muplugins_loaded', '_manually_load_theme' );

/**
 * Load WooCommerce for testing if available
 */
function _manually_load_woocommerce() {
    if ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
        require_once WP_PLUGIN_DIR . '/woocommerce/woocommerce.php';
    }
}

tests_add_filter( 'plugins_loaded', '_manually_load_woocommerce', 0 );

// Start up the WP testing environment
require $_tests_dir . '/includes/bootstrap.php';

// Load test utilities
require_once __DIR__ . '/class-theme-test-case.php';
