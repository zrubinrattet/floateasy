<div class="blog-posts">


	<h1 class="section-header page-header blog-header"><?php echo $post->post_title ?></h1>

	<?php
		$args = array(
		'exclude' => 1,
		'order' => 'ASC',
		);
		$categories = get_categories($args);
		foreach( $categories as $category) :
			$catID = $category->cat_ID;
			$args = array(
				'category' => $catID,
				'posts_per_page' => -1,
			);
			if( isset($_GET['sq']) && !empty($_GET['sq']) ) {
				$args['s'] = $_GET['sq'];
			}
			$posts = get_posts($args);
			if( !empty($posts) ):

	?>
			<div class="blog-posts-categories fade fade-up">
				<h3 class="blog-posts-categories-title"><a href="<?php the_permalink(); ?>"><?php echo $category->name; ?></a></h3>

				<?php
					foreach ($posts as $post):

				?>
						<div class="blog-posts-post">

							<!-- Post Thumbnail -->
							<?php if( has_post_thumbnail() ): ?>
								<img src="<?php the_post_thumbnail_url(); ?>" class="blog-posts-post-image">
							<?php endif; ?>

							<div class="blog-posts-post-content">
								<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
								<h3 class="blog-posts-post-date"><?php echo	get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php	echo get_the_date(' Y') . ' at ' . get_the_date('g:i A') ; ?></h3>
							</div>
						</div>
				<?php
					endforeach;
				?>
			</div>
	<?php
			endif;
		endforeach;
	 ?>
</div>