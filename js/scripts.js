
(function($){
	//Ocultar/Mostrar menú mobile
	$('.movil').click(function(e) {
		console.log('entra');
		$('.menu-sitio').slideToggle(200);
	});

	//Ocultar/Mostrar menú desktop
	var breakpoint = 768;
	$(window).resize(function(e) {
		if ($(document).width() >= breakpoint) {
			$('.menu-sitio').show();
		}else{
			$('.menu-sitio').hide();
		}

		ajustarCajasCuadricula();
	});

	//tamaño de cajas cuadricula sobre-nosotros
	function ajustarCajasCuadricula(){
		var imagenes = $('.imagen-caja');
		if (imagenes.length > 0) {
			var altura = imagenes[0].height;
			var cajas = $('.contenido-caja');
			$(cajas).each(function(index, el) {
				$(el).css('height', altura + 'px');
			});
		}
	}
	ajustarCajasCuadricula();

})(jQuery);

