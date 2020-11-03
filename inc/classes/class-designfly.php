<?php
/**
 * Bootstraps the Theme.
 *
 * @package Designfly
 */

namespace DESIGNFLY\Inc;

use DESIGNFLY\Inc\Traits\Singleton;

/**
 * Main theme bootstrap file.
 */
class DESIGNFLY {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load classes.
		Assets::get_instance();
		Customizer::get_instance();
		Widgets::get_instance();

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Filters
		 */
		add_filter( 'excerpt_more', [ $this, 'add_read_more_link' ] );
		add_filter( 'body_class', [ $this, 'filter_body_classes' ] );

		/**
		 * Actions
		 */
		add_action( 'wp_head', [ $this, 'add_pingback_link' ] );
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

	}

	/**
	 * Setup theme.
	 *
	 * @return void
	 */
	public function setup_theme() {

		load_theme_textdomain( 'designfly', DESIGNFLY_TEMP_DIR . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'jetpack-responsive-videos' );

		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		add_theme_support(
			'post-formats',
			[
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			]
		);

		add_theme_support(
			'custom-background',
			[
				'default-color' => 'ffffff',
				'default-image' => '',
			]
		);

		add_theme_support(
			'custom-logo',
			[
				'header-text' => [
					'site-title',
					'site-description',
				],
			]
		);

		add_editor_style();

		// Gutenberg theme support.
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		register_nav_menus(
			[
				'primary' => esc_html__( 'Primary Menu', 'designfly' ),
			]
		);

		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}
	}

	/**
	 * Add read more link
	 *
	 * @filter excerpt_more
	 *
	 * @return string
	 */
	public function add_read_more_link() {
		global $post;

		return sprintf( '<a class="moretag" href="%s">%s</a>', get_permalink( $post->ID ), esc_html__( 'Read More', 'designfly' ) );
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @filter body_class
	 *
	 * @return array
	 */
	public function filter_body_classes( $classes ) {

		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}

	/**
	 * Add a ping back url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @action wp_head
	 *
	 * @return void
	 */
	public function add_pingback_link() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

}
