<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Epic Scan
 */

get_header(); ?>

	<nav class="blog-header">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'categories', 'menu_id' => 'category-menu' ) ); ?>
		</div>
	</nav>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					if( is_author() ) :

						echo '<h1 class="blog-title">' . get_query_var('author_name') . '</h1>';

					else :

						echo '<h1 class="blog-title">Projects</h1>';

					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
