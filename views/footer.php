<footer class="container-fluid my-5 mx-0 p-0">
    <hr class="linea"/>    
    <div class="row py-3 d-flex justify-content-center align-items-center">
        <div class="col-auto">
            <a href="https://gpdesign.site/" target="_blank">
                <img src="<?php echo RUTA . $cine_config['carpeta_imagenes']; ?>logotipo/gpdesign.png" class="logo"></img>
            </a>
        </div>
        <div class="col-auto contactos d-flex flex-column justify-content-center align-items-center my-3 my-sm-0">
            <img src="<?php echo RUTA; ?>img/cor.png">
            <p class="copyright m-0">Copyright © 2020 - 2021</p> 
        </div>
    </div> 
    <hr class="linea"/>     
    <div class="row px-4 d-flex justify-content-center align-items-center redes">
        <a data-cantainer="body" data-placement="top" data-toggle="popover" title="Mensaje:" data-content="Pronto disfrutarás de nuestro Facebook." class="icono fab fa-facebook-f facebook"></a>
        <a data-cantainer="body" data-placement="top" data-toggle="popover" title="Mensaje:" data-content="Pronto disfrutarás de nuestro Twitter." class="icono fab fa-twitter twitter"></a>
        <a data-cantainer="body" data-placement="top" data-toggle="popover" title="Mensaje:" data-content="Pronto disfrutarás de nuestro canal de Youtube." class="icono fab fa-youtube youtube"></a>
    </div>  
</footer>
<script>
    $(function(e) {
        $('[data-toggle="popover"]').popover();
    })
</script>
</body>
</html>