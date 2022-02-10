(function() {    

    $(".carrusel-slide > div:gt(0)").hide();

    setInterval(function() { 
    $('.carrusel-slide > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.carrusel-slide');
    },  5000);

}())