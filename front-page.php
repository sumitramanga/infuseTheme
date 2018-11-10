<?php get_header(); ?>

<div class="main">
	<div class="container text-center">
		<?php
			$custom_logo = get_theme_mod('custom_logo');
			$logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
		 ?>

		<?php if ($custom_logo): ?>
			<img src="<?= $logo_url ?>" class="mainLogo" alt="Logo">
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

<div class="footer-content">
	<div class="container">
		<div id="front_date_widget">
			<?php dynamic_sidebar('front_date_widget'); ?>
		</div>

		<div class="row map-container">
			<div id="map">
				<?php echo get_theme_mod('custom_theme_map_setting'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
