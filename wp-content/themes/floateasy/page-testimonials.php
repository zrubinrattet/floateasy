<?php get_header(); ?>

<section class="page testimonials section">
	<h1 class="testimonials-header section-header"><?php echo $post->post_title; ?></h1>
	<div class="testimonials-content page-content">
		<?php echo apply_filters( 'the_content', $post->post_content );?>
	</div>
	<?php if( have_rows('testimonials-repeater', 'option') ): ?>
	<div class="testimonials-grid">
		<?php while( have_rows('testimonials-repeater', 'option') ): the_row(); ?>
			<?php 
			$select = get_sub_field(' testimonials-repeater-select', 'option');
			$grid_item_class = $select == 'youtube' ? 'testimonials-youtubegriditem' : ''; 
			if(!empty(get_sub_field('testimonials-repeater-image'))){
				$grid_item_class .= ' hasimage';
			}
			?>
			<div class="fade fade-up testimonials-grid-item<?php echo $grid_item_class; ?>">
				<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'personal' ): ?>
					<?php if(!empty(get_sub_field('testimonials-repeater-image'))): ?>
						<div style="background-image: url('<?php echo get_sub_field('testimonials-repeater-image') ?>');" class="testimonials-grid-item-image"></div>
					<?php endif; ?>
					<div class="testimonials-grid-item-textwrap">	
						<div class="testimonials-grid-item-quote">“<?php echo get_sub_field('testimonials-repeater-quote'); ?>”</div>
						<div class="testimonials-grid-item-personinfo">
							<div class="testimonials-grid-item-personinfo-name"><?php echo get_sub_field('testimonials-repeater-name'); ?></div>
						</div>
						<?php if( have_rows('testimonials-social-repeater', 'option') ): ?>
							<div class="testimonials-grid-item-social">
								<?php while( have_rows('testimonials-social-repeater', 'option') ): the_row(); ?>
									<a target="_blank" href="<?php the_sub_field('testimonials-social-repeater-linkurl') ?>" class="testimonials-grid-item-social-link">
										<i class="testimonials-grid-item-social-link-icon fa fa-<?php the_sub_field('testimonials-social-repeater-linktype') ?>"></i>
									</a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'youtube' ): ?>
					<div class="testimonials-grid-item-youtubecontainer"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_sub_field('testimonials-repeater-youtube', 'option'); ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</section>

<?php get_footer(); ?>