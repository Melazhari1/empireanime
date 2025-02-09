<?php get_header(); ?>

<div class="wrapper">

	<!-- Content -->   

	<div id="page-content-wrapper">
	
		<?php if ( have_posts() ) : ?>
		
		<div class="col my-3">		
			<div class="row">
				<div class="col-12 col-xl-auto text-center">
					<div class="author-avatar p-3 p-xl-0"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?></div>
				</div>
				<div class="col my-auto text-center text-xl-left">
				   <h5><?php the_author(); ?></h5>
				   <span><?php echo get_the_author_meta( 'user_description', $post->post_author ); ?></span>
				</div>
			</div>
			<div class="line my-3"></div>		
		</div>
		
		<div class="col">

			<div class="row article-feed">

				<?php while (have_posts() ) : the_post(); ?>

				<div class="col-12 col-md-4 col-xl-3 p-3 post">

					<div class="img__wrap">

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
							
						<?php if ( 'reviews'== get_post_type() ) { 
							  if ( get_field('enable_score') == 1 ) { echo '<div class="position-absolute right bottom p-3">' , get_template_part('template-parts/ratings'), '</div>'; } ;							
						} ?>

					</div>

					<div class="p-2 my-md-2">
					
							<?php zettaiwp_display_time(); ?>

							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

							<?php zettaiwp_display_excerpt(); ?>
							
							<?php zettaiwp_display_categories(); ?>							

							<?php zettaiwp_display_tags(); ?>

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