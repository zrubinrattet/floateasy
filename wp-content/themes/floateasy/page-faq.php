<?php get_header(); ?>
	<section class="faq section">
		<h1 class="faq-header section-header"><?php echo $post->post_title; ?></h1>
		<div class="faq-content"><?php echo apply_filters( 'the_content', $post->post_content ); ?></div>
		<?php if( have_rows('faq-repeater') ): ?>
		<div class="faq-grid">
			<?php while( have_rows('faq-repeater') ): the_row(); ?>
				<div class="faq-grid-item fade fade-up">
					<h2 class="faq-grid-item-header"><?php the_sub_field('header') ?></h2>
					<p class="faq-grid-item-content"><?php the_sub_field('content') ?></p>
				</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</section>	
<?php get_footer(); ?>