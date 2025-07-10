<?php
/**
 * Base test case for theme testing
 *
 * @package BlazeCommerce_Child_Theme
 */

/**
 * Base test case class for theme tests
 */
class Theme_Test_Case extends WP_UnitTestCase {

    /**
     * Set up test environment
     */
    public function setUp(): void {
        parent::setUp();
        
        // Switch to our theme
        switch_theme( 'blazecommerce-child' );
        
        // Clear any cached theme data
        wp_clean_themes_cache();
    }

    /**
     * Tear down test environment
     */
    public function tearDown(): void {
        // Clean up any test data
        wp_clean_themes_cache();
        
        parent::tearDown();
    }

    /**
     * Helper method to get current theme
     *
     * @return WP_Theme
     */
    protected function get_theme() {
        return wp_get_theme();
    }

    /**
     * Helper method to check if a function exists
     *
     * @param string $function_name Function name to check.
     * @return bool
     */
    protected function function_exists( $function_name ) {
        return function_exists( $function_name );
    }

    /**
     * Helper method to check if a hook is registered
     *
     * @param string $hook_name Hook name to check.
     * @param string $function_name Function name to check.
     * @return bool
     */
    protected function is_hook_registered( $hook_name, $function_name = '' ) {
        global $wp_filter;
        
        if ( empty( $function_name ) ) {
            return isset( $wp_filter[ $hook_name ] );
        }
        
        if ( ! isset( $wp_filter[ $hook_name ] ) ) {
            return false;
        }
        
        foreach ( $wp_filter[ $hook_name ]->callbacks as $priority => $callbacks ) {
            foreach ( $callbacks as $callback ) {
                if ( is_string( $callback['function'] ) && $callback['function'] === $function_name ) {
                    return true;
                }
                if ( is_array( $callback['function'] ) && $callback['function'][1] === $function_name ) {
                    return true;
                }
            }
        }
        
        return false;
    }

    /**
     * Helper method to create a test post
     *
     * @param array $args Post arguments.
     * @return int Post ID
     */
    protected function create_test_post( $args = array() ) {
        $defaults = array(
            'post_title'   => 'Test Post',
            'post_content' => 'Test content',
            'post_status'  => 'publish',
            'post_type'    => 'post',
        );
        
        $args = wp_parse_args( $args, $defaults );
        
        return $this->factory->post->create( $args );
    }

    /**
     * Helper method to create a test product (WooCommerce)
     *
     * @param array $args Product arguments.
     * @return int Product ID
     */
    protected function create_test_product( $args = array() ) {
        if ( ! class_exists( 'WC_Product_Simple' ) ) {
            $this->markTestSkipped( 'WooCommerce not available' );
        }
        
        $defaults = array(
            'post_title'  => 'Test Product',
            'post_status' => 'publish',
            'post_type'   => 'product',
        );
        
        $args = wp_parse_args( $args, $defaults );
        
        $product_id = $this->factory->post->create( $args );
        
        // Set as simple product
        wp_set_object_terms( $product_id, 'simple', 'product_type' );
        
        // Set price
        update_post_meta( $product_id, '_price', '10.00' );
        update_post_meta( $product_id, '_regular_price', '10.00' );
        
        return $product_id;
    }

    /**
     * Assert that a style is enqueued
     *
     * @param string $handle Style handle.
     */
    protected function assertStyleEnqueued( $handle ) {
        $this->assertTrue( wp_style_is( $handle, 'enqueued' ), "Style '{$handle}' should be enqueued" );
    }

    /**
     * Assert that a script is enqueued
     *
     * @param string $handle Script handle.
     */
    protected function assertScriptEnqueued( $handle ) {
        $this->assertTrue( wp_script_is( $handle, 'enqueued' ), "Script '{$handle}' should be enqueued" );
    }
}
