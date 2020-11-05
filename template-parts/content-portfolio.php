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

			<a class="post-thumbnail" href="#img<?php echo wp_kses_post( $args['id'] ); ?>">
			<div id="image-overlay" class="image-overlay">
				<span class="dashicons dashicons-cover-image"></span>
				<span>View Image</span>
			</div>
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} else {
				echo wp_kses_post( '<img  alt="No Image" src="' . get_template_directory_uri() . '/assets/src/img/placeholder-portfolio.png" />' );
			}
			?>
			</a>

			<div class="lightbox" id="img<?php echo wp_kses_post( $args['id'] ); ?>">
				<div class="lightbox__content">
					<div class="lightbox__image">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} else {
						echo wp_kses_post( '<img  alt="No Image" src="' . get_template_directory_uri() . '/assets/src/img/placeholder-portfolio.png" />' );
					}
					?>
						<a href="#_" class='exit'>
						&#10005;
						</a>
					</div>
					<div class="lightbox__footer">
						<div>
						<a href="#img<?php echo wp_kses_post( $args['previd'] ); ?>" class='previous'>
						&#8592;
						</a>
						</div>
						<div class="post-title">
							<a aia-hidden="true" href="<?php the_permalink(); ?>" tabindex="-1">
								<?php the_title(); ?>
							</a>
						</div>
						<div>
						<a href="#img<?php echo wp_kses_post( $args['nextid'] ); ?>" class='next'>
						&#8594;
						</a>
						</div>
					</div>
				</div>
				<!-- </a> -->
			</div>

			<?php
		endif; // End is_singular().
		?>

</div><!-- #post-<?php the_ID(); ?> -->
