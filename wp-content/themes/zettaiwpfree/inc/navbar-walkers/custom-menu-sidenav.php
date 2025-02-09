<?php 

function zettaiwp_register_sidenav_menus() {

    $menus = array(
        'Sidenav menu' => array(
            'slug' => 'sidenav-menu',
            'menu_items' => array(
            'Home' => home_url()
            )
        )
    );

    foreach($menus as $menu_title => $menu_var) {
        register_nav_menu( $menu_var['slug'], $menu_title );
        if( !is_nav_menu($menu_title) ) {
            $menu_id = wp_create_nav_menu( $menu_title );
            foreach( $menu_var['menu_items'] as $menu_item_name => $menu_item_url ) {
                $item = array ( 'menu-item-type' => 'custom', 'menu-item-url' => $menu_item_url, 'menu-item-title' => $menu_item_name );
                wp_update_nav_menu_item( $menu_id, 0, $item );
            }
        }
     }
	 
}

add_action( 'init', 'zettaiwp_register_sidenav_menus' );

// MENU CLASS

add_filter('wp_nav_menu_objects', function ($items) {
    $hasSub = function ($menu_item_id, $items) {
        foreach ($items as $item) {
            if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) { return true; }
        }
        return false;
    };

		foreach ($items as $item) {
			if ($hasSub($item->ID, $items)) { $item->classes[] = 'menu-parent-item'; }
		}
		return $items;    
});


// ADD CLASS TO ITEM LINKS

add_filter( 'nav_menu_link_attributes', 'zettaiwp_add_class_to_items_link', 10, 3 );

function zettaiwp_add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
	$atts['class'] = 'parent';
  }
  return $atts;
}

class zettaiwp_sidenav_menu_walker extends Walker_Nav_Menu {

  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
	$output .= "<div class='dropdown-sidenav-btn'><i class='fas fa-chevron-down fa-lg'></i></div>";
    $output .= "\n$indent<ul class=\"sub-menu\">\n";
  }   

}

