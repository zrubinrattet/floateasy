<?php get_header(); ?>

	<?php include locate_template('modules/subModules/blog-sidebar.php'); ?>

	
	<section class="section page category">
		
		<div class="category-testzone">
			<?php 
				
				$catID = get_queried_object_id();

				$args = array(
					'category' => $catID,
					'posts_per_page' => -1,
					'order' => "ASC",
				);

				$posts = get_posts( $args );

				foreach ($posts as $post ) :
			 ?>
					
					<?php echo $post->post_title; ?>
			<?php endforeach; ?>

		</div>


	</section>


<?php get_footer(); ?>