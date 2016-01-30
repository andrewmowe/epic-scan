<?php
/**
 * Epic Scan functions and definitions
 *
 * @package Epic Scan
 */

if ( ! function_exists( 'epic_scan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function epic_scan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Epic Scan, use a find and replace
	 * to change 'epic-scan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'epic-scan', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'epic-scan' ),
		'categories' => esc_html__( 'Category Menu', 'epic-scan' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'epic_scan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // epic_scan_setup
add_action( 'after_setup_theme', 'epic_scan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function epic_scan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'epic_scan_content_width', 640 );
}
add_action( 'after_setup_theme', 'epic_scan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function epic_scan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'epic-scan' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'epic_scan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function epic_scan_scripts() {
	wp_enqueue_style( 'epic-scan-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_style( 'flickity', get_template_directory_uri() . '/css/vendor/flickity.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js' );

	wp_enqueue_script( 'detectmobile', get_template_directory_uri() . '/js/detectmobilebrowser.js', array('jquery') );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/script.js', array('jquery', 'detectmobile', 'modernizr') );

	wp_enqueue_script( 'epic-scan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'epic-scan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'flickity-js', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'epic_scan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * ACF Options Pages
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Epic Scan Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'global-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

/**
 * Custom Post Types
 */
function epic_scan_cpts() {
	register_post_type( 'project',
	    array(
	        'labels' => array(
	            'name' => 'Projects',
	            'singular_name' => 'Project',
	            'add_new' => 'Add New',
	            'add_new_item' => 'Add New Project',
	            'edit' => 'Edit',
	            'edit_item' => 'Edit Project',
	            'new_item' => 'New Project',
	            'view' => 'View',
	            'view_item' => 'View Project',
	            'search_items' => 'Search Projects',
	            'not_found' => 'No Projects found',
	            'not_found_in_trash' => 'No Projects found in Trash',
	            'parent' => 'Parent Project'
	        ),

	        'public' => true,
	        'menu_position' => 5,
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
	        'has_archive' => true,
	        'taxonomies' => array( 'category' ),
	        'capability_type' => 'post'
	    )
	);

	register_post_type( 'testimonials',
	    array(
	        'labels' => array(
	            'name' => 'Testimonials',
	            'singular_name' => 'Testimonial',
	            'add_new' => 'Add New',
	            'add_new_item' => 'Add New Testimonial',
	            'edit' => 'Edit',
	            'edit_item' => 'Edit Testimonial',
	            'new_item' => 'New Testimonial',
	            'view' => 'View',
	            'view_item' => 'View Testimonial',
	            'search_items' => 'Search Testimonials',
	            'not_found' => 'No Testimonials found',
	            'not_found_in_trash' => 'No Testimonials found in Trash',
	            'parent' => 'Parent Testimonial'
	        ),

	        'public' => true,
	        'menu_position' => 5,
	        'supports' => array( 'title' )
	    )
	);
}

add_action( 'init', 'epic_scan_cpts' );
/**
 * Custom read more
 */
function new_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Don't show Private projects to anyone not explicitly given permission
 */
// function exclude_private_projects( $query ) {
// 	if ( 'project' === $query->query_vars( 'post_type' ) ) {
		
// 		if ( is_user_logged_in() ) {

// 			$u_id = get_current_user_id();
			
// 		}
// 	}
// }
// add_action( 'pre_get_posts', 'exclude_private_projects' );

/**
 * Include Projects in blogrolls
 */
function es_include_projects( $query ) {
	if ( $query->is_main_query() ) {

		if ( $query->is_home() && $query->is_front_page() ) {
			// Default homepage
		} elseif ( $query->is_front_page() ) {
			// Static homepage
		} elseif ( $query->is_home() ) {

			$query->set( 'post_type', array('post', 'project') );

		} else {
			// Neither
		}

	}
}
add_action( 'pre_get_posts', 'es_include_projects' );

