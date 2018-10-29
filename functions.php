<?php

function addCustomThemeStyles() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
}

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

add_theme_support('post-thumbnails');

function addCustomMenus(){
	add_theme_support('menus');
	register_nav_menu('header_nav', 'At the top of the page (main)');
}

// Fire the function/add action on initilising the theme
add_action('init', 'addCustomMenus');
