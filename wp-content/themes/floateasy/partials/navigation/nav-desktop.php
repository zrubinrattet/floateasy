

<header class="header">

	<div class="header-content">
		
			
		<div class="header-content-logo-wrapper">
			<a href="<?php echo site_url(); ?>" class="header-content-logo">
				<img src="<?php echo get_logo(); ?>" class="header-content-logo-image">
			</a>
		</div>

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
		<div class="header-bookc2a">
			<a href="<?php the_field('book-appointment-url', 'option'); ?>">Book Appointment</a>
		</div>
	<div class="header-tint"></div>
	


	<!-- Fixed C2A Technically Outside the Header -->
	<nav class="header-fixed">
		<div class="header-fixed-book header-fixed-collapsed">
			<i class="fa fa-book"></i>
			<a href="<?php echo site_url('/book-an-appointment/'); ?>">Book Appointment</a>
		</div>
		<div class="header-fixed-tel header-fixed-collapsed">
			<i class="fa fa-phone"></i>
			<a href="tel:<?php the_field('hq-phone-number-for-url', 'option') ?>"><?php echo get_the_phone(); ?></a>
		</div>
	</nav>
</header>
			