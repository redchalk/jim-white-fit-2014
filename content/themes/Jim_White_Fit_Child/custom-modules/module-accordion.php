<!-- Accordion Section -->
<div class="full-width <?php the_sub_field('add_class') ?>">
	<div class="small-12 large-12 large-centered  accordion <?php the_sub_field('add_class') ?>">
		<?php if( have_rows('accordion_info')): ?>			
			
			<?php while ( have_rows('accordion_info') ) : the_row(); ?>
					
				<div class="accordion-toggle">			
					<h4><?php the_sub_field('toggle'); ?></h4>					
				</div>
								
				<div class="information" style="display:none;">
					<?php echo the_sub_field('info_text'); ?>
				</div>
					
			<?php endwhile; ?>
		<?php endif; ?>
	</div>	
</div>	