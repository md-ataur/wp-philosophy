<?php
/*
Plugin Name: Philosophy Companion
Plugin URI: 
Description: CPT plugin for philosophy
Version: 1.0
Author: Ataur
Author URI: 
License: GPL2
Text Domain: philosophy-companion
*/

function philosophy_register_cpts() {

	/**
	 * Post Type: Books.
	 */

	$labels = array(
		"name" => __( "Books", "philosophy" ),
		"singular_name" => __( "Book", "philosophy" ),
		"featured_image" => __( "Book Cover Image", "philosophy" ),
	);

	$args = array(
		"label" => __( "Books", "philosophy" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "books",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "book", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "post-formats" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "book", $args );
}
add_action( 'init', 'philosophy_register_cpts' );


function philosophy_register_my_taxes() {

	/**
	 * Taxonomy: Languages.
	 */

	$labels = array(
		"name" => __( "Languages", "philosophy" ),
		"singular_name" => __( "Language", "philosophy" ),
	);

	$args = array(
		"label" => __( "Languages", "philosophy" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'language', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "language",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "language", array( "book" ), $args );
}
add_action( 'init', 'philosophy_register_my_taxes' );

