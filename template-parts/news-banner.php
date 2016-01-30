<?php if ( $news = get_field( 'news_banner', 'option' ) ) :
	// vars
	$title = $news->post_title;
	$link = get_permalink( $news->ID );
	?>
	<section class="news-alert">
		<div class="container">
			<a href="<?php echo $link; ?>" class="btn alert-btn">News</a>
			<a href="<?php echo $link; ?>" class="alert-link"><?php echo $title; ?></a>
		</div>
	</section>
<?php endif; ?>