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
            INSERT INTO peliculas_estreno(peliculaID)
            VALUES(?)
        ");
        $st->bind_param('i', $peliculaId);
        $st->execute();            

        if($conexion->affected_rows) {
            $errores = '';
            $success = 'Datos asignados con éxito.';
        } else {
            $errores = 'Por algún motivo, los datos no fueron asignados';
            $success = '';
        }
    }
}

include 'views/asignar_peliculas_estrenos.view.php';