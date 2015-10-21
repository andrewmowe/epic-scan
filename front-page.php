<?php
/*
Template Name: Home
*/

?>

<?php
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if( get_field('home_hero_video') ) : ?>

			<section class="hero home-hero">

				<div class="hero-content">

					<div class="container">

						<h2 class="hero-title"><?php the_field('home_hero_title'); ?></h2>

						<p class="hero-text narrow"><?php the_field('home_hero_text'); ?></p>

						<a href="#" class="hero-learn-more">Learn more</a>

					</div>

				</div>

				<div class="scrim-overlay"></div>

				<video class="hero-video" autoplay loop>

					<source src="<?php echo get_field('home_hero_video'); ?>" type="video/mp4">

				</video>

			</section>

		<?php endif; ?>

			<section class="news-alert">
				<div class="container">
					<a href="#" class="btn alert-btn">News</a>
					<a href="#" class="alert-link">How today’s architects are using Holo Lens to move ahead.</a>
				</div>
			</section>

		<?php if(get_field('home_cta_text') ) : ?>

			<section class="home-cta">

				<div class="container">

					<p class="home-cta-text narrow"><?php echo get_field('home_cta_text'); ?></p>

					<a href="<?php the_field('home_cta_button_link'); ?>" class="btn home-cta-link">
						<?php the_field('home_cta_button_text'); ?>
					</a>

				</div>

			</section>

		<?php endif; ?>

		<?php if( have_rows('home_client_types_clients') ) : ?>

			<div class="home-client-types">

				<div class="container">
				
					<h2 class="home-client-types-title narrow"><?php the_field('home_client_types_title'); ?></h2>

					<div class="home-client-types-list">

					<?php while( have_rows('home_client_types_clients') ) : the_row();

						// vars
						$client_title = get_sub_field('client_title');
						$client_link = get_sub_field('client_link');
						$client_image = get_sub_field('client_thumbnail');

						// image
						$image = wp_get_attachment_image_src($client_image);

						?>

						<div class="client-type">
							
							<img src="<?php echo $image[0]; ?>" width="150" height="150" alt="<?php echo $client_title; ?>">

							<a href="<?php echo $client_link; ?>" class="btn btn-client-type"><?php echo $client_title; ?></a>

						</div>

					<?php endwhile; ?>

						<p class="home-client-types-text narrow"><?php the_field('home_client_types_text'); ?></p>

					</div>

				</div>

			</div>

		<?php endif; ?>

		TESTIMONIAL - WIP

		<?php if( get_field('home_cta2_text') ) :

			// vars
			$cta_bg = get_field('home_cta2_background_image');
			$cta_text = get_field('home_cta2_text');
			$cta_btn_text = get_field('home_cta2_button_text');
			$cta_btn_link = get_field('home_cta2_button_link');

			// bg image
			$image = wp_get_attachment_image_src($cta_bg, 'full');

			?>

			<section class="home-cta home-cta-has-image" style="background-image: url(<?php echo $image[0]; ?>);">

				<div class="scrim-overlay"></div>
				
				<div class="container">

					<p class="home-cta-text narrow"><?php echo $cta_text; ?></p>

					<a href="<?php echo $cta_btn_link ?>" class="btn home-cta-link">
						<?php echo $cta_btn_text; ?>
					</a>

				</div>

			</section>

		<?php endif; ?>

			<section class="home-projects" style="background-image: url(<?php echo $image[0]; ?>);">

				<div class="scrim-overlay gray-overlay"></div>
				
				<div class="container">
					
					<h2 class="home-projects-title">{{Project Overview Title}}</h2>

					<div class="home-projects-list">
						
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">testerbergenstein vindaloo</a>
						<a href="#" class="btn btn-home-project">test with a very long name</a>
						<a href="#" class="btn btn-home-project">test</a>
						<a href="#" class="btn btn-home-project">test</a>

					</div>

					<hr>

					<div class="home-projects-contact">
						
						<span class="projects-contact-title">Let's discuss your project today.</span>

						<span class="projects-contact-phone"><?php the_field('phone_number', 'option'); ?></span>

						<span class="projects-contact-email"><?php the_field('email_address', 'option'); ?></span>

					</div>

				</div>

			</section>

			<section class="home-news">
				
				<div class="container">
					
					<h2 class="home-news-title">Virtual News</h2>

					<div class="home-news-list">
						
						<div class="home-news-item">
							
							<a href="#"><img class="home-news-item-img" src="//placehold.it/380x285" alt=""></a>

							<a href="#"><h3 class="home-news-item-title">It starts with a vision</h3></a>

							<p class="home-news-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quis natus id, eum perspiciatis eaque expedita reprehenderit animi, modi assumenda atque aliquid ut explicabo odit maxime, cumque commodi doloribus eligendi.</p>

							<a href="#" class="btn btn-read-more">Read More</a>

						</div>

						<div class="home-news-item">
							
							<a href="#"><img class="home-news-item-img" src="//placehold.it/380x285" alt=""></a>

							<a href="#"><h3 class="home-news-item-title">It starts with a vision</h3></a>

							<p class="home-news-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quis natus id, eum perspiciatis eaque expedita reprehenderit animi, modi assumenda atque aliquid ut explicabo odit maxime, cumque commodi doloribus eligendi.</p>

							<a href="#" class="btn btn-read-more">Read More</a>

						</div>

						<div class="home-news-item">
							
							<a href="#"><img class="home-news-item-img" src="//placehold.it/380x285" alt=""></a>

							<a href="#"><h3 class="home-news-item-title">It starts with a vision</h3></a>

							<p class="home-news-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quis natus id, eum perspiciatis eaque expedita reprehenderit animi, modi assumenda atque aliquid ut explicabo odit maxime, cumque commodi doloribus eligendi.</p>

							<a href="#" class="btn btn-read-more">Read More</a>

						</div>

					</div>

				</div>

			</section>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>