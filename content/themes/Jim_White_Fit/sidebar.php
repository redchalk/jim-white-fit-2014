<aside id="sidebar">
	<?php wp_list_pages(); ?>
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    

	
	<?php endif; ?>

</aside><!-- end #sidebar -->