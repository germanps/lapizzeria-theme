<?php 

function lapizzeria_ajustes(){

	add_menu_page(
		'La Pizzeria', //Tema
		'La Pizzeria Ajustes', // Nombre a imprimir
		'administrator',// Qué usuario lo puede ver
		'lapizzeria_ajustes', // Parent slug
		'lapizzeria_opciones',// Donde van los settings (fución mas abajo)
		'', // Icono(vacio)
		20 // Posición
	);

	add_submenu_page(
		'lapizzeria_ajustes', // Enlace al parent slug
		'Reservas', // Nombre de la página
		'Reservas', // Título del menú
		'administrator', //Qué usuario lo puede ver
		'lapizzeria_reservas', //slug
		'lapizzeria_reservas' //callback (función mas abajo)
		);

	//Llamar al registro de las opciones de nuestro theme
	add_action('admin_init', 'lapizzeria_registrar_opciones' );

}

add_action( 'admin_menu', 'lapizzeria_ajustes' );


function lapizzeria_registrar_opciones() {
	// Registrar opciones, una por campo
	register_setting('lapizzeria_opciones_grupo', 'lapizzeria_direccion');
	register_setting('lapizzeria_opciones_grupo', 'lapizzeria_telefono');
}


function lapizzeria_opciones() {

	?>
	
		<div class="wrap">
			<h1>Ajustes La Pizzeria</h1>

			<form action="options.php" method="post">
				<?php settings_fields('lapizzeria_opciones_grupo'); ?>
				<?php do_settings_sections('lapizzeria_opciones_grupo'); ?>

				<table class="form-table">
					<tr valign="top">
						<th scope="row">Dirección</th>
						<td><input type="text" name="lapizzeria_direccion" value="<?php echo esc_attr( get_option('lapizzeria_direccion') ); ?>"></td>
					</tr>
					<tr valign="top">
						<th scope="row">Teléfono</th>
						<td><input type="text" name="lapizzeria_telefono" value="<?php echo esc_attr( get_option('lapizzeria_telefono') ); ?>"></td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>


	<?php

}

function lapizzeria_reservas() {

	?>
		
	<div class="wrap">
		<h1>Reservas</h1>
		<table class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th class="manage-column">ID</th>
					<th class="manage-column">Nombre</th>
					<th class="manage-column">Fecha de Reserva</th>
					<th class="manage-column">Email</th>
					<th class="manage-column">Teléfono</th>
					<th class="manage-column">Mensaje</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					global $wpdb;
					$reservas = $wpdb->prefix . 'reservas';
					$registros = $wpdb->get_results( "SELECT * FROM $reservas;", ARRAY_A);
					foreach ($registros as $registro) { ?>
						<tr>
							<td><?php echo $registro['id'] ?></td>
							<td><?php echo $registro['nombre'] ?></td>
							<td><?php echo $registro['fecha'] ?></td>
							<td><?php echo $registro['email'] ?></td>
							<td><?php echo $registro['telefono'] ?></td>
							<td><?php echo $registro['mensaje'] ?></td>
						</tr>

						
					<?php } ?>

				

			</tbody>
		</table>
	</div>

	<?php  

}

?>
