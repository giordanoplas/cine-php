<div class="container-fluid my-5 mx-0">
    <div class="row text-center franquicias">
        <div class="col-12">
            <img src="img/tickets.png">
            <p class="encabezado text-white">Franquicias</p>  
        </div>
        <div class="col-12">
            <?php foreach($franquicias as $franquicia): ?>
                <a href="<?php echo RUTA; ?>carteleras.php?franq=<?php echo $franquicia['nombre']; ?>" class="mx-0 ml-sm-5"><img src="<?php echo $cine_config['carpeta_imagenes'] . $franquicia['logo']; ?>"></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>