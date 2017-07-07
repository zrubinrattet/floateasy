
<section class="hero">

	<a target="_blank" href="<?php the_field('book-appointment-url', 'option') ?>" class="hero-button">Book your first float FREE</a>

	<?php 
		$myToggle = get_field('home-imgvidtoggle', 'option');
		if ( $myToggle == 'image' ) :
	 ?>

		<div class="hero-image" style="background-image: url( '<?php the_field('hero-placeholder', 'option'); ?>');">
			
		</div>

	<?php else : ?>

		<video loop muted autoplay poster="<?php echo get_field('hero-placeholder', 'option');?>" class="hero-video">
		    <source src="<?php echo get_field('hero-webm', 'option');?>" type="video/webm">
	    	<source src="<?php echo get_field('hero-mp4', 'option');?>" type="video/mp4">
		</video>

	<?php endif; ?>

</section>