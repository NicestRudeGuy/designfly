<?php
/**
 * Customizer.
 *
 * @package Designfly
 */

namespace Designfly\Inc;

use Designfly\Inc\Traits\Singleton;

/**
 * Class Customizer
 */
class Customizer {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'enqueue_customizer_scripts' ) );

	}

	/**
	 * Customize register.
	 *
	 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @action customize_register
	 */
	public function customize_register( \WP_Customize_Manager $wp_customize ) {

		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => array( $this, 'customize_partial_blog_name' ),
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'customize_partial_blog_description' ),
				)
			);
		}

		$wp_customize->add_section(
			'designfly-service-area',
			array(
				'title'      => __( 'Service Navbar', 'designfly' ),
				'priority'   => 140,
				'capability' => 'edit_theme_options',
			)
		);

		/* ----------------Service-1-------------------- */

		/* Settings for Service -1 Heading */
		$wp_customize->add_setting(
			'designfly-service-a-title',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Advertising',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-a-title',
			array(
				'section' => 'designfly-service-area',
				'label'   => __( 'Heading', 'designfly' ),
			)
		);

		/* Settings for Service -1 Content */
		$wp_customize->add_setting(
			'designfly-service-a-body',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'Lorem ipsum dolor sit amet, hehe a consectetur adipiscing elit dem.',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-a-body',
			array(
				'section' => 'designfly-service-area',
				'type'    => 'textarea',
				'label'   => __( 'Content', 'designfly' ),
			)
		);
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function customize_partial_blog_name() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function customize_partial_blog_description() {
		bloginfo( 'description' );
	}

	/**
	 * Enqueue customizer scripts.
	 *
	 * @action customize_preview_init
	 */
	public function enqueue_customizer_scripts() {

		Assets::get_instance()->register_script( 'designfly-customizer', 'js/admin/customizer.js', array( 'customize-preview' ) );

		wp_enqueue_script( 'designfly-customizer' );
	}

}
