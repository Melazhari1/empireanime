<?php get_header(); ?>

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav', 'option') ) : 
	
		zettaiwp_sidenav();
		
	endif; ?>
	
	<div id="page-content-wrapper"> 	

		<?php if ( 1 == get_field('activate_slider', 'option') ) : ?>	
			
			<!-- Featured Slider -->
			
			<div class="col-12 my-3">
			
				<?php get_template_part('template-parts/home-sections/home-slider') ?>					
			
			</div>
		
		<?php endif; ?>
		
		<!-- Sections -->
	
		<div class="d-block d-xl-flex">
		
			<div class="col-12 col-xl-8">
			
				<div class="row">
				
				<?php if ( 1 == get_field('activate_latest_posts', 'option') ) : ?>	
				
				<div class="col-12">
					
					<!-- Selected articles --> 

					<div class="my-3">

						<?php if ( 1 == get_field('latest_articles_view', 'option') ) { 

							get_template_part('template-parts/home-sections/home-latest-articles-normal');

						} else {
							
							get_template_part('template-parts/home-sections/home-latest-articles-modal-open'); 
							get_template_part('template-parts/home-sections/home-latest-articles-modal');

						} ?>
					
					</div>
					
				</div>	

				<?php endif; ?>
				
				<?php if ( 1 == get_field('activate_featured_reviews', 'option') ) : ?>	
				
				<div class="col-12">
				
					<!-- Featured reviews --> 
								
					<div class="my-3">
				
						<?php get_template_part('template-parts/home-sections/home-feat-reviews'); ?>
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				<?php if ( 1 == get_field('activate_featured_posts', 'option') ) : ?>	
				
				<div class="col-12">
				
					<!-- Featured posts --> 
								
					<div class="my-3">
				
						<?php get_template_part('template-parts/home-sections/home-feat-posts'); ?>
					
					</div>
				
				</div>
				
				<?php endif; ?>
				
				<?php if ( 1 == get_field('activate_featured_categories', 'option') ) : ?>	
				
				<div class="col-12">

					<!-- Selected categories --> 
				
					<div class="my-3">
						
						<?php get_template_part('template-parts/home-sections/home-feat-categories'); ?>
					
					</div>
						
				</div>
				
				<?php endif; ?>
				
				</div>
					
			</div>
			
			<div class="col-12 col-xl-4">
			
				<!-- Popular articles --> 			
				
				<div class="my-3">
					
					<?php get_template_part('template-parts/home-sections/home-popular-articles'); ?>
				
				</div>
			
			</div>
		
		</div>
		
		<?php if ( 1 == get_field('activate_movie_ratings', 'option') ) : ?>	
		
			<!-- Movies Columns -->
			
			<div class="col-12 my-3">
			
				<?php get_template_part('template-parts/home-sections/home-movies-columns') ?>					
			
			</div>
		
		<?php endif; ?>	
			
		<?php if ( 1 == get_field('activate_movie_slider', 'option') ) : ?>				
			
			<!-- Movies slider -->	
			
			<div class="col-12 my-3">
				
				<?php get_template_part('template-parts/home-sections/home-movies-slider'); ?>				
				
			</div>		
		
		<?php endif; ?>		
			
		<?php if ( 1 == get_field('activate_series_slider', 'option') ) : ?>				
			
			<!-- Series slider -->	
			
			<div class="col-12 my-3">
				
				<?php get_template_part('template-parts/home-sections/home-series-slider'); ?>			
				
			</div>		
		
		<?php endif; ?>
	
	</div>
				
</div>

<?php get_footer(); 