<?php
/**
 * Test theme setup and basic functionality
 *
 * @package BlazeCommerce_Child_Theme
 */

/**
 * Theme setup tests
 */
class Test_Theme_Setup extends Theme_Test_Case {

    /**
     * Test that theme is properly loaded
     */
    public function test_theme_loaded() {
        $theme = $this->get_theme();
        
        $this->assertEquals( 'blazecommerce-child', $theme->get_stylesheet() );
        $this->assertEquals( 'Blaze Commerce Child', $theme->get( 'Name' ) );
        $this->assertEquals( 'twentytwentyfive', $theme->get( 'Template' ) );
    }

    /**
     * Test theme version
     */
    public function test_theme_version() {
        $theme = $this->get_theme();
        $version = $theme->get( 'Version' );
        
        $this->assertNotEmpty( $version );
        $this->assertMatchesRegularExpression( '/^\d+\.\d+\.\d+$/', $version );
    }

    /**
     * Test that required theme functions exist
     */
    public function test_required_functions_exist() {
        $required_functions = array(
            'blaze_theme_enqueue_styles',
            'blaze_theme_register_required_plugins',
            'blaze_add_theme_support',
        );
        
        foreach ( $required_functions as $function ) {
            $this->assertTrue( 
                $this->function_exists( $function ), 
                "Required function '{$function}' should exist" 
            );
        }
    }

    /**
     * Test that styles are properly enqueued
     */
    public function test_styles_enqueued() {
        // Trigger the enqueue action
        do_action( 'wp_enqueue_scripts' );
        
        // Check that parent and child styles are enqueued
        $this->assertStyleEnqueued( 'blaze-commerce-style' );
        $this->assertStyleEnqueued( 'blaze-child-style' );
    }

    /**
     * Test that child theme depends on parent theme
     */
    public function test_child_theme_dependency() {
        do_action( 'wp_enqueue_scripts' );
        
        global $wp_styles;
        
        $child_style = $wp_styles->registered['blaze-child-style'];
        $this->assertContains( 'blaze-commerce-style', $child_style->deps );
    }

    /**
     * Test theme support features
     */
    public function test_theme_support() {
        // Trigger theme setup
        do_action( 'after_setup_theme' );
        
        // Check for core block patterns support
        $this->assertTrue( 
            current_theme_supports( 'core-block-patterns' ),
            'Theme should support core block patterns'
        );
    }

    /**
     * Test that TGM Plugin Activation is loaded
     */
    public function test_tgm_loaded() {
        $this->assertTrue( 
            class_exists( 'TGM_Plugin_Activation' ),
            'TGM Plugin Activation class should be loaded'
        );
    }

    /**
     * Test required plugins configuration
     */
    public function test_required_plugins() {
        // This would test the plugin configuration
        // We can't easily test the actual TGM functionality in unit tests
        // but we can verify the function exists and is hooked
        
        $this->assertTrue( 
            $this->is_hook_registered( 'tgmpa_register', 'blaze_theme_register_required_plugins' ),
            'Required plugins function should be hooked to tgmpa_register'
        );
    }

    /**
     * Test theme textdomain
     */
    public function test_textdomain() {
        $theme = $this->get_theme();
        $textdomain = $theme->get( 'TextDomain' );
        
        $this->assertEquals( 'blazecommerce-child', $textdomain );
    }

    /**
     * Test theme template hierarchy
     */
    public function test_template_files() {
        $theme_root = get_stylesheet_directory();
        
        // Check for important template files
        $template_files = array(
            'style.css',
            'functions.php',
            'theme.json',
        );
        
        foreach ( $template_files as $file ) {
            $this->assertFileExists( 
                $theme_root . '/' . $file,
                "Template file '{$file}' should exist"
            );
        }
    }

    /**
     * Test theme.json structure
     */
    public function test_theme_json() {
        $theme_root = get_stylesheet_directory();
        $theme_json_file = $theme_root . '/theme.json';
        
        $this->assertFileExists( $theme_json_file );
        
        $theme_json = json_decode( file_get_contents( $theme_json_file ), true );
        
        $this->assertIsArray( $theme_json );
        $this->assertArrayHasKey( 'version', $theme_json );
        $this->assertArrayHasKey( 'settings', $theme_json );
    }
}
