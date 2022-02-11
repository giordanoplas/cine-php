<?php

define('RUTA', 'http://localhost:8080/projects/cine/');

$bd_config = array(
    'host' => 'localhost',
    'basedatos' => 'gpdesign_cinedb',
    'usuario' => 'root',
    'pass' => ''
);

$cine_config = array(
    'carpeta_imagenes' => 'img/',
    'carpeta_portadas' => 'img/portadas/',
    'carpeta_mapas' => 'img/mapas/',
    'carpeta_thumb' => 'img/thumb_cines/',
    'carpeta_carteleras' => 'img/carteleras/',
    'carpeta_slideshow' => 'img/slideshow/',
    'empty_seleccion' => 'Selecciona un cine de la lista',
    'trailers_por_pagina' => 9
);

$cine_admin = array(
    'usuario' => '',
    'pass' => '',
    'correo' => 'info@gpdesign.site',
    'dashboard' => RUTA . 'admin/dashboard/'
);
