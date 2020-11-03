<?php
/**
 * Enqueue theme assets.
 *
 * @package Designfly
 */

namespace DESIGNFLY\Inc;

use Designfly\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Assets {

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
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );

	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {

		$this->register_script( 'designfly-main', 'js/main.js', [ 'jquery' ] );
		$this->register_script( 'designfly-home', 'js/home.js', [ 'designfly-main' ] );
		$this->register_script( 'designfly-single', 'js/single.js', [ 'designfly-main' ] );

		wp_enqueue_script( 'designfly-main' );

		if ( is_home() ) {
			wp_enqueue_script( 'designfly-home' );
		}

		if ( is_single() ) {
			wp_enqueue_script( 'designfly-single' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Register styles.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_styles() {

		$this->register_style( 'designfly-main', 'css/main.css' );
		$this->register_style( 'designfly-home', 'css/home.css', [ 'designfly-main' ] );
		$this->register_style( 'designfly-single', 'css/single.css', [ 'designfly-main' ] );

		wp_enqueue_style( 'designfly-main' );

		if ( is_home() ) {
			wp_enqueue_style( 'designfly-home' );
		}

		if ( is_single() ) {
			wp_enqueue_style( 'designfly-single' );
		}
	}

	/**
	 * Register a new script.
	 *
	 * @param string           $handle    Name of the script. Should be unique.
	 * @param string|bool      $file       script file, path of the script relative to the assets/build/ directory.
	 * @param array            $deps      Optional. An array of registered script handles this script depends on. Default empty array.
	 * @param string|bool|null $ver       Optional. String specifying script version number, if not set, filetime will be used as version number.
	 * @param bool             $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
	 *                                    Default 'false'.
	 * @return bool Whether the script has been registered. True on success, false on failure.
	 */
	public function register_script( $handle, $file, $deps = [], $ver = false, $in_footer = true ) {
		$src     = sprintf( DESIGNFLY_BUILD_URI . '/%s', $file );
		$version = $this->get_file_version( $file, $ver );

		return wp_register_script( $handle, $src, $deps, $version, $in_footer );
	}

	/**
	 * Register a CSS stylesheet.
	 *
	 * @param string           $handle Name of the stylesheet. Should be unique.
	 * @param string|bool      $file    style file, path of the script relative to the assets/build/ directory.
	 * @param array            $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
	 * @param string|bool|null $ver    Optional. String specifying script version number, if not set, filetime will be used as version number.
	 * @param string           $media  Optional. The media for which this stylesheet has been defined.
	 *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
	 *                                 '(orientation: portrait)' and '(max-width: 640px)'.
	 *
	 * @return bool Whether the style has been registered. True on success, false on failure.
	 */
	public function register_style( $handle, $file, $deps = [], $ver = false, $media = 'all' ) {
		$src     = sprintf( DESIGNFLY_BUILD_URI . '/%s', $file );
		$version = $this->get_file_version( $file, $ver );

		return wp_register_style( $handle, $src, $deps, $version, $media );
	}

	/**
	 * Get file version.
	 *
	 * @param string             $file File path.
	 * @param int|string|boolean $ver  File version.
	 *
	 * @return bool|false|int
	 */
	public function get_file_version( $file, $ver = false ) {
		if ( ! empty( $ver ) ) {
			return $ver;
		}

		$file_path = sprintf( '%s/%s', DESIGNFLY_BUILD_DIR, $file );

		return file_exists( $file_path ) ? filemtime( $file_path ) : false;
	}

}
