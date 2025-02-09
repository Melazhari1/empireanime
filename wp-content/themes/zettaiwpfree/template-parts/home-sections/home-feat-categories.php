<div class="slideout-heading">
	<div class="d-inline-block">	
		<h5 class="feat-categories-title-color"><?php echo get_field ('featured_categories_title', 'option') ; ?></h5>		
	</div>	
</div>

<?php $terms = get_field('select_featured_categories', 'option'); if( $terms ): ?>
				
<div class="row">	

	<div class="carousel w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "wrapAround": true }'>	
			
			<?php foreach( $terms as $term ): ?>
			
					<div class="<?php zettaiwp_cats_list_columns(); ?> py-3">

						<div class="feat-cat-wrap">							
							
							<a href="<?php echo get_term_link( $term ); ?>">
								
								<?php 
								$thumb_id = get_term_meta ( $term->term_id, 'thumbnail_staff', true ); 
								$taximg = wp_get_attachment_image($thumb_id, 'zettaiwp-img-16-9-small',  "", array('class' => 'img-fluid shadow-sm'));								 
								if ( $taximg != '' ) {
									echo $taximg;
								} else { 
									zettaiwp_default_img_placeholder();
								}; ?>						
								
								<div class="txt p-3">
									<h6><?php echo esc_attr ($term->name); ?></h6>
								</div>						
							
							</a>
							
						</div>	

					</div>
			
			<?php endforeach; ?>
			
	</div>
	
</div>

<?php endif; ?>