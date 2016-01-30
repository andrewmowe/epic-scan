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

		<?php get_template_part( '/template-parts/news-banner' ); ?>

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
				'orderby' => 'meta_value',
				'meta_key' => 'team_member_order',
				'meta_query' => array(
						'key' => 'user_type',
						'value' => 'team'
					)
			));
		if ( $team_members ) : ?>

			<section class="about-team">
				
				<div class="container narrow">
					
					<h2 class="center">The Epic Scan Team</h2>

					<div class="team-members">

					<?php foreach( $team_members as $member ) :

					// print_r($member);

						// vars
						$u_id = $member->ID;
						$id = 'user_' . $u_id;
						$user_type = get_field('user_type', $id);
						$name = $member->display_name;
						$slug = $member->user_nicename;
						$title = get_field('user_title', $id);

						// image
						$image_id = get_field('user_image', $id);
						$image = wp_get_attachment_image_src($image_id, 'medium');
						$image_url = $image[0];
						$image_w = $image[1];
						$image_h = $image[2];
						$image_alt = $image[3];
						?>

						<?php if ( $user_type != 'team' ) :

							// Do nothing

						else :

							// Display Team Member
						?>

						<div class="team-member">
							
							<div class="content">
								
								<img class="team-member-headshot" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
								
							</div>

							<div class="team-member-info">
							
								<a href="<?php echo esc_url( home_url( '/author/' ) . $slug ); ?>" class="team-member-name"><?php echo $name; ?></a>
							
								<span class="team-member-title"><?php echo $title; ?></span>
							
							</div>

						</div>

						<?php endif; ?>

					<?php endforeach; ?>

					</div>
						
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