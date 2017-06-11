<?php get_header(); ?>
	
	<section class="locations">
		<?php 
		
		$the_query = new Locations_Query();
		
		if( $the_query->query->have_posts() ): ?>
		<div class="locations-sidebar">
			<form class="locations-sidebar-form" method="get" action="<?php echo home_url( '/locations/' ); ?>">
				<input placeholder="City, State or Zip (US Only)" type="search" id="q" name="q" class="locations-sidebar-form-search"/>
				<button class="locations-sidebar-form-submit" type="submit"><i class="fa fa-search"></i></button>
			</form>
			<?php 
			if( !empty($the_query->search_query) ): ?>
				<div class="locations-sidebar-message">
				<?php
					if( isset($the_query->error_msg) ):
						echo $the_query->error_msg;
					endif;
				?>
					<span class="locations-sidebar-message-numresults">
						<?php echo count($the_query->query->posts) ?>
					</span> 
					<?php echo count($the_query->query->posts) > 1 ? 'results' : empty($the_query->query->posts) ? 'results' : 'result' ?> found near <?php echo $the_query->json_results->formatted_address; ?><br/><a class="locations-sidebar-message-numresults-showall" href="<?php echo home_url('/locations/') ?>">Show all locations</a>
					<?php if(count($the_query->query->posts) == 0): ?>
						<br/>
						Sorry try a different search.
						<br/>
						Now showing all results.
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="locations-sidebar-grid">

				<?php 

				while( $the_query->query->have_posts() ): $the_query->query->the_post(); 
					include( locate_template( 'partials/loop-locations.php' ) );
				endwhile; 

				?>
			</div>
		</div>
		<div class="locations-map" id="locations-map"></div>
		<?php else: ?>
			<div class="locations-nolocations">
				<div class="locations-nolocations-header">Sorry, no locations listed.</div>
			</div>
		<?php endif; ?>
	</section>

<?php get_footer(); ?>