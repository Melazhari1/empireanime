<?php 

/* Template Name: Contact Form */ 

get_header();

/* Use only with Contact Form 7 Plugin*/

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
  wpcf7_enqueue_scripts();
};
 
if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
  wpcf7_enqueue_styles();
};

 ?>

<div class="wrapper">

	<div id="page-content-wrapper">

		<div id="post-<?php the_ID(); ?>">

			<?php while(have_posts()) : the_post(); ?>
			
			<div class="container-fluid">	

				<div class="row">

					<div class="col-12 col-lg-7 mb-3 mx-auto">	

						<div class="my-3">
							<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('zettaiwp-img-16-9', array('class' => 'img-fluid w-100 shadow'));
								}
								else {
									zettaiwp_default_img_placeholder();
								} 
							?>
						</div>
						
						<h1 class="my-5">
							<div class="text-center"><?php the_title(); ?></div>	
							<div class="line my-3"></div>
						</h1>		
											
						<div class="post-entry my-5">
						<?php the_content(); ?>
						</div>

						<?php wp_link_pages(); ?>					

					</div>				

				</div>
			
			</div>
			
			<?php endwhile; ?>	

		</div>

	</div>

</div>

<?php get_footer();  