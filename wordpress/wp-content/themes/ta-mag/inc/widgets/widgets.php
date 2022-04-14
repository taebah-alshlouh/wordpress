<?php
/**
 * TA Mag Widgets
 *
 * @package Ta_Mag
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ta_mag_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ta-mag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas Widget', 'ta-mag' ),
		'id'            => 'ta-mag-offcanvas',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Content', 'ta-mag' ),
		'id'            => 'ta-mag-home',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'ta-mag' ),
		'id'            => 'ta-mag-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'ta-mag' ),
		'id'            => 'ta-mag-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'ta-mag' ),
		'id'            => 'ta-mag-footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'ta-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'ta_mag_widgets_init' );


/**
 * Widget Fields.
 */
require get_template_directory() . '/inc/widgets/widget-fields.php';
require get_template_directory() . '/inc/widgets/author.php';
require get_template_directory() . '/inc/widgets/recent-news.php';
require get_template_directory() . '/inc/widgets/category.php';
require get_template_directory() . '/inc/widgets/post-block-1.php';
require get_template_directory() . '/inc/widgets/post-block-2.php';
require get_template_directory() . '/inc/widgets/post-block-3.php';
require get_template_directory() . '/inc/widgets/grid-posts-1.php';
require get_template_directory() . '/inc/widgets/grid-posts-2.php';
require get_template_directory() . '/inc/widgets/grid-posts-3.php';
require get_template_directory() . '/inc/widgets/slider-1.php';
require get_template_directory() . '/inc/widgets/slider-2.php';
require get_template_directory() . '/inc/widgets/home-latest-posts.php';