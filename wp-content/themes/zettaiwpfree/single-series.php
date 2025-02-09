<?php get_header(); ?>

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav_on_movies', 'option') ) : 
	
		zettaiwp_sidenav();
		
	endif; ?>
	
	<div class="container-fluid">	

        <div class="row">

            <div class="col-12 px-0 px-md-3">  
				
				<div class="row">
				
					<div class="col-12 py-3 movie-series-bg-color">
						
						<section>
							
							<div class="position-relative">								
								
								<?php 
								$image = get_field('poster_background');
								$defimage = get_template_directory_uri() .'/assets/img/placeholder.jpg';
								$size = 'full'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size, "", array( 'class' => 'movie-bg-card border-class shadow-sm' ) );
								} else {
									echo '<img src="'.$defimage.'" class="movie-bg-card border-class-top" />';
								}; ?>								
								
								<div class="position-absolute bottom left w-25 m-3 d-block d-xl-none">									
									<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('zettaiwp-img-poster-thumb', array('class' => 'img-fluid shadow-sm')); } ?>	
								</div>
							
							</div>
							
						</section>
						
						<div class="col-12 p-4">
							
							<div class="row justify-content-between">							
								<div class="col-12">
									<h2 class="d-inline-block"><?php the_title(); ?></h2>									
									<?php if ( get_field('promo_phrase') ) { echo '<p class="font-italic">' , get_field('promo_phrase'), '</p>'; }; ?>								
								</div>						
							</div>
							
							<div class="line my-3"></div>
							
							<div class="row py-3">
							
								<div class="col-4 col-lg-3 d-none d-xl-block">									
									<div class="col-sticky-top">							
										<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('zettaiwp-img-poster-thumb', array('class' => 'img-fluid shadow-sm')); } ?>	
									</div>									
								</div>
								
								<div class="col-12 col-xl-6">
															
											<div class="my-auto">
																
												<?php if ( get_field('mpaa_film_ratings') ) { echo '<div class="movie-ratings-mpaa mb-2 mr-2">' , get_field('mpaa_film_ratings'), '</div>'; } ;?>
																
												<div class="d-inline-block"><?php zettaiwp_genres(); ?></div>
																
											</div>																									
																					
											<div class="row my-3">
											
												<div class="col-12">
												
													<?php 
														
														$year = get_field_object('year'); 
														$status = get_field_object('status'); 
														$episodes = get_field_object('episodes'); 
														$duration = get_field_object('duration'); 
														$studio = get_field_object('studio'); 
														$release_format = get_field_object('release_format'); 
														$broadcast_days = get_field('broadcast_days');
														$aired_init = get_field_object('aired_init');
														$aired_finish = get_field_object('aired_finish');
													
													?>
													
													<div class="card-movies-series border-0 shadow-sm mb-3">
													  <div class="card-body">
														<h5><?php esc_html_e( 'Synopsis', 'zettaiwp' ); ?></h5>
														<p class="card-text"><?php the_excerpt(); ?></p>
														
														<!-- Button trigger modal -->
														<button type="button" class="btn btn-sm btn-custom" data-toggle="modal" data-target="#fullStory">
														<i class="fas fa-align-justify"></i> <?php esc_html_e( 'Full Story', 'zettaiwp' ); ?>
														</button>

														<!-- Modal -->
														<div class="modal fade" id="fullStory" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
														  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
															<div class="modal-content">
															  <div class="modal-header">
																<h5 class="modal-title" id="staticBackdropLabel"><?php the_title(); ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																  <span aria-hidden="true">&times;</span>
																</button>
															  </div>
															  <div class="modal-body">																
																<?php echo get_field('full_story'); ?>															
															  </div>
															</div>
														  </div>
														</div>
														
													  </div>
													</div>
												
												</div>
									
												<div class="col-12">													
													<div class="card-movies-series border-0 shadow-sm mb-3">
														<div class="card-body">														
															<div class="row">														
																<div class="col-12 col-md-6">																
																	<!-- Staff -->																	
																	<?php get_template_part('template-parts/staff') ?>															
																</div>
																<div class="col-12 col-md-6">																
																	<!-- Actors/Actresses -->															
																	<?php get_template_part('template-parts/actors') ?>															
																</div>																
															</div>														
														</div>
													</div>												
												</div>	
											
											</div>
														
								</div>
				
								<div class="col-12 col-xl-3">
								
										<div class="row">											
												
												<div class="col-12">
												
														<!-- Movie Trailer -->  
														
														<div class="position-relative mb-3">	
														
														<?php 
														$trailerimage = get_field('trailer_image');
														$size = 'zettaiwp-img-16-9-small'; // (thumbnail, medium, large, full or custom size)
														if( $trailerimage ) {
															echo wp_get_attachment_image( $trailerimage, $size, "", array('class' => 'img-fluid w-100 shadow-sm') );
														}; ?>
														
														<div class="position-absolute bottom left m-3">
														<!-- Button trigger modal -->
														<button type="button" class="btn btn-sm btn-custom" data-toggle="modal" data-target="#trailerembed">
														<i class="fas fa-play mr-1"></i> <?php esc_html_e( 'Watch Trailer', 'zettaiwp' ); ?>
														</button>
														</div>
														
														</div>															

														<!-- Modal -->
														<div class="modal fade" id="trailerembed" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
														  <div class="modal-dialog modal-dialog-centered modal-xl">
															<div class="modal-content">
															  <div class="modal-body">
																<div class="embed-responsive embed-responsive-16by9">
																<?php echo get_field('trailer'); ?>															
																</div>
															  </div>
															</div>
														  </div>
														</div>														
													  
												</div>
												
										</div>
									
								</div>
							
							</div>
						
						</div>
							
					</div>
				
				</div>

            </div>

        </div>
	
	</div>

</div>

<?php get_footer(); 