<div class="slideout-heading">
				
	<div class="d-inline-block">	
		
		<h5 class="latest-articles-title-color"><?php echo get_field ('latest_articles_title', 'option') ; ?></h5> 			
		
	</div>					
							
</div>

<div class="row">

	<div class="carousel py-3 w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "groupCells": true }'>
	
	<!-- /* First slide */ -->
	
		<div class="d-flex w-100">

			<div class="col-8">

			<?php /* first post */ 		
				
			$args = array(
					'post_type' => array( 'post' ),
					'posts_per_page' => 1,
							 
			);

			$query = new WP_Query($args); 

			$counter = 0; while($query->have_posts()) : $query->the_post(); $counter++ ?>		
				
				<div class="img__wrap">						
						
					<a href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#ModalCenter-<?php echo esc_attr ($counter); ?>">
						
						<?php if ( has_post_thumbnail() ) {
									
							the_post_thumbnail('zettaiwp-img-square-medium', array('class' => 'img-fluid shadow-sm'));
									
							} else {
										
								zettaiwp_default_img_placeholder();
										
							} 
						?>

					</a>
							
					<div class="txt post-modal-title p-3"><?php the_title(); ?></div>		
						
				</div>
				
			<?php endwhile; wp_reset_query(); ?>	
			
			</div>
		
			<div class="col-4">
			
				<?php /* two post */ 			
					
				$args = array(			
						'post_type' => array( 'post' ),
						'posts_per_page' => 2,
						'offset' => 1	
				);

				$query = new WP_Query($args);

				$counter = 1; while($query->have_posts()) : $query->the_post(); $counter++ ?>	
				
				<div class="d-block featured-grid-mb">
						
					<div class="img__wrap">						
						
						<a href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#ModalCenter-<?php echo esc_attr ($counter); ?>">
						
							<?php if ( has_post_thumbnail() ) {
									
								the_post_thumbnail('zettaiwp-img-square-medium', array('class' => 'img-fluid shadow-sm'));
									
								} else {
										
									zettaiwp_default_img_placeholder();
										
								} 
							?>

						</a>
							
						<div class="txt post-modal-title p-3"><?php the_title(); ?></div>	
						
					</div>
						
				</div>	
				
				<?php endwhile; wp_reset_query(); ?>	
			
			</div>	
						
		</div>
	
	
		<!-- /* Second slide */ -->

		<div class="d-flex w-100">
	
			<?php /* more posts */ 			
				
			$args = array(			
					'post_type' => array( 'post' ),
					'posts_per_page' => 6,
					'offset' => 3	
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) :	$i = 0; $counter = 3; while ($query->have_posts()) : $query->the_post(); $counter++ ?>
			
				<?php if ( $i % 2 ==  0) : ?>
				<div class="col-4">
				<?php endif; ?>
			
					<div class="d-block featured-grid-mb">
					
						<div class="img__wrap">						
						
							<a href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#ModalCenter-<?php echo esc_attr ($counter); ?>">
						
								<?php if ( has_post_thumbnail() ) {
									
									the_post_thumbnail('zettaiwp-img-square-medium', array('class' => 'img-fluid shadow-sm'));
									
									} else {
										
										zettaiwp_default_img_placeholder();
										
									} 
								?>

							</a>
							
							<div class="txt post-modal-title p-3"><?php the_title(); ?></div>	
						
						</div>
					
					</div>		
				
				<!-- changed == 0 to != 0  -->
				<?php if ( $i % 2 != 0 ) : ?>
				</div>
				<?php endif; ?>
				
			<?php $i++; endwhile; ?> 
	
		<!-- added closing </div> for odd number of posts -->
		<?php if ( $i % 2 != 0 ) : ?>
		</div>
		<?php endif; ?>
		
	<?php endif; wp_reset_query(); ?>	
	
	</div>	
	
</div>	

</div>