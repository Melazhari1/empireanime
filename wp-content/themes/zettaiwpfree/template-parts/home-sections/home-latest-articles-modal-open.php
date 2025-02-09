				
				<?php 	
				$args = array(
					'post_type' => 'post'		
				);

				$query = new WP_Query($args); ?>

                <?php $counter = 0; while($query->have_posts()) : $query->the_post(); $counter++ ?>	

				<!-- Modal -->
				
					<div class="modal fade" id="ModalCenter-<?php echo esc_attr ($counter); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content border-class shadow">
						  <div class="modal-header">
							<h5 class="modal-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <div aria-hidden="true"><i class="fas fa-times"></i></div>
							</button>
						  </div>
						  
						  <picture>								
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('zettaiwp-img-16-9-small', array('class' => 'img-fluid rounded-0 shadow-sm'));
									}
									else {
										zettaiwp_default_img_placeholder();	
									} 
								?>
							</a>									
						  </picture>
											
						  <div class="modal-body">
							<!-- opened menu -->
							<div class="mx-2">							
								<small class="d-block mb-2"><?php echo get_the_date(); ?></small>								
								<?php if ( has_excerpt() ) : echo '<p>' . get_the_excerpt() . '</p>' ; endif; ?>								
								<div class="my-2">
									<a class="btn btn-custom btn-block btn-sm mr-2 mb-2" href="<?php the_permalink(); ?>"><i class="fas fa-align-justify mr-1"></i> <?php esc_html_e('Read More', 'zettaiwp'); ?></a>										
								</div>															
							</div>
						  </div>
						</div>
					  </div>
					</div>
					
				 <?php endwhile; ?>