<?php get_header(); ?>

<div class="wrapper">

	<!-- Content -->   

	<div id="page-content-wrapper">	

		<div class="container-fluid">	

			<div class="row">

				<div class="col-12 mb-3 mx-auto">	

					<div class="position-relative">
					
						<?php 
							$image = get_field('404_image', 'option');
							$size = 'zettaiwp-img-16-9'; // (thumbnail, medium, large, full or custom size)
							if( $image ) {
								echo wp_get_attachment_image( $image, $size, "", array( 'class' => 'img-fluid w-100 shadow' ) );
							} else {
								zettaiwp_default_img_placeholder();
							};
						?>
								
						<div class="page-overlaytxt border-class d-none d-md-block">
							<div class="totalcenter text-center text-white p-3">
							
								<h1><?php echo get_field('404_message_title', 'option'); ?></h1>
								
								<div class="my-3 text-center">
								<h5><?php echo get_field('404_message', 'option'); ?></h5>
								</div>

								<div class="my-3 text-center">
									<a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-custom"><?php esc_html_e( 'Return to home', 'zettaiwp' ); ?></a>
								</div>
								
							</div>
						</div>

					</div>

					<div class="d-block d-md-none">
						<div class="text-center p-3">
							
							<h1><?php echo get_field('404_message_title', 'option'); ?></h1>
								
							<div class="my-3 text-center">
							<h5><?php echo get_field('404_message', 'option'); ?></h5>
							</div>

							<div class="my-3 text-center">
								<a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-custom"><?php esc_html_e( 'Return to home', 'zettaiwp' ); ?></a>
							</div>
								
						</div>
					</div>

				</div>				

			</div>
			
		</div>		

	</div>

</div>

<?php get_footer(); 