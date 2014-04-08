<!-- Client Slider -->

<div class="small-12 large-12">
	
	<h3><?php the_sub_field('headline'); ?></h3>	
	
	<?php 
				
		$post_type = 'clients';
		$post_category = 3; //get_sub_field('post_category'); //will need category id numbers
		$total_posts = get_sub_field('total_clients');
		$id = get_sub_field('slider_name');
												
		echo jwfns_client_carousel($post_type, $post_category, $total_posts, $id);					
					
		wp_reset_query();
					 
	?>
	
	<div class="small-12 large-12"><a href="#">View all success stories</a></div>				
</div>