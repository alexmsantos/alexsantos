<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package alexsantos
 */

if ( ! function_exists( 'alexsantos_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function alexsantos_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( '%s', 'post date', 'alexsantos' ),
		$time_string
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'alexsantos_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function alexsantos_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
//		$categories_list = get_the_category_list( esc_html__( ', ', 'alexsantos' ) );
//		if ( $categories_list ) {
			/* translators: 1: list of categories. */
//			printf( '<span class="cat-links">' . esc_html__( '%1$s ', 'alexsantos' ) . '</span>', $categories_list ); // WPCS: XSS OK.
//		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'alexsantos' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'alexsantos' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	if ( 'portefolio' === get_post_type() ) {
		if(get_the_term_list($post->ID, 'area-de-trabalho', ' ', ', ', '' )):
			echo get_the_term_list($post->ID, 'area-de-trabalho', '', ', ', '' );
		endif;
	}

}
endif;
