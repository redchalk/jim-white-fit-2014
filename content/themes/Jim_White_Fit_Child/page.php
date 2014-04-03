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
		
		<section class="post" id="post-<?php the_ID(); ?>">
			
			<!--<div id="bump"></div>-->

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<article class="entry">

				<?php the_content(); 

					// Determines if page has any custom modules
					if( have_rows('custom_modules') ):
					
						//Access main module template file
						get_template_part('custom-modules/module','index');
						
					endif;
					
				?>		

			</article>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</section>
		
		<?php //comments_template(); ?>

		<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
