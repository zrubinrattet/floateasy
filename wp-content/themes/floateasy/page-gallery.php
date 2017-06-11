<?php get_header(); ?>
	<section class="section gallery page">
		<h1 class="section-header gallery-header page-header"><?php echo $post->post_title; ?></h1>
		<div class="section-content gallery-content page-content">
			<?php echo apply_filters( 'the_content', $post->post_content );?>
		</div>
		<?php 
			$the_query = new WP_Query(array(
				'post_type' => 'location',
				'posts_per_page' => -1,
				'orderby' => 'name',
				'order' => 'ASC',
			));
			if( $the_query->have_posts() ):
				?>
			<div class="gallery-locations">
				<?php
				while( $the_query->have_posts() ) : $the_query->the_post();
					$gallery = get_field('gallery');

					if( empty($gallery) && !have_rows('videos_repeater') ):

					else: ?>
					<div class="gallery-locations-location">
						<a href="<?php the_permalink(); ?>" class="gallery-locations-location-header"><?php the_title(); ?></a>
						<?php if( !empty($gallery) ): ?>
							<h3 class="gallery-locations-location-subheader">Gallery</h3>
							<div class="gallery-locations-location-grid gallery">
								<?php foreach($gallery as $image): ?>
									<a href="<?php echo $image['url']; ?>" class="gallery-locations-location-grid-item">
										<img src="<?php echo $image['sizes']['medium']?>" class="gallery-locations-location-grid-item-image fade fade-up"/>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if( have_rows('videos_repeater') ): ?>
							<h3 class="gallery-locations-location-subheader">Videos</h3>
							<div class="gallery-locations-location-grid video">
								<?php 
								while( have_rows('videos_repeater') ): the_row(); ?>
									<div class="gallery-locations-location-grid-item"><?php the_sub_field('video'); ?></div>
								<?php 
								endwhile; 
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php
					endif;
				endwhile;?>
			</div>
			<?php
			endif;
		?>
	</section>
<?php get_footer(); ?>