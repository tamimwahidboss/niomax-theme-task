<?php
/**
 * niomax functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package niomax
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function niomax_setup() {
	load_theme_textdomain( 'niomax', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'niomax' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'niomax_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function niomax_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'niomax' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'niomax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-1', 'niomax' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'niomax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-2', 'niomax' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'niomax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-3', 'niomax' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'niomax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-4', 'niomax' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'niomax' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'niomax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function niomax_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'niomax-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'niomax-style', 'rtl', 'replace' );

    // Enqueue Bootstrap CSS (latest CDN)
    wp_enqueue_style( 'bootstrap-cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all' );
	// Enqueue Font Awesome from CDN
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3' );
	// Enqueue Swiper from CDN
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.14' );

    // Enqueue Bootstrap JS (latest CDN)
    wp_enqueue_script( 'bootstrap-cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true );
	// Enqueue Swiper from CDN
    wp_enqueue_script( 'swiper-cdn', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.14', true );

    // Enqueue custom navigation script
    wp_enqueue_script( 'niomax-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	// Enqueue script.js
    wp_enqueue_script( 'niomax-script', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );

    // Enqueue comment-reply script if needed
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'niomax_scripts' );


/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register featured custom post type
function miomax_featured_custom_post_type() {
	register_post_type('wporg_product',
		array(
			'labels'      => array(
				'name'          => __('Feature', 'niomax'),
				'singular_name' => __('Feature', 'niomax'),
			),
				'public'      => true,
				'has_archive' => true,
				'supports' => array( 'title', 'editor', 'thumbnail')
		)
	);
}
add_action('init', 'miomax_featured_custom_post_type');
