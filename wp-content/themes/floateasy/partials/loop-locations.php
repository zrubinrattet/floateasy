<!-- 
	Locations (map) Page
		Sidebar Module
		Each item in a Loop
-->
<?php static $count = 0; ?>

<div class="locations-sidebar-grid-item">

	<!-- city name -->
	<h2 class="locations-sidebar-grid-item-name"><a href="<?php the_permalink(); ?>"><?php the_field('addresses-name'); ?></a></h2>	
		
	<!-- street address -->
	<p class="locations-sidebar-grid-item-address"><?php echo get_field('addresses-gmap')['address']; ?></p>
	
	<!-- tel num -->
	<a href="tel:<?php echo filter_var(get_field('contact-office'), FILTER_SANITIZE_NUMBER_INT); ?>" class="locations-sidebar-grid-item-phone"><?php the_field('contact-office'); ?></a>

	<!-- Hours  -->
	<?php include locate_template('modules/subModules/single-location-hours.php'); ?>
	
	<!-- 'Get Directions' -->
	<a target="_blank" href="<?php echo 'https://maps.google.com/?q=' . htmlentities(get_field('addresses-gmap')['address']); ?>" class="locations-sidebar-grid-item-getdirections">Get Directions</a>

	<!-- Visit Page -->
	<a target="_blank" href="<?php the_permalink(); ?>" class="locations-sidebar-grid-item-locationlink">Visit Location Page</a>

</div>

<?php $count++; ?>