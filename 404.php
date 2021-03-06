<?php
/**
 * Template Name: 404 Template
 * Description: Error page when a page cannot be found
 */
get_header(); ?>

      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <h1>We're sorry, we cannot find that page!</h1>
          <p>You're seeing this message because:</p>
          <ul>
            <li>The page may have moved</li>
            <li>The page no longer exists</li>
            <li>The link you clicked is incorrect</li>
            <li>You like error messages</li>
          </ul>
  
          <p>Why not search our website using the form below? Alternatively you can visit the <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Homepage">Homepage</a>.</p>
  
          <form action="<?php echo home_url( '/' ); ?>" method="get">
              <label for="search">Search</label>
              <input id="search" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="Enter a keyword or phrase">
              <input name="submit" type="submit" value="Search">
          </form>
        </div>
      </div><!--/row-->
  
<?php get_footer(); ?>