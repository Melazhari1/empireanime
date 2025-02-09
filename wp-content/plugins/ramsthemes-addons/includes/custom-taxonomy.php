<?php 

function register_my_taxes() {

	/**
	 * Taxonomy: Genres.
	 */

	$labels = [
		"name" => esc_html__( "Genres", "zettaiwp" ),
		"singular_name" => esc_html__( "Genre", "zettaiwp" ),
		"menu_name" => esc_html__( "Genres", "zettaiwp" ),
		"all_items" => esc_html__( "All Genres", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit Genre", "zettaiwp" ),
		"view_item" => esc_html__( "View Genre", "zettaiwp" ),
		"update_item" => esc_html__( "Update Genre name", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new Genre", "zettaiwp" ),
		"new_item_name" => esc_html__( "New Genre name", "zettaiwp" ),
		"parent_item" => esc_html__( "Parent Genre", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent Genre:", "zettaiwp" ),
		"search_items" => esc_html__( "Search Genres", "zettaiwp" ),
		"popular_items" => esc_html__( "Popular Genres", "zettaiwp" ),
		"separate_items_with_commas" => esc_html__( "Separate Genres with commas", "zettaiwp" ),
		"add_or_remove_items" => esc_html__( "Add or remove Genres", "zettaiwp" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Genres", "zettaiwp" ),
		"not_found" => esc_html__( "No Genres found", "zettaiwp" ),
		"no_terms" => esc_html__( "No Genres", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Genres list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Genres list", "zettaiwp" ),
		"back_to_items" => esc_html__( "Back to Genres", "zettaiwp" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "zettaiwp" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "zettaiwp" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "zettaiwp" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "zettaiwp" ),
	];

	
	$args = [
		"label" => esc_html__( "Genres", "zettaiwp" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'genres', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "genres",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "genres", [ "movies", "series" ], $args );

	/**
	 * Taxonomy: Characters & Voice Actors.
	 */

	$labels = [
		"name" => esc_html__( "Characters & Voice Actors", "zettaiwp" ),
		"singular_name" => esc_html__( "Character & Voice Actor", "zettaiwp" ),
		"menu_name" => esc_html__( "Characters & Voice Actors", "zettaiwp" ),
		"all_items" => esc_html__( "All Characters & Voice Actors", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit Character & Voice Actor", "zettaiwp" ),
		"view_item" => esc_html__( "View Character & Voice Actor", "zettaiwp" ),
		"update_item" => esc_html__( "Update Character & Voice Actor name", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new Character & Voice Actor", "zettaiwp" ),
		"new_item_name" => esc_html__( "New Character & Voice Actor name", "zettaiwp" ),
		"parent_item" => esc_html__( "Parent Character & Voice Actor", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent Character & Voice Actor:", "zettaiwp" ),
		"search_items" => esc_html__( "Search Characters & Voice Actors", "zettaiwp" ),
		"popular_items" => esc_html__( "Popular Characters & Voice Actors", "zettaiwp" ),
		"separate_items_with_commas" => esc_html__( "Separate Characters & Voice Actors with commas", "zettaiwp" ),
		"add_or_remove_items" => esc_html__( "Add or remove Characters & Voice Actors", "zettaiwp" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Characters & Voice Actors", "zettaiwp" ),
		"not_found" => esc_html__( "No Characters & Voice Actors found", "zettaiwp" ),
		"no_terms" => esc_html__( "No Characters & Voice Actors", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Characters & Voice Actors list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Characters & Voice Actors list", "zettaiwp" ),
		"back_to_items" => esc_html__( "Back to Characters & Voice Actors", "zettaiwp" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "zettaiwp" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "zettaiwp" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "zettaiwp" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "zettaiwp" ),
	];

	
	$args = [
		"label" => esc_html__( "Characters & Voice Actors", "zettaiwp" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'seiyus', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "characters_voice_actors",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "characters_voice_actors", [ "post", "movies", "reviews", "series" ], $args );

	/**
	 * Taxonomy: Staff.
	 */

	$labels = [
		"name" => esc_html__( "Staff", "zettaiwp" ),
		"singular_name" => esc_html__( "Staff", "zettaiwp" ),
		"menu_name" => esc_html__( "Staff", "zettaiwp" ),
		"all_items" => esc_html__( "All Staff", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit Staff", "zettaiwp" ),
		"view_item" => esc_html__( "View Staff", "zettaiwp" ),
		"update_item" => esc_html__( "Update Staff name", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new Staff", "zettaiwp" ),
		"new_item_name" => esc_html__( "New Staff name", "zettaiwp" ),
		"parent_item" => esc_html__( "Parent Staff", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent Staff:", "zettaiwp" ),
		"search_items" => esc_html__( "Search Staff", "zettaiwp" ),
		"popular_items" => esc_html__( "Popular Staff", "zettaiwp" ),
		"separate_items_with_commas" => esc_html__( "Separate Staff with commas", "zettaiwp" ),
		"add_or_remove_items" => esc_html__( "Add or remove Staff", "zettaiwp" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Staff", "zettaiwp" ),
		"not_found" => esc_html__( "No Staff found", "zettaiwp" ),
		"no_terms" => esc_html__( "No Staff", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Staff list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Staff list", "zettaiwp" ),
		"back_to_items" => esc_html__( "Back to Staff", "zettaiwp" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "zettaiwp" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "zettaiwp" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "zettaiwp" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "zettaiwp" ),
	];

	
	$args = [
		"label" => esc_html__( "Staff", "zettaiwp" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'staff', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "staff",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "staff", [ "post", "movies", "reviews", "series" ], $args );
}
add_action( 'init', 'register_my_taxes' );

