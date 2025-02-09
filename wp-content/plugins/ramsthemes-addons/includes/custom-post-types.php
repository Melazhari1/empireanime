<?php

function register_my_cpts() {

	/**
	 * Post Type: Movies.
	 */

	$labels = [
		"name" => esc_html__( "Movies", "zettaiwp" ),
		"singular_name" => esc_html__( "Movie", "zettaiwp" ),
		"menu_name" => esc_html__( "My Movies", "zettaiwp" ),
		"all_items" => esc_html__( "All Movies", "zettaiwp" ),
		"add_new" => esc_html__( "Add new", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new Movie", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit Movie", "zettaiwp" ),
		"new_item" => esc_html__( "New Movie", "zettaiwp" ),
		"view_item" => esc_html__( "View Movie", "zettaiwp" ),
		"view_items" => esc_html__( "View Movies", "zettaiwp" ),
		"search_items" => esc_html__( "Search Movies", "zettaiwp" ),
		"not_found" => esc_html__( "No Movies found", "zettaiwp" ),
		"not_found_in_trash" => esc_html__( "No Movies found in trash", "zettaiwp" ),
		"parent" => esc_html__( "Parent Movie:", "zettaiwp" ),
		"featured_image" => esc_html__( "Featured image for this Movie", "zettaiwp" ),
		"set_featured_image" => esc_html__( "Set featured image for this Movie", "zettaiwp" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Movie", "zettaiwp" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Movie", "zettaiwp" ),
		"archives" => esc_html__( "Movie archives", "zettaiwp" ),
		"insert_into_item" => esc_html__( "Insert into Movie", "zettaiwp" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Movie", "zettaiwp" ),
		"filter_items_list" => esc_html__( "Filter Movies list", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Movies list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Movies list", "zettaiwp" ),
		"attributes" => esc_html__( "Movies attributes", "zettaiwp" ),
		"name_admin_bar" => esc_html__( "Movie", "zettaiwp" ),
		"item_published" => esc_html__( "Movie published", "zettaiwp" ),
		"item_published_privately" => esc_html__( "Movie published privately.", "zettaiwp" ),
		"item_reverted_to_draft" => esc_html__( "Movie reverted to draft.", "zettaiwp" ),
		"item_trashed" => esc_html__( "Movie trashed.", "zettaiwp" ),
		"item_scheduled" => esc_html__( "Movie scheduled", "zettaiwp" ),
		"item_updated" => esc_html__( "Movie updated.", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent Movie:", "zettaiwp" ),
	];

	$args = [
		"label" => esc_html__( "Movies", "zettaiwp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "movies", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "category", "post_tag", "genres", "characters_voice_actors", "staff" ],
		"show_in_graphql" => false,
	];

	register_post_type( "movies", $args );

	/**
	 * Post Type: Editor Reviews.
	 */

	$labels = [
		"name" => esc_html__( "Editor Reviews", "zettaiwp" ),
		"singular_name" => esc_html__( "Editor Review", "zettaiwp" ),
		"menu_name" => esc_html__( "My Editor Reviews", "zettaiwp" ),
		"all_items" => esc_html__( "All Editor Reviews", "zettaiwp" ),
		"add_new" => esc_html__( "Add new", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new Editor Review", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit Editor Review", "zettaiwp" ),
		"new_item" => esc_html__( "New Editor Review", "zettaiwp" ),
		"view_item" => esc_html__( "View Editor Review", "zettaiwp" ),
		"view_items" => esc_html__( "View Editor Reviews", "zettaiwp" ),
		"search_items" => esc_html__( "Search Editor Reviews", "zettaiwp" ),
		"not_found" => esc_html__( "No Editor Reviews found", "zettaiwp" ),
		"not_found_in_trash" => esc_html__( "No Editor Reviews found in trash", "zettaiwp" ),
		"parent" => esc_html__( "Parent Editor Review:", "zettaiwp" ),
		"featured_image" => esc_html__( "Featured image for this Editor Review", "zettaiwp" ),
		"set_featured_image" => esc_html__( "Set featured image for this Editor Review", "zettaiwp" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Editor Review", "zettaiwp" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Editor Review", "zettaiwp" ),
		"archives" => esc_html__( "Editor Review archives", "zettaiwp" ),
		"insert_into_item" => esc_html__( "Insert into Editor Review", "zettaiwp" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Editor Review", "zettaiwp" ),
		"filter_items_list" => esc_html__( "Filter Editor Reviews list", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Editor Reviews list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Editor Reviews list", "zettaiwp" ),
		"attributes" => esc_html__( "Editor Reviews attributes", "zettaiwp" ),
		"name_admin_bar" => esc_html__( "Editor Review", "zettaiwp" ),
		"item_published" => esc_html__( "Editor Review published", "zettaiwp" ),
		"item_published_privately" => esc_html__( "Editor Review published privately.", "zettaiwp" ),
		"item_reverted_to_draft" => esc_html__( "Editor Review reverted to draft.", "zettaiwp" ),
		"item_trashed" => esc_html__( "Editor Review trashed.", "zettaiwp" ),
		"item_scheduled" => esc_html__( "Editor Review scheduled", "zettaiwp" ),
		"item_updated" => esc_html__( "Editor Review updated.", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent Editor Review:", "zettaiwp" ),
	];

	$args = [
		"label" => esc_html__( "Editor Reviews", "zettaiwp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "reviews", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "comments", "author" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "reviews", $args );

	/**
	 * Post Type: Series.
	 */

	$labels = [
		"name" => esc_html__( "Series", "zettaiwp" ),
		"singular_name" => esc_html__( "TV Serie", "zettaiwp" ),
		"menu_name" => esc_html__( "My Series", "zettaiwp" ),
		"all_items" => esc_html__( "All Series", "zettaiwp" ),
		"add_new" => esc_html__( "Add new", "zettaiwp" ),
		"add_new_item" => esc_html__( "Add new TV Serie", "zettaiwp" ),
		"edit_item" => esc_html__( "Edit TV Serie", "zettaiwp" ),
		"new_item" => esc_html__( "New TV Serie", "zettaiwp" ),
		"view_item" => esc_html__( "View TV Serie", "zettaiwp" ),
		"view_items" => esc_html__( "View Series", "zettaiwp" ),
		"search_items" => esc_html__( "Search Series", "zettaiwp" ),
		"not_found" => esc_html__( "No Series found", "zettaiwp" ),
		"not_found_in_trash" => esc_html__( "No Series found in trash", "zettaiwp" ),
		"parent" => esc_html__( "Parent TV Serie:", "zettaiwp" ),
		"featured_image" => esc_html__( "Featured image for this TV Serie", "zettaiwp" ),
		"set_featured_image" => esc_html__( "Set featured image for this TV Serie", "zettaiwp" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this TV Serie", "zettaiwp" ),
		"use_featured_image" => esc_html__( "Use as featured image for this TV Serie", "zettaiwp" ),
		"archives" => esc_html__( "TV Serie archives", "zettaiwp" ),
		"insert_into_item" => esc_html__( "Insert into TV Serie", "zettaiwp" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this TV Serie", "zettaiwp" ),
		"filter_items_list" => esc_html__( "Filter Series list", "zettaiwp" ),
		"items_list_navigation" => esc_html__( "Series list navigation", "zettaiwp" ),
		"items_list" => esc_html__( "Series list", "zettaiwp" ),
		"attributes" => esc_html__( "Series attributes", "zettaiwp" ),
		"name_admin_bar" => esc_html__( "TV Serie", "zettaiwp" ),
		"item_published" => esc_html__( "TV Serie published", "zettaiwp" ),
		"item_published_privately" => esc_html__( "TV Serie published privately.", "zettaiwp" ),
		"item_reverted_to_draft" => esc_html__( "TV Serie reverted to draft.", "zettaiwp" ),
		"item_trashed" => esc_html__( "TV Serie trashed.", "zettaiwp" ),
		"item_scheduled" => esc_html__( "TV Serie scheduled", "zettaiwp" ),
		"item_updated" => esc_html__( "TV Serie updated.", "zettaiwp" ),
		"parent_item_colon" => esc_html__( "Parent TV Serie:", "zettaiwp" ),
	];

	$args = [
		"label" => esc_html__( "Series", "zettaiwp" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "series", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "category", "post_tag", "genres", "characters_voice_actors", "staff" ],
		"show_in_graphql" => false,
	];

	register_post_type( "series", $args );
}

add_action( 'init', 'register_my_cpts' );
