$(function(){
    var boton = $('#btn-menu');
    var fondo_enlace = $('#fondo-enlace');

    boton.on('click', function(e){
        fondo_enlace.toggleClass('active');
        $('#barra-lateral-izquierda').toggleClass('active');
        e.preventDefault();
    });

    fondo_enlace.on('click', function(e){
        fondo_enlace.toggleClass('active');
        $('#barra-lateral-izquierda').toggleClass('active');
        e.preventDefault();
	});
	
	sel = $('#seleccion');

	switch(sel.val()) {
		case 'carteleras.php':
			$('#estrenos').removeClass('seleccion');
			$('#proximamente').removeClass('seleccion');
			$('#trailers').removeClass('seleccion');
			$('#carteleras').toggleClass('seleccion');
			break;
		case 'estrenos.php':
			$('#estrenos').toggleClass('seleccion');
			break;
		case 'proximamente.php':
			$('#proximamente').toggleClass('seleccion');
			break;
		case 'trailers.php':
			$('#trailers').toggleClass('seleccion');
			break;
		default:
			break;
	}	
}());