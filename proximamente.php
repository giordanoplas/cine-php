<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

$prox = obtener_peliculas_proximamente($conexion);
if(!$prox) {
    close_conexion($conexion);
    header('Location: ' . RUTA);
}

close_conexion($conexion);

require 'views/proximamente.view.php';