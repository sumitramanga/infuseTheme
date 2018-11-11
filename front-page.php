<?php get_header(); ?>

<div class="main wrapper-main">
	<div class="container container-custom text-center main-screen">
		<div>
			<?php
				$custom_logo = get_theme_mod('custom_logo');
				$logo_url = wp_get_attachment_image_url($custom_logo, 'large');
			 ?>

			<?php if ($custom_logo): ?>
				<div class="row">
					<div class="col- center-content">
						<img src="<?= $logo_url ?>" class="mainLogo" alt="Logo">
					</div>
				</div>
			<?php else: ?>
				<div class="row">
					<div class="col- center-content">
						<h1 class="logoText"><?= bloginfo('name'); ?></h1>
					</div>
				</div>
			<?php endif; ?>

			<?php if(get_bloginfo('description') != ''): ?>
				<div class="row">
					<div class="col- center-content">
						<p class="lead">
							<?= bloginfo('description'); ?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<!-- Show nav on page -->
			<!-- <div class="row"> -->
				<div class="col-">
					<?php wp_nav_menu(array(
						'theme_location' => 'main_nav',
						'menu_class' => 'main-menu h-100',
						'menu-id' => 'main-menu',
						'container_class' => 'header-menu-container'
					));  ?>
				</div>
			<!-- </div> -->
		</div>
	</div>
</div>

<div class="footer-content">
	<div class="container container-custom">
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
