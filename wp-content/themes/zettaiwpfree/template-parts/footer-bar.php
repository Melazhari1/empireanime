<div class="row justify-content-center">

    <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?>
    <div class="col-auto">
        <div class="p-3 text-center">
            <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
        </div>
    </div>
	<div class="w-100"></div>
    <?php } ?>
	
    <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
    <div class="col-auto">
        <div class="p-3 text-center">
            <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
        </div>
    </div>
	<div class="w-100"></div>
    <?php } ?>

    <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
    <div class="col-auto">
        <div class="p-3 text-center">
            <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
        </div>
    </div>
	<div class="w-100"></div>
    <?php } ?>

    <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
    <div class="col-auto">
        <div class="p-3 text-center">
            <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
        </div>
    </div>
	<div class="w-100"></div>
    <?php } ?>

</div>