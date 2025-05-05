<?php

/**
 * make blaze commerce gallery to grid
 */
add_filter( 'blazecommerce/settings/product', function ($settings) {

	// We make the product gallery to grid layout
	$settings['productGallery']['isGrid'] = true;

	return $settings;
}, 10, 1 );

/**
 * Fix blazecommerce gf form not showing properly
 */
add_filter( 'graphql_gf_ignored_field_types', function ($ignored_fields) {
	$ignored_fields = [ 
		'donation', // These fields are no longer supported by GF.
		'repeater', // This still in beta.
		// 'submit', // This is not technically a form field.
	];

	return $ignored_fields;

}, 10, 1 );

/**
 *  Disable the default Gutenberg page template in Blaze Commerce
 */
// add_action( 'blazecommerce/collection/page/typesense_data', function ($data, $page) {

// 	if ( $data['slug'] === 'contact' ) {
// 		$data['template'] = '';
// 	}
// 	return $data;
// }, 10, 2 );