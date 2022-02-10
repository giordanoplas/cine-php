<?php

require '../config.php';
require '../../funciones.php';

$session = comprobar_session();
if(!$session) {
    header('Location: ' . RUTA);
}

$conexion = conexion($bd_config);
if(!$conexion) {
    header('Location: ' . RUTA . 'error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = limpiarId($_GET['id']);
    $lugar = obtener_lugar_por_id($conexion, $id);
    $lugar = $lugar ? $lugar[0] : null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = limpiarId($_POST['id']);
    $nombre = limpiarDatos($_POST['nombre']);   

    if(empty($nombre)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            UPDATE lugares SET
            nombre=?
            WHERE id=?
        ");
        $st->bind_param('si', $nombre, $id);
        $st->execute();

        $success = 'Datos modificados con éxito.';
        $errores = '';
    }
}

close_conexion($conexion);

require 'views/modificar_lugar.view.php';