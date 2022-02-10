<?php

include '../config.php';
include '../../funciones.php';

$session = comprobar_session();
if(!$session) {
    header('Location: ' . RUTA . 'admin/dashboard/login.php');
}

require 'views/index.view.php';