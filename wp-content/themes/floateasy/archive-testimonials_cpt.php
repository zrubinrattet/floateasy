<?php get_header(); ?>

<section class="section page testimonial-cpt">


		<h1 class="section-header page-header"><?php post_type_archive_title( $prefix, true ); ?></h1>
		
		<?php 
			$args = array(
				'post_type' => 'testimonials_cpt',
				'posts_per_page' => -1,
			);
			$posts = get_posts( $args );
			if(!empty($posts)) :
				foreach($posts as $post) :
		 ?>
			<div class="testimonials_cpt-posts	">
				<h1 class="testimonials_cpt-posts-title"><?php echo $post->post_title; ?></h1>
				

				<div class="blog-posts-post testimonials_cpt-posts-video">				
					<?php
					$iframe = get_field('youtube_link');
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
					// add extra params to iframe src
					$params = array(
					    'controls'    => 0,
					    'hd'        => 1,
					    'autohide'    => 1
					);
					$new_src = add_query_arg($params, $src);
					$iframe = str_replace($src, $new_src, $iframe);
					// add extra attributes to iframe html
					$attributes = 'frameborder="0" class="lazyload"'. ' ' . 'data-src="' . $matches[1] . '"';
					// cache modified iframe var
					$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);//
					// echo $iframe
					echo $iframe;

					?>
				</div>
					
			</div>
		<?php 
				endforeach;
			endif;
		 ?>
</section>

<?php get_footer(); ?>
