<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Designfly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php
		the_content();
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'designfly' ),
				'after'  => '</div>',
			]
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'designfly' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
