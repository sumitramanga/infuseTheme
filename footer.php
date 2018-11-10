	<div class="footerSponsersSec">
		<div class="container">
			<?php
				$footerText = get_theme_mod('footer_text_setting');
				$footerTextTwo = get_theme_mod('footer_text_setting_two');
				$footerTextThree = get_theme_mod('footer_text_setting_three');
			 ?>

			<div class="row justify-content-around sponsers">
				<div class="col-">
					<a href="#"><?php echo get_theme_mod('footer_text_setting'); ?></a>
				</div>
				<div class="col-">
					<a href="#"><?php echo get_theme_mod('footer_text_setting_two'); ?></a>
				</div>
				<div class="col-">
					<a href="#"><?php echo get_theme_mod('footer_text_setting_three'); ?></a>
				</div>
			</div>
		</div>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
