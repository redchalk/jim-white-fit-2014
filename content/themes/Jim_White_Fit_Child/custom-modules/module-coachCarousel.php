<!-- Coach Carousel -->

<div class="small-12 large-12 coach-carousel">
	
	<h3><?php the_sub_field('headline'); ?></h3>	
	<ul class="<?php the_sub_field('slider_name') ?>">
	<?php	
		
		$total = get_sub_field('total_clients');			   
		$category = get_sub_field('category');
		
		$i = 1;
		
		$args = array(
			'post_type' => array( 'coaches'),
			'tax_query' => array(
				array(
					'taxonomy' => 'coach_category',
					'field' => 'slug',
					'terms' => array( $category )
				)
			)
		);
		$coaches = new WP_Query( $args );
		
		if( $coaches->have_posts() ) {
			while( $coaches->have_posts() ) :
			   
			   $coaches->the_post(); ?>
			   
			   <li>
			   	
			   	<div>
			   		<?php the_post_thumbnail(); ?>
			   		<h3><?php the_title(); ?></h3>
			     	<h4><?php the_sub_field('certifications'); //$employee_first_name = get_post_meta($child->ID, 'employee_first_name', true); $bio_picture = get_field('bio_picture' , $child->ID); ?></h4>
				</div>
			   		 
			   </li>
		
		<?php if($i == $total) {break;} else {$i++;}
			
			endwhile;
		
		} else {
			
			echo 'Oh oh! No Clients!';
		
		} 
		
		wp_reset_postdata();
		
		?>
	</ul>
	<div class="small-12 large-12"><a href="#">View all coaches</a></div>				
</div>