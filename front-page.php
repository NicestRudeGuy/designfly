<?php
/**
 * Front page template
 *
 * @package Designfly
 */

get_header();

get_template_part( 'template-parts/content', 'carousel' );
get_template_part( 'template-parts/content', 'servicebar' );
?>

<?php
		$designfly_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$designfly_query = new WP_Query(
			array(
				'post_type'      => 'portfolio-post',
				'posts_per_page' => 6,
			)
		);
		if ( $designfly_query->have_posts() ) :
			?>
			<div class="portfolio-title">
					<p> D'SIGN IS THE SOUL 
					<a class="portfolio-button" href="<?php echo esc_url( get_permalink( get_page_by_path( 'portfolio' ) ) ); ?>">
					view all
					</a>
					</p>
					<hr />
			</div>
			<div class="portfolio-content">
				<?php
				while ( $designfly_query->have_posts() ) :
					$designfly_query->the_post();
					get_template_part( 'template-parts/content', 'portfolio' );
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

<?php get_footer(); ?>
