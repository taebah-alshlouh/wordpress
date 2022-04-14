<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ta_Mag
 */

get_header();
$global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');
$ta_archive_layout = get_theme_mod('ta_archive_layout','simple');
?>
<div class="ta-container">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php if( $ta_archive_layout == 'grid' || $ta_archive_layout == 'masonry' ){ echo 'ta-archive-grid-2 archive-'.esc_attr( $ta_archive_layout ); }else{ echo 'ta-archive-simple'; } ?> clearfix">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		
		<?php the_posts_pagination(); ?>

	</div><!-- #primary -->

	<?php if( $global_sidebar_layout != 'no-sidebar' ){ get_sidebar(); } ?>

</div>
<?php
get_footer();
