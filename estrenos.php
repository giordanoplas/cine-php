<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

$estrenos = obtener_peliculas_estreno($conexion);
if(!$estrenos) {
    close_conexion($conexion);
    header('Location: ' . RUTA);
}

close_conexion($conexion);

require 'views/estrenos.view.php';