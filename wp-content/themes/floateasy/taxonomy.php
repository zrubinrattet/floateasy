<?php get_header(); ?>

	<section class="section page category">

		<?php 
			include locate_template('modules/subModules/blog-sidebar.php'); 
			$term = get_queried_object();
		?>
		
		<div class="blog-posts category-posts">
			
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

				foreach ( $posts as $post ) :
					// put the posts here:
					// if $term->taxonomy = category
					if( $term->taxonomy == 'category' ):

						// express all the grid item content for the post_type of post
			 ?>
				<div class="blog-posts-post">

					<!-- Post Thumbnail -->
					<?php if( has_post_thumbnail() ): ?>
						<img src="<?php the_post_thumbnail_url(); ?>" class="blog-posts-post-image">
					<?php endif; ?>
					
					<div class="blog-posts-post-content">
						<!-- Permalink (Title) -->
						<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
					
						<!-- Meta -->
						<h3 class="blog-posts-post-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('g:i A') ; ?></h3>
					</div>
				</div>

				<?php 
					endif;
					if( $term->taxonomy == 'testimonial_categories' ):
						// express all the grid item content for the post_type testimonial_categoryes
				 ?>


			<?php 
					endif;
				endforeach;
			 ?>
		</div>
	</section>



<?php get_footer(); ?>