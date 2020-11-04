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
				<input id="carousel__button--prev" class="carousel__button--prev" type="image" alt="Prev" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/carousel-prev.png" />
				<input id="carousel__button--next" class="carousel__button--next" type="image" alt="Next" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/img/carousel-next.png" />
			<?php
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
