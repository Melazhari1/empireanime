<div class="mb-5">

	<h5><?php esc_html_e( 'Cast', 'zettaiwp' ); ?></h5>

	<div class="line my-3"></div>

	<?php 
	  // loop through the repeater
	  if (have_rows('actor_&_character_select')) {
		while (have_rows('actor_&_character_select')) {
		  the_row();
		  $term = get_sub_field('select_actor');
		  // I'm assuming that the taxonomy exists
		  // change next line if that's wrong
		  $taxonomy = 'characters_voice_actors';
		  $termbyid = get_term_by('id', get_sub_field('select_actor'), $taxonomy);
		  $term_link = get_term_link($term, $taxonomy);
		  // assuming you're returning image array
		  $thumb_id = get_term_meta ( $termbyid->term_id, 'thumbnail_staff', true ); 
		  $taximg = wp_get_attachment_image($thumb_id, 'thumbnail',  "", array('class' => 'img-fluid rounded-circle shadow-sm')); 
		  $defimage = get_template_directory_uri() .'/assets/img/placeholder.jpg';
		  ?>
			
			<div class="staff-row">
			
				<div class="staff-left">
					<a href="<?php echo get_term_link( $term ); ?>">						
						
						<?php if ( $taximg != '' ) {
							echo $taximg;
						} else { ?>
							<?php echo '<img src="'.$defimage.'" class="img-fluid rounded-circle shadow-sm" />'; ?>
						<?php } ?>
					
					</a>
				</div>
				
				<div class="staff-right">	
				
					<a href="<?php echo $term_link; ?>"><?php echo $termbyid->name; ?></a>
					<div class="character"><?php echo the_sub_field ('as_character'); ?></div>
					
				</div>
			
			</div>
			
		  <?php
		} // end while have rows
	  } // end have rows

	?>

</div>	