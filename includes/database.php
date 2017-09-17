<?php 

//Inicializa la creación de tablas nuevas
function lapizzeria_database(){
	// WPDB nos da los métodos para trabajar con tablas
	global $wpdb;
	// Agregamos una versión 
	global $lapizzeria_dbversion;
	$lapizzeria_dbversion = '1.0';

	// Obtenemos el prefijo de la tabla
	$tabla = $wpdb->prefix . 'reservas';

	// Obtenemos el collation de la instalación
	$charset_collate = $wpdb->get_charset_collate();

	// Creamos la query para la creación de la nueva tabla
	$sql = "CREATE TABLE $tabla (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(50) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar(50) DEFAULT '' NOT NULL,
		telefono varchar(10) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY (id)
	) $charset_collate; ";

	// Necesitamos  dbDelta para ejecutar el sql y está en la siguiente dirección
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

	// Agregamos la versión de BD para compararla con futuras actualizaciones
	add_option('lapizzeria_dbversion', $lapizzeria_dbversion);

	//Actualizar en caso de ser necesario
	$version_actual = get_option('lapizzeria_dbversion');

	// Comparamos las dos versiones
	if ($lapizzeria_dbversion != $version_actual) {

		$tabla = $wpdb->prefix . 'reservas';

		// Aqui realizamos la actualizaciones (de la tabla)
		$sql = "CREATE TABLE $tabla (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			nombre varchar(50) NOT NULL,
			fecha datetime NOT NULL,
			correo varchar(50) DEFAULT '' NOT NULL,
			telefono varchar(10) NOT NULL,
			/*telefono2 varchar(10) NOT NULL,*/
			mensaje longtext NOT NULL,
			PRIMARY KEY (id)
		) $charset_collate; ";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		// Actualizamos a la versión actual en cas de que así sea
		update_option('lapizzeria_dbversion', $lapizzeria_dbversion);

	}

}

add_action('after_setup_theme', 'lapizzeria_database');


// Función para comprobar que la versión instalada es igual a la BD
function lapizzeria_revisar(){
	global $lapizzeria_dbversion;

	if (get_site_option('lapizzeria_dbversion') != $lapizzeria_dbversion) {
		lapizzeria_database();
	}
}

add_action('plugins_loaded', 'lapizzeria_revisar');

?>