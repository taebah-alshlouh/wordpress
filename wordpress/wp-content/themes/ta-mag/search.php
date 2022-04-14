<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ta_Mag
 */

get_header();
get_header();
$global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');
$ta_archive_layout = get_theme_mod('ta_archive_layout','simple');
?>
<div class="ta-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main ta-archive-grid-2 archive-gtid clearfix">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ta-mag' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

		<?php the_posts_pagination(); ?>

	</div><!-- #primary -->
	
</div>
<?php
get_footer();
