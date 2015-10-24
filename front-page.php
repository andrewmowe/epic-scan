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

		<?php if( get_field( 'home_testimonial' ) ) : ?>

			<?php
			$testimonial = get_field( 'home_testimonial' );
			$t_id = $testimonial->ID;
			?>

			<section class="home-testimonial">
				
				<div class="container narrow">
					
					<h2>What our clients say</h2>
					
					<blockquote class="testimonial">
						
						<p><?php the_field('test_quote', $t_id); ?></p>
					
						<footer>

							<span class="testimonial-name"><?php the_field('test_name', $t_id); ?></span>
							<span class="testimonial-role"><?php the_field('test_job_title', $t_id); ?></span>
							<span class="testimonial-company"><?php the_field('test_company', $t_id); ?></span>

						</footer>
					
					</blockquote>

				</div>

			</section>

		<?php endif; ?>

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

						<span class="projects-contact-phone"><i class="fa fa-phone fa-fw"></i><?php the_field('phone_number', 'option'); ?></span>

						<span class="projects-contact-email"><i class="fa fa-envelope fa-fw"></i><?php the_field('email_address', 'option'); ?></span>

					</div>

				</div>

			</section>

		<?php if( get_field('featured_news_posts') ) : ?>

			<section class="home-news">
				
				<div class="container">
					
					<h2 class="home-news-title">
						<?php if( get_field('featured_news_title') ) : ?>
							<?php the_field('featured_news_title'); ?>
						<?php else : ?>
							Virtual News
						<?php endif; ?>
					</h2>

					<div class="home-news-list">

					<?php while( has_sub_field('featured_news_posts') ) :

						// vars
						$news = get_sub_field('featured_posts');
						$news_title = $news->post_title;
						$news_excerpt = wp_trim_words( $news->post_content, 30 );
						$news_link = get_permalink($news->ID);

			// echo '<pre>';
			// print_r($news);
			// echo '</pre>';

						// images
						if ( has_post_thumbnail($news->ID ) ) :
							$thumbnail_id = get_post_thumbnail_id($news->ID);
							$news_image = wp_get_attachment_image_src($thumbnail_id, 'large');
						else :
							$news_image = wp_get_attachment_image_src( get_field('placeholder_image', 'option'), 'large');
						endif;

						$image_url = $news_image[0];
						$image_w = $news_image[1];
						$image_h = $news_image[2];
						$image_alt = $news_image[3];
						?>
						
						<div class="home-news-item">
							
							<a href="<?php echo $news_link; ?>"><img class="home-news-item-img" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"></a>

							<a href="<?php echo $news_link; ?>"><h3 class="home-news-item-title"><?php echo $news_title; ?></h3></a>

							<p class="home-news-item-text"><?php echo $news_excerpt; ?></p>

							<a href="<?php echo $news_link; ?>" class="btn btn-read-more">Read More</a>

						</div>

					<?php endwhile; ?>

					</div>

				</div>

			</section>

		<?php endif; ?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>