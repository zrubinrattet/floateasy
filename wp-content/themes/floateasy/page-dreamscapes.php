<?php get_header(); ?>
<!-- 
	Fetch Hero BG from Gallery,
-->
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

	<!-- hero -->
	<!-- <div style="background-image: url('<?php echo $bg_url; ?>');" class="dreamscapes-hero"> -->

	
	<div style="background-image: url('https://static.pexels.com/photos/414826/pexels-photo-414826.jpeg');" class="dreamscapes-hero">
		<h1 class="section-header page-header dreamscapes-header"><?php the_title(); ?></h1>		
	</div>

	<!-- main (page) -->
	<section class="dreamscapes-main">
		<?php 
			$args = array(
				'post_type' => 'page',
				'p' => 1997,
			);
			$posts = get_posts( $args );
			foreach ($posts as $post) :
		 ?>
			<div class="dreamscapes-main-content">
				<?php echo apply_filters('the_content', $post->post_content); ?>
			</div>
		<?php 
			endforeach;
		 ?>

		<!-- posts -->
		<div class="dreamscapes-posts">
			<?php 
				$args = array(
					'posts_per_page' => -1,
					'post_type' => 'dreamscape_posts',
				);
				$the_query = new WP_Query($args);
				if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post();
			 ?>
				<div style="background-image: url(https://goo.gl/vNQG41)" class="blog-posts-post dreamscapes-posts-post">
					<div class="blog-posts-post-content dreamscapes-post-content">
						<a href="<?php the_permalink(); ?>" class="blog-posts-post-header"><?php the_title(); ?></a>
					</div>
				</div>
			<?php 
					endwhile;
				endif;
			?>
		</div>
			
	</section>


</section>


<?php get_footer(); ?>