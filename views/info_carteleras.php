<?php
    if(!empty($seleccion)) {
        $conexion = conexion($bd_config);
        if(!$conexion){
            header('Location: ' . RUTA . 'error.php');
        }

        $cine = obtener_cine_por_nombre($conexion, $seleccion);
        if($cine) {
            $cine = $cine[0];
        }

        close_conexion($conexion);
    }    
?>
<div class="col-12 col-sm-8 mt-5 cartelera-info">
    <?php if(empty($seleccion)): ?>    
        <h2><?php echo $cine_config['empty_seleccion']; ?></h2>        
    <?php else: ?>
        <h2><?php echo $cine['nombre']; ?></h2>            
        <p><?php echo $cine['descripcion']; ?></p>
        <p><b>Precio:</b> <?php echo $cine['precio']; ?></p>
        <p><b>Teléfono:</b> <?php echo $cine['telefono']; ?></p>
        <img src="<?php echo $cine_config['carpeta_mapas'] . $cine['mapa']; ?>" class="img-fluid mapa">
        <a href="cartelera_cine.php?cine=<?php echo $cine['nombre']; ?>" class="btn btn-light">Ver Cartelera</a>
    <?php endif; ?>
</div>