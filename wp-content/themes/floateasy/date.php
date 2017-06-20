<?php get_header(); ?>

	
	<!--  -->
	<section class="page section category archive archive-month">
		
		<?php 
			require 'modules/subModules/blog-sidebar.php';
		?>
		

		<div class="blog-posts archive-posts">
			
			<h1 class="page-header section-header archive-header">
				<?php the_date('F, Y'); ?>
			</h1>
				
			<?php 
				$month = get_the_date('n');
				$year = get_the_date('Y');
				$args = array(
					'date_query' => array(
						array(
							'year' => $year,
							'month' => $month,
						),
					),
				);
				$posts = get_posts( $args );
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
						<h3 class="blog-posts-post-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('h:i A') ; ?></h3>
					</div>
				</div>

			<?php endforeach; ?>

		</div>


	</section>



<?php get_footer(); ?>