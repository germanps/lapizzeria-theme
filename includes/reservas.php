<?php 

function lapizzeria_guardar_datos() {
	if (isset($_POST['enviar']) && $_POST['oculto'] == "1") :
		

		
	endif;
}

add_action('init', 'lapizzeria_guardar_datos');

?>