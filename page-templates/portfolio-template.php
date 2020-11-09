<?php
/**
 * Template Name: Portfolio Page
 *
 * Portfolio page template file.
 *
 * @package Designfly
 */

get_header();
get_template_part( 'template-parts/content', 'servicebar' );
?>

<?php
		$designfly_portfolio_pagination = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$designfly_query                = new WP_Query(
			array(
				'post_type'      => 'portfolio-post',
				'posts_per_page' => 15,
				'paged'          => $designfly_portfolio_pagination,
			)
		);
		if ( $designfly_query->have_posts() ) :
			?>
			<div class="portfolio-title">
					<p> D'SIGN IS THE SOUL </p>
					<hr />
			</div>
			<div class="portfolio-content">
				<?php
				while ( $designfly_query->have_posts() ) :
					$designfly_query->the_post();
					get_template_part( 'template-parts/content', 'portfolio' );
				endwhile;
				designfly_portfolio_pagination( $designfly_query );
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
