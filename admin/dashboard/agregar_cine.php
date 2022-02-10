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
$allowedImg = array("image/jpeg", "image/jpg", "image/png");

$franquicias = obtener_franquicias($conexion);
$lugares = obtener_lugares($conexion);

if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nombre = limpiarDatos($_POST['nombre']);   
    $descripcion = nl2br($_POST['descripcion']);
    $precio = $_POST['precio'];
    $telefono = limpiarDatos($_POST['telefono']);
    $mapa = $_FILES['mapa'];
    $thumb = $_FILES['thumb'];
    $franquiciaId = limpiarId($_POST['franquicias']);
    $lugarId = limpiarId($_POST['lugares']);

    if(empty($nombre) || $franquiciaId === 0 || $lugarId === 0) {
        $errores = 'Por favor escribe el nombre y elige la franquicia y el lugal al que pertenece este cine';
        $success = '';
    } elseif(!empty($mapa['name']) && !in_array($_FILES['mapa']['type'], $allowedImg) || !empty($thumb['name']) && !in_array($_FILES['thumb']['type'], $allowedImg)) {
        $errores = 'Solo se permiten imagenes con formato: .jpg y .png';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            INSERT INTO cines(nombre,descripcion,precio,telefono,mapa,thumb,franquiciaID,lugarID)
            VALUES(?,?,?,?,?,?,?,?)
        ");
        $st->bind_param('ssssssii', $nombre, $descripcion, $precio, $telefono, $mapa['name'], $thumb['name'], 
            $franquiciaId, $lugarId);
        $st->execute();            

        if($conexion->affected_rows) {
            if(!empty($mapa['name'])) {
                $mapa_cargar = '../../' . $cine_config['carpeta_mapas'] . $mapa['name'];
                copy($_FILES['mapa']['tmp_name'], $mapa_cargar);
            }
            if(!empty($thumb['name'])) {
                $thumb_cargar = '../../' . $cine_config['carpeta_thumb'] . $thumb['name'];
                copy($_FILES['thumb']['tmp_name'], $thumb_cargar);
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

require 'views/agregar_cine.view.php';