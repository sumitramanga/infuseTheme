	<div class="footerSponsersSec">
		<div class="container">
			<?php
				$footerLogoSetting = get_theme_mod('footer_logo_setting');
				$footerLogoSettingTwo = get_theme_mod('footer_logo_setting_two');
				$footerLogoSettingThree = get_theme_mod('footer_logo_setting_three');
			 ?>

			<!-- Checking if sponser logos are active -->

			<?php if(strlen($footerLogoSetting) > 0 || strlen($footerLogoSettingTwo) > 0 || strlen($footerLogoSettingThree) > 0):  ?>
				<div class="row justify-content-around sponsers">
					<?php if( strlen($footerLogoSetting) > 0 ): ?>
						<div class="col-">
							<a href="#"><img src="<?php echo get_theme_mod('footer_logo_setting'); ?>" alt="sponser"></a>
						</div>
					<?php endif; ?>

					<?php if( strlen($footerLogoSettingTwo) > 0 ): ?>
						<div class="col-">
							<a href="#"><img src="<?php echo get_theme_mod('footer_logo_setting_two'); ?>" alt="sponser"></a>
						</div>
					<?php endif; ?>

					<?php if( strlen($footerLogoSettingThree) > 0 ): ?>
						<div class="col-">
							<a href="#"><img src="<?php echo get_theme_mod('footer_logo_setting_three'); ?>" alt="sponser"></a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="footer-credits">
			<span>Site designed and developed by <a href="https://www.linkedin.com/in/sumitra-manga/" target="blank">Sumitra Manga</a> & <a href="https://nz.linkedin.com/in/izsi-salmon" target="blank">Izsi Salmon</a> </span>
		</div>
	</div>

	<?php wp_footer(); ?>
</body>
</html>
