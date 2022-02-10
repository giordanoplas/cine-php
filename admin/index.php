<?php

require 'config.php';
require '../funciones.php';

$session = comprobar_session();
if(!$session) {
    header('Location: ' . RUTA . 'admin/dashboard/login.php');
} else {
    header('Location: ' . RUTA . 'admin/dashboard/');
}