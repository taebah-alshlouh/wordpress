<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ta_Mag
 */

get_header();

global $post;
$global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');
$ta_mag_post_sidebar = get_post_meta( $post->ID, 'ta_mag_post_sidebar_layout', true );

if( $ta_mag_post_sidebar == 'global' ){

	$sidebar = $global_sidebar_layout;

}else{
	$sidebar = $ta_mag_post_sidebar;
}

?>
<div class="ta-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if( $sidebar != 'no-sidebar' ){ get_sidebar(); } ?>

</div>
<?php
get_footer();