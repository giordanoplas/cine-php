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
    $pelicula = obtener_peliculas_id($conexion, $id);
    $pelicula = $pelicula ? $pelicula[0] : null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = limpiarId($_POST['id']);
    $nombre = limpiarDatos($_POST['nombre']);
    $iframe = $_POST['iframe'];

    $allowedImg = array("image/jpeg", "image/jpg", "image/png");

    if(empty($_FILES['cartelera']['name'])) {
        $cartelera = limpiarDatos($_POST['cartelera_guardado']);   
        $cartelera_cargar = '../../' . $cine_config['carpeta_carteleras'] . $cartelera;  
    } else {
        if(!in_array($_FILES['cartelera']['type'], $allowedImg)) {
            $errores = "Solo es permitido subir imágenes .jpg y .png";
        } else {
            $cartelera = limpiarDatos($_FILES['cartelera']['name']); 
            $cartelera_cargar = '../../' . $cine_config['carpeta_carteleras'] . $cartelera;
        }                     
    }    

    if(empty($_FILES['slideshow']['name'])) {
        $slideshow = limpiarDatos($_POST['slideshow_guardado']);    
        $slideshow_cargar = '../../' . $cine_config['carpeta_slideshow'] . $slideshow;    
    } else {
        if(!in_array($_FILES['slideshow']['type'], $allowedImg)) {
            $errores = "Solo es permitido subir imágenes .jpg y .png";
        } else {
            $slideshow = limpiarDatos($_FILES['slideshow']['name']);
            $slideshow_cargar = '../../' . $cine_config['carpeta_slideshow'] . $slideshow;
        }                      
    }    

    if(empty($nombre)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            UPDATE peliculas SET
            nombre=?, cartelera=?, slideshow=?, iframe=?
            WHERE id=?
        ");
        $st->bind_param('ssssi', $nombre, $cartelera, $slideshow, $iframe, $id);
        $st->execute();

        if(!empty($_FILES['cartelera']['name'])) {
            copy($_FILES['cartelera']['tmp_name'], $cartelera_cargar);
        }
        if(!empty($_FILES['slideshow']['name'])) {
            copy($_FILES['slideshow']['tmp_name'], $slideshow_cargar);
        }

        $success = 'Datos modificados con éxito.';
        $errores = '';
    }
}

close_conexion($conexion);

require 'views/modificar_pelicula.view.php';