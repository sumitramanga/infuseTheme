<?php

// HEADER LOGO  ----------------------------------------------------------------

function header_logo_custom_theme_customizer($wp_customize) {
	$wp_customize-> add_section('custom_theme_header_logo', array(
		'title' => __('Navigation Logo', 'infusetheme'),
		'description' => 'Insert a navigation logo to appear in the header',
		'priority' => 20
	));

	$wp_customize-> add_setting('header_logo_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize-> add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_logo_control',
			array(
				'label' => __('Logo', 'infusetheme'),
				'section' => 'custom_theme_header_logo',
				'settings' => 'header_logo_setting'
			)
		)
	);
}

add_action('customize_register', 'header_logo_custom_theme_customizer');

// FOOTER -----------------------------------------------------------------

function footer_custom_theme_customizer($wp_customize){
	$wp_customize-> add_section('custom_theme_footer_info', array(
		'title' => __('Footer', 'infusetheme'),
		'description' => 'Here you can insert your sponsers logos. We recommend your image height to be 50 pixels.',
		'priority' => 21
	));

	$wp_customize-> add_setting('footer_logo_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_logo_one_control',
			array(
				'label' => __('Sponser 1', 'infusetheme'),
				'section' => 'custom_theme_footer_info',
				'settings' => 'footer_logo_setting',
			)
		)
	);

	$wp_customize-> add_setting('footer_logo_setting_two', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_logo_two_control',
			array(
				'label' => __('Sponser 2', 'infusetheme'),
				'section' => 'custom_theme_footer_info',
				'settings' => 'footer_logo_setting_two',
			)
		)
	);

	$wp_customize-> add_setting('footer_logo_setting_three', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_logo_three_control',
			array(
				'label' => __('Sponser 3', 'infusetheme'),
				'section' => 'custom_theme_footer_info',
				'settings' => 'footer_logo_setting_three',
			)
		)
	);
}

add_action('customize_register', 'footer_custom_theme_customizer');


// MAP -----------------------------------------------------------------

function map_custom_theme_customizer($wp_customize) {
	$wp_customize-> add_section('custom_theme_map', array(
		'title' => __('Homepage Map', 'infusetheme'),
		'description' => 'Insert a Google Maps iframe of your event location.',
		'priority' => 22
	));

	$wp_customize-> add_setting('custom_theme_map_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize-> add_control(
		new WP_Customize_Control(
			$wp_customize,
			'custom_map_control',
			array(
				'label' => __('Map', 'infusetheme'),
				'section' => 'custom_theme_map',
				'settings' => 'custom_theme_map_setting',
				'type' => 'textarea'
			)
		)
	);
}

add_action('customize_register', 'map_custom_theme_customizer');
