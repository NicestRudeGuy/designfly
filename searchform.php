<?php
/**
 * Custom search form.
 *
 * @package Designfly
 */

?>

<form role="search" method="get" class="designfly-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search For :', 'designfly' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'designfly' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'designfly' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'designfly' ); ?>" />
</form>
