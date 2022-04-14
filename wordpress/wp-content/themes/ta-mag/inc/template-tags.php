<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ta_Mag
 */

if ( ! function_exists( 'ta_mag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ta_mag_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$archive_year  = get_the_time( 'Y' ); 
		$archive_month = get_the_time( 'm' ); 
		$archive_day   = get_the_time( 'd' );

		$posted_on = sprintf( '<i class="far fa-clock"></i> %s', '<a href="' . esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ta_mag_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ta_mag_posted_by() {

		$avatar = get_avatar( get_the_author_meta( 'ID' ),'50','',esc_html__('Author Image','ta-mag') );
		echo '<span class="byline ta-author-image">';

		echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . wp_kses_post( $avatar ). '</a>';

		echo '<span class="author vcard">';
		echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
		echo '</span>';

		echo '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ta_mag_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ta_mag_entry_footer( $cat = true, $tag = false, $comment = false, $edit = false ) {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			if( $cat ){
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list(  );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links ta-cat-lists">%1$s</span>', $categories_list ); // WPCS: XSS OK.
				}
			}

			if( $tag ){
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ta-mag' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ta-mag' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			}
		}

		if( $comment ){
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ta-mag' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}

		}

		if( $edit ){
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'ta-mag' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}

	}
endif;

if ( ! function_exists( 'ta_mag_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ta_mag_post_thumbnail($size = 'full') {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( $size, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
