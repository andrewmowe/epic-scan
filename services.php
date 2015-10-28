<?php
/*
Template Name: Services
*/

?>

<?php
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if( get_field('hero_text') ) :

			// vars
			$hero_text = get_field('hero_text');
			$hero_link = get_field('hero_link');
			$hero_link_text = get_field('hero_link_text');

			// image
			$image_id = get_field('hero_image');
			$image = wp_get_attachment_image_src($image_id, 'full');
			$image_url = $image[0];
			$image_w = $image[1];
			$image_h = $image[2];
			$image_alt = $image[3];
			?>

			<section class="hero page-hero" style="background-image: url(<?php echo $image_url; ?>);">

				<div class="hero-content">

					<div class="container narrow">

						<p class="hero-text"><?php echo $hero_text; ?></p>

						<a href="<?php echo $hero_link; ?>" class="btn"><?php echo $hero_link_text; ?></a>

					</div>

				</div>

				<div class="scrim-overlay"></div>

			</section>

		<?php endif; ?>

			<section class="news-alert">
				<div class="container">
					<a href="#" class="btn alert-btn">News</a>
					<a href="#" class="alert-link">How today’s architects are using Holo Lens to move ahead.</a>
				</div>
			</section>

		<?php if ( have_rows('service_list') ) : ?>

			<section class="service-list">
				
				<div class="container narrower">
					
					<h2 class="center"><?php the_field('service_list_title'); ?></h2>

					<?php while ( have_rows('service_list') ) : the_row();

						// vars
						$name = get_sub_field('service_name');

						// image
						$image_id = get_sub_field('service_image');
						$image = wp_get_attachment_image_src($image_id, 'thumbnail');
						$image_url = $image[0];
						$image_w = $image[1];
						$image_h = $image[2];
						$image_alt = $image[3];
						?>

						<div class="service">
							
							<img class="service-image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">

							<span class="service-name btn"><?php echo $name; ?></span>

						</div>

					<?php endwhile; ?>
						
				</div>

			</section>

		<?php endif; ?>

		<?php if( get_field('quote') ) :
			// vars
			$quote = get_field('quote');
			$quote_attr = get_field('quote_attr');

			// image
			$image_id = get_field('quote_image');
			$image = wp_get_attachment_image_src($image_id, 'thumbnail');
			$image_url = $image[0];
			$image_w = $image[1];
			$image_h = $image[2];
			$image_alt = $image[3];
			?>

			<section class="services-quote">
				
				<div class="container narrower">
										
					<?php if($image_id) : ?>
						<div class="quote-image">
						<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
						</div>
					<?php endif; ?>

					<div>

					<p class="quote-text"><?php echo $quote; ?></p>

					<p class="quote-attr"><?php echo $quote_attr; ?></p>

					</div>

				</div>

			</section>

		<?php endif; ?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>