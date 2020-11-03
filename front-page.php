<?php
/**
 * Front page template
 *
 * @package Designfly
 */

get_header();

get_template_part( 'template-parts/content', 'carousel' );
get_template_part( 'template-parts/content', 'servicebar' );
?>

<h1>Hello from front-page</h1>

<?php get_footer(); ?>
