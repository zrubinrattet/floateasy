<?php get_header(); ?>

<div class="single">
	<?php 
		$bg_url = '';
		if( has_post_thumbnail() ){
			$bg_url = get_the_post_thumbnail_url();
		}
		else{
			$bg_url = get_blog_image($post->ID);
		}

		// show dreamscapes CPTs
		if (is_singular( array('dreamscape_posts', 'testimonials') )) :

			// get the single post object
			$single_cpt_ = get_queried_object();
			// get the single post objects ID
			$single_cpt_id = get_queried_object_id();

			global $post;
			$args = array(
				'post_type' => array('dreamscape_posts', 'testimonials'),
				'p' => $single_cpt_id,
			);
			$posts = get_posts( $args );
		endif;
			foreach ( $posts as $post ) :
				setup_postdata( $post );
				$bg_url = get_the_post_thumbnail_url();
		?>

	<section class="single-hero" style="background-image: url('<?php echo $bg_url; ?>');">
		<h1 class="single-hero-header"><?php the_title(); ?></h1>
		<div class="single-hero-tint"></div>
	</section>

	<section class="single-single section">
		<div class="single-single-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('h:i A') ; ?></div>
		<div class="single-single-content"><?php echo $post->post_content; ?></div>
	</section>
	
	<?php 
			endforeach;
			wp_reset_postdata();
	 ?>
</div>

<?php get_footer(); ?>