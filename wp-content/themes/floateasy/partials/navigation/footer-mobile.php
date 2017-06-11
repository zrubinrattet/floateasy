<footer class="mobilefooter">
	<a href="<?php echo site_url(); ?>" class="fade fade-up mobilefooter-logo">
		<img src="<?php echo get_logo(); ?>" class="mobilefooter-logo-image">
	</a>
	<?php  

	$facebook_link = get_field('social-facebook-link', 'option');
	$twitter_link = get_field('social-twitter-link', 'option');
	$instagram_link = get_field('social-instagram-link', 'option');
	$youtube_link = get_field('social-youtube-link', 'option');
	$googleplus_link = get_field('social-googleplus-link', 'option');

	if( !empty($facebook_link) ||  !empty($twitter_link) || !empty($instagram_link) || !empty($youtube_link || !empty($googleplus_link))):
	?>
	<ul class="fade fade-up mobilefooter-sociallinks">
		<?php if( !empty($facebook_link) ): ?>
		<li class="mobilefooter-sociallinks-item">
			<a href="<?php echo $facebook_link ?>" target="_blank" class="mobilefooter-sociallinks-item-link">
				<i class="mobilefooter-sociallinks-item-link-icon fa fa-facebook"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if( !empty($twitter_link) ): ?>
		<li class="mobilefooter-sociallinks-item">
			<a href="<?php echo $twitter_link ?>" target="_blank" class="mobilefooter-sociallinks-item-link">
				<i class="mobilefooter-sociallinks-item-link-icon fa fa-twitter"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if( !empty($instagram_link) ): ?>
		<li class="mobilefooter-sociallinks-item">
			<a href="<?php echo $instagram_link ?>" target="_blank" class="mobilefooter-sociallinks-item-link">
				<i class="mobilefooter-sociallinks-item-link-icon fa fa-instagram"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if( !empty($youtube_link) ): ?>
		<li class="mobilefooter-sociallinks-item">
			<a href="<?php echo $youtube_link ?>" target="_blank" class="mobilefooter-sociallinks-item-link">
				<i class="mobilefooter-sociallinks-item-link-icon fa fa-youtube-play"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if( !empty($googleplus_link) ): ?>
		<li class="mobilefooter-sociallinks-item">
			<a href="<?php echo $googleplus_link ?>" target="_blank" class="mobilefooter-sociallinks-item-link">
				<i class="mobilefooter-sociallinks-item-link-icon fa fa-google-plus"></i>
			</a>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
	<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
	<form action="//floateasy.us16.list-manage.com/subscribe/post?u=9229d51c8914bdb1adae4f055&amp;id=2b4b97ccb6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mobilefooter-subscribe" target="_blank" novalidate>
	    <div id="mc_embed_signup_scroll" class="mobilefooter-subscribe-content">
			<input type="email" value="" name="EMAIL" class="email mobilefooter-subscribe-content-input"  id="mce-EMAIL" placeholder="email address" required>
		    <div style="position: absolute; left: -5000px;" aria-hidden="true">
		    	<input type="text" name="b_9229d51c8914bdb1adae4f055_2b4b97ccb6" tabindex="-1" value="">
	    	</div>    
	    	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button mobilefooter-subscribe-content-submit">
	    </div>
	</form>

	<!-- depricated
		<div class="mobilefooter-hours">
			<strong>Hours</strong> 9am-12pm: 7 Days per Week
		</div>
	 -->


	<?php 

		wp_nav_menu(array(
			'container' => false,
			'items_wrap' => '<ul class="mobilefooter-pagelinks">%3$s</ul>',
			'walker' => new NavWalker('mobilefooter-pagelinks-item fade fade-up', 'mobilefooter-pagelinks-item-link'),
			'theme_location' => 'footer-nav',
		));
	?>
	<div class="mobilefooter-copyright"><?php echo !empty(get_field('general-tclink', 'option')) ? '<a class="mobilefooter-copyright-tclink" href="' .get_field('general-tclink', 'option') . '">Terms &amp; Conditions</a> | ' : '' ?>Copyright &copy; <?php echo Date('Y'); ?> <?php echo bloginfo('sitename'); ?></div>
</footer>