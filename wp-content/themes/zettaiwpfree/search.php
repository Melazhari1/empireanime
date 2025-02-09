<?php get_header(); ?>

<div class="wrapper">

	<!-- Content -->   

	<div id="page-content-wrapper">
	
		<?php if ( have_posts() ) : ?>
		
		<div class="col">
			<h3 class="my-3">
				<?php esc_html_e( 'Search results for', 'zettaiwp' ); ?> 
				<div class="search-term-result d-inline px-1"><?php echo get_search_query(); ?></div>
				<div class="line my-3"></div>
			</h3>
		</div>
		
		<div class="col">

			<div class="row article-feed">

				<?php while (have_posts() ) : the_post(); ?>

				<div class="col-12 col-md-4 col-xl-2 p-3 post">

					<div class="img__wrap">
						
						<a href="<?php the_permalink(); ?>">						
							
							<?php
									 
								if ( has_post_thumbnail() ) {
									if ( get_post_type() === 'movies' || get_post_type() == 'series' ) { 
										the_post_thumbnail('zettaiwp-img-poster-thumb-small', array('class' => 'img-fluid shadow-sm'));
									} else {
										the_post_thumbnail('zettaiwp-img-square-small', array('class' => 'img-fluid shadow-sm'));
									}
								}
								else {
									zettaiwp_default_img_placeholder();		
								}
								
							?>

						</a>

					</div>

					<div class="p-2">
					
						<?php if ( get_post_type() === 'movies' || get_post_type() == 'series' ) { 						
							
							the_title( '<h6><a href="' . esc_url( get_permalink() ) . '">', '</a></h6>' );
							
							echo '<small>' , echo get_field( 'year' ) , '</small>'; 
							
						} else {
						
							zettaiwp_display_time();
							
							the_title( '<h5><a href="' . esc_url( get_permalink() ) . '">', '</a></h5>' );				
							
							zettaiwp_display_excerpt();
							
							zettaiwp_display_author_link();	
								
							zettaiwp_display_categories();
								
							zettaiwp_display_tags();
						
						} ?>
						
					</div>

				</div>

				<?php endwhile; wp_reset_query(); ?>

			</div>   

			<?php get_template_part('template-parts/pagination') ?>

		<?php else : 
		
			get_template_part( 'template-parts/search/search-noresults', 'index' );		

		endif; ?>
		
		</div>

	</div>

</div>

<?php get_footer(); 