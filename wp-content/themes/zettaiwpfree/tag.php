<?php get_header(); ?>

<div class="wrapper">

	<!-- Content -->   

	<div id="page-content-wrapper">
	
		<?php if ( have_posts() ) : ?>
		
		<div class="col">		
		<?php get_template_part('template-parts/current') ;?>
		</div>
		
		<div class="col">

			<div class="row article-feed">

				<?php while (have_posts() ) : the_post(); ?>

				<div class="col-12 col-lg-6 p-3 post">
				
					<div class="card-custom border-0 shadow-sm mb-3">
							
						<div class="card-body">
										
							<div class="row">          

								<div class="col-4">  
								
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
										
									</div>
									
								</div>
										
								<div class="col py-1">
								
									<?php 
							
										zettaiwp_display_time();
											
										the_title( '<h5><a href="' . esc_url( get_permalink() ) . '">', '</a></h5>' );				
											
										zettaiwp_display_excerpt();
											
										zettaiwp_display_author_link();	
												
										zettaiwp_display_categories();
												
										zettaiwp_display_tags(); 
										
									?>
									
								</div>        
							   
							</div>
					
						</div>
					
					</div>

				</div>

				<?php endwhile; wp_reset_query(); ?>

			</div>   

			<?php get_template_part('template-parts/pagination') ?>

		<?php endif; ?>
		
		</div>

	</div>

</div>

<?php get_footer(); 