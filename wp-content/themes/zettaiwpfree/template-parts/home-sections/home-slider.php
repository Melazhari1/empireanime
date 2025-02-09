<div class="slideout-heading">			
	<div class="d-inline-block">
		<h5 class="home-slider-title-color"><?php echo get_field('home_slider_title', 'option'); ?></h5>
	</div>			
</div>

<div class="row">

	<div class="<?php zettaiwp_carousel(); ?> mb-3 w-100" data-flickity='{ "pageDots": false, "imagesLoaded": true, "prevNextButtons": true, "cellAlign": "left", "contain": true, "wrapAround": true }'>
	
		<?php if( have_rows('create_slides', 'option') ): while( have_rows('create_slides', 'option') ) : the_row(); ?>

		<?php 
		$sliderimage = get_sub_field('image_slider', 'option');	
		$linkimage = get_sub_field('link_slider', 'option');
		$titleslider = get_sub_field('title_slider', 'option');
		$buttonslider = get_sub_field('slider_button_text', 'option');	
		?>
		
		<div class="<?php zettaiwp_slide_columns(); ?> p-3">
		
			<div class="slider-wrap">			  
				
				<img class="<?php zettaiwp_slide_home_img(); ?> shadow-sm" <?php zettaiwp_responsive_images( $sliderimage, 'zettaiwp-img-16-9', '640px' ); ?> />

				<?php if ( $titleslider || $descslider ) : ?>				
				<div class="position-absolute bottom m-3 <?php zettaiwp_slide_color(); ?>">
				
					<h4><a class="<?php zettaiwp_slide_color(); ?>" href="<?php echo $linkimage ; ?>"><?php echo $titleslider ; ?></a></h4>
					
					<?php if ( $buttonslider ) : ?>					
					<a href="<?php echo $linkimage; ?>" class="btn btn-custom btn-sm"><?php echo $buttonslider; ?></a>					
					<?php endif; ?>
					
				</div>
				<?php endif; ?>

			</div>		
		
		</div>
		
		<?php endwhile; endif; ?>
		
	</div>

</div>