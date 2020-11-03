<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Designfly
 */

/**
 * Display post posted date.
 *
 * @return void
 */
function designfly_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'designfly' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	printf( '<span class="posted-on">%s</span>', $posted_on ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Prints HTML with meta information for the current author.
 */
function designfly_posted_by() {

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'designfly' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	printf( '<span class="byline"> %s</span>', $byline ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function designfly_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'designfly' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'designfly' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'designfly' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'designfly' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'designfly' ),
					[
						'span' => [
							'class' => [],
						],
					]
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
				__( 'Edit <span class="screen-reader-text">%s</span>', 'designfly' ),
				[
					'span' => [
						'class' => [],
					],
				]
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

}

/**
 * Get site title.
 *
 * @param string $title_class Show or hide title.
 *
 * @return void
 */
function designfly_site_title( $title_class = '' ) {
	$title_format = '<h2 class="site-title %s"><a href="%s" rel="home">%s</a></h2>';

	if ( is_front_page() && is_home() ) {
		$title_format = '<h1 class="site-title %s"><a href="%s" rel="home">%s</a></h1>';
	}

	printf(
		$title_format, // phpcs:ignore
		esc_attr( $title_class ),
		esc_url( home_url( '/' ) ),
		get_bloginfo( 'name', 'display' ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}

/**
 * Get site description.
 *
 * @return void
 */
function designfly_site_description() {
	$description = get_bloginfo( 'description', 'display' );

	if ( $description || is_customize_preview() ) {
		printf(
			'<p class="site-description">%s</p>',
			$description // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
}

/**
 * designfly Pagination.
 *
 * @return void
 */
function designfly_pagination() {

	$allowed_tags = [
		'span' => [
			'class' => [],
		],
		'a'    => [
			'class' => [],
			'href'  => [],
		],
	];

	printf( '<nav class="designfly-pagination clearfix">%s</nav>', wp_kses( paginate_links(), $allowed_tags ) );
}

/**
 * Copyright text.
 */
function designfly_copyright_text() {
	$theme_uri = 'https://rtcamp.com/';

	$default = sprintf(
		/* translators: 1: Theme name, 2: Theme copyright date, 3: Theme author. */
		esc_html__( '&copy; %1$s %2$s by %3$s', 'designfly' ),
		date_i18n(
			/* translators: Copyright date format, see https://secure.php.net/date */
			_x( 'Y', 'copyright date format', 'designfly' )
		),
		esc_html__( 'designfly', 'designfly' ),
		'<a href="' . esc_url( $theme_uri ) . '" rel="designer">' . esc_html__( 'rtCamp', 'designfly' ) . '</a>'
	);

	echo $default; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
