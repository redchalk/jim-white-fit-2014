<?php
   /*
   Plugin Name: RCS Custom Post Types
   Plugin URI: http://redchalkstudios.com
   Description: Plugin to register custom post types
   Version: 0
   Author: Red Chalk Studios
   Author URI: http://redchalkstudios.com
   License: GPL2
   */
 
// Creates Clients post type
function custom_post_clients() {

	$labels = array(
		'name'               => _x( 'Clients', 'post type general name' ),
		'singular_name'      => _x( 'Client', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'client' ),
		'add_new_item'       => __( 'Add New Client' ),
		'edit_item'          => __( 'Edit Client' ),
		'new_item'           => __( 'New Client' ),
		'all_items'          => __( 'All Clients' ),
		'view_item'          => __( 'View Client' ),
		'search_items'       => __( 'Search Clients' ),
		'not_found'          => __( 'No clients found' ),
		'not_found_in_trash' => __( 'No clients found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Clients'
	);
		
	$args = array(
		'labels'        => $labels,
		'description'   => 'The various JWFNS success stories!',
		'public'        => true,
		'menu_position' => 5,
		'taxonomies' => array('client_category'),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive'   => true,
		'query_var' => true,
	);

	register_post_type('clients', $args );
}		

add_action('init', 'custom_post_clients');

function custom_taxonomies_clients() {
	$labels = array(
		'name'              => _x( 'Client Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Client Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Client Categories' ),
		'all_items'         => __( 'All Client Categories' ),
		'parent_item'       => __( 'Parent Client Category' ),
		'parent_item_colon' => __( 'Parent Client Category:' ),
		'edit_item'         => __( 'Edit Client Category' ), 
		'update_item'       => __( 'Update Client Category' ),
		'add_new_item'      => __( 'Add New Client Category' ),
		'new_item_name'     => __( 'New Client Category' ),
		'menu_name'         => __( 'Client Categories' )
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'client_category', 'clients', $args );
}
add_action( 'init', 'custom_taxonomies_clients', 0 );

// Creates Coaches post type ------------------------------------------------------- /

function custom_post_coaches() {

	$labels = array(
		'name'               => _x( 'Coaches', 'post type general name' ),
		'singular_name'      => _x( 'Coach', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'coach' ),
		'add_new_item'       => __( 'Add New Coach' ),
		'edit_item'          => __( 'Edit Coach' ),
		'new_item'           => __( 'New Coach' ),
		'all_items'          => __( 'All Coaches' ),
		'view_item'          => __( 'View Coach' ),
		'search_items'       => __( 'Search Coaches' ),
		'not_found'          => __( 'No coaches found' ),
		'not_found_in_trash' => __( 'No coaches found in the trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Coaches'
	);
		
	$args = array(
		'labels'        => $labels,
		'description'   => 'The various JWFNS trainers!',
		'public'        => true,
		'menu_position' => 6,
		'taxonomies' => array('coaches_category'),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive'   => true,
		'query_var' => true
	);

	register_post_type('coaches', $args );
}		

add_action('init', 'custom_post_coaches');

function custom_taxonomies_coaches() {
	$labels = array(
		'name'              => _x( 'Coach Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Coach Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Coach Categories' ),
		'all_items'         => __( 'All Coach Categories' ),
		'parent_item'       => __( 'Parent Coach Category' ),
		'parent_item_colon' => __( 'Parent Coach Category:' ),
		'edit_item'         => __( 'Edit Coach Category' ), 
		'update_item'       => __( 'Update Coach Category' ),
		'add_new_item'      => __( 'Add New Coach Category' ),
		'new_item_name'     => __( 'New Coach Category' ),
		'menu_name'         => __( 'Coach Categories' )
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'coach_category', 'coaches', $args );
}
add_action( 'init', 'custom_taxonomies_coaches', 0 );

// Creates Testimonials post type ------------------------------------------------------- /

function custom_post_testimonials() {

	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'testimony' ),
		'add_new_item'       => __( 'Add New Testimony' ),
		'edit_item'          => __( 'Edit Testimony' ),
		'new_item'           => __( 'New Testimony' ),
		'all_items'          => __( 'All Testimonies' ),
		'view_item'          => __( 'View Testimony' ),
		'search_items'       => __( 'Search Testimonies' ),
		'not_found'          => __( 'No testimonies found' ),
		'not_found_in_trash' => __( 'No testimonies found in the trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
		
	$args = array(
		'labels'        => $labels,
		'description'   => 'Nice testimonials about JWFNS!',
		'public'        => true,
		'menu_position' => 7,
		'taxonomies' => array('testimonials_category'),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive'   => true,
		'query_var' => true
	);

	register_post_type('testimonials', $args );
}		

add_action('init', 'custom_post_testimonials');

function custom_taxonomies_testimonials() {
	$labels = array(
		'name'              => _x( 'Testimonials Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Testimonial Categories' ),
		'all_items'         => __( 'All Testimonial Categories' ),
		'parent_item'       => __( 'Parent Testimonial Category' ),
		'parent_item_colon' => __( 'Parent Testimonial Category:' ),
		'edit_item'         => __( 'Edit Testimonial Category' ), 
		'update_item'       => __( 'Update Testimonial Category' ),
		'add_new_item'      => __( 'Add Testimonial Category' ),
		'new_item_name'     => __( 'New Testimonial Category' ),
		'menu_name'         => __( 'Testimonial Categories' )
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'testimonials_category', 'testimonials', $args );
}
add_action( 'init', 'custom_taxonomies_testimonials', 0 );

// Creates Restaurant Partner Post Types ------------------------------------------------------- /

function custom_post_restaurants() {

	$labels = array(
		'name'               => _x( 'Restaurants', 'post type general name' ),
		'singular_name'      => _x( 'Restaurant', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Restaurant' ),
		'add_new_item'       => __( 'Add New Restaurant' ),
		'edit_item'          => __( 'Edit Restaurants' ),
		'new_item'           => __( 'New Restaurant' ),
		'all_items'          => __( 'All Restaurants' ),
		'view_item'          => __( 'View Restaurants' ),
		'search_items'       => __( 'Search Restaurants' ),
		'not_found'          => __( 'No Restaurants Found' ),
		'not_found_in_trash' => __( 'No restaurants found in the trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Restaurants'
	);
		
	$args = array(
		'labels'        => $labels,
		'description'   => 'Partners of the JWFNS restaurant program!',
		'public'        => true,
		'menu_position' => 8,
		'taxonomies' => array('restaurant_category'),
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'query_var' => true
	);

	register_post_type('restaurants', $args );
}		

add_action('init', 'custom_post_restaurants');

function custom_taxonomies_restaurants() {
	$labels = array(
		'name'              => _x( 'Restaurant Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Restaurant Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Restaurant Categories' ),
		'all_items'         => __( 'All Restaurant Categories' ),
		'parent_item'       => __( 'Parent Restaurant Category' ),
		'parent_item_colon' => __( 'Parent Restaurant Category:' ),
		'edit_item'         => __( 'Edit Restaurant Category' ), 
		'update_item'       => __( 'Update Restaurant Category' ),
		'add_new_item'      => __( 'Add Restaurant Category' ),
		'new_item_name'     => __( 'New Restaurant Category' ),
		'menu_name'         => __( 'Restaurant Categories' )
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'restaurant_category', 'restaurants', $args );
}
add_action( 'init', 'custom_taxonomies_restaurants', 0 ); ?>