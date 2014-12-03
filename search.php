<?php
/* Search resuts */

get_header(); ?>

		<header class="row page-header">
			<div class="small-12 medium-12 large-12 columns">
			<?php if ($wp_query->found_posts == 1) { ?>
				<h1>1 result for <?php echo get_search_query(); ?></h1>
			<?php } else { ?>
				<h1><?php echo $wp_query->found_posts; ?> results for <?php echo get_search_query(); ?></h1>
			<?php } ?>
			</div>
		</header><!--/row-->


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
					<p>Sorry, but nothing matched your search criteria.</p>
				</div><!-- .entry-content -->
			</div><!--/row-->

		<?php endif; ?>

<?php get_footer(); ?>