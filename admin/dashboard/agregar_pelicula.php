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

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = limpiarDatos($_POST['nombre']);
    $cartelera = $_FILES['cartelera'];        
    $slideshow = $_FILES['slideshow'];
    $iframe = $_POST['iframe'];

    if(empty($nombre)) {
        $errores = 'Por favor, escribe un nombre';
        $success = '';
    } elseif (!empty($cartelera['name']) && !in_array($_FILES['cartelera']['type'], $allowedImg) || !empty($slideshow['name']) && !in_array($_FILES['slideshow']['type'], $allowedImg)) {
        $errores = 'Solo se permiten imagenes con formato: .jpg y .png';
        $success = '';
    }

    if(empty($errores)) {
        $st = $conexion->prepare("
            INSERT INTO peliculas(nombre,cartelera,slideshow,iframe)
            VALUES(?,?,?,?)
        ");
        $st->bind_param('ssss', $nombre, $cartelera['name'], $slideshow['name'], $iframe);
        $st->execute();            

        if($conexion->affected_rows) {
            if(!empty($cartelera['name'])) {
                $cartelera_cargar = '../../' . $cine_config['carpeta_carteleras'] . $cartelera['name'];
                copy($_FILES['cartelera']['tmp_name'], $cartelera_cargar);
            }
            if(!empty($slideshow['name'])) {
                $slideshow_cargar = '../../' . $cine_config['carpeta_slideshow'] . $slideshow['name'];
                copy($_FILES['slideshow']['tmp_name'], $slideshow_cargar);
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

require 'views/agregar_pelicula.view.php';