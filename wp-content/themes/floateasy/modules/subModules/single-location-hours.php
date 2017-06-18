<?php if(!have_rows('addresses-hours-repeater')): ?>
	<div class="locations-sidebar-grid-item-hours">Open 24/7</div>
<?php endif; ?>
<?php 
if(have_rows('addresses-hours-repeater')): ?>
	<div class="locations-sidebar-grid-item-hours">
	<?php while(have_rows('addresses-hours-repeater')): the_row();?>
		<div class="locations-sidebar-grid-item-hours-row">
			<span class="locations-sidebar-grid-item-hours-row-daystart"><?php echo get_sub_field('addresses-hours-day-start'); ?></span>
			<?php if( !empty(get_sub_field('addresses-hours-day-end')) ): ?>
				<span class="locations-sidebar-grid-item-hours-row-dayend">- <?php echo get_sub_field('addresses-hours-day-end'); ?></span>
			<?php endif; ?>
			<?php if( empty(get_sub_field('addresses-hours-time-start')) && empty(get_sub_field('addresses-hours-time-end')) && get_sub_field('addresses-hours-closed') == false): ?>
				<span class="locations-sidebar-grid-item-hours-row-openallday">: all day</span>
			<?php endif; ?>
			<?php if( get_sub_field('addresses-hours-closed') ): ?>
				<span class="locations-sidebar-grid-item-hours-row-closed">: closed</span>
			<?php else: ?>
				<?php if( !empty(get_sub_field('addresses-hours-time-start')) ): ?>
				<span class="locations-sidebar-grid-item-hours-row-timestart">: <?php echo get_sub_field('addresses-hours-time-start'); ?> -</span>
				<?php endif; ?>
				<?php if( !empty(get_sub_field('addresses-hours-time-end')) ): ?>
				<span class="locations-sidebar-grid-item-hours-row-timeend"> <?php echo get_sub_field('addresses-hours-time-end'); ?></span>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>