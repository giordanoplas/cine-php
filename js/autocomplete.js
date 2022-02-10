$( function() {
    var field = document.getElementById('field');

    function split( val ) {
        return val.split( /,s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    
    $( "#autocomplete" ).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 1,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            switch(field.value) {
                case "pelicula": 
                    $.getJSON("peliculas_json.php", { pel : extractLast( request.term )}, response);
                    break;
                case "cine":
                    $.getJSON("cines_json.php", { cine : extractLast( request.term )}, response);
                    break;
                case "franquicia":
                    $.getJSON("franquicias_json.php", { fran : extractLast( request.term )}, response);
                    break;
                case "lugar":
                    $.getJSON("lugares_json.php", { lugar : extractLast( request.term )}, response);
                    break;
                case "asignarpc": 
                    $.getJSON("peliculas_json.php", { pel : extractLast( request.term )}, response);
                    break;
                default:
                    break;                    
            }
            
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            switch(field.value) {
                case "pelicula": 
                    $(location).attr('href', 'agregar_pelicula.php?pel=' + ui.item.value);
                    break;
                case "cine":
                    $(location).attr('href', 'agregar_cine.php?cine=' + ui.item.value);
                    break;
                case "franquicia":
                    $(location).attr('href', 'agregar_franquicia.php?fran=' + ui.item.value);
                    break;
                case "lugar":
                    $(location).attr('href', 'agregar_lugar.php?lugar=' + ui.item.value);
                    break;
                default:
                    break;
            }
            
        }
    });

}());