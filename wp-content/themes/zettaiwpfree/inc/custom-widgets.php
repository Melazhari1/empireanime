<?php

class zettaiwp_recent_posts_widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'zettaiwp') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			
		$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 
		'posts_per_page' => $number, 
		'no_found_rows' => true, 
		'post_status' => 'publish',
		'post__not_in' => array( get_the_ID() ),
		'ignore_sticky_posts' => true )
		) );
		if( $r->have_posts() ) :
			
		print_r ($before_widget);
		if( $title ) print_r ($before_title . $title . $after_title);
			
?>
			
<div class="my-3">

    <?php while( $r->have_posts() ) : $r->the_post(); ?>
	
	<div class="d-flex mb-3">          

            <div class="col pl-0">
				<div class="img__wrap">
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail', array( 'class'=> 'img-fluid shadow-sm')); } else { zettaiwp_default_img_placeholder(); } ?>
					</a>	
				</div>
            </div>
			
			<div class="col-8 p-2">
                <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                <small class="text-lowercase d-block"><?php echo get_the_date(); ?></small>
            </div>        
   
	</div>
	
    <?php endwhile; ?>	
	
</div>

<?php
		print_r ($after_widget);
		
			wp_reset_postdata();
		
		endif;
	}
}

function zettaiwp_recent_posts_widget_registration() {
	unregister_widget('WP_Widget_Recent_Posts');
	register_widget('zettaiwp_recent_posts_widget');
}

add_action('widgets_init', 'zettaiwp_recent_posts_widget_registration');