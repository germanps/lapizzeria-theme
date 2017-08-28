
(function($){
	//Ocultar/Mostrar menú mobile
	$('.movil').click(function(e) {
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
	});

})(jQuery);