<?php
/**
 * Template part for displaying posts.
 *
 * @package Designfly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php designfly_posted_by(); ?>
				<?php designfly_posted_on(); ?>
			</div><!-- .entry-meta -->
			<hr class="title-meta-hr">
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( ! is_single() && ! is_page() ) {
		the_post_thumbnail();
	}
	?>

	<div class="entry-content clearfix">
		<?php
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. */
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'designfly' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
		?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'designfly' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php designfly_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
