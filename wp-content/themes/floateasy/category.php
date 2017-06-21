<?php get_header(); ?>


	
	<section class="section page category">


		<?php include locate_template('modules/subModules/blog-sidebar.php'); ?>
		
		<div class="blog-posts category-posts">
			
			<?php 
				$cat_ID = get_queried_object_id();

			 ?>

			<h1 class="section-header page-header category-header"><?php echo get_the_category_by_id( $cat_ID ); ?></h1>

			<?php 
				$args = array(
					'category' => $cat_ID,
				);
				$posts = get_posts($args);
				foreach ( $posts as $post ) :
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
				endforeach;
				wp_reset_postdata();
			 ?>
		</div>
	</section>



<?php get_footer(); ?>