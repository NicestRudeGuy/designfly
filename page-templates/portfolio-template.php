<?php
/**
 * Template Name: Portfolio Page
 *
 * Portfolio page template file.
 *
 * @package Designfly
 */

get_header();
?>
		<?php
		$designfly_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$designfly_query = new WP_Query(
			array(
				'post_type'      => 'portfolio-post',
				'posts_per_page' => 15,
				'paged'          => $designfly_paged,
			)
		);
		if ( $designfly_query->have_posts() ) :
			?>
			<div class="portfolio-content">
				<!-- top bar -->
				<div class="portfolio-content-top">
					<p class="title"> D'SIGN IS THE SOUL </p>
					<hr />
				</div>

				<?php
				$designfly_index      = 1;
				$designfly_total_post = $designfly_query->post_count;
				while ( $designfly_query->have_posts() ) :
					if ( 1 === $designfly_index ) {
						$designfly_prev_index = $designfly_total_post;
					} else {
						$designfly_prev_index = $designfly_index - 1;
					}
					if ( $designfly_index === $designfly_total_post ) {
						$designfly_next_index = 1;
					} else {
						$designfly_next_index = $designfly_index + 1;
					}
					$designfly_query->the_post();
					get_template_part(
						'template-parts/content',
						get_post_type(),
						array(
							'id'     => $designfly_index,
							'previd' => $designfly_prev_index,
							'nextid' => $designfly_next_index,
						)
					);
					$designfly_index++;
				endwhile;
				?>
			</div> <!-- #portfolio-content -->


			<?php
		else :
			?>
			<p>
				<?php esc_html_e( 'No items found.', 'designfly' ); ?>
			</p>
			<?php
		endif;
		?>
<?php
get_footer();
