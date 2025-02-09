<div class="slideout-heading">

	<div class="d-inline-block">	
		<h5 class="feat-series-title-color"><?php echo get_field ('featured_series_title', 'option') ; ?></h5>		
	</div>
	
	<?php if ( 1 == get_field('see_all_series_button', 'option') ) : ?>		
	
		<?php 
		$link = get_field('all_series_link', 'option');
		if( $link ): ?>
			<div class="home-va-btn">
			<a href="<?php echo esc_url( $link ); ?>"><?php esc_html_e( 'See all', 'zettaiwp' ); ?></a>
			</div>
		<?php endif; ?>	
	
	<?php endif; ?>

</div>
			
<?php $post_objects = get_field('select_featured_series', 'option'); if( $post_objects ): ?>

<div class="row gx-0">		
	<div class="carousel home-movies-sld py-3 w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "wrapAround": true }'>
							
			<?php foreach( $post_objects as $post ): ?>
			<?php setup_postdata($post); ?>	

			<div class="col-6 col-sm-4 col-xl-2 p-3 post">			
				<div class="position-relative d-block">
					
					<a href="<?php the_permalink(); ?>">
					
						<?php if ( has_post_thumbnail() ) {
							
							the_post_thumbnail('zettaiwp-img-poster-thumb-small', array('class' => 'img-fluid shadow-sm'));
							
							} else {
								
								zettaiwp_default_img_placeholder();
								
							} 
						?>

					</a>
					
				</div>				
				<div class="p-2">
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>					
					<small><?php if ( get_field('year') ) { echo get_field('year'); } ;?></small>										
				</div>		
			</div>
			
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
			
	</div>		
</div>

<?php endif; ?> 	