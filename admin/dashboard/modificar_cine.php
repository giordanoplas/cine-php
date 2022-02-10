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
    $cine = obtener_cine_por_id($conexion, $id);
    $cine = $cine ? $cine[0] : null;
}

$franquicias = obtener_franquicias($conexion);
$lugares = obtener_lugares($conexion);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = limpiarId($_POST['id']);
    $nombre = limpiarDatos($_POST['nombre']);   
    $descripcion = nl2br($_POST['descripcion']);
    $precio = $_POST['precio'];
    $telefono = limpiarDatos($_POST['telefono']);
    $franquiciaId = limpiarDatos($_POST['franquicias']);
    $lugarId = limpiarDatos($_POST['lugares']);

    $allowedImg = array("image/jpeg", "image/jpg", "image/png");

    if(empty($_FILES['mapa']['name'])) {
        $mapa = limpiarDatos($_POST['mapa_guardado']);   
        $mapa_cargar = '../../' . $cine_config['carpeta_mapas'] . $mapa;  
    } else {
        if(!in_array($_FILES['mapa']['type'], $allowedImg)) {
            $errores = "Solo es permitido subir imágenes .jpg y .png";
        } else {
            $mapa = limpiarDatos($_FILES['mapa']['name']); 
            $mapa_cargar = '../../' . $cine_config['carpeta_mapas'] . $mapa;
        }                     
    }    

    if(empty($_FILES['thumb']['name'])) {
        $thumb = limpiarDatos($_POST['thumb_guardado']);    
        $thumb_cargar = '../../' . $cine_config['carpeta_thumb'] . $thumb;    
    } else {
        if(!in_array($_FILES['thumb']['type'], $allowedImg)) {
            $errores = "Solo es permitido subir imágenes .jpg y .png";
        } else {
            $thumb = limpiarDatos($_FILES['thumb']['name']);
            $thumb_cargar = '../../' . $cine_config['carpeta_thumb'] . $thumb;
        }                      
    }    

    if(empty($nombre) || $franquiciaId === 0 || $lugarId === 0) {
        $errores = 'Por favor, escribe almenos un nombre';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            UPDATE cines SET
            nombre=?, descripcion=?, precio=?, telefono=?, mapa=?, thumb=?, franquiciaID=?, lugarID=?
            WHERE id=?
        ");
        $st->bind_param('ssssssiii', $nombre, $descripcion, $precio , $telefono, $mapa, $thumb, 
            $franquiciaId, $lugarId, $id);
        $st->execute();

        if(!empty($_FILES['mapa']['name'])) {
            copy($_FILES['mapa']['tmp_name'], $mapa_cargar);
        }
        if(!empty($_FILES['thumb']['name'])) {
            copy($_FILES['thumb']['tmp_name'], $thumb_cargar);
        }

        $success = 'Datos modificados con éxito.';
        $errores = ''; 
    }
}

close_conexion($conexion);

require 'views/modificar_cine.view.php';