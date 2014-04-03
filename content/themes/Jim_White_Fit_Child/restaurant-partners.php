<?php
/*
Template Name: Restaurant Partners
*/
?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>			
		
		<div id="<?php the_field('add_class'); ?>" class="parallax" data-stellar-background-ratio="<?php the_field('scroll_speed'); ?>" style="background-image:url(<?php the_field('background_image'); ?>);">
	
			<div class="row">
				<div class="small-12 large-6 columns">
					<h6><?php the_field('page_parent'); ?></h6>
					<h2><?php the_field('parallax_header'); ?></h2>
				</div>	
				<div class="small-12 large-6 columns">	
					<?php the_field('parallax_content'); ?>
				</div>
			</div>		
	
		</div>
		
		<h2><?php the_title(); ?></h2>
		
		<div class="full-width restaurant-nav">			
		<?php 
			$restaurants = new WP_Query( array( 'post_type' => array( 'restaurants'), 'orderby'=> 'title', 'order' => 'ASC', 'posts_per_page'=>-1) );
			if( $restaurants->have_posts() ) : ?>			
				
				<?php $i=1; ?>
										
				<?php while( $restaurants->have_posts() ) :
						   
					$restaurants->the_post(); ?>						   	
						   	
						<div class="small-6 medium-4 large-3 columns" data-slide="<?php echo $i ?>" > 
							<a href="#" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</div>
						
						<?php $i++; ?>
				<?php endwhile; ?>			
			<?php endif; 
				
				wp_reset_postdata();
				
			?>								
		</div>
						
		<h2>Jim White Approved Menu Items</h2>
		
		<div class="full-width restaurant-toggle">			
						
				<?php $i=1; ?>
				
				<?php while( $restaurants->have_posts() ) :
						   
					$restaurants->the_post(); ?>						   	
						   	
						<div class="accordion-toggle small-12 large-12 columns" data-slide="<?php echo $i ?>">
							<div class="large-2 columns">
								<h6><?php the_title(); ?></h6>
							</div>
															
							<div class="d address large-4 columns">
								<?php if( have_rows('location')): ?>			
									<?php while ( have_rows('location') ) : the_row(); ?>
										<p><?php the_sub_field('address'); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
								
							<div class="d phone large-4 columns">
								<?php if( have_rows('contact')): ?>			
									<?php while ( have_rows('contact') ) : the_row(); ?>
										<p><?php the_sub_field('phone'); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
								
							<div class="d facebook large-2 columns"> 					
								<a href="https://facebook.com/<?php the_field('facebook_slug'); ?>" target="_blank">Like us!</a>
							</div>
						</div>																							
																	
						<div class="information" style="display:none;">
							<div class="full-width small-12 large-12 columns">
								
								<div class="m address row">
									<?php if( have_rows('location')): ?>			
										<?php while ( have_rows('location') ) : the_row(); ?>
											<p><?php the_sub_field('address'); ?></p>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								
								<div class="m phone row">
									<?php if( have_rows('contact')): ?>			
									<?php while ( have_rows('contact') ) : the_row(); ?>
										<p><?php the_sub_field('phone'); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>
								</div>
									
								<div class="m facebook row">
									<a href="https://facebook.com/<?php the_field('facebook_slug'); ?>" target="_blank">Like us!</a>
								</div>
								
								<div class="row">
								<?php if( have_rows('menu_items')): ?>			
									<?php while ( have_rows('menu_items') ) : the_row(); ?>
										<div class="small-12 large-4 columns menu end">
											<h5><?php the_sub_field('food_category'); ?></h5>
											<?php if( have_rows('menu_list')): ?>			
												<?php while ( have_rows('menu_list') ) : the_row(); ?>
													<h6><?php the_sub_field('item_name'); ?></h6>
													<p><?php the_sub_field('item_description'); ?></p>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>	
									<?php endwhile; ?>
								<?php endif; ?>
								</div>
							</div>	
						</div><!-- End information -->
						
						<?php $i++; ?>									
				
				<?php endwhile; 
					
	
					
				?>	
		</div>
		
		<div class="entry">

				<?php the_content(); 

					// Determines if page has any custom modules
					if( have_rows('custom_modules') ):
					
						//Access main module template file
						get_template_part('custom-modules/module','index');
						
					endif;
					
				?>		

		</div>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
