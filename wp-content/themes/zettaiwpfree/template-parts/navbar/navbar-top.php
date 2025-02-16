<!-- Navbar -->

<nav class="<?php if ( 1 == get_field('fixed_navbar', 'option') ) { echo 'fixed-header'; } ;?> navbar navbar-height navbar-pos bg-navbar">

    <div class="navbar-container position-relative">
		
		<div class="row w-100 d-flex align-items-center mx-0">
		
			<div class="col-4 col-xl-3 px-0">
			
				<!-- logo -->		

				<a class="navbar-logo-left" href="<?php echo esc_url( home_url('/') ); ?>">

					<?php if ( get_field('upload_logo', 'option') ) : ?>
					<!-- display logo for normal mode -->
					<img class="logo logow logores" src="<?php echo get_field('upload_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>">
					<?php endif; ?>
					
					<?php if ( get_field('upload_responsive_logo', 'option') ) : ?>
					<!-- display logo responsive for normal mode -->
					<img class="logo logow hide-logo-res" src="<?php echo get_field('upload_responsive_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>">
					<?php endif; ?>

				</a>
				
			</div>
			
			<div class="col-5 col-xl-6 px-0">			
			</div>		
		
			<div class="col-3 px-0 my-auto"> 
			
				<!-- icons on right -->			
				<div class="row d-flex align-items-center justify-content-end pr-3">	
					
					<div class="col-auto px-1">
					
						<!-- hamburger menu right -->
						<div class="hamb-menu">
							<div class="toggle-open-close-right d-flex align-middle"><i class="fas fa-bars fa-lg hamb-menu-right"></i></div>
						</div>		

					</div>
						
				</div>
			
			</div>
		
		</div>
		
    </div>	
	
	<?php zettaiwp_border_navbar(); ?>

</nav>

<!-- sidenav right (responsive) -->
<div id="zettaiwp-sidenav" class="sidenav-l bg-sidenav border-sidenav-shadow">	
	<div class="buttons-sidenav" id="topnav">	
		<!-- close sidenav button -->
		<span title="<?php esc_attr_e( 'Close Menu', 'zettaiwp' ); ?>" class="closebtn toggle-open-close-right"><i class="fas fa-times fa-lg"></i></span>			
	</div>		
	<div class="sidenav-margin-top"> <?php zettaiwp_sidenav(); ?> </div>	
</div>
