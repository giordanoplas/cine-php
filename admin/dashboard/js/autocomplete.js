$(function() { 

    cur_page = $('#cur_page');

    $('#btnCancelar').on('click', function(e) {
        e.preventDefault();
        window.location.replace(cur_page.val());
    });


    function selectedData(id) {
        window.location.href = cur_page.val() + '?id=' + id;
    }

    $( "#autocomplete" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: 'data_json.php',
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term,
                    pagec: cur_page.val()
                },
                success: function( data ) {
                    response($.map(data, function (dat) {
                        return {
                            label: dat.nombre,
                            value: dat.id
                        };
                    }));
                }
            });
        },
        focus: function (event, ui) {
            $('#autocomplete').val(ui.item.label);
            event.preventDefault();
            return false;
        },
        select: function (event, ui) {
            $('#autocomplete').val(ui.item.label);
            selectedData(ui.item.value);            
            event.preventDefault();
            return false;
        },
        click: function (event, ui) {
            $('#autocomplete').val(ui.item.label);
            selectedData(ui.item.value);            
            event.preventDefault();
            return false;
        }
    });

}());