<?php
/* The default template for displaying a single post */
get_header(); ?>

			<div class="row">

			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<div class="small-12 columns">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php endwhile; ?>

				<?php else : ?>
				<h1>Oops!</h1>
				<p>Sorry, but you are looking for something that isn't here.</p>
				</div>
			<?php endif; ?>
			
			</div><!--/row-->

<?php get_footer(); ?>