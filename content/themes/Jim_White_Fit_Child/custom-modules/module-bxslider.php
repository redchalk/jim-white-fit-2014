<!-- bxslider -->

<div class="row">
	<div class="small-12 large-11 large-centered small-centered columns">
		<ul class="<?php the_sub_field('slider_name') ?>">
		    
		  <?php if( have_rows('content_item') ):
		 
		 	// loop through the rows of data
		    while ( have_rows('content_item') ) : the_row();
		       	    
			    $content = get_sub_field('content_type');
		        
		        echo "<li>";
		        
		        switch ($content) {
			        case "image":
			           	
			           	$img_title = get_sub_field('image_caption');
			            $img_alt = get_sub_field('image_caption');
			            $img_url = get_sub_field('image');	            
			            
			            echo "<img title='" . $img_title . "' alt='" . $img_alt . "' src='" . $img_url . "'/>";
			           	
			            break;
			        default:
			            
			            $video_iframe = get_sub_field('video');	            	            
			            echo $video_iframe;	            	            
				}
				
				echo "</li>";
		 
		    endwhile;
			else :
		    	// no rows found
		 	endif;?>
		</ul>
	</div>
</div>