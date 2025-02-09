<?php get_header(); ?>

<div class="wrapper">

	<div id="page-content-wrapper">

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="container-fluid my-3">	
		
			<?php while(have_posts()) : the_post(); ?>		

				<div class="my-3">

					<div class="row">
						
						<div class="col-12 mb-5">
							
							<div class="row">
									
								<div class="col-12 col-lg-8">
											
									<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('zettaiwp-img-16-9', array('class' => 'img-fluid w-100 shadow'));
										}
										else {
											zettaiwp_default_img_placeholder();	
										} 
									?>
											
								</div>
										
								<div class="col-12 col-lg-4">
										
									<time class="d-block my-3"><i class="far fa-calendar-check fa-lg"></i> <?php echo get_the_date(); ?></time>
											
									<h2><?php the_title(); ?></h2>
											
									<?php if ( has_excerpt() ) : echo '<h6>' . get_the_excerpt() . '</h6>' ; endif; ?>
											
								</div>
									
							</div>
							
						</div>
						
						<div class="col-12 col-lg-8">
						
							<div class="row">
							
								<div class="col-12">   				
							
									<section>																											
											
										<?php echo do_shortcode('[addtoany]'); ?>
										
										<div class="my-3 py-2">											
											<div class="row">
												<div class="col-auto">
													<?php echo get_avatar( get_the_author_meta( 'ID' ), 42 ); ?>
												</div>
												<div class="col px-0 my-auto">
													<h6><?php the_author_posts_link(); ?></h6>
												</div>
											</div>
										</div>
									
									</section>
									
									<section>										
										
										<div class="post-text-content">
											<?php the_content(); ?>					
										</div>
										
										<?php wp_link_pages(); ?>
										
										<?php edit_post_link( __( 'Edit this post', 'zettaiwp' ), '<div class="my-3 text-center clear">', '</div>', null, 'btn btn-custom btn-sm' ); ?>										
										
										<h6><?php esc_html_e( 'In this post: ', 'zettaiwp' ); ?></h6>
										
										<?php echo zettaiwp_custom_taxonomies_terms_links(); ?>
										
										<div class="line"></div>

										<?php if ( comments_open() || get_comments_number() ) :	comments_template(); endif; ?>
									
									</section>
									
								</div>	
								
								<div class="col-12 my-5">
									
									<?php get_template_part( 'template-parts/nextprev-reviews' ); ?>
									
								</div>
							
							</div>
								
						</div>
						
						<div class="col-12 col-lg-4"> 
							
							<div class="col-sticky-top">					
								<?php zettaiwp_right_sidebar(); ?>						
							</div>
							
						</div>

					</div>

				</div>

			<?php endwhile; ?>		
		
		</div>

	</div>

	</div>

</div>

<?php get_footer();   