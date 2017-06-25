<?php 
/*
*/
 ?>
<section class="hometestimonials-section">

	<div class="section-wrapper">

		<h1 class="hometestimonials-header section-header">Testimonials</h1>
		<?php 
			$args = array(
				'post_type' => 'testimonials',
				'meta_key' => 'featured_testimonial',
				'meta_value' => true,
			);
			$posts = get_posts( $args );
		 ?>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php 
					foreach ( $posts as $post ) :
					$yTube = get_field('youtube_link');
				 ?>	
				 	<div class="swiper-slide">
						<div class="hometestimonials-section-slide">
							<h2 class="hometestimonials-section-slide-header"><?php echo $post->post_title; ?></h2>
							<div class="hometestimonials-section-slide-iframe">
								<?php 
									$placeholder = '<img class="testimonials-posts-post-placeholder" src="' . get_template_directory_uri() . '/library/img/placeholder.png" alt="">';
									if ( !empty($yTube) ) echo $yTube; else echo $placeholder;
								 ?>
							</div>
						</div>
				 	</div>
				<?php 
					endforeach;
				 ?>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
		



	</div>

</section>