<div class="blog-posts">


	<h1 class="section-header page-header blog-header"><?php echo $post->post_title ?></h1>

	<?php

			$args = array(
				'posts_per_page' => -1,
			);
			if( isset($_GET['sq']) && !empty($_GET['sq']) ) {
				$args['s'] = $_GET['sq'];
			}
			$posts = get_posts($args);
			if( !empty($posts) ):

				foreach ($posts as $post):

			?>
					<div class="blog-posts-post">

						<!-- Post Thumbnail -->
						<?php if( has_post_thumbnail() ): ?>
							<img src="<?php the_post_thumbnail_url(); ?>" class="blog-posts-post-image">
						<?php else: ?>
							<img src="<?php echo get_template_directory_uri(); ?>/library/img/placeholder.png" class="blog-posts-post-image">
						<?php endif; ?>

						<div class="blog-posts-post-content">
							<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
							<h3 class="blog-posts-post-date"><?php echo	get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php	echo get_the_date(' Y') . ' at ' . get_the_date('g:i A') ; ?></h3>
							<?php 
							$cats = wp_get_post_terms( $post->ID, 'category' ); 
							if( !empty($cats) ):
							?>
							<div class="blog-posts-post-categories">
								<?php foreach( $cats as $cat ): ?>
									<a href="<?php echo site_url('/' . $cat->taxonomy . '/' . $cat->slug . '/') ?>" class="blog-posts-post-categories-category"><?php echo $cat->name ?></a>
								<?php endforeach; ?>
							</div>
							<?php 
							endif; 
							?>
						</div>
					</div>
			<?php
				endforeach;
			endif;
	 ?>
</div>