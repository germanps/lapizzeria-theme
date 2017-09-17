<?php 

function lapizzeria_database(){
	//Crear nueva tabla en la base de datos
	global $wpdb;
	global $lapizzeria_dbversion;
	$lapizzeria_dbversion = '0.1';

	$tabla = $wpdb->prefix . 'reservas';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $tabla (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(50) NOT NULL,
		fecha datetime NOT NULL,
		correo varchar(50) DEFAULT '' NOT NULL,
		telefono varchar(10) NOT NULL,
		mensaje longtext NOT NULL,
		PRIMARY KEY (id)
	) $charset_collate; ";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	dbDelta($sql);

	add_option('lapizzeria_version', $lapizzeria_dbversion);

}

add_action('after_setup_theme', 'lapizzeria_database');

?>