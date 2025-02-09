<?php get_header(); ?>

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav', 'option') ) : 
	
		zettaiwp_sidenav();
		
	endif; ?>

	<div id="page-content-wrapper">

		<div id="post-<?php the_ID(); ?>">
			
			<div class="col">
				<h1 class="my-3">
					<?php the_title(); ?>	
					<div class="line my-3"></div>
				</h1>
			</div>
			
			<div class="col">
			
				<?php while(have_posts()) : the_post(); ?>

					<div class="row">

						<div class="col-12">						
							
							<div class="post-text-content5">
							<?php the_content(); ?>
							</div>

							<?php wp_link_pages(); ?>					

						</div>				

					</div>
				
				<?php endwhile; ?>
				
			</div>

		</div>

	</div>

</div>

<?php get_footer(); 