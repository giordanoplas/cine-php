<?php

require '../config.php';
require '../../funciones.php';

$session = comprobar_session();
if($session) {
    header('Location: ' . RUTA . 'admin/dashboard/');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = '';

    $usuario = limpiarDatos($_POST['usuario']);
    $pass = limpiarDatos($_POST['password']);

    if(empty($usuario) || empty($pass)) {
        $errores .= "Por favor, llena todos los campos";
    } else {
        $usuarioAdmin = $cine_admin['usuario'];
        $passAdmin = $cine_admin['pass'];

        if($usuario === $usuarioAdmin && $pass === $passAdmin) {       
            $_SESSION['usuario'] = $usuario;
            header('Location: ' . RUTA . 'admin/dashboard/');            
        } else {
            $errores .= 'Datos incorrectos o no encontrados';
        }  
    }   
}

require 'views/login.view.php';