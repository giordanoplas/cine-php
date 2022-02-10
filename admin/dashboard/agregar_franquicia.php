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
$allowedImg = array("image/png");

if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nombre = limpiarDatos($_POST['nombre']);   
    $logo = $_FILES['logo'];

    if(empty($nombre)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    } elseif (!empty($logo['name']) && !in_array($_FILES['logo']['type'], $allowedImg)) {
        $errores = 'Solo se permiten imagenes con formato: .png';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            INSERT INTO franquicias(nombre,logo)
            VALUES(?,?)
        ");
        $st->bind_param('ss', $nombre, $logo['name']);
        $st->execute();            

        if($conexion->affected_rows) {
            if(!empty($logo['name'])) {
                $logo_cargar = '../../' . $cine_config['carpeta_imagenes'] . $logo['name'];
                copy($_FILES['logo']['tmp_name'], $logo_cargar);
            }

            $errores = '';
            $success = 'Datos almacenados con éxito.';
        } else {
            $errores = 'Por algún motivo, los datos no fueron almacenados';
            $success = '';
        }
    } 
}

close_conexion($conexion);

require 'views/agregar_franquicia.view.php';