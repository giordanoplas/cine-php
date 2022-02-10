<?php

require '../config.php';
require '../../funciones.php';

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

if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nombre = limpiarDatos($_POST['nombre']);   

    if(empty($nombre)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            INSERT INTO lugares(nombre)
            VALUES(?)
        ");
        $st->bind_param('s', $nombre);
        $st->execute();            

        if($conexion->affected_rows) {
            $errores = '';
            $success = 'Datos almacenados con éxito.';
        } else {
            $errores = 'Por algún motivo, los datos no fueron almacenados';
            $success = '';
        }
    } 
}

close_conexion($conexion);

require 'views/agregar_lugar.view.php';