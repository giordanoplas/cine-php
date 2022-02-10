<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

if(isset($_GET['cine']) && !empty($_GET['cine'])) {
    $cine = limpiarDatos($_GET['cine']);
    $carteleras = obtener_cine_carteleras($conexion, $cine);    
} else {
    close_conexion($conexion);
    header('Location: ' . RUTA);
}

close_conexion($conexion);

require 'views/cartelera_cine.view.php';