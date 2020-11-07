<?php
/**
 * The template for displaying the servicebar.
 *
 * @package Designfly
 */

?>
<div class="servicebar">
<div class="servicebar-box">
	<div class="service">
	<div class="service__logo"><img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'designfly-service-a-icon' ) ) ); ?>" alt=""></div>
		<div class="service__body">
			<a target="_blank" href="#">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-a-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-a-body' ) ); ?></p>
				</a>
	</div> 
	</div>

	<div class="service">
	<div class="service__logo"><img src=" <?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'designfly-service-b-icon' ) ) ); ?> " alt=""></div>
		<div class="service__body">
		<a target="_blank" href="#">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-b-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-b-body' ) ); ?></p>
				</a>
	</div> 
	</div>

	<div class="service">
	<div class="service__logo"><img src=" <?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'designfly-service-c-icon' ) ) ); ?> " alt=""></div>
		<div class="service__body">
		<a target="_blank" href="#">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-c-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-c-body' ) ); ?></p>
				</a>
	</div> 
	</div>

</div>
</div>
