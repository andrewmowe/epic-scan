<?php
/**
 * Template part for displaying posts.
 *
 * @package Epic Scan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'medium', array( 'class' => 'post-thumbnail' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="entry-wrap">

		<header class="entry-header">
			<?php epic_scan_entry_footer(); ?>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php epic_scan_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ( is_search() || is_archive() || is_home() ) :

				the_excerpt();

			else :

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'epic-scan' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			endif;
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'epic-scan' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div>
</article><!-- #post-## -->
