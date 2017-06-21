<?php get_header(); ?>

<?php 
	$bg_url = '';
	$gallery = get_field('gallery', $post->ID);
	if( !empty($gallery) ){
		$bg_url = $gallery[rand(0, count($gallery) - 1)]['url'];
	}
	else if( !empty( get_field('general-admin-bg', 'option') ) ){
		$bg_url = get_field('general-admin-bg', 'option');
	}
	else{
		$bg_url = get_template_directory_uri() . '/library/img/placeholder-bg.jpg';
	}
?>

<section class="section page dreamscapes">
	

	<div style="background-image: url('<?php echo $bg_url; ?>');" class="dreamscapes-hero">
		
	</div>

	<section class="dreamscapes-main">
			<div class="section-header page-header dreamscapes-header"><?php the_title(); ?></div>

			<?php 
				$args = array(
					'post_type' => 'page',
					'p' => 1997,
					// 'pagename' => 'dreamscapes',
				);
				$posts = get_posts( $args );
				foreach ($posts as $post) :
					setup_postdata( $post );
			 ?>
				<div class="dreamscapes-main-content"><?php echo apply_filters('the_content', $post->post_content); ?></div>
			<?php 
				endforeach;
				wp_reset_postdata();
			 ?>

		<!-- Posts: -->
		<?php 
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'dreamscape_posts',
			);
			$the_query = new WP_Query($args);
			if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post();
		 ?>
			<div style="background-image: url(https://goo.gl/vNQG41)" class="blog-posts-post dreamscapes-post">
				<div class="blog-posts-post-content dreamscapes-post-content">
					<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>
	</section>


</section>


<?php get_footer(); ?>