<section class="hometestimonials section">
	<div class="section-wrapper">
		<h1 class="hometestimonials-header section-header">Testimonials</h1>
		<?php if(have_rows('testimonials-repeater', 'option')): ?>
			<div class="hometestimonials-grid fade fade-up">
			<?php while(have_rows('testimonials-repeater', 'option')): the_row(); ?>
				<?php 
				$select = get_sub_field(' testimonials-repeater-select', 'option');
				$grid_item_class = $select == 'youtube' ? 'testimonials-youtubegriditem' : ''; 
				if(!empty(get_sub_field('testimonials-repeater-image'))){
					$grid_item_class .= ' hasimage';
				}
				?>
				<div class="fade fade-up hometestimonials-grid-item<?php echo $grid_item_class; ?>">
					<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'personal' ): ?>
						<?php if(!empty(get_sub_field('testimonials-repeater-image'))): ?>
							<div style="background-image: url('<?php echo get_sub_field('testimonials-repeater-image') ?>');" class="hometestimonials-grid-item-image"></div>
						<?php endif; ?>
						<div class="hometestimonials-grid-item-textwrap">	
							<div class="hometestimonials-grid-item-quote">“<?php echo get_sub_field('testimonials-repeater-quote'); ?>”</div>
							<div class="hometestimonials-grid-item-personinfo">
								<div class="hometestimonials-grid-item-personinfo-name"><?php echo get_sub_field('testimonials-repeater-name'); ?></div>
							</div>
							<?php if( have_rows('testimonials-social-repeater', 'option') ): ?>
								<div class="hometestimonials-grid-item-social">
									<?php while( have_rows('testimonials-social-repeater', 'option') ): the_row(); ?>
										<a target="_blank" href="<?php the_sub_field('testimonials-social-repeater-linkurl') ?>" class="hometestimonials-grid-item-social-link">
											<i class="hometestimonials-grid-item-social-link-icon fa fa-<?php the_sub_field('testimonials-social-repeater-linktype') ?>"></i>
										</a>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if( get_sub_field('testimonials-repeater-select', 'option') == 'youtube' ): ?>
						<div class="hometestimonials-grid-item-youtubecontainer"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo get_sub_field('testimonials-repeater-youtube', 'option'); ?>" frameborder="0" allowfullscreen></iframe></div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
				<div class="hometestimonials-grid-arrows">
					<i class="hometestimonials-grid-arrows-left fa fa-angle-left"></i>
					<i class="hometestimonials-grid-arrows-right fa fa-angle-right"></i>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>