<!-- Main Custom Module loop -->
<?php while ( have_rows('custom_modules') ) : the_row();

	 if( get_row_layout() == 'parallax_section' ):
       	
       	//Get Parallax Section Module -> module-parallax.php
       	get_template_part('custom-modules/module', 'parallax');
     
     elseif( get_row_layout() == 'content_slider' ): 
       	
       	//Get bxSlider Module -> module-bxslider.php
       	get_template_part('custom-modules/module', 'bxslider');
     
     elseif( get_row_layout() == 'client_slider' ): 
       	
       	//Get Client Slider Module -> module-clientSlider.php
       	get_template_part('custom-modules/module', 'clientSlider');
       	
     elseif( get_row_layout() == 'testimonial_slider' ): 
       	
       	//Get Testimonials Slider Module -> module-testimonialSlider.php
       	get_template_part('custom-modules/module', 'testimonialSlider');
       	
     elseif( get_row_layout() == 'coach_carousel' ): 
       	
       	//Get Coach Carousel Module -> module-coachCarousel.php
       	get_template_part('custom-modules/module', 'coachCarousel');
       	
     elseif( get_row_layout() == 'events_carousel' ): 
       	
       	//Get Coach Carousel Module -> module-coachCarousel.php
       	get_template_part('custom-modules/module', 'eventCarousel');
       	
     elseif( get_row_layout() == 'instagram' ): 
       	
       	//Get Client Slider Module -> module-clientSlider.php
       	get_template_part('custom-modules/module', 'instagram');
       	
     elseif( get_row_layout() == 'accordion' ): 
       	
       	//Get Accordion Module -> module-accordion.php
       	get_template_part('custom-modules/module', 'accordion');  	
       	
     elseif( get_row_layout() == 'get_started' ): 
       	
       	//Get Grid 2 Module -> module-grid2.php
       	get_template_part('custom-modules/module', 'getStarted');
     
     elseif( get_row_layout() == 'grid_2' ): 
       	
       	//Get Grid 2 Module -> module-grid2.php
       	get_template_part('custom-modules/module', 'grid2');
     
     elseif( get_row_layout() == 'grid_4' ): 
       	
       	//Get Grid 4 Module -> module-grid4.php
       	get_template_part('custom-modules/module', 'grid4');
     
     endif;

endwhile; ?>