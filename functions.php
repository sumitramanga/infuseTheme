<?php

function addCustomThemeStyles() {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
	wp_enqueue_style('customcss', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
	wp_enqueue_script('customjs', get_template_directory_uri(). '/assets/js/theme-script.js', array(), '0.0.1', true);
}

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

add_theme_support('post-thumbnails');

function addCustomMenus(){
	add_theme_support('menus');
	register_nav_menu('main_nav', 'In the middle of the homepage');
}

// Fire the function/add action on initilising the theme
add_action('init', 'addCustomMenus');

add_image_size('icon', 50, 50, true);

//-------------- ADDING POST TYPE STUDENTS -----------------


// WEB STUDENTS
function add_webStudents_post_type(){

  $labels = array(
    'name' => _x('Web and UX', 'post type name', 'infusetheme'),
    'singular_name' => _x('Web and UX', 'post type singular name', 'infusetheme'),
    'add_new_item' => _x('Add web student', 'adding web student', 'infusetheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for the web students',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-laptop',
    'supports' => array(
      'title',
			'editor',
      'thumbnail'
    ),
    'query_var' => true
  );
  register_post_type('webStudents', $args);
}

add_action('init', 'add_webStudents_post_type');


// Creative digital STUDENTS
function add_graphicsStudents_post_type(){

  $labels = array(
    'name' => _x('Creative Digital', 'post type name', 'infusetheme'),
    'singular_name' => _x('Creative Digital', 'post type singular name', 'infusetheme'),
    'add_new_item' => _x('Add graphics student', 'adding graphics student', 'infusetheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for the graphics students',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-art',
    'supports' => array(
      'title',
			'editor',
      'thumbnail'
    ),
    'query_var' => true
  );
  register_post_type('graphicsStudents', $args);
}

add_action('init', 'add_graphicsStudents_post_type');

// Screen production STUDENTS
function add_screenStudents_post_type(){

  $labels = array(
    'name' => _x('Screen Production', 'post type name', 'infusetheme'),
    'singular_name' => _x('Screen Production', 'post type singular name', 'infusetheme'),
    'add_new_item' => _x('Add screen student', 'adding screen student', 'infusetheme')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type for the screen students',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-editor-video',
    'supports' => array(
      'title',
			'editor',
      'thumbnail'
    ),
    'query_var' => true
  );
  register_post_type('screenStudents', $args);
}

add_action('init', 'add_screenStudents_post_type');


//-------------- ADDING LOGO SUPPORT -----------------

function addCustomLogo() {
	add_theme_support('custom-logo', array(
		'height' => 480,
		'width' => 350,
		'flex-height' => false,
		'flex-width' => false
	));
}

add_action('init', 'addCustomLogo');


//-------------- REGISTERING A WIDGET SECTION -----------------

function register_event_details_widget() {
	register_sidebar(array(
		'id' => 'front_date_widget',
		'name' => 'Date widget',
		'description' => 'Date and time for event which appears on the main page',
		'before_widget' => '<div id="%1$s" class="date-widget exhib-address %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="exhib-time">',
		'after_title' => '</h3><hr class="hr">'
	));
}

add_action('widgets_init', 'register_event_details_widget');

// Disabling certain widgets
function remove_the_widget() {
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Custom_HTML');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Gallery');
}

add_action( 'widgets_init', 'remove_the_widget' );

require get_parent_theme_file_path('./addons/custom_customizer.php');
