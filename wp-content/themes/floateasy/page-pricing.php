<?php get_header(); ?>
	<section class="section page pricing">
		
		<h1 class="section-header pricing-header"><?php echo $post->post_title; ?></h1>
		
		<?php include(locate_template( 'modules/home-pricing.php' )); ?>	

		<div class="page-content pricing-content">
			<?php echo apply_filters( 'the_content', $post->post_content );?>
		</div>

		<h1 class="section-header pricing-header">Why become a member?</h1>
		
		<div class="page-content pricing-content">
			<?php the_field('whymemmber-content');?>
		</div>
	</section>
<?php get_footer(); ?>