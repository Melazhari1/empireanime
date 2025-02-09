<?php
/**
 * Template Name: Reviews
 *
 * @author RAMSTHEMES
 */
get_header(); 

?>	
	
	<div class="row mx-0 mx-xl-3">
		
		<?php if ( have_posts() ) : 			
			$args = array( 'post_type' => 'reviews', 'paged' => $paged );
			$loop = new WP_Query( $args );			
		?>
		
		<div class="col-12">		
			<h3 class="my-3"><?php the_title(); ?></h3>
			<div class="line my-3"></div>
		</div>

		<!-- Content -->   

		<div class="col-12">

				<div class="row reviews-filtering">

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	

					<div class="col-12 col-md-6 p-3 post">	
					
							<div class="card-custom border-0 shadow-sm mb-3">							
								<div class="card-body">
									<div class="img__wrap mb-3">
										
										<a href="<?php the_permalink(); ?>">
											
											<?php
													 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail('zettaiwp-img-16-9-small', array('class' => 'img-fluid shadow-sm'));
												}
												else {
													zettaiwp_default_img_placeholder();		
												}
											?>

										</a>

										<?php if ( get_field('enable_score') == 1 ) { echo '<div class="position-absolute right top p-2">' , get_template_part('template-parts/ratings'), '</div>'; } ; ?>									

									</div>
									<small><?php echo get_the_date(); ?></small>									
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

					<?php endwhile; wp_reset_postdata(); ?>

				</div>

		</div>
		
		<?php get_template_part('template-parts/pagination'); endif; wp_reset_query(); ?>	
	
	</div>


<?php get_footer(); 