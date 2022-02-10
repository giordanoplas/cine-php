<?php

require '../config.php';
require '../../funciones.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $conexion = conexion($bd_config);
    if(!$conexion) {
        header('Location: ' . RUTA . 'error.php');
    }

    $search = limpiarDatos($_POST['search']);
    $page = limpiarDatos($_POST['pagec']);
    $datasel = array();

    switch($page) {
        case 'modificar_cine.php':
            $data = obtener_cines_nombre($conexion, $search);
            break;
        case 'modificar_franquicia.php': 
            $data = obtener_franquicias_nombre($conexion, $search);
            break;
        case 'modificar_lugar.php':
            $data = obtener_lugares_nombre($conexion, $search);
            break;
        case 'modificar_pelicula.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'asignar_peliculas_cine.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'asignar_peliculas_estrenos.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'asignar_peliculas_proximamente.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'quitar_peliculas_cine.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'quitar_peliculas_estrenos.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        case 'quitar_peliculas_proximamente.php':
            $data = obtener_peliculas_nombre($conexion, $search);
            break;
        default: 
            $datasel[] = 'No hay datos a mostrar';
            break;
    }   
    
    if(!$data) {
        $datasel[] = 'No hay datos a mostrar';
    } else {
        foreach($data as $d) {
            $datasel[] = array(
                'id' => $d['id'],
                'nombre' => $d['nombre']
            );
        }
    }

    close_conexion($conexion);

    header('Content-type: application/json');
    echo json_encode($datasel);
}