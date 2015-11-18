<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Epic Scan
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'epic-scan' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'epic-scan' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->

		<?php get_sidebar(); ?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
