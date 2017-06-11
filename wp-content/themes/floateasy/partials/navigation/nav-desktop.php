<header class="header">
	<div class="header-content">
		<a href="<?php echo site_url(); ?>" class="header-content-logo">
			<img src="<?php echo get_logo(); ?>" class="header-content-logo-image">
		</a>
		<div class="header-content-rightwrap">
			<div class="header-content-menus">
				<nav class="header-content-menus-social">
					<ul class="header-content-menus-social-menu">
						<li class="header-content-menus-social-menu-item">
							<a href="tel:<?php echo get_the_phone('tel'); ?>" class="header-content-menus-social-menu-item-link"><?php echo get_the_phone(); ?></a>
						</li>
					</ul>
				</nav>
				<nav class="header-content-menus-pages">
					<?php 

					wp_nav_menu(array(
						'container' => false,
						'items_wrap' => '<ul class="header-content-menus-pages-menu">%3$s</ul>',
						'walker' => new NavWalker('header-content-menus-pages-menu-item', 'header-content-menus-pages-menu-item-link'),
						'theme_location' => 'main-nav',
					));

					?>
				</nav>
			</div>
			<a href="<?php the_field('book-appointment-url', 'option'); ?>" class="header-content-bookappointment">Book Appointment</a>
		</div>
	</div>
	<div class="header-tint"></div>
</header>