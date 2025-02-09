<?php get_header(); ?>

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav', 'option') ) :
	
		zettaiwp_sidenav();
		
	endif; ?>	

	<!-- Content -->   

	<div id="page-content-wrapper">
		
		<div class="d-flex flex-wrap">	
		
			<div class="col-12 mt-3">
			
				<?php $tax = $wp_query->get_queried_object(); ?>
				
				<h4 class="text-center text-md-left"><?php echo ''. $tax->name .''; ?></h4>
				
				<div class="line my-3"></div>
				
			</div>		
			
			<div class="col-12 col-md-4 col-xl-3">
			
				<div class="col-sticky-top text-center mb-3">
					
					<?php 
					$image = get_field('thumbnail_staff', $tax);
					$size = 'zettaiwp-img-square-small'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( 'class' => 'img-fluid staff-image rounded-circle shadow-sm' ) );
					} else {
						zettaiwp_default_img_placeholder();
					}; ?>
					
				</div>
				
			</div>
			
			<div class="col-12 col-md-8 col-xl-9">
			
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
						<a class="nav-link" id="pills-bio-tab" data-toggle="pill" href="#pills-bio" role="tab" aria-controls="pills-bio" aria-selected="false"><?php esc_html_e( 'Bio', 'zettaiwp' ); ?></a>
					  </li>
					  <li class="nav-item" role="presentation">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?php esc_html_e( 'News', 'zettaiwp' ); ?></a>
					  </li>
					</ul>
				
					<div class="tab-content" id="pills-tabContent">				
						  
						<div class="tab-pane fade show active" id="pills-bio" role="tabpanel" aria-labelledby="pills-bio-tab">							
									
							<?php $tax = term_description();
								if ( '' !== $tax ) {
									echo "<div class='card-custom shadow-sm'><div class='card-body p-3'>$tax</div></div>";
								}										
							?>
								
						</div>					
				  
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						
							<!-- Posts and Reviews tagged with the actor tax -->			
						
							<?php global $query_string;	parse_str( $query_string, $args ); $args['post_type'] = array( 'post', 'reviews' );	query_posts( $args ); if ( have_posts() ) : ?>					
							
							<div class="row article-feed">				

								<?php while (have_posts() ) : the_post(); ?>

								<div class="col-md-4 col-lg-6 col-xl-4 post">

									<div class="card-custom border-0 shadow-sm mb-3">
									
											<div class="card-body p-3">		
											
												<div class="position-relative">
													
													<a href="<?php the_permalink(); ?>">
													
														<?php if ( has_post_thumbnail() ) {
															the_post_thumbnail('zettaiwp-img-16-9-small', array('class' => 'img-fluid shadow-sm'));
															} else {
																zettaiwp_default_img_placeholder();
															} 
														?>
														
													</a>
													
													<div class="position-absolute right top p-3">
													<?php if ( get_field('enable_score') ) { echo get_template_part('template-parts/ratings'); } ; ?>		
													</div>
													
												</div>	
												
												<div class="p-2">
													
													<small class="d-block mb-2"><?php echo get_the_date(); ?></small>
													
													<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
													
													<?php echo '<div class="d-block">' , the_excerpt() , '</div>'; ?>
													
												</div>									
										
											</div>
											
									</div>

								</div>

								<?php endwhile; wp_reset_query(); ?>

							</div>   

							<?php get_template_part('template-parts/pagination') ?>

							<?php else : 
							
								get_template_part( 'template-parts/search/search-tax-noresults', 'index' );		

							endif; ?>
						
						</div>
					
					</div>
				  
				</div>			
			
			</div>
		
		</div>

	</div>

</div>

<?php get_footer(); 