<?php
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Product Types.
	 */

	$labels = [
		"name" => esc_html__( "Product Types", "b2btheme" ),
		"singular_name" => esc_html__( "Product Type", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Product Types", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_type", [ "product" ], $args );

	/**
	 * Taxonomy: Case Types.
	 */

	$labels = [
		"name" => esc_html__( "Case Types", "b2btheme" ),
		"singular_name" => esc_html__( "Case Type", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Case Types", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'case_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "case_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "case_type", [ "product" ], $args );

	/**
	 * Taxonomy: Illumination Distances.
	 */

	$labels = [
		"name" => esc_html__( "Illumination Distances", "b2btheme" ),
		"singular_name" => esc_html__( "Illumination Distance", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Illumination Distances", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'illumination_distance', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "illumination_distance",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "illumination_distance", [ "product" ], $args );

	/**
	 * Taxonomy: Lens Types.
	 */

	$labels = [
		"name" => esc_html__( "Lens Types", "b2btheme" ),
		"singular_name" => esc_html__( "Lens Type", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Lens Types", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'lens_type', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "lens_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "lens_type", [ "product" ], $args );

	/**
	 * Taxonomy: Power Supplies.
	 */

	$labels = [
		"name" => esc_html__( "Power Supplies", "b2btheme" ),
		"singular_name" => esc_html__( "Power Supply", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Power Supplies", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'power_supply', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "power_supply",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "power_supply", [ "product" ], $args );

	/**
	 * Taxonomy: Protection Levels.
	 */

	$labels = [
		"name" => esc_html__( "Protection Levels", "b2btheme" ),
		"singular_name" => esc_html__( "Protection Level", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Protection Levels", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'protection_level', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "protection_level",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "protection_level", [ "product" ], $args );

	/**
	 * Taxonomy: Resolutions.
	 */

	$labels = [
		"name" => esc_html__( "Resolutions", "b2btheme" ),
		"singular_name" => esc_html__( "Resolution", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Resolutions", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'resolution', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "resolution",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "resolution", [ "product" ], $args );

	/**
	 * Taxonomy: Storages.
	 */

	$labels = [
		"name" => esc_html__( "Storages", "b2btheme" ),
		"singular_name" => esc_html__( "Storage", "b2btheme" ),
	];

	
	$args = [
		"label" => esc_html__( "Storages", "b2btheme" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'storage', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "storage",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "storage", [ "product" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
?>