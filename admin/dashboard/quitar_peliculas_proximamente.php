<?php

include '../config.php';
include '../../funciones.php';

$session = comprobar_session();
if(!$session) {
    header('Location: ' . RUTA);
}

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

$errores = '';
$success = '';

$cines = obtener_cines_ordenados_alfabeticamente($conexion);
if(!$cines) {
    header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pelicula = obtener_peliculas_id($conexion, limpiarId($_POST['peliculaId']));

    if(!$pelicula) {
        $errores = 'Debes escribir una película válida.';
        $success = '';
    } else {
        $peliculaId = limpiarId($pelicula[0]['id']);
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            DELETE FROM peliculas_proximamente
            WHERE peliculaID=?
        ");
        $st->bind_param('i', $peliculaId);
        $st->execute();            

        if($conexion->affected_rows) {
            $errores = '';
            $success = 'Datos quitados con éxito.';
        } else {
            $errores = 'Por algún motivo, los datos no fueron quitados';
            $success = '';
        }
    }
}

include 'views/quitar_peliculas_proximamente.view.php';