</div>

<footer>

	<?php zettaiwp_border_footer(); ?>

    <div class="container-fluid py-3 bg-footer">
        
		<?php get_template_part( 'template-parts/footer-bar' ); ?>

    </div>
	
</footer>

<?php if( !is_home() ) { ?>
<a href="<?php echo esc_url( home_url('/') ); ?>" id="back-to-home" class="btn-custom" title="<?php esc_attr_e( 'Back to home', 'zettaiwp' ); ?>"><i class="fas fa-chevron-left"></i></a>
<?php } ?>

<a href="#" id="back-to-top" class="btn-custom" title="<?php esc_attr_e( 'Back to top', 'zettaiwp' ); ?>"><i class="fas fa-chevron-up"></i></a>

</main>

<?php wp_footer(); ?>

</body>

</html>