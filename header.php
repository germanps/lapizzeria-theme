<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-wdth, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body>

	<header class="encabezado-sitio">
		<div class="contenedor">
			<div class="logo">
				<a href="<?php echo esc_url( home_url('/') ); ?>">
					<img class="logotipo" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo">
				</a>
			</div> <!-- end logo -->
			<div class="informacion-encabezado">
				<div class="redes-sociales">
					<?php 
						$args = array(
							'theme_location'=>'social-menu', //lugar del menú
							'container'=>'nav', //etiqueta que lo va a contener
							'container_class'=>'social',//clase que va a llevar el menu
							'container_id'=>'social',//id para el menú
							'link_before'=>'<span class="sr-text">',
							'link_after'=>'</span>'
						);

						wp_nav_menu($args); //imprime el menú

					?>
				</div> <!-- end redes-sociales -->
				<div class="direccion">
					<p>Bay Avenue Mountain View, CA 94043</p>
					<p>Teléfono: +1-92-456-7890</p>
				</div>
			</div> <!-- end informacion-encabezado -->
		</div> <!-- end contenedor -->
	</header>
	<div class="menu-principal">
		<div class="movil-menu">
			<a href="#" class="movil"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
		</div>
		<div class="contenedor navegacion">
			<?php 
				$args = array(
					'theme_location'=>'header-menu', //lugar del menú
					'container'=>'nav', //etiqueta que lo va a contener
					'container_class'=>'menu-sitio'//clase que va a llevar el menu
				);

				wp_nav_menu($args); //imprime el menú
			 ?>
		</div>
	</div>