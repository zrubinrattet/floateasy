<!-- 
	WP_Query All Posts (not CPTs) 
-->
<?php 
	
	$myPostType = '';
	$myPostTax = '';

	if( strpos($_SERVER['REQUEST_URI'], 'blog') !== false ){
		$myPostType = 'post';
		$myPostTax = 'category';
	}
	if( strpos($_SERVER['REQUEST_URI'], 'testimonials') !== false ){
		$myPostType = 'testimonials';
		$myPostTax = 'testimonial_categories';
	}

	// 
	$the_query = new WP_Query(array(
		'post_type' => $myPostType,
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
	));
	if($the_query->have_posts()) {

		// args for get_terms
		$args = array(
			'hide_empty' => 1,
			'exclude' => 1,  // hide uncategorized
		);
		$categories = get_terms( $myPostTax, $args );

		// args for get_posts
		$args = array(
			'posts_per_page' => -1,
		);
		$posts = get_posts($args);
	}
?>


<ul class="blog-sidebar">
	
	<?php get_search_form( $echo = true ); ?>

	<h2>Categories</h2>
	
	<?php foreach ( $categories as $category ) : ?>
		<li class="fade fade-up"><a href="<?php echo get_category_link( $category ); ?>"><?php echo $category->name; ?></a></li>
	<?php endforeach; ?>
	
	<?php 
		if ($myPostType == 'post') {

			echo '<h2>Archive</h2>';

			wp_get_archives(array(
				'type' => 'monthly',
				'limit' => 6,
				'show_post_count' => 1,
				'format' => 'custom',
				'before' => '<li class="fade fade-up">',
				'after' => '</li>' )
			);
		}
	?>
	
</ul>


<!-- not sure if i need this but i think it cant hurt -->
<?php 
	wp_reset_postdata();
 ?>