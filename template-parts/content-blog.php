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
				<?php designfly_posted_on(); ?>
				<?php designfly_posted_by(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( ! is_single() && ! is_page() ) {
		the_post_thumbnail();
	}
	?>

	<div class="entry-content clearfix">
		<?php
			the_excerpt();
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

