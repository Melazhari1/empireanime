<form role="search" method="get" class="form search-form form-inline my-2 my-lg-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div id="custom-search-input">
        <div class="input-group">
            <input type="text" name="s" class="search-query form-control border-class" placeholder="<?php esc_attr_e( 'Search', 'zettaiwp' ); ?>">
			<input type="hidden" name="post_type" value="post">
            <span class="input-group-btn">
                <button type="submit" class="btn" value="<?php esc_attr_e( 'Search', 'zettaiwp' ); ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
            </span>
        </div>
    </div>
</form>