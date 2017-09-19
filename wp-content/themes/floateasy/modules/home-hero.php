
<section class="hero">
	<?php 
		$book_url = get_book_appointment_link();
	?>
	<a<?php echo $book_url['target'] !== null ? ' target="' . $book_url['target'] . '"' : ''; ?> href="<?php echo $book_url['url']; ?>" class="hero-button"><?php the_field('home_hero_button_text', 'option'); ?></a>


	<div class="hero-image">
		<!-- if toggle set to image: -->
		<?php 
			$myToggle = get_field('home-imgvidtoggle', 'option');
			if ( $myToggle == 'image' ) :
		 ?>
		<?php 
			$images = get_field('hero-gallery', 'option');
			if( !empty($images) ):
				foreach ($images as $index => $image ) :
			 ?>
				<img class="hero-image-images" src="<?php echo $image['url']; ?>">
			<?php
				endforeach;
			endif;
		 ?>
	</div>

	<!-- If 'Images' is NOT selected (videos is selected) -->
	<?php else : ?>
		<video loop muted autoplay poster="<?php echo get_field('hero-placeholder', 'option');?>" class="hero-video">
		    <source src="<?php echo get_field('hero-webm', 'option');?>" type="video/webm">
	    	<source src="<?php echo get_field('hero-mp4', 'option');?>" type="video/mp4">
		</video>
	<?php endif; ?>

</section>