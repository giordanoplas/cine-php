(function() {

    $(".accordion-titulo").click(function(){
            
        var contenido=$(this).next(".accordion-content");
                
        if(contenido.css("display")=="none"){ //open		
            contenido.slideDown(500);			
            $(this).addClass("open");
        }
        else{ //close		
            contenido.slideUp(350);
            $(this).removeClass("open");	
        }
                             
    });

}())