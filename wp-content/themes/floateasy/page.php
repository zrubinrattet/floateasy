<?php get_header(); ?>
	<section class="section page">
		<h1 class="section-header page-header"><?php echo $post->post_title; ?></h1>
		<div class="page-content">
			<?php echo apply_filters( 'the_content', $post->post_content );?>
		</div>
	</section>
<?php get_footer(); ?>