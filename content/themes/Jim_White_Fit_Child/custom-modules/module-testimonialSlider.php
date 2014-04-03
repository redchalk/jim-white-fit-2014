<!-- Testimonial Slider -->

<div class="small-12 large-12">
	
	<h3><?php the_sub_field('headline'); ?></h3>
	<h6><?php the_sub_field('subheadline'); ?></h6>	
		
	<?php 
				
		$post_type = 'testimonials';
		$post_category = 14; //get_sub_field('post_category'); //will need category id numbers
		$total_posts = get_sub_field('total_testimonials');
		$id = get_sub_field('slider_name');
												
		echo jwfns_testimonial_carousel($post_type, $post_category, $total_posts, $id);					
					
		wp_reset_query();
					 
	?>	
	
	<div class="small-12 large-12"><a href="#">Tell us about your experience!</a></div>				
</div>