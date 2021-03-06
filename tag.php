<?php
/** Tag.php displays posts tagged with this tag */

get_header(); ?>

    <header class="row page-header">
      <div class="small-12 columns">
      <h1><?php echo single_tag_title(); ?></h1>
      </div>
    </header>

    <section id="category-posts">

    <?php if ( have_posts() ) : ?>


      <div class="row"> 

      <?$count = 0; //set up counter variable
      ?>
        
        <?php while ( have_posts() ) : the_post(); 

        $count++; //increment the variable by 1 each time the loop executes
        ?>

        <div class="small-12 medium-4 large-12 columns clearfix">
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
          <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('standard_thumbnail');
            }
          ?>
          <?php the_title(); ?></a> <br />

          <?php echo get_the_date('jS F Y'); ?><br />
          <?php the_author_posts_link(); ?>
        </div>

      <?php
        //every 3 items close new row and start a new one
        if ($count % 3 == 0) { ?></div><div class="row"><?php } ?>  

      <?php endwhile; ?>

      </div><!--/row-->

      <?php else : ?>
        <div class="row">
          <div class="small-12 medium-12 large-12 columns">
          <p>Sorry, but you are looking for something that isn't here.</p>
          </div>
        </div><!--/row-->
      <?php endif; ?>     

    </section>

<?php get_footer(); ?>