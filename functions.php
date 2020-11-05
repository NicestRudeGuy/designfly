<?php
/**
 * Designfly file includes and definitions
 *
 * @package Designfly
 */

if ( ! defined( 'DESIGNFLY_VERSION' ) ) {
	define( 'DESIGNFLY_VERSION', 1.0 );
}
if ( ! defined( 'DESIGNFLY_TEMP_DIR' ) ) {
	define( 'DESIGNFLY_TEMP_DIR', untrailingslashit( get_template_directory() ) );
}
if ( ! defined( 'DESIGNFLY_BUILD_URI' ) ) {
	define( 'DESIGNFLY_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}
if ( ! defined( 'DESIGNFLY_BUILD_DIR' ) ) {
	define( 'DESIGNFLY_BUILD_DIR', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

require_once DESIGNFLY_TEMP_DIR . '/inc/helpers/autoloader.php';
require_once DESIGNFLY_TEMP_DIR . '/inc/helpers/custom-functions.php';
require_once DESIGNFLY_TEMP_DIR . '/inc/helpers/template-tags.php';

/**
 * Get designfly instance.
 *
 * @return object \DESIGNFLY\Inc\DESIGNFLY
 */
function designfly_get_theme_instance() {
	return DESIGNFLY\Inc\DESIGNFLY::get_instance();
}

designfly_get_theme_instance();
