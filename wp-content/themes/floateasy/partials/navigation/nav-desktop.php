

<header class="header">

	<div class="header-content">

		<a href="<?php echo site_url(); ?>" class="header-content-logo">
			<img src="<?php echo get_logo(); ?>" class="header-content-logo-image">
		</a>

		<div class="header-content-rightwrap">
			<div class="header-content-menus">
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
		</div>
	</div>
	<div class="header-tint"></div>
	
	<!-- Fixed C2A -->
	<nav class="header-fixed">
		<a href="<?php the_field('book-appointment-url', 'option'); ?>" class="header-fixed-button">Book Appointment</a>
		<ul class="header-fixed-meta">
			<li class="header-fixed-meta-tel">
				<a href="tel:<?php echo get_the_phone('tel'); ?>" class="header-fixed-meta-tel-num"><?php echo get_the_phone(); ?></a>
			</li>
		</ul>
	</nav>
</header>