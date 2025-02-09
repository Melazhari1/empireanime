<?php 

// Add social media shortcode

add_filter( 'widget_text', 'do_shortcode' );
function zettaiwp_social_shortcode() { ?> 

		<?php ob_start(); 				
					
		zettaiwp_social_media();

		return ob_get_clean(); ?>
				
<?php 
} 
add_shortcode( 'social', 'zettaiwp_social_shortcode' );


// Add copyright shortcode

add_filter( 'widget_text', 'do_shortcode' );
function zettaiwp_copyright_shortcode() { ?> 

		<?php ob_start(); ?>				
		
		<i class="far fa-copyright"></i> <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> . <?php esc_html_e( 'All Rights Reserved', 'zettaiwp' ); ?>
		
		<?php return ob_get_clean(); ?>
				
<?php 
} 
add_shortcode( 'copyright', 'zettaiwp_copyright_shortcode' );

             