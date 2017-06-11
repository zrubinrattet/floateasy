<section class="hero">
	<a target="_blank" href="<?php the_field('book-appointment-url', 'option') ?>" class="hero-button">Book your first float FREE</a>
	<video loop muted autoplay poster="<?php echo get_field('hero-placeholder', 'option');?>" class="hero-video">
	    <source src="<?php echo get_field('hero-webm', 'option');?>" type="video/webm">
	    <source src="<?php echo get_field('hero-mp4', 'option');?>" type="video/mp4">
	</video>
</section>