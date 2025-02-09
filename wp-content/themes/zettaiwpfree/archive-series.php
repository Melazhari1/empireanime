<?php get_header(); ?>

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav', 'option') ) :
	
		zettaiwp_sidenav();
		
	endif; ?>	

	<!-- Content -->   

	<div id="page-content-wrapper">
	
		<?php if ( have_posts() ) : ?>
		
		<div class="col">		
		<?php get_template_part('template-parts/current') ;?>
		</div>
		
		<div class="col">

			<div class="row article-feed">

				<?php while (have_posts() ) : the_post(); ?>

				<div class="col-6 col-md-4 col-xl-2 p-3 post">

					<div class="img__wrap">

						<a href="<?php the_permalink(); ?>">
						
							<?php
								 
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('zettaiwp-img-poster-thumb-small', array('class' => 'img-fluid shadow-sm'));
								}
								else {
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

				<?php endwhile; wp_reset_query(); ?>

			</div>   

			<?php get_template_part('template-parts/pagination') ?>

		<?php endif; ?>
		
		</div>

	</div>

</div>

<?php get_footer(); 