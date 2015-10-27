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

			<section class="hero page-hero">

				<div class="hero-content">

					<div class="container narrow">

						<p class="hero-text"><?php echo $hero_text; ?></p>

						<a href="<?php echo $hero_link; ?>" class="btn"><?php echo $hero_link_text; ?></a>

					</div>

				</div>

				<div class="scrim-overlay"></div>

				<img class="hero-image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">

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

		<?php if( get_field('project_cta_title') ) : ?>

			<section class="project-cta">
				
				<div class="container narrow">
					
					<h2><?php the_field('project_cta_title'); ?></h2>
					
					<p class="project-cta-text"><?php the_field('project_cta_text'); ?></p>
					
					<hr>

					<div class="project-contact">
						
						<span class="projects-contact-phone"><i class="fa fa-phone fa-fw"></i><?php the_field('phone_number', 'option'); ?></span>

						<span class="projects-contact-email"><i class="fa fa-envelope fa-fw"></i><?php the_field('email_address', 'option'); ?></span>

					</div>

				</div>

			</section>

		<?php endif; ?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>