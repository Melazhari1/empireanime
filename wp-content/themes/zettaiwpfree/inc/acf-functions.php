<?php

// Fade effect on load

function zettaiwp_fade() {	// fade effect

	if ( 1 == get_field('fade_effect', 'option') ) :		
		echo 'id="loadfade"';			
	endif; 
	
}

// Sidebar sidenav

function zettaiwp_sidenav() {		
	
	echo '<nav id="sidebar" class="sidenav"><div data-simplebar class="navigation-sticky-top scrollbar-sidenav"><div class="sidenav-nav-container">';				
		if ( is_active_sidebar( 'sidenav-sidebar' ) ) : 
			dynamic_sidebar( 'sidenav-sidebar' ); 					  
		endif;				
	echo '</div></div></nav>';
	
}

// Right Sidebar

function zettaiwp_right_sidebar() {
				
	if ( is_active_sidebar( 'right-sidebar' ) ) : 
		dynamic_sidebar( 'right-sidebar' ); 					  
	endif;				
	
}

// Rounded General Corners

function zettaiwp_rounded_corners() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded'; 
	endif; 
}

function zettaiwp_rounded_corners_right() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-right'; 
	endif; 
}

function zettaiwp_rounded_corners_left() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-left'; 
	endif; 
}

function zettaiwp_rounded_corners_top() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-top'; 
	endif; 
}

function zettaiwp_rounded_corners_bottom() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-bottom'; 
	endif; 
}

function zettaiwp_rounded_corners_class() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important';
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-radius: .5rem !important'; 
	endif; 
}

function zettaiwp_more_rounded_corners_class() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important';
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-radius: 2rem; -webkit-border-radius: 2rem; -moz-border-radius: 2rem;'; 
	endif; 
}

function zettaiwp_rounded_corners_class_top() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-top-right-radius: .5rem; border-top-left-radius: .5rem;'; 
	endif; 
}

function zettaiwp_rounded_corners_class_bottom() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-bottom-right-radius: .5rem; border-bottom-left-radius: .5rem;'; 
	endif; 
}

function zettaiwp_rounded_corners_class_left() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;';
	endif; 
}

function zettaiwp_rounded_corners_class_right() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'border-radius: 0 !important'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'border-top-right-radius: .5rem; border-bottom-right-radius: .5rem;';
	endif; 
}

function zettaiwp_rounded_pill() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-pill'; 
	endif; 
}

function zettaiwp_rounded_circle() {	
	if( get_field('rounded_corners', 'option') == 0 ): 
		echo 'rounded-0'; 
	elseif( get_field('rounded_corners', 'option') == 1 ): 
		echo 'rounded-circle'; 
	endif; 
}

// Border Navbar

function zettaiwp_border_navbar() {	
	if ( 1 == get_field('border_navbar', 'option') ):
		echo '<div class="line bottom-grad"></div>';
	endif;	
}

// Border Sidenav Right

function zettaiwp_border_sidenav() {	
	if ( 1 == get_field('border_sidenav', 'option') ):
		echo 'border-right: 1px solid #F1F1F1; ';
	endif;	
}

// Border Sidenav Left

function zettaiwp_border_sidenav_left() {	
	if ( 1 == get_field('border_sidenav', 'option') ):
		echo 'border-left: 1px solid #F1F1F1; ';
	endif;	
}

// Border Footer

function zettaiwp_border_footer() {	
	if ( 1 == get_field('border_footer', 'option') ):
		echo '<div class="line"></div>';
	endif;	
}

// Fixed menu switch

function zettaiwp_fixed_menu() {	
	if ( 1 == get_field('fixed_navbar', 'option') ):
		echo 'class="pt-fixed"';
	endif;		
}

// Slide columns (home)

function zettaiwp_slide_columns() {
	
	if( get_field('home_slider_columns', 'option') == '1' ): 
		echo 'col-12';
	elseif( get_field('home_slider_columns', 'option') == '2' ): 
		echo 'col-12 col-lg-6'; 
	elseif( get_field('home_slider_columns', 'option') == '3' ): 
		echo 'col-12 col-lg-6 col-xl-4'; 
	endif; 
	
}

// Latest Posts columns (home)

function zettaiwp_latest_post_columns() {
	
	if( get_field('latest_articles_columns', 'option') == '1' ): 
		echo 'col-12';
	elseif( get_field('latest_articles_columns', 'option') == '2' ): 
		echo 'col-12 col-lg-6'; 
	elseif( get_field('latest_articles_columns', 'option') == '3' ): 
		echo 'col-12 col-lg-6 col-xl-4'; 
	endif; 
	
}

// Categories List columns (home)

function zettaiwp_cats_list_columns() {
	if( get_field('select_cats_columns', 'option') == '1' ): 
		echo 'col-12';
	elseif( get_field('select_cats_columns', 'option') == '2' ): 
		echo 'col-12 col-lg-6'; 
	elseif( get_field('select_cats_columns', 'option') == '3' ): 
		echo 'col-12 col-lg-6 col-xl-4'; 
	elseif( get_field('select_cats_columns', 'option') == '4' ): 
		echo 'col-12 col-lg-6 col-xl-3'; 
	endif; 
	
}

// Slide images container (home)

function zettaiwp_carousel() {
	
	if( get_field('home_slider_columns', 'option') == '1' ): 
		echo 'carousel-home';
	elseif( get_field('home_slider_columns', 'option') == '2' OR get_field('home_slider_columns', 'option') == '3' ): 
		echo 'carousel'; 
	endif; 
	
}

// Slide images (home)

function zettaiwp_slide_home_img() {
	
	if( get_field('home_slider_columns', 'option') == '1' ): 
		echo 'home-slider-img';
	elseif( get_field('home_slider_columns', 'option') == '2' OR get_field('home_slider_columns', 'option') == '3' ): 
		echo 'img-fluid'; 
	endif; 
	
}

// Slide text color

function zettaiwp_slide_color() {
	
	if ( 1 == get_sub_field('slide_text_color', 'option') ) {
		echo 'text-white';
	} else {
		echo 'text-dark';	
	}
	
}

// Custom Navbars

if( class_exists('acf') ) {				
	require get_template_directory() . '/inc/navbar-walkers/custom-menu-sidenav.php' ;
}

// Display authors

function zettaiwp_display_author_link() {

	if ( 1 == get_field('display_authors', 'option') ) { 
		
		echo '<div class="font-weight-bold mb-3">' , the_author_posts_link() , '</div>';

	}
	
}

// Display time

function zettaiwp_display_time() {
	
	if ( 1 == get_field('display_time', 'option') ) : 
												
		echo '<small class="d-block mb-2">' , get_the_date(), '</small>';
													
	endif;

}

// Display categories

function zettaiwp_display_categories() {
	
	if ( 1 == get_field('display_cats', 'option') ) : 
																
		echo '<div class="d-block">' , zettaiwp_categories_list() , '</div>'; 
																			
	endif; 
	
}

// Display tags

function zettaiwp_display_tags() {
	
	if ( 1 == get_field('display_tags', 'option') ) : 
																
		echo '<div class="d-block">' , zettaiwp_tags_list() , '</div>'; 
																			
	endif; 
	
}

// Display excerpt

function zettaiwp_display_excerpt() {

	if ( 1 == get_field('display_excerpt', 'option') ) : 									
		
		echo '<div class="d-block">' , the_excerpt() , '</div>'; 		
												
	endif;
	
}

// Background

if ( ! function_exists ( 'zettaiwp_movie_series_background_color' ) ) {
	
	function zettaiwp_movie_series_background_color() {

		$background_gradient_1 = get_field('movie_series_background_color', 'option');

		if (is_array($background_gradient_1)) {
			$rgba = sprintf('rgba(%d, %d, %d, %.2f)', $background_gradient_1['red'], $background_gradient_1['green'], $background_gradient_1['blue'], $background_gradient_1['alpha']);
			echo $rgba; // outputs something like "rgba(255, 255, 255, 1.00)"
		}
	
	}

}

// Social media icons in footer

function zettaiwp_social_media() {
	
	echo '<div class="socialmedia">';
	
		if( get_field('facebook', 'option') ) {
			echo '<a href="' . get_field('facebook', 'option') .'"><i class="mx-2 fab fa-facebook-f fa-lg"></i><div class="screen-reader-text">Facebook</div></a>';
		}

		if( get_field('twitter', 'option') ) { 
			echo '<a href="' . get_field('twitter', 'option') . '"><i class="mx-2 fa-brands fa-x-twitter"></i><div class="screen-reader-text">X</div></a>';
		}

		if( get_field('instagram', 'option') ) { 
			echo '<a href="' . get_field('instagram', 'option') .'"><i class="mx-2 fab fa-instagram fa-lg"></i><div class="screen-reader-text">Instagram</div></a>';
		}

		if( get_field('youtube', 'option') ) {
			echo '<a href="' . get_field('youtube', 'option') .'"><i class="mx-2 fab fa-youtube fa-lg"></i><div class="screen-reader-text">Youtube</div></a>';
		}

		if( get_field('vimeo', 'option') ) {
			echo '<a href="' . get_field('vimeo', 'option') .'"><i class="mx-2 fab fa-vimeo fa-lg"></i><div class="screen-reader-text">Vimeo</div></a>';
		}
	
	echo '</div>';

}