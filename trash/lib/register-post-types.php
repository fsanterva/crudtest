<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Products.
	 */

	$labels = [
		"name" => esc_html__( "Products", "b2btheme" ),
		"singular_name" => esc_html__( "Product", "b2btheme" ),
	];

	$args = [
		"label" => esc_html__( "Products", "b2btheme" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => true,
		"rewrite" => [ "slug" => "product", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-products",
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "product_type" ],
		"show_in_graphql" => false,
	];

	register_post_type( "product", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

?>