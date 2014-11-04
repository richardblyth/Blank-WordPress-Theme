<?php
/* Custom Functions */

/* Load jQuery */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");
   wp_enqueue_script('jquery');
}

/* Correctly Enqueue Other Scripts and CSS */
function ocaldesign_scripts() {
	/* CSS here */
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/vendor/foundation.min.css', array(), '5' );
	wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/main.css', array(), null );

	//Modernizr
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '2.8.2');

	//Foundation
	wp_enqueue_script( 'foundationjs', get_template_directory_uri() . '/js/vendor/foundation.min.js', array('jquery'), '5' );

	//Main.js
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ocaldesign_scripts' );

/* Remove Unnecessary Meta Tags */
remove_action( 'wp_head', 'wp_generator' ) ; 
remove_action( 'wp_head', 'wlwmanifest_link' ) ; 
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/* Remove Secondary Feeds */
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action( 'wp_head', 'feed_links_extra', 3 );

/* Remove any admin menu items we don't need */
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('edit.php');	/* Posts */
}

/* Completely Disable Comments and Trackbacks */
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

/* Add Additional Menus to the Theme */
register_nav_menus( array(
	'top' => __( 'Top Bar Links', 'strettynews' ),
	'main' => __( 'Main Menu', 'strettynews'),
	'footer' => __( 'Footer Links', 'strettynews')
) );

?>