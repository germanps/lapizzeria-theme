<?php 

/****** Poner la imagen destacada en el backend *****/
function lapizzeria_setup(){
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'lapizzeria_setup');


/***** Enlace a la hoja de estilos *****/
function lapizzeria_styles(){
	//Registrar normalice.css
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '5.0');
	//Registrar fontawesome.css
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array('normalize'), '4.7.0');
	//Registrar style.css
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize', 'fontawesome'), '1.0');

	//Llamar estilos
	wp_enqueue_style('normalize');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('style');

	//Registrar JS (con true carbarmos en el footer todos los scripts)
	wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);


	wp_enqueue_script('jquery');
	wp_enqueue_script('scripts');
}
add_action('wp_enqueue_scripts', 'lapizzeria_styles');
/****************************************/



/***** Menús *****/
function lapizzeria_menus(){
	register_nav_menus(array(
		'header-menu' => __('Header Menu', 'lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria')
	));
}
add_action('init', 'lapizzeria_menus');
/****************************************/




 ?>