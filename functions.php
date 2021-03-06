<?php
/**
 * alexsantos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alexsantos
 */

if ( ! function_exists( 'alexsantos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alexsantos_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on alexsantos, use a find and replace
	 * to change 'alexsantos' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alexsantos', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'alexsantos' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alexsantos_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'alexsantos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alexsantos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alexsantos_content_width', 640 );
}
add_action( 'after_setup_theme', 'alexsantos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alexsantos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alexsantos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alexsantos' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alexsantos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alexsantos_scripts() {
	wp_enqueue_style( 'alexsantos-style', get_stylesheet_uri() );

   	wp_deregister_style('alexsantos-style');
   
   	wp_register_style( 'muitoestilo', get_template_directory_uri(). '/build/muitoestilo.min.css', false, filemtime( get_template_directory() . '/build/muitoestilo.min.css' ), null);
   
   	wp_enqueue_style( 'muitoestilo' );

   	wp_enqueue_script( 'alexsantos-script', get_template_directory_uri() . '/build/alexsantos.min.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexsantos_scripts' );

add_action( 'init', 'register_cpt_portefolio' );

function register_cpt_portefolio() {

    $labels = array( 
        'name' => _x( 'Portefolio', 'portefolio' ),
        'singular_name' => _x( 'Portefolio', 'portefolio' ),
        'add_new' => _x( 'Novo item', 'portefolio' ),
        'add_new_item' => _x( 'Novo item', 'portefolio' ),
        'edit_item' => _x( 'Editar Portefolio', 'portefolio' ),
        'new_item' => _x( 'Novo item', 'portefolio' ),
        'view_item' => _x( 'Ver Portefolio', 'portefolio' ),
        'search_items' => _x( 'Procurar Portefolio', 'portefolio' ),
        'not_found' => _x( 'Nenhum item encontrado', 'portefolio' ),
        'not_found_in_trash' => _x( 'Nenhum item encontrado no lixo', 'portefolio' ),
        'parent_item_colon' => _x( 'Portefolio parente:', 'portefolio' ),
        'menu_name' => _x( 'Portefolio', 'portefolio' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'portefolio' ),
        'capability_type' => 'post'
    );

    register_post_type( 'portefolio', $args );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
