<div class="slideout-heading">			
	<div class="d-inline-block">		
		<h5 class="latest-articles-title-color"><?php echo get_field ('latest_articles_title', 'option') ; ?></h5>		
	</div>	
</div>

<?php /* Latest posts */ 	
		
	$pqt = get_field('latest_articles_post_qty', 'option');	
	$args = array(
			'post_type' => array( 'post' ),
			'posts_per_page' => $pqt,				 
	); 
	
	$query = new WP_Query($args); 

	if ($query->have_posts()) : ?>	
				
<div class="row">	

	<div class="carousel w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "wrapAround": true }'>	
			
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			
					<div class="<?php zettaiwp_latest_post_columns(); ?> py-3">

						<div class="slider-articles-wrap">
							
							<a href="<?php the_permalink(); ?>">
							
								<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('zettaiwp-img-16-9-small', array('class' => 'img-fluid shadow-sm'));
									}
									else {
										zettaiwp_default_img_placeholder();	
									} 
								?>
							
							</a>
							
							<div class="txt p-3">
								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							</div>						

						</div>	

					</div>
			
			<?php endwhile; ?>
			
	</div>	
	
</div>

<?php endif; wp_reset_query(); ?>	