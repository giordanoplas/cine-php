<?php 

require 'admin/config.php';
require 'funciones.php';

$s = 0;
$t = 0;

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

/*
if(isset($_COOKIE['contador'])) {
    $contador = (int)$_COOKIE['contador'];
    $contador++;
    setcookie('contador', $contador, time() + 365 * 24 * 60 * 60);
} else {
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60);
    $contador = 1;
}
*/

$estadisticas = obtener_estadisticas($conexion);

if($estadisticas) {
    $estadisticas = $estadisticas[0];    
    $visitas = (int)$estadisticas['visitas'];
    $visitas++;
    //$visitas = $contador;

    $st = $conexion->prepare("
        UPDATE estadisticas
        SET visitas=?
        WHERE id=?
    ");
    $st->bind_param('ii', $visitas, $estadisticas['id']);
    $st->execute();
}

$franquicias = obtener_franquicias($conexion);
if(!$franquicias) {
    close_conexion($conexion);
    header('Location: ' . RUTA . 'error.php');
}

$slideshow = obtener_datos_slideshow($conexion);
if(!$slideshow) {
    close_conexion($conexion);
    header('Location: ' . RUTA . 'error.php');
}

$trailersIndex = obtener_trailers_index($conexion, 12);
if(!$trailersIndex){
    header('Location: ' . RUTA . 'error.php');
}

close_conexion($conexion);

require 'views/index.view.php';