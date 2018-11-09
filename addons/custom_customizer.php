<?php

function custom_theme_customizers($wp_customize){
	$wp_customize-> add_section('custom_theme_footer_info', array(
		'title' => __('Footer', 'infusetheme'),
		'priority' => 21
	));

	$wp_customize-> add_setting('footer_text_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_text_control',
			array(
				'label' => __('Footer Text', 'infusetheme'),
				'section' => 'custom_theme_footer_info',
				'settings' => 'footer_text_setting',
				'type' => 'textarea'
			)
		)
	);
}

add_action('customize_register', 'custom_theme_customizers');
