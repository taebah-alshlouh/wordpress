<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ta_Mag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ta-match-height'); ?>>
	<div class="ta-artical-posts">

	<?php
	$global_sidebar_layout = get_theme_mod('global_sidebar_layout','right-sidebar');
	$ta_archive_layout = get_theme_mod('ta_archive_layout','simple');

	if( $ta_archive_layout == 'simple' && $global_sidebar_layout == 'no-sidebar' ){
		$image_size = 'full';
	}elseif( $ta_archive_layout == 'simple' && $global_sidebar_layout != 'no-sidebar' ){
		$image_size = 'large';
	}elseif( $ta_archive_layout == 'masonry' ){
		$image_size = 'medium_large';
	}else{
		$image_size = 'ta-mag-grid';
	}
	if( $ta_archive_layout == 'simple' ){
		$trim_word = '100';
	}else{
		$trim_word = '30';
	}
	ta_mag_post_thumbnail($image_size); ?>

	<div class="ta-content-wraper">

		<header class="entry-header">
			<?php ta_mag_entry_footer(); ?>
		</header><!-- .entry-header -->
		
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title ta-large-font ta-secondary-font">', '</h1>' );
		else :
			echo '<h2 class="entry-title ta-large-font ta-secondary-font"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.esc_html( wp_trim_words( get_the_title(),20,'...' ) ).'</a></h2>';
		endif;
		?>

		<?php if ( is_singular() && 'post' === get_post_type() ) : ?>

			<footer class="entry-footer">

				<div class="entry-meta">
					<?php
					ta_mag_posted_by();
					ta_mag_posted_on();
					?>
				</div><!-- .entry-meta -->
					
			</footer><!-- .entry-footer -->

		<?php endif; ?>

		<div class="entry-content">
			<?php
			if( is_singular() ):

				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ta-mag' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );	

			else:
					
				if( has_excerpt() ){
					the_excerpt();
				}else{
					echo esc_html( wp_trim_words( get_the_content(),$trim_word,'...' ) );
				}

			endif;
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ta-mag' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</div>

	<?php if ( !is_singular() && 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">

			<div class="entry-meta">
				<?php
				ta_mag_posted_by();
				ta_mag_posted_on();
				?>
			</div><!-- .entry-meta -->
				
		</footer><!-- .entry-footer -->

	<?php endif; ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
