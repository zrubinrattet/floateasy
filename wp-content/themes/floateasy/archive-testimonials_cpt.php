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
				<div class="blog-posts-post testimonials_cpt-posts-video"><?php the_field('youtube_link'); ?></div>
			</div>
		<?php 
				endforeach;
			endif;
		 ?>
</section>

<?php get_footer(); ?>
