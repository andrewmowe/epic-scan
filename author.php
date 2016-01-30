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
		$current_author = get_query_var('author');
		$user_id = 'user_' . $current_author;
		$user_type = get_field('user_type', $user_id);
		$current_user_id = get_current_user_id();
		$author_info = get_userdata( $current_author );
		$author_name = $author_info->display_name;
	?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main blog-main" role="main">

			<header class="page-header">

				<?php

					if( $user_type === 'client' || $user_type === 'third_party' ) :

						if ( $current_user_id === $current_author ) :

							echo '<h1 class="blog-title">Projects for ' . $author_name . '</h1>';

						else :

							echo '<h1 class="blog-title">Please log in to view this page</h1>';

						endif;

					elseif( $user_type === 'team' ) :

						echo '<h1 class="blog-title">' . $author_name . '</h1>';

					else :

						echo '<h1 class="blog-title">Posts by ' . $author_name . '</h1>';

					endif;
				?>

			</header><!-- .page-header -->

			<?php if ( $user_type === 'team' ) : ?>

				<?php
				// User info vars
				$title = get_field('user_title', $user_id);
				$bio = get_field('user_bio', $user_id);
				$edu = get_field('user_education', $user_id);
				$email = get_field('user_public_email', $user_id);
				$linkedin = get_field('user_linkedin', $user_id);
				$twitter = get_field('user_twitter', $user_id);

				// User image
				$image_id = get_field('user_image_secondary', $user_id);
				$image = wp_get_attachment_image_src($image_id, 'medium');
				$image_url = $image[0];
				$image_w = $image[1];
				$image_h = $image[2];
				$image_alt = $image[3];
				?>

				<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />

				<div class="team-member-bio">
									
					<span class="team-member-title"><?php echo $title; ?></span>

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

					<?php if($bio) : ?>
						<?php echo apply_filters('the_content', $bio); ?>
					<?php endif; ?>

					<?php if( have_rows( 'user_specialties', $user_id ) ) : ?>

						<strong>Specialties</strong>

						<ul>

						<?php while( have_rows( 'user_specialties', $user_id ) ) : the_row(); ?>

							<li><?php the_sub_field('user_specialty'); ?></li>

						<?php endwhile; ?>

						</ul>

					<?php endif; ?>

					<?php if($edu) : ?>
						<strong>Education</strong>
						<?php echo apply_filters('the_content', $edu); ?>
					<?php endif; ?>



				</div>

				<?php if ( have_posts() ) : ?>

					<h2 class="blog-title">Posts by <?php echo $author_name; ?></h2>

				<?php endif; ?>
				

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

		<?php elseif ( $user_type === 'client' || $user_type === 'third_party' ) : ?>

			<?php if ( $current_user_id === $current_author ) : ?>

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

				<?php wp_login_form(); ?>

			<?php endif; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
