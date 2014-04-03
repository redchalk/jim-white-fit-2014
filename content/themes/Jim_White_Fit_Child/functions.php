<?php

/* Scripts for Foundation */
function responsive_scripts_basic()
{
	// Load First
	wp_register_script('foundation-jquery', get_bloginfo('stylesheet_directory') . '/js/vendor/jquery.js', true );
	wp_register_script('foundation-min', get_bloginfo('stylesheet_directory') . '/js/foundation.min.js', true );
	wp_register_script('foundation-zepto', get_bloginfo('stylesheet_directory') . '/js/vendor/zepto.js', true );

	//register scripts for our theme	
	wp_register_script('foundation-abide', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.abide.js', true );
	wp_register_script('foundation-alert', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.alerts.js', true );
	wp_register_script('foundation-clearing', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.clearing.js', true );
	wp_register_script('foundation-dropdown', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.dropdown.js', true );
	wp_register_script('foundation-interchange', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.interchange.js', true );
	wp_register_script('foundation-joyride', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.joyride.js', true );
	wp_register_script('foundation-main', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.js', true );
	wp_register_script('foundation-magellan', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.magellan.js', true );
	wp_register_script('foundation-orbit', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.orbit.js', true );
	wp_register_script('foundation-reveal', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.reveal.js', true );
	wp_register_script('foundation-tooltip', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.tooltips.js', true );
	wp_register_script('foundation-topbar', get_bloginfo('stylesheet_directory') . '/js/foundation/foundation.topbar.js', true );
	
	wp_register_script('custom-modernizr', get_bloginfo('stylesheet_directory') . '/js/vendor/custom.modernizr.js', true );
	
	wp_register_script('custom-nav', get_bloginfo('stylesheet_directory') . '/js/jquery.meanmenu.js', true );
	
	wp_register_script('custom-custom', get_bloginfo('stylesheet_directory') . '/js/custom.js', true );
	
	wp_enqueue_script( 'foundation-jquery' );
	wp_enqueue_script( 'foundation-min' );
	wp_enqueue_script( 'foundation-zepto' );
	
	wp_enqueue_script( 'foundation-abide' );
	wp_enqueue_script( 'foundation-alert' );
	wp_enqueue_script( 'foundation-clearing' );
	wp_enqueue_script( 'foundation-dropdown' );
	wp_enqueue_script( 'foundation-interchange' );
	wp_enqueue_script( 'foundation-joyride' );
	wp_enqueue_script( 'foundation-main' );
	wp_enqueue_script( 'foundation-magellan' );
	wp_enqueue_script( 'foundation-orbit' );
	wp_enqueue_script( 'foundation-reveal' );
	wp_enqueue_script( 'foundation-tooltip' );
	wp_enqueue_script( 'foundation-topbar' );
	
	wp_enqueue_script( 'custom-modernizr' );
	
	wp_enqueue_script( 'custom-nav' );
	
	wp_enqueue_script( 'custom-custom' );
	
}
add_action( 'wp_enqueue_scripts', 'responsive_scripts_basic', 5 );

/* Foundation stylesheets */
function responsive_styles()
{
	//register styles for our theme
	wp_register_style( 'my-styles', get_bloginfo('stylesheet_directory') . '/css/custom-style.css', array(), 'all' );
	wp_register_style( 'my-nav', get_bloginfo('stylesheet_directory') . '/css/meanmenu.css', array(), 'all' );
	wp_register_style( 'foundation-style', get_bloginfo('stylesheet_directory') . '/css/foundation.css', array(), 'all' );
	wp_register_style( 'grid-5--style', get_bloginfo('stylesheet_directory') . '/css/grid-5.css', array(), 'all' );
	wp_register_style( 'normalize', get_bloginfo('stylesheet_directory') . '/css/normalize.css', array(), 'all' );
	
	wp_enqueue_style( 'my-styles' );
	wp_enqueue_style( 'my-nav' );
	wp_enqueue_style( 'foundation-style' );
	wp_enqueue_style( 'grid-5--style' );
	wp_enqueue_style( 'normalize' );
}
add_action( 'wp_enqueue_scripts', 'responsive_styles' );
 
//Register Options Pages
add_filter('acf/options_page/settings', 'os_acf_options_page_settings');

	function os_acf_options_page_settings( $settings )	{
		$settings['title'] = 'Theme Options';
		$settings['pages'] = array('Header', 'Sidebar', 'Footer');
	 
		return $settings;
	}
 
// Menus
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'secondary-menu' => __( 'Secondary Menu' )
        )
    );
}

// Custom Walker Nav Menu
class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }
  
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = ''; 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }
    
    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }
    
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}		

/* --- [Registering Custom Menus] --- */

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'brand-bar' => __( 'Brand Bar' ),
			'social-bar' => __( 'Social Bar' )
		)
	);
}
?>