<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- include internal CSS custom styles based on ACF custom fields -->
	
	<?php get_template_part( 'inc/custom-styles' ); ?>	
	
    <?php wp_head(); ?>

</head>

<body <?php body_class(); zettaiwp_fade(); ?>>    

	<?php wp_body_open(); ?>

    <!-- Get navbar -->
		
	<?php get_template_part( 'template-parts/navbar/navbar-top' ); ?>
		
    <!-- main container -->
	
    <main <?php zettaiwp_fixed_menu();?>>
	
	<div class="container-general">
	
	