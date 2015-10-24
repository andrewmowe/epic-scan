<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Epic Scan
 */

?>

	</div><!-- #content -->

	<section class="footer-newsletter-signup">
		
		<div class="container">
			
			<h2>Stay caught up on the best solutions</h2>
			
			<form action="">
				
				<label>
					<input type="text" placeholder="Your Name">
				</label>
			
				<label>
					<input type="text" placeholder="Email Address">
				</label>
			
				<button class="btn btn-secondary">Submit</button>
			
			</form>

		</div>

	</section>

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="container">
			
			<nav class="main-navigation footer-nav" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>

			<hr>

			<div class="site-info">
				
				<a class="site-logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/epic-scan-logo.svg'; ?>" alt="Logo Alt Text" width="286" height="65" /></a>

				<div class="footer-social-links">
					
					<a href="<?php echo get_field('facebook', 'option'); ?>" class="facebook-text-replace">Twitter</a>
					<a href="<?php echo get_field('twitter', 'option'); ?>" class="twitter-text-replace">Twitter</a>
					<a href="<?php echo get_field('linkedin', 'option'); ?>" class="linkedin-text-replace">Twitter</a>

				</div>

				<span class="footer-contact-phone">Call Today <strong><?php the_field('phone_number', 'option'); ?></strong></span>

			</div>

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
