<?php 

require 'admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
if(!$conexion){
    header('Location: ' . RUTA . 'error.php');
}

$trailers = obtener_trailers_por_pagina($conexion, $cine_config['trailers_por_pagina']);
if(!$trailers) {
    close_conexion($conexion);
    header('Location: ' . RUTA);
}

close_conexion($conexion);

require 'views/trailers.view.php';