<?php
/*
Template Name: About
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

		<?php if(get_field('about_text') ) :

			// vars
			$about_title = get_field('about_title');
			$about_text = get_field('about_text');
			?>

			<section class="about-section">

				<div class="container narrow">

					<h2 class="about-title"><?php the_field('about_title'); ?></h2>

					<div class="about-text"><?php echo apply_filters('the_content', $about_text); ?></div>

				</div>

			</section>

		<?php endif; ?>

		<?php
		$team_members = get_users( array(
				'meta-key' => 'user-type',
				'meta-value' => 'team-member'
			));
		if ( $team_members ) : ?>

			<section class="about-team">
				
				<div class="container narrow">
					
					<h2 class="center">The Epic Scan Team</h2>

					<?php foreach( $team_members as $member ) :

					// print_r($member);

						// vars
						$u_id = $member->ID;
						$id = 'user_' . $u_id;
						$name = $member->display_name;
						$title = get_field('user_title', $id);
						$bio = get_field('user_bio', $id);
						$edu = get_field('user_education', $id);
						$email = get_field('user_public_email', $id);
						$linkedin = get_field('user_linkedin', $id);
						$twitter = get_field('user_twitter', $id);

						// image
						$image_id = get_field('user_image', $id);
						$image = wp_get_attachment_image_src($image_id, 'thumbnail');
						$image_url = $image[0];
						$image_w = $image[1];
						$image_h = $image[2];
						$image_alt = $image[3];
						?>

						<div class="team-member">
							
							<img class="team-member-headshot" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">

							<div class="team-member-info">

								<span class="team-member-name"><?php echo $name; ?></span>

								<div class="team-member-contact">
									
									<?php if($email) : ?>
										<a href="mailto:<?php echo $email; ?>" class="fa fa-envelope"></a>
									<?php endif; ?>

									<?php if($linkedin) : ?>
										<a href="<?php echo $linkedin; ?>" class="fa fa-linkedin"></a>
									<?php endif; ?>

									<?php if($twitter) : ?>
										<a href="<?php echo $twitter; ?>" class="fa fa-twitter"></a>
									<?php endif; ?>

								</div>

								<div class="team-member-bio">
									
									<span class="team-member-title"><?php echo $title; ?></span>

									<?php if($bio) : ?>
										<?php echo apply_filters('the_content', $bio); ?>
									<?php endif; ?>

									<?php if( have_rows( 'user_specialties', $id ) ) : ?>

										<strong>Specialties</strong>

										<ul>

										<?php while( have_rows( 'user_specialties', $id ) ) : the_row(); ?>

											<li><?php the_sub_field('user_specialty'); ?></li>

										<?php endwhile; ?>

										</ul>

									<?php endif; ?>

									<?php if($edu) : ?>
										<strong>Education</strong>
										<?php echo apply_filters('the_content', $edu); ?>
									<?php endif; ?>

								</div>

							</div>

						</div>

					<?php endforeach; ?>
						
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