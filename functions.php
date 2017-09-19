<?php 
//Llamamos al archivo database.php
require get_template_directory() . '/includes/database.php';
//Llamamos al archivo de reservas.php
require get_template_directory() . '/includes/reservas.php';
//Crear opciones para el template options.php
require get_template_directory() . '/includes/options.php';

/****** SETUP *****/
function lapizzeria_setup(){
	/* Poner la imagen destacada en el backend */
	add_theme_support('post-thumbnails');
	/* Tamaño de imagenes (con true cortamos la imagen*/
	add_image_size('nosotros', 437, 291, true);
	/* Tamaño de imagenes ESPECIALIDADES (con true cortamos la imagen*/
	add_image_size('especialidades', 768, 515, true);
	/* Tamaño de imagenes por defecto => galerias de WP (fluidbox) */
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);

}
add_action('after_setup_theme', 'lapizzeria_setup');



/***** Enlace a la hoja de estilos *****/
function lapizzeria_styles(){
	//Registrar normalice.css
	wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '5.0');
	//Registrar fontawesome.css
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array('normalize'), '4.7.0');
	//Registrar fluidbox.css
	wp_register_style('fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css', array('normalize'), '4.7.0');
	//Registrar style.css
	wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize', 'fontawesome'), '1.0');
	//Registrar Google Fonts
	wp_register_style('google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900" rel="stylesheet', array(), '1.0.0');

	//Llamar estilos
	wp_enqueue_style('normalize');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('fluidboxcss');
	wp_enqueue_style('style');

	//Registrar JS (con true cargarmos en el footer todos los scripts)
	wp_register_script('fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '1.0.0', true);
	wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);


	wp_enqueue_script('jquery');
	wp_enqueue_script('fluidbox');
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



/******************************************************************************/
/******************************* Custom PostTypes *****************************/
/******************************************************************************/
add_action( 'init', 'lapizzeria_especialidades' );
function lapizzeria_especialidades() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Añadir Nuevo', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Añadir Nueva Pizza', 'lapizzeria' ),
		'new_item'           => __( 'Nuevo Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Editar Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'Ver Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'Todas Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    	'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'especialidades' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    	'taxonomies'         => array( 'category' ),
	);

	register_post_type( 'especialidades', $args );
}
/******************************************************************************/
/***************************** Fin Custom PostTypes ***************************/
/******************************************************************************/


/*********** WIDGETS ***********/

function lapizzeria_widgets(){

		$args = array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog_sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
		);
	
		register_sidebar( $args );
	
}
add_action('widgets_init', 'lapizzeria_widgets');

 ?>