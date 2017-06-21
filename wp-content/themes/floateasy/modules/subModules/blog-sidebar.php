<!-- WP_Query All Posts (not CPTs) -->
<?php 
	$the_query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
	));
	if($the_query->have_posts()) {

		$args = array(
			'hide_empty' => 0,
			'exclude' => 1,
		);
		$categories = get_categories($args);
		$args = array(
			'posts_per_page' => -1,
		);
		$posts = get_posts($args);
	}
?>
<ul class="blog-sidebar">
	<h2>Categories</h2>
	<?php foreach ( $categories as $category ) : ?>
		<li class="fade fade-up"><a href="<?php echo get_category_link( $category ); ?>"><?php echo $category->name; ?></a></li>
	<?php endforeach; ?>
	
	<h2>Archive</h2>
	<?php 
		wp_get_archives(array(
			'type' => 'monthly',
			'limit' => 6,
			'show_post_count' => 1,
			'format' => 'custom',
			'before' => '<li class="fade fade-up">',
			'after' => '</li>' )
		);
	?>
	
</ul>


<!-- not sure if i need this but i think it cant hurt -->
<?php 
	wp_reset_postdata();
 ?>