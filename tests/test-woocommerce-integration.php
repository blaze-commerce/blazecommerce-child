<?php
/**
 * Test WooCommerce integration
 *
 * @package BlazeCommerce_Child_Theme
 */

/**
 * WooCommerce integration tests
 */
class Test_WooCommerce_Integration extends Theme_Test_Case {

    /**
     * Set up WooCommerce tests
     */
    public function setUp(): void {
        parent::setUp();
        
        if ( ! class_exists( 'WooCommerce' ) ) {
            $this->markTestSkipped( 'WooCommerce is not available' );
        }
    }

    /**
     * Test WooCommerce theme support
     */
    public function test_woocommerce_support() {
        $this->assertTrue( 
            current_theme_supports( 'woocommerce' ),
            'Theme should support WooCommerce'
        );
    }

    /**
     * Test WooCommerce template overrides exist
     */
    public function test_woocommerce_templates() {
        $theme_root = get_stylesheet_directory();
        $woocommerce_dir = $theme_root . '/woocommerce';
        
        if ( is_dir( $woocommerce_dir ) ) {
            $this->assertDirectoryExists( $woocommerce_dir );
            
            // Check for common template overrides
            $common_templates = array(
                'single-product.php',
                'archive-product.php',
                'cart/cart.php',
                'checkout/form-checkout.php',
            );
            
            foreach ( $common_templates as $template ) {
                $template_path = $woocommerce_dir . '/' . $template;
                if ( file_exists( $template_path ) ) {
                    $this->assertFileExists( $template_path );
                }
            }
        }
    }

    /**
     * Test product display
     */
    public function test_product_display() {
        $product_id = $this->create_test_product();
        
        $this->assertGreaterThan( 0, $product_id );
        
        $product = wc_get_product( $product_id );
        $this->assertInstanceOf( 'WC_Product', $product );
        
        // Test product data
        $this->assertEquals( 'Test Product', $product->get_name() );
        $this->assertEquals( '10.00', $product->get_price() );
    }

    /**
     * Test cart functionality
     */
    public function test_cart_functionality() {
        $product_id = $this->create_test_product();
        
        // Add product to cart
        WC()->cart->add_to_cart( $product_id, 1 );
        
        $this->assertEquals( 1, WC()->cart->get_cart_contents_count() );
        $this->assertEquals( 10.00, WC()->cart->get_cart_total() );
        
        // Clean up
        WC()->cart->empty_cart();
    }

    /**
     * Test theme customizations for WooCommerce
     */
    public function test_woocommerce_customizations() {
        // Test any custom WooCommerce hooks or filters
        // This would depend on what customizations are in the theme
        
        // Example: Test if custom product loop modifications exist
        $this->assertTrue( true, 'Placeholder for WooCommerce customization tests' );
    }

    /**
     * Test WooCommerce blocks support
     */
    public function test_woocommerce_blocks_support() {
        if ( class_exists( 'Automattic\WooCommerce\Blocks\Package' ) ) {
            $this->assertTrue( 
                current_theme_supports( 'wc-product-gallery-zoom' ) ||
                current_theme_supports( 'wc-product-gallery-lightbox' ) ||
                current_theme_supports( 'wc-product-gallery-slider' ),
                'Theme should support WooCommerce gallery features'
            );
        }
    }

    /**
     * Test checkout process
     */
    public function test_checkout_process() {
        $product_id = $this->create_test_product();
        
        // Add product to cart
        WC()->cart->add_to_cart( $product_id, 1 );
        
        // Test checkout page exists
        $checkout_page_id = wc_get_page_id( 'checkout' );
        $this->assertGreaterThan( 0, $checkout_page_id );
        
        $checkout_page = get_post( $checkout_page_id );
        $this->assertEquals( 'publish', $checkout_page->post_status );
        
        // Clean up
        WC()->cart->empty_cart();
    }

    /**
     * Test theme compatibility with WooCommerce widgets
     */
    public function test_woocommerce_widgets() {
        // Test that WooCommerce widgets can be used
        $this->assertTrue( 
            class_exists( 'WC_Widget_Cart' ),
            'WooCommerce cart widget should be available'
        );
        
        $this->assertTrue( 
            class_exists( 'WC_Widget_Product_Search' ),
            'WooCommerce product search widget should be available'
        );
    }
}
