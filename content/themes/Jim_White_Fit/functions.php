<?php
	
// Provides an excerpt of blog posts, limited to $word_limit count. -Will	
	function string_limit_words($string, $word_limit)
			{
			  $words = explode(' ', $string, ($word_limit + 1));
			  if(count($words) > $word_limit)
			  array_pop($words);
			  return implode(' ', $words);
			}

/* Thumbnail Support */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );  
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 ); 
function remove_thumbnail_dimensions( $html ) {     
$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );     
return $html; }

 
// Feature Image Support
add_theme_support('post-thumbnails');		


// Adds classes to first and last item in list of wp_list_pages
function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
  $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

	
// Get the page slug use this to call it:  echo the_slug();
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; }

// Add RSS links to <head> section
	automatic_feed_links();
	
// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
//Register Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2>',
    	'after_title'   => '</h2>'
    ));
}


// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS
   function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
   }
   add_action('admin_menu', 'all_settings_link');

// ADDING JQUERY
		// smart jquery inclusion 
				add_action( 'init', 'jquery_register' );
				add_filter( 'script_loader_src', 'jquery_unversion' );

				// register from google and for footer
				function jquery_register() {

				if ( !is_admin() ) {

					wp_deregister_script( 'jquery' );
					wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, '1.x', false );
					wp_enqueue_script( 'jquery' );
				}
				}

				// remove version tag to improve cache compatibility
				function jquery_unversion( $src ) {

				if( strpos( $src, 'ajax.googleapis.com' ) )
					$src = remove_query_arg( 'ver', $src );

				return $src;
				}

// Create Google Maps shortcode
//Google Maps Shortcode
function fn_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '250',
      "height" => '250',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed&amp;iwloc=&amp;"></iframe>';
}
add_shortcode("googlemap", "fn_googleMaps");


// REMOVE META BOXES FROM DEFAULT POSTS SCREEN (uncomment as desired)
   function remove_default_post_screen_metaboxes() {
 //remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
 //remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
 //remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
 //remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
 //remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
 //remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
 }
   add_action('admin_menu','remove_default_post_screen_metaboxes');


// REMOVE META BOXES FROM DEFAULT PAGES SCREEN (uncomment as desired)
   function remove_default_page_screen_metaboxes() {
// remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
// remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
// remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
// remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
// remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
// remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
 }
   add_action('admin_menu','remove_default_page_screen_metaboxes');


/*
Custom CSS styles on WYSIWYG Editor – Start
======================================= */

// Add body class to Visual Editor to match class used live. Requires .post in theme files!
function mytheme_mce_settings( $initArray ){
 $initArray['body_class'] = 'post';
 return $initArray;
}
add_filter( 'tiny_mce_before_init', 'mytheme_mce_settings' );

/* Custom CSS styles on WYSIWYG Editor – End
======================================= 
*/

?>
