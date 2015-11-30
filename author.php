<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Epic Scan
 */

get_header(); ?>

	<?php
		$user_id = 'user_' . get_current_user_id();
		$user_type = get_field('user_type', $user_id);
	?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

			<header class="page-header">
				<?php
					if( $user_type === 'client' || $user_type === 'third-party' ) :

						echo '<h1 class="blog-title">' . get_query_var('author_name') . ' Projects</h1>';

					else :

						echo '<h1 class="blog-title">Posts by ' . get_query_var('author_name') . '</h1>';

					endif;
				?>
			</header><!-- .page-header -->

		<?php if ( have_posts() && $user_type != 'client' && $user_type != 'third-party' ) : ?>


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

		<?php elseif ( $user_type === 'client' || $user_type === 'third-party' ) : ?>

					<?php
						$projects = get_field('users_projects', $user_id);
						
						if ( $projects ) :

							foreach ( $projects as $post) :

								setup_postdata($post);

								include(locate_template('template-parts/content.php'));

							endforeach;

							wp_reset_postdata();

						endif;

					?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
