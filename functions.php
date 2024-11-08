<?php

// Enqueue parent and child theme styles
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'blaze-commerce-style'; // Handle for the parent theme's stylesheet
    $theme = wp_get_theme();

    // Load the parent theme stylesheet
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(), // Add any parent theme dependencies here, if needed
        $theme->parent()->get('Version') // Use the parent theme's version for cache busting
    );

    // Load the child theme stylesheet
    wp_enqueue_style( 'custom-style', get_stylesheet_uri(),
        array( $parenthandle ), // Make the parent stylesheet a dependency
        $theme->get('Version') // This only works if "Version" is specified in the child theme's style header
    );
}
