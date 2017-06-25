<?php get_header(); ?>

	<section class="section page category">

		<?php 
			include locate_template('modules/subModules/blog-sidebar.php'); 
			$term = get_queried_object();
		?>
		
		<div class="blog-posts testimonials-posts">
			<h1 class="section-header page-header category-header"><?php echo $term->name; ?></h1>
			

			<?php 

				$post_type = '';

				if( $term->taxonomy == 'category' ){
					$post_type = 'post';
				}
				else{
					$post_type = 'testimonials';
				}

				$args = array(
					'post_type' => $post_type,
					'tax_query' => array(
						array(
							'taxonomy' => $term->taxonomy,
							'field' => 'term_id',
							'terms' => $term->term_id
						)
					),
				);

				$posts = get_posts($args);

				foreach ( $posts as $post ) :?>
					<div class="testimonials-posts-post blog-posts-post">
						<h1 class="testimonials-posts-title"><?php echo $post->post_title; ?></h1>
						<div class="testimonials-posts-video">
							<?php
								$placeholder = '<img class="testimonials-posts-post-placeholder" 
														src="' . get_template_directory_uri() . '/library/img/placeholder.png" alt="">';
								if ( !empty(get_field('youtube_link')) ) {
									$iframe = get_field('youtube_link');
									// use preg_match to find iframe src
									preg_match('/src="(.+?)"/', $iframe, $matches);
									$src = $matches[1];
									// add extra params to iframe src
									$params = array(
									    'controls'    => 0,
									    'hd'        => 1,
									    'autohide'    => 1,
									);
									$new_src = add_query_arg($params, $src);
									$iframe = str_replace($src, $new_src, $iframe);
									// add extra attributes to iframe html + class for lazysizes.js
									$attributes = 'frameborder="0" class="lazyload testimonials-posts-post-iframe"'. ' ' . 'data-src="' . $matches[1] . '"';
									// cache modified iframe var
									$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);//
									// echo $iframe
									echo $iframe;
								} else {
									echo $placeholder;
								}
							?>
						</div>
					</div>
				<?php
				endforeach;
			 ?>
		</div>
	</section>



<?php get_footer(); ?>