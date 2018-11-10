<?php get_header(); ?>

<div class="main">
	<div class="container align-items-center text-center main-screen">
		<?php
			$custom_logo = get_theme_mod('custom_logo');
			$logo_url = wp_get_attachment_image_url($custom_logo, 'medium');
		 ?>

		<?php if ($custom_logo): ?>
			<div class="row h-100">
				<div class="col- align-self-center center-content">
					<img src="<?= $logo_url ?>" class="mainLogo" alt="Logo">
				</div>
			</div>
		<?php else: ?>
			<div class="row h-100">
				<div class="col- align-self-center center-content">
					<h1 class="logoText"><?= bloginfo('name'); ?></h1>
				</div>
			</div>
		<?php endif; ?>

		<?php if(get_bloginfo('description') != ''): ?>
			<div class="row h-100">
				<div class="col- align-self-center center-content">
					<p class="lead">
						<?= bloginfo('description'); ?>
					</p>
				</div>
			</div>
		<?php endif; ?>

		<!-- Show nav on page -->
		<div class="align-items-center">
			<div class="col-">
				<?php wp_nav_menu(array(
					'theme_location' => 'main_nav',
					'menu_class' => 'main-menu h-100',
					'menu-id' => 'main-menu',
					'container_class' => 'header-menu-container'
				));  ?>
			</div>
		</div>
	</div>
</div>

<div class="footer-content">
	<div class="container">
		<!-- Date/Time viewing -->
		<?php if(is_active_sidebar('front_date_widget')): ?>
			<div id="front_date_widget">
				<?php dynamic_sidebar('front_date_widget'); ?>
			</div>
		<?php endif; ?>

		<!-- Map viewing -->
		<?php $mapText = get_theme_mod('custom_theme_map_setting'); ?>
		<?php if( strlen($mapText) > 0 ): ?>
			<div class="row map-container">
				<div id="map">
					<?php echo get_theme_mod('custom_theme_map_setting'); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
