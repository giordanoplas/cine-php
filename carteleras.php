<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

$franquicia = '';
$seleccion = '';
$place = '';

$lugares = obtener_lugares($conexion);
if(!$lugares) {
    close_conexion($conexion);
    header('Location: ' . RUTA);
}

if(isset($_GET['franq']) && !empty($_GET['franq'])) {
    $franquicia = obtener_franquicia_por_nombre($conexion, limpiarDatos($_GET['franq']));
    if(!$franquicia) {
        $franquicia = '';
    } else {
        $franquicia = $franquicia[0];
        $cinesFranquicia = obtener_cines_por_franquicia($conexion, $franquicia['id']);
    }
}

if(isset($_GET['lugar']) && !empty($_GET['lugar'])) {
    $place = limpiarDatos($_GET['lugar']);
}

if(isset($_GET['sel']) && !empty($_GET['sel'])) {
    $seleccion = limpiarDatos($_GET['sel']);
}

close_conexion($conexion);

require 'views/carteleras.view.php';