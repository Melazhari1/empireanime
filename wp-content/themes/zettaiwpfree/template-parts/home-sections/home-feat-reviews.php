<div class="slideout-heading">
			
	<div class="d-inline-block">	
		<h5 class="feat-reviews-title-color"><?php echo get_field ('featured_reviews_title', 'option') ; ?></h5>		
	</div>
		
	<?php if ( 1 == get_field('see_all_reviews_button', 'option') ) : ?>
		
		<?php 
		$link = get_field('all_reviews_link', 'option');
		if( $link ): ?>
			<div class="home-va-btn">
			<a href="<?php echo esc_url( $link ); ?>"><?php esc_html_e( 'See all', 'zettaiwp' ); ?></a>
			</div>
		<?php endif; ?>	
		
	<?php endif; ?>
		
</div>
			
<?php $post_objects = get_field('select_featured_reviews', 'option'); if( $post_objects ): ?>

<div class="row">
	<div class="carousel py-3 w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "wrapAround": true, "adaptiveHeight": true }'>
			
			<?php foreach( $post_objects as $post ): ?>
			<?php setup_postdata($post); ?>	
				
				<div class="col-12 col-md-6">				
					<div class="card-custom border-0 shadow-sm mb-3">					
						<div class="card-body">						
							<div class="row">							
								<div class="col-12">								
									<div class="img__wrap">								
										
										<a href="<?php the_permalink(); ?>">
								
											<?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('zettaiwp-img-16-9-small', array('class' => 'img-fluid shadow-sm'));
												}
												else {
													zettaiwp_default_img_placeholder();	
												} 
											?>
										
										</a>
										
										<?php if ( get_field('enable_score') == 1 ) { echo '<div class="position-absolute right top p-2">' , get_template_part('template-parts/ratings'), '</div>'; } ; ?>		
															
									</div>
									
								</div>							
								<div class="col-12">									
									<div class="py-3">
										<small class="d-block mb-2"><?php echo get_the_date(); ?></small>
										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>										
										<?php if ( has_excerpt() ) : echo '<p>' . get_the_excerpt() . '</p>' ; endif; ?>																	
										<div class="py-2">												
											<div class="row">
												<div class="col-auto">
													<?php echo get_avatar( get_the_author_meta( 'ID' ), 36 ); ?>
												</div>
												<div class="col px-0 my-auto">
												   <strong><?php the_author_posts_link(); ?></strong>
												</div>
											</div>																									
										</div>
									</div>									
								</div>								
							</div>
						</div>						
					</div>					
				</div>
				
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>

	</div>
</div> 

<?php endif; ?> 