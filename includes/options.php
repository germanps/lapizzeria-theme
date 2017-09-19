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


?>