<?php get_header(); ?>
	<section class="section page pricing">
		<h1 class="section-header pricing-header"><?php echo $post->post_title; ?></h1>
		<div class="page-content pricing-content">
			<?php echo apply_filters( 'the_content', $post->post_content );?>
		</div>
		<div class="pricing-wrapper">
			<div class="homepricing-nonmember homepricing-module fade fade-up">
				<h2 class="homepricing-nonmember-header homepricing-module-header">Non-Member Pricing</h2>
				<div class="homepricing-nonmember-grid homepricing-module-grid">
					<div class="homepricing-nonmember-grid-item homepricing-module-grid-item">
						<div class="homepricing-nonmember-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-nonmember-grid-item-content-price homepricing-module-grid-item-content-price">$39</h3>
							<p class="homepricing-nonmember-grid-item-content-description homepricing-module-grid-item-content-description">1<sup>st</sup> Float</p>
						</div>
					</div>
					<div class="homepricing-nonmember-grid-item homepricing-module-grid-item">
						<div class="homepricing-nonmember-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-nonmember-grid-item-content-price homepricing-module-grid-item-content-price">$79</h3>
							<p class="homepricing-nonmember-grid-item-content-description homepricing-module-grid-item-content-description">Float</p>
						</div>
					</div>
					<div class="homepricing-nonmember-grid-item homepricing-module-grid-item">
						<div class="homepricing-nonmember-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-nonmember-grid-item-content-price homepricing-module-grid-item-content-price">$59</h3>
							<p class="homepricing-nonmember-grid-item-content-description homepricing-module-grid-item-content-description">Additional Hour</p>
						</div>
					</div>
				</div>
			</div>
			<div class="homepricing-member homepricing-module fade fade-up">
				<h2 class="homepricing-member-header homepricing-module-header">Member</h2>
				<div class="homepricing-member-grid homepricing-module-grid">
					<div class="homepricing-member-grid-item homepricing-module-grid-item">
						<div class="homepricing-member-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-member-grid-item-content-price homepricing-module-grid-item-content-price">$59</h3>
							<p class="homepricing-member-grid-item-content-description homepricing-module-grid-item-content-description">1 Float per month</p>
						</div>
					</div>
					<div class="homepricing-member-grid-item homepricing-module-grid-item">
						<div class="homepricing-member-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-member-grid-item-content-price homepricing-module-grid-item-content-price">$99</h3>
							<p class="homepricing-member-grid-item-content-description homepricing-module-grid-item-content-description">2 floats per month</p>
						</div>
					</div>
					<div class="homepricing-member-grid-item homepricing-module-grid-item">
						<div class="homepricing-member-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-member-grid-item-content-price homepricing-module-grid-item-content-price">$159</h3>
							<p class="homepricing-member-grid-item-content-description homepricing-module-grid-item-content-description">unlimited floats per month</p>
						</div>
					</div>
					<div class="homepricing-member-grid-item homepricing-module-grid-item">
						<div class="homepricing-member-grid-item-content homepricing-module-grid-item-content">
							<h3 class="homepricing-member-grid-item-content-price homepricing-module-grid-item-content-price">$49</h3>
							<p class="homepricing-member-grid-item-content-description homepricing-module-grid-item-content-description">additional hour</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h1 class="section-header pricing-header">Why become a member?</h1>
		<div class="page-content pricing-content">
			<?php the_field('whymemmber-content');?>
		</div>
	</section>
<?php get_footer(); ?>