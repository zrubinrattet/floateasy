
<section class="hero">

	<a target="_blank" href="<?php the_field('book-appointment-url', 'option') ?>" class="hero-button">Book your first float FREE</a>


	<div class="hero-image">
		<!-- if toggle set to image: -->
		<?php 
			$myToggle = get_field('home-imgvidtoggle', 'option');
			if ( $myToggle == 'image' ) :
		 ?>
		<?php 
			$images = get_field('hero-placeholder', 'option');
			$i = 0;
			foreach ($images as $image ) :
				$i++;
				if ( $i == 1 ) :
		 ?>
				<img class="hero-image-images hero-image-images--active" src="<?php echo $image['url']; ?>">

				<?php else: ?>

				<img class="hero-image-images" src="<?php echo $image['url']; ?>">
		<?php 
				endif;
			endforeach;
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