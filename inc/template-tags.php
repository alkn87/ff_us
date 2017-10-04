<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ff_us
 */

if ( ! function_exists( 'ff_us_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ff_us_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s, %3$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string_update = '<time class="updated" datetime="%1$s">%2$s, %3$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_html( get_the_time() )
		);

		$time_string_update = sprintf( $time_string_update,
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() ),
			esc_html( get_the_time() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Veröffentlicht am %s', 'post date', 'freitext' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		if ( get_the_date() != get_the_modified_date() ) {
		$updated_on = sprintf(
			esc_html_x( ' // Aktualisiert am %s', 'post date', 'freitext' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string_update . '</a>'
		);
		}

		$byline = sprintf(
			esc_html_x( ' // %s', 'post author', 'freitext' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		/*
		$postID = get_the_ID();
		$commentscount = get_comments_number();

		if ( get_comments_number() ) {
			$commenttag = sprintf(
							esc_html_x( ' // Ein Kommentar', ' // %1$s Kommentare', get_comments_number(), 'freitext' ) ,
							number_format_i18n( get_comments_number() ),
							'<span>' . get_the_title() . '</span>'
						);
		}
		*/

		/*if ( ! get_comments_number() ) {
			$commenttag = sprintf(' // Keine Kommentare ');
		}
		*/

		echo '<span class="posted-on">' . $posted_on . '</span>' . '<span class="posted-on">' . $updated_on . '</span>' . '<span class="byline"> ' . $byline . '</span>' . '<span class="comment-tag"> ' . $commenttag . '</span>'; // WPCS: XSS OK.


	}
endif;

if ( ! function_exists( 'ff_us_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ff_us_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'ff_us' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ff_us' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ff_us' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ff_us' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ff_us' ),
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

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ff_us' ),
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
endif;
