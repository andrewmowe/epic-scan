<?php
/**
 * The template for displaying all single posts.
 *
 * @package Epic Scan
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(
				array(
						'prev_text' => '<span class="prev-pretext">< Previous Post</span><br>%title',
						'next_text' => '<span class="next-pretext">Next Post ></span><br>%title'
					)
			); ?>

			<hr>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>
	
	</div><!-- #primary -->

<?php get_footer(); ?>
