<?php 

function lapizzeria_ajustes(){

	add_menu_page(
		'La Pizzeria', //Tema
		'La Pizzeria Ajustes', // Nombre a imprimir
		'administrator',// Qué usuario lo puede ver
		'lapizzeria_ajustes', // Parent slug
		'lapizzeria_opciones',// Donde van los settings
		'', // Icono(vacio)
		20 // Posición
	);

	add_submenu_page(
		'lapizzeria_ajustes', // Enlace al parent slug
		'Reservas', // Nombre de la página
		'Reservas', // Título del menú
		'administrator', //Qué usuario lo puede ver
		'lapizzeria_reservas', //slug
		'lapizzeria_reservas' //callback
		);

}

add_action( 'admin_menu', 'lapizzeria_ajustes' );


function lapizzeria_opciones() {

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
