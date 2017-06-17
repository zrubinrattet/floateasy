<?php get_header(); ?>
	<div class="location">
		<!-- get random image with fallbacks -->
		<?php 
			$bg_url = '';
			$gallery = get_field('gallery', $post->ID);
			if( !empty($gallery) ){
				$bg_url = $gallery[rand(0, count($gallery) - 1)]['url'];
			}
			else if( !empty( get_field('general-admin-bg', 'option') ) ){
				$bg_url = get_field('general-admin-bg', 'option');
			}
			else{
				$bg_url = get_template_directory_uri() . '/library/img/plcaeholder-bg.jpg';
			}
		?>
		<section class="location-hero" style="background-image: url('<?php echo $bg_url; ?>');">
	
			<div class="location-hero-content">
				
				<!-- Logo -->
				<div class="location-hero-content-logo">
					<img src="<?php echo get_logo(); ?>" alt="">
				</div>
				
				<!-- Location (Title) -->
				<div class="location-hero-content-header">
					<h1><?php echo $post->post_title; ?></h1>
				</div>
				
				<!-- Address -->
				<div class="location-hero-content-address">
					<?php 
						$gmap = get_field('addresses-gmap', $post->ID);
						$explosion = explode(',', $gmap['address']);
						$line2 = get_field('addresses-extra', $post->ID);
						$address = '';
						foreach($explosion as $index => $bit){
							if( $index == 1 && !empty($line2) ){
								$address .= (string) ' ' . $line2;
								$address .= ',<br/>' . $bit;
							}
							else if ( $index == 0 ){
								$address .= (string) $bit;
							}
							else{
								$address .= (string) ',' . $bit;
							}
						}
						echo $address;
					?>
				</div>
				
				<!-- Get Directions -->
				<h4 class="location-hero-content-getdirections">
					<a target="_blank" href="<?php echo 'https://maps.google.com/?q=' . htmlentities(get_field('addresses-gmap')['address']); ?>">Directions</a>
				</h4>



				<!-- Buttons -->
				<?php if( empty(get_field('yelp', $post->ID)) && empty(get_field('yelp', $post->ID)) ) : else :	?>
					<div class="location-hero-buttons">
						<?php if( !empty(get_field('yelp', $post->ID)) ): ?>
							<a target="_blank" href="<?php the_field('yelp', $post->ID); ?>" class="location-hero-buttons-button">Write a Review</a>
						<?php endif; ?>
						<?php if( !empty(get_field('mindbody', $post->ID)) ): ?>
							<a target="_blank" href="<?php the_field('mindbody', $post->ID); ?>" class="location-hero-buttons-button">Book an Appointment</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="location-hero-tint"></div>			
		</section>


		<section class="location-main page">
			<?php 
			if( have_rows('members_repeater', $post->ID) ):
			?>
			<div class="location-main-members">
				<h2 class="location-main-members-header">Members</h2>
				<div class="location-main-members-grid">
					<?php while( have_rows('members_repeater', $post->ID) ): the_row(); ?>
						<div class="location-main-members-grid-item">
							<img src="<?php the_sub_field('image') ?>" class="location-main-members-grid-item-image">
							<div class="location-main-members-grid-item-text">
								<h2 class="location-main-members-grid-item-text-header"><?php the_sub_field('name'); ?></h2>
								<h3 class="location-main-members-grid-item-text-subheader"><?php the_sub_field('title'); ?></h3>
								<div class="location-main-members-grid-item-text-content"><?php echo apply_filters('the_content', get_sub_field('wysiwyg')); ?></div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php 
			endif;
			?>
			<?php 
			if( !empty($gallery) ):
			?>
			<div class="location-main-gallery">
				<h2 class="location-main-gallery-header">Gallery</h2>
				<div class="location-main-gallery-grid">
					<?php 
					foreach($gallery as $image):
					?>	
					<a href="<?php echo $image['url'] ?>" class="location-main-gallery-grid-item">
						<img src="<?php echo $image['sizes']['medium']?>" class="location-main-gallery-grid-item-image">
					</a>
					<?php 
					endforeach;
					?>
				</div>
			</div>
			<?php 
			endif;

			if( have_rows('videos_repeater', $post->ID) ):
			?>
			<div class="location-main-videos">
				<h1 class="location-main-videos-header">Videos</h1>
				<div class="location-main-videos-grid">
				<?php while( have_rows('videos_repeater', $post->ID) ): the_row(); ?>
					<div class="location-main-videos-grid-video">
						<?php the_sub_field('video'); ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
			<?php
			endif;
			?>

		</section>
	</div>								 
<?php get_footer(); ?>