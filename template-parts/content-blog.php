<?php
/**
 * Template part for displaying posts.
 *
 * @package Designfly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<div class="big-title">
		<div class="title-time">
			<div class="title-days"><?php echo get_the_date( 'd' ); ?></div>
			<div class="title-month"><?php echo get_the_date( 'M' ); ?></div>
		</div>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?> </div>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php designfly_posted_by(); ?>
				<?php designfly_posted_on(); ?>
				<hr class="title-meta-hr">
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="blog-post-container">
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
	</div>
	<footer class="entry-footer">
		<?php designfly_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

