<?php
/**
 * bookworm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bookworm
 * @since 1.0
 */
 
 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bookworm_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// Register the main menu and social menus
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main-menu'    => __( 'Top Menu', 'bookworm' ),
		'social' => __( 'Social Links Menu', 'bookworm' ),
	) );

}
add_action( 'after_setup_theme', 'bookworm_setup' );

/*
 * This theme styles the visual editor to resemble the theme style,
 * specifically font, colors, and column width.
 * 
 * I decided this was not necessary, but wanted to preserve this code 
 * since the info I found on how to do this revealed this to be the
 * easiest way for small changes (methods for this changed quite a 
 * bit after gutenberg, it would seem)
 * REF: https://webcusp.com/how-to-add-custom-css-for-your-wordpress-admin-dashboard/
function my_custom_fonts() {
  echo '<style>
    body, td, textarea, input, select {
      
    } 
	</style>';	
}
add_action('admin_head', 'my_custom_fonts');
*/

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

/* Remove Wordpress Version from Links */
function bookworm_remove_wp_version() {
	return '';
}
add_filter('the_generator', 'bookworm_remove_wp_version');

/* Custom body background feature 
 * Defaults are added directly in the CSS - I found it 
 * quite buggy to set them as shown in the Codex.
 */
add_theme_support( 'custom-background' );


/* Change the Wordpress Admin Footer Text */
function bookworm_change_admin_footer () {
	echo 'Created by <a href="https://kennethmdouglass.com" target="_blank">K.M.D.</a></p>';
}
add_filter('admin_footer_text', 'bookworm_change_admin_footer');

 
/**
 * Enqueue scripts and styles.
 */
function bookworm_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'bookworm-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bookworm-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', false );


}
add_action( 'wp_enqueue_scripts', 'bookworm_scripts' );


/**
 * Enqueue google fonts
 */
function bookworm_add_google_fonts() {
 
	wp_enqueue_style( 'bookworm-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Bree+Serif', false ); 
} 
add_action( 'wp_enqueue_scripts', 'bookworm_add_google_fonts' );


function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
 
/**
 * Register widgets
 */
function bookworm_widgets_init() {
	
	/* Post sidebar */
  register_sidebar( array(
		'name'          => __( 'sidebar-post', 'bookworm' ),
		'id'            => 'post-sidebar',
		'description'   => __( 'Post Sidebar.', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="post-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );
	
	/* Page sidebar */
  register_sidebar( array(
		'name'          => __( 'sidebar-page', 'bookworm' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Page Sidebar.', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="page-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
  ) );

  /* TOC Page sidebar */
  register_sidebar( array(
		'name'          => __( 'sidebar-toc', 'bookworm' ),
		'id'            => 'toc-sidebar',
		'description'   => __( 'TOC Sidebar.', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="page-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
  ) );
  
  /* Title Page sidebar */
  register_sidebar( array(
		'name'          => __( 'sidebar-titlepg', 'bookworm' ),
		'id'            => 'titlepg-sidebar',
		'description'   => __( 'Title Page Sidebar.', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="page-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
  ) );

  /* Title Page content */
  register_sidebar( array(
		'name'          => __( 'titlepg-content', 'bookworm' ),
		'id'            => 'content-titlepg',
		'description'   => __( 'Title Page Content', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="titlepg-content">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="titlepg-title">',
		'after_title'   => '</h3>',
  ) );
	
	/* Search results sidebar */
  register_sidebar( array(
		'name'          => __( 'sidebar-search', 'bookworm' ),
		'id'            => 'sidebar-search',
		'description'   => __( 'Search Results Sidebar.', 'bookworm' ),
		'before_widget' => '<section id="%1$s" class="page-sidebar">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );
		
	/* Footer left column */
  register_sidebar( array(
		'name'          => __( 'footer1', 'bookworm' ),
		'id'            => 'footer-widget1',
		'description'   => __( 'Footer Left Column.', 'bookworm' ),
		'before_widget' => '<div id="%1$s" class="footer-div">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );
	
	
	/* Footer center column */
  register_sidebar( array(
		'name'          => __( 'footer2', 'bookworm' ),
		'id'            => 'footer-widget2',
		'description'   => __( 'Footer Center Column.', 'bookworm' ),
		'before_widget' => '<div id="%1$s" class="footer-div">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );
	
	
	/* Footer right column */
  register_sidebar( array(
		'name'          => __( 'footer3', 'bookworm' ),
		'id'            => 'footer-widget3',
		'description'   => __( 'Footer Right Column.', 'bookworm' ),
		'before_widget' => '<div id="%1$s" class="footer-div">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="footer-title">',
		'after_title'   => '</h2>',
	) );
	
	/* Footer copyright */
  register_sidebar( array(
		'name'          => __( 'copyright', 'bookworm' ),
		'id'            => 'footer-copyright',
		'description'   => __( 'Footer Copyright.', 'bookworm' ),
		'before_widget' => '<p id="%1$s" class="footer-copyright">',
		'after_widget'  => '</p>',
		'before_title'  => '<p class="copyright-title">',
		'after_title'   => '</p>',
	) );

}
add_action( 'widgets_init', 'bookworm_widgets_init' );


//Exclude pages from WordPress Search
/*
if (!is_admin()) {
	function bookworm_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','bookworm_search_filter');
}
*/

/**
 * Halt the main query in the case of an empty search 
 * Found on: 
 * https://wordpress.stackexchange.com/questions/216694/empty-search-input-returns-all-posts
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

/**
 * Customize the tag cloud links
 */
function set_widget_tag_cloud_args($args) {
  $my_args = array(
    'smallest'                  => 10, 
    'largest'                   => 18,
    'unit'                      => 'px', 
    'number'                    => 44,  
    'format'                    => 'flat',
    'separator'                 => "\n",
    'orderby'                   => 'name', 
    'order'                     => 'ASC',
    'exclude'                   => null, 
    'include'                   => null, 
    'topic_count_text_callback' => default_topic_count_text,
    'link'                      => 'view', 
    'taxonomy'                  => 'post_tag', 
    'echo'                      => true,
    'show_count'                  => 0,
    'child_of'                  => null,
  );
  $args = wp_parse_args( $args, $my_args );
  return $args;
}
add_filter('widget_tag_cloud_args','set_widget_tag_cloud_args');


/**
 * Bookworm Theme User Manual Page in Admin
 * Dash Icon reference: http://calebserna.com/dashicons-cheatsheet/
 * 											https://developer.wordpress.org/resource/dashicons/
 * Add dashicons to FE: https://wpsites.net/web-design/adding-dashicons-in-wordpress/
 * 											https://www.wpsuperstars.net/how-to-use-dashicons/
 * Capability reference: https://codex.wordpress.org/Roles_and_Capabilities
 * Admin options page w/o the settings API: https://wpshout.com/wordpress-options-page/
 */
function user_manual_display() {
	include 'user-manual.php';
}

//Enqueue the Dashicons script
function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

function manual_page_create() {
    $page_title = 'Bookworm Admin Page';
    $menu_title = 'User Manual';
    $capability = 'administrator';
    $menu_slug = 'user_manual';
    $function = 'user_manual_display';
    $icon_url = 'dashicons-book-alt';
    $position = 4;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action('admin_menu', 'manual_page_create');


/* 
 * Plain text instructions box on Dashboard Admin page
 */
/* deprecated in favor of an Admin User Manual page added
function child_dashboard_widget_function1() {
	echo "
	<h3>Helpful Hints</h3>
	<p>Misc. Notes....</p>
        <ol>
	<li>A list...
	
	</li>
	<li>...</li>
	</ol>
        ";
}
function child_add_dashboard_widgets1() {
	wp_add_dashboard_widget('wp_dashboard_widget2', 'bookworm Theme User Manual', 'child_dashboard_widget_function1');
}
add_action('wp_dashboard_setup', 'child_add_dashboard_widgets1' );
*/
 

?>