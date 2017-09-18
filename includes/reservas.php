<?php 

function lapizzeria_guardar_datos() {

	// WPDB nos da los métodos para trabajar con tablas
	global $wpdb;

	if(isset($_POST['enviar']) && $_POST['oculto'] == "1"):
		
		$nombre = sanitize_text_field( $_POST['nombre'] );
		$fecha = sanitize_text_field( $_POST['fecha'] );
		$email = sanitize_text_field( $_POST['email'] );
		$telefono = sanitize_text_field( $_POST['telefono'] );
		$mensaje = sanitize_text_field( $_POST['mensaje'] );

		// Obtenemos el prefijo de la tabla
		$tabla = $wpdb->prefix . "reservas";

		$datos = array(
			'nombre' => $nombre,
			'fecha' => $fecha,
			'email' => $email,
			'telefono' => $telefono,
			'mensaje' => $mensaje
		);

		//El formato va a ser string para todos los campos (%s)
		$formato = array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		);

		//Insert
		$wpdb->insert($tabla, $datos, $formato);
		
	endif;

}

add_action('init', 'lapizzeria_guardar_datos');
