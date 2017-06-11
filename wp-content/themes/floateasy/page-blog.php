<?php get_header(); ?>

<section class="section page blog">
	<h1 class="section-header page-header blog-header"><?php echo $post->post_title ?></h1>
	<?php 
		$the_query = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
		));
		if( $the_query->have_posts() ):
	?>
		<div class="blog-posts">
			<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
				<div class="blog-posts-post">
					<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
					<h3 class="blog-posts-post-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('h:i A') ; ?></h3>
					<?php if( has_post_thumbnail() ): ?>
						<img src="<?php the_post_thumbnail_url(); ?>" class="blog-posts-post-image">
					<?php endif; 
					if( !empty($post->post_content) ):
					?>
					<div class="blog-posts-post-content">
						<?php echo wp_trim_words(apply_filters('the_content', $post->post_content), 60, '...'); ?>
					</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php 
		endif; 
	?>
</section>

<?php get_footer(); ?>