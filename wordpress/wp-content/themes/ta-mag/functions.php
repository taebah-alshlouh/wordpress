<?php
/**
 * TA Mag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ta_Mag
 */

if ( ! function_exists( 'ta_mag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ta_mag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TA Mag, use a find and replace
		 * to change 'ta-mag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ta-mag', get_template_directory() . '/languages' );

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
		add_image_size('ta-mag-grid', 500, 350, true );
		add_image_size('ta-mag-grid-3', 160, 110, true );
		add_image_size('ta-mag-cat-img', 420, 160, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'ta-mag-primary-menu' => esc_html__( 'Primary Menu', 'ta-mag' ),
			'ta-mag-footer-menu' => esc_html__( 'Footer Menu', 'ta-mag' ),
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
		add_theme_support( 'custom-background', apply_filters( 'ta_mag_custom_background_args', array(
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
			'height'      => 100,
			'width'       => 330,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Fost Formate
		add_theme_support( 'post-formats', array( 'image', 'gallery', 'link','video','quote','audio' ) );

		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		
	}
endif;
add_action( 'after_setup_theme', 'ta_mag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ta_mag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ta_mag_content_width', 890 );
}
add_action( 'after_setup_theme', 'ta_mag_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function ta_mag_scripts() {

	$ta_mag_font_query = array('family' => 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');
    wp_enqueue_style('ta-mag-google-fonts', add_query_arg($ta_mag_font_query, "//fonts.googleapis.com/css"));
    wp_enqueue_script('imagesloaded');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.css' );
	wp_enqueue_style( 'ta-mag-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/assets/lib/font-awesome/v4-shims.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'all', get_template_directory_uri() . '/assets/lib/font-awesome/all.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/lib/match-height/jquery.matchHeight-min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/lib/theia-sticky-sidebar/theia-sticky-sidebar.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'ta-mag-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'ta_mag_scripts' );

function ta_mag_admin_enqueue(){

	wp_enqueue_media();
	wp_enqueue_script( 'ta-mag-admin', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery'), '20160714', true );

	 wp_localize_script( 
        'ta-mag-admin', 
        'ta_mag_admin',
        array(
	        'upload_image_title'   =>  esc_html__('Choose Image','ta-mag'),
            'choose_image_title'   =>  esc_html__('Select','ta-mag'),
         )
    );

    $currentscreen = get_current_screen();
    if( $currentscreen->id == 'widgets' ){

    	wp_enqueue_script( 'ta-mag-widget', get_template_directory_uri() . '/assets/js/widget.js', array( 'jquery'), '20160714', true );
    	 $array = array(
	        'remove'     => esc_html__('Remove','ta-mag'),
	        'uploadimage'     => esc_html__('Author Image','ta-mag'),
	    );
	    wp_localize_script( 'ta-mag-widget', 'ta_mag_widget_date', $array );
     }

}
add_action('admin_enqueue_scripts','ta_mag_admin_enqueue');

require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/assets/lib/breadcrumb-trail/breadcrumbs.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-function.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/term-meta.php';
require get_template_directory() . '/inc/tgmpa/recommended-plugin.php';