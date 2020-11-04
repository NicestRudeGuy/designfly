<?php
/**
 * Carousel template
 *
 * @package Designfly
 */

if ( is_front_page() ) :
	?>
		<div class="header-img" >
		<!-- Carousel Posts -->
		<?php
		$designfly_carousel_query = new WP_Query(
			array(
				'post_type' => 'carousel',
			)
		);
		if ( $designfly_carousel_query->have_posts() ) :
			?>
				<div id="carousel__container" class="carousel__content">
			<?php
			if ( wp_get_attachment_url( get_theme_mod( 'designfly-carousel-slider-left' ) ) === false ) {
				?>
					<input id="carousel__button--prev" class="carousel__button--prev" type="image" alt="Prev" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/slider-arrow-left.png" />
					<?php
			} else {
				?>
					<input id="carousel__button--prev" class="carousel__button--prev" type="image" alt="Prev" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'designfly-carousel-slider-left' ) ) ); ?>" />
					<?php
			}
			if ( wp_get_attachment_url( get_theme_mod( 'designfly-carousel-slider-right' ) ) === false ) {
				?>
					<input id="carousel__button--next" class="carousel__button--next" type="image" alt="Next" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/slider-arrow-right.png" />
					<?php
			} else {
				?>
					<input id="carousel__button--next" class="carousel__button--next" type="image" alt="Next" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'designfly-carousel-slider-right' ) ) ); ?>" />
					<?php
			}
			while ( $designfly_carousel_query->have_posts() ) :
				$designfly_carousel_query->the_post();
				?>
						<div class="carousel__slides">
							<div class="carousel__slides__title">
							<?php the_title(); ?>
							</div>
							<div class="carousel__slides__content">
							<?php the_content(); ?>
							</div>
						</div>
					<?php
				endwhile;
			?>
				</div>
			<?php
			else :
				?>
				<p>
					<?php esc_html_e( 'No carousel items found. Please add some carousel items in admin-dashboard', 'designfly' ); ?>
				</p>
				<?php
			endif;
			?>
		</div>
	<?php endif; ?>
