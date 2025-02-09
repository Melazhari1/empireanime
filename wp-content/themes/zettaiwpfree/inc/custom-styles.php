<style>
body { color: <?php echo get_field('text_color', 'option'); ?>; }
body a { color: <?php echo get_field('link_color', 'option'); ?>; }
body a:hover { color: <?php echo get_field('hover_color', 'option'); ?>;	}	
ul.menu > li { font-size: <?php echo get_field('side_menu_font_size', 'option'); ?>px; }	
ul.menu > li a { color: <?php echo get_field('sidenav_text_color', 'option'); ?>; }
ul.menu > li, .sub-menu li, .menu-hover:hover { <?php zettaiwp_rounded_corners_class(); ?> }
.dropdown-sidenav-btn { color: <?php echo get_field('sidenav_text_color', 'option'); ?>; }
.sidenav { background-color: <?php echo get_field('sidenav_background', 'option'); ?>; }
.navbar { background-color: <?php echo get_field('navbar_background', 'option'); ?>; <?php if( 1 == get_field( 'navbar_shrink', 'option' ) ): ?>transition: 0.3s;<?php endif; ?> } 
.bg-sidenav { background-color: <?php echo get_field('sidenav_background', 'option'); ?>; <?php zettaiwp_border_sidenav(); ?>; }
.bg-current { background-color: <?php echo get_field('current_page_background', 'option'); ?>; }
.bg-footer { background-color: <?php echo get_field('footer_background', 'option'); ?>; }
.bg-nextprev { background-color: <?php echo get_field('nextprev_background', 'option'); ?>; }
.pace .pace-progress { background-color: <?php echo get_field('load_bar_color', 'option'); ?>; }
.sidebarIconToggle { <?php if ( 0 == get_field('fixed_navbar', 'option') ) : ?>position: absolute; top: -45px; right: 35px;<?php elseif( 1 == get_field('fixed_navbar', 'option') ): ?>position: fixed; top: 25px; right: 35px;<?php endif; ?> }
.spinner { background-color: <?php echo get_field('hamburger_menu_color', 'option'); ?>; }
.logo {	height: <?php echo get_field('logo_height', 'option'); ?>px; }
.navbar-height { height: <?php echo get_field('navbar_height', 'option'); ?>px; }
.bottom-grad { top: <?php echo get_field('navbar_height', 'option'); ?>px; }
.scrollbar::-webkit-scrollbar-thumb { border: 3px solid <?php echo get_field('side_menu_background', 'option'); ?>; }
.navigation-sticky-top { top: <?php echo get_field('navbar_height', 'option'); ?>px; }
.col-sticky-top { top: calc(<?php echo get_field('navbar_height', 'option'); ?>px + 2rem); }
.pt-fixed { top: <?php echo get_field('navbar_height', 'option'); ?>px; }
.card-custom { background-color: <?php echo get_field('card_color', 'option'); ?>; <?php zettaiwp_rounded_corners_class(); ?> }
.card-movies-series { background-color: <?php echo get_field('movie_series_card_color', 'option'); ?>; <?php zettaiwp_rounded_corners_class(); ?> }
.card-body { <?php zettaiwp_rounded_corners_class(); ?> }
.single-comments-content { background-color: <?php echo get_field('comment_card_color', 'option'); ?>; }
.movie-series-bg-color { background: rgb(255,255,255); background: linear-gradient(90deg, rgba(255,255,255,1) 0%, <?php zettaiwp_movie_series_background_color(); ?> 50%, rgba(255,255,255,1) 100%); }
.border-sidenav-left { <?php zettaiwp_border_sidenav_left(); ?>; }
.page-numbers { color: <?php echo get_field('buttons_text_color', 'option'); ?>; background-color: <?php echo get_field('buttons_color', 'option'); ?>; border-color: <?php echo get_field('buttons_color', 'option'); ?>; <?php zettaiwp_more_rounded_corners_class(); ?> } 
.img-fluid { <?php zettaiwp_rounded_corners_class(); ?> }
.border-class, #border-class { <?php zettaiwp_rounded_corners_class(); ?> }
.slider-wrap { <?php zettaiwp_rounded_corners_class(); ?>; height: <?php echo get_field('home_slider_height', 'option'); ?>px; }
.slider-articles-wrap { <?php zettaiwp_rounded_corners_class(); ?>; height: <?php echo get_field('latest_articles_height', 'option'); ?>px; }
.feat-cat-wrap { <?php zettaiwp_rounded_corners_class(); ?>; height: <?php echo get_field('feat_categories_height', 'option'); ?>px; }
.gallery, .gallery-item img { <?php zettaiwp_rounded_corners_class(); ?> }
.form-control, .widget_archive select, .widget_categories select, .modal-content { <?php zettaiwp_rounded_corners_class(); ?> }
.border-class-top { <?php zettaiwp_rounded_corners_class_top(); ?> }
.border-class-bottom { <?php zettaiwp_rounded_corners_class_bottom(); ?> }
.border-class-left { <?php zettaiwp_rounded_corners_class_left(); ?> }
.border-class-right { <?php zettaiwp_rounded_corners_class_right(); ?> }
.latest-articles-title-color { color: <?php echo get_field('latest_articles_title_color', 'option'); ?>; }
.popular-reads-title-color { color: <?php echo get_field('popular_reads_title_color', 'option'); ?>; }
.home-slider-title-color { color: <?php echo get_field('home_slider_title_color', 'option'); ?>; }
.feat-reviews-title-color { color: <?php echo get_field('feat_reviews_title_color', 'option'); ?>; }
.feat-posts-title-color { color: <?php echo get_field('feat_posts_title_color', 'option'); ?>; }
.feat-categories-title-color { color: <?php echo get_field('feat_categories_title_color', 'option'); ?>; }
.feat-movies-title-color { color: <?php echo get_field('feat_movies_title_color', 'option'); ?>; }
.feat-series-title-color { color: <?php echo get_field('feat_series_title_color', 'option'); ?>; } 
.widget_titles { color: <?php echo get_field('widget_titles_color', 'option'); ?>; <?php if ( 1 == get_field('widget_titles_border', 'option') ) : ?>border-bottom: 1px solid #F1F1F1;<?php endif; ?> }  
.widget_media_image img { <?php zettaiwp_rounded_corners_class(); ?> }
.home-va-btn a { color: <?php echo get_field('see_all_color', 'option'); ?>; }
.search-term-result { color: <?php echo get_field('search_result_color', 'option'); ?>; }
.menu-hover:hover { background: <?php echo get_field('menu_item_hover_color', 'option'); ?>; }
.btn-custom { color: <?php echo get_field('buttons_text_color', 'option'); ?> !important; background-color: <?php echo get_field('buttons_color', 'option'); ?> !important; border-color: <?php echo get_field('buttons_color', 'option'); ?> !important; <?php zettaiwp_rounded_corners_class(); ?> } 
.btn-custom:hover, .btn-custom:focus, .btn-custom:active, .btn-custom.active, .open .dropdown-toggle.btn-custom { color: <?php echo get_field('buttons_text_hover_color', 'option'); ?> !important; background-color: <?php echo get_field('buttons_hover_color', 'option'); ?> !important; border-color: <?php echo get_field('buttons_hover_color', 'option'); ?> !important; } 
.nav-link { <?php zettaiwp_rounded_corners_class(); ?> } 
.nav-link.active { color: <?php echo get_field('buttons_text_color', 'option'); ?> !important; background-color: <?php echo get_field('buttons_color', 'option'); ?> !important; border-color: <?php echo get_field('buttons_color', 'option'); ?> !important; <?php zettaiwp_rounded_corners_class(); ?> }
div.wpcf7-validation-errors, div.wpcf7-acceptance-missing, div.wpcf7-mail-sent-ok, div.wpcf7-mail-sent-ng, div.wpcf7-aborted { <?php zettaiwp_rounded_corners_class(); ?> }
#search input[type="radio"]:after, #search input[type="radio"]:checked:after { <?php zettaiwp_rounded_corners_class(); ?> }
#page-content-wrapper { min-height: calc(100vh - <?php echo get_field('navbar_height', 'option'); ?>px) }
mark, .mark { <?php zettaiwp_rounded_corners_class(); ?> }
<?php if ( 1 == get_field('capital_letter', 'option') ) : ?>body.single .post-text-content p:first-of-type:first-letter { font-weight: 700; font-style: normal; float: left; font-size: 75px; line-height: 65px; padding: 12px; background: #333; color: #fff; margin-right: 12px; <?php zettaiwp_rounded_corners_class(); ?> }<?php endif; ?>
</style>