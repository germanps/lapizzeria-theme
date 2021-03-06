<?php 
/***** Enlace a la hoja de estilos *****/
function lapizzeria_styles(){
	//Registrar normalice.css
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '5.0');
	//Registrar style.css
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

	//Llmar estilos
	wp_enqueue_style('normalize');
	wp_enqueue_style('style');
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