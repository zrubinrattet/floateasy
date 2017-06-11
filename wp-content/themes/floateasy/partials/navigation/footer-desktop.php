<footer class="footer">
	<div class="fade fade-in footer-wrap">
		<div class="footer-pagelinks">
			<?php 


			wp_nav_menu(array(
				'container' => false,
				'items_wrap' => '%3$s',
				'walker' => new NavWalker('footer-pagelinks-item', 'footer-pagelinks-item-link fade fade-up'),
				'theme_location' => 'footer-nav',
			));


			?>
		</div>
		<div class="footer-social">
			<div class="footer-social-hours">
				<h2 class="footer-social-hours-header">Hours</h2>
				<p class="footer-social-hours-content fade fade-up">9am-12pm: 7 Days per Week</p>
			</div>
			<div class="footer-social-subscribe">
				<div class="footer-social-subscribe-content">
					<h2 class="footer-social-subscribe-content-header">Subscribe</h2>
					<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
					<form action="//floateasy.us16.list-manage.com/subscribe/post?u=9229d51c8914bdb1adae4f055&amp;id=2b4b97ccb6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
							<input type="email" value="" name="EMAIL" class="email footer-social-subscribe-content-form-input"  id="mce-EMAIL" placeholder="email address" required>
						    <div style="position: absolute; left: -5000px;" aria-hidden="true">
						    	<input type="text" name="b_9229d51c8914bdb1adae4f055_2b4b97ccb6" tabindex="-1" value="">
					    	</div>    
					    	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button footer-social-subscribe-content-form-submit">
					    </div>
					</form>
				</div>
			</div>
			<?php  

			$facebook_link = get_field('social-facebook-link', 'option');
			$twitter_link = get_field('social-twitter-link', 'option');
			$instagram_link = get_field('social-instagram-link', 'option');
			$youtube_link = get_field('social-youtube-link', 'option');
			$googleplus_link = get_field('social-googleplus-link', 'option');

			if( !empty($facebook_link) ||  !empty($twitter_link) || !empty($instagram_link) || !empty($youtube_link) || !empty($googleplus_link)):
			?>
			<ul class="footer-social-links fade fade-up">
				<?php if( !empty($facebook_link) ): ?>
				<li class="footer-social-links-item">
					<a href="<?php echo $facebook_link ?>" target="_blank" class="footer-social-links-item-link">
						<i class="footer-social-links-item-link-icon fa fa-facebook"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if( !empty($twitter_link) ): ?>
				<li class="footer-social-links-item">
					<a href="<?php echo $twitter_link ?>" target="_blank" class="footer-social-links-item-link">
						<i class="footer-social-links-item-link-icon fa fa-twitter"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if( !empty($instagram_link) ): ?>
				<li class="footer-social-links-item">
					<a href="<?php echo $instagram_link ?>" target="_blank" class="footer-social-links-item-link">
						<i class="footer-social-links-item-link-icon fa fa-instagram"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if( !empty($youtube_link) ): ?>
				<li class="footer-social-links-item">
					<a href="<?php echo $youtube_link ?>" target="_blank" class="footer-social-links-item-link">
						<i class="footer-social-links-item-link-icon fa fa-youtube-play"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if( !empty($googleplus_link) ): ?>
				<li class="footer-social-links-item">
					<a href="<?php echo $googleplus_link ?>" target="_blank" class="footer-social-links-item-link">
						<i class="footer-social-links-item-link-icon fa fa-google-plus"></i>
					</a>
				</li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		</div>	
	</div>
</footer>
<div class="copyright">
	<div class="copyright-wrapper">
		<a target="_blank" class="copyright-tclink" href="<?php echo site_url() ?>/terms">Terms &amp; Conditions</a><span> Copyright &copy; <?php echo Date('Y') . ' ' . get_bloginfo('sitename'); ?>	</span>
	</div>
</div>