<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<title>Infuse - Yoobee School of Design 2018 Exhibiton</title>
</head>
<body class="bg-color">
	<nav class="navbar navbar-light navbarBg">
		<?php $headerLogoSetting = get_theme_mod('header_logo_setting'); ?>
		<?php if( strlen($headerLogoSetting) > 0 ): ?>
			<a class="navbar-brand" href="<?= site_url(); ?>"><img src="<?php echo get_theme_mod('header_logo_setting'); ?>" alt="Logo" class="nav-logo"></a>
		<?php else: ?>
			<a class="navbar-brand" href="<?= site_url(); ?>"><?= bloginfo('name'); ?></a>
		<?php endif; ?>
	</nav>
