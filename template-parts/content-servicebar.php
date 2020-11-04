<?php
/**
 * The template for displaying the servicebar.
 *
 * @package Designfly
 */

?>
<div class="servicebar">
	<div class="service">
	<div class="service__logo"><img src="" alt=""></div>
		<div class="service__body">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-a-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-a-body' ) ); ?></p>
	</div> 
	</div>

	<div class="service">
	<div class="service__logo"><img src="" alt=""></div>
		<div class="service__body">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-b-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-b-body' ) ); ?></p>
	</div> 
	</div>

	<div class="service">
	<div class="service__logo"><img src="" alt=""></div>
		<div class="service__body">
				<h3><?php echo wp_kses_post( get_theme_mod( 'designfly-service-c-title' ) ); ?></h3>
				<p><?php echo wp_kses_post( get_theme_mod( 'designfly-service-c-body' ) ); ?></p>
	</div> 
	</div>


</div>
