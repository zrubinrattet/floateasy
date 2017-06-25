<?php get_header(); 

	// if we're on the tax that belongs to testimonials set a var accordinly
	// if we're on the tax that bleongs to post set the var accordingly
?>


	
	<section class="section page category">


		<?php include locate_template('modules/subModules/blog-sidebar.php'); ?>
		
		<div class="blog-posts category-posts">
			
			<?php
				// since you'll be getting a term id and not always a cat id you might want to change the name of this var (to something like $term_id) so you don't get confused 
				// also you could use get_queried_object() to get a term object instead of a term id. that object will have properties for term id, name, taxonomy slug and many others which you can use later in your code
				// here's what i'd do:

				$term = get_queried_object();

				$term->taxonomy;
				
				$cat_ID = get_queried_object_id();

				// now that you know what term you're fucking with you can start to set up conditional statements that control the args passed into get_posts and what's displayed in the blog-posts-post-content div
			 ?>

			<h1 class="section-header page-header category-header"><?php echo 
				// change to get terms - look out for any get categories functions
				get_the_category_by_id( $cat_ID ); ?></h1>

			<?php 
				$args = array(
					// insert the custom post type - for the taxonomy slug
					// or default to post

					// 'post_type' => '$var',
					// 'tax_query' => array(
					// 	array(
					// 		// 'taxonomy' => '$var',
					// 		'field'    => 'slug',
					// 		// 'terms'    => '$var',
					// 	),
					'term' => $cat_ID,
				);
				$posts = get_posts($args);
				foreach ( $posts as $post ) :
					// put the posts here:
					// if $term->taxonomy = category
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
						<h3 class="blog-posts-post-date"><?php echo get_the_date('D M j') ?><sup><?php echo get_the_date('S') ?></sup><?php echo get_the_date(' Y') . ' at ' . get_the_date('g:i A') ; ?></h3>
					</div>
				</div>

				<?php 
					// endif;

					// if $term-taxonomy = testimonial_categories {}
				 ?>
				 <?php 
				 	// endif
				  ?>


			<?php 
				endforeach;
			 ?>
		</div>
	</section>



<?php get_footer(); ?>