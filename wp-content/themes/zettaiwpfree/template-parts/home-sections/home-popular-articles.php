<div class="slideout-heading">

	<div class="d-inline-block">
	
		<h5 class="popular-reads-title-color"><?php echo get_field ('popular_reads_title', 'option') ; ?></h5>
		
	</div>		

</div>

<div class="my-3">
	
	<?php
	$pqt = get_field('popular_reads_post_qty', 'option');	
	$popularpostbycomments = array(
		'orderby'    => 'comment_count',
		'order'      => 'DESC',
		'posts_per_page' => $pqt,
	);	
	$postID = get_queried_object_id();
	// Invoke the query
	$prime_posts = new WP_Query( $popularpostbycomments );	 
	if ( $prime_posts->have_posts() ) :?>
	
	<?php while ( $prime_posts->have_posts() ) : $prime_posts->the_post(); ?>	
	
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
						
							<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
							
							<div class="d-inline-block">
								<i class="far fa-comment-dots"></i> <?php echo $comments_text = get_comments_number_text( 'No comments', '1 comment', '% comments', $postID ); ?>
							</div>
							
						</div>        
					   
					</div>
			
				</div>
			
			</div>
			 
			<?php endwhile; wp_reset_postdata(); ?>
	
	<?php endif; ?>

</div>
