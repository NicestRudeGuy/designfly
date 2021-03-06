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

		// Services area.
		$wp_customize->add_section(
			'designfly-service-area',
			array(
				'title'      => __( 'Service Area', 'designfly' ),
				'priority'   => 140,
				'capability' => 'edit_theme_options',
			)
		);

		// Service A area.
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

		$wp_customize->add_setting(
			'designfly-service-a-body',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Lorem ipsum dolor sit amet, hehe a consectetur adipiscing elit dem.',
				'transport'  => 'refresh',
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

		$wp_customize->add_setting(
			'designfly-service-a-icon',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-service-a-icon',
				array(
					'label'         => __( 'Add Service Icon', 'designfly' ),
					'description'   => esc_html__( 'Service Icon Control', 'designfly' ),
					'section'       => 'designfly-service-area',
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		// Service B area.
		$wp_customize->add_setting(
			'designfly-service-b-title',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Multimedia',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-b-title',
			array(
				'section' => 'designfly-service-area',
				'label'   => __( 'Heading', 'designfly' ),
			)
		);

		$wp_customize->add_setting(
			'designfly-service-b-body',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Lorem ipsum dolor sit amet, hehe a consectetur adipiscing elit dem.',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-b-body',
			array(
				'section' => 'designfly-service-area',
				'type'    => 'textarea',
				'label'   => __( 'Content', 'designfly' ),
			)
		);

		$wp_customize->add_setting(
			'designfly-service-b-icon',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-service-b-icon',
				array(
					'label'         => __( 'Add MultiMedia Icon', 'designfly' ),
					'description'   => esc_html__( 'MultiMedia Icon Control', 'designfly' ),
					'section'       => 'designfly-service-area',
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		// Service C area.
		$wp_customize->add_setting(
			'designfly-service-c-title',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Photography',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-c-title',
			array(
				'section' => 'designfly-service-area',
				'label'   => __( 'Heading', 'designfly' ),
			)
		);

		$wp_customize->add_setting(
			'designfly-service-c-body',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Lorem ipsum dolor sit amet, hehe a consectetur adipiscing elit dem.',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-service-c-body',
			array(
				'section' => 'designfly-service-area',
				'type'    => 'textarea',
				'label'   => __( 'Content', 'designfly' ),
			)
		);

		$wp_customize->add_setting(
			'designfly-service-c-icon',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-service-c-icon',
				array(
					'label'         => __( 'Add Photography Icon', 'designfly' ),
					'description'   => esc_html__( 'Photography Icon Control', 'designfly' ),
					'section'       => 'designfly-service-area',
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		/* Footer Area */
		$wp_customize->add_section(
			'designfly-footer-area',
			array(
				'title'      => __( 'Footer Area', 'designfly' ),
				'priority'   => 150,
				'capability' => 'edit_theme_options',
			)
		);

		/* Setting for heading */
		$wp_customize->add_setting(
			'designfly-footer-heading',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-footer-heading',
			array(
				'section' => 'designfly-footer-area',
				'label'   => __( 'Heading', 'designfly' ),
			)
		);

		/* Setting for address */
		$wp_customize->add_setting(
			'designfly-footer-address',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'Street 21 Planet, A-11, dapibus tristique, 123551',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-footer-address',
			array(
				'section'  => 'designfly-footer-area',
				'priority' => 1,
				'label'    => __( 'Address', 'designfly' ),
			)
		);

		/* Setting for phone */
		$wp_customize->add_setting(
			'designfly-footer-telephone',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '123 4567890',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-footer-telephone',
			array(
				'section'  => 'designfly-footer-area',
				'priority' => 2,
				'label'    => __( 'Telephone Number', 'designfly' ),
			)
		);

		/* Setting for email */
		$wp_customize->add_setting(
			'designfly-footer-email',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'contactus@dsignfly.com',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-footer-email',
			array(
				'section'  => 'designfly-footer-area',
				'priority' => 3,
				'label'    => __( 'E-mail Address', 'designfly' ),
			)
		);

		/* Setting for Fax */
		$wp_customize->add_setting(
			'designfly-footer-fax',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '123 456789',
				'transport'  => 'refresh',
			)
		);

		$wp_customize->add_control(
			'designfly-footer-fax',
			array(
				'section'  => 'designfly-footer-area',
				'priority' => 4,
				'label'    => __( 'Fax Number', 'designfly' ),
			)
		);

		/* Settings for facebook Icon */
		$wp_customize->add_setting(
			'designfly-footer-facebook-logo',
			array(
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-footer-facebook-logo',
				array(
					'label'         => __( 'Add Facebok Logo', 'designfly' ),
					'description'   => esc_html__( 'Facebook Logo Control', 'designfly' ),
					'section'       => 'designfly-footer-area',
					'priority'      => 5,
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		/* Settings for google Icon */
		$wp_customize->add_setting(
			'designfly-footer-google-logo',
			array(
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-footer-google-logo',
				array(
					'label'         => __( 'Add Google Logo', 'designfly' ),
					'description'   => esc_html__( 'Google Logo Control', 'designfly' ),
					'section'       => 'designfly-footer-area',
					'priority'      => 6,
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		/* Settings for linkedin Icon */
		$wp_customize->add_setting(
			'designfly-footer-linkedin-logo',
			array(
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-footer-linkedin-logo',
				array(
					'label'         => __( 'Add Linked Logo', 'designfly' ),
					'description'   => esc_html__( 'Linked Logo Control', 'designfly' ),
					'section'       => 'designfly-footer-area',
					'priority'      => 7,
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		/* Settings for pintrest Icon */
		$wp_customize->add_setting(
			'designfly-footer-pintrest-logo',
			array(
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-footer-pintrest-logo',
				array(
					'label'         => __( 'Add Pintrest Icon', 'designfly' ),
					'description'   => esc_html__( 'Pintrest Icon Control', 'designfly' ),
					'section'       => 'designfly-footer-area',
					'priority'      => 8,
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
			)
		);

		/* Settings for twitter Icon */
		$wp_customize->add_setting(
			'designfly-footer-twitter-logo',
			array(
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'designfly-footer-twitter-logo',
				array(
					'label'         => __( 'Add Twitter Logo', 'designfly' ),
					'description'   => esc_html__( 'Twitter Logo Control', 'designfly' ),
					'section'       => 'designfly-footer-area',
					'priority'      => 9,
					'flex_width'    => true, // Optional. Default: false.
					'flex_height'   => true, // Optional. Default: false.
					'width'         => 50, // Optional. Default: 150.
					'height'        => 50, // Optional. Default: 150.
					'button_labels' => array( // Optional.
						'select'       => __( 'Select Image', 'designfly' ),
						'change'       => __( 'Change Image', 'designfly' ),
						'remove'       => __( 'Remove', 'designfly' ),
						'default'      => __( 'Default', 'designfly' ),
						'placeholder'  => __( 'No image selected', 'designfly' ),
						'frame_title'  => __( 'Select Image', 'designfly' ),
						'frame_button' => __( 'Choose Image', 'designfly' ),
					),
				)
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
