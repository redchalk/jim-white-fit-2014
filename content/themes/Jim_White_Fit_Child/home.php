<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<!-- <div id="bump"></div> -->
			<div class="entry">

				<?php the_content(); 
										
					// Determines if page has any custom modules
					if( have_rows('custom_modules') ):
					
						//Access main module template file
						get_template_part('custom-modules/module','index');
					
					endif;					
				?>
				
			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>