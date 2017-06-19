<?php get_header(); ?>


<section class="section page blog">


	<h1 class="section-header page-header blog-header"><?php echo $post->post_title ?></h1>
	
		<?php include locate_template('modules/subModules/blog-sidebar.php'); ?>
		<?php include locate_template('modules/subModules/blog-post.php'); ?>

		

</section>

<?php get_footer(); ?>