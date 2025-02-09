<?php 

add_action( 'after_setup_theme', 'zettaiwp_setup' );

//**************************************************************************************************************		
//**************************************************************************************************************

add_action( 'admin_notices', function() {
    echo '<div class="notice notice-error"><p><strong>This is a free template and does NOT include support and updates</strong>. <a href="https://www.templatemonster.com/wordpress-themes/zettai-anime-news-reviews-and-database-wordpress-theme-209467.html?utm_campaign=blog_site_ramsthemes1&utm_source=ramsthemes1&utm_medium=referral&aff=ramsthemes1">Get the Full version of ZETTAI</a> to try all the functions and access the official support.</p></div>';
} );

function banner_admin_notice() {	
	echo '<div class="notice" style="margin: 0; padding: 0; border: 0; background: unset; box-shadow: unset;"><div style="width: 100%; display: flex; align-items: center; gap: 15px;">
    <a href="https://www.templatemonster.com/wordpress-themes/zettai-anime-news-reviews-and-database-wordpress-theme-209467.html?utm_campaign=blog_site_ramsthemes1&utm_source=ramsthemes1&utm_medium=referral&aff=ramsthemes1"><img src="https://res.cloudinary.com/ramsthemes/image/upload/v1735832664/resources/promo%20images/zettai/zettai-banner-back.jpg" style="max-width: 100%; height: auto;"></a>
    </div></div>';
}
add_action( 'admin_notices', 'banner_admin_notice' );

// Show admin message if ACF is not active

if ( !class_exists('acf') ) { 
	
    add_action( 'admin_notices', function() {
        echo '<div class="notice notice-warning"><p><strong>ACF is not active!</strong> Features of this theme will not function correctly. Please install them first pressing <strong>Begin installing plugins</strong></p></div>';
    } );
	
}

function zettaiwp_setup() {
	
// ACF CUSTOM FIELDS
	
get_template_part( 'inc/custom-fields' ); 

// HIDE CUSTOM FIELDS SECTION 

add_filter('acf/settings/show_admin', '__return_false');

// ENABLE FIELD LABELS TRANSLATION

function custom_acf_settings_localization($localization){
  return true;
}
add_filter('acf/settings/l10n', 'custom_acf_settings_localization');

function custom_acf_settings_textdomain($domain){
  return 'zettaiwp';
}
add_filter('acf/settings/l10n_textdomain', 'custom_acf_settings_textdomain');
	
// ACF CUSTOM FIELDS SYNC
	
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json-save';
    
    
    // return
    return $path;
    
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json-load';
    
    
    // return
    return $paths;
    
}

// ACF OPTIONS PAGE

add_action('init', 'add_theme_options_pages');
function add_theme_options_pages() {
	
    if (!function_exists('acf_add_options_page')) {
        return;
    }
	
    // add code here to add options pages
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// FUNCTIONS BASED ON ACF FIELDS

require get_template_directory() . '/inc/acf-functions.php';

// TGMPA (FOR BUNDLED PLUGINS)

get_template_part( 'inc/tgm/tgmpa' ); 

// THEME SUPPORT

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'comment-list' ) );
add_editor_style( 'assets/css/custom-editor-styles.css' );

// TEXTDOMAIN

load_theme_textdomain('zettaiwp', get_template_directory() . '/languages');

// REGISTER FOOTER SIDEBAR

function zettaiwp_slug_widgets_init() {
	
	// SIDENAV SIDEBAR
	
    register_sidebar( array(
	'name' => 'Sidenav Sidebar',
	'id' => 'sidenav-sidebar',
	'description' => 'Appears in the left side area of site',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );
	
	add_filter('widget_nav_menu_args', 'my_args'); // for sidenav menu in widgets
    function my_args($args) { //$args is only argument needed to add custom walker
       return array_merge( $args, array(
            'theme_location' => 'sidenav-menu',
			'menu_class' => 'menu',
			'menu_id' => 'accordion-sidenav',
			'add_li_class'  => 'menu-hover',
			'walker' => new zettaiwp_sidenav_menu_walker,
			'fallback_cb' => false,	
       ) );
    }		
	
	// RIGHT SIDEBAR
	
    register_sidebar( array(
	'name' => 'Right Sidebar',
	'id' => 'right-sidebar',
	'description' => 'Appears in the right side area of posts and pages',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );	
	
	// FOOTER BAR

	register_sidebar( array(
	'name' => 'Footer Bar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );
	
	register_sidebar( array(
	'name' => 'Footer Bar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );
	
	register_sidebar( array(
	'name' => 'Footer Bar 3',
	'id' => 'footer-sidebar-3',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );
	
	register_sidebar( array(
	'name' => 'Footer Bar 4',
	'id' => 'footer-sidebar-4',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div id="%1$s" class="%2$s mb-4">',
	'after_widget' => '</div>',
	'before_title' => '<h6 class="widget_titles">',
	'after_title' => '</h6>',
	) );
		
}

add_action( 'widgets_init', 'zettaiwp_slug_widgets_init' );

// ADD LIST ADDITIONAL CLASS

function zettaiwp_add_additional_class_on_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'zettaiwp_add_additional_class_on_li', 1, 3);

// IMAGE SIZES

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
 
if ( function_exists( 'add_theme_support' ) ) {	
	
	add_theme_support ( 'post-thumbnails', array( 'post', 'page' ) );
	add_image_size ( 'zettaiwp-img-author-thumb', 36, 36, true ); // square image author thumb
	add_image_size ( 'zettaiwp-img-poster-thumb-small', 250, 375, true ); // movie cover image
	add_image_size ( 'zettaiwp-img-poster-thumb', 600, 900, true ); // movie cover image
	add_image_size ( 'zettaiwp-img-square-small', 300, 300, true ); // square profile image
	add_image_size ( 'zettaiwp-img-square-medium', 450, 450, true ); // square image
	add_image_size ( 'zettaiwp-img-square-large', 600, 600, true ); // square image
	add_image_size ( 'zettaiwp-img-16-9', 1170, 756, true ); // 16:9 image
	add_image_size ( 'zettaiwp-img-16-9-small', 500, 323, true ); // 16:9 image
	add_image_size ( 'zettaiwp-img-9-16', 756, 1170, true ); // 9:16 image
	add_image_size ( 'zettaiwp-img-review-home', 1170, 850, true ); // review image
}

function zettaiwp_responsive_images( $image_id, $image_size, $max_width ) {
	// Check if the image ID is not blank
	if ( $image_id != '' ) {
		// Set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );
		// Set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		// Generate the markup for the responsive image
		echo 'src="' . $image_src . '" loading="lazy" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
	}
}

// DEFAULT IMAGE SETTINGS

function zettaiwp_default_image_settings() {
	update_option( 'image_default_align', 'center' );
	update_option( 'image_default_size', 'large' );
}

// DEFAULT IMAGE PLACEHOLDER

function zettaiwp_default_img_placeholder() {
	$tpldir = get_template_directory_uri();
	$pch_img_def_src = $tpldir . '/assets/img/placeholder.jpg';
	echo '<img class="img-fluid shadow-sm" src="'. $pch_img_def_src .'" />';
}

// REMOVE INLINE STYLES FROM WP-CAPTION

add_filter( 'img_caption_shortcode_width', '__return_false' );

// NOT ADD <P> ON IMAGES

function zettaiwp_filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'zettaiwp_filter_ptags_on_images');

// ADD CLASS TO POST IMG
	
function zettaiwp_add_rounded_image_responsive_class($content) {
	
	global $post;
	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";		
	$replacement = '<img$1class="$2 img-fluid mb-3"$3>';	
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
	
}
	
add_filter('the_content', 'zettaiwp_add_rounded_image_responsive_class');
add_filter('acf_the_content', 'zettaiwp_add_rounded_image_responsive_class');

// THUMBS IN ADMIN FOR POSTS
 
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_pages_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);
add_filter('manage_pages_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	
	$columns = array_slice($columns, 0, 1, true) + array("thumbnail" => "Image") + array_slice($columns, 1, count($columns) - 1, true);
	return $columns;
  
}

function manage_img_column($column_name, $post_id) {
	
	if( $column_name == 'thumbnail' ) {		
		
		$thumbimage = get_the_post_thumbnail($post_id, 'thumbnail', array( 'class' => 'acf-post-image-back' ));
		
		if ( in_array( get_post_type() , array('movies','series') ) ) {
			
			if ( $thumbimage ) {
				
				echo $thumbimage;
														
			} 
		
		} else {
			
			echo $thumbimage;
			
		}
		
	}
	return $column_name;
 
}

// CPT frontend order for movies and series

// genres archive order
function zettaiwp_alphabetical_taxonomy_queries( $query ) {
    if ( !is_admin() && $query->is_tax( 'genres' ) && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'zettaiwp_alphabetical_taxonomy_queries' );

// movies archive order
if( !is_admin() ){ 
	add_filter( 'posts_orderby' , 'zettaiwp_custom_movies_archive_order' );
}

function zettaiwp_custom_movies_archive_order( $orderby ) { 
	global $wpdb;
	// Check if the query is for an archive
	if ( is_archive() && get_query_var("post_type") === "movies" ) {
		// Query was for archive, then set order
		return "$wpdb->posts.post_title ASC";
		}	
	return $orderby;
}

// series archive order
if( !is_admin() ){ 
	add_filter( 'posts_orderby' , 'zettaiwp_custom_series_archive_order' );
}

function zettaiwp_custom_series_archive_order( $orderby ) { 
	global $wpdb;
	// Check if the query is for an archive
	if ( is_archive() && get_query_var("post_type") === "series" ) {
		// Query was for archive, then set order
		return "$wpdb->posts.post_title ASC";
		}	
	return $orderby;
}

// Include post and reviews on archive date

function zettaiwp_custom_post_date_archive($query) {
    if ($query->is_date)
        $query->set( 'post_type', array('post', 'reviews') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action('pre_get_posts', 'zettaiwp_custom_post_date_archive');

// BASE PAGINATION

function zettaiwp_base_pagination() {
	
    global $wp_query;

    $big = 999999999; 
	
    $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big, false) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
		'prev_text' => sprintf( '<i class="fas fa-angle-left fa-lg"></i> %1$s', __( '','zettaiwp' ) ),
		'next_text' => sprintf( '%1$s ', __( '','zettaiwp' ) ),
    ) );

    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
		
		echo '<div class="row"><div class="col-12"><div class="my-3 text-center paginationnav">'. $paginate_links . '</div></div></div>';

    }
}

// BOOTSTRAP STYLE TABLES

function zettaiwp_bootstrap_responsive_table( $content ) {
    $content = str_replace(
        [ '<table>', '</table>' ],
        [ '<table class="table table-bordered table-hover table-striped table-responsive">', '</table>' ],
        $content
    );

    return $content;
}

add_filter( 'the_content', 'zettaiwp_bootstrap_responsive_table' );

// EXCERPT IF EXISTS

function zettaiwp_display_default_excerpt( $excerpt ) {

    if ( has_excerpt() ) {
        return $excerpt;
    } else {
        return __( '' );
    }
}
add_filter( 'the_excerpt', 'zettaiwp_display_default_excerpt' );

// CATEGORY OR TAXONOMY LIST

function zettaiwp_cat_tax_list() {
	
	if ( has_category() ) {
		//get all the categories the post belongs to
		$categories = wp_get_post_categories( get_the_ID() );
		//loop through them
		echo '<small class="d-block mb-3">';
		foreach($categories as $c){
		$cat = get_category( $c );
		//get the name of the category
		$cat_id = get_cat_ID( $cat->name );
		//make a list item containing a link to the category
		 echo '<a class="catlist" href="'.get_category_link($cat_id).'">'.$cat->name.'</a>';
		}
		 echo '</small>';
	}
	
	else if ( has_term( '', 'genres') ) { // if has Custom Taxonomy list in loop
		
		$terms = get_the_terms( get_the_ID() , 'genres' ); 
			echo '<small class="d-block mb-3">';
				foreach ( $terms as $term ) {
				$term_link = get_term_link( $term, 'genres' );
				if( is_wp_error( $term_link ) )
				continue;
				echo '<a class="catlist" href="' . $term_link . '">' . $term->name . '</a>';
				}; 
			echo '</small>';
		
	}
	
}

// TAG LIST ON POST IN LOOP

function zettaiwp_taglist() {
	if( has_tag() ) {
		echo '<div class="container my-3 clear"><div class="row"><div class="d-inline scroll pt-2">';
			$tags = get_the_tags(); if ($tags) {
				foreach ($tags as $tag) {
				echo '<a class="btn btn-custom btn-sm mr-2 mb-2" href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'</a>';
				}; 
			}
		echo '</div></div></div>';
	}
}

// TAG AND TAXONOMY LIST ON POST IN LOOP

function zettaiwp_custom_taxonomies_terms_links() {  
    global $post, $post_id;  
    // get post by post id  
    $post = get_post($post->ID);  
    // get post type by post  
    $post_type = $post->post_type;  
    // get post type taxonomies  
    $taxonomies = get_object_taxonomies($post_type);  
    $out = "<div class='my-3'><div class='d-inline scroll pt-2'>";  
    foreach ($taxonomies as $taxonomy) {          
          
        // get the terms related to post  
        $terms = get_the_terms( $post->ID, $taxonomy );  
        if ( !empty( $terms ) ) {  
            foreach ( $terms as $term )  
                $out .= '<a class="btn btn-custom btn-sm mr-2 mb-2" href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a> ';  
        }  
          
    }  
    $out .= "</div></div>";  
    return $out;  
}	

// GET GENRES TAX LIST

function zettaiwp_genres() {
	if ( has_term( '', 'genres') ) {		
		$terms = get_the_terms( get_the_ID() , 'genres' ); 			
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term, 'genres' );
				if( is_wp_error( $term_link ) )
				continue;
				echo '<a class="btn btn-custom btn-sm mr-2 mb-2" href="' . $term_link . '">' . $term->name . '</a>';
			}; 		
	}	
}

// GET CATEGORIES LIST

function zettaiwp_categories_list() { 
	if ( has_term( '', 'category') ) {		
		$terms = get_the_terms( get_the_ID() , 'category' ); 			
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term, 'category' );
				if( is_wp_error( $term_link ) )
				continue;
				echo '<a class="btn btn-custom btn-sm mr-2 mb-2" href="' . $term_link . '">' . $term->name . '</a>';
			}; 		
	}	
}

// GET TAGS LIST

function zettaiwp_tags_list() {  
	if ( has_term( '', 'post_tag') ) {		
		$terms = get_the_terms( get_the_ID() , 'post_tag' ); 			
			foreach ( $terms as $term ) {
				$term_link = get_term_link( $term, 'post_tag' );
				if( is_wp_error( $term_link ) )
				continue;
				echo '<a class="btn btn-custom btn-sm mr-2 mb-2" href="' . $term_link . '">' . $term->name . '</a>';
			}; 		
	}	
}

// INCLUDE CUSTOM POST TYPES IN ARCHIVES

function zettaiwp_include_custom_post_types_in_archive_pages( $query ) {
    if ( $query->is_main_query() && ! is_admin() && ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) ) {
        $query->set( 'post_type', array( 'post', 'reviews' ) );
    }
}
add_action( 'pre_get_posts', 'zettaiwp_include_custom_post_types_in_archive_pages' );

// STYLE TAG WIDGET WITH CUSTOM BUTTON

add_filter( 'wp_generate_tag_cloud_data', function( $zettaiwp_tag_data )
{
    return array_map ( 
        function ( $item )
        {
			$item['font_size'] .= '1rem';
            $item['class'] .= ' btn btn-custom btn-sm mb-1';
            return $item;
        }, 
        (array) $zettaiwp_tag_data 
    );

} );

// REMOVES () FROM TAG WIDGET

function zettaiwp_tagcloud_postcount_filter ($variable) {
	$variable = str_replace('<span class="tag-link-count"> (', ' <mark class="post_count badge badge-primary badge-pill"> ', $variable);
	$variable = str_replace(')</mark>', '</span>', $variable);
	return $variable;
}
add_filter('wp_tag_cloud','zettaiwp_tagcloud_postcount_filter');

// REMOVES () FROM ARCHIVES WIDGET

function zettaiwp_archive_postcount_filter ($variable) {
   $variable = str_replace('(', ' <mark class="post_count badge badge-primary badge-pill"> ', $variable);
   $variable = str_replace(')', '</mark> ', $variable);
   return $variable;
}
add_filter('get_archives_link', 'zettaiwp_archive_postcount_filter');

// REMOVES () FROM CATEGORIES WIDGET

function zettaiwp_categories_postcount_filter ($variable) {
   $variable = str_replace('(', ' <mark class="post_count badge badge-primary badge-pill"> ', $variable);
   $variable = str_replace(')', '</mark> ', $variable);
   return $variable;
}
add_filter('wp_list_categories', 'zettaiwp_categories_postcount_filter');

// RAMSTHEMES CUSTOM FORMAT FOR RECENT POSTS DEFAULT WIDGET

require get_template_directory() . '/inc/custom-widgets.php';

// EMBED VIDEOS IN 16:9 FOMAT AND ROUNDED CORNERS

function zettaiwp_embed_wrap($html, $url, $attr, $post_id) {	
	return '<div class="embed-responsive embed-responsive-16by9 mb-3 border-class">' . $html . '</div>'; 
}

add_filter('embed_oembed_html', 'zettaiwp_embed_wrap', 10, 4);

// COMMENT FORM BOOTSTRAP STYLE

get_template_part( 'inc/comments/comments-styles' ); 

// DISPLAY AUTHOR WHEN IS NOT ADMIN

function zettaiwp_display_author() {
	
	$authorid = get_post_field('post_author', get_the_ID());
	
	if ($authorid==1): 	
				
	else : /* if author is not admin*/
				
		echo '<div class="my-2 text-uppercase">';
		echo get_avatar( get_the_author_meta( 'ID' ), 50, '', '', $args = array( 'class' => 'mr-2' ) ); the_author_posts_link(); 
		echo '</div>';
				
	endif; 
	
}

// REMOVE TYPE ATTRIBUTES

add_filter('style_loader_tag', 'zettaiwp_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'zettaiwp_remove_type_attr', 10, 2);

function zettaiwp_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

// ADMIN SCRIPTS

function zettaiwp_load_custom_wp_admin_style() {
	
    wp_enqueue_style( 'acf_styles', get_template_directory_uri() . '/assets/css/acf-backend.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/fontawesome/all.min.css' );
	
}
add_action( 'admin_enqueue_scripts', 'zettaiwp_load_custom_wp_admin_style' );

// CUSTOM CSS

if ( !is_admin() ) { 

   /* adds stylesheet file to the end of the queue */
	function zettaiwp_override_stylesheet() {
		$dir = get_template_directory_uri();
		wp_enqueue_style('zettaiwp-custom-css', $dir . '/assets/css/main.css', array(), 'all');
	}
	add_action('wp_enqueue_scripts', 'zettaiwp_override_stylesheet', PHP_INT_MAX); 
	
}

// REGISTER ALL SCRIPTS

function zettaiwp_register_scripts() {		
	  
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/bootstrap.bundle.min.js', array('jquery'), '4.3.1', true );
	wp_register_script( 'scrollbar-js', get_template_directory_uri() . '/assets/js/simplebar.min.js', array('jquery'), false, true );	
	wp_register_script( 'pace-js', get_template_directory_uri() . '/assets/js/pace/pace.min.js', array('jquery'), false, true );
	wp_register_script( 'zettaiwp-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true );		
	wp_register_script( 'navbar-js', get_template_directory_uri() . '/assets/js/navbar.js', array('jquery'), false, true );	
	wp_register_script( 'shrink-js', get_template_directory_uri() . '/assets/js/shrink.js', array('jquery'), false, true );
	wp_register_script( 'imagesloaded-js', get_template_directory_uri() . '/assets/js/pkgd/imagesloaded.pkgd.min.js', array('jquery'), '4.0', true );		
	wp_register_script( 'flickity-js', get_template_directory_uri() . '/assets/js/pkgd/flickity.pkgd.min.js', array('jquery'), '2.2', true );
		
}
add_action( 'wp_enqueue_scripts', 'zettaiwp_register_scripts' );

// STYLESHEETS

function zettaiwp_enqueue_stylesheets() { 

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css' );
	wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/assets/css/flickity.min.css' );	
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/fontawesome/all.min.css' );
	wp_enqueue_style( 'scrollbar-css', get_template_directory_uri() . '/assets/css/simplebar.min.css' );

}
add_action( 'wp_enqueue_scripts', 'zettaiwp_enqueue_stylesheets' );

// GOOGLE FONTS

function zettaiwp_google_fonts() {	
	
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap', [], null );

}
add_action( 'wp_enqueue_scripts', 'zettaiwp_google_fonts' );

// Conditional unused

add_filter( 'wpcf7_load_js', '__return_false' ); add_filter( 'wpcf7_load_css', '__return_false' );

// FRONTEND BASIC SCRIPTS

function zettaiwp_basic_scripts_and_styles() {		
	
	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_script( 'navbar-js');
	wp_enqueue_script( 'scrollbar-js' );
	wp_enqueue_script( 'zettaiwp-custom-js' );
	wp_script_add_data( 'zettaiwp-custom-js', 'async', true );	
		
}
add_action( 'wp_enqueue_scripts', 'zettaiwp_basic_scripts_and_styles' );

// SHRINK

function zettaiwp_shrink_script() {	
	
	if( 1 == get_field( 'navbar_shrink', 'option' ) ): 	
	
		wp_enqueue_script( 'shrink-js' );	
		
	endif; 	

}
add_action('wp_enqueue_scripts', 'zettaiwp_shrink_script'); 

// FLICK

function zettaiwp_flick_script() {	
	  		    	  
	wp_enqueue_script( 'flickity-js' );	

}
add_action('wp_enqueue_scripts', 'zettaiwp_flick_script'); 

// PACE LOAD BAR

function zettaiwp_pace_script() {	

	if( 1 == get_field( 'activate_load_bar', 'option' ) ): 	
	  		    	  
		wp_enqueue_script( 'pace-js' );	  
		
	endif; 	

}
add_action('wp_enqueue_scripts', 'zettaiwp_pace_script'); 


}
