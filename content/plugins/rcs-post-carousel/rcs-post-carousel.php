<?php

/*
Plugin Name: RCS Post Carousel
Description: jQuery post slider
Author: Red Chalk Studios
Version: 0.0
Author URI: http://redchalkstudios.com
*/

global $wpdb, $wp_version;

function jwfns_client_carousel(&$post_type, &$post_category, &$total_posts, &$id)
{
	global $wpdb;
	
	//Image slider
	global $post;

	$slider_gallery .= '<ul class="' . $id .'">';

	$args = array( 'numberposts' => $total_posts, 'post_type' => $post_type );
	$myposts = get_posts( $args );
	
	foreach( $myposts as $post ) {

		$post_title = $post->post_title;
		$post_content = $post->post_content;
		$pic = get_the_post_thumbnail();
		
		$slider_gallery .= '<li>';
		
		$slider_gallery .= '<div class="success-bio">';
		$slider_gallery .= '<h2>Meet ' . $post_title . '</h2>';
		$slider_gallery .= '<div class="client-excerpt">';
		$slider_gallery .= $post_content;
		$slider_gallery .= '</div>';
		$slider_gallery .= '</div>';
		
		$slider_gallery .= '<div class="success-pic">';
		$slider_gallery .= $pic;
		$slider_gallery .= '</div>';	
		
		$slider_gallery .= '</li>';
	}		
	
	$slider_gallery .= '</ul>';		
	
	return $slider_gallery;
}
add_action('init', 'jwfns_client_carousel');

function jwfns_testimonial_carousel(&$post_type, &$post_category, &$total_posts, &$id)
{
	global $wpdb;
	
	//Image slider
	global $post;

	$slider_gallery.='<ul class="' . $id .'">';

	$args = array( 
				'numberposts' => $total_posts, 'post_type' => $post_type, 
				'tax_query' => array(
					array(
						'taxonomy' => 'testimonials_category',
						'field' => 'slug',
						'terms' => 'restuarants'
						)
			) 
	);
	
	$myposts = get_posts( $args );
	
	foreach( $myposts as $post ) {

		$post_content = $post->post_content;
					
		$slider_gallery .= '<li>';
		$slider_gallery .= '<p>' . $post_content . '</p>';		
		$slider_gallery .= '</li>';
	}		
	$slider_gallery .= '</ul>';

	return $slider_gallery;
}
add_action('init', 'jwfns_testimonial_carousel');
?>