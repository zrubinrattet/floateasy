<section class="hometestimonials-section">

	<div class="section-wrapper">

		<h1 class="hometestimonials-header section-header">Testimonials</h1>
		
		<!-- get testimonials cpt posts -->
		<?php 
			$args = array(
				'post_type' => 'testimonials_cpt',
				'meta_key' => 'featured_testimonial',
				'meta_value' => true,
			);
			$posts = get_posts( $args );
		 ?>
		<!-- create swiper wrappers -->
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<!-- foreacher posts -->
				<?php 
					foreach ( $posts as $post ) :
					$yTube = get_field('youtube_link');
					$isFeat = get_field('featured_testimonial');
				 	// if post has a youtube-link and featured checkbox is true?
				 ?>
						<div class="swiper-slide">
							<!-- swiper objects -->
							<?php var_dump($yTube); ?>		
							<?php var_dump($isFeat); ?>		
						</div>
				<?php 
					endforeach;
				 ?>
			</div>
		</div>
		



	</div>

</section>