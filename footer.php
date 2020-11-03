<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Designfly
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

	$designfly_footer_post = new WP_Query(
		array(
			'posts_per_page' => 1,
		)
	);

	if ( $designfly_footer_post->have_posts() ) :
		$designfly_footer_post->the_post();
		?>
		<div class="footer__welcome--post">
		<p class="post__heading"><a href="<?php echo esc_url( get_post_permalink() ); ?>"><?php echo wp_kses_post( get_the_title() ); ?> </a></p>

		<?php
		the_excerpt();
		?>
		</div>
		<?php
		wp_reset_postdata();
	else :
		__( 'No Posts found', 'designfly' );
	endif;
	?>

	<div class="contact__us"> Find Us here </div>
	<div class="site-info text-center">
		<span><?php designfly_copyright_text(); ?> </span>
	</div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
