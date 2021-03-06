<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Epic Scan
 */

get_header(); ?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<nav class="blog-header">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'categories', 'menu_id' => 'category-menu' ) ); ?>
			</div>
		</nav>
	<?php endif; ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header>
				<h1 class="blog-title">News</h1>
			</header>

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

			<?php the_posts_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
