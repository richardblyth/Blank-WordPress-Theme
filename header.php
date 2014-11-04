<?php
// Main header
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Blank WordPress theme</title>

    <meta name="robots" content="index, follow">
    <meta name="author" content="Richard Blyth">

    <!-- Google Analytics to go here -->

    <?php wp_head(); ?>
  </head>
  <body>
    <!--[if lt IE 8]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
    <header class="row">    
      <div class="small-12 medium-4 columns">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage">Homepage</a>
      </div>
      <div class="small-12 medium-4 columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
      </div>
      <form action="/" method="get" class="small-12 medium-4 columns">
        <fieldset>
          <label for="search">Search</label>
          <input type="text" name="s" id="search" value="<?php the_search_query(); ?>">
          <input type="submit" name="submit" value="Search">
        </fieldset>
      </form>
    </header><!--/row-->        