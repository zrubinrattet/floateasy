<section class="homebenefits">
	<div class="homebenefits-module">
		<div class="homebenefits-module-wrapper">
			<h1 class="homebenefits-module-bigheader section-header fade">Benefits of Floating</h1>
			<h2 class="homebenefits-module-header fade"><?php the_field('benefits-section-1-header', 'option') ?></h2>
			<?php 
			if( have_rows('benefits-section-1-repeater', 'option') ): ?>
			<ul class="homebenefits-module-list">
				<?php
					while( have_rows('benefits-section-1-repeater', 'option') ): the_row(); ?>
						<li class="homebenefits-module-list-item fade fade-up"><?php the_sub_field('text') ?></li>
				<?php 
					endwhile;
				?>
			</ul>
			<?php 
			endif;
			?>
		</div>
	</div>
	<div class="homebenefits-divider"></div>
	<div class="homebenefits-module">
		<div class="homebenefits-module-wrapper">
			<h2 class="homebenefits-module-header fade"><?php the_field('benefits-section-2-header', 'option') ?></h2>
			<?php 
			if( have_rows('benefits-section-2-repeater', 'option') ): ?>
			<ul class="homebenefits-module-list">
				<?php
					while( have_rows('benefits-section-2-repeater', 'option') ): the_row(); ?>
						<li class="homebenefits-module-list-item fade fade-up"><?php the_sub_field('text') ?></li>
				<?php 
					endwhile;
				?>
			</ul>
			<?php 
			endif;
			?>
		</div>
	</div>
	<div class="homebenefits-divider"></div>
	<div class="homebenefits-module">
		<div class="homebenefits-module-wrapper">
			<h2 class="homebenefits-module-header fade">L/R BRAIN SYNCHRONIZATION</h2>
			<?php 
			if( have_rows('benefits-section-3-repeater', 'option') ): ?>
			<ul class="homebenefits-module-list">
				<?php
					while( have_rows('benefits-section-3-repeater', 'option') ): the_row(); ?>
						<li class="homebenefits-module-list-item fade fade-up"><?php the_sub_field('text') ?></li>
				<?php 
					endwhile;
				?>
			</ul>
			<?php 
			endif;
			?>
		</div>	
	</div>
</section>