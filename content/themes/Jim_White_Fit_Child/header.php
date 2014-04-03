<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><html class="no-js"> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<!-- Customize Page Tab Titles -->
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<!-- Stylesheets -->
	<!--[if (lt IE 9) & (!IEMobile)]>
    	<link href="<?php get_stylesheet_directory_uri(); ?>/css/no-mq.css" rel="stylesheet">
	<![endif]-->

	<!--[if (gte IE 9) | (IEMobile)]><!-->
    	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/mq.css" rel="stylesheet">
	<!--<![endif]-->
		
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php if ( is_user_logged_in() ) { ?>
		<!-- Moves WPAdmin Bar below fixed menu -->
		<!--<style type="text/css">@media screen and (min-width:769px) {#wpadminbar{top: 68px !important;}}</style>-->
	<?php } // end if ?>
	
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="header">		
		<div id="bb">
			<?php wp_nav_menu( array( 'theme_location' => 'brand-bar' ) ); ?>			
		</div>
			
		<ul id="gn-menu" class="gn-menu-main">
			<li class="gn-trigger">
				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
				<nav class="gn-menu-wrapper">
					<div class="gn-scroller">
						<ul class="gn-menu">							
							<li><a class="gn-icon gn-icon-help">LET'S GET STARTED</a></li>
							<li><a class="gn-icon gn-icon-help">REALLY TRULY FIT</a></li>
							<li>
								<a class="gn-icon gn-icon-download">OUR PROGRAMS</a>
								<ul class="gn-submenu">
									<li><a class="gn-icon gn-icon-download">FITNESS PACKAGES &amp; SERVICES</a></li>
									<li><a class="gn-icon gn-icon-download">FITNESS BOOTCAMPS</a></li>
									<li><a class="gn-icon gn-icon-download">NUTRITION PACKAGES</a></li>
									<li><a class="gn-icon gn-icon-download">NUTRITION BOOTCAMP</a></li>
									<li><a class="gn-icon gn-icon-download">JW WORKPLACE WELLNESS</a></li>
									<li><a class="gn-icon gn-icon-download">JW APPROVED RESTAURANT MENUS</a></li>
									<li><a class="gn-icon gn-icon-download">ACE CERTIFICATION</a></li>
								</ul>
							</li>
							<li><a class="gn-icon gn-icon-cog">OUR IMPACT</a></li>
							<li><a class="gn-icon gn-icon-download">EVENT CALENDAR</a></li>
							<li><a class="gn-icon gn-icon-download">OUR LOCATIONS</a></li>
							<li><a class="gn-icon gn-icon-help">SUPPORT</a></li>
						</ul>
					</div>
				</nav>
			</li>
			<li><a id="logo" href="<?php echo site_url(); ?>"><img id="logo-text" src="<?php echo get_stylesheet_directory_uri(); ?>/img/jwfns-logo-text.png"  width="70" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/jwfns-logo-img.png" width="40" /></a></li>
			<li id="tagline"><a href="#">Getting You Really truly fit &trade;</a></li>
			
			<?php if(!is_front_page()) : ?>
			
				<li><a id="page-title-menu" href="#"><? the_title(); ?></a>
					<ul class="child-submenu">
					<?php 
					 
					 		if ((is_page() && $post->post_parent )):
					 		
					 			$args = array(
											'post_parent' => $post->post_parent,
											'post_type'   => 'page'
										);					 		
					 		else:
					 		
						 		$args = array(
											'post_parent' => $post->ID,
											'post_type'   => 'page'
										);						  
							endif; 
							
								// Get the page's children  
								$children = get_children($args);  
								
								if (!empty($children)) {   
									  
									foreach($children as $child) {  
													
										$page_title = get_the_title($child->ID);
										$permalink = get_permalink($child->ID);
									
										echo '<li><a href=' . $permalink . '>' . $page_title . '</a></li>';
									}    
								} ?>						
					</ul>
				</li>
				
				<li><a id="section-title-menu" href="#">Section Title</a>
					<ul class="section-submenu">
						<li><a class="">Section Title 1</a></li>
						<li><a class="">Section Title 2</a></li>
						<li><a class="">Section Title 3</a></li>
						<li><a class="">Section Title 4</a></li>
						<li><a class="">Section Title 5</a></li>
					</ul>
				</li>
			
			<?php endif; ?>
			
			<li id="jwfns-social"><a id="social-menu-toggle" href="#">+</a></li>
		</ul>
		
		<!-- Site Wide Alert Here -->
		<? $alert = get_field('add_alert', 'option'); ?>		
		<?php if ($alert == 1): ?>		
			<div id="site-alert" style="background-color:#<?php the_field('alert_color', 'option'); ?>;">
				<p><?php echo the_field('alert_copy','option'); ?></p>
			</div>		
		<?php endif; ?>
		
		<div id="social-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'social-bar' ) ); ?>			
		</div>							
	</div>