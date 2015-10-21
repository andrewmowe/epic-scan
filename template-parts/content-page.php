<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Epic Scan
 */

?>

<?php

if( have_rows('content_blocks') ) :

	while( have_rows('content_blocks') ) : the_row();

		if( get_row_layout() == 'home_hero' ) :

			$image_id = get_sub_field('home_video');
			$img = wp_get_attachment_image_src($image_id, full);

			?>

			<section class="hero home-hero">

				<div class="hero-content">

					<div class="container">

						<h2 class="hero-title"><?php the_sub_field('primary_text'); ?></h2>

						<p class="hero-text"><?php the_sub_field('secondary_text'); ?></p>

						<a href="#" class="hero-learn-more">Learn more</a>

					</div>
				</div>
				<video class="hero-video" autoplay loop>
					<source src="<?php echo get_stylesheet_directory_uri(); ?>/images/videos/Night-BBQ.mp4" type="video/mp4">
				</video>
			</section>

			<section class="news-alert">
				<div class="container">
					<a href="#" class="btn alert-btn">News</a>
					<a href="#" class="alert-link">How today’s architects are using Holo Lens to move ahead.</a>
				</div>
			</section>

			<?php

		endif; ?>

		<?php
		if( get_row_layout() == "cta" ) :

			?>

			<section class="home-cta">
				<div class="container">
					<p class="home-cta-text"><?php the_sub_field('text'); ?></p>
					<a href="<?php the_sub_field('button_link'); ?>" class="btn home-cta-link">
						<?php the_sub_field('button_text'); ?>
					</a>
				</div>
			</section>

		<?php endif;
		?>

		<?php
	endwhile;

endif;