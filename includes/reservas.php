<?php 

function lapizzeria_guardar_datos() {
	if (isset($_POST['enviar']) && $_POST['oculto'] == "1") :
		
		$nombre = sanitize_text_field( $_POST['nombre'] );
		$fecha = sanitize_text_field( $_POST['fecha'] );
		$email = sanitize_text_field( $_POST['email'] );
		$telefono = sanitize_text_field( $_POST['telefono'] );
		$mensaje = sanitize_text_field( $_POST['mensaje'] );

		
	endif;
}

add_action('init', 'lapizzeria_guardar_datos');

?>