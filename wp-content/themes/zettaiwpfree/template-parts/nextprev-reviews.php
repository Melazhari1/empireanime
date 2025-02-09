<div class="line"></div>

	<div class="row my-4">
        
		<?php $args = array(	
			
			'post_type' => array( 'reviews' ),
			'posts_per_page' => 8,
			'post__not_in' => array( get_the_ID() ),
					 
		);

		$query = new WP_Query($args); 

		if ($query->have_posts()) :	while ($query->have_posts()) : $query->the_post(); ?>				
			
			<div class="col-12 col-xl-6 mb-3">			
				<div class="card-custom border-0 shadow-sm mb-3">							
					<div class="card-body">										
						<div class="row">
							<div class="col-4 col-xl-5 pr-0">							
								<div class="img__wrap">
									
									<a href="<?php the_permalink(); ?>">
												
										<?php if ( has_post_thumbnail() ) {
												the_post_thumbnail('thumbnail', array('class' => 'img-fluid shadow-sm'));
											}
											else {
												zettaiwp_default_img_placeholder();	
											} 
										?>
														
									</a>
									
									<?php if ( get_field('enable_score') == 1 ) { echo '<div class="position-absolute right top p-2">' , get_template_part('template-parts/ratings'), '</div>'; } ; ?>									
									
								</div>									
							</div>										
							<div class="col py-1">								
								<small class="d-block mb-2"><?php echo get_the_date(); ?></small>
								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>									
							</div>        
							   
						</div>					
					</div>					
				</div>					
            </div>
        
		<?php endwhile; endif; wp_reset_query(); ?>		
        
	</div>