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
    $franquicia = obtener_franquicia_por_id($conexion, $id);
    $franquicia = $franquicia ? $franquicia[0] : null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = limpiarId($_POST['id']);
    $nombre = limpiarDatos($_POST['nombre']); 

    $allowedImg = array("image/png");

    if(empty($_FILES['logo']['name'])) {
        $logo = limpiarDatos($_POST['logo_guardado']);   
        $logo_cargar = '../../' . $cine_config['carpeta_imagenes'] . $logo;  
    } else {
        if(!in_array($_FILES['logo']['type'], $allowedImg)) {
            $errores = "Solo es permitido subir imágenes .png";
        } else {
            $logo = limpiarDatos($_FILES['logo']['name']); 
            $logo_cargar = '../../' . $cine_config['carpeta_imagenes'] . $logo;
        }                     
    }    

    if(empty($nombre) || empty($logo)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            UPDATE franquicias SET
            nombre=?, logo=?
            WHERE id=?
        ");
        $st->bind_param('ssi', $nombre, $logo, $id);
        $st->execute();
        
        if(!empty($_FILES['logo']['name'])) {
            copy($_FILES['logo']['tmp_name'], $logo_cargar);
        }

        $success = 'Datos modificados con éxito.';
        $errores = '';
    }
}

close_conexion($conexion);

require 'views/modificar_franquicia.view.php';