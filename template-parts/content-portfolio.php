<?php
/**
 * Template part for displaying portfolio items
 *
 * @package DesignFly
 */

?>

<div id="portfolio-item-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	if ( is_singular( 'portfolio-item' ) ) :
		?>
		<header class="entry-header">
			<div class="entry-title">
				<?php the_title(); ?>
			</div>

			<div class="entry-meta">
			<?php
				designfly_posted_by();
				designfly_posted_on();
			?>
			</div><!-- .entry-meta -->

			<hr>
		</header>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'designfly' ),
				'after'  => '</div>',
			)
		);
		?>
		<?php
		else :
			?>
			<a class="post-thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else {
				echo wp_kses_post( '<img  alt="No Image" src="' . get_template_directory_uri() . '/assets/src/img/placeholder-portfolio.png" />' );
			}
			?>
			</a>

			<?php
		endif;
		?>

</div><!-- #post-<?php the_ID(); ?> -->
