<?php get_header(); ?>

<div class="main">
	<div class="container text-center">
		<?php
			$custom_logo = get_theme_mod('custom_logo');
			$logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
		 ?>

		<?php if ($custom_logo): ?>
			<img src="<?= $logo_url ?>" alt="Logo">
		<?php else: ?>
			<h1 class="logoText"><?= bloginfo('name'); ?></h1>
		<?php endif; ?>

		<p class="lead">
			Yoobee School of Design Wellington Campus Presents The 2018 Graduation Day Of Three Level 6 Courses
		</p>

		<!-- Show nav on page -->
		<?php wp_nav_menu(array(
			'theme_location' => 'main_nav',
			'menu_class' => 'main-menu h-100',
			'menu-id' => 'main-menu',
			'container_class' => 'header-menu-container'
		));  ?>
	</div>
</div>


<div class="footer">
	<div class="footer-content container">
		<div id="front_date_widget">
			<?php dynamic_sidebar('front_date_widget'); ?>
		</div>

		<div class="row map-container">
			<div id="map">
		      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.3625216155438!2d174.7781513154224!3d-41.27921397927421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38ae2c3f4dd7b9%3A0x1d00ef622515eb70!2sWellington+Railway+Station!5e0!3m2!1sen!2snz!4v1541623486524" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
  	</div>
</div>
<?php get_footer(); ?>
