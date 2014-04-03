	<a class="next-section"></a>
	
	<footer>
		<div class="full-width">
			<div class="small-12 large-3 columns">Social Media</div>
			<div class="small-3 large-1 columns">Logo</div>
			<div class="small-9 large-8 columns"><?php the_field('footer_copy', 'option'); ?></div>
		</div>					
						
		<div id="copyright" class="small-12 columns">
			<p class="copy"><?php echo bloginfo('name'); ?> &copy; 2004 &dash; <?php echo date("Y");?>. All rights reserved. Branding &amp; website design by <a href="http://redchalkstudios.com/" title="Red Chalk Studios" target="_blank">Red Chalk Studios</a>.</p>
		</div>
	</footer>

	<?php wp_footer(); ?>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/gnmenu.js"></script>
	
	<!-- bxSlider Javascript file -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/jquery.fitvids.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bxslider.min.js"></script>
	
	<!-- Parallax Effect -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/stellar.min.js"></script>
	
	<!-- Waypoints Scripts -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/waypoints.min.js"></script>
		
	<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
	<script>
    	$(document).foundation();
	</script>
	
</body>

</html>
