<?php
/**
 * Template Name: 404 Template
 * Description: Error page when a page cannot be found
 */
get_header(); ?>

<h1>Sorry, we cannot find that page!</h1>
<p>Either the page you are looking for was moved or it doesn't exist. Please visit the <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage">Homepage</a>.</p>
		
<?php get_footer(); ?>