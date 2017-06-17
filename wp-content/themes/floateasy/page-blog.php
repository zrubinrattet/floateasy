<?php get_header(); ?>


<section class="section page blog">


	<h1 class="section-header page-header blog-header"><?php echo $post->post_title ?></h1>
	

	<!-- WP_Query All Posts (not CPTs) -->
	<?php 
		$the_query = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if( $the_query->have_posts() ):
	?>

		<ul class="blog-sidebar">
			<h2>Categories</h2>
			<?php 
				$args = array(
					'hide_empty' => 0,
					'exclude' => 1,
				);
				$categories = get_categories( $args );
				foreach ( $categories as $category ) :
			 ?>
				<li><?php echo $category->name; ?></li>

			<?php endforeach; ?>
			<h2>Archive</h2>
			<?php  ?>
		</ul>

		<div class="blog-posts">
			
			<?php 
				$args = array(
					'exclude' => 1,
					'order' => 'DSC',

				);
				$categories = get_categories($args);
				foreach( $categories as $category) : 
			?>
				<div>
					<div class="blog-posts-categories">
						
						<h3 class="blog-posts-categories-title"><?php echo $category->name; ?></h3>
						<?php 
							$catID = $category->cat_ID;
							$args = array(
								'category' => $catID,
								'posts_per_page' => -1,
							);
							$posts = get_posts($args);
							foreach ($posts as $post):
						 ?>
						<!-- The Post -->
							<div class="blog-posts-post">
									
								<!-- Post Thumbnail -->
								<?php if( has_post_thumbnail() ): ?>
									<img src="<?php the_post_thumbnail_url(); ?>" class="blog-posts-post-image">
								<?php endif; ?>
								
								<div class="blog-posts-post-content">
									<!-- Permalink (Title) -->
									<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
								
									<!-- Meta -->
									<h3 class="blog-posts-post-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('h:i A') ; ?></h3>
								</div>
							</div>

						<?php 
							endforeach;
						 ?>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	<?php endif; ?>


</section>

<?php get_footer(); ?>